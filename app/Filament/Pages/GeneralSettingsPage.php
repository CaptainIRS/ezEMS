<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Pages\SettingsPage;

class GeneralSettingsPage extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'General';

    protected function getFormSchema(): array
    {
        return [

            Forms\Components\TextInput::make('siteName')
                ->label('Site Name')
                ->required(),
            Forms\Components\Toggle::make('siteActive')
                ->label('Is Site Active?')
                ->inline(false)
                ->required(),
            Forms\Components\TextInput::make('skin')
                ->label('Skin')
                ->hint('URL to the CSS file. Enter \'local\' to use the local skin for development.')
                ->required(),
        ];
    }
}
