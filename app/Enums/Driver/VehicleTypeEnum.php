<?php

namespace App\Enums\Driver;

use App\Enums\Enum;

enum VehicleTypeEnum: string
{
    use Enum;

    case MOTORCYCLE = 'motorcycle';
    case PICKUP_TRUCK = 'pickup_truck';
    case DRIVING = 'driving';
}
