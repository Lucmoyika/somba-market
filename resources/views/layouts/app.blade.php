<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script>
            (function(){
                try {
                    var theme = localStorage.getItem('theme');
                    if (theme === 'dark') {
                        document.documentElement.classList.add('dark');
                        document.documentElement.classList.remove('light');
                        document.body && document.body.classList.add('dark');
                        document.body && document.body.classList.remove('light');
                    } else {
                        document.documentElement.classList.add('light');
                        document.documentElement.classList.remove('dark');
                        document.body && document.body.classList.add('light');
                        document.body && document.body.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                } catch (e) {
                    // ignore
                }

                document.addEventListener('DOMContentLoaded', function() {
                    var search = document.getElementById('search_query');
                    if (!search) return;

                    function clearEmailValue() {
                        if (/@/.test(search.value)) {
                            search.value = '';
                        }
                    }

                    search.setAttribute('autocomplete', 'off');
                    search.setAttribute('autocapitalize', 'off');
                    search.setAttribute('autocorrect', 'off');
                    search.setAttribute('spellcheck', 'false');

                    clearEmailValue();
                    var searchClearTimer = setInterval(clearEmailValue, 100);
                    setTimeout(function() {
                        window.clearInterval(searchClearTimer);
                    }, 2000);

                    ['input', 'focus', 'mousedown', 'keydown'].forEach(function(evt) {
                        search.addEventListener(evt, function() {
                            setTimeout(clearEmailValue, 10);
                        });
                    });
                });
            })();
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <style>
            html.light:not(.dark),
            body.light:not(.dark) {
                color-scheme: light;
                background-color: #f8fafc !important;
                color: #0f172a !important;
            }
            html.light:not(.dark) .sombra-surface,
            body.light:not(.dark) .sombra-surface {
                background-color: #ffffff !important;
            }
            html.light:not(.dark) .sombra-surface-soft,
            body.light:not(.dark) .sombra-surface-soft {
                background-color: #e6eef6 !important;
            }
            html.light:not(.dark) .sombra-input,
            body.light:not(.dark) .sombra-input {
                background-color: #e6eef6 !important;
                color: #0f172a !important;
                border-color: rgba(148, 163, 184, 0.24) !important;
            }
        </style>
    </head>

    <body class="min-h-screen sombra-surface text-slate-900 dark:text-slate-100 antialiased" x-data="{ sidebarOpen: false, darkMode: localStorage.getItem('theme') === 'dark' }" x-bind:class="{ 'dark': darkMode, 'light': !darkMode }" x-init="() => { $watch('darkMode', value => { document.documentElement.classList.toggle('dark', value); document.documentElement.classList.toggle('light', !value); if (document.body) { document.body.classList.toggle('dark', value); document.body.classList.toggle('light', !value); } localStorage.setItem('theme', value ? 'dark' : 'light'); }); if (darkMode) { document.documentElement.classList.add('dark'); document.documentElement.classList.remove('light'); if (document.body) { document.body.classList.add('dark'); document.body.classList.remove('light'); } } else { document.documentElement.classList.add('light'); document.documentElement.classList.remove('dark'); if (document.body) { document.body.classList.add('light'); document.body.classList.remove('dark'); } } }">
        <x-banner />

        <div class="min-h-screen sombra-surface">
            <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-20 bg-slate-950/40 lg:hidden" @click="sidebarOpen = false"></div>

            <aside class="fixed inset-y-0 left-0 z-30 w-[260px] overflow-y-auto border-r border-slate-200 sombra-surface shadow-lg transition duration-300 ease-in-out dark:border-slate-800 dark:bg-slate-950"
                :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
                <div class="flex h-full flex-col">
                    <div class="border-b border-slate-200/70 px-6 py-5 dark:border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-indigo-600 text-white shadow-sm shadow-indigo-500/20">
                                <x-application-mark class="h-6 w-6" />
                            </div>
                            <div>
                                <p class="text-base font-semibold tracking-tight text-slate-900 dark:text-slate-100">Somba Market</p>
                                <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">{{ __('The market close to you.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 overflow-y-auto px-4 py-6">
                        <div class="space-y-6">
                            <div class="space-y-1">
                                <div class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500 dark:text-slate-400">{{ __('Navigation') }}</div>
                                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-100 text-slate-600 dark:bg-slate-900 dark:text-slate-300">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v9" />
                                        </svg>
                                    </span>
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                                @if(Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('vendor')))
                                    @if(Route::has('vendors.index'))
                                        <x-nav-link href="{{ route('vendors.index') }}" :active="request()->routeIs('vendors.*')">
                                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-100 text-slate-600 dark:bg-slate-900 dark:text-slate-300">
                                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M6 3h12l3 7v11H3V3z" />
                                                    <path d="M3 7h18" />
                                                </svg>
                                            </span>
                                            {{ __('Vendors') }}
                                        </x-nav-link>
                                    @endif
                                @endif
                            </div>

                            <div class="space-y-1">
                                <div class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500 dark:text-slate-400">{{ __('System') }}</div>
                                @if(Route::has('profile.show'))
                                    <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-100 text-slate-600 dark:bg-slate-900 dark:text-slate-300">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M12 11c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5Z" />
                                                <path d="M4 21c0-3.866 3.134-7 7-7s7 3.134 7 7" />
                                            </svg>
                                        </span>
                                        {{ __('Settings') }}
                                    </x-nav-link>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <div>
                <header class="sticky top-0 z-20 border-b border-slate-200/70 bg-white/95 backdrop-blur dark:border-slate-800 dark:bg-slate-950/95">
                    <div class="flex h-16 w-full items-center justify-between gap-2 px-2 sm:px-3 lg:px-2">
                        <div class="flex items-center gap-3">
                            <button @click="sidebarOpen = !sidebarOpen" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-slate-300 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-slate-700 lg:hidden">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>

                            <div class="hidden md:block">
                                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-indigo-600">Somba Market</p>
                                <h1 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ __('Admin Area') }}</h1>
                            </div>
                        </div>

                        <div class="flex-1 flex items-center justify-center">
                            <div class="hidden md:flex items-center gap-2 rounded-2xl border border-slate-200 bg-white/90 px-2 py-1 text-sm text-slate-700 shadow-sm transition focus-within:border-slate-300 focus-within:ring-2 focus-within:ring-indigo-500/20 dark:border-slate-800 dark:bg-slate-900/75 dark:text-slate-200 dark:focus-within:border-slate-700">
                                <svg class="h-4 w-4 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1012 19.5a7.5 7.5 0 004.65-1.85z" />
                                </svg>
                                <div style="position:absolute;left:-9999px;top:-9999px;opacity:0;width:1px;height:1px;pointer-events:none;">
                                    <input type="email" name="username" autocomplete="username" aria-hidden="true" tabindex="-1" />
                                    <input type="password" name="current-password" autocomplete="current-password" aria-hidden="true" tabindex="-1" />
                                </div>
                                <input id="search_query" name="search_query" type="search" inputmode="search" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false" readonly onfocus="this.removeAttribute('readonly'); this.value='';" onmousedown="if(this.readOnly){this.removeAttribute('readonly'); this.value='';}" placeholder="{{ __('Search') }}" aria-label="{{ __('Search') }}" class="min-w-0 w-40 border-0 bg-transparent px-2 text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none dark:text-slate-100 dark:placeholder:text-slate-500" />
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-transparent bg-transparent text-slate-700 transition hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 dark:text-slate-200 dark:hover:text-slate-100">
                                <svg class="h-5 w-5 text-slate-600 dark:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <button type="button" @click="darkMode = !darkMode" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-transparent bg-transparent p-3 text-slate-700 transition hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 dark:border-transparent dark:bg-transparent dark:text-slate-200 dark:hover:text-slate-100">
                                <svg x-show="!darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414m12.728 0l-1.414-1.414M7.05 7.05L5.636 5.636M12 8a4 4 0 100 8 4 4 0 000-8z" />
                                </svg>
                                <svg x-show="darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
                                </svg>
                            </button>

                            <div class="relative">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full border border-transparent bg-transparent text-sm text-slate-700 transition hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:border-transparent dark:bg-transparent dark:text-slate-200 dark:hover:text-slate-100">
                                                <img class="h-full w-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <button type="button" class="inline-flex h-11 items-center gap-2 rounded-2xl border border-transparent bg-transparent px-2 text-sm font-medium text-slate-700 transition hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:border-transparent dark:bg-transparent dark:text-slate-200 dark:hover:text-slate-100">
                                                <span>{{ Auth::user()->name }}</span>
                                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="block px-4 py-2 text-xs text-slate-400">{{ __('Manage Account') }}</div>

                                        <x-dropdown-link href="{{ route('profile.show') }}">{{ __('Profile') }}</x-dropdown-link>

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-dropdown-link href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</x-dropdown-link>
                                        @endif

                                        <div class="border-t border-slate-200 dark:border-slate-800"></div>
                                        <div class="block px-4 py-2 text-xs text-slate-400">{{ __('Language') }}</div>
                                        <x-dropdown-link href="{{ route('locale.switch', 'en') }}">{!! app()->getLocale() === 'en' ? '&#x2713; ' : '' !!}{{ __('English') }}</x-dropdown-link>
                                        <x-dropdown-link href="{{ route('locale.switch', 'fr') }}">{!! app()->getLocale() === 'fr' ? '&#x2713; ' : '' !!}{{ __('French') }}</x-dropdown-link>

                                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                            <div class="border-t border-slate-200 dark:border-slate-800"></div>

                                            <div class="block px-4 py-2 text-xs text-slate-400">{{ __('Manage Team') }}</div>

                                            <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">{{ __('Team Settings') }}</x-dropdown-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-dropdown-link href="{{ route('teams.create') }}">{{ __('Create New Team') }}</x-dropdown-link>
                                            @endcan
                                        @endif

                                        <div class="border-t border-slate-200 dark:border-slate-800"></div>

                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="flex-1 overflow-y-auto sombra-surface p-6 dark:bg-slate-950/95 lg:p-8 lg:pl-0 lg:ml-[260px]">
                    <div class="mx-auto w-full max-w-7xl">
                        @if (isset($header))
                            <div class="mb-6 rounded-[2rem] bg-white p-6 shadow-sm dark:bg-slate-950/80">
                                {{ $header }}
                            </div>
                        @endif

                        <div class="space-y-6">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
