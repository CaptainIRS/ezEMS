<?php

namespace App\Filament\Resources\TeamResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class UsersRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Fieldset::make('Profile')
                    ->relationship('profile')
                    ->schema([
                        Forms\Components\Select::make('gender')
                            ->options(['Male', 'Female']),
                        Forms\Components\Select::make('nationality')
                            ->options(['Indian', 'Other']),
                        Forms\Components\Textarea::make('address'),
                        Forms\Components\TextInput::make('city')->maxLength(255),
                        Forms\Components\TextInput::make('state')->maxLength(255),
                        Forms\Components\TextInput::make('pin_code')->numeric(),
                        Forms\Components\TextInput::make('contact_number')->maxLength(255),
                        Forms\Components\TextInput::make('degree')->maxLength(255),
                        Forms\Components\TextInput::make('year_of_study')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime(),
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
