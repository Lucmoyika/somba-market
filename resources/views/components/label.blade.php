@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-slate-700 dark:text-slate-200']) }}>
    {{ $value ?? $slot }}
</label>
