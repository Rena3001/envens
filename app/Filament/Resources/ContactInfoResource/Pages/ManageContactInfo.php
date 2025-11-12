<?php

namespace App\Filament\Resources\ContactInfoResource\Pages;

use App\Filament\Resources\ContactInfoResource;
use Filament\Resources\Pages\ManageRecords;
use Filament\Actions;

class ManageContactInfo extends ManageRecords
{
    protected static string $resource = ContactInfoResource::class;

    protected static ?string $title = 'Contact Info';

    protected function getHeaderActions(): array
    {
        return [
            // Əgər hələ məlumat yoxdursa "Yenisini yarat" göstər
            Actions\CreateAction::make()
                ->label('Yeni Əlaqə Məlumatı')
                ->visible(fn() => \App\Models\ContactInfo::count() < 1),
        ];
    }

    // ✳️ Inline edit imkanı (məlumatı birbaşa cədvəldə dəyişmək üçün)
    protected function isTablePaginationEnabled(): bool
    {
        return false; // yalnız 1 məlumat olduğu üçün səhifələməni söndürürük
    }

    protected function getTableActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Düzəliş et')
                ->modalHeading('Əlaqə məlumatına düzəliş et')
                ->modalButton('Yadda saxla'),

            Actions\DeleteAction::make()
                ->label('Sil')
                ->requiresConfirmation()
                ->modalHeading('Əminsiniz?')
                ->modalButton('Bəli, sil'),
        ];
    }
}
