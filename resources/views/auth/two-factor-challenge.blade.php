<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="auth-header" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="auth-header" x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            <x-validation-errors class="auth-validation-errors" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="auth-input-group" x-show="! recovery">
                    <x-label for="code" value="{{ __('Code') }}" />
                    <x-input id="code" class="auth-text-input" type="text" inputmode="numeric" name="code"
                        autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="auth-input-group" x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                    <x-input id="recovery_code" class="auth-text-input" type="text" name="recovery_code"
                        x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="auth-action-button-container">
                    <button type="button" class="two-factor-action-button" x-show="! recovery"
                        x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="two-factor-action-button" x-show="recovery"
                        x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <x-button class="auth-button">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
