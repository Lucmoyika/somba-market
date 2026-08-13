<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }" class="space-y-4">
            <div class="text-sm text-slate-600 dark:text-slate-400" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="text-sm text-slate-600 dark:text-slate-400" x-cloak x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            <x-validation-errors class="rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700" />

            <form method="POST" action="{{ route('two-factor.login') }}" class="space-y-4">
                @csrf

                <div x-show="! recovery">
                    <x-label for="code" value="{{ __('Code') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="code" class="mt-2 sombra-input" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div x-cloak x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('Recovery Code') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="recovery_code" class="mt-2 sombra-input" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex flex-col gap-2">
                        <button type="button" class="text-sm text-indigo-600 hover:text-indigo-700 underline"
                                        x-show="! recovery"
                                        x-on:click="
                                            recovery = true;
                                            $nextTick(() => { $refs.recovery_code.focus() })
                                        ">
                            {{ __('Use a recovery code') }}
                        </button>

                        <button type="button" class="text-sm text-indigo-600 hover:text-indigo-700 underline"
                                        x-cloak
                                        x-show="recovery"
                                        x-on:click="
                                            recovery = false;
                                            $nextTick(() => { $refs.code.focus() })
                                        ">
                            {{ __('Use an authentication code') }}
                        </button>
                    </div>

                    <div class="flex justify-end">
                        <x-button class="sombra-btn-primary w-full justify-center py-3 text-base font-semibold">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
