@inject('settings', 'App\Settings\GeneralSettings')

<div @class([
    'filament-brand text-xl font-bold tracking-tight',
    'dark:text-white' => config('filament.dark_mode'),
])>
    {{ $settings->siteName }}
</div>
