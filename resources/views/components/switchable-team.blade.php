@props(['team', 'component' => 'dropdown-link'])

<form class="switchable-team" method="POST" action="{{ route('current-team.update') }}" x-data>
    @method('PUT')
    @csrf

    <!-- Hidden Team ID -->
    <input type="hidden" name="team_id" value="{{ $team->id }}">

    <x-dynamic-component :component="$component" href="#" x-on:click.prevent="$root.submit();">
        <div class="flex items-center">
            @if (Auth::user()->isCurrentTeam($team))
                <svg class="switchable-team-check-mark" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            @endif

            <div class="truncate">{{ $team->name }}</div>
        </div>
    </x-dynamic-component>
</form>
