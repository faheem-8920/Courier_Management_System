<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold fs-3 text-danger">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="bg-white min-vh-100 py-5">
        <div class="container">

            <!-- Update Profile Information -->
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="bg-light bg-opacity-10 border-start border-4 border-danger rounded shadow p-4 mb-4">
                    <h3 class="fs-5 fw-semibold text-danger mb-3">
                        {{ __('Update Profile Information') }}
                    </h3>
                    @livewire('profile.update-profile-information-form')
                </div>
                <hr class="border-danger opacity-25">
            @endif

            <!-- Update Password -->
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="bg-light bg-opacity-10 border-start border-4 border-danger rounded shadow p-4 mb-4">
                    <h3 class="fs-5 fw-semibold text-danger mb-3">
                        {{ __('Update Password') }}
                    </h3>
                    @livewire('profile.update-password-form')
                </div>
                <hr class="border-danger opacity-25">
            @endif

            <!-- Two-Factor Authentication -->
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="bg-light bg-opacity-10 border-start border-4 border-danger rounded shadow p-4 mb-4">
                    <h3 class="fs-5 fw-semibold text-danger mb-3">
                        {{ __('Two-Factor Authentication') }}
                    </h3>
                    @livewire('profile.two-factor-authentication-form')
                </div>
                <hr class="border-danger opacity-25">
            @endif

            <!-- Browser Sessions -->
            <div class="bg-light bg-opacity-10 border-start border-4 border-danger rounded shadow p-4 mb-4">
                <h3 class="fs-5 fw-semibold text-danger mb-3">
                    {{ __('Browser Sessions') }}
                </h3>
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            <!-- Delete Account -->
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <hr class="border-danger opacity-25">
                <div class="bg-light bg-opacity-10 border-start border-4 border-danger rounded shadow p-4">
                    <h3 class="fs-5 fw-semibold text-danger mb-3">
                        {{ __('Delete Account') }}
                    </h3>

                    @livewire('profile.delete-user-form')
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
