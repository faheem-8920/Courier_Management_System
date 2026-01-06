<div x-data="{ showDeleteModal: @entangle('confirmingUserDeletion') }" x-cloak>
    <x-action-section>
        <!-- Title -->
        <x-slot name="title">
            <div class="d-flex align-items-center gap-4 mb-3">
                <div class="icon-container bg-gradient-danger p-4 rounded-4 shadow-danger">
                    <i class="bi bi-person-x-fill text-white fs-3"></i>
                </div>
                <div>
                    <h3 class="text-danger fw-bold mb-1 display-6">{{ __('Delete Account') }}</h3>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-danger bg-opacity-20 text-white px-3 py-2 rounded-pill fw-medium">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            {{ __('Irreversible Action') }}
                        </span>
                        <span class="text-muted fs-6">•</span>
                        <span class="text-muted fs-6">{{ __('Proceed with caution') }}</span>
                    </div>
                </div>
            </div>
        </x-slot>

        <!-- Description -->
        <x-slot name="description">
            <div class="alert alert-light border border-2 border-dashed rounded-3 p-4 bg-light-gradient">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-info-circle-fill text-primary fs-4"></i>
                    <div>
                        <h6 class="fw-bold mb-1">{{ __('Final Warning') }}</h6>
                        <p class="mb-0 text-muted">{{ __('This action will permanently delete all your data, files, and account access. There is no recovery option.') }}</p>
                    </div>
                </div>
            </div>
        </x-slot>

        <!-- Content -->
        <x-slot name="content">
            <!-- Impact Card -->
            <div class="card glass-card border-0 shadow-lg mb-5 overflow-hidden">
                <div class="card-header bg-danger text-white py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-2 bg-white bg-opacity-20 rounded-circle">
                                <i class="bi bi-clipboard-x fs-4"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold">{{ __('What Will Be Deleted') }}</h4>
                                <p class="mb-0 opacity-75">Complete account termination overview</p>
                            </div>
                        </div>
                        <span class="badge bg-white text-danger px-3 py-2 rounded-pill fw-bold">
                            <i class="bi bi-eraser-fill me-2"></i>
                            PERMANENT
                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="impact-item p-4 rounded-3 border border-danger-subtle bg-danger-subtle">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="icon-circle bg-danger text-white p-3 rounded-circle">
                                        <i class="bi bi-person-badge fs-4"></i>
                                    </div>
                                    <h6 class="mb-0 fw-bold text-danger">Personal Data</h6>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center gap-2 mb-2">
                                        <i class="bi bi-check-circle-fill text-danger"></i>
                                        <span>Profile information & settings</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-2">
                                        <i class="bi bi-check-circle-fill text-danger"></i>
                                        <span>Contact details & preferences</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2">
                                        <i class="bi bi-check-circle-fill text-danger"></i>
                                        <span>Account credentials</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="impact-item p-4 rounded-3 border border-danger-subtle bg-danger-subtle">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="icon-circle bg-danger text-white p-3 rounded-circle">
                                        <i class="bi bi-folder-x fs-4"></i>
                                    </div>
                                    <h6 class="mb-0 fw-bold text-danger">Files & Content</h6>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center gap-2 mb-2">
                                        <i class="bi bi-check-circle-fill text-danger"></i>
                                        <span>Uploaded files & documents</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2 mb-2">
                                        <i class="bi bi-check-circle-fill text-danger"></i>
                                        <span>Generated content & history</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-2">
                                        <i class="bi bi-check-circle-fill text-danger"></i>
                                        <span>All stored data permanently</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Warning Strip -->
                    <div class="warning-strip mt-4 p-4 rounded-3 bg-gradient-danger text-white position-relative overflow-hidden">
                        <div class="position-absolute top-0 start-0 w-100 h-100 warning-pattern"></div>
                        <div class="position-relative z-1 d-flex align-items-center gap-3">
                            <i class="bi bi-exclamation-octagon-fill fs-1"></i>
                            <div class="flex-grow-1">
                                <h5 class="fw-bold mb-1">No Recovery Available</h5>
                                <p class="mb-0 opacity-90">Once deleted, your account and all associated data cannot be restored under any circumstances.</p>
                            </div>
                            <i class="bi bi-shield-exclamation fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Zone -->
            <div class="text-center py-5 px-4 rounded-4 border-3 border-danger bg-white shadow-lg position-relative action-zone">
                <div class="position-absolute top-0 start-50 translate-middle">
                    <span class="badge bg-danger text-white px-4 py-2 rounded-pill fw-bold shadow">
                        <i class="bi bi-lock-fill me-2"></i>
                        SECURED ACTION
                    </span>
                </div>
                
                <div class="mb-5">
                    <h4 class="fw-bold text-danger mb-3">Ready to proceed?</h4>
                    <p class="text-muted mb-4">Click below to begin the account deletion process. You'll be asked to confirm your password.</p>
                    
                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <div class="step-indicator active">
                            <div class="step-number">1</div>
                            <div class="step-label">Initiate</div>
                        </div>
                        <div class="step-divider"></div>
                        <div class="step-indicator">
                            <div class="step-number">2</div>
                            <div class="step-label">Confirm</div>
                        </div>
                        <div class="step-divider"></div>
                        <div class="step-indicator">
                            <div class="step-number">3</div>
                            <div class="step-label">Delete</div>
                        </div>
                    </div>
                </div>

                <!-- Delete Button -->
                <button 
                    wire:click="confirmUserDeletion" 
                    wire:loading.attr="disabled"
                    class="btn btn-danger btn-xl px-5 py-4 d-inline-flex align-items-center gap-3 shadow-lg glow-on-hover">
                    <div class="sparkle-container">
                        <i class="bi bi-trash3-fill fs-2 sparkle"></i>
                    </div>
                    <div class="text-start">
                        <div class="fw-bold fs-3">DELETE MY ACCOUNT</div>
                        <small class="opacity-75">Permanent and irreversible action</small>
                    </div>
                    <i class="bi bi-arrow-right-circle-fill fs-3"></i>
                </button>
                
                <p class="text-muted small mt-4">
                    <i class="bi bi-shield-check me-2"></i>
                    Your request will be processed immediately upon confirmation
                </p>
            </div>

            <!-- Delete User Confirmation Modal -->
            <div x-show="showDeleteModal" x-transition.opacity>
                <!-- Modal Backdrop -->
                <div class="modal-backdrop fade show" style="opacity: 0.5;"></div>
                
                <!-- Modal -->
                <div class="modal fade show d-block" tabindex="-1" role="dialog" style="overflow-y: auto;">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                            <!-- Modal Header -->
                            <div class="modal-header bg-gradient-danger text-white border-0 py-4">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="modal-icon bg-white bg-opacity-20 p-3 rounded-circle">
                                            <i class="bi bi-person-x-fill text-white fs-3"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0 fw-bold">Confirm Account Deletion</h4>
                                            <p class="mb-0 opacity-90">This action cannot be undone</p>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white" @click="showDeleteModal = false" aria-label="Close"></button>
                                </div>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body p-5">
                                <!-- Warning Alert -->
                                <div class="alert alert-danger border-2 border-danger bg-danger-subtle rounded-3 mb-4">
                                    <div class="d-flex align-items-start gap-3">
                                        <i class="bi bi-exclamation-triangle-fill fs-3 text-danger"></i>
                                        <div>
                                            <h6 class="alert-heading fw-bold mb-2">Permanent Action Warning</h6>
                                            <p class="mb-0">Once deleted, all your data will be permanently removed with no recovery option.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Input Section -->
                                <div class="mb-4">
                                    <div class="text-center mb-4">
                                        <div class="security-icon mb-3">
                                            <i class="bi bi-shield-lock text-danger fs-1"></i>
                                        </div>
                                        <h5 class="fw-bold text-danger mb-2">Verify Your Identity</h5>
                                        <p class="text-muted">Enter your password to confirm account deletion</p>
                                    </div>
                                    
                                    <div x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                                        <div class="form-floating mb-3">
                                            <input 
                                                type="password" 
                                                class="form-control border-2 border-danger password-field py-3"
                                                id="passwordInput"
                                                autocomplete="current-password"
                                                placeholder="Enter your password"
                                                x-ref="password"
                                                wire:model="password"
                                                wire:keydown.enter="deleteUser" />
                                            <label for="passwordInput" class="text-muted">
                                                <i class="bi bi-lock-fill me-2"></i>
                                                Account Password
                                            </label>
                                        </div>
                                        <x-input-error for="password" class="mt-2 text-danger fw-bold" />
                                    </div>
                                </div>

                                <!-- Cancel Button -->
                                <div class="text-center mb-4">
                                    <button 
                                        type="button"
                                        @click="showDeleteModal = false"
                                        wire:loading.attr="disabled"
                                        class="btn btn-outline-secondary px-4 py-2 d-flex align-items-center gap-2 mx-auto">
                                        <i class="bi bi-arrow-left"></i>
                                        Cancel Deletion
                                    </button>
                                </div>

                                <!-- Delete Button -->
                                <div class="d-grid mb-3">
                                    <button 
                                        type="button"
                                        class="btn btn-danger btn-lg py-3 d-flex align-items-center justify-content-center gap-3 shadow-lg"
                                        wire:click="deleteUser" 
                                        wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="deleteUser">
                                            <i class="bi bi-trash3-fill"></i>
                                            Delete Account Permanently
                                        </span>
                                        <span wire:loading wire:target="deleteUser">
                                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                            Deleting Account...
                                        </span>
                                    </button>
                                </div>

                                <!-- Progress Indicator -->
                                <div class="progress-container mt-4" wire:loading wire:target="deleteUser">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-danger fw-bold">Deleting Account...</span>
                                        <span class="text-danger fw-bold">100%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" 
                                             role="progressbar" style="width: 100%" 
                                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <!-- Final Warning -->
                                <div class="alert alert-warning bg-warning-subtle border-warning rounded-3 mt-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-info-circle-fill text-warning"></i>
                                        <small class="fw-medium">This is your final confirmation. The deletion process begins immediately.</small>
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
    
    .bg-gradient-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(220, 53, 69, 0.2) !important;
    }
    
    .shadow-danger {
        box-shadow: 0 10px 30px rgba(220, 53, 69, 0.15) !important;
    }
    
    .icon-container {
        transition: transform 0.3s ease;
    }
    
    .icon-container:hover {
        transform: scale(1.05) rotate(5deg);
    }
    
    .impact-item {
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .impact-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(220, 53, 69, 0.1) !important;
    }
    
    .icon-circle {
        transition: all 0.3s ease;
    }
    
    .warning-strip {
        position: relative;
        overflow: hidden;
    }
    
    .warning-pattern {
        background: repeating-linear-gradient(
            45deg,
            transparent,
            transparent 10px,
            rgba(255, 255, 255, 0.1) 10px,
            rgba(255, 255, 255, 0.1) 20px
        );
    }
    
    .action-zone {
        border-style: dashed !important;
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    }
    
    .step-indicator {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }
    
    .step-indicator.active .step-number {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
    }
    
    .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        background: #e9ecef;
        color: #6c757d;
        transition: all 0.3s ease;
    }
    
    .step-divider {
        width: 40px;
        height: 2px;
        background: #e9ecef;
        margin-top: 20px;
    }
    
    .step-label {
        font-size: 0.875rem;
        color: #6c757d;
    }
    
    .glow-on-hover {
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        border: none;
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    }
    
    .glow-on-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px rgba(220, 53, 69, 0.4) !important;
    }
    
    .glow-on-hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: 0.5s;
    }
    
    .glow-on-hover:hover::before {
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
    
    .modal-icon {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .password-field:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
    }
    
    .progress-bar-animated {
        animation: progress-bar-stripes 1s linear infinite;
    }
    
    @keyframes progress-bar-stripes {
        0% { background-position: 1rem 0; }
        100% { background-position: 0 0; }
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
    
    .shadow-lg {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
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
    </style>
</div>