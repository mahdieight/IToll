<?php

namespace App\Services;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;

class OrderService
{
    public function createOrder(OrderStoreRequest $request)
    {
        $order = Order::create($request->validated());
        return $order;
    }
}
