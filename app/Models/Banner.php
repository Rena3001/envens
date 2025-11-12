<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_az', 'title_en', 'title_ru',
        'subtitle_az', 'subtitle_en', 'subtitle_ru',
        'button_text', 'button_link',
        'image', 'is_active',
    ];

    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('assets/images/no-image.jpg');
    }

    public function getTranslatedTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'title_' . $locale} ?? $this->title_az;
    }

    public function getTranslatedSubtitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'subtitle_' . $locale} ?? $this->subtitle_az;
    }
}
