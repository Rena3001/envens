<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'date', 'is_active',
        'title', 'category', 'description', 'details',
        'title_az', 'title_en', 'title_ru',
        'category_az', 'category_en', 'category_ru',
        'description_az', 'description_en', 'description_ru',
        'details_az', 'details_en', 'details_ru',
    ];
}
