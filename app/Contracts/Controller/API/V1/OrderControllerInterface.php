<?php

namespace App\Contracts\Controller\API\V1;

use App\Http\Requests\OrderStoreRequest;

interface OrderControllerInterface
{
    public function store(OrderStoreRequest $request);
}
