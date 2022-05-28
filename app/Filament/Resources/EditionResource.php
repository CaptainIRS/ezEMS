<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EditionResource\Pages;
use App\Models\Edition;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class EditionResource extends Resource
{
    protected static ?string $model = Edition::class;

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationGroup = 'Events';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('General')
                    ->schema([
                        Forms\Components\TextInput::make('year')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('start_time')
                            ->displayFormat('d M Y H:i')
                            ->required(),
                        Forms\Components\DateTimePicker::make('end_time')
                            ->displayFormat('d M Y H:i')
                            ->required(),
                    ])
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year'),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('end_time')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            EditionResource\RelationManagers\CategoriesRelationManager::class,
            EditionResource\RelationManagers\NewsRelationManager::class,
            EditionResource\RelationManagers\SponsorsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEditions::route('/'),
            'create' => Pages\CreateEdition::route('/create'),
            'edit' => Pages\EditEdition::route('/{record}/edit'),
        ];
    }
}
