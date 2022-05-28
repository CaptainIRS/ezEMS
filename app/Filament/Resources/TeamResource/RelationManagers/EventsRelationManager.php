<?php

namespace App\Filament\Resources\TeamResource\RelationManagers;

use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class EventsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'events';

    protected static ?string $recordTitleAttribute = 'name';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cluster.category.edition.year')->label('Year'),
                Tables\Columns\TextColumn::make('cluster.category.name')->label('Category'),
                Tables\Columns\TextColumn::make('cluster.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('payment_status'),
            ])
            ->filters([])
            ->headerActions([]);
    }
}
