<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="profile-input-group">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <x-input id="current_password" type="password" class="profile-text-input"
                wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="profile-text-input-error" />
        </div>

        <div class="profile-input-group">
            <x-label for="password" value="{{ __('New Password') }}" />
            <x-input id="password" type="password" class="profile-text-input" wire:model.defer="state.password"
                autocomplete="new-password" />
            <x-input-error for="password" class="profile-text-input-error" />
        </div>

        <div class="profile-input-group">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input id="password_confirmation" type="password" class="profile-text-input"
                wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="profile-text-input-error" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
