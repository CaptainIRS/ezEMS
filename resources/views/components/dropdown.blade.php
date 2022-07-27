<div class="dropdown" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition class="dropdown-container" style="display: none;" @click="open = false">
        <div class="dropdown-contents">
            {{ $content }}
        </div>
    </div>
</div>
