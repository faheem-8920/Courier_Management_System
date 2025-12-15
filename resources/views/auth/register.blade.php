<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SwiftCourier</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #dc2626;
            --primary-dark: #b91c1c;
            --primary-light: #fee2e2;
            --white: #ffffff;
            --gray-50: #fafafa;
            --gray-100: #f5f5f5;
            --gray-200: #e5e5e5;
            --gray-300: #d4d4d4;
            --gray-400: #a3a3a3;
            --gray-500: #737373;
            --gray-600: #525252;
            --gray-700: #404040;
            --gray-800: #262626;
            --success: #10b981;
            --warning: #f59e0b;
            --info: #3b82f6;
            --error: #ef4444;
            --radius: 8px;
            --radius-lg: 12px;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-red: 0 5px 20px rgba(220, 38, 38, 0.2);
            --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            position: relative;
            overflow: hidden;
        }

        /* Perfect Centering */
        .center-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 420px;
            padding: 15px;
        }

        /* Main Container */
        .register-container {
            width: 100%;
            animation: slideIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 1;
        }

        @keyframes slideIn {
            from { 
                opacity: 0; 
                transform: translateY(20px) scale(0.98); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        /* Card */
        .register-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 28px 24px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(220, 38, 38, 0.08);
            transition: all 0.3s ease;
        }

        .register-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .register-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--primary), var(--primary-dark), var(--primary));
            border-radius: calc(var(--radius) + 2px);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .register-card:hover::before {
            opacity: 0.3;
        }

        /* Header */
        .register-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 18px;
        }

        .logo-wrapper {
            position: relative;
            width: 60px;
            height: 60px;
            margin-bottom: 12px;
        }

        .logo {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            animation: truckDrive 3s infinite ease-in-out;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.25);
            z-index: 2;
        }

        @keyframes truckDrive {
            0%, 100% { transform: translateX(-5px) rotate(-1deg); }
            50% { transform: translateX(5px) rotate(1deg); }
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .register-header h1 {
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 4px;
        }

        .register-header p {
            font-size: 12px;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        .input-wrapper {
            position: relative;
        }

        /* Input Fields */
        input {
            width: 100%;
            padding: 13px 12px 13px 46px;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius);
            font-size: 14px;
            background: var(--white);
            color: var(--gray-700);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 46px;
            font-weight: 500;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.15);
        }

        /* Input Icons */
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 14px;
            transition: all 0.3s ease;
            z-index: 2;
        }

        input:focus ~ .input-icon {
            color: var(--primary);
            transform: translateY(-50%) scale(1.1);
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            font-size: 13px;
            width: 30px;
            height: 30px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .password-toggle:hover {
            color: var(--primary);
            background: var(--primary-light);
        }

        /* Validation Errors */
        .validation-errors {
            background: linear-gradient(135deg, #fef2f2, #fff5f5);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 14px;
            animation: slideDown 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.1);
            backdrop-filter: blur(10px);
            border-left: 4px solid var(--error);
            width: 100%;
            max-width: 100%;
        }

        .validation-errors::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--error), #f87171);
            animation: errorLine 3s infinite linear;
        }

        @keyframes errorLine {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }

        .validation-errors ul {
            list-style: none;
            color: var(--error);
            font-size: 12px;
            font-weight: 500;
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .validation-errors li {
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Status Message */
        .status-message {
            background: linear-gradient(135deg, #d1fae5, #ecfdf5);
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: var(--radius);
            padding: 12px;
            margin-bottom: 14px;
            color: #065f46;
            font-size: 12px;
            font-weight: 500;
            animation: slideDown 0.3s ease;
            border-left: 4px solid var(--success);
            display: flex;
            align-items: center;
            gap: 8px;
            text-align: center;
            justify-content: center;
        }

        /* Email Verification Status */
        .verification-status {
            background: linear-gradient(135deg, #e0f2fe, #f0f9ff);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 14px;
            color: #1e40af;
            font-size: 13px;
            font-weight: 500;
            animation: slideDown 0.5s ease;
            border-left: 4px solid var(--info);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .verification-status.success {
            background: linear-gradient(135deg, #d1fae5, #ecfdf5);
            border-color: rgba(16, 185, 129, 0.3);
            border-left-color: var(--success);
            color: #065f46;
        }

        /* Terms & Conditions */
        .terms-container {
            margin: 16px 0 20px;
            padding: 12px;
            background: var(--gray-50);
            border-radius: var(--radius);
            border: 1px solid var(--gray-200);
        }

        .terms {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            cursor: pointer;
        }

        .terms input[type="checkbox"] {
            width: 16px;
            height: 16px;
            min-width: 16px;
            cursor: pointer;
            accent-color: var(--primary);
            margin-top: 3px;
            flex-shrink: 0;
        }

        .terms label {
            color: var(--gray-600);
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.5;
            user-select: none;
            transition: color 0.3s ease;
            text-align: left;
        }

        .terms label a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .terms label a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .terms:hover label {
            color: var(--primary);
        }

        /* Submit Button */
        .submit-btn-container {
            position: relative;
            margin-bottom: 18px;
            overflow: hidden;
            border-radius: var(--radius);
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.25);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .submit-btn-container:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(220, 38, 38, 0.3);
        }

        .submit-btn {
            width: 100%;
            padding: 13px;
            background: transparent;
            color: white;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            position: relative;
            z-index: 2;
            letter-spacing: 0.3px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 44px;
        }

        .submit-btn:hover {
            letter-spacing: 0.5px;
        }

        .submit-btn:disabled {
            cursor: not-allowed;
            opacity: 0.8;
        }

        /* Button Glow Effect */
        .btn-glow {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.4) 0%, transparent 70%);
            opacity: 0;
            animation: btnGlow 3s infinite;
            pointer-events: none;
        }

        @keyframes btnGlow {
            0%, 100% { opacity: 0; transform: scale(0.8); }
            50% { opacity: 0.2; transform: scale(1); }
        }

        /* Loading Animation */
        .loading-spinner {
            display: none;
            width: 16px;
            height: 16px;
            position: relative;
        }

        .loading-spinner::before,
        .loading-spinner::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            animation: loadingRing 1.5s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border: 2px solid transparent;
            border-top-color: white;
        }

        .loading-spinner::before {
            width: 100%;
            height: 100%;
            animation-delay: 0.1s;
        }

        .loading-spinner::after {
            width: 80%;
            height: 80%;
            top: 10%;
            left: 10%;
            animation-delay: 0.2s;
        }

        @keyframes loadingRing {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Additional Links */
        .additional-links {
            text-align: center;
            font-size: 12px;
            color: var(--gray-500);
            font-weight: 500;
            position: relative;
            padding-top: 16px;
        }

        .additional-links::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gray-300), transparent);
        }

        .additional-links a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            margin-left: 4px;
            transition: all 0.3s ease;
        }

        .additional-links a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            body { padding: 10px; }
            .center-container { padding: 10px; }
            .register-card { padding: 24px 20px; }
            .register-header h1 { font-size: 18px; }
            .logo-text { font-size: 20px; }
            .logo-wrapper { width: 55px; height: 55px; }
            .logo { font-size: 22px; }
            .terms label { font-size: 11px; }
        }

        /* Selection */
        ::selection {
            background: var(--primary);
            color: white;
        }
    </style>
