<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2">
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-indigo-600">{{ __('Vendor') }}</p>
            <h2 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ __('Vendor profile') }}</h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sombra-card p-6">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ $vendor->name }}</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ $vendor->description }}</p>
                    </div>
                    <span class="sombra-badge">{{ ucfirst($vendor->status) }}</span>
                </div>

                <dl class="mt-6 grid gap-4 md:grid-cols-2">
                    <div class="rounded-3xl sombra-surface-soft p-4 dark:bg-slate-950/80">
                        <dt class="text-sm font-semibold text-slate-500 dark:text-slate-400">{{ __('Email') }}</dt>
                        <dd class="mt-2 text-sm text-slate-900 dark:text-slate-100">{{ $vendor->email }}</dd>
                    </div>
                    <div class="rounded-3xl sombra-surface-soft p-4 dark:bg-slate-950/80"> 
                        <dt class="text-sm font-semibold text-slate-500 dark:text-slate-400">{{ __('Phone') }}</dt>
                        <dd class="mt-2 text-sm text-slate-900 dark:text-slate-100">{{ $vendor->phone }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
