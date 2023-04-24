@inject('settings', 'App\Settings\GeneralSettings')

@if (config('filament.layout.footer.should_show_logo'))
    <div class="flex items-center justify-center filament-footer">
        © {{ date('Y') }} {{ $settings->siteName }}
    </div>
@endif
