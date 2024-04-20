<?php

namespace App\Enum;

enum DroneState: string
{
    case IDLE = 'idle';

    case LOADING = 'loading';

    case LOADED = 'loaded';

    case DELIVERING = 'delivering';

    case DELIVERED = 'delivered';

    case RETURNING = 'returning';
}
