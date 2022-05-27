<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Filament\Resources\ClusterResource;
use App\Filament\Resources\EventResource;
use App\Models\Cluster;
use App\Models\Event;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Str;

class ClustersRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'clusters';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('description')->limit('50')->wrap(),
            ])
            ->actions([
                Tables\Actions\Action::make('edit')
                    ->url(fn (Cluster $record): string => ClusterResource::getUrl('edit', $record))
                    ->icon('heroicon-s-pencil')
            ]);
    }
}
