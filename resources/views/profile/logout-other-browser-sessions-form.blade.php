<div x-data="{ showLogoutModal: @entangle('confirmingLogout') }" x-cloak>
    <x-action-section>
        <!-- Title -->
        <x-slot name="title">
            <div class="d-flex align-items-center gap-4 mb-3">
                <div class="icon-container bg-gradient-red p-4 rounded-4 shadow-primary">
                    <i class="bi bi-laptop text-white fs-3"></i>
                </div>
                <div>
                    <h3 class="text-primary fw-bold mb-1 display-6">{{ __('Browser Sessions') }}</h3>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-gradient-red bg-opacity-20 text-white px-3 py-2 rounded-pill fw-medium">
                            <i class="bi bi-shield-check me-2"></i>
                            {{ __('Security Management') }}
                        </span>
                        <span class="text-muted fs-6">•</span>
                        <span class="text-muted fs-6">{{ __('Active sessions across devices') }}</span>
                    </div>
                </div>
            </div>
        </x-slot>

        <!-- Description -->
        <x-slot name="description">
            <div class="alert alert-light  rounded-3 p-4 bg-gradient-red">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-info-circle-fill text-white fs-4"></i>
                    <div>
                        <h6 class="fw-bold mb-1">{{ __('Session Management') }}</h6>
                        <p class="mb-0 text-white">{{ __('Monitor and control your active sessions on other browsers and devices. Log out from suspicious locations.') }}</p>
                    </div>
                </div>
            </div>
        </x-slot>

        <!-- Content -->
        <x-slot name="content">
            <!-- Security Info Card -->
            <div class="card glass-card border-0 shadow-lg mb-5 overflow-hidden">
                <div class="card-header bg-gradient-red text-white py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-2 bg-white bg-opacity-20 rounded-circle">
                                <i class="bi bi-shield-lock fs-4"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold">{{ __('Security Alert') }}</h4>
                                <p class="mb-0 opacity-75">Active sessions security overview</p>
                            </div>
                        </div>
                        <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold">
                            <i class="bi bi-eye-fill me-2"></i>
                            MONITOR
                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-warning border-2 border-warning bg-warning-subtle rounded-3">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-exclamation-triangle-fill text-warning fs-3"></i>
                            <div>
                                <h6 class="alert-heading fw-bold mb-2">{{ __('Important Security Notice') }}</h6>
                                <p class="mb-0">
                                    {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- List of Sessions -->
            @if (count($this->sessions) > 0)
                <div class="mb-5">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="fw-bold text-dark">
                            <i class="bi bi-list-check me-2"></i>
                            {{ __('Active Sessions') }}
                            <span class="badge bg-gradient-red bg-opacity-10 text-white ms-2">{{ count($this->sessions) }}</span>
                        </h5>
                        <span class="text-muted small">Last updated: {{ now()->format('M d, Y H:i') }}</span>
                    </div>
                    
                    <div class="row g-4">
                        @foreach ($this->sessions as $session)
                            <div class="col-12">
                                <div class="card border shadow-sm session-card hover-lift" 
                                     @if($session->is_current_device) style="border-left: 4px solid #0d6efd !important;" @endif>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <!-- Device Icon -->
                                            <div class="col-auto">
                                                <div class="device-icon text-white p-3 rounded-3 
                                                    @if($session->agent->isDesktop()) bg-gradient-red bg-opacity-10 text-primary
                                                    @else bg-info bg-opacity-10 text-info @endif">
                                                    @if ($session->agent->isDesktop())
                                                        <i class="bi bi-laptop fs-3"></i>
                                                    @else
                                                        <i class="bi bi-phone fs-3"></i>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <!-- Session Details -->
                                            <div class="col">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h6 class="fw-bold mb-1 " >
                                                            @if ($session->agent->isDesktop())
                                                                {{ __('Desktop') }}
                                                            @else
                                                                {{ __('Mobile') }}
                                                            @endif
                                                            <span class="badge bg-gradient-red bg-opacity-20 text-white ms-2">
                                                                {{ $session->agent->platform() ?? __('Unknown') }}
                                                            </span>
                                                        </h6>
                                                        <div class="text-muted small mb-2">
                                                            <i class="bi bi-browser-edge me-1"></i>
                                                            {{ $session->agent->browser() ?? __('Unknown Browser') }}
                                                        </div>
                                                    </div>
                                                    @if ($session->is_current_device)
                                                        <span class="badge bg-success bg-opacity-20 text-white px-3 py-1">
                                                            <i class="bi bi-check-circle-fill me-1"></i>
                                                            {{ __('Current Device') }}
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                <div class="d-flex flex-wrap gap-3 mt-2">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i class="bi bi-geo-alt text-muted"></i>
                                                        <span class="text-muted small">{{ $session->ip_address }}</span>
                                                    </div>
                                                    @if (!$session->is_current_device)
                                                        <div class="d-flex align-items-center gap-2">
                                                            <i class="bi bi-clock-history text-muted"></i>
                                                            <span class="text-muted small">{{ __('Last active') }} {{ $session->last_active }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="card border-0 bg-light-gradient text-center p-5 mb-5">
                    <i class="bi bi-laptop text-muted fs-1 mb-3"></i>
                    <h5 class="fw-bold text-muted">{{ __('No Active Sessions') }}</h5>
                    <p class="text-muted mb-0">{{ __('You are only logged in on this device.') }}</p>
                </div>
            @endif

            <!-- Action Zone -->
            <div class="text-center py-5 px-4 rounded-4 border-3 border-primary bg-white shadow-lg position-relative action-zone">
                <div class="position-absolute top-0 start-50 translate-middle">
                    <span class="badge bg-gradient-red text-white px-4 py-2 rounded-pill fw-bold shadow">
                        <i class="bi bi-shield-lock me-2"></i>
                        SECURITY ACTION
                    </span>
                </div>
                
                <div class="mb-4">
                    <h4 class="fw-bold text-primary mb-3">Need to secure your account?</h4>
                    <p class="text-muted mb-4">Log out from all other devices to ensure only you have access.</p>
                </div>

                <!-- Logout Button -->
                <button 
                    wire:click="confirmLogout" 
                    wire:loading.attr="disabled"
                    class="btn btn-primary btn-xl px-5 py-3 d-inline-flex align-items-center gap-3 shadow-lg glow-on-hover-primary">
                    <div class="sparkle-container">
                        <i class="bi bi-door-open-fill fs-2 sparkle"></i>
                    </div>
                    <div class="text-start">
                        <div class="fw-bold fs-4">LOG OUT OTHER SESSIONS</div>
                        <small class="opacity-75">Secure your account across all devices</small>
                    </div>
                    <i class="bi bi-arrow-right-circle-fill fs-3"></i>
                </button>
                
                <div class="mt-4">
                    <x-action-message class="text-success fw-bold d-flex align-items-center justify-content-center gap-2" on="loggedOut">
                        <i class="bi bi-check-circle-fill"></i>
                        {{ __('All other sessions have been logged out successfully!') }}
                    </x-action-message>
                </div>
            </div>

            <!-- Logout Confirmation Modal -->
            <div x-show="showLogoutModal" x-transition.opacity>
                <!-- Modal Backdrop -->
                <div class="modal-backdrop fade show" style="opacity: 0.5;"></div>
                
                <!-- Modal -->
                <div class="modal fade show d-block" tabindex="-1" role="dialog" style="overflow-y: auto;">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                            <!-- Modal Header -->
                            <div class="modal-header bg-gradient-primary text-white border-0 py-4">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="modal-icon bg-white bg-opacity-20 p-3 rounded-circle">
                                            <i class="bi bi-door-open-fill text-white fs-3"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0 fw-bold">Log Out Other Sessions</h4>
                                            <p class="mb-0 opacity-90">Confirm your identity to proceed</p>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white" @click="showLogoutModal = false" aria-label="Close"></button>
                                </div>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body p-5">
                                <!-- Warning Alert -->
                                <div class="alert alert-warning border-2 border-warning bg-warning-subtle rounded-3 mb-4">
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="bi bi-exclamation-triangle-fill fs-3 text-warning"></i>
                                        <div>
                                            <h6 class="alert-heading fw-bold mb-2">Security Action Required</h6>
                                            <p class="mb-0">
                                                {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Input Section -->
                                <div class="mb-4">
                                    <div class="text-center mb-4">
                                        <div class="security-icon mb-3">
                                            <i class="bi bi-shield-lock text-primary fs-1"></i>
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Verify Your Identity</h5>
                                        <p class="text-muted">Enter your password to confirm session logout</p>
                                    </div>
                                    
                                    <div x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                                        <div class="form-floating mb-3">
                                            <input 
                                                type="password" 
                                                class="form-control border-2 border-primary password-field py-3"
                                                id="passwordInput"
                                                autocomplete="current-password"
                                                placeholder="Enter your password"
                                                x-ref="password"
                                                wire:model="password"
                                                wire:keydown.enter="logoutOtherBrowserSessions" />
                                            <label for="passwordInput" class="text-muted">
                                                <i class="bi bi-lock-fill me-2"></i>
                                                Account Password
                                            </label>
                                        </div>
                                        <x-input-error for="password" class="mt-2 text-danger fw-bold d-flex align-items-center gap-2" />
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex flex-column gap-3">
                                    <!-- Cancel Button -->
                                    <div class="text-center">
                                        <button 
                                            type="button"
                                            @click="showLogoutModal = false"
                                            wire:loading.attr="disabled"
                                            class="btn btn-outline-secondary px-4 py-2 d-flex align-items-center gap-2 mx-auto">
                                            <i class="bi bi-arrow-left"></i>
                                            Cancel Action
                                        </button>
                                    </div>

                                    <!-- Logout Button -->
                                    <div class="d-grid">
                                        <button 
                                            type="button"
                                            class="btn btn-primary btn-lg py-3 d-flex align-items-center justify-content-center gap-3 shadow-lg"
                                            wire:click="logoutOtherBrowserSessions" 
                                            wire:loading.attr="disabled">
                                            <span wire:loading.remove wire:target="logoutOtherBrowserSessions">
                                                <i class="bi bi-door-open-fill"></i>
                                                Log Out Other Sessions
                                            </span>
                                            <span wire:loading wire:target="logoutOtherBrowserSessions">
                                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                                Logging out sessions...
                                            </span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Security Note -->
                                <div class="alert alert-info bg-info-subtle border-info rounded-3 mt-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-info-circle-fill text-info"></i>
                                        <small class="fw-medium">
                                            This will log you out from all devices except this one. You'll stay logged in here.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-action-section>

    <style>
    [x-cloak] { display: none !important; }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%) !important;
    }
    
    .shadow-primary {
        box-shadow: 0 10px 30px rgba(13, 110, 253, 0.15) !important;
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(13, 110, 253, 0.2) !important;
    }
    
    .bg-warning-subtle {
        background-color: rgba(255, 193, 7, 0.05) !important;
    }
    
    .bg-info-subtle {
        background-color: rgba(13, 202, 240, 0.05) !important;
    }
    
    .hover-lift {
        transition: all 0.3s ease;
    }
    
    .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
    }
    
    .session-card {
        transition: all 0.3s ease;
    }
    
    .device-icon {
        transition: all 0.3s ease;
    }
    
    .session-card:hover .device-icon {
        transform: scale(1.1);
    }
    
    .glow-on-hover-primary {
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        border: none;
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
    }
    
    .glow-on-hover-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px rgba(13, 110, 253, 0.3) !important;
    }
    
    .glow-on-hover-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: 0.5s;
    }
    
    .glow-on-hover-primary:hover::before {
        left: 100%;
    }
    
    .sparkle-container {
        position: relative;
    }
    
    .sparkle {
        animation: sparkle 2s infinite;
    }
    
    @keyframes sparkle {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
    
    .modal-backdrop {
        opacity: 0.5;
        background-color: #000;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 1040;
    }
    
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 1050;
        display: none;
        overflow-y: auto;
    }
    
    .modal.show {
        display: block;
    }
    
    .modal-dialog {
        margin: 2rem auto;
        max-width: 500px;
    }
    
    .password-field:focus {
        border-color: #0d6efd !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
    }
    
    .btn-xl {
        padding: 1rem 2rem;
        font-size: 1.25rem;
    }
    
    .bg-light-gradient {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .border-dashed {
        border-style: dashed !important;
    }
    
    .btn-close-white {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
    
    .d-grid {
        display: grid;
    }
    
    .modal-content {
        border-radius: 20px !important;
        overflow: hidden;
    }
    
    .action-zone {
        border-style: dashed !important;
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    }
    
    .modal-icon {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    </style>
</div>