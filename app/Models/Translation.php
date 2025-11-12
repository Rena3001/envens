<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['key', 'az', 'en', 'ru'];

    public static function getText($key)
    {
        $lang = app()->getLocale(); // cari dil
        $translation = static::where('key', $key)->first();

        return $translation ? ($translation->$lang ?? $translation->az ?? $key) : $key;
    }
}
