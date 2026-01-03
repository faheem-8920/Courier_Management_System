<x-form-section submit="updatePassword">

    <x-slot name="title">
        <span class="text-danger fw-bold fs-5">
            {{ __('Update Password') }}
        </span>
    </x-slot>

    <x-slot name="description">
        <span class="text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </span>
    </x-slot>

    <x-slot name="form">
        <div class="bg-danger bg-opacity-10 border-start border-4 border-danger p-4 rounded shadow-sm">

            <!-- Current Password -->
            <div class="mb-3">
                <label for="current_password" class="form-label">
                    {{ __('Current Password') }}
                </label>

                <input
                    id="current_password"
                    type="password"
                    class="form-control border-danger"
                    wire:model="state.current_password"
                    autocomplete="current-password">

                <x-input-error for="current_password" class="text-danger mt-1" />
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    {{ __('New Password') }}
                </label>

                <input
                    id="password"
                    type="password"
                    class="form-control border-danger"
                    wire:model="state.password"
                    autocomplete="new-password">

                <x-input-error for="password" class="text-danger mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    {{ __('Confirm Password') }}
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    class="form-control border-danger"
                    wire:model="state.password_confirmation"
                    autocomplete="new-password">

                <x-input-error for="password_confirmation" class="text-danger mt-1" />
            </div>

        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3 text-success" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <button type="submit" class="btn btn-danger px-4">
            {{ __('Save') }}
        </button>
    </x-slot>

</x-form-section>
