<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quick Courier Booking | RedTruck Logistics</title>

<!-- Lottie Player -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    /********** Essential CSS **********/
    :root {
        --primary: #FF3E41;
        --primary-dark: #D32F2F;
        --primary-light: #FFEBEE;
        --secondary: #51CFED;
        --light: #F8F2F0;
        --dark: #060315;
        --gray-50: #F9FAFB;
        --gray-100: #F3F4F6;
        --gray-200: #E5E7EB;
        --gray-300: #D1D5DB;
        --gray-400: #9CA3AF;
        --gray-500: #6B7280;
        --gray-600: #4B5563;
        --gray-700: #374151;
        --gray-800: #1F2937;
        --gray-900: #111827;
        --success: #10B981;
        --warning: #F59E0B;
        --danger: #EF4444;
        --info: #3B82F6;
        --radius: 8px;
        --radius-lg: 12px;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        color: var(--gray-800);
    }

    /* Form Container */
    .form-container {
        background: white;
        width: 100%;
        max-width: 900px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideIn {
        from { transform: translateX(-10px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    /* Header */
    .form-header {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        padding: 24px 32px;
        color: white;
        position: relative;
    }

    .form-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--secondary);
    }

    .header-content {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .header-icon {
        width: 48px;
        height: 48px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        backdrop-filter: blur(5px);
    }

    .header-text h1 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .header-text p {
        font-size: 14px;
        opacity: 0.9;
    }

    /* Progress Bar */
    .progress-container {
        margin-top: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .progress-bar {
        flex: 1;
        height: 6px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: white;
        width: 0%;
        border-radius: 3px;
        transition: width 0.3s ease;
    }

    .progress-text {
        font-size: 12px;
        font-weight: 600;
        min-width: 40px;
        text-align: right;
    }

    /* Form Body - Two Column Layout */
    .form-body {
        padding: 32px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 32px;
    }

    @media (max-width: 768px) {
        .form-body {
            grid-template-columns: 1fr;
            gap: 24px;
            padding: 24px;
        }
    }

    /* Form Sections */
    .form-section {
        animation: slideIn 0.5s ease-out;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--gray-100);
    }

    .section-title i {
        width: 36px;
        height: 36px;
        background: var(--primary-light);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 16px;
    }

    .section-title h3 {
        font-size: 16px;
        font-weight: 700;
        color: var(--gray-900);
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    label {
        display: block;
        margin-bottom: 6px;
        color: var(--gray-700);
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .required::after {
        content: '*';
        color: var(--danger);
        margin-left: 4px;
    }

    .input-wrapper {
        position: relative;
    }

    input, select, textarea {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid var(--gray-200);
        border-radius: var(--radius);
        font-size: 14px;
        font-family: inherit;
        transition: all 0.2s;
        background: white;
        color: var(--gray-900);
    }

    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(255, 62, 65, 0.1);
    }

    .input-icon {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        font-size: 16px;
        pointer-events: none;
    }

    textarea {
        min-height: 80px;
        resize: vertical;
    }

    /* Input States */
    .input-success {
        border-color: var(--success) !important;
    }

    .input-error {
        border-color: var(--danger) !important;
    }

    .error-message {
        font-size: 12px;
        color: var(--danger);
        margin-top: 4px;
        display: none;
        align-items: center;
        gap: 4px;
    }

    .error-message.show {
        display: flex;
    }

    .help-text {
        font-size: 11px;
        color: var(--gray-500);
        margin-top: 4px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* Radio Group */
    .radio-group {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 12px;
        margin: 12px 0;
    }

    .radio-option {
        position: relative;
    }

    .radio-option input {
        position: absolute;
        opacity: 0;
    }

    .radio-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 12px;
        border: 2px solid var(--gray-200);
        border-radius: var(--radius);
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
    }

    .radio-label:hover {
        border-color: var(--primary);
        background: var(--primary-light);
    }

    .radio-option input:checked + .radio-label {
        border-color: var(--primary);
        background: var(--primary-light);
    }

    .radio-label i {
        font-size: 18px;
        margin-bottom: 6px;
        color: var(--primary);
    }

    .radio-label span {
        font-size: 12px;
        font-weight: 600;
        color: var(--gray-700);
    }

    /* Form Actions */
    .form-actions {
        grid-column: span 2;
        padding-top: 24px;
        border-top: 1px solid var(--gray-200);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media (max-width: 768px) {
        .form-actions {
            grid-column: span 1;
            flex-direction: column;
            gap: 16px;
        }
    }

    .form-info {
        font-size: 12px;
        color: var(--gray-600);
        max-width: 300px;
    }

    .form-info i {
        color: var(--primary);
        margin-right: 6px;
    }

    /* Buttons */
    .btn {
        padding: 12px 28px;
        border: none;
        border-radius: var(--radius);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        box-shadow: var(--shadow);
    }

    .btn-primary:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(255, 62, 65, 0.25);
    }

    .btn-secondary {
        background: var(--gray-100);
        color: var(--gray-700);
        border: 1px solid var(--gray-300);
    }

    .btn-secondary:hover {
        background: var(--gray-200);
    }

    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    .btn-sm {
        padding: 10px 20px;
        font-size: 13px;
    }

    /* Loading Animation */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(6, 3, 21, 0.95);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        backdrop-filter: blur(8px);
    }

    .loading-overlay.active {
        display: flex;
        animation: fadeIn 0.3s ease;
    }

    .loading-content {
        text-align: center;
        color: white;
        max-width: 400px;
        padding: 40px;
    }

    .loading-content i {
        font-size: 48px;
        color: var(--secondary);
        margin-bottom: 20px;
        display: block;
    }

    .loading-content h3 {
        font-size: 20px;
        margin-bottom: 12px;
        color: white;
    }

    .loading-content p {
        font-size: 14px;
        opacity: 0.8;
        margin-bottom: 24px;
    }

    .loading-steps {
        margin: 24px 0;
    }

    .loading-step {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
        opacity: 0.6;
        transition: opacity 0.3s;
    }

    .loading-step.active {
        opacity: 1;
    }

    .step-check {
        width: 24px;
        height: 24px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .loading-step.active .step-check {
        background: var(--primary);
    }

    .step-text {
        font-size: 14px;
    }

    /* Success Message */
    .success-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.9);
        background: white;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        padding: 40px;
        text-align: center;
        max-width: 450px;
        width: 90%;
        display: none;
        z-index: 1001;
        opacity: 0;
        animation: popIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }

    @keyframes popIn {
        to {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }
    }

    .success-container.active {
        display: block;
    }

    .success-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--success), #059669);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 30px;
        color: white;
        animation: bounce 0.5s;
    }

    @keyframes bounce {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .success-container h2 {
        font-size: 20px;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 10px;
    }

    .success-container p {
        font-size: 14px;
        color: var(--gray-600);
        margin-bottom: 24px;
    }

    .tracking-box {
        background: var(--primary-light);
        padding: 16px;
        border-radius: var(--radius);
        margin: 20px 0;
        border: 2px dashed var(--primary);
    }

    .tracking-box p {
        font-size: 12px;
        color: var(--gray-600);
        margin-bottom: 6px;
    }

    .tracking-id {
        font-size: 22px;
        font-weight: 800;
        color: var(--primary);
        letter-spacing: 1px;
    }

    .success-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 24px;
    }

    /* Toast */
    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        padding: 16px;
        border-radius: var(--radius);
        box-shadow: var(--shadow-lg);
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 1002;
        transform: translateX(120%);
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border-left: 4px solid var(--primary);
    }

    .toast.show {
        transform: translateX(0);
    }

    .toast-icon {
        width: 24px;
        height: 24px;
        background: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 12px;
    }

    .toast-content {
        flex: 1;
    }

    .toast-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--gray-900);
    }

    .toast-message {
        font-size: 12px;
        color: var(--gray-600);
        margin-top: 2px;
    }

    .toast-close {
        background: none;
        border: none;
        color: var(--gray-400);
        cursor: pointer;
        font-size: 18px;
        padding: 0;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .form-header {
            padding: 20px;
        }
        
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }
        
        .form-body {
            padding: 20px;
        }
        
        .success-container {
            padding: 30px 20px;
        }
        
        .success-actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
    }
