<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="space-y-4">
            <x-validation-errors class="rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700" />

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="email" class="mt-2 sombra-input" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="password" class="mt-2 sombra-input" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="password_confirmation" class="mt-2 sombra-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex justify-end">
                    <x-button class="w-full justify-center py-3 text-base font-semibold">
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
