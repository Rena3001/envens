<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';

    protected $fillable = [
        'title_az', 'title_en', 'title_ru',
        'subtitle_az', 'subtitle_en', 'subtitle_ru',
        'description_az', 'description_en', 'description_ru',
        'image', 'points', 'ceo_name', 'ceo_title', 'ceo_image', 'is_active'
    ];

    protected $casts = [
        'points' => 'array',
        'is_active' => 'boolean',
    ];

    public function getTranslated($field)
    {
        $locale = app()->getLocale();
        return $this->{$field . '_' . $locale} ?? $this->{$field . '_az'};
    }
    public function getPointsTranslated(): array
    {
        $lang = app()->getLocale();
        return collect($this->points ?? [])
            ->map(fn($p) => $p['text_' . $lang] ?? '')
            ->filter()
            ->values()
            ->toArray();
    }

}
