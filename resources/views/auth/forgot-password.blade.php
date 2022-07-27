<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="auth-header">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="auth-status">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="auth-validation-errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="auth-input-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="auth-text-input" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="auth-action-button-container">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
