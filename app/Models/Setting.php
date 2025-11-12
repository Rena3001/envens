<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'email',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'instagram_link',
        'youtube_link',
        'header_logo',
        'footer_logo',
    ];

    /**
     * Sistem üzrə tək sətir (id=1) ilə işləyirik
     */
    public static function firstOrDefault()
    {
        return static::first() ?? static::create();
    }

    /**
     * Qısa çağırış üçün — Setting::get('phone')
     */
    public static function get($key, $default = null)
    {
        $setting = static::first();
        return $setting?->$key ?? $default;
    }
}
