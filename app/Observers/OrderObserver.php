<?php

namespace App\Observers;

use App\Enums\Order\OrderStatusEnum;
use App\Models\Order;
use App\Services\HelperService;



class OrderObserver
{

    public function __construct(
        protected HelperService $helper = new HelperService()
    ) {
    }


    public function creating(Order $order)
    {
        $order->tn = $this->helper->generateUniqeID("order", 'tn');
        // $order->status = OrderStatusEnum::WAITING_DRIVER;
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
