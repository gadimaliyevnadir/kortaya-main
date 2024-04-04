<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderType extends Enum
{
//    const PENDING = 1;
    const AWAITING_PAYMENT  = 1;

    const APPROVED = 2;
    const PREPARING_SHIPMENT = 3;

//    const CANCELLED = 3;
    const IN_TRANSIT  = 4;

    const  DELIVERED  = 5;

    const FAILED  = 6;
}
