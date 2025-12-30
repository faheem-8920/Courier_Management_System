<x-action-section>
    <!-- Title -->
    <x-slot name="title">
        <span class="text-red-600 font-bold text-xl">{{ __('Delete Account') }}</span>
    </x-slot>

    <!-- Description -->
    <x-slot name="description">
        <span class="text-gray-700">{{ __('Permanently delete your account.') }}</span>
    </x-slot>

    <!-- Content -->
    <x-slot name="content">
        <!-- Info Box -->
        <div class="max-w-xl text-sm text-gray-700 bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow-sm">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </div>

        <!-- Delete Button -->
        <div class="mt-5">
            <x-danger-button 
                wire:click="confirmUserDeletion" 
                wire:loading.attr="disabled"
                class="bg-red-600 text-white hover:bg-red-700 px-5 py-2 rounded-lg shadow-md transition duration-300 flex items-center gap-2 hover:scale-105 transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 5.5a7 7 0 110 14 7 7 0 010-14z" />
                </svg>
                {{ __('Delete Account') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <!-- Modal Title -->
            <x-slot name="title">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 5.5a7 7 0 110 14 7 7 0 010-14z" />
                    </svg>
                    <span class="text-red-600 font-semibold text-lg">{{ __('Delete Account') }}</span>
                </div>
            </x-slot>

            <!-- Modal Content -->
            <x-slot name="content">
                <div class="text-gray-800 bg-red-50 border border-red-200 p-4 rounded-lg shadow-sm flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 5.5a7 7 0 110 14 7 7 0 010-14z" />
                    </svg>
                    <p>
                        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
                    </p>
                </div>

                <!-- Password Input -->
                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input 
                        type="password" 
                        class="mt-1 block w-3/4 border-red-300 focus:border-red-500 focus:ring-red-200 rounded-md shadow-sm"
                        autocomplete="current-password"
                        placeholder="{{ __('Password') }}"
                        x-ref="password"
                        wire:model="password"
                        wire:keydown.enter="deleteUser" />
                    <x-input-error for="password" class="mt-2 text-red-600" />
                </div>
            </x-slot>

            <!-- Modal Footer -->
            <x-slot name="footer">
                <!-- Cancel Button -->
                <x-secondary-button 
                    wire:click="$toggle('confirmingUserDeletion')" 
                    wire:loading.attr="disabled"
                    class="bg-white text-gray-700 border border-gray-300 px-4 py-2 rounded-lg
                           hover:bg-gray-100 hover:scale-105 transform transition duration-300 ease-in-out shadow-sm">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <!-- Confirm Delete Button -->
                <x-danger-button 
                    class="ms-3 bg-red-600 text-white px-5 py-2 rounded-lg flex items-center gap-2
                           hover:bg-red-700 hover:scale-105 transform transition duration-300 ease-in-out shadow-md"
                    wire:click="deleteUser" 
                    wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 5.5a7 7 0 110 14 7 7 0 010-14z" />
                    </svg>
                    {{ __('Delete Account') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
