<div {{ $attributes->merge(['class' => 'action-section']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="action-section-content-container">
        <div class="action-section-content">
            {{ $content }}
        </div>
    </div>
</div>
