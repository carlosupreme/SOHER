@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-rose-500 dark:text-red-400']) }}>{{ $message }}</p>
@enderror
