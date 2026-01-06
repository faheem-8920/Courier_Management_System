<div x-data="{ 
    photoName: null, 
    photoPreview: null,
    showDeleteConfirm: false
}">
    <x-form-section submit="updateProfileInformation">
        <!-- Title -->
        <x-slot name="title">
            <div class="d-flex align-items-center gap-4 mb-3">
                <div class="icon-container bg-gradient-red p-4 rounded-4 shadow-red position-relative">
                    <i class="bi bi-person-circle text-white fs-3"></i>
                    <div class="position-absolute top-0 end-0 translate-middle badge bg-white text-danger rounded-circle p-2 shadow-sm border border-danger">
                        <i class="bi bi-pencil-square fs-6"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-danger fw-bold mb-1 display-6">{{ __('Profile Information') }}</h3>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="badge bg-gradient-red text-white px-3 py-2 rounded-pill fw-medium border-0 shadow-sm">
                            <i class="bi bi-info-circle me-2"></i>
                            {{ __('Account Details') }}
                        </span>
                        <span class="badge bg-white text-danger border border-danger px-3 py-2 rounded-pill fw-medium shadow-sm">
                            <i class="bi bi-shield-lock me-2"></i>
                            {{ __('Personal Information') }}
                        </span>
                    </div>
                </div>
            </div>
        </x-slot>

        <!-- Description -->
        <x-slot name="description">
            <div class="card border-gradient-red bg-white shadow-lg p-4 rounded-4 position-relative overflow-hidden">
                <div class="position-absolute top-0 start-0 w-100 h-100 danger-diagonal opacity-10"></div>
                <div class="position-relative z-1 d-flex align-items-center gap-4">
                    <div class="flex-shrink-0">
                        <div class="bg-gradient-red p-3 rounded-circle shadow-red">
                            <i class="bi bi-person-badge text-white fs-2"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold text-danger mb-2">{{ __('Profile Management') }}</h6>
                        <p class="text-dark mb-0">{{ __('Update your account\'s profile information, photo, and email address. Keep your details current for better security.') }}</p>
                    </div>
                </div>
            </div>
        </x-slot>

        <!-- Form -->
        <x-slot name="form">
            <div class="card border-3 border-danger bg-white shadow-xl rounded-4 overflow-hidden glass-effect">
                <!-- Card Header -->
                <div class="card-header bg-gradient-red bg-opacity-10 border-bottom border-danger border-opacity-25 py-4 position-relative">
                    <div class="gradient-overlay"></div>
                    <div class="position-relative z-1 d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="fw-bold text-white mb-0">
                                <i class="bi bi-person-lines-fill me-2"></i>
                                {{ __('Personal Details') }}
                            </h5>
                            <p class="text-white small mb-0">Update your profile information</p>
                        </div>
                        <span class="badge bg-gradient-red text-white px-3 py-2 pulse shadow-sm border-0">
                            <i class="bi bi-star-fill me-2"></i>
                            Required Fields
                        </span>
                    </div>
                </div>
                
                <div class="card-body p-5">
                    <div class="row">
                        <!-- Left Column: Profile Photo -->
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <div class="text-center">
                                <!-- Profile Photo Container -->
                                <div class="profile-photo-container position-relative mx-auto mb-4" style="width: 160px; height: 160px;">
                                    <!-- Current Profile Photo -->
                                    <div class="w-100 h-100 rounded-circle overflow-hidden border-4 border-gradient-red shadow-lg" x-show="!photoPreview">
                                        <img src="{{ $this->user->profile_photo_url }}" 
                                             alt="{{ $this->user->name }}" 
                                             class="w-100 h-100 object-cover">
                                    </div>

                                    <!-- New Profile Photo Preview -->
                                    <div class="w-100 h-100 rounded-circle overflow-hidden border-4 border-gradient-red shadow-lg" 
                                         x-show="photoPreview" 
                                         style="display: none;">
                                        <div class="w-100 h-100 bg-cover bg-center"
                                             x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                        </div>
                                    </div>
                                    
                                    <!-- Upload Indicator -->
                                    <div class="position-absolute bottom-0 end-0 bg-gradient-red rounded-circle p-2 border border-3 border-white shadow hover-lift"
                                         @click="$refs.photo.click()"
                                         style="cursor: pointer;">
                                        <i class="bi bi-camera-fill text-white fs-5"></i>
                                    </div>
                                    
                                    <!-- Preview Indicator -->
                                    <div class="position-absolute top-0 start-0 bg-gradient-green rounded-circle p-2 border border-3 border-white shadow"
                                         x-show="photoPreview"
                                         style="display: none;">
                                        <i class="bi bi-check-circle-fill text-white fs-5"></i>
                                    </div>
                                </div>

                                <!-- File Name Display -->
                                <div class="mb-3" x-show="photoPreview" style="display: none;">
                                    <div class="bg-gradient-red bg-opacity-10 rounded-3 p-3 border border-gradient-red border-opacity-25">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-image text-danger"></i>
                                                <span class="text-muted small" x-text="photoName"></span>
                                            </div>
                                            <button type="button" 
                                                    @click="photoPreview = null; photoName = null; $refs.photo.value = '';"
                                                    class="btn btn-sm btn-outline-danger rounded-circle">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- File Input (Hidden) -->
                                <input type="file" id="photo" class="d-none"
                                    wire:model.live="photo"
                                    x-ref="photo"
                                    accept="image/*"
                                    x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => { photoPreview = e.target.result; };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                    " />

                                <!-- Action Buttons -->
                                <div class="d-flex flex-column gap-3 mt-4">
                                    <button type="button" 
                                            @click="$refs.photo.click()"
                                            class="btn btn-outline-danger btn-lg d-flex align-items-center justify-content-center gap-2 hover-lift shadow-sm">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                        {{ __('Upload New Photo') }}
                                    </button>

                                    @if ($this->user->profile_photo_path)
                                    <button type="button" 
                                            @click="showDeleteConfirm = true"
                                            class="btn btn-outline-secondary btn-lg d-flex align-items-center justify-content-center gap-2 hover-lift shadow-sm">
                                        <i class="bi bi-trash"></i>
                                        {{ __('Remove Photo') }}
                                    </button>
                                    @endif
                                </div>

                                <x-input-error for="photo" class="mt-3 text-danger fw-bold d-flex align-items-center gap-2">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </x-input-error>
                            </div>
                        </div>
                        @endif

                        <!-- Right Column: Form Fields -->
                        <div class="@if(Laravel\Jetstream\Jetstream::managesProfilePhotos()) col-lg-8 @else col-12 @endif">
                            <div class="row g-4">
                                <!-- Name Field -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label fw-bold text-danger mb-3 d-flex align-items-center gap-2">
                                            <div class="field-icon bg-gradient-red bg-opacity-10 p-2 rounded-circle">
                                                <i class="bi bi-person-fill text-white"></i>
                                            </div>
                                            {{ __('Full Name') }}
                                            <span class="text-danger ms-2">*</span>
                                        </label>
                                        <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden">
                                            <span class="input-group-text bg-gradient-red bg-opacity-10 border-danger border-end-0">
                                                <i class="bi bi-person text-white"></i>
                                            </span>
                                            <input id="name" 
                                                   type="text" 
                                                   class="form-control border-danger border-start-0 border-end-0 py-3 focus-red"
                                                   wire:model="state.name" 
                                                   required 
                                                   autocomplete="name"
                                                   placeholder="Enter your full name">
                                            <span class="input-group-text bg-white border-danger border-start-0">
                                                <i class="bi bi-check-circle text-success" 
                                                   x-show="$wire.state.name && $wire.state.name.length > 2"></i>
                                            </span>
                                        </div>
                                        <x-input-error for="name" class="mt-2 text-danger fw-bold d-flex align-items-center gap-2">
                                            <i class="bi bi-exclamation-triangle"></i>
                                        </x-input-error>
                                    </div>
                                </div>

                                <!-- Email Field -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label fw-bold text-danger mb-3 d-flex align-items-center gap-2">
                                            <div class="field-icon bg-gradient-red bg-opacity-10 p-2 rounded-circle">
                                                <i class="bi bi-envelope-fill text-white"></i>
                                            </div>
                                            {{ __('Email Address') }}
                                            <span class="text-danger ms-2">*</span>
                                        </label>
                                        <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden">
                                            <span class="input-group-text bg-gradient-red bg-opacity-10 border-danger border-end-0">
                                                <i class="bi bi-at text-white"></i>
                                            </span>
                                            <input id="email" 
                                                   type="email" 
                                                   class="form-control border-danger border-start-0 border-end-0 py-3 focus-red"
                                                   wire:model="state.email" 
                                                   required 
                                                   autocomplete="username"
                                                   placeholder="Enter your email address">
                                            <span class="input-group-text bg-white border-danger border-start-0">
                                                <i class="bi bi-check-circle text-success" 
                                                   x-show="$wire.state.email && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($wire.state.email)"></i>
                                            </span>
                                        </div>
                                        <x-input-error for="email" class="mt-2 text-danger fw-bold d-flex align-items-center gap-2">
                                            <i class="bi bi-exclamation-triangle"></i>
                                        </x-input-error>

                                        <!-- Email Verification -->
                                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                                        <div class="alert alert-warning bg-gradient-warning bg-opacity-10 border-warning border-2 rounded-4 mt-3 shadow-sm">
                                            <div class="d-flex align-items-start gap-3">
                                                <div class="flex-shrink-0">
                                                    <i class="bi bi-shield-exclamation text-warning fs-3"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="fw-bold text-warning mb-2">{{ __('Email Verification Required') }}</h6>
                                                    <p class="mb-2 text-dark">{{ __('Your email address is unverified. Please verify your email to secure your account.') }}</p>
                                                    <div class="d-flex gap-2">
                                                        <button type="button" 
                                                                class="btn btn-sm btn-outline-warning d-inline-flex align-items-center gap-2 hover-lift"
                                                                wire:click.prevent="sendEmailVerification"
                                                                :disabled="$wire.verificationLinkSent">
                                                            <i class="bi bi-send"></i>
                                                            <span x-show="!$wire.verificationLinkSent">Resend Verification Email</span>
                                                            <span x-show="$wire.verificationLinkSent">Email Sent!</span>
                                                        </button>
                                                        @if ($this->verificationLinkSent)
                                                        <span class="badge bg-gradient-green text-white border-0 d-inline-flex align-items-center gap-1 shadow-sm">
                                                            <i class="bi bi-check-circle"></i>
                                                            Sent
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Progress Indicator -->
                                <div class="col-12">
                                    <div class="card bg-gradient-red bg-opacity-5 border-danger border-opacity-25 rounded-4 p-4 shadow-sm">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h6 class="fw-bold text-white mb-0">Profile Completion</h6>
                                            <span class="badge bg-gradient-red text-white px-3 py-1">
                                                <span x-text="calculateProfileCompletion()"></span>%
                                            </span>
                                        </div>
                                        <div class="progress bg-danger bg-opacity-10" style="height: 8px;">
                                            <div class="progress-bar bg-gradient-red" 
                                                 role="progressbar" 
                                                 :style="{ width: calculateProfileCompletion() + '%' }"
                                                 aria-valuenow="calculateProfileCompletion()" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-white mt-2 d-block">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Complete your profile for better account security
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <!-- Actions -->
        <x-slot name="actions">
            <div class="d-flex align-items-center justify-content-end w-100">
                <!-- Save Button -->
                <button type="submit" 
                        wire:loading.attr="disabled"
                        wire:target="updateProfileInformation"
                        class="btn btn-gradient-red btn-lg px-5 py-3 d-flex align-items-center gap-3 shadow-lg rounded-pill">
                    <span class="d-flex align-items-center gap-2">
                        <i class="bi bi-save"></i>
                        {{ __('Save Changes') }}
                    </span>
                </button>
            </div>
        </x-slot>
    </x-form-section>

    <!-- Delete Photo Confirmation Modal -->
    <div x-show="showDeleteConfirm" x-transition.opacity x-cloak>
        <div class="modal-backdrop fade show" style="opacity: 0.6; background: linear-gradient(135deg, #dc3545 0%, #000 100%);"></div>
        
        <div class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden border-3 border-gradient-red glass-effect">
                    <div class="modal-header bg-gradient-red text-white border-0 py-4">
                        <div class="position-absolute top-0 start-0 w-100 h-100 danger-diagonal opacity-20"></div>
                        <div class="position-relative z-1 d-flex align-items-center justify-content-between w-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="modal-icon bg-white bg-opacity-20 p-3 rounded-circle">
                                    <i class="bi bi-trash text-white fs-3"></i>
                                </div>
                                <div>
                                    <h4 class="mb-0 fw-bold">Remove Profile Photo</h4>
                                    <p class="mb-0 opacity-90">This action cannot be undone</p>
                                </div>
                            </div>
                            <button type="button" class="btn-close btn-close-white" @click="showDeleteConfirm = false"></button>
                        </div>
                    </div>
                    
                    <div class="modal-body p-5">
                        <div class="text-center mb-4">
                            <div class="bg-gradient-red bg-opacity-10 p-4 rounded-circle d-inline-block mb-3">
                                <i class="bi bi-person-x text-danger fs-1"></i>
                            </div>
                            <h5 class="fw-bold text-danger mb-2">Confirm Removal</h5>
                            <p class="text-muted">Are you sure you want to remove your profile photo? You can upload a new one at any time.</p>
                        </div>
                        
                        <div class="d-flex justify-content-center gap-3">
                            <button type="button" 
                                    @click="showDeleteConfirm = false"
                                    class="btn btn-outline-secondary px-4 py-2 hover-lift rounded-pill">
                                Cancel
                            </button>
                            <button type="button" 
                                    wire:click="deleteProfilePhoto"
                                    @click="showDeleteConfirm = false; photoPreview = null; photoName = null;"
                                    class="btn btn-gradient-red px-4 py-2 hover-lift rounded-pill">
                                <i class="bi bi-trash me-2"></i>
                                Remove Photo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    [x-cloak] { display: none !important; }
    
    /* Gradient Classes */
    .bg-gradient-red {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
    }
    
    .bg-gradient-green {
        background: linear-gradient(135deg, #198754 0%, #146c43 100%) !important;
    }
    
    .bg-gradient-warning {
        background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%) !important;
    }
    
    .border-gradient-red {
        border-image: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
        border-image-slice: 1;
    }
    
    .btn-gradient-red {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
        border: none !important;
        color: white !important;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .btn-gradient-red:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(220, 53, 69, 0.4) !important;
    }
    
    .btn-gradient-red::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.5s;
    }
    
    .btn-gradient-red:hover::after {
        left: 100%;
    }
    
    /* Shadow Effects */
    .shadow-red {
        box-shadow: 0 10px 30px rgba(220, 53, 69, 0.25) !important;
    }
    
    .shadow-xl {
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1) !important;
    }
    
    /* Glass Effect */
    .glass-effect {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(220, 53, 69, 0.1) !important;
    }
    
    .gradient-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(220, 53, 69, 0.05), rgba(200, 35, 51, 0.05));
    }
    
    /* Hover Effects */
    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15) !important;
    }
    
    /* Animations */
    .danger-diagonal {
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.1) 0%,
            rgba(255, 255, 255, 0.05) 25%,
            rgba(255, 255, 255, 0.1) 50%,
            rgba(255, 255, 255, 0.05) 75%,
            rgba(255, 255, 255, 0.1) 100%
        );
        background-size: 400% 400%;
        animation: diagonalMove 15s infinite linear;
    }
    
    @keyframes diagonalMove {
        0% { background-position: 0% 0%; }
        100% { background-position: 100% 100%; }
    }
    
    .pulse {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { 
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
        }
        50% { 
            transform: scale(1.05);
            box-shadow: 0 0 0 10px rgba(220, 53, 69, 0);
        }
    }
    
    /* Form Elements */
    .focus-red:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
    }
    
    .field-icon {
        transition: all 0.3s ease;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .field-icon:hover {
        transform: rotate(15deg) scale(1.1);
    }
    
    /* Profile Photo Container */
    .profile-photo-container {
        position: relative;
        transition: all 0.3s ease;
    }
    
    .profile-photo-container:hover {
        transform: scale(1.03);
    }
    
    /* Modal Styles */
    .modal-backdrop {
        opacity: 0.6;
        background: linear-gradient(135deg, #dc3545 0%, #000 100%);
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
    }
    
    .modal.show {
        display: block;
    }
    
    .modal-dialog {
        margin: 2rem auto;
        max-width: 450px;
    }
    
    .btn-close-white {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
    
    .modal-icon {
        animation: modalPulse 2s infinite;
    }
    
    @keyframes modalPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    
    /* Progress Bar */
    .progress-bar {
        background: linear-gradient(90deg, #dc3545, #c82333) !important;
        border-radius: 4px;
    }
    
    /* Rounded Elements */
    .rounded-4 {
        border-radius: 1.5rem !important;
    }
    
    .rounded-pill {
        border-radius: 50rem !important;
    }
    
    /* Icon Container */
    .icon-container {
        transition: all 0.3s ease;
    }
    
    .icon-container:hover {
        transform: scale(1.05) rotate(5deg);
    }
    
    /* Button Sizes */
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1.125rem;
    }
    
    /* Input Group */
    .input-group-lg > .form-control,
    .input-group-lg > .input-group-text {
        padding: 1rem 1.5rem;
        font-size: 1.125rem;
    }
    </style>

    <script>
    function calculateProfileCompletion() {
        let completion = 0;
        const name = document.getElementById('name')?.value || '';
        const email = document.getElementById('email')?.value || '';
        const hasPhoto = @json($this->user->profile_photo_path) ? true : false;
        
        if (name.length > 2) completion += 40;
        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) completion += 40;
        if (hasPhoto) completion += 20;
        
        return completion;
    }
    </script>
</div>