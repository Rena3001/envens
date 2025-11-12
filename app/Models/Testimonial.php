<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
    'image',
    'rating',
    'is_active',
    'name', 'position', 'message',
    'name_az', 'name_en', 'name_ru',
    'position_az', 'position_en', 'position_ru',
    'message_az', 'message_en', 'message_ru',
];

}
