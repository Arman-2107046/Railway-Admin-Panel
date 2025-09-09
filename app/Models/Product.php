<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enum\ProductGenderEnum;
use App\Enum\ProductCategoryEnum;

class Product extends Model
{
    protected $fillable = [
        'name',
        'gender',    // store value from ProductGenderEnum
        'category',  // store value from ProductCategoryEnum
        'image',     // store image path or filename
    ];
}
