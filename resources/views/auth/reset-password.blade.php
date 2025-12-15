<x-guest-layout>
    <style>
        :root {
            --primary: #dc2626;
            --primary-dark: #b91c1b;
            --primary-light: #fee2e2;
            --success: #10b981;
            --error: #ef4444;
        }

        .password-reset-container {
            max-width: 440px;
            margin: 0 auto;
            padding: 15px;
        }

        .reset-card {
            background: white;
            border-radius: 16px;
            box-shadow: 
                0 8px 25px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(220, 38, 38, 0.05);
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        .reset-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            animation: gradientFlow 3s infinite linear;
            background-size: 300% 100%;
        }

        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            100% { background-position: 300% 50%; }
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 10px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.2);
            animation: logoFloat 3s infinite ease-in-out;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-3px) rotate(1deg); }
            75% { transform: translateY(-2px) rotate(-1deg); }
        }

        .reset-title {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            text-align: center;
            margin-bottom: 5px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .reset-subtitle {
            color: #6b7280;
            text-align: center;
            margin-bottom: 25px;
            line-height: 1.4;
            font-size: 14px;
        }

        /* Compact Form Styling */
        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        .form-label {
            display: block;
            color: #374151;
            font-weight: 500;
            margin-bottom: 6px;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .form-input-container {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            color: #1f2937;
            background: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 46px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 
                0 0 0 3px rgba(220, 38, 38, 0.1),
                0 2px 3px rgba(0, 0, 0, 0.03);
            transform: translateY(-1px);
        }

        .form-input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 16px;
            transition: all 0.3s ease;
            z-index: 10;
        }

        /* Simple Password Strength */
        .password-strength {
            margin-top: 6px;
            display: none;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 500;
        }

        .strength-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #e5e7eb;
            transition: all 0.3s ease;
        }

        .strength-dot.active {
            background: var(--success);
            box-shadow: 0 0 8px rgba(16, 185, 129, 0.4);
        }

        .strength-dot.weak {
            background: var(--error);
            box-shadow: 0 0 8px rgba(239, 68, 68, 0.4);
        }

        .strength-text {
            color: #6b7280;
            transition: all 0.3s ease;
        }

        .strength-text.strong {
            color: var(--success);
        }

        .strength-text.weak {
            color: var(--error);
        }

        /* Password Match Indicator */
        .match-indicator {
            margin-top: 6px;
            font-size: 11px;
            font-weight: 500;
            display: none;
            align-items: center;
            gap: 4px;
        }

        .match-success {
            color: var(--success);
        }

        .match-error {
            color: var(--error);
        }

        /* Enhanced Submit Button */
        .submit-btn {
            width: 100%;
            padding: 14px !important;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            margin-top: 25px !important;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.2) !important;
            height: 46px !important;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.3) !important;
        }

        .submit-btn:active {
            transform: translateY(0) !important;
        }

        .btn-icon {
            transition: transform 0.3s ease;
        }

        .submit-btn:hover .btn-icon {
            transform: translateX(2px);
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none !important;
            border: none !important;
            color: #9ca3af;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: all 0.3s ease;
            z-index: 20;
            height: 24px;
            width: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-toggle:hover {
            color: var(--primary) !important;
            background: rgba(220, 38, 38, 0.05) !important;
        }

        /* Loading State */
        .loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .loading-spinner {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Character Counter */
        .char-counter {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 12px;
            font-weight: 500;
            z-index: 10;
            opacity: 0.7;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .reset-card {
                padding: 25px 20px !important;
            }
            
            .reset-title {
                font-size: 22px;
            }
            
            .logo-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
            
            .password-reset-container {
                padding: 10px;
            }
            
            .form-input {
                padding: 10px 12px;
                height: 44px;
                font-size: 13px;
            }
        }

        /* Password Eye Animation */
        .eye-animation {
            transition: all 0.3s ease;
        }

        .password-toggle:hover .eye-animation {
            transform: scale(1.1);
        }

        /* Validation Colors */
        .input-valid {
            border-color: var(--success) !important;
        }

        .input-invalid {
            border-color: var(--error) !important;
        }
    </style>

    <div class="password-reset-container">
        <div class="reset-card">
            <div class="logo-wrapper">
                <div class="logo-icon">
                    <i class="fas fa-key"></i>
                </div>
                <h1 class="reset-title">Reset Password</h1>
                <p class="reset-subtitle">Create a new password for your account</p>
            </div>

            <div class="validation-errors">
                <x-validation-errors />
            </div>

            <form method="POST" action="{{ route('password.update') }}" id="passwordResetForm">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <div class="form-input-container">
                        <input 
                            id="email" 
                            class="form-input" 
                            type="email" 
                            name="email" 
                            value="{{ old('email', $request->email) }}" 
                            required 
                            autofocus 
                            autocomplete="email" 
                            placeholder="your@email.com"
                        />
                        <div class="form-input-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="char-counter" id="emailCounter">0/50</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                    <div class="form-input-container">
                        <input 
                            id="password" 
                            class="form-input" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password" 
                            placeholder="••••••••"
                        />
                        <div class="form-input-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <button type="button" class="password-toggle" id="togglePassword" title="Show password">
                            <i class="fas fa-eye eye-animation"></i>
                        </button>
                        <div class="char-counter" id="passwordCounter">0</div>
                    </div>
                    
                    <div class="password-strength" id="passwordStrength">
                        <div class="strength-dot" id="strengthDot1"></div>
                        <div class="strength-dot" id="strengthDot2"></div>
                        <div class="strength-dot" id="strengthDot3"></div>
                        <div class="strength-dot" id="strengthDot4"></div>
                        <span class="strength-text" id="strengthText">Password strength</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <div class="form-input-container">
                        <input 
                            id="password_confirmation" 
                            class="form-input" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password" 
                            placeholder="••••••••"
                        />
                        <div class="form-input-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <button type="button" class="password-toggle" id="toggleConfirmPassword" title="Show password">
                            <i class="fas fa-eye eye-animation"></i>
                        </button>
                        <div class="match-indicator" id="matchIndicator">
                            <i class="fas fa-check-circle"></i>
                            <span>Passwords match</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <span>{{ __('Reset Password') }}</span>
                    <i class="fas fa-arrow-right btn-icon"></i>
                    <div class="loading-spinner" id="loadingSpinner"></div>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const form = document.getElementById('passwordResetForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const submitBtn = document.getElementById('submitBtn');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const togglePasswordBtn = document.getElementById('togglePassword');
            const toggleConfirmBtn = document.getElementById('toggleConfirmPassword');
            
            // Counters
            const emailCounter = document.getElementById('emailCounter');
            const passwordCounter = document.getElementById('passwordCounter');
            
            // Indicators
            const passwordStrength = document.getElementById('passwordStrength');
            const strengthDots = [
                document.getElementById('strengthDot1'),
                document.getElementById('strengthDot2'),
                document.getElementById('strengthDot3'),
                document.getElementById('strengthDot4')
            ];
            const strengthText = document.getElementById('strengthText');
            const matchIndicator = document.getElementById('matchIndicator');
            
            // Initialize
            loadingSpinner.style.display = 'none';
            updateCounter(emailInput, emailCounter, 50);
            
            // Email input
            emailInput.addEventListener('input', () => {
                updateCounter(emailInput, emailCounter, 50);
                validateEmail();
            });
            
            // Password input
            passwordInput.addEventListener('input', () => {
                updateCounter(passwordInput, passwordCounter);
                checkPasswordStrength();
                checkPasswordMatch();
            });
            
            // Confirm password input
            confirmInput.addEventListener('input', () => {
                checkPasswordMatch();
            });
            
            // Password toggle
            togglePasswordBtn.addEventListener('click', function() {
                togglePasswordVisibility(passwordInput, this);
            });
            
            toggleConfirmBtn.addEventListener('click', function() {
                togglePasswordVisibility(confirmInput, this);
            });
            
            // Form submission
            form.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                } else {
                    showLoading();
                }
            });
            
            function updateCounter(input, counter, max = null) {
                const length = input.value.length;
                if (max) {
                    counter.textContent = `${length}/${max}`;
                    // Color change based on length
                    if (length > max * 0.8) {
                        counter.style.color = 'var(--error)';
                    } else if (length > max * 0.6) {
                        counter.style.color = '#f59e0b';
                    } else {
                        counter.style.color = '#9ca3af';
                    }
                } else {
                    counter.textContent = length;
                    // Color change for password length
                    if (length < 4) {
                        counter.style.color = 'var(--error)';
                    } else if (length < 8) {
                        counter.style.color = '#f59e0b';
                    } else {
                        counter.style.color = 'var(--success)';
                    }
                }
            }
            
            function validateEmail() {
                const email = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (!email) {
                    emailInput.classList.remove('input-valid', 'input-invalid');
                    return false;
                }
                
                const isValid = emailRegex.test(email);
                
                if (isValid) {
                    emailInput.classList.add('input-valid');
                    emailInput.classList.remove('input-invalid');
                    return true;
                } else {
                    emailInput.classList.add('input-invalid');
                    emailInput.classList.remove('input-valid');
                    return false;
                }
            }
            
            function checkPasswordStrength() {
                const password = passwordInput.value;
                
                if (!password) {
                    passwordStrength.style.display = 'none';
                    passwordInput.classList.remove('input-valid', 'input-invalid');
                    return;
                }
                
                passwordStrength.style.display = 'flex';
                
                // Simple strength check based only on length
                const length = password.length;
                let strength = 0;
                let text = 'Weak';
                let colorClass = 'weak';
                
                if (length >= 8) {
                    strength = 4; // All dots active
                    text = 'Strong';
                    colorClass = 'strong';
                    passwordInput.classList.add('input-valid');
                    passwordInput.classList.remove('input-invalid');
                } else if (length >= 6) {
                    strength = 3; // 3 dots active
                    text = 'Medium';
                    passwordInput.classList.remove('input-valid', 'input-invalid');
                } else if (length >= 4) {
                    strength = 2; // 2 dots active
                    text = 'Fair';
                    passwordInput.classList.remove('input-valid', 'input-invalid');
                } else {
                    strength = 1; // 1 dot active
                    text = 'Weak';
                    passwordInput.classList.add('input-invalid');
                    passwordInput.classList.remove('input-valid');
                }
                
                // Update dots
                strengthDots.forEach((dot, index) => {
                    if (index < strength) {
                        dot.classList.add('active');
                        if (colorClass === 'strong') {
                            dot.classList.add('active');
                            dot.style.background = 'var(--success)';
                        } else if (colorClass === 'weak') {
                            dot.classList.add('weak');
                            dot.style.background = 'var(--error)';
                        } else {
                            dot.style.background = '#f59e0b';
                        }
                    } else {
                        dot.classList.remove('active', 'weak');
                        dot.style.background = '#e5e7eb';
                    }
                });
                
                // Update text
                strengthText.textContent = text;
                strengthText.className = 'strength-text';
                if (colorClass === 'strong') {
                    strengthText.classList.add('strong');
                } else if (colorClass === 'weak') {
                    strengthText.classList.add('weak');
                }
                
                // Add animation to dots
                strengthDots.forEach(dot => {
                    if (dot.classList.contains('active')) {
                        dot.style.animation = 'pulse 0.3s ease';
                        setTimeout(() => {
                            dot.style.animation = '';
                        }, 300);
                    }
                });
            }
            
            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirm = confirmInput.value;
                
                if (!password || !confirm) {
                    matchIndicator.style.display = 'none';
                    confirmInput.classList.remove('input-valid', 'input-invalid');
                    return;
                }
                
                matchIndicator.style.display = 'flex';
                
                if (password === confirm) {
                    matchIndicator.className = 'match-indicator match-success';
                    matchIndicator.innerHTML = '<i class="fas fa-check-circle"></i><span>Passwords match</span>';
                    confirmInput.classList.add('input-valid');
                    confirmInput.classList.remove('input-invalid');
                    
                    // Add success animation
                    matchIndicator.style.animation = 'matchSuccess 0.5s ease';
                    setTimeout(() => {
                        matchIndicator.style.animation = '';
                    }, 500);
                } else {
                    matchIndicator.className = 'match-indicator match-error';
                    matchIndicator.innerHTML = '<i class="fas fa-times-circle"></i><span>Passwords do not match</span>';
                    confirmInput.classList.add('input-invalid');
                    confirmInput.classList.remove('input-valid');
                }
            }
            
            function togglePasswordVisibility(input, button) {
                const type = input.type === 'password' ? 'text' : 'password';
                input.type = type;
                
                const icon = button.querySelector('i');
                icon.className = type === 'password' ? 'fas fa-eye eye-animation' : 'fas fa-eye-slash eye-animation';
                
                // Add animation to button
                button.style.transform = 'translateY(-50%) scale(0.95)';
                setTimeout(() => {
                    button.style.transform = 'translateY(-50%)';
                }, 150);
                
                // Add eye animation
                icon.style.animation = 'eyeBlink 0.5s ease';
                setTimeout(() => {
                    icon.style.animation = '';
                }, 500);
            }
            
            function validateForm() {
                const isEmailValid = validateEmail();
                const password = passwordInput.value;
                const confirm = confirmInput.value;
                
                let isValid = true;
                
                // Reset all visual errors
                [emailInput, passwordInput, confirmInput].forEach(input => {
                    input.style.animation = '';
                });
                
                if (!isEmailValid) {
                    shakeElement(emailInput);
                    isValid = false;
                }
                
                if (!password) {
                    shakeElement(passwordInput);
                    isValid = false;
                } else if (password.length < 8) {
                    shakeElement(passwordInput);
                    isValid = false;
                }
                
                if (!confirm) {
                    shakeElement(confirmInput);
                    isValid = false;
                } else if (password !== confirm) {
                    shakeElement(confirmInput);
                    isValid = false;
                }
                
                if (!isValid) {
                    shakeElement(submitBtn);
                    return false;
                }
                
                return true;
            }
            
            function showLoading() {
                submitBtn.disabled = true;
                const originalText = submitBtn.querySelector('span').textContent;
                submitBtn.innerHTML = `
                    <div class="loading-spinner" style="display: block;"></div>
                    <span>Resetting...</span>
                `;
                submitBtn.classList.add('loading');
                submitBtn.setAttribute('data-original-text', originalText);
            }
            
            function shakeElement(element) {
                element.style.animation = 'none';
                setTimeout(() => {
                    element.style.animation = 'shake 0.5s ease-in-out';
                }, 10);
                
                setTimeout(() => {
                    element.style.animation = '';
                }, 500);
            }
            
            // Add animations
            const style = document.createElement('style');
            style.textContent = `
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
                    20%, 40%, 60%, 80% { transform: translateX(4px); }
                }
                
                @keyframes pulse {
                    0%, 100% { transform: scale(1); }
                    50% { transform: scale(1.2); }
                }
                
                @keyframes eyeBlink {
                    0%, 100% { transform: scale(1); opacity: 1; }
                    50% { transform: scale(0.8); opacity: 0.7; }
                }
                
                @keyframes matchSuccess {
                    0% { transform: scale(1); }
                    25% { transform: scale(1.05); }
                    50% { transform: scale(1); }
                    75% { transform: scale(1.02); }
                    100% { transform: scale(1); }
                }
            `;
            document.head.appendChild(style);
            
            // Auto-focus email if it's empty
            if (!emailInput.value.trim()) {
                setTimeout(() => {
                    emailInput.focus();
                }, 300);
            }
        });
    </script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</x-guest-layout>