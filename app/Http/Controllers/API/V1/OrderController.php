<?php

namespace App\Http\Controllers\API\V1;

use App\Contracts\Controller\API\V1\OrderControllerInterface;
use App\Facades\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller implements OrderControllerInterface
{
    public function __construct(protected OrderService $service)
    {
    }

    public function index(Request $request)
    {
        $orders = $this->service->getPenddingOrderList();

        return Response::message('order.messages.list_of_orders_has_been_received_successfully')->data(new OrderCollection($orders))->toResponse($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request)
    {
        $order = $this->service->createOrder($request);

        return Response::message('order.messages.order_was_created_successfully')->data(new OrderResource($order))->toResponse($request);
    }


    public function cancelOrder(Request $request, Order $order)
    {
        $order = $this->service->cancelOrder($request, $order);

        return Response::message('order.messages.order_was_successfully_cancelled')->data(new OrderResource($order))->toResponse($request);
    }

    public function assign(Request $request, Order $order)
    {
        $order = $this->service->assignToDeliver($request, $order);

        return Response::message('order.messages.order_was_successfully_assigned')->data(new OrderResource($order))->toResponse($request);
    }

    public function delivered(Request $request, Order $order)
    {
        $order = $this->service->orderDelivered($request, $order);

        return Response::message('order.messages.order_was_successfully_delivered')->data(new OrderResource($order))->toResponse($request);
    }
}
