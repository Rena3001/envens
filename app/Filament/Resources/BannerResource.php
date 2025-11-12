<?php
namespace App\Filament\Resources;

use App\Models\Banner;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\Pages\CreateBanner;
use App\Filament\Resources\BannerResource\Pages\EditBanner;
use App\Filament\Resources\BannerResource\Pages\ListBanners;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationLabel = 'Banners';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('LangTabs')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('AZ')->schema([
                        Forms\Components\TextInput::make('title_az')->label('Başlıq (AZ)')->required(),
                        Forms\Components\TextInput::make('subtitle_az')->label('Alt Başlıq (AZ)'),
                    ]),
                    Forms\Components\Tabs\Tab::make('EN')->schema([
                        Forms\Components\TextInput::make('title_en')->label('Title (EN)'),
                        Forms\Components\TextInput::make('subtitle_en')->label('Subtitle (EN)'),
                    ]),
                    Forms\Components\Tabs\Tab::make('RU')->schema([
                        Forms\Components\TextInput::make('title_ru')->label('Заголовок (RU)'),
                        Forms\Components\TextInput::make('subtitle_ru')->label('Подзаголовок (RU)'),
                    ]),
                ])
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('image')
                ->label('Şəkil')
                ->image()
                ->directory('banners')
                ->required(),

            Forms\Components\TextInput::make('button_text')->label('Düymə mətni'),
            Forms\Components\TextInput::make('button_link')->label('Düymə linki (URL)'),

            Forms\Components\Toggle::make('is_active')->label('Aktiv?'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')->label('Şəkil')->disk('public')->square(),
            Tables\Columns\TextColumn::make('title_az')->label('Başlıq (AZ)')->limit(30),
            Tables\Columns\IconColumn::make('is_active')->boolean()->label('Status'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBanners::route('/'),
            'create' => CreateBanner::route('/create'),
            'edit' => EditBanner::route('/{record}/edit'),
        ];
    }
}
