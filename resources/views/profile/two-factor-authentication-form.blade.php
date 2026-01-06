<div>
    <x-action-section>
        <!-- Title -->
        <x-slot name="title">
            <div class="d-flex align-items-center">
                <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-2 me-3">
                    <i class="fas fa-shield-alt text-danger"></i>
                </div>
                <div>
                    <span class="text-danger fw-bold fs-4">{{ __('Two-Factor Authentication') }}</span>
                    <p class="text-muted mb-0 mt-1 small">Add an extra layer of security to your account</p>
                </div>
            </div>
        </x-slot>

        <!-- Description -->
        <x-slot name="description">
            <span class="text-muted">{{ __('Protect your account with two-step verification using authenticator apps.') }}</span>
        </x-slot>

        <!-- Content -->
        <x-slot name="content">
            <!-- Status Card -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                @if ($this->enabled)
                                    @if ($showingConfirmation)
                                        <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-2">
                                            <i class="fas fa-clock text-warning"></i>
                                        </div>
                                    @else
                                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-2">
                                            <i class="fas fa-check-circle text-success"></i>
                                        </div>
                                    @endif
                                @else
                                    <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-2">
                                        <i class="fas fa-times-circle text-danger"></i>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h4 class="fw-bold mb-0">
                                    @if ($this->enabled)
                                        @if ($showingConfirmation)
                                            <span class="text-warning">{{ __('Awaiting Confirmation') }}</span>
                                        @else
                                            <span class="text-success">{{ __('2FA Active') }}</span>
                                        @endif
                                    @else
                                        <span class="text-danger">{{ __('2FA Not Active') }}</span>
                                    @endif
                                </h4>
                                <p class="text-muted small mb-0">
                                    @if ($this->enabled)
                                        @if ($showingConfirmation)
                                            {{ __('Complete setup to activate protection') }}
                                        @else
                                            {{ __('Your account is protected with 2FA') }}
                                        @endif
                                    @else
                                        {{ __('Enable to enhance account security') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        
                        @if ($this->enabled && !$showingConfirmation)
                            <span class="badge bg-success bg-opacity-10 text-success p-2">
                                <i class="fas fa-shield-check me-1"></i> Protected
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Info Panel -->
            <div class="alert alert-danger bg-danger bg-opacity-5 border-danger border-start border-4 rounded-3 mb-4">
                <div class="d-flex">
                    <div class="me-3">
                        <i class="fas fa-info-circle text-danger fs-5"></i>
                    </div>
                    <div>
                        <h6 class="alert-heading fw-bold text-danger mb-2">How Two-Factor Authentication Works</h6>
                        <p class="mb-0 text-muted">
                            {{ __('When enabled, you\'ll need to enter a verification code from your authenticator app (like Google Authenticator or Authy) in addition to your password when signing in.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Setup Steps -->
            @if ($this->enabled)
                @if ($showingQrCode)
                    <div class="card border-0 shadow-sm rounded-3 mb-4">
                        <div class="card-header bg-white border-bottom border-danger border-2 py-3">
                            <h5 class="fw-bold text-danger mb-0">
                                <i class="fas fa-qrcode me-2"></i>
                                {{ __('Setup Instructions') }}
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-danger mb-3">
                                            @if ($showingConfirmation)
                                                {{ __('Step 2: Verify Setup') }}
                                            @else
                                                {{ __('Step 1: Scan QR Code') }}
                                            @endif
                                        </h6>
                                        
                                        @if ($showingConfirmation)
                                            <p class="text-muted mb-3">
                                                {{ __('Enter the 6-digit code from your authenticator app to complete setup.') }}
                                            </p>
                                        @else
                                            <p class="text-muted mb-3">
                                                {{ __('Scan this QR code with your authenticator app or manually enter the setup key.') }}
                                            </p>
                                        @endif
                                    </div>
                                    
                                    @if ($showingConfirmation)
                                        <div class="mb-4">
                                            <label for="code" class="form-label fw-bold text-danger">
                                                {{ __('Verification Code') }}
                                            </label>
                                            <input 
                                                id="code" 
                                                type="text" 
                                                name="code" 
                                                class="form-control border-danger border-2 focus:ring-danger focus:border-danger"
                                                inputmode="numeric" 
                                                autofocus 
                                                autocomplete="one-time-code"
                                                wire:model="code"
                                                wire:keydown.enter="confirmTwoFactorAuthentication"
                                                placeholder="Enter 6-digit code"
                                                style="max-width: 200px;" />
                                            <div class="text-danger small mt-1">
                                                <x-input-error for="code" />
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="bg-white border border-danger border-opacity-25 rounded-3 p-3 text-center shadow-sm">
                                        <div class="mb-3">
                                            <small class="text-muted d-block mb-2">Scan QR Code</small>
                                            <div class="d-inline-block p-2 border border-danger border-opacity-25 rounded-3 bg-white">
                                                <div style="width: 180px; height: 180px;" class="d-flex align-items-center justify-content-center">
                                                    {!! $this->user->twoFactorQrCodeSvg() !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="border-top pt-3">
                                            <small class="text-muted d-block mb-2">Or Enter Setup Key</small>
                                            <div class="bg-danger bg-opacity-5 p-3 rounded-3">
                                                <code class="text-danger fw-bold fs-6">
                                                    {{ decrypt($this->user->two_factor_secret) }}
                                                </code>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Recovery Codes -->
                @if ($showingRecoveryCodes)
                    <div class="card border-danger border-2 shadow-sm rounded-3 mb-4">
                        <div class="card-header bg-danger bg-opacity-10 border-danger border-2 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center p-2 me-3">
                                    <i class="fas fa-key text-danger"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-danger mb-0">{{ __('Recovery Codes') }}</h5>
                                    <small class="text-danger opacity-75">Save these codes in a secure place</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-warning bg-warning bg-opacity-10 border-warning mb-4">
                                <div class="d-flex">
                                    <div class="me-3">
                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                    </div>
                                    <div>
                                        <h6 class="alert-heading fw-bold text-warning mb-2">Important Security Notice</h6>
                                        <p class="mb-0 text-muted">
                                            {{ __('Store these recovery codes in a secure password manager. Each code can only be used once to recover access if you lose your authenticator device.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row g-2 mb-4">
                                @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="bg-white border border-danger border-opacity-25 rounded-2 p-3 text-center hover-bg-danger hover-text-white transition-all">
                                            <code class="text-danger fw-bold">{{ $code }}</code>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-danger border-opacity-25">
                                <small class="text-muted">
                                    <i class="fas fa-download me-1"></i>
                                    You can download or print these codes
                                </small>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-print me-1"></i> Print Codes
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            <!-- Action Buttons -->
            <div class="mt-5">
                <div class="d-flex flex-wrap gap-3">
                    @if (!$this->enabled)
                        <x-confirms-password wire:then="enableTwoFactorAuthentication">
                            <button type="button" class="btn btn-danger btn-lg px-5 py-3 fw-bold shadow-sm hover-shadow">
                                <i class="fas fa-shield-alt me-2"></i>
                                {{ __('Enable Two-Factor Auth') }}
                            </button>
                        </x-confirms-password>
                    @else
                        @if ($showingRecoveryCodes)
                            <x-confirms-password wire:then="regenerateRecoveryCodes">
                                <button type="button" class="btn btn-outline-danger px-4 py-2 fw-bold">
                                    <i class="fas fa-redo me-2"></i>
                                    {{ __('Regenerate Codes') }}
                                </button>
                            </x-confirms-password>
                        @elseif ($showingConfirmation)
                            <div class="d-flex gap-3">
                                <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                                    <button type="button" class="btn btn-danger px-5 py-3 fw-bold shadow-sm hover-shadow" wire:loading.attr="disabled">
                                        <i class="fas fa-check-circle me-2"></i>
                                        {{ __('Verify & Activate') }}
                                    </button>
                                </x-confirms-password>
                                
                                <x-confirms-password wire:then="disableTwoFactorAuthentication">
                                    <button type="button" class="btn btn-outline-danger px-4 py-3 fw-bold" wire:loading.attr="disabled">
                                        <i class="fas fa-times me-2"></i>
                                        {{ __('Cancel Setup') }}
                                    </button>
                                </x-confirms-password>
                            </div>
                        @else
                            <div class="d-flex gap-3">
                                <x-confirms-password wire:then="showRecoveryCodes">
                                    <button type="button" class="btn btn-outline-danger px-4 py-2 fw-bold">
                                        <i class="fas fa-eye me-2"></i>
                                        {{ __('View Recovery Codes') }}
                                    </button>
                                </x-confirms-password>
                                
                                <x-confirms-password wire:then="disableTwoFactorAuthentication">
                                    <button type="button" class="btn btn-danger px-4 py-2 fw-bold shadow-sm hover-shadow" wire:loading.attr="disabled">
                                        <i class="fas fa-times me-2"></i>
                                        {{ __('Disable 2FA') }}
                                    </button>
                                </x-confirms-password>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Security Tips -->
            <div class="mt-5 pt-4 border-top border-danger border-opacity-25">
                <h6 class="fw-bold text-danger mb-3">
                    <i class="fas fa-lightbulb me-2"></i>Security Recommendations
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="text-success me-3">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <small class="fw-bold d-block">Use Authenticator Apps</small>
                                <small class="text-muted">Google Authenticator, Authy, or Microsoft Authenticator</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="text-success me-3">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <small class="fw-bold d-block">Backup Recovery Codes</small>
                                <small class="text-muted">Store codes in a password manager or secure location</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-action-section>

    <style>
        .hover-bg-danger:hover {
            background-color: #dc3545 !important;
        }
        
        .hover-text-white:hover {
            color: white !important;
        }
        
        .hover-text-white:hover code {
            color: white !important;
        }
        
        .hover-shadow {
            transition: all 0.3s ease;
        }
        
        .hover-shadow:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3) !important;
        }
        
        .transition-all {
            transition: all 0.2s ease;
        }
        
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        
        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }
        
        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
        
        .btn-outline-danger:hover {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }
        
        .border-danger {
            border-color: #dc3545 !important;
        }
        
        .text-danger {
            color: #dc3545 !important;
        }
        
        .bg-danger {
            background-color: #dc3545 !important;
        }
        
        .bg-danger.bg-opacity-5 {
            background-color: rgba(220, 53, 69, 0.05) !important;
        }
        
        .bg-danger.bg-opacity-10 {
            background-color: rgba(220, 53, 69, 0.1) !important;
        }
        
        .bg-danger.bg-opacity-25 {
            background-color: rgba(220, 53, 69, 0.25) !important;
        }
        
        .rounded-3 {
            border-radius: 0.75rem !important;
        }
        
        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
        
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }
        
        /* Responsive adjustments for QR code */
        @media (max-width: 768px) {
            .row > .col-md-6 {
                margin-bottom: 1.5rem;
            }
            
            .d-flex.flex-wrap {
                flex-direction: column;
            }
            
            .d-flex.flex-wrap .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
    </style>
</div>