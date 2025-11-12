<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\Setting;

class EditSettings extends EditRecord
{
    protected static string $resource = SettingResource::class;

    public function mount($record = null): void
    {
        // Əgər Setting cədvəlində hələ qeyd yoxdursa, yeni yaradılır
        $existing = Setting::first();

        if (!$existing) {
            $existing = Setting::create([
                'address' => 'Baku, Azerbaijan',
                'phone' => '+994 50 000 00 00',
                'email' => 'info@example.com',
            ]);
        }

        // Mütləq parent::mount() öncəsi bu sətir olmalıdır
        $this->record = $existing;
        parent::mount($existing->getKey());
    }

    protected function getRedirectUrl(): string
    {
        // Saxladıqdan sonra eyni səhifəyə qaytarır
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Sayt Ayarları';
    }
}
