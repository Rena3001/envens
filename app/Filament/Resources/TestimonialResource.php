<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationLabel = 'Müştəri rəyləri';
    protected static ?string $pluralLabel = 'Müştəri rəyləri';
    protected static ?string $modelLabel = 'Rəy';
    protected static ?string $navigationGroup = 'Sayt Məzmunu';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            FileUpload::make('image')
                ->label('Şəkil')
                ->directory('testimonials')
                ->image()
                ->imageEditor()
                ->required(),

            Forms\Components\Tabs::make('LangTabs')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('AZ')->schema([
                        TextInput::make('name_az')->label('Ad və Soyad (AZ)')->required(),
                        TextInput::make('position_az')->label('Vəzifə və ya şirkət (AZ)'),
                        Textarea::make('message_az')->label('Rəy mətni (AZ)')->rows(4)->required(),
                    ]),
                    Forms\Components\Tabs\Tab::make('EN')->schema([
                        TextInput::make('name_en')->label('Name (EN)'),
                        TextInput::make('position_en')->label('Position / Company (EN)'),
                        Textarea::make('message_en')->label('Message (EN)')->rows(4),
                    ]),
                    Forms\Components\Tabs\Tab::make('RU')->schema([
                        TextInput::make('name_ru')->label('Имя и фамилия (RU)'),
                        TextInput::make('position_ru')->label('Должность или компания (RU)'),
                        Textarea::make('message_ru')->label('Отзыв (RU)')->rows(4),
                    ]),
                ])
                ->columnSpanFull(),

            TextInput::make('rating')
                ->label('Reytinq (1–5)')
                ->numeric()
                ->default(5)
                ->minValue(1)
                ->maxValue(5),

            Toggle::make('is_active')
                ->label('Aktiv')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Şəkil')
                    ->circular()
                    ->height(50)
                    ->width(50),

                TextColumn::make('name_az')->label('Ad (AZ)')->searchable(),
                TextColumn::make('position_az')->label('Vəzifə (AZ)')->limit(25),
                TextColumn::make('rating')->label('Reytinq'),

                IconColumn::make('is_active')->label('Status')->boolean(),

                TextColumn::make('created_at')
                    ->label('Tarix')
                    ->dateTime('d.m.Y')
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
