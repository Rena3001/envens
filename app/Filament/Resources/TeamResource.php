<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages\CreateTeam;
use App\Filament\Resources\TeamResource\Pages\EditTeam;
use App\Filament\Resources\TeamResource\Pages\ListTeams;
use App\Models\Team;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Komanda üzvləri';
    protected static ?string $pluralLabel = 'Komanda üzvləri';
    protected static ?string $modelLabel = 'Komanda üzvü';
    protected static ?string $navigationGroup = 'Sayt Məzmunu';

    public static function form(Form $form): Form
    {
        return $form->schema([
            FileUpload::make('image')
                ->label('Şəkil')
                ->directory('team')
                ->image()
                ->required(),

            Forms\Components\Tabs::make('LangTabs')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('AZ')->schema([
                        TextInput::make('name_az')->label('Ad və Soyad (AZ)')->required(),
                        TextInput::make('position_az')->label('Vəzifə (AZ)'),
                    ]),
                    Forms\Components\Tabs\Tab::make('EN')->schema([
                        TextInput::make('name_en')->label('Name (EN)'),
                        TextInput::make('position_en')->label('Position (EN)'),
                    ]),
                    Forms\Components\Tabs\Tab::make('RU')->schema([
                        TextInput::make('name_ru')->label('Имя и Фамилия (RU)'),
                        TextInput::make('position_ru')->label('Должность (RU)'),
                    ]),
                ])
                ->columnSpanFull(),

            TextInput::make('twitter')->label('Twitter linki'),
            TextInput::make('facebook')->label('Facebook linki'),
            TextInput::make('instagram')->label('Instagram linki'),

            Toggle::make('is_active')->label('Aktiv')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Şəkil')->circular(),
                Tables\Columns\TextColumn::make('name_az')->label('Ad (AZ)'),
                Tables\Columns\TextColumn::make('position_az')->label('Vəzifə (AZ)'),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Status'),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTeams::route('/'),
            'create' => CreateTeam::route('/create'),
            'edit' => EditTeam::route('/{record}/edit'),
        ];
    }
}
