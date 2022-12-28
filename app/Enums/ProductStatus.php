<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProductStatus extends Enum
{
    const ACTIVE = 'ACTIVE';
    const DEACTIVE = 'DEACTIVE';
    const DELETE = 'DELETE';
}
