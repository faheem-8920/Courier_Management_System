<x-action-section>

    <!-- Title -->
    <x-slot name="title">
        <span class="text-red-600 font-bold text-xl">{{ __('Browser Sessions') }}</span>
    </x-slot>

    <!-- Description -->
    <x-slot name="description">
        <span class="text-gray-700">{{ __('Manage and log out your active sessions on other browsers and devices.') }}</span>
    </x-slot>

    <!-- Content -->
    <x-slot name="content">
        <!-- Info Box -->
        <div class="max-w-xl text-sm text-gray-700 bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow-sm">
            {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
        </div>

        <!-- List of Sessions -->
        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                @foreach ($this->sessions as $session)
                    <div class="flex items-center bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:shadow-md transition duration-300">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-500">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            @endif
                        </div>

                        <div class="ms-3">
                            <div class="text-sm text-gray-600">

                                {{ $session->agent->platform() ?? __('Unknown') }} - {{ $session->agent->browser() ?? __('Unknown') }}

                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('This device') }}</span>
                                    @else
                                        {{ __('Last active') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif


        <!-- Action Buttons -->
        <div class="flex items-center mt-5">
            <x-button 
                wire:click="confirmLogout" 
                wire:loading.attr="disabled"
                class="bg-red-600 text-white hover:bg-red-700 px-5 py-2 rounded-lg shadow-md transition duration-300 flex items-center gap-2 hover:scale-105 transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                </svg>
                {{ __('Log Out Other Browser Sessions') }}
            </x-button>

            <x-action-message class="ms-3 text-green-600" on="loggedOut">

                {{ __('Done.') }}
            </x-action-message>
        </div>


        <!-- Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                    </svg>
                    <span class="text-red-600 font-semibold text-lg">{{ __('Log Out Other Browser Sessions') }}</span>
                </div>
            </x-slot>

            <x-slot name="content">
                <div class="text-gray-800 bg-red-50 border border-red-200 p-4 rounded-lg shadow-sm flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                    </svg>
                    <p>
                        {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                    </p>
                </div>

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input 
                        type="password" 
                        class="mt-1 block w-3/4 border-red-300 focus:border-red-500 focus:ring-red-200 rounded-md shadow-sm"
                        autocomplete="current-password"
                        placeholder="{{ __('Password') }}"
                        x-ref="password"
                        wire:model="password"
                        wire:keydown.enter="logoutOtherBrowserSessions" />
                    <x-input-error for="password" class="mt-2 text-red-600" />

                </div>
            </x-slot>

            <x-slot name="footer">

                <x-secondary-button 
                    wire:click="$toggle('confirmingLogout')" 
                    wire:loading.attr="disabled"
                    class="bg-white text-gray-700 border border-gray-300 px-4 py-2 rounded-lg
                           hover:bg-gray-100 hover:scale-105 transform transition duration-300 ease-in-out shadow-sm">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button 
                    class="ms-3 bg-red-600 text-white px-5 py-2 rounded-lg shadow-md flex items-center gap-2
                           hover:bg-red-700 hover:scale-105 transform transition duration-300 ease-in-out"
                    wire:click="logoutOtherBrowserSessions" 
                    wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                    </svg>

                    {{ __('Log Out Other Browser Sessions') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
