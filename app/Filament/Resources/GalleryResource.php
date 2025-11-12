<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\Pages\CreateGallery;
use App\Filament\Resources\GalleryResource\Pages\EditGallery;
use App\Filament\Resources\GalleryResource\Pages\ListGalleries;
use App\Models\Gallery;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Qalereya';
    protected static ?string $pluralModelLabel = 'Qalereya Şəkilləri';
    protected static ?string $modelLabel = 'Şəkil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('Şəkil')
                    ->directory('gallery')
                    ->image()
                    ->required(),

                TextInput::make('title')
                    ->label('Başlıq')
                    ->maxLength(255),

                TextInput::make('category')
                    ->label('Kateqoriya')
                    ->placeholder('məs: Event, Product, Office'),

                Toggle::make('is_active')
                    ->label('Aktiv')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Şəkil')->square(),
                TextColumn::make('title')->label('Başlıq')->searchable(),
                TextColumn::make('category')->label('Kateqoriya'),
                IconColumn::make('is_active')->boolean()->label('Status'),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGalleries::route('/'),
            'create' => CreateGallery::route('/create'),
            'edit' => EditGallery::route('/{record}/edit'),
        ];
    }
}
