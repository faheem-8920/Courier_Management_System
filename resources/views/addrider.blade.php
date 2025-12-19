<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rider - SwiftCourier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-red: #e53935;
            --secondary-red: #ff5252;
            --light-red: #ffebee;
            --dark-red: #c62828;
            --white: #ffffff;
            --light-gray: #f9f9f9;
            --dark-gray: #333333;
            --medium-gray: #666666;
            --success-green: #4CAF50;
            --shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --glow: 0 0 20px rgba(229, 57, 53, 0.3);
        }

        body {
            background: linear-gradient(135deg, #f9f9f9 0%, #ffecec 100%);
            color: var(--dark-gray);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            padding: 25px;
            background: linear-gradient(135deg, var(--white) 0%, #fff5f5 100%);
            border-radius: 15px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(229, 57, 53, 0.1);
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-red), var(--primary-red));
            background-size: 200% 100%;
            animation: shimmer 3s infinite linear;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .logo-icon {
            color: var(--primary-red);
            font-size: 2.5rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-red), #ff6b6b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 0.5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 1.5rem;
            color: var(--dark-gray);
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
            padding: 0 10px;
        }

        .header h1::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--primary-red), transparent);
        }

        .header p {
            color: var(--medium-gray);
            font-size: 0.95rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .progress-container {
            background: var(--white);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: var(--shadow);
            position: relative;
            border: 1px solid rgba(229, 57, 53, 0.1);
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin: 10px 0;
            padding: 0 15px;
        }

        .progress-bar:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #e0e0e0, #f0f0f0);
            transform: translateY(-50%);
            z-index: 1;
            border-radius: 2px;
        }

        .progress-line {
            position: absolute;
            top: 50%;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-red));
            transform: translateY(-50%);
            z-index: 2;
            border-radius: 2px;
            transition: var(--transition);
        }

        .progress-step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f0f0f0, #e0e0e0);
            color: var(--medium-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            position: relative;
            z-index: 3;
            transition: var(--transition);
            cursor: pointer;
            border: 3px solid var(--white);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .progress-step:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .progress-step.active {
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            color: var(--white);
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(229, 57, 53, 0.4);
            animation: glow 2s infinite alternate;
        }

        @keyframes glow {
            from { box-shadow: 0 0 15px rgba(229, 57, 53, 0.4); }
            to { box-shadow: 0 0 25px rgba(229, 57, 53, 0.6); }
        }

        .progress-step.completed {
            background: linear-gradient(135deg, var(--success-green), #66BB6A);
            color: var(--white);
        }

        .progress-label {
            position: absolute;
            top: 45px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 0.8rem;
            color: var(--medium-gray);
            font-weight: 600;
            transition: var(--transition);
        }

        .progress-step.active .progress-label {
            color: var(--primary-red);
            font-weight: 700;
        }

        .form-container {
            background: linear-gradient(135deg, var(--white) 0%, #fff9f9 100%);
            border-radius: 15px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(229, 57, 53, 0.1);
            position: relative;
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .form-tabs {
            display: flex;
            background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
            overflow: hidden;
            position: relative;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 15px 5px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .tab:last-child {
            border-right: none;
        }

        .tab::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .tab:hover::before {
            left: 100%;
        }

        .tab:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
        }

        .tab.active {
            background: rgba(255, 255, 255, 0.15);
            color: var(--white);
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--white);
            animation: tabPulse 2s infinite;
        }

        @keyframes tabPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .tab-content {
            display: none;
            padding: 30px;
            animation: fadeInContent 0.5s ease;
        }

        @keyframes fadeInContent {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .tab-content.active {
            display: block;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1 1 calc(50% - 20px);
            min-width: 250px;
        }

        .form-group.full-width {
            flex: 1 1 100%;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-gray);
            font-size: 0.95rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-label:hover {
            color: var(--primary-red);
            transform: translateX(5px);
        }

        .required:after {
            content: " *";
            color: var(--primary-red);
            animation: blink 2s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .input-container {
            position: relative;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #e8e8e8;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: var(--transition);
            background: var(--white);
            color: var(--dark-gray);
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--primary-red);
            box-shadow: var(--glow);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--medium-gray);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-input:focus + .input-icon {
            color: var(--primary-red);
            transform: translateY(-50%) rotate(360deg);
        }

        .date-reset-container {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            gap: 5px;
        }

        .date-reset-btn {
            background: linear-gradient(135deg, #f5f5f5, #e8e8e8);
            border: none;
            color: var(--medium-gray);
            cursor: pointer;
            font-size: 0.8rem;
            transition: var(--transition);
            padding: 5px 10px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .date-reset-btn:hover {
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(229, 57, 53, 0.3);
        }

        .date-reset-btn:active {
            transform: translateY(0);
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
            transition: var(--transition);
        }

        .form-textarea:focus {
            min-height: 120px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
            padding: 12px;
            border-radius: 8px;
            transition: var(--transition);
            background: linear-gradient(135deg, var(--light-red), #fff5f5);
        }

        .checkbox-group:hover {
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .checkbox-input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-red);
            cursor: pointer;
            transition: var(--transition);
        }

        .checkbox-input:hover {
            transform: scale(1.2);
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: var(--dark-gray);
            cursor: pointer;
            transition: var(--transition);
            flex: 1;
        }

        .checkbox-group:hover .checkbox-label {
            color: var(--primary-red);
        }

        .checkbox-label a {
            color: var(--primary-red);
            text-decoration: none;
            font-weight: 600;
            position: relative;
        }

        .checkbox-label a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-red);
            transition: var(--transition);
        }

        .checkbox-label a:hover::after {
            width: 100%;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: var(--transition);
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-prev {
            background: linear-gradient(135deg, #f5f5f5, #e8e8e8);
            color: var(--dark-gray);
        }

        .btn-prev:hover {
            background: linear-gradient(135deg, #e8e8e8, #ddd);
            transform: translateX(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-next {
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            color: var(--white);
        }

        .btn-next:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 20px rgba(229, 57, 53, 0.4);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--dark-red), #b71c1c);
            color: var(--white);
            width: 100%;
            font-size: 1rem;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(183, 28, 28, 0.4);
            letter-spacing: 1px;
        }

        .success-message {
            display: none;
            text-align: center;
            padding: 40px;
            background: linear-gradient(135deg, var(--white) 0%, #fff9f9 100%);
            border-radius: 15px;
            box-shadow: var(--shadow);
            max-width: 600px;
            margin: 0 auto;
            animation: popIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border: 1px solid rgba(229, 57, 53, 0.1);
            position: relative;
            overflow: hidden;
        }

        .success-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--success-green), #66BB6A);
        }

        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.5) rotate(-5deg); }
            100% { opacity: 1; transform: scale(1) rotate(0); }
        }

        .success-icon {
            font-size: 4rem;
            color: var(--success-green);
            margin-bottom: 20px;
            animation: successBounce 1s ease;
        }

        @keyframes successBounce {
            0% { transform: scale(0); }
            60% { transform: scale(1.2); }
            80% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

        .success-message h2 {
            color: var(--primary-red);
            margin-bottom: 15px;
            font-size: 2rem;
            font-weight: 700;
        }

        .success-message p {
            color: var(--medium-gray);
            font-size: 1rem;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .rider-id {
            background: linear-gradient(135deg, var(--light-red), #ffe6e6);
            color: var(--primary-red);
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: 2px;
            margin: 20px 0;
            display: inline-block;
            border: 2px dashed var(--primary-red);
            animation: idPulse 2s infinite;
        }

        @keyframes idPulse {
            0%, 100% { 
                transform: scale(1); 
                box-shadow: 0 0 10px rgba(229, 57, 53, 0.2);
            }
            50% { 
                transform: scale(1.02); 
                box-shadow: 0 0 20px rgba(229, 57, 53, 0.4);
            }
        }

        .error-message {
            color: var(--primary-red);
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
            animation: shakeError 0.5s ease;
        }

        @keyframes shakeError {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .form-input.error, .form-select.error, .form-textarea.error {
            border-color: var(--primary-red);
            background: #fff5f5;
            animation: shakeError 0.5s ease;
        }

        .validation-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.9rem;
            display: none;
            transition: var(--transition);
        }

        .valid .validation-icon.fa-check {
            color: var(--success-green);
            display: block;
            animation: checkPop 0.3s ease;
        }

        @keyframes checkPop {
            0% { transform: translateY(-50%) scale(0); }
            100% { transform: translateY(-50%) scale(1); }
        }

        .invalid .validation-icon.fa-times {
            color: var(--primary-red);
            display: block;
            animation: checkPop 0.3s ease;
        }

        .form-input.valid, .form-select.valid, .form-textarea.valid {
            border-color: var(--success-green);
            background: #f8fff8;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: var(--medium-gray);
            font-size: 0.85rem;
            opacity: 0.8;
            transition: var(--transition);
            padding: 15px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(5px);
        }

        .footer:hover {
            opacity: 1;
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.9);
        }

        @media (max-width: 768px) {
            .container {
                max-width: 95%;
            }
            
            .form-group {
                flex: 1 1 100%;
            }
            
            .progress-step {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }
            
            .progress-label {
                font-size: 0.7rem;
                top: 40px;
            }
            
            .tab {
                padding: 12px 3px;
                font-size: 0.8rem;
            }
            
            .tab-content {
                padding: 20px;
            }
            
            .btn {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (max-height: 700px) {
            .form-container {
                max-height: 80vh;
                overflow-y: auto;
            }
        }

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: var(--primary-red);
            border-radius: 50%;
            opacity: 0.1;
            animation: floatParticle 20s infinite linear;
        }

        @keyframes floatParticle {
            0% { transform: translateY(100vh) rotate(0deg); }
            100% { transform: translateY(-100px) rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Background particles -->
    <div class="particles" id="particles"></div>

    <div class="container">
        <div class="header">
            <div class="logo">
                <i class="fas fa-shipping-fast logo-icon"></i>
                <div class="logo-text">SwiftCourier</div>
            </div>
            <h1>Add New Rider to System</h1>
            <p>Complete all required fields to register a new delivery rider. All information will be securely stored in our courier management system.</p>
        </div>

        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-line" id="progressLine"></div>
                <div class="progress-step active" id="step1" data-tab="personal">
                    <span>1</span>
                    <div class="progress-label">Personal</div>
                </div>
                <div class="progress-step" id="step2" data-tab="employment">
                    <span>2</span>
                    <div class="progress-label">Employment</div>
                </div>
                <div class="progress-step" id="step3" data-tab="vehicle">
                    <span>3</span>
                    <div class="progress-label">Vehicle</div>
                </div>
                <div class="progress-step" id="step4" data-tab="review">
                    <span>4</span>
                    <div class="progress-label">Submit</div>
                </div>
            </div>
        </div>

        <div class="form-container">
            <div class="form-tabs">
                <div class="tab active" data-tab="personal">
                    <i class="fas fa-user"></i> Personal
                </div>
                <div class="tab" data-tab="employment">
                    <i class="fas fa-briefcase"></i> Employment
                </div>
                <div class="tab" data-tab="vehicle">
                    <i class="fas fa-motorcycle"></i> Vehicle
                </div>
                <div class="tab" data-tab="review">
                    <i class="fas fa-check-circle"></i> Review
                </div>
            </div>

            <form id="riderForm" method="POST" action="/saverider">
                @csrf
                <!-- Personal Details Tab -->
                <div class="tab-content active" id="personal-tab">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullName" class="form-label required">
                                <i class="fas fa-user-circle"></i> Full Name
                            </label>
                            <div class="input-container">
                                <input type="text" id="fullName" class="form-input" placeholder="Enter rider's full name" name='Fullname' autocomplete="name">
                                <i class="fas fa-user input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="nameError">Please enter a valid name (minimum 3 characters)</div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label required">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <div class="input-container">
                                <input type="email" id="email" class="form-input" placeholder="Enter rider's email" name="Email" autocomplete="email">
                                <i class="fas fa-envelope input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="emailError">Please enter a valid email address</div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone" class="form-label required">
                                <i class="fas fa-phone"></i> Phone Number
                            </label>
                            <div class="input-container">
                                <input type="tel" id="phone" class="form-input" placeholder="Enter 10-digit phone number" name="Phone" autocomplete="tel">
                                <i class="fas fa-phone input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="phoneError">Please enter a valid 10-digit phone number</div>
                        </div>
                        <div class="form-group">
                            <label for="dob" class="form-label required">
                                <i class="fas fa-birthday-cake"></i> Date of Birth
                            </label>
                            <div class="input-container">
                                <input type="date" id="dob" class="form-input" autocomplete="bday" name="DateOfBirth">
                                <i class="fas fa-calendar-alt input-icon"></i>
                                <div class="date-reset-container">
                                    <button type="button" class="date-reset-btn" id="resetDOB" title="Reset to 25 years ago">
                                        <i class="fas fa-redo"></i> Reset
                                    </button>
                                </div>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="dobError">Rider must be at least 18 years old</div>
                        </div>
                    </div>
                    
                    <div class="button-group">
                        <div></div>
                        <button type="button" class="btn btn-next next-tab" data-next="employment">
                            Continue to Employment <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Employment Details Tab -->
                <div class="tab-content" id="employment-tab">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="employeeId" class="form-label required">
                                <i class="fas fa-id-card"></i> Employee ID
                            </label>
                            <div class="input-container">
                                <input type="text" id="employeeId" class="form-input" placeholder="Auto-generated" name="EmpolyId" readonly>
                                <i class="fas fa-id-card input-icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hireDate" class="form-label required">
                                <i class="fas fa-calendar-plus"></i> Hire Date
                            </label>
                            <div class="input-container">
                                <input type="date" id="hireDate" class="form-input" name="HireDate">
                                <i class="fas fa-calendar-check input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="hireDateError">Please select a valid hire date</div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="shift" class="form-label required">
                                <i class="fas fa-clock"></i> Preferred Shift
                            </label>
                            <div class="input-container">
                                <select id="shift" class="form-select" name="WorkingShift">
                                    <option value="">Select working shift</option>
                                    <option value="morning">Morning (6:00 AM - 2:00 PM)</option>
                                    <option value="afternoon">Afternoon (2:00 PM - 10:00 PM)</option>
                                    <option value="night">Night (10:00 PM - 6:00 AM)</option>
                                    <option value="flexible">Flexible Hours</option>
                                </select>
                                <i class="fas fa-clock input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="shiftError">Please select a shift</div>
                        </div>
                        <div class="form-group">
                            <label for="zone" class="form-label required">
                                <i class="fas fa-map-marked-alt"></i> Delivery Zone
                            </label>
                            <div class="input-container">
                                <select id="zone" class="form-select" name='DeliveryZone'>
                                    <option value="">Select delivery zone</option>
                                    <option value="north">North Zone</option>
                                    <option value="south">South Zone</option>
                                    <option value="east">East Zone</option>
                                    <option value="west">West Zone</option>
                                    <option value="central">Central Zone</option>
                                </select>
                                <i class="fas fa-map-marker-alt input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="zoneError">Please select a delivery zone</div>
                        </div>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" class="btn btn-prev prev-tab" data-prev="personal">
                            <i class="fas fa-arrow-left"></i> Back to Personal
                        </button>
                        <button type="button" class="btn btn-next next-tab" data-next="vehicle">
                            Continue to Vehicle <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Vehicle Information Tab -->
                <div class="tab-content" id="vehicle-tab">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="vehicleType" class="form-label required">
                                <i class="fas fa-car"></i> Vehicle Type
                            </label>
                            <div class="input-container">
                                <select id="vehicleType" class="form-select" name="VehicleType">
                                    <option value="">Select vehicle type</option>
                                    <option value="motorcycle">Motorcycle</option>
                                    <option value="scooter">Scooter</option>
                                    <option value="car">Car</option>
                                    <option value="van">Delivery Van</option>
                                </select>
                                <i class="fas fa-motorcycle input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="vehicleTypeError">Please select vehicle type</div>
                        </div>
                        <div class="form-group">
                            <label for="plateNumber" class="form-label required">
                                <i class="fas fa-tag"></i> License Plate
                            </label>
                            <div class="input-container">
                                <input type="text" id="plateNumber" class="form-input" placeholder="Enter license plate number" name="PlateNumber">
                                <i class="fas fa-tag input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="plateError">Please enter a valid license plate number</div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="licenseNumber" class="form-label required">
                                <i class="fas fa-id-badge"></i> Driver's License
                            </label>
                            <div class="input-container">
                                <input type="text" id="licenseNumber" class="form-input" placeholder="Enter driver's license number" name="LicenseNumber">
                                <i class="fas fa-id-card input-icon"></i>
                                <i class="fas fa-check validation-icon"></i>
                                <i class="fas fa-times validation-icon"></i>
                            </div>
                            <div class="error-message" id="licenseError">Please enter a valid license number</div>
                        </div>
                        <div class="form-group">
                            <label for="vehicleModel" class="form-label">
                                <i class="fas fa-cogs"></i> Vehicle Model
                            </label>
                            <div class="input-container">
                                <input type="text" id="vehicleModel" class="form-input" placeholder="Enter vehicle model (optional)" name="VehicleModel">
                                <i class="fas fa-car input-icon"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="checkbox-group">
                        <input type="checkbox" id="vehicleInspection" class="checkbox-input" required name="VehicleInspected">
                        <label for="vehicleInspection" class="checkbox-label">
                            <i class="fas fa-check-circle"></i> I confirm that the vehicle has passed our safety inspection and meets all requirements for delivery service.
                        </label>
                    </div>
                    <div class="error-message" id="inspectionError">Please confirm vehicle inspection</div>
                    
                    <div class="button-group">
                        <button type="button" class="btn btn-prev prev-tab" data-prev="employment">
                            <i class="fas fa-arrow-left"></i> Back to Employment
                        </button>
                        <button type="button" class="btn btn-next next-tab" data-next="review">
                            Review & Submit <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Review & Submit Tab -->
                <div class="tab-content" id="review-tab">
                    <div class="form-row">
                        <div class="form-group full-width">
                            <h3 style="color: var(--primary-red); margin-bottom: 20px; font-size: 1.3rem; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-clipboard-check"></i> Review Rider Information
                            </h3>
                            <div id="reviewSummary" style="
                                background: linear-gradient(135deg, #fff9f9, #fff0f0); 
                                padding: 25px; 
                                border-radius: 10px; 
                                border-left: 5px solid var(--primary-red);
                                transition: var(--transition);
                                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                            ">
                                <!-- Summary will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="adminNotes" class="form-label">
                                <i class="fas fa-sticky-note"></i> Administrator Notes
                            </label>
                            <div class="input-container">
                                <textarea id="adminNotes" class="form-textarea" placeholder="Enter any additional notes or instructions for the rider (optional)" name="AdminNotes"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="checkbox-group">
                        <input type="checkbox" id="termsAgreement" class="checkbox-input" required name="TermsAccepted">
                        <label for="termsAgreement" class="checkbox-label">
                            <i class="fas fa-file-signature"></i> I confirm that all information provided is accurate and the rider has agreed to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
                        </label>
                    </div>
                    <div class="error-message" id="termsError">Please agree to terms and conditions</div>
                    
                    <div class="button-group">
                        <button type="button" class="btn btn-prev prev-tab" data-prev="vehicle">
                            <i class="fas fa-arrow-left"></i> Back to Vehicle
                        </button>
                        <button type="submit" id="submitForm" class="btn btn-submit">
                            <i class="fas fa-paper-plane"></i> Submit Rider Registration
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="success-message" id="successMessage">
            <i class="fas fa-check-circle success-icon"></i>
            <h2>Rider Successfully Registered!</h2>
            <p>The new rider has been added to the SwiftCourier Management System. Login credentials and welcome package have been generated.</p>
            <div class="rider-id" id="generatedId">RIDER-00245</div>
            <p>A confirmation email has been sent to the rider with login credentials and onboarding instructions.</p>
            <button type="button" id="addAnother" class="btn btn-next" style="margin-top: 20px; padding: 12px 25px;">
                <i class="fas fa-plus-circle"></i> Add Another Rider
            </button>
        </div>

        <div class="footer">
            <p>SwiftCourier &copy; 2023 | Courier Management System v3.0 | Secure Rider Registration Portal</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create background particles
            createParticles();
            
            // Generate employee ID
            const employeeId = 'RIDER-' + Math.floor(10000 + Math.random() * 90000);
            document.getElementById('employeeId').value = employeeId;
            
            // Set today as hire date
            const today = new Date();
            const todayStr = today.toISOString().split('T')[0];
            document.getElementById('hireDate').value = todayStr;
            
            // Set default DOB (25 years ago) - FIXED: Store this in a variable for reuse
            const defaultDOB = new Date();
            defaultDOB.setFullYear(defaultDOB.getFullYear() - 25);
            const defaultDOBStr = defaultDOB.toISOString().split('T')[0];
            document.getElementById('dob').value = defaultDOBStr;
            
            // Store original DOB value for reset
            let originalDOB = defaultDOBStr;
            
            // Date reset button functionality - FIXED: Properly resets to original value
            document.getElementById('resetDOB').addEventListener('click', function() {
                const dobInput = document.getElementById('dob');
                dobInput.value = originalDOB;
                
                // Add visual feedback
                this.innerHTML = '<i class="fas fa-check"></i> Reset!';
                this.style.background = 'linear-gradient(135deg, var(--success-green), #66BB6A)';
                this.style.color = 'var(--white)';
                
                // Validate the new date
                validateField(dobInput, 'dobError', isValidAge(dobInput.value));
                
                // Reset button text after 1.5 seconds
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-redo"></i> Reset';
                    this.style.background = 'linear-gradient(135deg, #f5f5f5, #e8e8e8)';
                    this.style.color = 'var(--medium-gray)';
                }, 1500);
            });
            
            // Progress bar click functionality
            const progressSteps = document.querySelectorAll('.progress-step');
            progressSteps.forEach(step => {
                step.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    const currentTab = document.querySelector('.tab-content.active').id.replace('-tab', '');
                    
                    // Only allow clicking on completed or active steps
                    if (this.classList.contains('active') || this.classList.contains('completed')) {
                        switchTab(tabId);
                        updateProgressBar(tabId);
                    }
                });
            });
            
            // Tab switching functionality
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabId = tab.getAttribute('data-tab');
                    switchTab(tabId);
                });
            });
            
            // Next button functionality
            const nextButtons = document.querySelectorAll('.next-tab');
            nextButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const currentTab = document.querySelector('.tab-content.active');
                    const nextTabId = button.getAttribute('data-next');
                    
                    // Validate current tab before proceeding
                    if (validateTab(currentTab.id)) {
                        switchTab(nextTabId);
                        updateProgressBar(nextTabId);
                    }
                });
            });
            
            // Previous button functionality
            const prevButtons = document.querySelectorAll('.prev-tab');
            prevButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const prevTabId = button.getAttribute('data-prev');
                    switchTab(prevTabId);
                    updateProgressBar(prevTabId);
                });
            });
            
            // Submit button functionality - FIXED: Properly resets form including DOB
            const submitButton = document.getElementById('submitForm');
            submitButton.addEventListener('click', () => {
                const reviewTab = document.getElementById('review-tab');
                if (validateTab(reviewTab.id)) {
                    // Generate a rider ID
                    const riderId = 'RIDER-' + Math.floor(1000 + Math.random() * 9000);
                    document.getElementById('generatedId').textContent = riderId;
                    
                    // Show success message
                    document.querySelector('.form-container').style.display = 'none';
                    document.querySelector('.progress-container').style.display = 'none';
                    document.getElementById('successMessage').style.display = 'block';
                    
                    // Create confetti effect
                    createConfetti();
                }
            });
            
            // Add Another Rider button - FIXED: Properly resets DOB to original value
            document.getElementById('addAnother').addEventListener('click', () => {
                // Reset form
                document.getElementById('riderForm').reset();
                
                // Regenerate employee ID
                const newEmployeeId = 'RIDER-' + Math.floor(10000 + Math.random() * 90000);
                document.getElementById('employeeId').value = newEmployeeId;
                
                // Set today as hire date
                document.getElementById('hireDate').value = todayStr;
                
                // FIXED: Reset DOB to original value (25 years ago)
                document.getElementById('dob').value = originalDOB;
                
                // Switch back to first tab
                switchTab('personal');
                updateProgressBar('personal');
                
                // Show form again
                document.querySelector('.form-container').style.display = 'block';
                document.querySelector('.progress-container').style.display = 'block';
                document.getElementById('successMessage').style.display = 'none';
                
                // Clear all validation states
                clearValidationStates();
                
                // Reset reset button
                document.getElementById('resetDOB').innerHTML = '<i class="fas fa-redo"></i> Reset';
                document.getElementById('resetDOB').style.background = 'linear-gradient(135deg, #f5f5f5, #e8e8e8)';
                document.getElementById('resetDOB').style.color = 'var(--medium-gray)';
            });
            
            // Real-time validation for input fields
            const inputs = document.querySelectorAll('.form-input, .form-select');
            inputs.forEach(input => {
                // Validate on blur
                input.addEventListener('blur', function() {
                    validateRealTime(this);
                });
                
                // Add interactive effect on focus
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focus');
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focus');
                    this.parentElement.style.transform = 'translateY(0)';
                });
                
                // Live validation for email
                if (input.id === 'email') {
                    input.addEventListener('input', function() {
                        validateRealTime(this);
                    });
                }
                
                // Live validation for phone (format as user types)
                if (input.id === 'phone') {
                    input.addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
                        validateRealTime(this);
                    });
                }
                
                // Live validation for name
                if (input.id === 'fullName') {
                    input.addEventListener('input', function() {
                        validateRealTime(this);
                    });
                }
                
                // Live validation for DOB
                if (input.id === 'dob') {
                    input.addEventListener('change', function() {
                        validateRealTime(this);
                    });
                }
            });
            
            // Create particles for background
            function createParticles() {
                const particlesContainer = document.getElementById('particles');
                const particleCount = 30;
                
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');
                    
                    // Random properties
                    const size = Math.random() * 10 + 5;
                    const posX = Math.random() * 100;
                    const duration = Math.random() * 30 + 20;
                    const delay = Math.random() * 10;
                    
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.left = `${posX}%`;
                    particle.style.opacity = Math.random() * 0.1 + 0.05;
                    particle.style.animationDuration = `${duration}s`;
                    particle.style.animationDelay = `${delay}s`;
                    
                    // Random color variations
                    const colors = ['#e53935', '#ff5252', '#ff8a80', '#c62828'];
                    particle.style.background = colors[Math.floor(Math.random() * colors.length)];
                    
                    particlesContainer.appendChild(particle);
                }
            }
            
            // Create confetti effect
            function createConfetti() {
                const confettiContainer = document.createElement('div');
                confettiContainer.style.position = 'fixed';
                confettiContainer.style.top = '0';
                confettiContainer.style.left = '0';
                confettiContainer.style.width = '100%';
                confettiContainer.style.height = '100%';
                confettiContainer.style.pointerEvents = 'none';
                confettiContainer.style.zIndex = '9999';
                document.body.appendChild(confettiContainer);
                
                const colors = ['#e53935', '#ff5252', '#4CAF50', '#2196F3', '#FFC107'];
                const confettiCount = 100;
                
                for (let i = 0; i < confettiCount; i++) {
                    const confetti = document.createElement('div');
                    confetti.style.position = 'absolute';
                    confetti.style.width = '10px';
                    confetti.style.height = '10px';
                    confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                    confetti.style.left = `${Math.random() * 100}%`;
                    confetti.style.top = '-10px';
                    confetti.style.opacity = '0.8';
                    confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
                    
                    confettiContainer.appendChild(confetti);
                    
                    // Animation
                    const animation = confetti.animate([
                        { transform: `translate(0, 0) rotate(0deg)`, opacity: 1 },
                        { transform: `translate(${Math.random() * 100 - 50}px, ${window.innerHeight}px) rotate(${Math.random() * 720}deg)`, opacity: 0 }
                    ], {
                        duration: Math.random() * 3000 + 2000,
                        easing: 'cubic-bezier(0.215, 0.61, 0.355, 1)'
                    });
                    
                    animation.onfinish = () => {
                        confetti.remove();
                        if (confettiContainer.children.length === 0) {
                            confettiContainer.remove();
                        }
                    };
                }
            }
            
            // Function to switch tabs
            function switchTab(tabId) {
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });
                
                // Show selected tab content
                document.getElementById(tabId + '-tab').classList.add('active');
                
                // Update active tab
                tabs.forEach(tab => {
                    tab.classList.remove('active');
                    if (tab.getAttribute('data-tab') === tabId) {
                        tab.classList.add('active');
                    }
                });
                
                // Update review summary if we're on the review tab
                if (tabId === 'review') {
                    updateReviewSummary();
                }
            }
            
            // Function to update progress bar
            function updateProgressBar(tabId) {
                const steps = document.querySelectorAll('.progress-step');
                const progressLine = document.getElementById('progressLine');
                
                steps.forEach(step => {
                    step.classList.remove('active', 'completed');
                });
                
                // Update progress line and steps
                if (tabId === 'personal') {
                    progressLine.style.width = '0%';
                    document.getElementById('step1').classList.add('active');
                } else if (tabId === 'employment') {
                    progressLine.style.width = '33.33%';
                    document.getElementById('step1').classList.add('completed');
                    document.getElementById('step2').classList.add('active');
                } else if (tabId === 'vehicle') {
                    progressLine.style.width = '66.66%';
                    document.getElementById('step1').classList.add('completed');
                    document.getElementById('step2').classList.add('completed');
                    document.getElementById('step3').classList.add('active');
                } else if (tabId === 'review') {
                    progressLine.style.width = '100%';
                    document.getElementById('step1').classList.add('completed');
                    document.getElementById('step2').classList.add('completed');
                    document.getElementById('step3').classList.add('completed');
                    document.getElementById('step4').classList.add('active');
                }
            }
            
            // Function to validate tab fields
            function validateTab(tabId) {
                let isValid = true;
                
                if (tabId === 'personal-tab') {
                    // Validate personal details
                    const name = document.getElementById('fullName');
                    const email = document.getElementById('email');
                    const phone = document.getElementById('phone');
                    const dob = document.getElementById('dob');
                    
                    if (!name.value.trim() || name.value.trim().length < 3) {
                        showError(name, 'nameError', 'Please enter a valid name (minimum 3 characters)');
                        isValid = false;
                    } else {
                        hideError(name, 'nameError');
                        markAsValid(name);
                    }
                    
                    if (!isValidEmail(email.value)) {
                        showError(email, 'emailError', 'Please enter a valid email address');
                        isValid = false;
                    } else {
                        hideError(email, 'emailError');
                        markAsValid(email);
                    }
                    
                    if (!isValidPhone(phone.value)) {
                        showError(phone, 'phoneError', 'Please enter a valid 10-digit phone number');
                        isValid = false;
                    } else {
                        hideError(phone, 'phoneError');
                        markAsValid(phone);
                    }
                    
                    if (!dob.value || !isValidAge(dob.value)) {
                        showError(dob, 'dobError', 'Rider must be at least 18 years old');
                        isValid = false;
                    } else {
                        hideError(dob, 'dobError');
                        markAsValid(dob);
                    }
                    
                } else if (tabId === 'employment-tab') {
                    // Validate employment details
                    const hireDate = document.getElementById('hireDate');
                    const shift = document.getElementById('shift');
                    const zone = document.getElementById('zone');
                    
                    if (!hireDate.value) {
                        showError(hireDate, 'hireDateError', 'Please select a valid hire date');
                        isValid = false;
                    } else {
                        hideError(hireDate, 'hireDateError');
                        markAsValid(hireDate);
                    }
                    
                    if (!shift.value) {
                        showError(shift, 'shiftError', 'Please select a shift');
                        isValid = false;
                    } else {
                        hideError(shift, 'shiftError');
                        markAsValid(shift);
                    }
                    
                    if (!zone.value) {
                        showError(zone, 'zoneError', 'Please select a delivery zone');
                        isValid = false;
                    } else {
                        hideError(zone, 'zoneError');
                        markAsValid(zone);
                    }
                    
                } else if (tabId === 'vehicle-tab') {
                    // Validate vehicle details
                    const vehicleType = document.getElementById('vehicleType');
                    const plateNumber = document.getElementById('plateNumber');
                    const licenseNumber = document.getElementById('licenseNumber');
                    const vehicleInspection = document.getElementById('vehicleInspection');
                    
                    if (!vehicleType.value) {
                        showError(vehicleType, 'vehicleTypeError', 'Please select vehicle type');
                        isValid = false;
                    } else {
                        hideError(vehicleType, 'vehicleTypeError');
                        markAsValid(vehicleType);
                    }
                    
                    if (!plateNumber.value.trim()) {
                        showError(plateNumber, 'plateError', 'Please enter license plate number');
                        isValid = false;
                    } else {
                        hideError(plateNumber, 'plateError');
                        markAsValid(plateNumber);
                    }
                    
                    if (!licenseNumber.value.trim()) {
                        showError(licenseNumber, 'licenseError', 'Please enter driver\'s license number');
                        isValid = false;
                    } else {
                        hideError(licenseNumber, 'licenseError');
                        markAsValid(licenseNumber);
                    }
                    
                    if (!vehicleInspection.checked) {
                        showError(vehicleInspection, 'inspectionError', 'Please confirm vehicle inspection');
                        isValid = false;
                    } else {
                        hideError(vehicleInspection, 'inspectionError');
                    }
                    
                } else if (tabId === 'review-tab') {
                    // Validate terms agreement
                    const termsAgreement = document.getElementById('termsAgreement');
                    
                    if (!termsAgreement.checked) {
                        showError(termsAgreement, 'termsError', 'Please agree to terms and conditions');
                        isValid = false;
                    } else {
                        hideError(termsAgreement, 'termsError');
                    }
                }
                
                return isValid;
            }
            
            // Function to validate field in real-time
            function validateRealTime(input) {
                const inputId = input.id;
                const errorId = inputId + 'Error';
                
                if (inputId === 'fullName') {
                    validateField(input, errorId, input.value.trim().length >= 3);
                } else if (inputId === 'email') {
                    validateField(input, errorId, isValidEmail(input.value));
                } else if (inputId === 'phone') {
                    validateField(input, errorId, isValidPhone(input.value));
                } else if (inputId === 'dob') {
                    validateField(input, errorId, input.value && isValidAge(input.value));
                } else if (inputId === 'hireDate') {
                    validateField(input, errorId, input.value);
                } else if (inputId === 'shift' || inputId === 'zone' || inputId === 'vehicleType') {
                    validateField(input, errorId, input.value);
                } else if (inputId === 'plateNumber' || inputId === 'licenseNumber') {
                    validateField(input, errorId, input.value.trim().length > 0);
                }
            }
            
            // Function to validate a field
            function validateField(input, errorId, isValid) {
                if (isValid) {
                    hideError(input, errorId);
                    markAsValid(input);
                } else {
                    // Only show error if the field has been touched (has value)
                    if (input.value.trim() || input.type === 'date' || input.tagName === 'SELECT') {
                        const message = getErrorMessage(input.id);
                        showError(input, errorId, message);
                        markAsInvalid(input);
                    } else {
                        hideError(input, errorId);
                        clearValidationStatus(input);
                    }
                }
            }
            
            // Function to get error message based on field ID
            function getErrorMessage(fieldId) {
                const messages = {
                    'fullName': 'Please enter a valid name (minimum 3 characters)',
                    'email': 'Please enter a valid email address',
                    'phone': 'Please enter a valid 10-digit phone number',
                    'dob': 'Rider must be at least 18 years old',
                    'hireDate': 'Please select hire date',
                    'shift': 'Please select a shift',
                    'zone': 'Please select a delivery zone',
                    'vehicleType': 'Please select vehicle type',
                    'plateNumber': 'Please enter license plate number',
                    'licenseNumber': 'Please enter driver\'s license number'
                };
                return messages[fieldId] || 'Please fill this field';
            }
            
            // Function to mark field as valid
            function markAsValid(input) {
                input.classList.remove('error', 'invalid');
                input.classList.add('valid');
            }
            
            // Function to mark field as invalid
            function markAsInvalid(input) {
                input.classList.remove('valid');
                input.classList.add('error', 'invalid');
            }
            
            // Function to clear validation status
            function clearValidationStatus(input) {
                input.classList.remove('valid', 'invalid', 'error');
            }
            
            // Function to clear all validation states
            function clearValidationStates() {
                document.querySelectorAll('.form-input, .form-select').forEach(input => {
                    clearValidationStatus(input);
                });
                
                document.querySelectorAll('.error-message').forEach(error => {
                    error.style.display = 'none';
                });
            }
            
            // Function to show error
            function showError(inputElement, errorId, message) {
                const errorElement = document.getElementById(errorId);
                errorElement.textContent = message;
                errorElement.style.display = 'block';
                
                if (inputElement.classList) {
                    inputElement.classList.add('error');
                } else {
                    // For checkbox
                    inputElement.parentElement.style.color = 'var(--primary-red)';
                }
            }
            
            // Function to hide error
            function hideError(inputElement, errorId) {
                const errorElement = document.getElementById(errorId);
                errorElement.style.display = 'none';
                
                if (inputElement.classList) {
                    inputElement.classList.remove('error');
                } else {
                    // For checkbox
                    inputElement.parentElement.style.color = '';
                }
            }
            
            // Validation helper functions
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            function isValidPhone(phone) {
                const phoneRegex = /^\d{10}$/;
                return phoneRegex.test(phone.replace(/\D/g, ''));
            }
            
            function isValidAge(dob) {
                const birthDate = new Date(dob);
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDiff = today.getMonth() - birthDate.getMonth();
                
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                
                return age >= 18;
            }
            
            // Function to update review summary
            function updateReviewSummary() {
                const summary = document.getElementById('reviewSummary');
                
                const name = document.getElementById('fullName').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const dob = document.getElementById('dob').value;
                const employeeId = document.getElementById('employeeId').value;
                const hireDate = document.getElementById('hireDate').value;
                const shift = document.getElementById('shift').options[document.getElementById('shift').selectedIndex].text;
                const zone = document.getElementById('zone').options[document.getElementById('zone').selectedIndex].text;
                const vehicleType = document.getElementById('vehicleType').options[document.getElementById('vehicleType').selectedIndex].text;
                const plateNumber = document.getElementById('plateNumber').value;
                const licenseNumber = document.getElementById('licenseNumber').value;
                
                // Calculate age from DOB
                let ageDisplay = 'Not provided';
                if (dob) {
                    const birthDate = new Date(dob);
                    const today = new Date();
                    let age = today.getFullYear() - birthDate.getFullYear();
                    const monthDiff = today.getMonth() - birthDate.getMonth();
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    ageDisplay = `${age} years`;
                }
                
                // Format hire date
                let hireDateDisplay = 'Not provided';
                if (hireDate) {
                    const date = new Date(hireDate);
                    hireDateDisplay = date.toLocaleDateString('en-US', { 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric' 
                    });
                }
                
                // Format DOB
                let dobDisplay = 'Not provided';
                if (dob) {
                    const date = new Date(dob);
                    dobDisplay = date.toLocaleDateString('en-US', { 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric' 
                    });
                }
                
                summary.innerHTML = `
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px; margin-bottom: 20px;">
                        <div><strong><i class="fas fa-user" style="color: var(--primary-red);"></i> Name:</strong> ${name || 'Not provided'}</div>
                        <div><strong><i class="fas fa-envelope" style="color: var(--primary-red);"></i> Email:</strong> ${email || 'Not provided'}</div>
                        <div><strong><i class="fas fa-phone" style="color: var(--primary-red);"></i> Phone:</strong> ${phone || 'Not provided'}</div>
                        <div><strong><i class="fas fa-birthday-cake" style="color: var(--primary-red);"></i> Age:</strong> ${ageDisplay}</div>
                        <div><strong><i class="fas fa-id-card" style="color: var(--primary-red);"></i> Employee ID:</strong> ${employeeId || 'Not provided'}</div>
                        <div><strong><i class="fas fa-calendar-plus" style="color: var(--primary-red);"></i> Hire Date:</strong> ${hireDateDisplay}</div>
                        <div><strong><i class="fas fa-clock" style="color: var(--primary-red);"></i> Shift:</strong> ${shift || 'Not provided'}</div>
                        <div><strong><i class="fas fa-map-marker-alt" style="color: var(--primary-red);"></i> Zone:</strong> ${zone || 'Not provided'}</div>
                        <div><strong><i class="fas fa-car" style="color: var(--primary-red);"></i> Vehicle:</strong> ${vehicleType || 'Not provided'}</div>
                        <div><strong><i class="fas fa-tag" style="color: var(--primary-red);"></i> Plate No.:</strong> ${plateNumber || 'Not provided'}</div>
                        <div><strong><i class="fas fa-id-badge" style="color: var(--primary-red);"></i> License No.:</strong> ${licenseNumber || 'Not provided'}</div>
                        <div><strong><i class="fas fa-calendar-alt" style="color: var(--primary-red);"></i> Date of Birth:</strong> ${dobDisplay}</div>
                    </div>
                    <div style="padding: 15px; background: rgba(255, 255, 255, 0.7); border-radius: 8px; font-size: 0.9rem; color: var(--medium-gray); border-left: 3px solid var(--primary-red);">
                        <i class="fas fa-info-circle" style="color: var(--primary-red); margin-right: 8px;"></i>
                        <strong>Important:</strong> Please review all information carefully before submission. Once submitted, the rider will receive login credentials via email.
                    </div>
                `;
            }
        });
    </script>
</body>
</html>