<?php

namespace App\Enums\Order;

use App\Enums\Enum;

enum OrderStatusEnum: string
{
    use Enum;

    case DELIVERED = 'delivered';
    case PICKED = 'picked';
    case CANCELED = 'canceled';
    case ASSIGNED = 'assigned';
    case WAITING_DRIVER = 'waiting_driver';
}
