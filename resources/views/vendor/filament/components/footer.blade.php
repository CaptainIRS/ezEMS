@if (config('filament.layout.footer.should_show_logo'))
    <div class="flex items-center justify-center filament-footer">
        © {{ date('Y') }} {{ config('filament.brand') }}
    </div>
@endif
