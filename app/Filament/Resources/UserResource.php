<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\TernaryFilter;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Users';

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
                        Forms\Components\BelongsToSelect::make('college_id')
                            ->relationship('college', 'name'),
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
            ])
            ->filters([
                TernaryFilter::make('email_verified_at')->nullable()->label('Email Verified'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            UserResource\RelationManagers\TeamsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
