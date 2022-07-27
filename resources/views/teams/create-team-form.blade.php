<x-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Team Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new team to collaborate with others on projects.') }}
    </x-slot>

    <x-slot name="form">

        <div class="team-owner-container">
            <div class="team-owner-info">
                <x-label value="{{ __('Team Owner') }}" />
                <div class="team-owner-info-container">
                    <img class="team-owner-image" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">

                    <div class="team-owner-name">
                        <div>{{ $this->user->name }}</div>
                        <div class="team-owner-email">{{ $this->user->email }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="team-input-group">
            <x-label for="name" value="{{ __('Team Name') }}" />
            <x-input id="name" type="text" class="team-text-input" wire:model.defer="state.name" autofocus />
            <x-input-error for="name" class="team-text-input-error" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Create') }}
        </x-button>
    </x-slot>
</x-form-section>
