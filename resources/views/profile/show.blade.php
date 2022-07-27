<x-app-layout>
    <div class="profile-page">
        <x-slot name="header">
            <h2 class="profile-page-heading">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div>
            <div class="profile-page-content">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')

                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()) && !is_null($user->password))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>

                    <x-section-border />
                @else
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.set-password-form')
                    </div>

                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication() && !is_null($user->password))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-section-border />
                @endif

                @if (JoelButcher\Socialstream\Socialstream::show())
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.connected-accounts-form')
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
