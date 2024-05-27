<?php

namespace App\Listeners;

use App\Enums\Order\OrderStatusEnum;
use App\Events\OrderDriverAssigned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTrip
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderDriverAssigned $event): void
    {

        $trip  = $event->driver->trips()->create(
            [
                'order_id' => $event->order->id,
                'status' => OrderStatusEnum::ASSIGNED
            ]
        );

        $event->order->update(['trip_id' => $trip->id]);
    }
}
