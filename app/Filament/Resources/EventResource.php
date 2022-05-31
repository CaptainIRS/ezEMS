<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Cluster;
use App\Models\Event;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Str;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Events';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('General')
                    ->schema([
                        Forms\Components\BelongsToSelect::make('cluster_id')
                            ->relationship('cluster', 'name')
                            ->getOptionLabelFromRecordUsing(fn (Cluster $record) => $record->category()->get()->first()->edition()->get()->first()->year . ' → ' . $record->category()->get()->first()->name . ' → ' . $record->name)
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
                        Forms\Components\TextInput::make('max_participants')->numeric(),
                        Forms\Components\RichEditor::make('description')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'blockquote',
                                'bold',
                                'italic',
                                'h2',
                                'h3',
                                'bulletList',
                                'orderedList',
                            ])
                            ->required()
                            ->maxLength(65535),
                        Forms\Components\RichEditor::make('rules')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'blockquote',
                                'bold',
                                'italic',
                                'h2',
                                'h3',
                                'bulletList',
                                'orderedList',
                            ])
                            ->maxLength(65535),
                        Forms\Components\RichEditor::make('prizes')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'blockquote',
                                'bold',
                                'italic',
                                'h2',
                                'h3',
                                'bulletList',
                                'orderedList',
                            ])
                            ->maxLength(65535),
                        Forms\Components\RichEditor::make('resources')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'blockquote',
                                'bold',
                                'italic',
                                'h2',
                                'h3',
                                'bulletList',
                                'orderedList',
                            ])
                            ->maxLength(65535),
                        Forms\Components\TextInput::make('registration_fee')->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money('₹')),
                        Forms\Components\RichEditor::make('contact')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'blockquote',
                                'bold',
                                'italic',
                                'h2',
                                'h3',
                                'bulletList',
                                'orderedList',
                            ])
                            ->maxLength(65535),
                    ]),

            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cluster.category.edition.year')->label('Year'),
                Tables\Columns\TextColumn::make('cluster.category.name')->label('Category'),
                Tables\Columns\TextColumn::make('cluster.name'),
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AnnouncementsRelationManager::class,
            RelationManagers\FaqsRelationManager::class,
            RelationManagers\SponsorsRelationManager::class,
            RelationManagers\StagesRelationManager::class,
            RelationManagers\TeamsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
