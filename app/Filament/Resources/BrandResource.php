<?php

namespace App\Filament\Resources;

use App\Models\Brand;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\Pages\CreateBrand;
use App\Filament\Resources\BrandResource\Pages\EditBrand;
use App\Filament\Resources\BrandResource\Pages\ListBrands;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationLabel = 'Brendlər';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('logo')
                ->label('Brend Şəkli')
                ->directory('brands')
                ->image()
                ->required(),

            Forms\Components\TextInput::make('name')
                ->label('Brend adı')
                ->maxLength(255),

            Forms\Components\TextInput::make('link')
                ->label('Brend linki (URL)')
                ->url()
                ->placeholder('https://example.com'),

            Forms\Components\Toggle::make('is_active')
                ->label('Aktiv?')
                ->default(true),

            Forms\Components\TextInput::make('order')
                ->numeric()
                ->label('Sıra nömrəsi')
                ->default(0),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('logo')
                ->label('Şəkil')
                ->disk('public')
                ->square(),

            Tables\Columns\TextColumn::make('name')->label('Ad'),
            Tables\Columns\TextColumn::make('link')->label('Keçid')->limit(30),
            Tables\Columns\IconColumn::make('is_active')->boolean()->label('Status'),
        ])
        ->defaultSort('order')
        ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBrands::route('/'),
            'create' => CreateBrand::route('/create'),
            'edit' => EditBrand::route('/{record}/edit'),
        ];
    }
}
