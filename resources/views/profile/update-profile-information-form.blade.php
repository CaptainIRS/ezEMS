<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="profile-input-group">
                <!-- Profile Photo File Input -->
                <input type="file" style="display: none;" wire:model="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="current-profile-photo-container" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="current-profile-photo">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="new-profile-photo-preview" x-show="photoPreview" style="display: none;">
                    <span class="new-profile-photo-preview-image"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="select-photo-button" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="remove-photo-button" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="profile-text-input-error" />
            </div>
        @endif

        <!-- Name -->
        <div class="profile-input-group">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="profile-text-input" wire:model.defer="state.name"
                autocomplete="name" />
            <x-input-error for="name" class="profile-text-input-error" />
        </div>

        <!-- Email -->
        <div class="profile-input-group">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="profile-text-input" wire:model.defer="state.email" />
            <x-input-error for="email" class="profile-text-input-error" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                !$this->user->hasVerifiedEmail())
                <p class="email-unverified-warning">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="verification-resend-link" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="verification-resent-message">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
