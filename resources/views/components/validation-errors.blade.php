@if ($errors->any())
    <div class="validation-errors" {{ $attributes }}>
        <div class="validation-errors-header">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="validation-errors-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
