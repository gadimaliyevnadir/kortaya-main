<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductStatusType extends Enum
{
    const BEST_SELLER_PRODUCTS = 1;
    const POPULAR_PRODUCTS = 2;
    const NEW_PRODUCTS = 3;
    const POPULAR_PHONES = 4;
}
