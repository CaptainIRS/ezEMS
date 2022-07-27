@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'input-error']) }}>{{ $message }}</p>
@enderror