</style>
</head>
<body>

<!-- Toast -->
<div class="toast" id="toast">
    <div class="toast-icon">
        <i class="fas fa-check"></i>
    </div>
    <div class="toast-content">
        <div class="toast-title" id="toastTitle">Success!</div>
        <div class="toast-message" id="toastMessage">Action completed successfully.</div>
    </div>
    <button class="toast-close" onclick="hideToast()">
        <i class="fas fa-times"></i>
    </button>
</div>

<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-content">
        <i class="fas fa-truck-loading fa-spin"></i>
        <h3>Processing Your Request</h3>
        <p>Please wait while we schedule your courier pickup</p>
        
        <div class="loading-steps">
            <div class="loading-step active" id="step1">
                <div class="step-check">1</div>
                <div class="step-text">Validating information</div>
            </div>
            <div class="loading-step" id="step2">
                <div class="step-check">2</div>
                <div class="step-text">Calculating charges</div>
            </div>
            <div class="loading-step" id="step3">
                <div class="step-check">3</div>
                <div class="step-text">Scheduling pickup</div>
            </div>
            <div class="loading-step" id="step4">
                <div class="step-check">4</div>
                <div class="step-text">Generating tracking ID</div>
            </div>
        </div>
        
        <div class="progress-bar">
            <div class="progress-fill" id="loadingProgress" style="width: 25%"></div>
        </div>
    </div>
