<?php

namespace App\Observers;

use App\Models\Trip;
use App\Services\HelperService;
use Carbon\Carbon;

class TripObserver
{

    public function __construct(
        protected HelperService $helper = new HelperService()
    ) {
    }


    public function creating(Trip $trip)
    {
        $trip->start_at = Carbon::now();
        $trip->fare = rand(100, 1000);
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Trip $trip): void
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Trip $trip): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Trip $trip): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Trip $trip): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Trip $trip): void
    {
        //
    }
}
