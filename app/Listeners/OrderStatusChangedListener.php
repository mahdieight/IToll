<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;

class OrderStatusChangedListener implements ShouldQueue
{
    use Dispatchable;

    public function handle(OrderStatusChanged $event)
    {
        $response = Http::get($event->order->collection->webhook_url, [
            'status' => 'Order status has been changed',
            'new_status' => $event->order->status
        ]);

        // dd($response);
    }
}