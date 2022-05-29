<?php

namespace App\Filament\Resources\EditionResource\RelationManagers;

use App\Filament\Resources\CategoryResource;
use App\Models\Category;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Str;

class CategoriesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'categories';

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
                Tables\Columns\TextColumn::make('description')->limit('50')->wrap(),
            ])
            ->filters([
                //
            ])
            ->actions(array_merge($table->getActions(), [
                Tables\Actions\Action::make('edit')
                    ->url(fn (Category $record): string => CategoryResource::getUrl('edit', $record))
                    ->icon('heroicon-s-pencil'),
            ]));
    }
}
