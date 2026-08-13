@php
use App\Models\Vendor;

$totalVendors = Vendor::count();
$activeVendors = Vendor::where('status', 'active')->count();
$pendingVendors = Vendor::where('status', 'pending')->count();
$suspendedVendors = Vendor::where('status', 'suspended')->count();
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2">
            <div class="text-xs uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ __('Dashboard') }}</div>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ __('Your marketplace overview') }}</h1>
            <p class="max-w-2xl text-sm text-slate-600 dark:text-slate-400">{{ __('Control your vendors and monitor platform activity with a clean, modern interface.') }}</p>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <article class="sombra-card p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('Total Vendors') }}</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900 dark:text-slate-100">{{ number_format($totalVendors) }}</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-300">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 4.5c-4.97 0-9 4.03-9 9 0 1.82.55 3.51 1.49 4.93l1.93-1.18C6.13 16.42 6 15.24 6 14c0-3.31 2.69-6 6-6s6 2.69 6 6c0 1.24-.13 2.42-.42 3.55l1.93 1.18A8.962 8.962 0 0021 13.5c0-4.97-4.03-9-9-9Z" />
                        </svg>
                    </div>
                </div>
            </article>

            <article class="sombra-card p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('Active Vendors') }}</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900 dark:text-slate-100">{{ number_format($activeVendors) }}</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-300">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </article>

            <article class="sombra-card p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('Pending Vendors') }}</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900 dark:text-slate-100">{{ number_format($pendingVendors) }}</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 text-amber-600 dark:bg-amber-500/10 dark:text-amber-300">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 6v6l4 2" />
                            <path d="M12 4a8 8 0 100 16 8 8 0 000-16Z" />
                        </svg>
                    </div>
                </div>
            </article>

            <article class="sombra-card p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('Suspended Vendors') }}</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900 dark:text-slate-100">{{ number_format($suspendedVendors) }}</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-rose-50 text-rose-600 dark:bg-rose-500/10 dark:text-rose-300">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M10 14h4" />
                            <path d="M12 10v4" />
                            <path d="M12 4a8 8 0 100 16 8 8 0 000-16Z" />
                        </svg>
                    </div>
                </div>
            </article>
        </div>

        <div class="mt-6 grid gap-4 lg:grid-cols-3">
            <section class="lg:col-span-2 sombra-card p-6">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ __('Quick overview') }}</h2>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Access key actions, vendors, and marketplace settings.') }}</p>
                    </div>
                    @if(Route::has('vendors.index'))
                        <a href="{{ route('vendors.index') }}" class="sombra-btn-primary">{{ __('View Vendors') }}</a>
                    @endif
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl sombra-surface-soft p-4 text-slate-700 dark:bg-slate-950/80 dark:text-slate-200">
                        <p class="text-sm font-medium">{{ __('Status') }}</p>
                        <p class="mt-2 text-2xl font-semibold">{{ __('Ready') }}</p>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ __('No vendor module issues detected.') }}</p>
                    </div>
                    <div class="rounded-3xl sombra-surface-soft p-4 text-slate-700 dark:bg-slate-950/80 dark:text-slate-200">
                        <p class="text-sm font-medium">{{ __('Pending tasks') }}</p>
                        <p class="mt-2 text-2xl font-semibold">---</p>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ __('No recent tasks available.') }}</p>
                    </div>
                </div>
            </section>

            <section class="sombra-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ __('Main actions') }}</h2>
                <div class="mt-4 space-y-3">
                    <div class="rounded-2xl sombra-surface-soft p-4 dark:bg-slate-950/80">
                        <p class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ __('Manage vendors') }}</p>
                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">{{ __('Add, update, and track vendor status.') }}</p>
                    </div>
                    <div class="rounded-2xl sombra-surface-soft p-4 dark:bg-slate-950/80">
                        <p class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ __('Settings') }}</p>
                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">{{ __('Access your account settings and API integration.') }}</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>