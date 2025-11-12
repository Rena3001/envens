<?php

namespace App\Filament\Resources;

use App\Models\About;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use App\Filament\Resources\AboutResource\Pages\ManageAbout;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'About Bölməsi';
    protected static ?string $navigationGroup = 'Sayt Məzmunu';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('LangTabs')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('AZ')->schema([
                        Forms\Components\TextInput::make('title_az')->label('Başlıq (AZ)'),
                        Forms\Components\TextInput::make('subtitle_az')->label('Alt başlıq (AZ)'),
                        Forms\Components\Textarea::make('description_az')->label('Mətn (AZ)')->rows(5),
                    ]),
                    Forms\Components\Tabs\Tab::make('EN')->schema([
                        Forms\Components\TextInput::make('title_en')->label('Title (EN)'),
                        Forms\Components\TextInput::make('subtitle_en')->label('Subtitle (EN)'),
                        Forms\Components\Textarea::make('description_en')->label('Description (EN)')->rows(5),
                    ]),
                    Forms\Components\Tabs\Tab::make('RU')->schema([
                        Forms\Components\TextInput::make('title_ru')->label('Заголовок (RU)'),
                        Forms\Components\TextInput::make('subtitle_ru')->label('Подзаголовок (RU)'),
                        Forms\Components\Textarea::make('description_ru')->label('Описание (RU)')->rows(5),
                    ]),
                ])
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('image')
                ->label('Əsas şəkil')
                ->directory('about')
                ->image(),
                
            Forms\Components\Repeater::make('points')
                ->label('Əlavə maddələr')
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('text_az')
                            ->label('Mətn (AZ)')
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('text_en')
                            ->label('Text (EN)')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('text_ru')
                            ->label('Текст (RU)')
                            ->columnSpan(1),
                    ]),
                ])
                ->default([]) // boş gələndə problem olmasın
                ->columns(1)
                ->collapsible()
                ->addActionLabel('Yeni maddə əlavə et')
                ->reorderable(true)
                ->itemLabel(fn (array $state): ?string => $state['text_az'] ?? null),


            Forms\Components\TextInput::make('ceo_name')->label('Təsisçi adı'),

            Forms\Components\Tabs::make('CeoTabs')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('AZ')->schema([
                        Forms\Components\TextInput::make('ceo_title_az')->label('Vəzifə (AZ)'),
                    ]),
                    Forms\Components\Tabs\Tab::make('EN')->schema([
                        Forms\Components\TextInput::make('ceo_title_en')->label('Position (EN)'),
                    ]),
                    Forms\Components\Tabs\Tab::make('RU')->schema([
                        Forms\Components\TextInput::make('ceo_title_ru')->label('Должность (RU)'),
                    ]),
                ])
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('ceo_image')
                ->label('Təsisçi şəkli')
                ->directory('about/ceo')
                ->image(),

            Forms\Components\Toggle::make('is_active')
                ->label('Aktiv')
                ->default(true),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageAbout::route('/'),
        ];
    }
}
