<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Role extends Enum
{
    const ADMIN = 'ADMIN';
    const MOD = 'MODERATOR';
    const MEMBER = 'MEMBER';
}
