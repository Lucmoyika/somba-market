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
        </div>
    </x-authentication-card>
</x-guest-layout>
