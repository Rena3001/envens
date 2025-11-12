<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventRequestResource\Pages;
use App\Filament\Resources\EventRequestResource\Pages\ListEventRequests;
use App\Filament\Resources\EventRequestResource\Pages\ViewEventRequest;
use App\Models\EventRequest;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class EventRequestResource extends Resource
{
    protected static ?string $model = EventRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Müştəri Sorğuları';
    protected static ?string $navigationLabel = 'Tədbir Sorğuları';
    protected static ?string $pluralLabel = 'Tədbir Sorğuları';
    protected static ?string $modelLabel = 'Tədbir Sorğusu';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Ad Soyad')->required()->maxLength(255),
            Forms\Components\TextInput::make('email')->label('Email')->email()->required(),
            Forms\Components\TextInput::make('event_type')->label('Tədbir növü'),
            Forms\Components\TextInput::make('guests')->label('Qonaq sayı'),
            Forms\Components\DatePicker::make('date')->label('Tədbir tarixi'),
            Forms\Components\Textarea::make('message')->label('Qeyd və ya mesaj')->columnSpanFull(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Ad Soyad')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('event_type')->label('Tədbir növü')->sortable(),
                Tables\Columns\TextColumn::make('guests')->label('Qonaq sayı'),
                Tables\Columns\TextColumn::make('date')->label('Tarix')->date(),
                Tables\Columns\TextColumn::make('created_at')->label('Daxil olma tarixi')->dateTime(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEventRequests::route('/'),
            'view'  => ViewEventRequest::route('/{record}'),
        ];
    }
}
