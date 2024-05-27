<?php

namespace App\Contracts\Controller\API\V1;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *    title="Swagger with Laravel",
 *    version="1.0.0",
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     securityScheme="ApiKeyAuth",
 *      in="header",
 *      name="Authorization"
 * )

 */
interface OrderControllerInterface
{

     /**
     * @OA\Get(
     *     path="/api/v1/orders",
     *     tags={"Orders"},
     *     summary="get order list in pendding status",
     *     security={{ "ApiKeyAuth": {"type":"apiKey", "in":"header",  "name":"Authorization",} }},
     * 
     *     @OA\Response(response="201", description="order list successfully founded"),
     *     @OA\Response(response="422", description="Validation errors"),
     *     @OA\Response(response="401", description="BadRequest")
     * )
     */

    public function index(Request $request);


    /**
     * @OA\Post(
     *     path="/api/v1/orders",
     *     tags={"Orders"},
     *     summary="Create new order",
     *     security={{ "ApiKeyAuth": {"type":"apiKey", "in":"header",  "name":"Authorization",} }},
     *     @OA\Parameter(
     *         name="source_address",
     *         in="path",
     *         description="source address",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="source_lat",
     *         in="path",
     *         description="source lat",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="source_long",
     *         in="path",
     *         description="source long",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="destination_address",
     *         in="path",
     *         description="destination_address",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="destination_lat",
     *         in="path",
     *         description="destination lat",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="destination_long",
     *         in="path",
     *         description="destination long",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="sender_name",
     *         in="path",
     *         description="sender name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="sender_mobile",
     *         in="path",
     *         description="sender mobile",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="receiver_name",
     *         in="path",
     *         description="receiver name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="receiver_mobile",
     *         in="path",
     *         description="receiver mobile",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="201", description="order created successfully"),
     *     @OA\Response(response="422", description="Validation errors"),
     *     @OA\Response(response="401", description="BadRequest")
     * )
     */
    public function store(OrderStoreRequest $request);

    /**
     * @OA\Put(
     *     path="/api/v1/orders/{order}/cancel",
     *     tags={"Orders"},
     *     summary="cancel a order",
     *     security={{ "ApiKeyAuth": {"type":"apiKey", "in":"header",  "name":"Authorization",} }},
     *     @OA\Parameter(
     *         name="order",
     *         in="path",
     *         description="order id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),

     *     @OA\Response(response="201", description="order canceled successfully"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
     */
    public function cancelOrder(Request $request, Order $order);

    /**
     * @OA\Put(
     *     path="/api/v1/orders/{order}/assign",
     *     tags={"Orders"},
     *     summary="assign a order to driver",
     *     security={{ "ApiKeyAuth": {"type":"apiKey", "in":"header",  "name":"Authorization",} }},
     *     @OA\Parameter(
     *         name="order",
     *         in="path",
     *         description="order id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),

     *     @OA\Response(response="201", description="order assign successfully"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
     */
    public function assign(Request $request, Order $order);


    /**
     * @OA\Put(
     *     path="/api/v1/orders/{order}/mark-delivered",
     *     tags={"Orders"},
     *     summary="set order status to delivered",
     *     security={{ "ApiKeyAuth": {"type":"apiKey", "in":"header",  "name":"Authorization",} }},
     *     @OA\Parameter(
     *         name="order",
     *         in="path",
     *         description="order id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),

     *     @OA\Response(response="201", description="order assign successfully"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
     */
    public function delivered(Request $request, Order $order);
}
