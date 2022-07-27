<x-action-section>
    <x-slot name="title">
        {{ __('Connected Accounts') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Manage and remove your connect accounts.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="current-status">
            @if (count($this->accounts) == 0)
                {{ __('You have no connected accounts.') }}
            @else
                {{ __('Your connected accounts.') }}
            @endif
        </h3>

        <div class="current-status-description">
            {{ __('You are free to connect any social accounts to your profile and may remove any connected accounts at any time. If you feel any of your connected accounts have been compromised, you should disconnect them immediately and change your password.') }}
        </div>

        <div class="oauth-provider-container">
            @foreach ($this->providers as $provider)
                @php
                    $account = null;
                    $account = $this->accounts->where('provider', $provider)->first();
                @endphp

                <x-connected-account provider="{{ $provider }}" created-at="{{ $account->created_at ?? null }}">
                    <x-slot name="action">
                        @if (!is_null($account))
                            <div class="oauth-provider-actions">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && !is_null($account->avatar_path))
                                    <button class="use-avatar-as-photo-button"
                                        wire:click="setAvatarAsProfilePhoto({{ $account->id }})">
                                        {{ __('Use Avatar as Profile Photo') }}
                                    </button>
                                @endif

                                @if ($this->accounts->count() > 1 || !is_null($this->user->password))
                                    <x-danger-button wire:click="confirmRemove({{ $account->id }})"
                                        wire:loading.attr="disabled">
                                        {{ __('Remove') }}
                                    </x-danger-button>
                                @endif
                            </div>
                        @else
                            <x-action-link href="{{ route('oauth.redirect', ['provider' => $provider]) }}">
                                {{ __('Connect') }}
                            </x-action-link>
                        @endif
                    </x-slot>

                </x-connected-account>
            @endforeach
        </div>

        <!-- Logout Other Devices Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingRemove">
            <x-slot name="title">
                {{ __('Remove Connected Account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Please confirm your removal of this account - this action cannot be undone.') }}
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingRemove')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-secondary-button>

                <x-danger-button wire:click="removeConnectedAccount({{ $this->selectedAccountId }})"
                    wire:loading.attr="disabled">
                    {{ __('Remove Connected Account') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
