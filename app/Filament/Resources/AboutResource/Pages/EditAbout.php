<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use Filament\Resources\Pages\EditRecord;

class EditAbout extends EditRecord
{
    protected static string $resource = AboutResource::class;

    protected function getRedirectUrl(): string
    {
        // Yalnız eyni səhifəyə yönləndirəcək (index yoxdur)
        return $this->getResource()::getUrl('edit', ['record' => $this->record->id]);
    }

    /** 
     * Əgər Filament default olaraq index-ə yönləndirməyə çalışsa, 
     * bu metod override edilir və səhifə yenilənir.
     */
    protected function getSavedNotificationRedirectUrl(): ?string
    {
        return $this->getRedirectUrl();
    }

    protected function getSaveRedirectUrl(): string
    {
        return $this->getRedirectUrl();
    }
}
