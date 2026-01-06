
@extends('layout')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


   <section class="quote-section py-5" style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Content -->
            <div class="col-lg-6 col-12">
                <div class="animated-badge mb-3">
                    <span class="badge-text">REQUEST A CALLBACK</span>
                    <span class="badge-pulse"></span>
                </div>
                
                <h2 class="display-5 fw-bold mb-4" style="line-height: 1.2;">
                    We will contact in <br>
                    <span class="text-gradient">the shortest time</span>
                </h2>
                
                <p class="text-muted mb-4 fs-5">
                    Monday to Friday, 9am–5pm. Get a response within 24 hours.
                </p>

                <!-- Contact Info Card -->
                <div class="contact-card p-4 rounded-4 shadow-sm border-0 mt-4" style="max-width: 400px;">
                    <div class="d-flex align-items-center">
                        <div class="contact-icon me-4">
                            <div class="icon-wrapper">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-muted mb-1">Call for any query!</p>
                            <h3 class="fw-bold mb-0" style="color: #dc3545;">+012 345 6789</h3>
                        </div>
                    </div>
                    <div class="mt-3 d-flex gap-3">
                        <div class="contact-method">
                            <i class="fas fa-envelope me-2" style="color: #dc3545;"></i>
                            <span>support@example.com</span>
                        </div>
                        <div class="contact-method">
                            <i class="fas fa-clock me-2" style="color: #dc3545;"></i>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="stats-grid mt-4">
                    <div class="stat-item">
                        <div class="stat-value" style="color: #dc3545;">24h</div>
                        <div class="stat-label">Response Time</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value" style="color: #dc3545;">98%</div>
                        <div class="stat-label">Satisfaction Rate</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value" style="color: #dc3545;">5min</div>
                        <div class="stat-label">Call Back Promise</div>
                    </div>
                </div>
            </div>

            <!-- Right Form -->
            <div class="col-lg-6 col-12">
                <div class="contact-form-wrapper p-4 p-lg-5 rounded-4 shadow-lg border-0" 
                     style="background: linear-gradient(135deg, #fff 0%, #fff 100%); border: 1px solid rgba(220, 53, 69, 0.1) !important;">
                    
                    <div class="form-header mb-4">
                        <h3 class="fw-bold" style="color: #212529;">
                            <i class="fas fa-paper-plane me-2" style="color: #dc3545;"></i>
                            Send Your Message
                        </h3>
                        <p class="text-muted">Fill out the form below and we'll get back to you promptly</p>
                    </div>

                    <!-- Display success/error messages from session -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            Please correct the errors below.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/savecontact" method="POST" id="contactForm">
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="Name" class="form-label fw-semibold">
                                <i class="fas fa-user me-2" style="color: #dc3545;"></i>
                                Full Name *
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input type="text" 
                                       class="form-control border-start-0 @error('Name') is-invalid @enderror" 
                                       id="Name" 
                                       name="Name" 
                                       placeholder="Enter your full name"
                                       value="{{ old('Name') }}"
                                       required>
                                @error('Name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="Email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-2" style="color: #dc3545;"></i>
                                Email Address *
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email" 
                                       class="form-control border-start-0 @error('Email') is-invalid @enderror" 
                                       id="Email" 
                                       name="Email" 
                                       placeholder="Enter your email address"
                                       value="{{ old('Email') }}"
                                       required>
                                @error('Email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div class="mb-4">
                            <label for="Message" class="form-label fw-semibold">
                                <i class="fas fa-comment-dots me-2" style="color: #dc3545;"></i>
                                Your Message *
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 align-items-start pt-3">
                                    <i class="fas fa-edit text-muted"></i>
                                </span>
                                <textarea class="form-control border-start-0 @error('Message') is-invalid @enderror" 
                                          id="Message" 
                                          name="Message" 
                                          rows="5" 
                                          placeholder="Tell us how we can help you..."
                                          required>{{ old('Message') }}</textarea>
                                @error('Message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text text-end mt-1">
                                <span id="charCount">0</span>/500 characters
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" 
                                    class="btn btn-lg fw-bold shadow submit-btn"
                                    style="background: linear-gradient(135deg, #dc3545, #c82333); color: #fff; border: none; padding: 16px;">
                                <i class="fas fa-paper-plane me-2"></i>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for message field
    const messageField = document.getElementById('Message');
    const charCount = document.getElementById('charCount');
    
    if (messageField && charCount) {
        // Initialize character count
        charCount.textContent = messageField.value.length;
        
        messageField.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = length;
            
            // Visual feedback based on length
            if (length > 500) {
                this.value = this.value.substring(0, 500);
                charCount.textContent = 500;
                charCount.style.color = '#dc3545';
            } else if (length > 450) {
                charCount.style.color = '#ffc107';
            } else {
                charCount.style.color = '#28a745';
            }
        });
    }

    // Real-time validation for better UX
    const form = document.getElementById('contactForm');
    if (form) {
        const fields = form.querySelectorAll('input, textarea');
        
        fields.forEach(field => {
            field.addEventListener('blur', function() {
                validateSingleField(this);
            });
            
            // Remove red border when user starts typing
            field.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    this.classList.remove('is-invalid');
                }
            });
        });
    }

    function validateSingleField(field) {
        const value = field.value.trim();
        const isRequired = field.hasAttribute('required');
        
        if (isRequired && !value) {
            field.classList.add('is-invalid');
            return false;
        }
        
        // Email validation
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                field.classList.add('is-invalid');
                return false;
            }
        }
        
        // Name validation (minimum 2 characters)
        if (field.name === 'Name' && value.length < 2) {
            field.classList.add('is-invalid');
            return false;
        }
        
        // Message validation (minimum 10 characters)
        if (field.name === 'Message' && value.length < 10) {
            field.classList.add('is-invalid');
            return false;
        }
        
        field.classList.remove('is-invalid');
        return true;
    }

    // Optional: Add submit button loading state
    const submitBtn = document.querySelector('.submit-btn');
    if (submitBtn) {
        submitBtn.addEventListener('click', function() {
            // Simple client-side validation before allowing submission
            const form = document.getElementById('contactForm');
            if (form) {
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');
                
                requiredFields.forEach(field => {
                    if (!validateSingleField(field)) {
                        isValid = false;
                        // Scroll to first invalid field
                        if (isValid === false) {
                            field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            field.focus();
                            isValid = null; // Prevent multiple scrolls
                        }
                    }
                });
                
                if (!isValid) {
                    return false; // Prevent form submission
                }
            }
        });
    }
});
</script>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

</body>

</html>
@endsection


