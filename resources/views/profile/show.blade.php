<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-red-700 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="bg-white min-h-screen py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Update Profile Information -->
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="bg-red-50 border-l-4 border-red-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold text-red-700 mb-4">{{ __('Update Profile Information') }}</h3>
                    @livewire('profile.update-profile-information-form')
                </div>
                <x-section-border class="border-red-200" />
            @endif

            <!-- Update Password -->
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="bg-red-50 border-l-4 border-red-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold text-red-700 mb-4">{{ __('Update Password') }}</h3>
                    @livewire('profile.update-password-form')
                </div>
                <x-section-border class="border-red-200" />
            @endif

            <!-- Two-Factor Authentication -->
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="bg-red-50 border-l-4 border-red-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold text-red-700 mb-4">{{ __('Two-Factor Authentication') }}</h3>
                    @livewire('profile.two-factor-authentication-form')
                </div>
                <x-section-border class="border-red-200" />
            @endif

            <!-- Browser Sessions -->
            <div class="bg-red-50 border-l-4 border-red-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                <h3 class="text-xl font-semibold text-red-700 mb-4">{{ __('Browser Sessions') }}</h3>
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            <!-- Delete Account -->
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border class="border-red-200" />
                <div class="bg-red-50 border-l-4 border-red-600 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold text-red-700 mb-4">{{ __('Delete Account') }}</h3>
                    @livewire('profile.delete-user-form')
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
