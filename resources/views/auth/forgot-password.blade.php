<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="space-y-4">
            <div class="text-sm text-slate-600 dark:text-slate-400">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @session('status')
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700">
                    {{ $value }}
                </div>
            @endsession

            <x-validation-errors class="rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="email" class="mt-2 sombra-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="flex justify-end">
                    <x-button class="w-full justify-center py-3 text-base font-semibold">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
