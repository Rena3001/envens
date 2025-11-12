<?php

namespace App\Filament\Resources;

use App\Models\Translation;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Filament\Resources\TranslationResource\Pages;
use App\Filament\Resources\TranslationResource\Pages\CreateTranslation;
use App\Filament\Resources\TranslationResource\Pages\EditTranslation;
use App\Filament\Resources\TranslationResource\Pages\ListTranslations;

class TranslationResource extends Resource
{
    protected static ?string $model = Translation::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';
    protected static ?string $navigationLabel = 'Tərcümələr';
    protected static ?string $navigationGroup = 'İdarəetmə';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->label('Açar (key)')
                    ->unique(ignoreRecord: true)
                    ->required(),

                Forms\Components\TextInput::make('az')->label('AZ'),
                Forms\Components\TextInput::make('en')->label('EN'),
                Forms\Components\TextInput::make('ru')->label('RU'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('key')->label('Açar'),
            Tables\Columns\TextColumn::make('az')->label('AZ'),
            Tables\Columns\TextColumn::make('en')->label('EN'),
            Tables\Columns\TextColumn::make('ru')->label('RU'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTranslations::route('/'),
            'create' => CreateTranslation::route('/create'),
            'edit' => EditTranslation::route('/{record}/edit'),
        ];
    }
}
