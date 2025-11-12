<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_title_az', 'visit_title_en', 'visit_title_ru',
        'visit_text_az', 'visit_text_en', 'visit_text_ru',
        'address_az', 'address_en', 'address_ru',
        'map_url',
        'phone_1', 'phone_2', 'email_1', 'email_2',
        'call_title_az', 'call_title_en', 'call_title_ru',
        'call_text_az', 'call_text_en', 'call_text_ru',
        'email_title_az', 'email_title_en', 'email_title_ru',
        'email_text_az', 'email_text_en', 'email_text_ru',
        'is_active'
    ];
}
