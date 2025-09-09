<?php

namespace App\Enum;

enum ProductCategoryEnum: string
{
    case KNITWEAR = 'knitwear';
    case SWEATER = 'sweater';
    case WOVEN_DENIM = 'woven-denim';
    case WOVEN_NON_DENIM = 'woven-non-denim';
    case WOVEN_OUTERWEAR = 'woven-outerwear';
    case ACTIVEWEAR = 'activewear';
    case LINGERIE = 'lingerie';
    case WORKWEAR = 'workwear';
    case SLEEPWEAR = 'sleepwear';
    case LEATHER_ITEMS = 'leather-items';
    case HANDICRAFT = 'handicraft';
    case HOME_TEXTILE = 'home-textile';
}
