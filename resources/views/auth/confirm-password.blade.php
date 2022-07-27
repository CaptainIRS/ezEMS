<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="auth-header">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-validation-errors class="auth-validation-errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="auth-input-group">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="auth-text-input" type="password" name="password" required
                    autocomplete="current-password" autofocus />
            </div>

            <div class="auth-action-button-container">
                <x-button class="auth-button">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
