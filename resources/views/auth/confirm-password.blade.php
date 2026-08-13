<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="space-y-4">
            <div class="text-sm text-slate-600 dark:text-slate-400">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <x-validation-errors class="rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700" />

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="password" class="mt-2 sombra-input" type="password" name="password" required autocomplete="current-password" autofocus />
                </div>

                <div class="flex justify-end">
                    <x-button class="w-full justify-center py-3 text-base font-semibold">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
