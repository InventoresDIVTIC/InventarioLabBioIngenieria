@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm', 'style' => 'color: #d1d5db;']) }}>
    {{ $value ?? $slot }}
</label>
