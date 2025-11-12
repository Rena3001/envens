<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title', 'category',
        'title_az', 'title_en', 'title_ru',
        'category_az', 'category_en', 'category_ru',
        'is_active',
    ];

    public function getTranslated($field)
    {
        $locale = app()->getLocale();
        $localizedField = "{$field}_{$locale}";
        return $this->$localizedField ?? $this->{$field . '_az'};
    }

}
