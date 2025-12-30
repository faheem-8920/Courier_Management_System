<x-form-section submit="updateProfileInformation">

    <!-- Title -->
    <x-slot name="title">
        <span class="text-red-600 font-bold text-xl">{{ __('Profile Information') }}</span>
    </x-slot>

    <!-- Description -->
    <x-slot name="description">
        <span class="text-red-700">{{ __('Update your account\'s profile information and email address.') }}</span>
    </x-slot>

    <!-- Form -->
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow-sm space-y-4">
            
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="text-center">
                    <input type="file" id="photo" class="hidden"
                        wire:model.live="photo"
                        x-ref="photo"
                        x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => { photoPreview = e.target.result; };
                            reader.readAsDataURL($refs.photo.files[0]);
                        " />

                    <x-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full w-24 h-24 mx-auto object-cover border-2 border-red-600 shadow-sm">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-24 h-24 mx-auto bg-cover bg-center border-2 border-red-600 shadow-sm"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-2 flex justify-center gap-2">
                        <x-secondary-button type="button" x-on:click.prevent="$refs.photo.click()" class="hover:bg-red-100">
                            {{ __('Select A New Photo') }}
                        </x-secondary-button>

                        @if ($this->user->profile_photo_path)
                            <x-secondary-button type="button" wire:click="deleteProfilePhoto" class="hover:bg-red-100">
                                {{ __('Remove Photo') }}
                            </x-secondary-button>
                        @endif
                    </div>

                    <x-input-error for="photo" class="mt-2 text-red-600" />
                </div>
            @endif

            <!-- Name -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" type="text" class="mt-1 block w-full border-red-300 focus:border-red-500 focus:ring-red-200 rounded-md shadow-sm" wire:model="state.name" required autocomplete="name" />
                <x-input-error for="name" class="mt-2 text-red-600" />
            </div>

            <!-- Email -->
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" class="mt-1 block w-full border-red-300 focus:border-red-500 focus:ring-red-200 rounded-md shadow-sm" wire:model="state.email" required autocomplete="username" />
                <x-input-error for="email" class="mt-2 text-red-600" />

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                    <p class="text-sm mt-2 text-gray-700">
                        {{ __('Your email address is unverified.') }}
                        <button type="button" class="underline text-sm text-red-600 hover:text-red-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" wire:click.prevent="sendEmailVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                @endif
            </div>
        </div>
    </x-slot>

    <!-- Actions -->
    <x-slot name="actions">
        <x-action-message class="me-3 text-green-600" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo" class="bg-red-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300 hover:scale-105 transform">

            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
