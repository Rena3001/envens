<?php

namespace App\Filament\Resources;

use App\Models\Setting;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\Pages\EditSettings;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Sayt Ayarları';
    protected static ?string $navigationGroup = 'General';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('SettingsTabs')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Əlaqə məlumatları')->schema([
                        Forms\Components\TextInput::make('address')->label('Ünvan'),
                        Forms\Components\TextInput::make('phone')->label('Telefon'),
                        Forms\Components\TextInput::make('email')->label('Email'),
                    ]),
                    Forms\Components\Tabs\Tab::make('Sosial Media')->schema([
                        Forms\Components\TextInput::make('facebook_link')->label('Facebook Link'),
                        Forms\Components\TextInput::make('twitter_link')->label('Twitter Link'),
                        Forms\Components\TextInput::make('linkedin_link')->label('LinkedIn Link'),
                        Forms\Components\TextInput::make('instagram_link')->label('Instagram Link'),
                        Forms\Components\TextInput::make('youtube_link')->label('YouTube Link'),
                    ]),
                    Forms\Components\Tabs\Tab::make('Brend və digər')->schema([
                        Forms\Components\FileUpload::make('header_logo')
                            ->label('Header Logo')
                            ->directory('settings')
                            ->image(),
                        Forms\Components\FileUpload::make('footer_logo')
                            ->label('Footer Logo')
                            ->directory('settings')
                            ->image(),
                    ]),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        // cədvəl göstərməyə ehtiyac yoxdur, çünki sadəcə 1 qeyd olacaq
        return $table->columns([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => EditSettings::route('/'),
        ];
    }
}
