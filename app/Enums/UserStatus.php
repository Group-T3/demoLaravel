<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const ACTIVE = 'ACTIVE';
    const DEACTIVE = 'DEACTIVE';
    const BANNER = 'BANNER';
    const DELETE = 'DELETE';
}
