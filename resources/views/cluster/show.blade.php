<x-app-layout :edition="$edition">
    <x-slot name="header">
        <h2 class="cluster-page-header-text">
            {{ $category->name }} - {{ $cluster->name }}
        </h2>
    </x-slot>

    <div class="card-container">
        @foreach ($events as $event)
            <div class="card">
                <a
                    href="{{ route('event.show', ['edition' => $edition->year, 'category' => $category->slug, 'cluster' => $cluster->slug, 'event' => $event->slug]) }}">
                    <div class="card-header">
                        {{ $event->name }}
                    </div>
                    <div class="card-body">
                        {{ $event->description }}
                    </div>
                </a>
            </div>
            <br>
        @endforeach
    </div>
</x-app-layout>
