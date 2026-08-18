<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="space-y-6">
            <div>
                <h1 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ __('Login to Somba Market') }}</h1>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Enter your credentials to access your vendor manager and dashboard.') }}</p>
            </div>

            <x-validation-errors class="rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700" />

            @session('status')
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700">
                    {{ $value }}
                </div>
            @endsession

            <div class="space-y-3">
                <a href="{{ route('google.login') }}" class="flex w-full items-center justify-center gap-3 rounded-2xl border border-slate-600 bg-slate-900 px-4 py-3 text-sm font-bold text-white transition hover:border-slate-500 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" aria-hidden="true">
                        <path fill="#EA4335" d="M12 10.2v3.9h5.4c-.2 1.3-1.5 3.9-5.4 3.9-3.3 0-6-2.7-6-6s2.7-6 6-6c1.9 0 3.2.8 3.9 1.5l2.7-2.6C16.7 3.3 14.7 2.4 12 2.4 6.9 2.4 2.8 6.5 2.8 11.6S6.9 20.8 12 20.8c6.9 0 11.5-4.8 11.5-11.6 0-.8-.1-1.5-.2-2.1H12z"/>
                        <path fill="#34A853" d="M3.9 7.2l3.6 2.7c1-1.9 3-3.2 5.4-3.2 1.9 0 3.2.8 3.9 1.5l2.7-2.6C16.7 3.3 14.7 2.4 12 2.4 8.2 2.4 4.9 4.8 3.9 7.2z"/>
                        <path fill="#FBBC05" d="M3.9 16.9c1.6 3.3 5 5.6 8.1 5.6 2.4 0 4.5-.9 6-2.5l-2.9-2.5c-.8.6-1.8 1-3.1 1-2.4 0-4.4-1.7-5.2-3.9l-3 2.3z"/>
                        <path fill="#4285F4" d="M12 20.8c2.8 0 5.2-.9 6.9-2.5l-3.2-2.7c-.9.6-2.1 1-3.7 1-2.9 0-5.3-2-6.1-4.7l-3.2 2.5A11.3 11.3 0 0 0 12 20.8z"/>
                    </svg>
                    {{ __('Continue with Google') }}
                </a>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200 dark:border-slate-700"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase tracking-[0.2em] text-slate-400">
                        <span class="bg-white px-3 dark:bg-slate-950">{{ __('or') }}</span>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="email" class="mt-2 sombra-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="password" class="mt-2 sombra-input" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-300">
                        <x-checkbox id="remember_me" name="remember" />
                        <span>{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500/30" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex justify-end">
                    <x-button class="sombra-btn-primary w-full justify-center py-3 text-base font-semibold">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>

            <p class="text-center text-sm text-slate-600 dark:text-slate-300">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-700">
                    {{ __('Sign up') }}
                </a>
            </p>
        </div>
    </x-authentication-card>
</x-guest-layout>
