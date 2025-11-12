<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Xidmətlər';
    protected static ?string $pluralModelLabel = 'Xidmətlər';
    protected static ?string $modelLabel = 'Xidmət';
    protected static ?string $navigationGroup = 'Sayt Məzmunu';

    public static function form(Form $form): Form
    {
        return $form->schema([
          FileUpload::make('image')
            ->label('Şəkil')
            ->disk('public') // <- vacibdir! 'public' diskinə yazacaq
            ->directory('services')
            ->image()
            ->preserveFilenames() // şəkil adını saxlayır
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(4096)
            ->required(),


            Forms\Components\Tabs::make('LangTabs')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('AZ')->schema([
                        TextInput::make('title_az')->label('Başlıq (AZ)')->required(),
                        TextInput::make('category_az')->label('Kateqoriya (AZ)'),
                        Textarea::make('description_az')->label('Qısa mətn (AZ)')->rows(3),
                        Textarea::make('details_az')->label('Ətraflı mətn (AZ)')->rows(6),
                    ]),
                    Forms\Components\Tabs\Tab::make('EN')->schema([
                        TextInput::make('title_en')->label('Title (EN)'),
                        TextInput::make('category_en')->label('Category (EN)'),
                        Textarea::make('description_en')->label('Short Text (EN)')->rows(3),
                        Textarea::make('details_en')->label('Details (EN)')->rows(6),
                    ]),
                    Forms\Components\Tabs\Tab::make('RU')->schema([
                        TextInput::make('title_ru')->label('Заголовок (RU)'),
                        TextInput::make('category_ru')->label('Категория (RU)'),
                        Textarea::make('description_ru')->label('Краткий текст (RU)')->rows(3),
                        Textarea::make('details_ru')->label('Подробный текст (RU)')->rows(6),
                    ]),
                ])
                ->columnSpanFull(),

            DatePicker::make('date')
                ->label('Tarix')
                ->default(now()),

            Toggle::make('is_active')
                ->label('Aktiv')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('image')->label('Şəkil')->square(),
            TextColumn::make('title_az')->label('Başlıq (AZ)')->searchable(),
            TextColumn::make('category_az')->label('Kateqoriya (AZ)')->limit(25),
            TextColumn::make('date')->label('Tarix')->date('d M, Y'),
            IconColumn::make('is_active')->boolean()->label('Status'),
        ])->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
