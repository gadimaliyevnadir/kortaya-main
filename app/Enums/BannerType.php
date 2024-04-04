<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 */
final class BannerType extends Enum
{
    const FIRST_BANNERS_FROM_DASHBOARD = 1;
    const SECOND_BANNERS_FROM_DASHBOARD = 2;
    const THIRD_BANNERS_FROM_DASHBOARD = 3;
    const BRAND_BANNERS  = 4;
    const SOLUTION_BANNERS  = 5;
    const SKINCARE_BANNERS  = 6;
    const MAKEUP_ACCESSORY_BANNERS  = 7;
    const HAIR_BODY_BANNERS  = 8;
    const ETC_BANNERS  = 9;
}
