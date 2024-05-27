<?php

use App\Http\Controllers\API\V1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["prefix" => "v1"], function () {

    Route::group(["middleware" => ['collection']], function () {
        Route::post('/orders',  [OrderController::class, 'store']);
        Route::put('/orders/{order}/cancel', [OrderController::class, 'cancelOrder']);
    });


    Route::group(["middleware" => ['driver']], function () {
        Route::get('/orders',  [OrderController::class, 'index']);
        Route::put('/orders/{order}/assign' ,[OrderController::class, 'assign']);
        Route::put('/orders/{order}/mark-delivered' ,[OrderController::class, 'delivered']);
    });
});
