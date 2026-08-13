<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2">
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-indigo-600">{{ __('Account') }}</p>
            <h2 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ __('Profile Settings') }}</h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="sombra-card p-6">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ __('Manage your account') }}</h3>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Update your information, change your password, and manage your secure logins.') }}</p>
                </div>
            </div>

            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="sombra-card p-6">
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="sombra-card p-6">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="sombra-card p-6">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="sombra-card p-6">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="sombra-card p-6">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
