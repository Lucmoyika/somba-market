<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-600">{{ __('Dashboard') }}</p>
                <h2 class="text-2xl font-semibold leading-tight text-slate-900 dark:text-slate-100">{{ __('Welcome to your Somba Market dashboard') }}</h2>
            </div>
            <p class="max-w-xl text-sm text-slate-600 dark:text-slate-400">{{ __('Track your account activity, access tools, and manage your online presence from a clear, efficient dashboard.') }}</p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <section class="sombra-card">
                <div class="grid gap-6 lg:grid-cols-2 lg:items-center">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-indigo-600">{{ __('Quick overview') }}</p>
                        <h3 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-slate-100">{{ __('Your management workspace is ready.') }}</h3>
                        <p class="mt-4 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-400">{{ __('Start by exploring the navigation sections on the left, managing vendors, and adjusting your account settings.') }}</p>
                    </div>
                    <div class="rounded-[1.75rem] bg-indigo-50 p-6 text-slate-900 shadow-sm shadow-indigo-500/10 dark:bg-indigo-500/10 dark:text-indigo-100">
                        <p class="text-sm uppercase tracking-[0.24em] text-indigo-600">Actions</p>
                        <div class="mt-4 flex flex-col gap-3 text-sm text-slate-700 dark:text-slate-200">
                            <div class="rounded-3xl sombra-surface-soft p-4 shadow-sm dark:bg-slate-950/80">{{ __('View active vendors.') }}</div>
                            <div class="rounded-3xl sombra-surface-soft p-4 shadow-sm dark:bg-slate-950/80">{{ __('Update your profile and settings.') }}</div>
                            <div class="rounded-3xl sombra-surface-soft p-4 shadow-sm dark:bg-slate-950/80">{{ __('Manage user permissions and access.') }}</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
