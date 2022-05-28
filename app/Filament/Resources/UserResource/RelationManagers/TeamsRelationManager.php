<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class TeamsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Owner')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required(),
                    // ->searchable(/),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('personal_team')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('owner.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\BooleanColumn::make('personal_team'),
                Tables\Columns\TextColumn::make('role'),
            ])
            ->filters([
                //
            ]);
    }

    public static function attachForm(Form $form): Form
    {
        return $form
            ->schema([
                static::getAttachFormRecordSelect(),
                Forms\Components\Select::make('role')->options([
                    'editor' => 'Editor',
                    'administrator' => 'Administrator',
                ])->required(),
            ]);
    }
}
