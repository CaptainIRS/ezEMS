<button {{ $attributes->merge(['type' => 'button', 'class' => 'danger-button']) }}>
    {{ $slot }}
</button>
