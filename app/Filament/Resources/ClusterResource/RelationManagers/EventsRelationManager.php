<?php

namespace App\Filament\Resources\ClusterResource\RelationManagers;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Str;

class EventsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'events';

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
                Forms\Components\Textarea::make('rules')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('prizes')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('resources')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('max_participants'),
                Forms\Components\TextInput::make('registration_fee')->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money('₹')),
                Forms\Components\Textarea::make('contact')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')->limit('50')->wrap(),
            ])
            ->actions([
                Tables\Actions\Action::make('edit')
                    ->url(fn (Event $record): string => EventResource::getUrl('edit', $record))
                    ->icon('heroicon-s-pencil')
            ]);
    }
}
