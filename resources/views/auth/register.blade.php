<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="auth-validation-errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth-input-group">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="auth-text-input" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="auth-input-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="auth-text-input" type="email" name="email" :value="old('email')"
                    required />
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

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="auth-input-group">
                    <x-label for="terms">
                        <div class="terms-container">
                            <x-checkbox name="terms" id="terms" />

                            <div class="terms-text">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' . route('terms.show') . '" class="policy-links">' . __('Terms of Service') . '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' . route('policy.show') . '" class="policy-links">' . __('Privacy Policy') . '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="auth-action-button-container">
                <a class="auth-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="auth-button">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        @if (JoelButcher\Socialstream\Socialstream::show())
            <x-socialstream-providers />
        @endif
    </x-authentication-card>
</x-guest-layout>
