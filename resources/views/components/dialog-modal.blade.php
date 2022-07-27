@props(['id' => null])

<x-modal :id="$id" {{ $attributes }}>
    <div class="dialog-modal">
        <div class="dialog-content-container">
            <div class="dialog-title">
                {{ $title }}
            </div>

            <div class="dialog-content">
                {{ $content }}
            </div>
        </div>

        <div class="dialog-footer">
            {{ $footer }}
        </div>
    </div>
</x-modal>
