<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClusterResource\Pages;
use App\Models\Category;
use App\Models\Cluster;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Str;

class ClusterResource extends Resource
{
    protected static ?string $model = Cluster::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Events';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('category_id')
                    ->relationship('category', 'name', fn (Builder $query) => $query)
                    ->getOptionLabelFromRecordUsing(fn (Category $record) => $record->edition()->get()->first()->year.' → '.$record->name)
                    ->required(),
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
                Tables\Columns\TextColumn::make('edition.year')->label('Year'),
                Tables\Columns\TextColumn::make('category.name')->label('Category'),
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([]);
    }

    public static function getRelations(): array
    {
        return [
            ClusterResource\RelationManagers\EventsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClusters::route('/'),
            'create' => Pages\CreateCluster::route('/create'),
            'edit' => Pages\EditCluster::route('/{record}/edit'),
        ];
    }
}
