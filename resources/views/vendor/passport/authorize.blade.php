<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - Authorization</title>

    @if (config('app.skin') === 'local')
        @vite(['resources/js/app.js'])
    @else
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="{{ config('app.skin') }}">
    @endif
</head>

<body class="passport-authorize">
    <div class="authorization-backdrop"></div>
    <div class="authorization-container">
        <div class="header">
            Authorization Request
        </div>
        <div class="body">
            <!-- Introduction -->
            <p><strong>{{ $client->name }}</strong> is requesting permission to access your account.</p>

            <!-- Scope List -->
            @if (count($scopes) > 0)
                <div class="scopes">
                    <p><strong>This application will be able to:</strong></p>

                    <ul>
                        @foreach ($scopes as $scope)
                            <li>{{ $scope->description }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="buttons">
                <!-- Authorize Button -->
                <form method="post" action="{{ route('passport.authorizations.approve') }}">
                    @csrf

                    <input type="hidden" name="state" value="{{ $request->state }}">
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <input type="hidden" name="auth_token" value="{{ $authToken }}">
                    <button type="submit" class="button">Authorize</button>
                </form>

                <!-- Cancel Button -->
                <form method="post" action="{{ route('passport.authorizations.deny') }}">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="state" value="{{ $request->state }}">
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <input type="hidden" name="auth_token" value="{{ $authToken }}">
                    <button class="danger-button">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
