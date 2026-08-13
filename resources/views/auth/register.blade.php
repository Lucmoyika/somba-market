<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="space-y-4">
            <x-validation-errors class="rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700" />

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="name" class="mt-2 sombra-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="email" class="mt-2 sombra-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="password" class="mt-2 sombra-input" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200" />
                    <x-input id="password_confirmation" class="mt-2 sombra-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex flex-col gap-3 justify-end mt-4 sm:flex-row sm:items-center">
                <a class="text-sm font-semibold text-indigo-600 hover:text-indigo-700" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <div class="sm:ml-4 w-full sm:w-auto">
                    <x-button class="w-full justify-center py-3 text-base font-semibold">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
