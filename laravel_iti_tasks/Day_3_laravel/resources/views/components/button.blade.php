@props(['type' => 'button', 'class' => 'btn-primary'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn ' . $class]) }}>
    {{ $slot }}
</button>