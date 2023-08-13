@props(['value'])

<label class="block font-medium text-sm text-gray-700 dark:text-gray-300">
    <select class="form-select bg-gray-800 space-y-0 {{ $attributes->get('class') }}">
        <option value="" disabled selected>Selecciona una opción</option>
        <option value="{{ $value ?? '' }}">{{ $value ?? $slot }}</option>
    </select>
</label>


