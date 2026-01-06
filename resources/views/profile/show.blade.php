<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <div class="bg-danger bg-gradient rounded-circle d-flex align-items-center justify-content-center p-2 shadow-sm" style="width: 56px; height: 56px;">
                    <i class="fas fa-user-cog text-white fs-4"></i>
                </div>
            </div>
            <div>
                <h2 class="fw-bold fs-3 text-white mb-1">
                    {{ __('Profile Dashboard') }}
                </h2>
                <div class="d-flex align-items-center">
                    <span class="badge bg-danger bg-opacity-10 text-white me-2">
                        <i class="fas fa-shield-alt me-1"></i> Secure Zone
                    </span>
                    <p class="text-white mb-0">Manage your account security and preferences</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="bg-white min-vh-100 py-5">
        <div class="container">
            
            <!-- Enhanced Profile Summary Cards Row -->
            <div class="row mb-5 g-4">
                <!-- Profile Status Card -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 h-100 overflow-hidden">
                        <div class="card-header bg-white border-bottom border-danger border-2 py-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-gradient rounded-3 p-2 me-3 shadow">
                                    <i class="fas fa-user-circle text-white fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-danger mb-1">Profile Status</h5>
                                    <small class="text-muted">Account Overview</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <small class="text-muted d-block mb-1">Account Type</small>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-crown text-warning me-2"></i>
                                        <span class="fw-bold">Premium Account</span>
                                    </div>
                                </div>
                                <span class="badge bg-success bg-opacity-25 text-white p-2">
                                    <i class="fas fa-check-circle me-1 text-white"></i> Active
                                </span>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="text-center p-3 bg-danger bg-opacity-5 rounded-3">
                                        <i class="fas fa-calendar-alt text-white fs-4 d-block mb-2"></i>
                                        <small class="text-white d-block">Joined</small>
                                        <span class="fw-bold text-white">{{ Auth::user()->created_at->format('M Y') }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center p-3 bg-danger bg-opacity-5 rounded-3">
                                        <i class="fas fa-clock text-white fs-4 d-block mb-2"></i>
                                        <small class="text-white d-block">Last Active</small>
                                        <span class="fw-bold text-white">{{ now()->format('h:i A') }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Profile Completion</small>
                                <small class="fw-bold text-danger">90%</small>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top py-3">
                            <a href="#" class="text-danger text-decoration-none d-flex align-items-center justify-content-center">
                                <i class="fas fa-arrow-right me-2"></i> Complete Profile
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Security Level Card -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 h-100 overflow-hidden">
                        <div class="card-header bg-white border-bottom border-danger border-2 py-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-gradient rounded-3 p-2 me-3 shadow">
                                    <i class="fas fa-shield-alt text-white fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-danger mb-1">Security Status</h5>
                                    <small class="text-muted">Protection Level</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="position-relative d-inline-block">
                                    <div class="circular-progress" data-progress="82">
                                        <div class="inner-circle bg-white d-flex align-items-center justify-content-center">
                                            <span class="fw-bold fs-4 text-danger">82%</span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-danger mt-3">High Security</h6>
                            </div>
                            
                            <div class="row g-2 mb-4">
                                <div class="col-6">
                                    <div class="p-2 border border-danger border-opacity-25 rounded-3 d-flex align-items-center">
                                        <div class="bg-success bg-opacity-25 rounded-circle p-1 me-2">
                                            <i class="fas fa-check text-success fs-6"></i>
                                        </div>
                                        <div>
                                            <small class="d-block fw-bold">Password</small>
                                            <small class="text-muted">Strong</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 border border-danger border-opacity-25 rounded-3 d-flex align-items-center">
                                        <div class="bg-warning bg-opacity-25 rounded-circle p-1 me-2">
                                            <i class="fas fa-exclamation text-warning fs-6"></i>
                                        </div>
                                        <div>
                                            <small class="d-block fw-bold">2FA</small>
                                            <small class="text-muted">Not Active</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 border border-danger border-opacity-25 rounded-3 d-flex align-items-center">
                                        <div class="bg-success bg-opacity-25 rounded-circle p-1 me-2">
                                            <i class="fas fa-check text-success fs-6"></i>
                                        </div>
                                        <div>
                                            <small class="d-block fw-bold">Email</small>
                                            <small class="text-muted">Verified</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 border border-danger border-opacity-25 rounded-3 d-flex align-items-center">
                                        <div class="bg-success bg-opacity-25 rounded-circle p-1 me-2">
                                            <i class="fas fa-check text-success fs-6"></i>
                                        </div>
                                        <div>
                                            <small class="d-block fw-bold">Sessions</small>
                                            <small class="text-muted">1 Active</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top py-3">
                            <a href="#" class="text-danger text-decoration-none d-flex align-items-center justify-content-center">
                                <i class="fas fa-lock me-2"></i> Enhance Security
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity Card -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 h-100 overflow-hidden">
                        <div class="card-header bg-white border-bottom border-danger border-2 py-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-gradient rounded-3 p-2 me-3 shadow">
                                    <i class="fas fa-history text-white fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-danger mb-1">Recent Activity</h5>
                                    <small class="text-muted">Latest Actions</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="activity-timeline">
                                <div class="timeline-item mb-4">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-success bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-sign-in-alt text-success"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-1">Successful Login</h6>
                                                <small class="text-muted">2h ago</small>
                                            </div>
                                            <p class="text-muted small mb-0">From Chrome on Windows</p>
                                            <small class="text-danger">
                                                <i class="fas fa-map-marker-alt me-1"></i> New York, US
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item mb-4">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-info bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-key text-info"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-1">Password Updated</h6>
                                                <small class="text-muted">2 weeks ago</small>
                                            </div>
                                            <p class="text-muted small mb-0">Password strength improved</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-warning bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-user-edit text-warning"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-1">Profile Updated</h6>
                                                <small class="text-muted">1 month ago</small>
                                            </div>
                                            <p class="text-muted small mb-0">Email address changed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top py-3">
                            <a href="#" class="text-danger text-decoration-none d-flex align-items-center justify-content-center">
                                <i class="fas fa-list me-2"></i> View All Activity
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rest of your existing content sections remain exactly as you had them -->
            <!-- Update Profile Information -->
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white border-bottom border-danger border-2 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-2 me-3">
                                <i class="fas fa-user-edit text-danger"></i>
                            </div>
                            <div>
                                <h3 class="fs-5 fw-bold text-danger mb-0">
                                    {{ __('Personal Information') }}
                                </h3>
                                <small class="text-muted">Update your profile details and contact information</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @livewire('profile.update-profile-information-form')
                    </div>
                </div>
            @endif

            <!-- Update Password -->
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white border-bottom border-danger border-2 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-2 me-3">
                                <i class="fas fa-lock text-danger"></i>
                            </div>
                            <div>
                                <h3 class="fs-5 fw-bold text-danger mb-0">
                                    {{ __('Update Password') }}
                                </h3>
                                <small class="text-muted">Secure your account with a new password</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @livewire('profile.update-password-form')
                    </div>
                </div>
            @endif

            <!-- Two-Factor Authentication -->
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white border-bottom border-danger border-2 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-2 me-3">
                                <i class="fas fa-shield-alt text-danger"></i>
                            </div>
                            <div>
                                <h3 class="fs-5 fw-bold text-danger mb-0">
                                    {{ __('Two-Factor Authentication') }}
                                </h3>
                                <small class="text-muted">Add an extra layer of security to your account</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @livewire('profile.two-factor-authentication-form')
                    </div>
                </div>
            @endif

            <!-- Browser Sessions -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom border-danger border-2 py-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center p-2 me-3">
                            <i class="fas fa-desktop text-danger"></i>
                        </div>
                        <div>
                            <h3 class="fs-5 fw-bold text-danger mb-0">
                                {{ __('Browser Sessions') }}
                            </h3>
                            <small class="text-muted">Manage your active sessions across devices</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            </div>

            <!-- Delete Account -->
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="card border-danger border-2 shadow-sm rounded-3">
                    <div class="card-header bg-danger bg-opacity-10 border-danger border-2 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center p-2 me-3">
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                            </div>
                            <div>
                                <h3 class="fs-5 fw-bold text-danger mb-0">
                                    {{ __('Delete Account') }}
                                </h3>
                                <small class="text-danger opacity-75">Permanently remove your account and all data</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="alert alert-danger bg-danger bg-opacity-10 border-danger mb-4">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-exclamation-circle fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="alert-heading fw-bold mb-1">Warning: This action cannot be undone</h6>
                                    <p class="mb-0">All your data will be permanently deleted. This includes your profile information, saved preferences, and any uploaded content.</p>
                                </div>
                            </div>
                        </div>
                        
                        @livewire('profile.delete-user-form')
                    </div>
                </div>
            @endif

            <!-- Security Tips -->
            <div class="mt-5 pt-4 border-top border-danger border-opacity-25">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-start">
                            <div class="text-danger me-3">
                                <i class="fas fa-lightbulb fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-danger mb-3">Security Tips</h6>
                                <ul class="list-unstyled text-muted mb-0">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Use a unique password for each account</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Enable two-factor authentication</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Regularly review active sessions</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i> Keep your recovery email updated</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-start">
                            <div class="text-danger me-3">
                                <i class="fas fa-question-circle fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-danger mb-3">Need Help?</h6>
                                <p class="text-muted mb-3">If you need assistance with your account settings or security, our support team is here to help.</p>
                                <a href="#" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-headset me-1"></i> Contact Support
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        :root {
            --danger-color: #dc3545;
            --danger-light: rgba(220, 53, 69, 0.1);
            --danger-medium: rgba(220, 53, 69, 0.25);
            --danger-dark: #bb2d3b;
        }
        
        .bg-gradient {
            background: linear-gradient(135deg, var(--danger-color), var(--danger-dark)) !important;
        }
        
        .card {
            transition: all 0.3s ease;
            border: none;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(220, 53, 69, 0.1) !important;
        }
        
        .rounded-4 {
            border-radius: 1rem !important;
        }
        
        .shadow-lg {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08) !important;
        }
        
        /* Circular Progress for Security Card */
        .circular-progress {
            position: relative;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(var(--danger-color) calc(82 * 3.6deg), var(--danger-light) 0deg);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .circular-progress::before {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: white;
        }
        
        .circular-progress .inner-circle {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            z-index: 1;
        }
        
        /* Timeline Styling */
        .timeline-item {
            position: relative;
            padding-left: 1rem;
        }
        
        .timeline-item:before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background-color: var(--danger-light);
            border-radius: 50%;
        }
        
        .timeline-item:not(:last-child):after {
            content: "";
            position: absolute;
            left: 3px;
            top: 50px;
            width: 2px;
            height: calc(100% - 20px);
            background-color: var(--danger-light);
        }
        
        /* Enhanced Button Styling */
        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color), var(--danger-dark));
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }
        
        .btn-outline-danger {
            border: 2px solid var(--danger-color);
            color: var(--danger-color);
            font-weight: 500;
            padding: 0.5rem 1.25rem;
        }
        
        .btn-outline-danger:hover {
            background: linear-gradient(135deg, var(--danger-color), var(--danger-dark));
            border-color: var(--danger-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
        }
        
        /* Enhanced Progress Bars */
        .progress {
            background-color: var(--danger-light);
            border-radius: 10px;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, var(--danger-color), var(--danger-dark));
            border-radius: 10px;
        }
        
        /* Enhanced Badges */
        .badge {
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 50px;
        }
        
        /* Hover Effects for Card Links */
        .card-footer a {
            transition: all 0.3s ease;
        }
        
        .card-footer a:hover {
            letter-spacing: 0.5px;
            transform: translateX(5px);
        }
        
        /* Form Controls */
        .form-control:focus {
            border-color: var(--danger-color);
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.15);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .circular-progress {
                width: 100px;
                height: 100px;
            }
            
            .circular-progress .inner-circle {
                width: 80px;
                height: 80px;
            }
            
            .row.g-4 > div {
                margin-bottom: 1.5rem;
            }
            
            .card-body .row .col-6 {
                margin-bottom: 0.5rem;
            }
        }
    </style>
</x-app-layout>