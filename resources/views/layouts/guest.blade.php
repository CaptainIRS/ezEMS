@inject('settings', 'App\Settings\GeneralSettings')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $settings->siteName }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @if (config('app.skin') === 'local')
        @vite(['resources/js/app.js'])
    @else
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="{{ config('app.skin') }}">
    @endif
</head>

<body>
    <div class="body">
        {{ $slot }}
    </div>
</body>

</html>
