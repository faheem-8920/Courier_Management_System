<x-form-section submit="updatePassword">

    <x-slot name="title">
        <span class="text-red-600 font-bold text-xl">
            {{ __('Update Password') }}
        </span>
    </x-slot>

    <x-slot name="description">
        <span class="text-gray-700">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </span>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow-sm space-y-4">

            <!-- Current Password -->
            <div>
                <x-label for="current_password" value="{{ __('Current Password') }}" />
                <x-input
                    id="current_password"
                    type="password"
                    class="mt-1 block w-full border-red-300 focus:border-red-500 focus:ring-red-200 rounded-md shadow-sm"
                    wire:model="state.current_password"
                    autocomplete="current-password" />
                <x-input-error for="current_password" class="mt-2 text-red-600" />
            </div>

            <!-- New Password -->
            <div>
                <x-label for="password" value="{{ __('New Password') }}" />
                <x-input
                    id="password"
                    type="password"
                    class="mt-1 block w-full border-red-300 focus:border-red-500 focus:ring-red-200 rounded-md shadow-sm"
                    wire:model="state.password"
                    autocomplete="new-password" />
                <x-input-error for="password" class="mt-2 text-red-600" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full border-red-300 focus:border-red-500 focus:ring-red-200 rounded-md shadow-sm"
                    wire:model="state.password_confirmation"
                    autocomplete="new-password" />
                <x-input-error for="password_confirmation" class="mt-2 text-red-600" />
            </div>

        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3 text-green-600" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button class="bg-red-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300 hover:scale-105 transform">
            {{ __('Save') }}
        </x-button>
    </x-slot>

</x-form-section>

