<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInfoResource\Pages;
use App\Models\ContactInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Əlaqə Məlumatları';
    protected static ?string $navigationGroup = 'Sayt Məzmunu';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('LangTabs')
                ->tabs([
                    Tabs\Tab::make('AZ')->schema([
                        TextInput::make('visit_title_az')->label('Ofis Başlığı (AZ)'),
                        Textarea::make('visit_text_az')->label('Ofis Mətni (AZ)')->rows(2),
                        Textarea::make('address_az')->label('Ünvan (AZ)')->rows(2),

                        TextInput::make('call_title_az')->label('Zəng Başlığı (AZ)'),
                        Textarea::make('call_text_az')->label('Zəng Mətni (AZ)')->rows(2),

                        TextInput::make('email_title_az')->label('Email Başlığı (AZ)'),
                        Textarea::make('email_text_az')->label('Email Mətni (AZ)')->rows(2),
                    ]),

                    Tabs\Tab::make('EN')->schema([
                        TextInput::make('visit_title_en')->label('Office Title (EN)'),
                        Textarea::make('visit_text_en')->label('Office Text (EN)')->rows(2),
                        Textarea::make('address_en')->label('Address (EN)')->rows(2),

                        TextInput::make('call_title_en')->label('Call Title (EN)'),
                        Textarea::make('call_text_en')->label('Call Text (EN)')->rows(2),

                        TextInput::make('email_title_en')->label('Email Title (EN)'),
                        Textarea::make('email_text_en')->label('Email Text (EN)')->rows(2),
                    ]),

                    Tabs\Tab::make('RU')->schema([
                        TextInput::make('visit_title_ru')->label('Заголовок офиса (RU)'),
                        Textarea::make('visit_text_ru')->label('Текст офиса (RU)')->rows(2),
                        Textarea::make('address_ru')->label('Адрес (RU)')->rows(2),

                        TextInput::make('call_title_ru')->label('Заголовок звонка (RU)'),
                        Textarea::make('call_text_ru')->label('Текст звонка (RU)')->rows(2),

                        TextInput::make('email_title_ru')->label('Заголовок почты (RU)'),
                        Textarea::make('email_text_ru')->label('Текст почты (RU)')->rows(2),
                    ]),
                ])
                ->columnSpanFull(),

            TextInput::make('map_url')->label('Google Map URL')->url(),

            TextInput::make('phone_1')->label('Telefon 1'),
            TextInput::make('phone_2')->label('Telefon 2'),

            TextInput::make('email_1')->label('Email 1'),
            TextInput::make('email_2')->label('Email 2'),

            Toggle::make('is_active')->label('Aktiv')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('visit_title_az')->label('Başlıq (AZ)'),
            Tables\Columns\TextColumn::make('phone_1')->label('Telefon'),
            Tables\Columns\TextColumn::make('email_1')->label('Email'),
            Tables\Columns\IconColumn::make('is_active')->boolean()->label('Status'),
        ])->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageContactInfo::route('/'),
            'edit' => Pages\EditContactInfo::route('/{record}/edit'),
        ];
    }
}