</head>
<body>

<!-- Main Registration Container -->
<div class="center-container">
    <div class="register-container">
        <div class="register-card">
            <!-- Header with Logo -->
            <div class="register-header">
                <div class="logo-container">
                    <div class="logo-wrapper">
                        <div class="logo">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                    </div>
                    <div class="logo-text">SwiftCourier</div>
                </div>
                <h1>Create Account</h1>
                <p>Join SwiftCourier today</p>
            </div>

            <!-- Validation Errors - Using Laravel's built-in validation -->
            @if ($errors->any())
                <div class="validation-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Success Message for Email Verification -->
            @if (session('status') == 'verification-link-sent')
                <div class="verification-status success">
                    <div class="verification-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <p>A fresh verification link has been sent to your email address.</p>
                </div>
            @endif

            <!-- Laravel Registration Form -->
            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="text" 
                               id="name" 
                               name="name" 
                               placeholder="Full Name"
                               value="{{ old('name') }}"
                               required 
                               autofocus 
                               autocomplete="name">
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="email" 
                               id="email" 
                               name="email" 
                               placeholder="Email address"
                               value="{{ old('email') }}"
                               required 
                               autocomplete="username">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Password (min. 8 characters)"
                               required 
                               autocomplete="new-password">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <button type="button" class="password-toggle" id="passwordToggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               placeholder="Confirm Password"
                               required 
                               autocomplete="new-password">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <button type="button" class="password-toggle" id="confirmPasswordToggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="terms-container">
                        <div class="terms">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">
                                I agree to the <a href="{{ route('terms.show') }}" target="_blank">Terms of Service</a> 
                                and <a href="{{ route('policy.show') }}" target="_blank">Privacy Policy</a>
                            </label>
                        </div>
                    </div>
                @endif

                <!-- Submit Button -->
                <div class="submit-btn-container">
                    <div class="btn-glow"></div>
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span id="btnText">Create Account</span>
                        <div class="loading-spinner" id="spinner"></div>
                    </button>
                </div>

                <!-- Additional Links -->
                <div class="additional-links">
                    Already have an account?
                    <a href="{{ route('login') }}">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const form = document.getElementById('registerForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const passwordToggle = document.getElementById('passwordToggle');
    const confirmPasswordToggle = document.getElementById('confirmPasswordToggle');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const spinner = document.getElementById('spinner');
    const submitBtnContainer = document.querySelector('.submit-btn-container');
    const termsCheckbox = document.getElementById('terms');

    // Password toggle functionality
    function setupPasswordToggle(inputElement, toggleElement) {
        toggleElement.addEventListener('click', function() {
            const type = inputElement.getAttribute('type');
            const icon = this.querySelector('i');
            
            if (type === 'password') {
                inputElement.setAttribute('type', 'text');
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                this.style.color = 'var(--primary)';
            } else {
                inputElement.setAttribute('type', 'password');
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                this.style.color = 'var(--gray-400)';
            }
        });
    }
    
    setupPasswordToggle(passwordInput, passwordToggle);
    setupPasswordToggle(confirmPasswordInput, confirmPasswordToggle);

    // Input interactions
    const inputs = [nameInput, emailInput, passwordInput, confirmPasswordInput];
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'translateY(-1px)';
            this.parentElement.querySelector('.input-icon').style.color = 'var(--primary)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            if (!this.value) {
                this.parentElement.querySelector('.input-icon').style.color = 'var(--gray-400)';
            }
        });
    });

    // Form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Validate form
        const isValid = validateForm();
        
        if (isValid) {
            // Enhanced loading state
            submitBtn.disabled = true;
            btnText.textContent = 'Creating account...';
            spinner.style.display = 'block';
            submitBtnContainer.style.transform = 'scale(0.98)';
            
            // Add particle explosion effect
            createSubmitParticles();
            
            try {
                // Prepare form data
                const formData = new FormData(form);
                
                // Submit the form normally - Laravel will handle the redirect
                // We'll let the form submit normally after a brief loading animation
                setTimeout(() => {
                    form.submit();
                }, 1000);
                
            } catch (error) {
                // Enhanced error handling
                resetFormState();
                showEnhancedToast('An error occurred. Please try again.', 'error');
                console.error('Registration error:', error);
            }
        }
    });

    // Helper functions
    function validateForm() {
        let isValid = true;
        
        // Name validation
        if (!nameInput.value || nameInput.value.trim().length < 2) {
            nameInput.style.borderColor = 'var(--error)';
            nameInput.focus();
            showEnhancedToast('Please enter a valid name (at least 2 characters)', 'error');
            isValid = false;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailInput.value || !emailRegex.test(emailInput.value)) {
            emailInput.style.borderColor = 'var(--error)';
            emailInput.focus();
            showEnhancedToast('Please enter a valid email address', 'error');
            isValid = false;
        }
        
        // Password validation
        else if (!passwordInput.value || passwordInput.value.length < 8) {
            passwordInput.style.borderColor = 'var(--error)';
            passwordInput.focus();
            showEnhancedToast('Password must be at least 8 characters', 'error');
            isValid = false;
        }
        
        // Password confirmation validation
        else if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.style.borderColor = 'var(--error)';
            confirmPasswordInput.focus();
            showEnhancedToast('Passwords do not match', 'error');
            isValid = false;
        }
        
        // Terms validation (if exists)
        else if (termsCheckbox && !termsCheckbox.checked) {
            termsCheckbox.focus();
            showEnhancedToast('You must agree to the terms and conditions', 'error');
            isValid = false;
        }
        
        return isValid;
    }
    
    function resetFormState() {
        submitBtn.disabled = false;
        btnText.textContent = 'Create Account';
        spinner.style.display = 'none';
        submitBtnContainer.style.transform = '';
        submitBtnContainer.style.background = 'linear-gradient(135deg, var(--primary), var(--primary-dark))';
    }
    
    // Enhanced toast notification
    function showEnhancedToast(message, type) {
        const toast = document.createElement('div');
        const icon = type === 'success' ? 'check-circle' : 
                    type === 'warning' ? 'exclamation-triangle' : 
                    type === 'info' ? 'info-circle' : 'exclamation-circle';
        
        toast.innerHTML = `
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-${icon}"></i>
                <span>${message}</span>
            </div>
        `;
        
        toast.style.position = 'fixed';
        toast.style.top = '20px';
        toast.style.left = '50%';
        toast.style.transform = 'translateX(-50%) translateY(-100px)';
        toast.style.background = type === 'success' ? 
            'linear-gradient(135deg, var(--success), #059669)' : 
            type === 'warning' ? 'linear-gradient(135deg, var(--warning), #d97706)' :
            type === 'info' ? 'linear-gradient(135deg, var(--info), #2563eb)' :
            'linear-gradient(135deg, var(--error), #dc2626)';
        toast.style.color = 'white';
        toast.style.padding = '12px 20px';
        toast.style.borderRadius = 'var(--radius)';
        toast.style.fontSize = '13px';
        toast.style.fontWeight = '500';
        toast.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.2)';
        toast.style.zIndex = '1001';
        toast.style.opacity = '0';
        toast.style.transition = 'all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        toast.style.minWidth = '280px';
        toast.style.textAlign = 'center';
        
        document.body.appendChild(toast);
        
        // Animate in
        requestAnimationFrame(() => {
            toast.style.transform = 'translateX(-50%) translateY(0)';
            toast.style.opacity = '1';
        });
        
        // Remove after delay
        setTimeout(() => {
            toast.style.transform = 'translateX(-50%) translateY(-100px)';
            toast.style.opacity = '0';
            setTimeout(() => {
                toast.remove();
            }, 500);
        }, 3000);
    }
    
    // Create submit particles
    function createSubmitParticles() {
        const container = submitBtnContainer;
        const particleCount = 12;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'absolute';
            particle.style.width = '3px';
            particle.style.height = '3px';
            particle.style.background = 'white';
            particle.style.borderRadius = '50%';
            particle.style.left = '50%';
            particle.style.top = '50%';
            particle.style.zIndex = '3';
            
            const angle = Math.random() * Math.PI * 2;
            const distance = Math.random() * 40 + 20;
            const duration = Math.random() * 0.4 + 0.2;
            
            particle.style.animation = `
                particleOut ${duration}s ease-out forwards
            `;
            
            // Add keyframes
            const style = document.createElement('style');
            style.textContent = `
                @keyframes particleOut {
                    0% {
                        transform: translate(-50%, -50%) scale(1);
                        opacity: 1;
                    }
                    100% {
                        transform: translate(
                            ${Math.cos(angle) * distance}px,
                            ${Math.sin(angle) * distance}px
                        ) scale(0);
                        opacity: 0;
                    }
                }
            `;
            
            document.head.appendChild(style);
            container.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
                style.remove();
            }, 500);
        }
    }
    
    // Add CSS for shake animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
    `;
    document.head.appendChild(style);
    
    // Auto-focus name input
    setTimeout(() => {
        nameInput.focus();
    }, 300);
});
</script>
</body>
</html>