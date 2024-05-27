<?php

namespace App\Services;

use App\Enums\Order\OrderStatusEnum;
use App\Events\OrderDriverAssigned;
use App\Exceptions\BadRequestException;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder(OrderStoreRequest $request): Order
    {

        $existingOrder = Order::where([
            'status' => OrderStatusEnum::WAITING_DRIVER,
            'source_address' => $request->source_address,
            'source_lat' => $request->source_lat,
            'source_long' => $request->source_long,
            'destination_address' => $request->destination_address,
            'destination_lat' => $request->destination_lat,
            'destination_long' => $request->destination_long,
            'sender_name' => $request->sender_name,
            'sender_mobile' => $request->sender_mobile,
            'receiver_name' => $request->receiver_name,
            'receiver_mobile' => $request->receiver_mobile,
        ])->exists();

        if ($existingOrder) return throw new BadRequestException('order.errors.order_is_duplicated');

        $order =  $request->collection->orders()->create($request->validated());
        return $order;
    }

    public function cancelOrder(Request $request, Order $order): Order
    {
        if ($order->collection_id != $request->collection->id) {
            return throw new BadRequestException('order.errors.not_allowed_operate_on_the_orders_others');
        }

        if (!in_array($order->status, [OrderStatusEnum::WAITING_DRIVER, OrderStatusEnum::ASSIGNED])) {
            return throw new BadRequestException('order.errors.is_not_possible_cancel_order');
        }

        $order->update(['status' => OrderStatusEnum::CANCELED]);

        return $order;
    }

    public function getPenddingOrderList()
    {
        return  Order::whereStatus(OrderStatusEnum::WAITING_DRIVER)->paginate();
    }

    public function assignToDeliver(Request $request, Order $order)
    {

        if ($order->status != OrderStatusEnum::WAITING_DRIVER)  throw new BadRequestException('This order is already assigned to a driver');

        DB::beginTransaction();

        try {
            $order->lockForUpdate();

            $order->update(['driver_id' => $request->driver->id, 'status' => OrderStatusEnum::ASSIGNED]);

            OrderDriverAssigned::dispatch($order, $request->driver);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return throw new BadRequestException();
        }

        return $order;
    }
}
