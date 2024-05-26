<?php

namespace App\Services;

use App\Enums\Order\OrderStatusEnum;
use App\Exceptions\BadRequestException;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;

class OrderService
{
    public function createOrder(OrderStoreRequest $request)
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
}
