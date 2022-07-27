<x-app-layout>
    <div class="team-settings-page">
        <x-slot name="header">
            <h2 class="team-settings-header">
                {{ __('Create Team') }}
            </h2>
        </x-slot>

        <div>
            <div class="team-settings-content">
                <div class="team-form-section">
                    @livewire('teams.create-team-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
