<?php

namespace App\Enums\Collection;

use App\Enums\Enum;

enum CollectionStatusEnum: string
{
    use Enum;

    case BLOCKED = 'blocked';
    case PENDDING = 'pendding';
    case ACTIVE = 'active';
    case DEACTIVE = 'deactive';
}
