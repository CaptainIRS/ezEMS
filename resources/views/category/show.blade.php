<x-app-layout :edition="$edition">
    <x-slot name="header">
        <h1 class="category-page-header-text">
            {{ $category->name }} {{ $edition->year }}
        </h1>
    </x-slot>

    <!-- Clusters -->
    <div class="card-container">
        @foreach ($clusters as $cluster)
            <div class="card">
                <a
                    href="{{ route('cluster.show', ['edition' => $edition->year, 'category' => $category->slug, 'cluster' => $cluster->slug]) }}">
                    <div class="card-header">
                        {{ $cluster->name }}
                    </div>
                    <div class="card-body">
                        {{ $cluster->description }}
                    </div>
                </a>
            </div>
            <br>
        @endforeach
    </div>
</x-app-layout>
