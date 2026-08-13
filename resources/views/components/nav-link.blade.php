@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex h-11 items-center gap-3 rounded-xl border-l-4 border-indigo-500 bg-indigo-50/70 px-4 text-sm font-semibold text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition duration-150 ease-in-out'
            : 'group flex h-11 items-center gap-3 rounded-xl px-4 text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition duration-150 ease-in-out dark:text-slate-300 dark:hover:bg-slate-900 dark:hover:text-white';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
