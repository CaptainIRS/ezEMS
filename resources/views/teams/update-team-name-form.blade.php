<x-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The team\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">

        <div class="team-owner-container">
            <!-- Team Owner Information -->
            <div class="team-owner-info">
                <x-label value="{{ __('Team Owner') }}" />

                <div class="team-owner-info-container">
                    <img class="team-owner-image" src="{{ $team->owner->profile_photo_url }}"
                        alt="{{ $team->owner->name }}">

                    <div class="team-owner-name">
                        <div>{{ $team->owner->name }}</div>
                        <div class="team-owner-email">{{ $team->owner->email }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        <div class="team-input-group">
            <x-label for="name" value="{{ __('Team Name') }}" />

            <x-input id="name" type="text" class="team-text-input" wire:model.defer="state.name"
                :disabled="!Gate::check('update', $team)" />

            <x-input-error for="name" class="team-text-input-error" />
        </div>
    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-action-message on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button>
                {{ __('Save') }}
            </x-button>
        </x-slot>
    @endif
</x-form-section>
