<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="auth-validation-errors" />

        @if (session('status'))
            <div class="auth-status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="auth-input-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="auth-text-input" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="auth-input-group">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="auth-text-input" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="auth-input-group">
                <label for="remember_me" class="remember-me-label">
                    <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                    <span class="remember-me-text">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="auth-action-button-container">
                @if (Route::has('password.request'))
                    <a class="forgot-password-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="auth-button">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>

        @if (JoelButcher\Socialstream\Socialstream::show())
            <x-socialstream-providers />
        @endif
    </x-authentication-card>
</x-guest-layout>
