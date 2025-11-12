<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use App\Models\About;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class ManageAbout extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = AboutResource::class;
    protected static string $view = 'filament.resources.about-resource.pages.manage-about';

    public ?array $data = []; // form state saxlanır
    public About $record;

    public function mount(): void
    {
        $this->record = About::firstOrCreate([]);
        $this->form->fill($this->record->toArray());
    }

    public function form(Form $form): Form
    {
        // 💡 Burada getSchema() istifadə etmirik
        return AboutResource::form($form)
            ->statePath('data');
    }

    public function save(): void
    {
        $this->record->update($this->form->getState());

        Notification::make()
            ->title('Məlumat uğurla yeniləndi ✅')
            ->success()
            ->send();
    }
}
