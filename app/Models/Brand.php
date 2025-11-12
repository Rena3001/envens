<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'link',
        'is_active',
        'order',
    ];

    /**
     * Brendin şəkil URL-i (tam yol).
     */
    public function getLogoUrlAttribute()
    {
        if ($this->logo && file_exists(storage_path('app/public/' . $this->logo))) {
            return asset('storage/' . $this->logo);
        }
        return asset('assets/images/brand/default.png'); // ehtiyat şəkil
    }
}
