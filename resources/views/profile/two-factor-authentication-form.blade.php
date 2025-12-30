<x-action-section>

    <!-- Title -->
    <x-slot name="title">
        <span class="text-red-600 font-bold text-xl">{{ __('Two Factor Authentication') }}</span>
    </x-slot>

    <!-- Description -->
    <x-slot name="description">
        <span class="text-gray-700">{{ __('Add additional security to your account using two factor authentication.') }}</span>
    </x-slot>

    <!-- Content -->
    <x-slot name="content">
        <!-- Status Message -->
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    <span class="text-red-600 font-semibold">{{ __('Finish enabling two factor authentication.') }}</span>
                @else
                    <span class="text-green-600 font-semibold">{{ __('Two factor authentication is enabled.') }}</span>
                @endif
            @else
                <span class="text-gray-700">{{ __('You have not enabled two factor authentication.') }}</span>
            @endif
        </h3>

        <!-- Description -->
        <div class="mt-3 max-w-xl text-sm text-gray-600 bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow-sm">
            <p>
                {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
            </p>
        </div>


        <!-- QR Code / Setup Key -->
        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-700">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('Scan the QR code with your authenticator app or enter the setup key and provide the generated OTP.') }}
                        @else
                            {{ __('Scan the QR code with your authenticator app or enter the setup key.') }}
                        @endif
                    </p>
                </div>


                <div class="mt-4 p-4 inline-block bg-white border border-gray-200 rounded-lg shadow-sm">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-700 font-semibold bg-gray-100 p-3 rounded-lg shadow-sm">
                    {{ __('Setup Key') }}: <span class="text-red-600">{{ decrypt($this->user->two_factor_secret) }}</span>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4 max-w-xl">
                        <x-label for="code" value="{{ __('Code') }}" />
                        <x-input 
                            id="code" 
                            type="text" 
                            name="code" 
                            class="block mt-1 w-1/2 border-red-300 focus:border-red-500 focus:ring-red-200 rounded-md shadow-sm"
                            inputmode="numeric" 
                            autofocus 
                            autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />
                        <x-input-error for="code" class="mt-2 text-red-600" />
                    </div>
                @endif
            @endif


            <!-- Recovery Codes -->
            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-700 font-semibold">
                    {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-red-50 border border-red-200 rounded-lg shadow-sm">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div class="hover:bg-red-100 transition duration-200 px-2 py-1 rounded">{{ $code }}</div>

                    @endforeach
                </div>
            @endif
        @endif

        <!-- Action Buttons -->
        <div class="mt-5 flex flex-wrap gap-3">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button type="button" class="bg-red-600 text-white hover:bg-red-700 px-5 py-2 rounded-lg shadow-md transition duration-300 hover:scale-105 transform">

                        {{ __('Enable') }}
                    </x-button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">

                        <x-secondary-button class="px-4 py-2 rounded-lg hover:scale-105 transform transition duration-300 shadow-sm">

                            {{ __('Regenerate Recovery Codes') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">

                        <x-button type="button" class="px-5 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 shadow-md transition duration-300 hover:scale-105 transform" wire:loading.attr="disabled">

                            {{ __('Confirm') }}
                        </x-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">

                        <x-secondary-button class="px-4 py-2 rounded-lg hover:scale-105 transform transition duration-300 shadow-sm">

                            {{ __('Show Recovery Codes') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">

                        <x-secondary-button class="px-4 py-2 rounded-lg hover:scale-105 transform transition duration-300 shadow-sm" wire:loading.attr="disabled">

                            {{ __('Cancel') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">

                        <x-danger-button class="px-5 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 shadow-md transition duration-300 hover:scale-105 transform" wire:loading.attr="disabled">

                            {{ __('Disable') }}
                        </x-danger-button>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>
