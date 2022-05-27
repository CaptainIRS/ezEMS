<?php

namespace App\Filament\Resources\EditionResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class NewsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'news';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->maxLength(65535),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('edition.year'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('content')->limit('50')->wrap(),
            ])
            ->filters([
                //
            ]);
    }
}