</div>

<!-- Success Container -->
<div class="success-container" id="successContainer">
    <div class="success-icon">
        <i class="fas fa-check"></i>
    </div>
    
    <h2>Courier Booked Successfully!</h2>
    <p>Your pickup has been scheduled and will arrive shortly</p>
    
    <div class="tracking-box">
        <p>Your Tracking Number:</p>
        <div class="tracking-id" id="trackingIdDisplay">RT-000000</div>
    </div>
    
    <p style="font-size: 13px; color: var(--gray-500);">
        <i class="fas fa-clock"></i> Estimated pickup: Within 2 hours
    </p>
    
    <div class="success-actions">
        <button class="btn btn-secondary btn-sm" onclick="printReceipt()">
            <i class="fas fa-print"></i> Print Receipt
        </button>
        <button class="btn btn-primary btn-sm" onclick="resetForm()">
            <i class="fas fa-plus"></i> New Booking
        </button>
    </div>
</div>

<!-- Main Form -->
<div class="form-container">
    <div class="form-header">
        <div class="header-content">
            <div class="header-icon">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <div class="header-text">
                <h1>Quick Courier Booking</h1>
                <p>Book a pickup in less than 2 minutes</p>
            </div>
        </div>
        
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill" id="formProgress"></div>
            </div>
            <div class="progress-text" id="progressText">0%</div>
        </div>
    </div>
    
    <form id="courierForm" action=/uploadcourier method="POST">
        @csrf
        <div class="form-body">
            <!-- Sender Information -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-user"></i>
                    <h3>Sender Details</h3>
                </div>
                
                <div class="form-group">
                    <label for="senderName" class="required">Full Name</label>
                    <div class="input-wrapper">
                        <input type="text" id="senderName" placeholder="John Doe" name='SenderName' required>
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="error-message" id="senderNameError">
                        <i class="fas fa-exclamation-circle"></i> Please enter your full name
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="senderPhone" class="required">Phone Number</label>
                    <div class="input-wrapper">
                        <input type="tel" id="senderPhone" placeholder="+1 (555) 123-4567" name='SenderPhone' required>
                        <span class="input-icon"><i class="fas fa-phone"></i></span>
                    </div>
                    <div class="error-message" id="senderPhoneError">
                        <i class="fas fa-exclamation-circle"></i> Please enter a valid phone number
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="senderEmail" class="required">Email Address</label>
                    <div class="input-wrapper">
                        <input type="email" id="senderEmail" placeholder="john@example.com" name='SenderEmail' required>
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                    </div>
                    <div class="error-message" id="senderEmailError">
                        <i class="fas fa-exclamation-circle"></i> Please enter a valid email address
                    </div>
                </div>
            </div>
            
            <!-- Receiver Information -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-user-friends"></i>
                    <h3>Receiver Details</h3>
                </div>
                
                <div class="form-group">
                    <label for="receiverName" class="required">Full Name</label>
                    <div class="input-wrapper">
                        <input type="text" id="receiverName" placeholder="Jane Smith" name='ReceiverName' required>
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="error-message" id="receiverNameError">
                        <i class="fas fa-exclamation-circle"></i> Please enter receiver's name
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="receiverPhone" class="required">Phone Number</label>
                    <div class="input-wrapper">
                        <input type="tel" id="receiverPhone" placeholder="+1 (555) 987-6543" name='ReceiverPhone' required>
                        <span class="input-icon"><i class="fas fa-phone"></i></span>
                    </div>
                    <div class="error-message" id="receiverPhoneError">
                        <i class="fas fa-exclamation-circle"></i> Please enter a valid phone number
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="receiverEmail">Email Address (Optional)</label>
                    <div class="input-wrapper">
                        <input type="email" id="receiverEmail" placeholder="jane@example.com" name="RecevierEmail" >
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                    </div>
                    <div class="error-message" id="receiverEmailError">
                        <i class="fas fa-exclamation-circle"></i> Please enter a valid email address
                    </div>
                    <div class="help-text">
                        <i class="fas fa-info-circle"></i> Leave blank if not available
                    </div>
                </div>
            </div>
            
            <!-- Pickup Information -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Pickup Information</h3>
                </div>
                
                <div class="form-group">
                    <label for="pickupAddress" class="required">Complete Address</label>
                    <div class="input-wrapper">
                        <textarea id="pickupAddress" placeholder="123 Main Street, Apt 4B&#10;New York, NY 10001" name='PickupAddress' required></textarea>
                        <span class="input-icon"><i class="fas fa-home"></i></span>
                    </div>
                    <div class="error-message" id="pickupAddressError">
                        <i class="fas fa-exclamation-circle"></i> Please enter the pickup address
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="pickupTime" class="required">Preferred Time</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="timeMorning" name="PickupTime" value="morning" required>
                            <label for="timeMorning" class="radio-label">
                                <i class="fas fa-sun"></i>
                                <span>Morning<br>(9AM-12PM)</span>
                            </label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="timeAfternoon" name="PickupTime" value="afternoon">
                            <label for="timeAfternoon" class="radio-label">
                                <i class="fas fa-cloud-sun"></i>
                                <span>Afternoon<br>(12PM-4PM)</span>
                            </label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="timeEvening" name="PickupTime" value="evening">
                            <label for="timeEvening" class="radio-label">
                                <i class="fas fa-moon"></i>
                                <span>Evening<br>(4PM-8PM)</span>
                            </label>
                        </div>
                    </div>
                    <div class="error-message" id="pickupTimeError">
                        <i class="fas fa-exclamation-circle"></i> Please select a preferred time
                    </div>
                </div>
            </div>
            
            <!-- Delivery Information -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-truck"></i>
                    <h3>Delivery Information</h3>
                </div>
                
                <div class="form-group">
                    <label for="deliveryAddress" class="required">Complete Address</label>
                    <div class="input-wrapper">
                        <textarea id="deliveryAddress" placeholder="456 Oak Avenue, Suite 300&#10;Los Angeles, CA 90001" name='DeliveryAddress' required></textarea>
                        <span class="input-icon"><i class="fas fa-building"></i></span>
                    </div>
                    <div class="error-message" id="deliveryAddressError">
                        <i class="fas fa-exclamation-circle"></i> Please enter the delivery address
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="deliveryType" class="required">Delivery Speed</label>
                    <select id="deliveryType" name="DeliveryType"required>
                        <option value="" name='DeliveryType'>Select speed</option>
                        <option value="standard">Standard (3-5 days) - $9.99</option>
                        <option value="express">Express (1-2 days) - $19.99</option>
                        <option value="overnight">Overnight - $29.99</option>
                    </select>
                    <div class="error-message" id="deliveryTypeError">
                        <i class="fas fa-exclamation-circle"></i> Please select delivery speed
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="parcelWeight" class="required">Parcel Weight (kg)</label>
                    <div class="input-wrapper">
                        <input type="number" id="parcelWeight" placeholder="2.5" min="0.1" step="0.1" name='ParcelWeight' required>
                        <span class="input-icon"><i class="fas fa-weight-hanging"></i></span>
                    </div>
                    <div class="error-message" id="parcelWeightError">
                        <i class="fas fa-exclamation-circle"></i> Please enter valid weight (min 0.1kg)
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="form-actions">
                <div class="form-info">
                    <i class="fas fa-lock"></i> Your data is secure and encrypted
                </div>
                
                <div>
                    <button type="button" class="btn btn-secondary" onclick="resetForm()">
                        <i class="fas fa-redo"></i> Clear Form
                    </button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-check-circle"></i> Book Courier Now
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Form Management
    class CourierForm {
        constructor() {
            this.form = document.getElementById('courierForm');
            this.submitBtn = document.getElementById('submitBtn');
            this.loadingOverlay = document.getElementById('loadingOverlay');
            this.successContainer = document.getElementById('successContainer');
            this.toast = document.getElementById('toast');
            this.formProgress = document.getElementById('formProgress');
            this.progressText = document.getElementById('progressText');
            this.trackingIdDisplay = document.getElementById('trackingIdDisplay');
            
            this.init();
        }
        
        init() {
            this.setupEventListeners();
            this.setupRealTimeValidation();
            this.updateFormProgress();
        }
        
        setupEventListeners() {
            this.form.addEventListener('submit', (e) => this.handleSubmit(e));
            
            // Real-time validation
            const inputs = this.form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('blur', () => this.validateField(input));
                input.addEventListener('input', () => {
                    this.clearFieldError(input);
                    if (input.type === 'email') this.validateEmailField(input);
                    this.updateFormProgress();
                });
            });
            
            // Phone number formatting
            const phoneInputs = document.querySelectorAll('input[type="tel"]');
            phoneInputs.forEach(input => {
                input.addEventListener('input', (e) => this.formatPhoneNumber(e));
            });
        }
        
        setupRealTimeValidation() {
            // Email validation for receiver email (optional)
            const receiverEmail = document.getElementById('receiverEmail');
            receiverEmail.addEventListener('blur', () => {
                if (receiverEmail.value.trim()) {
                    this.validateEmail(receiverEmail);
                }
            });
        }
        
        formatPhoneNumber(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 10) value = value.substring(0, 10);
            
            let formatted = value;
            if (value.length > 3 && value.length <= 6) {
                formatted = `(${value.substring(0,3)}) ${value.substring(3)}`;
            } else if (value.length > 6) {
                formatted = `(${value.substring(0,3)}) ${value.substring(3,6)}-${value.substring(6)}`;
            }
            
            e.target.value = formatted;
        }
        
        validateField(field) {
            const errorId = field.id + 'Error';
            const errorElement = document.getElementById(errorId);
            
            if (!field.value.trim() && field.hasAttribute('required')) {
                this.showFieldError(field, errorElement, 'This field is required');
                return false;
            }
            
            // Specific validations
            switch(field.type) {
                case 'email':
                    return this.validateEmail(field);
                case 'tel':
                    return this.validatePhone(field);
                case 'number':
                    return this.validateNumber(field);
            }
            
            if (field.id === 'deliveryType' && !field.value) {
                this.showFieldError(field, errorElement, 'Please select an option');
                return false;
            }
            
            this.showFieldSuccess(field);
            return true;
        }
        
        validateEmail(field) {
            const errorId = field.id + 'Error';
            const errorElement = document.getElementById(errorId);
            
            if (field.id === 'receiverEmail' && !field.value.trim()) {
                // Optional field - clear error if empty
                this.clearFieldError(field);
                return true;
            }
            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(field.value.trim())) {
                this.showFieldError(field, errorElement, 'Please enter a valid email address');
                return false;
            }
            
            this.showFieldSuccess(field);
            return true;
        }
        
        validateEmailField(field) {
            if (field.id === 'receiverEmail' && field.value.trim()) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailRegex.test(field.value.trim())) {
                    this.showFieldSuccess(field);
                }
            }
        }
        
        validatePhone(field) {
            const errorId = field.id + 'Error';
            const errorElement = document.getElementById(errorId);
            const digits = field.value.replace(/\D/g, '');
            
            if (digits.length < 10) {
                this.showFieldError(field, errorElement, 'Please enter a valid 10-digit phone number');
                return false;
            }
            
            this.showFieldSuccess(field);
            return true;
        }
        
        validateNumber(field) {
            const errorId = field.id + 'Error';
            const errorElement = document.getElementById(errorId);
            const value = parseFloat(field.value);
            
            if (isNaN(value) || value < parseFloat(field.min || 0)) {
                this.showFieldError(field, errorElement, `Please enter a valid number (minimum ${field.min})`);
                return false;
            }
            
            if (field.id === 'parcelWeight' && value > 50) {
                this.showFieldError(field, errorElement, 'Maximum weight is 50kg. Contact us for heavy shipments.');
                return false;
            }
            
            this.showFieldSuccess(field);
            return true;
        }
        
        showFieldError(field, errorElement, message) {
            field.classList.add('input-error');
            field.classList.remove('input-success');
            if (errorElement) {
                errorElement.querySelector('span:last-child').textContent = message;
                errorElement.classList.add('show');
            }
        }
        
        showFieldSuccess(field) {
            field.classList.remove('input-error');
            field.classList.add('input-success');
            const errorId = field.id + 'Error';
            const errorElement = document.getElementById(errorId);
            if (errorElement) {
                errorElement.classList.remove('show');
            }
        }
        
        clearFieldError(field) {
            field.classList.remove('input-error');
            const errorId = field.id + 'Error';
            const errorElement = document.getElementById(errorId);
            if (errorElement) {
                errorElement.classList.remove('show');
            }
        }
        
        updateFormProgress() {
            const requiredFields = this.form.querySelectorAll('[required]');
            const filledFields = Array.from(requiredFields).filter(field => {
                if (field.type === 'radio') {
                    return this.form.querySelector('input[name="' + field.name + '"]:checked');
                }
                return field.value.trim();
            });
            
            const progress = Math.round((filledFields.length / requiredFields.length) * 100);
            this.formProgress.style.width = `${progress}%`;
            this.progressText.textContent = `${progress}%`;
        }
        
        validateForm() {
            let isValid = true;
            const fields = this.form.querySelectorAll('input[required], select[required], textarea[required]');
            
            fields.forEach(field => {
                if (!this.validateField(field)) {
                    isValid = false;
                    // Scroll to first error
                    if (isValid === false) {
                        field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        field.focus();
                        isValid = null; // Prevent multiple scrolls
                    }
                }
            });
            
            // Validate radio group
            const pickupTime = this.form.querySelector('input[name="PickupTime"]:checked');
            if (!pickupTime) {
                document.getElementById('pickupTimeError').classList.add('show');
                isValid = false;
            }
            
            return !!isValid;
        }
        
        collectFormData() {
            const data = {
                sender: {
                    name: document.getElementById('senderName').value,
                    phone: document.getElementById('senderPhone').value,
                    email: document.getElementById('senderEmail').value
                },
                receiver: {
                    name: document.getElementById('receiverName').value,
                    phone: document.getElementById('receiverPhone').value,
                    email: document.getElementById('receiverEmail').value || 'Not provided'
                },
                pickup: {
                    address: document.getElementById('pickupAddress').value,
                    time: document.querySelector('input[name="PickupTime"]:checked').value
                },
                delivery: {
                    address: document.getElementById('deliveryAddress').value,
                    type: document.getElementById('deliveryType').value
                },
                parcel: {
                    weight: document.getElementById('parcelWeight').value
                },
                timestamp: new Date().toISOString()
            };
            
            // Generate tracking ID
            const trackingId = `RT${Date.now().toString().slice(-8)}`;
            data.trackingId = trackingId;
            
            return data;
        }
        
       async handleSubmit(e) {
    e.preventDefault(); // stop for animation first

    if (!this.validateForm()) {
        this.showToast('Please fix the errors', 'Some fields require your attention.', 'error');
        return;
    }

    // Disable button
    this.submitBtn.disabled = true;
    this.submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

    // Run animation
    await this.showLoading();

    // ✅ AFTER animation → SUBMIT FORM TO LARAVEL
    this.form.submit(); // 🔥 THIS IS THE KEY
}

        
        async showLoading() {
            this.loadingOverlay.classList.add('active');
            
            // Animate progress steps
            const steps = document.querySelectorAll('.loading-step');
            const progress = document.getElementById('loadingProgress');
            
            for (let i = 0; i < steps.length; i++) {
                steps[i].classList.add('active');
                progress.style.width = `${(i + 1) * 25}%`;
                await this.delay(800);
            }
            
            await this.delay(500);
            this.loadingOverlay.classList.remove('active');
        }
        
        showSuccess(trackingId) {
            this.trackingIdDisplay.textContent = trackingId;
            this.successContainer.classList.add('active');
        }
        
        showToast(title, message, type = 'success') {
            const toast = this.toast;
            const icon = toast.querySelector('.toast-icon i');
            const titleEl = document.getElementById('toastTitle');
            const messageEl = document.getElementById('toastMessage');
            
            // Set icon based on type
            if (type === 'error') {
                icon.className = 'fas fa-exclamation-circle';
                toast.style.borderLeftColor = 'var(--danger)';
            } else {
                icon.className = 'fas fa-check-circle';
                toast.style.borderLeftColor = 'var(--success)';
            }
            
            titleEl.textContent = title;
            messageEl.textContent = message;
            
            toast.classList.add('show');
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        }
        
        delay(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
        
        reset() {
            this.form.reset();
            
            // Clear all validation states
            const fields = this.form.querySelectorAll('input, select, textarea');
            fields.forEach(field => {
                field.classList.remove('input-success', 'input-error');
                this.clearFieldError(field);
            });
            
            // Hide success container
            this.successContainer.classList.remove('active');
            
            // Reset progress
            this.formProgress.style.width = '0%';
            this.progressText.textContent = '0%';
            
            // Show toast
            this.showToast('Form reset', 'You can now make a new booking.', 'success');
        }
    }
    
    // Global functions
    function showToast(title, message) {
        window.courierForm?.showToast(title, message);
    }
    
    function hideToast() {
        document.getElementById('toast').classList.remove('show');
    }
    
    function resetForm() {
        window.courierForm?.reset();
    }
    
    function printReceipt() {
        window.print();
    }
    
    // Initialize form when page loads
    document.addEventListener('DOMContentLoaded', () => {
        window.courierForm = new CourierForm();
    });
</script>

</body>
</html>