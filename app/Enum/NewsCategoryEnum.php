<?php

namespace App\Enum;

enum NewsCategoryEnum: string
{
    case BUSINESS = 'Business & Industry';
    case TECHNOLOGY='Techlonogy';
    case SUSTAINABILITY='Sustainability & Trends';
    case EDUCATION='Education';
    case OTHERS='Others';
}
