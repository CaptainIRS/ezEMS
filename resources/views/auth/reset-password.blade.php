<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="auth-validation-errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="auth-input-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="auth-text-input" type="email" name="email" :value="old('email', $request->email)" required
                    autofocus />
            </div>

            <div class="auth-input-group">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="auth-text-input" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="auth-input-group">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="auth-text-input" type="password" name="password_confirmation"
                    required autocomplete="new-password" />
            </div>

            <div class="auth-action-button-container">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
