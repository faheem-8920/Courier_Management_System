<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email | SwiftCourier</title>
    
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
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --radius: 8px;
            --radius-lg: 10px;
            --shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            --shadow-red: 0 3px 15px rgba(220, 38, 38, 0.1);
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
            padding: 10px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background Particles */
        .particles {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        /* Ultra Compact Container */
        .compact-container {
            width: 100%;
            max-width: 380px;
            position: relative;
            z-index: 1;
            animation: slideIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(10px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* Ultra Compact Card */
        .verification-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 20px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(220, 38, 38, 0.1);
            backdrop-filter: blur(10px);
        }

        .verification-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            animation: shimmer 2s infinite linear;
        }

        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: 200px 0; }
        }

        /* Ultra Compact Header */
        .verification-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo-wrapper {
            position: relative;
            width: 45px;
            height: 45px;
            margin: 0 auto 8px;
        }

        .logo {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            animation: logoFloat 3s infinite ease-in-out;
            box-shadow: var(--shadow-red);
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-3px) rotate(1deg); }
        }

        .verification-header h1 {
            font-size: 16px;
            font-weight: 600;
            color: #262626;
            margin-bottom: 3px;
        }

        .verification-header p {
            font-size: 11px;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* Advanced Email Animation */
        .email-animation-container {
            position: relative;
            height: 70px;
            margin: 10px auto 15px;
        }

        .envelope-3d {
            position: absolute;
            width: 60px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) perspective(500px) rotateX(15deg);
            border-radius: 6px;
            animation: envelope3d 4s infinite ease-in-out;
            box-shadow: 0 5px 15px rgba(220, 38, 38, 0.2);
        }

        @keyframes envelope3d {
            0%, 100% { transform: translate(-50%, -50%) perspective(500px) rotateX(15deg); }
            50% { transform: translate(-50%, -50%) perspective(500px) rotateX(5deg) translateY(-5px); }
        }

        .envelope-flap {
            position: absolute;
            width: 60px;
            height: 20px;
            background: linear-gradient(135deg, var(--primary-dark), #991b1b);
            top: 50%;
            left: 50%;
            transform: translate(-50%, calc(-50% - 20px)) rotateX(60deg);
            transform-origin: bottom;
            border-radius: 4px 4px 0 0;
            animation: flapWave 2s infinite ease-in-out;
        }

        @keyframes flapWave {
            0%, 100% { transform: translate(-50%, calc(-50% - 20px)) rotateX(60deg); }
            50% { transform: translate(-50%, calc(-50% - 20px)) rotateX(45deg); }
        }

        .email-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: white;
            z-index: 2;
            animation: iconGlow 2s infinite ease-in-out;
        }

        @keyframes iconGlow {
            0%, 100% { filter: drop-shadow(0 0 3px rgba(255, 255, 255, 0.5)); }
            50% { filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.8)); }
        }

        /* Email Display with Copy Feature */
        .email-display-container {
            background: var(--primary-light);
            padding: 10px;
            border-radius: var(--radius);
            margin: 12px 0;
            border: 1px solid rgba(220, 38, 38, 0.15);
            animation: highlightPulse 3s infinite ease-in-out;
        }

        @keyframes highlightPulse {
            0%, 100% { box-shadow: 0 0 0 rgba(220, 38, 38, 0.1); }
            50% { box-shadow: 0 0 10px rgba(220, 38, 38, 0.15); }
        }

        .email-display {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: var(--primary-dark);
            font-weight: 500;
        }

        .copy-btn {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(220, 38, 38, 0.2);
            border-radius: 4px;
            padding: 4px 8px;
            font-size: 10px;
            color: var(--primary);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .copy-btn:hover {
            background: white;
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(220, 38, 38, 0.1);
        }

        /* Compact Message */
        .verification-message {
            font-size: 12px;
            color: var(--gray-600);
            line-height: 1.4;
            margin-bottom: 15px;
            text-align: center;
            padding: 10px;
            background: linear-gradient(135deg, #fef2f2, var(--primary-light));
            border-radius: var(--radius);
            border-left: 3px solid var(--primary);
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Smart Email Providers */
        .email-quick-access {
            background: var(--gray-50);
            padding: 10px;
            border-radius: var(--radius);
            margin: 12px 0;
            border: 1px solid var(--gray-200);
        }

        .smart-email-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 6px;
            margin-bottom: 8px;
        }

        .smart-email-btn {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            padding: 8px 4px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            cursor: pointer;
            transition: var(--transition);
            font-size: 10px;
            color: var(--gray-600);
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .smart-email-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.8));
            opacity: 0;
            transition: var(--transition);
        }

        .smart-email-btn:hover::before {
            opacity: 1;
        }

        .smart-email-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .smart-email-btn i {
            font-size: 14px;
        }

        .smart-email-btn.gmail { border-color: #d93025; }
        .smart-email-btn.gmail i { color: #d93025; }
        .smart-email-btn.gmail:hover { background: #fce8e6; }

        .smart-email-btn.outlook { border-color: #0078d4; }
        .smart-email-btn.outlook i { color: #0078d4; }
        .smart-email-btn.outlook:hover { background: #e8f2fe; }

        .smart-email-btn.yahoo { border-color: #6001d2; }
        .smart-email-btn.yahoo i { color: #6001d2; }
        .smart-email-btn.yahoo:hover { background: #f5f0ff; }

        .smart-email-btn.apple { border-color: #000000; }
        .smart-email-btn.apple i { color: #000000; }
        .smart-email-btn.apple:hover { background: #f5f5f7; }

        .quick-access-title {
            font-size: 10px;
            color: var(--gray-500);
            text-align: center;
            margin-bottom: 6px;
            font-weight: 500;
        }

        /* Ultra Compact Resend Button */
        .resend-container {
            margin: 15px 0 12px;
            position: relative;
        }

        .resend-btn {
            width: 100%;
            padding: 10px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-red);
        }

        .resend-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.15);
        }

        .resend-btn:active {
            transform: translateY(0);
        }

        .resend-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        .resend-btn::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            animation: shimmerEffect 3s infinite linear;
        }

        @keyframes shimmerEffect {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        /* Countdown Timer */
        .countdown-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 8px;
            font-size: 11px;
            color: var(--gray-500);
        }

        .countdown {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .countdown-number {
            background: var(--primary-light);
            color: var(--primary-dark);
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
            animation: countdownPulse 1s infinite alternate;
        }

        @keyframes countdownPulse {
            from { transform: scale(1); }
            to { transform: scale(1.05); }
        }

        /* Ultra Compact Footer Actions */
        .footer-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid var(--gray-200);
        }

        .footer-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 11px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: var(--transition);
            padding: 4px 8px;
            border-radius: 4px;
        }

        .footer-link:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
        }

        .logout-form {
            margin: 0;
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--gray-500);
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px;
            border-radius: 4px;
            transition: var(--transition);
        }

        .logout-btn:hover {
            background: var(--gray-100);
            color: var(--gray-600);
        }

        /* Success Message */
        .success-message {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            border: 1px solid #bbf7d0;
            border-radius: var(--radius);
            padding: 10px;
            margin-bottom: 10px;
            color: #166534;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: successSlide 0.3s ease;
        }

        @keyframes successSlide {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Loading Animation */
        .loading-spinner {
            display: none;
            width: 12px;
            height: 12px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Advanced Toast */
        .advanced-toast {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%) translateY(-100px);
            background: var(--primary);
            color: white;
            padding: 8px 16px;
            border-radius: var(--radius);
            font-size: 12px;
            font-weight: 500;
            box-shadow: 0 5px 20px rgba(220, 38, 38, 0.2);
            z-index: 1000;
            opacity: 0;
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55), opacity 0.4s;
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 200px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .advanced-toast.success {
            background: linear-gradient(135deg, var(--success), #059669);
        }

        .advanced-toast.error {
            background: linear-gradient(135deg, var(--error), #dc2626);
        }

        /* Progress Bar */
        .progress-container {
            width: 100%;
            height: 2px;
            background: var(--gray-200);
            border-radius: 1px;
            overflow: hidden;
            margin-top: 6px;
            display: none;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            width: 0%;
            transition: width 1s linear;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .compact-container { max-width: 340px; }
            .verification-card { padding: 16px; }
            .smart-email-buttons { grid-template-columns: repeat(4, 1fr); }
            .email-animation-container { height: 60px; }
            .envelope-3d { width: 50px; height: 35px; }
            .footer-actions { flex-direction: column; gap: 8px; }
        }
        
    </style>
</head>
<body>

<!-- Background Particles -->
<div class="particles" id="particles"></div>

<!-- Advanced Toast -->
<div class="advanced-toast" id="toast"></div>

<!-- Main Container -->
<div class="compact-container">
    <div class="verification-card">
        <!-- Header -->
        <div class="verification-header">
            <div class="logo-wrapper">
                <div class="logo">
                    <i class="fas fa-shipping-fast"></i>
                </div>
            </div>
            <h1>Verify Your Email</h1>
            <p>One click away from SwiftCourier</p>
        </div>

        <!-- Advanced Email Animation -->
        <div class="email-animation-container">
            <div class="envelope-3d"></div>
            <div class="envelope-flap"></div>
            <div class="email-icon">
                <i class="fas fa-envelope"></i>
            </div>
        </div>

        <!-- Email Display with Copy -->
        @auth
        <div class="email-display-container">
            <div class="email-display">
                <div>
                    <i class="fas fa-at"></i>
                    <span id="emailText">{{ auth()->user()->email }}</span>
                </div>
                <button class="copy-btn" onclick="copyEmail()">
                    <i class="fas fa-copy"></i> Copy
                </button>
            </div>
        </div>
        @endauth

        <!-- Message -->
        <div class="verification-message">
            <i class="fas fa-info-circle"></i>
            Click the verification link in your email to activate your account
        </div>

        <!-- Success Message -->
        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ __('A new verification link has been sent to your email.') }}
            </div>
        @endif

        <!-- Smart Email Providers -->
        <div class="email-quick-access">
            <div class="quick-access-title">Quick Access</div>
            <div class="smart-email-buttons">
                <button class="smart-email-btn gmail" onclick="openEmailProvider('gmail')">
                    <i class="fab fa-google"></i> Gmail
                </button>
                <button class="smart-email-btn outlook" onclick="openEmailProvider('outlook')">
                    <i class="fas fa-envelope"></i> Outlook
                </button>
                <button class="smart-email-btn yahoo" onclick="openEmailProvider('yahoo')">
                    <i class="fab fa-yahoo"></i> Yahoo
                </button>
                <button class="smart-email-btn apple" onclick="openEmailProvider('apple')">
                    <i class="fab fa-apple"></i> Mail
                </button>
            </div>
        </div>

        <!-- Resend Form -->
        <div class="resend-container">
            <form method="POST" action="{{ route('verification.send') }}" id="resendForm">
                @csrf
                <button type="submit" class="resend-btn" id="resendBtn">
                    <i class="fas fa-paper-plane"></i>
                    <span id="btnText">Resend Verification</span>
                    <div class="loading-spinner" id="spinner"></div>
                </button>
            </form>
            
            <div class="progress-container" id="progressContainer">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            
            <div class="countdown-container" id="countdownContainer">
                <div class="countdown">
                    <span>Resend in</span>
                    <span class="countdown-number" id="countdownNumber">60</span>
                    <span>seconds</span>
                </div>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="footer-actions">
            <a href="{{ route('profile.show') }}" class="footer-link">
                <i class="fas fa-user-cog"></i> Profile
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="logout-form" id="logoutForm">
                @csrf
                <button type="submit" class="logout-btn" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize particles
    createParticles();
    
    // Elements
    const resendForm = document.getElementById('resendForm');
    const resendBtn = document.getElementById('resendBtn');
    const btnText = document.getElementById('btnText');
    const spinner = document.getElementById('spinner');
    const logoutBtn = document.getElementById('logoutBtn');
    const toast = document.getElementById('toast');
    const progressContainer = document.getElementById('progressContainer');
    const progressBar = document.getElementById('progressBar');
    const countdownContainer = document.getElementById('countdownContainer');
    const countdownNumber = document.getElementById('countdownNumber');
    
    const envelope3d = document.querySelector('.envelope-3d');
    const envelopeFlap = document.querySelector('.envelope-flap');
    const emailIcon = document.querySelector('.email-icon');
    
    let countdown = 0;
    let countdownInterval;
    
    // Check cooldown from localStorage
    const cooldownEnd = localStorage.getItem('emailResendCooldown');
    if (cooldownEnd) {
        const remaining = Math.ceil((cooldownEnd - Date.now()) / 1000);
        if (remaining > 0) {
            startCountdown(remaining);
        }
    }
    
    // Enhanced resend form submission
    resendForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Start cooldown (60 seconds)
        localStorage.setItem('emailResendCooldown', Date.now() + 60000);
        
        // Disable button and show loading
        resendBtn.disabled = true;
        btnText.innerHTML = 'Sending...';
        spinner.style.display = 'block';
        
        // Create advanced particle effect
        createAdvancedParticles();
        
        // Start sending animation
        startSendingAnimation();
        
        try {
            // Prepare form data
            const formData = new FormData(this);
            
            // Submit form
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
            });
            
            if (response.ok) {
                // Success
                showAdvancedToast('Verification email sent successfully!', 'success');
                createSuccessAnimation();
                startCountdown(60);
                
                // Change button state temporarily
                setTimeout(() => {
                    btnText.innerHTML = '<i class="fas fa-check"></i> Sent!';
                    resendBtn.style.background = 'linear-gradient(135deg, var(--success), #059669)';
                    
                    setTimeout(() => {
                        btnText.innerHTML = 'Resend Verification';
                        resendBtn.style.background = '';
                        spinner.style.display = 'none';
                    }, 1500);
                }, 500);
                
            } else {
                // Error
                const data = await response.json();
                resetButtonState();
                showAdvancedToast(data.message || 'Failed to send email', 'error');
            }
            
        } catch (error) {
            // Network error
            resetButtonState();
            showAdvancedToast('Network error. Please try again.', 'error');
        }
    });
    
    // Logout confirmation
    logoutBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to logout?')) {
            document.getElementById('logoutForm').submit();
        }
    });
    
    // Start sending animation
    function startSendingAnimation() {
        // Create flying letter animation
        createFlyingLetterAnimation();
        
        // Animate envelope opening
        envelopeFlap.style.animation = 'flapWave 0.5s ease-in-out';
        envelope3d.style.transform = 'translate(-50%, -50%) perspective(500px) rotateX(5deg) translateY(-10px)';
        
        setTimeout(() => {
            envelopeFlap.style.animation = '';
            envelope3d.style.transform = '';
        }, 500);
    }
    
    // Create flying letter animation
    function createFlyingLetterAnimation() {
        const container = document.querySelector('.email-animation-container');
        const letter = document.createElement('div');
        letter.innerHTML = '<i class="fas fa-envelope-open-text"></i>';
        letter.style.position = 'absolute';
        letter.style.top = '50%';
        letter.style.left = '50%';
        letter.style.fontSize = '20px';
        letter.style.color = 'white';
        letter.style.zIndex = '3';
        letter.style.animation = 'flyLetter 1s ease-out forwards';
        
        // Add keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes flyLetter {
                0% {
                    transform: translate(-50%, -50%) scale(1) rotate(0deg);
                    opacity: 1;
                }
                50% {
                    transform: translate(calc(-50% + 100px), calc(-50% - 50px)) scale(1.2) rotate(180deg);
                    opacity: 0.8;
                }
                100% {
                    transform: translate(calc(-50% + 200px), calc(-50% + 100px)) scale(0) rotate(360deg);
                    opacity: 0;
                }
            }
        `;
        
        document.head.appendChild(style);
        container.appendChild(letter);
        
        setTimeout(() => {
            letter.remove();
            style.remove();
        }, 1000);
    }
    
    // Start countdown timer
    function startCountdown(seconds) {
        countdown = seconds;
        progressContainer.style.display = 'block';
        countdownContainer.style.display = 'flex';
        resendBtn.disabled = true;
        
        updateCountdown();
        
        countdownInterval = setInterval(() => {
            countdown--;
            updateCountdown();
            
            if (countdown <= 0) {
                clearInterval(countdownInterval);
                progressContainer.style.display = 'none';
                countdownContainer.style.display = 'none';
                resendBtn.disabled = false;
                localStorage.removeItem('emailResendCooldown');
            }
        }, 1000);
    }
    
    // Update countdown display
    function updateCountdown() {
        countdownNumber.textContent = countdown;
        const progress = ((60 - countdown) / 60) * 100;
        progressBar.style.width = `${progress}%`;
    }
    
    // Reset button state
    function resetButtonState() {
        resendBtn.disabled = false;
        btnText.textContent = 'Resend Verification';
        spinner.style.display = 'none';
    }
    
    // Show advanced toast notification
    function showAdvancedToast(message, type) {
        toast.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        `;
        toast.className = `advanced-toast ${type}`;
        
        // Show toast with bounce animation
        setTimeout(() => {
            toast.style.transform = 'translateX(-50%) translateY(0)';
            toast.style.opacity = '1';
        }, 10);
        
        // Hide after 3 seconds
        setTimeout(() => {
            toast.style.transform = 'translateX(-50%) translateY(-100px)';
            toast.style.opacity = '0';
        }, 3000);
    }
    
    // Create success animation
    function createSuccessAnimation() {
        // Change icon to checkmark
        const originalIcon = emailIcon.innerHTML;
        emailIcon.innerHTML = '<i class="fas fa-check-circle"></i>';
        emailIcon.style.color = '#10b981';
        
        // Create success particles
        createSuccessParticles();
        
        // Restore original icon
        setTimeout(() => {
            emailIcon.innerHTML = originalIcon;
            emailIcon.style.color = '';
        }, 2000);
    }
    
    // Create advanced particles on button click
    function createAdvancedParticles() {
        const container = document.querySelector('.resend-container');
        const particleCount = 15;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'absolute';
            particle.style.width = Math.random() * 4 + 2 + 'px';
            particle.style.height = particle.style.width;
            particle.style.background = `hsl(${Math.random() * 30 + 0}, 80%, 60%)`;
            particle.style.borderRadius = '50%';
            particle.style.left = '50%';
            particle.style.top = '50%';
            particle.style.zIndex = '100';
            
            const angle = Math.random() * Math.PI * 2;
            const distance = Math.random() * 50 + 30;
            const duration = Math.random() * 0.6 + 0.4;
            
            particle.style.animation = `
                particleExplode ${duration}s ease-out forwards
            `;
            
            // Add keyframes
            const style = document.createElement('style');
            style.textContent = `
                @keyframes particleExplode {
                    0% {
                        transform: translate(-50%, -50%) scale(0) rotate(0deg);
                        opacity: 0;
                    }
                    10% {
                        opacity: 1;
                    }
                    100% {
                        transform: translate(
                            ${Math.cos(angle) * distance}px,
                            ${Math.sin(angle) * distance}px
                        ) scale(1) rotate(360deg);
                        opacity: 0;
                    }
                }
            `;
            
            document.head.appendChild(style);
            container.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
                style.remove();
            }, 600);
        }
    }
    
    // Create success particles
    function createSuccessParticles() {
        const container = document.querySelector('.email-animation-container');
        const particleCount = 12;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'absolute';
            particle.style.width = Math.random() * 5 + 2 + 'px';
            particle.style.height = particle.style.width;
            particle.style.background = `hsl(${Math.random() * 60 + 120}, 80%, 60%)`;
            particle.style.borderRadius = '50%';
            particle.style.left = '50%';
            particle.style.top = '50%';
            particle.style.zIndex = '3';
            
            const angle = Math.random() * Math.PI * 2;
            const distance = Math.random() * 40 + 20;
            const duration = Math.random() * 0.8 + 0.6;
            
            particle.style.animation = `
                successParticle ${duration}s ease-out forwards
            `;
            
            // Add keyframes
            const style = document.createElement('style');
            style.textContent = `
                @keyframes successParticle {
                    0% {
                        transform: translate(-50%, -50%) scale(0);
                        opacity: 0;
                    }
                    20% {
                        opacity: 1;
                    }
                    100% {
                        transform: translate(
                            ${Math.cos(angle) * distance}px,
                            ${Math.sin(angle) * distance}px
                        ) scale(1.5);
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
});

// Email provider functions
function openEmailProvider(provider) {
    const urls = {
        gmail: 'https://mail.google.com',
        outlook: 'https://outlook.live.com',
        yahoo: 'https://mail.yahoo.com',
        apple: 'https://www.icloud.com/mail'
    };
    
    window.open(urls[provider], '_blank');
    showAdvancedToast(`Opening ${provider.charAt(0).toUpperCase() + provider.slice(1)}...`, 'info');
}

// Copy email function
function copyEmail() {
    const email = document.getElementById('emailText').textContent;
    navigator.clipboard.writeText(email).then(() => {
        showAdvancedToast('Email copied to clipboard!', 'success');
        
        // Animate copy button
        const copyBtn = document.querySelector('.copy-btn');
        copyBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
        copyBtn.style.background = '#10b981';
        copyBtn.style.color = 'white';
        
        setTimeout(() => {
            copyBtn.innerHTML = '<i class="fas fa-copy"></i> Copy';
            copyBtn.style.background = '';
            copyBtn.style.color = '';
        }, 1500);
    });
}

// Create background particles
function createParticles() {
    const particlesContainer = document.getElementById('particles');
    const particleCount = 20;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.style.position = 'absolute';
        particle.style.width = Math.random() * 6 + 2 + 'px';
        particle.style.height = particle.style.width;
        particle.style.background = `rgba(220, 38, 38, ${Math.random() * 0.05 + 0.02})`;
        particle.style.borderRadius = '50%';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animation = `floatParticle ${Math.random() * 20 + 10}s infinite linear`;
        particle.style.opacity = '0';
        particle.style.pointerEvents = 'none';
        
        particlesContainer.appendChild(particle);
        
        // Add keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes floatParticle {
                0% { transform: translate(0, 0) rotate(0deg); opacity: 0; }
                10% { opacity: 0.5; }
                90% { opacity: 0.5; }
                100% { 
                    transform: translate(${Math.random() * 200 - 100}px, ${Math.random() * 200 - 100}px) rotate(360deg); 
                    opacity: 0; 
                }
            }
        `;
        
        document.head.appendChild(style);
    }
}

// Global showAdvancedToast function
function showAdvancedToast(message, type) {
    const toast = document.getElementById('toast');
    toast.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
        <span>${message}</span>
    `;
    toast.className = `advanced-toast ${type}`;
    toast.style.transform = 'translateX(-50%) translateY(0)';
    toast.style.opacity = '1';
    
    setTimeout(() => {
        toast.style.transform = 'translateX(-50%) translateY(-100px)';
        toast.style.opacity = '0';
    }, 3000);
}
</script>
</body>
</html>