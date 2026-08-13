<div class="overflow-hidden rounded-[28px] border border-slate-200 sombra-surface shadow-[0_20px_60px_-24px_rgba(15,23,42,0.18)] dark:border-slate-700 dark:bg-slate-900/80">
    <div class="relative overflow-hidden px-6 py-8 sm:px-8 sm:py-10">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 via-transparent to-sky-500/10"></div>
        <div class="relative grid gap-8 lg:grid-cols-[1.4fr_1fr] lg:items-center">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-indigo-200 bg-indigo-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/10 dark:text-indigo-200">
                    <span class="h-2 w-2 rounded-full bg-indigo-500"></span>
                    {{ __('Jetstream workspace') }}
                </div>

                <h1 class="mt-5 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl dark:text-slate-100">
                    {{ __('Welcome to Somba Market') }}
                </h1>

                <p class="mt-4 max-w-2xl text-sm leading-6 text-slate-600 sm:text-base dark:text-slate-300">
                    {{ __('A polished Jetstream foundation for managing your workspace, with a cleaner visual hierarchy, faster access to Vendor tools, and room for analytics as the application grows.') }}
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700">
                        {{ __('Open dashboard') }}
                    </a>
                    <a href="{{ route('vendors.index') }}" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-indigo-300 hover:text-indigo-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200">
                        {{ __('Vendor management') }}
                    </a>
                </div>
            </div>

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-1">
                <div class="rounded-3xl border border-slate-200 sombra-surface-soft p-4 dark:border-slate-700 dark:bg-slate-800/80">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">{{ __('Status') }}</p>
                    <p class="mt-2 text-lg font-semibold text-slate-900 dark:text-slate-100">{{ __('Ready to use') }}</p>
                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ __('Jetstream layout, auth, and vendor entry points are in place.') }}</p>
                </div>

                <div class="rounded-3xl border border-slate-200 sombra-surface-soft p-4 dark:border-slate-700 dark:bg-slate-800/80">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">{{ __('Theme') }}</p>
                    <p class="mt-2 text-lg font-semibold text-slate-900 dark:text-slate-100">{{ __('Clean and modern') }}</p>
                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ __('Subtle gradients, softer cards, and stronger spacing.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-0 border-t border-slate-200 dark:border-slate-700 md:grid-cols-2 xl:grid-cols-4">
        <a href="https://laravel.com/docs" class="group p-6 transition hover:sombra-surface-soft dark:hover:bg-slate-800/60">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 group-hover:bg-indigo-100 dark:bg-indigo-500/10 dark:text-indigo-200 dark:group-hover:bg-indigo-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">{{ __('Documentation') }}</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Reference and implementation guides.') }}</p>
                </div>
            </div>
        </a>

        <a href="https://laracasts.com" class="group p-6 transition hover:sombra-surface-soft dark:hover:bg-slate-800/60">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-50 text-sky-600 group-hover:bg-sky-100 dark:bg-sky-500/10 dark:text-sky-200 dark:group-hover:bg-sky-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" /></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">{{ __('Laracasts') }}</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Video learning and practical patterns.') }}</p>
                </div>
            </div>
        </a>

        <a href="https://tailwindcss.com/" class="group p-6 transition hover:sombra-surface-soft dark:hover:bg-slate-800/60">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-50 text-violet-600 group-hover:bg-violet-100 dark:bg-violet-500/10 dark:text-violet-200 dark:group-hover:bg-violet-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">{{ __('Tailwind') }}</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Utility-first styling for clean UI.') }}</p>
                </div>
            </div>
        </a>

        <a href="#" class="group p-6 transition hover:sombra-surface-soft dark:hover:bg-slate-800/60">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-100 dark:bg-emerald-500/10 dark:text-emerald-200 dark:group-hover:bg-emerald-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" /></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">{{ __('Authentication') }}</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Secure login, verification, and reset flows.') }}</p>
                </div>
            </div>
        </a>
    </div>
