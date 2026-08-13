<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="space-y-4">
            <div class="text-sm text-slate-600 dark:text-slate-400">
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="grid gap-3 sm:grid-cols-[1fr_auto] sm:items-center">
                <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                    @csrf

                    <x-button type="submit" class="sombra-btn-primary w-full justify-center py-3 text-base font-semibold">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </form>

                <div class="flex flex-wrap items-center gap-3 justify-end text-sm">
                    <a href="{{ route('profile.show') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
                        {{ __('Edit Profile') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf

                        <button type="submit" class="text-indigo-600 hover:text-indigo-700 font-semibold">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
