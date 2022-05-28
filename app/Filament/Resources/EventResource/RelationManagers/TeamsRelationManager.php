<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Models\Event;
use App\Models\Stage;
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
                Forms\Components\Select::make('stage_id')
                    ->required()
                    ->label('Stage')
                    ->helperText('Select the current stage this team is participating in.')
                    ->options(function (callable $get) {
                        return Event::whereId($get('event_id'))->get()->first()->stages()->pluck('name', 'id');
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\BooleanColumn::make('personal_team'),
                Tables\Columns\TextColumn::make('payment_status'),
                Tables\Columns\TextColumn::make('stage_id')
                    ->label('Stage')
                    ->formatStateUsing(fn (string $state): string => Stage::find($state)->name),
            ])
            ->filters([])
            ->headerActions([]);
    }
}
