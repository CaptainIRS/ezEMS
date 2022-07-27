<x-app-layout>
    <div class="team-settings-page">
        <x-slot name="header">
            <h2 class="team-settings-header">
                {{ __('Team Settings') }}
            </h2>
        </x-slot>

        <div>
            <div class="team-settings-content">
                <div class="team-form-section">
                    @livewire('teams.update-team-name-form', ['team' => $team])
                </div>

                @livewire('teams.team-member-manager', ['team' => $team])

                @if (Gate::check('delete', $team) && !$team->personal_team)
                    <x-section-border />

                    <div class="team-form-section">
                        @livewire('teams.delete-team-form', ['team' => $team])
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
