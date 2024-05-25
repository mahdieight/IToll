<?php

namespace App\Enums\General;

use App\Enums\Enum;

enum GenderEnum: string
{
    use Enum;

    case MALE = 'male';
    case FEMALE = 'female';
}
