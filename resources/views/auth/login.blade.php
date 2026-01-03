<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SwiftCourier</title>
    
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
            max-width: 400px;
            padding: 15px;
        }

        /* Main Container - Compact */
        .login-container {
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

        /* Ultra Compact Card */
        .login-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 28px 24px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(220, 38, 38, 0.08);
            transition: all 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        /* Ultra Compact Header */
        .login-header {
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

        .login-header h1 {
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 4px;
        }

        .login-header p {
            font-size: 12px;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* Compact Form Groups */
        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        .input-wrapper {
            position: relative;
        }

        /* Compact Input Fields */
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
 .login-card::before {
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

        .login-card:hover::before {
            opacity: 0.3;
        }
        input:focus {
            outline: none;
            border-color: var(--primary);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.15);
        }

        /* Compact Input Icons */
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

        /* Compact Password Toggle */
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

        /* ========== NEW: Centered Error Messages ========== */
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

        /* Remember Me - Compact with NO left space */
        .remember-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 16px 0 20px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .remember input[type="checkbox"] {
            width: 14px;
            height: 14px;
            cursor: pointer;
            accent-color: var(--primary);
            margin: 0;
        }

        .remember label {
            color: var(--gray-600);
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            padding-left: 4px !important;
            user-select: none;
            transition: color 0.3s ease;
        }

        .remember:hover label {
            color: var(--primary);
        }

        /* Forgot Password Link */
        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            padding: 2px 0;
        }

        .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* ========== NEW: Enhanced Submit Button with Professional Effects ========== */
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

        /* ========== NEW: Enhanced Success Animation ========== */
        .success-animation {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .success-animation.active {
            display: flex;
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .success-content {
            text-align: center;
            animation: successScale 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            transform-origin: center;
        }

        @keyframes successScale {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .success-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            margin: 0 auto 20px;
            position: relative;
            animation: successCheck 0.8s 0.3s both cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(220, 38, 38, 0.4);
        }

        @keyframes successCheck {
            0% { transform: scale(0) rotate(-180deg); opacity: 0; }
            70% { transform: scale(1.1) rotate(10deg); opacity: 1; }
            100% { transform: scale(1) rotate(0); opacity: 1; }
        }

        .success-icon::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            opacity: 0.3;
            filter: blur(15px);
            animation: successPulse 2s infinite;
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.1); opacity: 0.5; }
        }

        .success-text {
            font-size: 20px;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 8px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .success-subtext {
            font-size: 14px;
            color: var(--gray-500);
            font-weight: 500;
            opacity: 0.8;
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
            .login-card { padding: 24px 20px; }
            .login-header h1 { font-size: 18px; }
            .logo-text { font-size: 20px; }
            .logo-wrapper { width: 55px; height: 55px; }
            .logo { font-size: 22px; }
            .remember-container { flex-direction: column; gap: 10px; align-items: flex-start; }
        }

        /* Selection */
        ::selection {
            background: var(--primary);
            color: white;
        }
    </style>
</head>
<body>

<!-- ========== NEW: Enhanced Success Animation ========== -->
<div class="success-animation" id="successAnimation">
    <div class="success-content">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="success-text">Login Successful!</div>
        <div class="success-subtext">Redirecting to dashboard...</div>
    </div>
</div>

<!-- Perfectly Centered Container -->
<div class="center-container">
    <div class="login-container">
        <div class="login-card">
            <!-- Header with Compact Logo -->
            <div class="login-header">
                <div class="logo-container">
                    <div class="logo-wrapper">
                        <div class="logo">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                    </div>
                    <div class="logo-text">CMS</div>
                </div>
                <h1>Welcome Back</h1>
                <p>Sign in to continue</p>
            </div>

            <!-- ========== NEW: Centered Validation Errors ========== -->
            @if ($errors->any())
                <div class="validation-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Laravel Session Status -->
            @if (session('status'))
                <div class="status-message">
                    <i class="fas fa-check-circle"></i> {{ session('status') }}
                </div>
            @endif

            <!-- Laravel Login Form -->
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="email" 
                               id="email" 
                               name="email" 
                               placeholder="Email address"
                               value="{{ old('email') }}"
                               required 
                               autofocus 
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
                               placeholder="Password"
                               required 
                               autocomplete="current-password">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <button type="button" class="password-toggle" id="passwordToggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="remember-container">
                    <div class="remember">
                        <input type="checkbox" id="remember_me" name="remember">
                        <label for="remember_me">Remember me</label>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- ========== NEW: Enhanced Submit Button Container ========== -->
                <div class="submit-btn-container">
                    <div class="btn-glow"></div>
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span id="btnText">Log In</span>
                        <div class="loading-spinner" id="spinner"></div>
                    </button>
                </div>

                <!-- Additional Links -->
                <div class="additional-links">
                    New to CMS?
                    <a href="{{ route('register') }}">Sign up</a>

                    <a href="/auth/google">login with google</a>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========== NEW: Enhanced Form Submit Animation JavaScript ========== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const form = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('passwordToggle');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const spinner = document.getElementById('spinner');
    const successAnimation = document.getElementById('successAnimation');
    const submitBtnContainer = document.querySelector('.submit-btn-container');
    
    // Password toggle functionality
    passwordToggle.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type');
        const icon = this.querySelector('i');
        
        if (type === 'password') {
            passwordInput.setAttribute('type', 'text');
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            this.style.color = 'var(--primary)';
        } else {
            passwordInput.setAttribute('type', 'password');
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            this.style.color = 'var(--gray-400)';
        }
    });
    
    // Input interactions
    const inputs = [emailInput, passwordInput];
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
    
    // ========== NEW: Enhanced Form Submission ==========
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Validate form
        const isValid = validateForm();
        
        if (isValid) {
            // Enhanced loading state
            submitBtn.disabled = true;
            btnText.textContent = 'Logging in...';
            spinner.style.display = 'block';
            submitBtnContainer.style.transform = 'scale(0.98)';
            
            // Add particle explosion effect
            createSubmitParticles();
            
            try {
                // Prepare form data
                const formData = new FormData(form);
                
                // Enhanced API call with timeout
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 10000);
                
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    signal: controller.signal
                });
                
                clearTimeout(timeoutId);
                
                const data = await response.json();
                
                if (response.ok) {
                    // Enhanced success animation
                    submitBtnContainer.style.background = 'linear-gradient(135deg, var(--success), #059669)';
                    btnText.textContent = 'Success!';
                    
                    setTimeout(() => {
                        successAnimation.classList.add('active');
                        
                        // Create success particles
                        createSuccessParticles();
                        
                        // Redirect after delay
                        setTimeout(() => {
                            if (data.redirect) {
                                window.location.href = data.redirect;
                            } else {
                                window.location.href = '/dashboard';
                            }
                        }, 2000);
                    }, 500);
                    
                } else {
                    // Enhanced error handling
                    submitBtnContainer.style.animation = 'shake 0.5s ease-in-out';
                    setTimeout(() => {
                        submitBtnContainer.style.animation = '';
                    }, 500);
                    
                    resetFormState();
                    
                    if (data.errors) {
                        let errorMessages = '';
                        for (const field in data.errors) {
                            errorMessages += data.errors[field].join('\n') + '\n';
                        }
                        showEnhancedToast(errorMessages.trim(), 'error');
                    } else {
                        showEnhancedToast(data.message || 'Login failed', 'error');
                    }
                }
                
            } catch (error) {
                // Enhanced error handling
                resetFormState();
                if (error.name === 'AbortError') {
                    showEnhancedToast('Request timeout. Please try again.', 'error');
                } else {
                    showEnhancedToast('Network error. Please check your connection.', 'error');
                }
                console.error('Login error:', error);
            }
        }
    });
    
    // Helper functions
    function validateForm() {
        let isValid = true;
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailInput.value || !emailRegex.test(emailInput.value)) {
            emailInput.style.borderColor = 'var(--error)';
            emailInput.focus();
            showEnhancedToast('Please enter a valid email address', 'error');
            isValid = false;
        }
        
        // Password validation
        else if (!passwordInput.value || passwordInput.value.length < 6) {
            passwordInput.style.borderColor = 'var(--error)';
            passwordInput.focus();
            showEnhancedToast('Password must be at least 6 characters', 'error');
            isValid = false;
        }
        
        return isValid;
    }
    
    function resetFormState() {
        submitBtn.disabled = false;
        btnText.textContent = 'Log In';
        spinner.style.display = 'none';
        submitBtnContainer.style.transform = '';
        submitBtnContainer.style.background = 'linear-gradient(135deg, var(--primary), var(--primary-dark))';
    }
    
    // Enhanced toast notification
    function showEnhancedToast(message, type) {
        const toast = document.createElement('div');
        toast.innerHTML = `
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                <span>${message}</span>
            </div>
        `;
        
        toast.style.position = 'fixed';
        toast.style.top = '20px';
        toast.style.left = '50%';
        toast.style.transform = 'translateX(-50%) translateY(-100px)';
        toast.style.background = type === 'success' ? 
            'linear-gradient(135deg, var(--success), #059669)' : 
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
    
    // Create success particles
    function createSuccessParticles() {
        const container = document.querySelector('.success-content');
        const particleCount = 20;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'absolute';
            particle.style.width = '4px';
            particle.style.height = '4px';
            particle.style.background = 'var(--primary)';
            particle.style.borderRadius = '50%';
            particle.style.left = '50%';
            particle.style.top = '50%';
            particle.style.zIndex = '100';
            
            const angle = Math.random() * Math.PI * 2;
            const distance = Math.random() * 100 + 80;
            const duration = Math.random() * 0.6 + 0.4;
            
            particle.style.animation = `
                successParticle ${duration}s ease-out forwards
            `;
            
            const style = document.createElement('style');
            style.textContent = `
                @keyframes successParticle {
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
            }, 800);
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
    
    // Auto-focus email input
    setTimeout(() => {
        emailInput.focus();
    }, 300);
});
</script>
</body>
</html>