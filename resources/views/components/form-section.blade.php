@props(['submit'])

<div {{ $attributes->merge(['class' => 'form-section']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="form-section-body">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="form-section-content {{ isset($actions) ? 'with-actions' : 'without-actions' }}">
                <div class="form-section-form">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="form-section-actions">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
