<div x-data="{ 
    show: { current: false, new: false, confirm: false },
    passwordsMatch: null,
    strength: 0
}"
x-init="
    $watch('$wire.state.password', value => {
        if (!value) { strength = 0; return; }
        let s = 0;
        if (value.length >= 8) s += 25;
        if (/[A-Z]/.test(value)) s += 25;
        if (/[0-9]/.test(value)) s += 25;
        if (/[^A-Za-z0-9]/.test(value)) s += 25;
        strength = s;
    });

    $watch('$wire.state.password_confirmation', () => {
        passwordsMatch =
            $wire.state.password &&
            $wire.state.password_confirmation &&
            $wire.state.password === $wire.state.password_confirmation;
    });
"
>
    <x-form-section submit="updatePassword">
        <x-slot name="title">
            <div class="d-flex align-items-center gap-4 mb-3">
                <div class="icon-container bg-gradient-red p-4 rounded-4 shadow-red position-relative">
                    <i class="bi bi-shield-lock text-white fs-3"></i>
                    <div class="position-absolute top-0 end-0 translate-middle badge bg-white text-danger rounded-circle p-2 shadow-sm border border-danger">
                        <i class="bi bi-key fs-6"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-danger fw-bold mb-1 display-6">{{ __('Update Password') }}</h3>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="badge bg-gradient-red text-white px-3 py-2 rounded-pill fw-medium border-0 shadow-sm">
                            <i class="bi bi-shield-check me-2"></i>
                            {{ __('Security') }}
                        </span>
                        <span class="badge bg-white text-danger border border-danger px-3 py-2 rounded-pill fw-medium shadow-sm">
                            <i class="bi bi-lock me-2"></i>
                            {{ __('Password Protection') }}
                        </span>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="description">
            <div class="card border-gradient-red bg-white shadow-lg p-4 rounded-4 position-relative overflow-hidden">
                <div class="position-absolute top-0 start-0 w-100 h-100 danger-diagonal opacity-10"></div>
                <div class="position-relative z-1 d-flex align-items-center gap-4">
                    <div class="flex-shrink-0">
                        <div class="bg-gradient-red p-3 rounded-circle shadow-red">
                            <i class="bi bi-shield-shaded text-white fs-2"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold text-danger mb-2">{{ __('Password Security') }}</h6>
                        <p class="text-dark mb-0">{{ __('Ensure your account is using a strong, unique password. We recommend using a password manager for better security.') }}</p>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="form">
            <div class="card border-3 border-danger bg-white shadow-xl rounded-4 overflow-hidden glass-effect">
                <div class="card-header bg-gradient-red bg-opacity-10 border-bottom border-danger border-opacity-25 py-4 position-relative">
                    <div class="gradient-overlay"></div>
                    <div class="position-relative z-1 d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="fw-bold text-white mb-0">
                                <i class="bi bi-key-fill me-2"></i>
                                {{ __('Password Settings') }}
                            </h5>
                            <p class="text-white small mb-0">Update your account password securely</p>
                        </div>
                        <span class="badge bg-gradient-red text-white px-3 py-2 pulse shadow-sm border-0">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Security Required
                        </span>
                    </div>
                </div>
                
                <div class="card-body p-5">
                    <div class="row g-4">
                        <!-- Current Password -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="current_password" class="form-label fw-bold text-danger mb-3 d-flex align-items-center gap-2">
                                    <div class="field-icon bg-gradient-red bg-opacity-10 p-2 rounded-circle">
                                        <i class="bi bi-lock-fill text-white"></i>
                                    </div>
                                    {{ __('Current Password') }}
                                    <span class="text-danger ms-2">*</span>
                                </label>
                                <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden">
                                    <span class="input-group-text bg-gradient-red bg-opacity-10 border-danger border-end-0">
                                        <i class="bi bi-key text-white"></i>
                                    </span>
                                    <input
                                        id="current_password"
                                        type="password"
                                        class="form-control border-danger border-start-0 border-end-0 py-3 focus-red"
                                        wire:model.defer="state.current_password"
                                        autocomplete="current-password"
                                        placeholder="Enter your current password">
                                    <span class="input-group-text bg-white border-danger border-start-0" style="cursor: pointer;" 
                                          @click="show.current = !show.current; togglePassword('current_password')">
                                        <i class="bi" :class="show.current ? 'bi-eye-slash' : 'bi-eye'"></i>
                                    </span>
                                </div>
                                <x-input-error for="current_password" class="mt-2 text-danger fw-bold d-flex align-items-center gap-2">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </x-input-error>
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password" class="form-label fw-bold text-danger mb-3 d-flex align-items-center gap-2">
                                    <div class="field-icon bg-gradient-red bg-opacity-10 p-2 rounded-circle">
                                        <i class="bi bi-lock text-white"></i>
                                    </div>
                                    {{ __('New Password') }}
                                    <span class="text-danger ms-2">*</span>
                                </label>
                                <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden">
                                    <span class="input-group-text bg-gradient-red bg-opacity-10 border-danger border-end-0">
                                        <i class="bi bi-plus-circle text-white"></i>
                                    </span>
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control border-danger border-start-0 border-end-0 py-3 focus-red"
                                        wire:model.defer="state.password"
                                        autocomplete="new-password"
                                        placeholder="Create a new password">
                                    <span class="input-group-text bg-white border-danger border-start-0" style="cursor: pointer;" 
                                          @click="show.new = !show.new; togglePassword('password')">
                                        <i class="bi" :class="show.new ? 'bi-eye-slash' : 'bi-eye'"></i>
                                    </span>
                                </div>
                                <x-input-error for="password" class="mt-2 text-danger fw-bold d-flex align-items-center gap-2">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </x-input-error>

                                <!-- Password Strength -->
                                <div class="password-strength mt-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <small class="text-muted">Password Strength</small>
                                        <small class="fw-bold"
                                            :class="strength < 80 ? 'text-danger' : 'text-success'"
                                            x-text="strength < 80 ? 'Weak (Required Strong)' : 'Strong'">
                                        </small>
                                    </div>

                                    <div class="progress bg-danger bg-opacity-10" style="height: 6px;">
                                        <div class="progress-bar"
                                            :class="{
                                                'bg-gradient-red': strength < 40,
                                                'bg-warning': strength >= 40 && strength < 80,
                                                'bg-gradient-green': strength >= 80
                                            }"
                                            :style="{ width: strength + '%' }">
                                        </div>
                                    </div>

                                    <small class="text-muted mt-2 d-block">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Use at least 8 characters with uppercase, numbers & symbols
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label fw-bold text-danger mb-3 d-flex align-items-center gap-2">
                                    <div class="field-icon bg-gradient-red bg-opacity-10 p-2 rounded-circle">
                                        <i class="bi bi-lock-fill text-white"></i>
                                    </div>
                                    {{ __('Confirm Password') }}
                                    <span class="text-danger ms-2">*</span>
                                </label>
                                <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden">
                                    <span class="input-group-text bg-gradient-red bg-opacity-10 border-danger border-end-0">
                                        <i class="bi bi-check-circle text-white"></i>
                                    </span>
                                    <input
                                        id="password_confirmation"
                                        type="password"
                                        wire:model.defer="state.password_confirmation"
                                        :class="passwordsMatch === false ? 'shake border-danger' : ''"
                                        class="form-control border-danger py-3"
                                        placeholder="Confirm your new password">
                                    <span class="input-group-text bg-white border-danger border-start-0" style="cursor: pointer;" 
                                          @click="show.confirm = !show.confirm; togglePassword('password_confirmation')">
                                        <i class="bi" :class="show.confirm ? 'bi-eye-slash' : 'bi-eye'"></i>
                                    </span>
                                </div>
                                <x-input-error for="password_confirmation" class="mt-2 text-danger fw-bold d-flex align-items-center gap-2">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </x-input-error>
                            </div>
                        </div>

                        <div class="mt-4 text-muted small d-flex align-items-center gap-2">
                            <i class="bi bi-clock-history text-danger"></i>
                            Last updated:
                            <span class="fw-bold">
                                {{ auth()->user()->updated_at->diffForHumans() }}
                            </span>
                        </div>

                        <!-- Security Tips -->
                        <div class="col-12">
                            <div class="card bg-gradient-red bg-opacity-5 border-danger border-opacity-25 rounded-4 p-4 shadow-sm">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-shield-check text-white fs-3"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold text-white mb-2">Security Best Practices</h6>
                                        <ul class="list-unstyled text-white mb-0">
                                            <li class="mb-2 d-flex align-items-start gap-2">
                                                <i class="bi bi-check-circle text-success mt-1"></i>
                                                <span>Use a unique password that you don't use elsewhere</span>
                                            </li>
                                            <li class="mb-2 d-flex align-items-center gap-2">
                                                <i class="bi bi-check-circle text-success"></i>
                                                <span>Consider using a password manager for better security</span>
                                            </li>
                                            <li class="d-flex align-items-center gap-2">
                                                <i class="bi bi-check-circle text-success"></i>
                                                <span>Update your password regularly for maximum security</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <div class="d-flex align-items-center justify-content-end w-100">
                <!-- Save Button -->
                <button type="submit"
                    wire:loading.attr="disabled"
                    wire:target="updatePassword"
                    :disabled="passwordsMatch !== true || strength < 80"
                    class="btn btn-gradient-red btn-lg px-5 py-3 d-flex align-items-center gap-3 shadow-lg rounded-pill"
                    :class="(passwordsMatch === false || strength < 80) ? 'disabled opacity-50' : ''">
                    <i class="bi bi-shield-lock"></i>
                    Update Password
                </button>
            </div>
        </x-slot>
    </x-form-section>

    <script>
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</div>
