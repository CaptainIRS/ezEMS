<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Forms\Components\RichEditor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Events',
                'Users',
                'Data',
            ]);
        });

        RichEditor::configureUsing(function (RichEditor $editor): void {
            $editor->extraAttributes([
                'style' => 'max-width: calc(100vw - 80px)',
            ]);
        });
    }
}
