<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 'position', 'image',
    'name_az', 'name_en', 'name_ru',
    'position_az', 'position_en', 'position_ru',
    'facebook', 'instagram', 'twitter',
];

}
