<?php

namespace App\Enum;

enum ProductGenderEnum: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    case UNISEX = 'unisex';
    case KIDS = 'kids';
    case NOT_APPLICABLE = 'not-applicable';
}
