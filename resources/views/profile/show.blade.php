<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-red-700 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="bg-white min-h-screen py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="bg-red-50 border border-red-200 rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-red-700 mb-4">Update Profile Information</h3>
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-section-border class="border-red-200" />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="bg-red-50 border border-red-200 rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-red-700 mb-4">Update Password</h3>
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border class="border-red-200" />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="bg-red-50 border border-red-200 rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-red-700 mb-4">Two-Factor Authentication</h3>
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border class="border-red-200" />
            @endif

            <div class="bg-red-50 border border-red-200 rounded-lg shadow p-6">
                <h3 class="text-lg font-medium text-red-700 mb-4">Browser Sessions</h3>
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border class="border-red-200" />

                <div class="bg-red-50 border border-red-200 rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium text-red-700 mb-4">Delete Account</h3>
                    @livewire('profile.delete-user-form')
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
