<?php

namespace App\Http\Controllers\API\V1;

use App\Contracts\Controller\API\V1\OrderControllerInterface;
use App\Facades\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;

class OrderController extends Controller implements OrderControllerInterface
{
    public function __construct(protected OrderService $service)
    {
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request)
    {
        $order = $this->service->createOrder($request);

        return Response::message('order.messages.order_was_created_successfully')->data(new OrderResource($order))->toResponse($request);
    }
}
