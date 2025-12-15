<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | SwiftCourier</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #dc2626;
            --primary-dark: #b91c1b;
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
            --error: #ef4444;
            --cyber-blue: #3b82f6;
            --cyber-purple: #8b5cf6;
            --radius: 8px;
            --radius-lg: 10px;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            --shadow-red: 0 5px 20px rgba(220, 38, 38, 0.2);
            --transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
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
        }

        /* Compact Container */
        .compact-container {
            width: 100%;
            max-width: 480px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Compact Card - Reduced padding */
        .compact-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 25px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(220, 38, 38, 0.1);
        }

        .compact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark), #ef4444, var(--primary));
            background-size: 300% 100%;
            animation: gradientFlow 3s infinite linear;
        }

        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            100% { background-position: 300% 50%; }
        }

        /* Header - Reduced margins */
        .compact-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-wrapper {
            position: relative;
            width: 60px;
            height: 60px;
            margin: 0 auto 12px;
            perspective: 1000px;
        }

        .logo {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            animation: logoFloat 4s infinite ease-in-out;
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            transform-style: preserve-3d;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0) rotateX(0deg) rotateY(0deg); }
            25% { transform: translateY(-4px) rotateX(5deg) rotateY(5deg); }
            50% { transform: translateY(0) rotateX(0deg) rotateY(10deg); }
            75% { transform: translateY(-4px) rotateX(-5deg) rotateY(5deg); }
        }

        .logo:hover {
            transform: scale(1.05) rotateY(20deg);
            box-shadow: 0 12px 35px rgba(220, 38, 38, 0.4);
        }

        .logo::after {
            content: '';
            position: absolute;
            width: 130%;
            height: 130%;
            border-radius: 20px;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.15) 0%, transparent 70%);
            animation: logoGlow 2s infinite ease-in-out;
            z-index: -1;
        }

        @keyframes logoGlow {
            0%, 100% { opacity: 0.6; transform: scale(0.9); }
            50% { opacity: 1; transform: scale(1); }
        }

        .header-title {
            font-size: 22px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 6px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 10px rgba(220, 38, 38, 0.1);
        }

        .header-subtitle {
            font-size: 13px;
            color: var(--gray-500);
            line-height: 1.4;
            max-width: 350px;
            margin: 0 auto;
        }

        /* Reduced Email Delivery Animation height */
        .email-delivery-container {
            height: 140px;
            margin: 20px 0 25px;
            position: relative;
            background: linear-gradient(135deg, #fafafa 0%, var(--gray-50) 100%);
            border-radius: 16px;
            border: 2px solid var(--gray-200);
            padding: 20px;
            overflow: hidden;
            perspective: 1200px;
            box-shadow: 
                inset 0 0 40px rgba(0, 0, 0, 0.02),
                0 8px 25px rgba(0, 0, 0, 0.05);
        }

        /* Animated Background Grid */
        .animation-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(220, 38, 38, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(220, 38, 38, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: gridMove 20s linear infinite;
            z-index: 0;
        }

        @keyframes gridMove {
            0% { background-position: 0 0; }
            100% { background-position: 40px 40px; }
        }

        /* Delivery Path */
        .delivery-path {
            position: absolute;
            top: 50%;
            left: 20px;
            right: 20px;
            height: 3px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                var(--gray-300) 5%, 
                var(--gray-300) 95%, 
                transparent 100%);
            transform: translateY(-50%);
            border-radius: 2px;
            z-index: 1;
            overflow: hidden;
        }

        .delivery-path::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.8), 
                transparent);
            animation: pathShimmer 2s infinite linear;
        }

        @keyframes pathShimmer {
            to { left: 100%; }
        }

        .delivery-progress {
            position: absolute;
            top: 50%;
            left: 20px;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, 
                var(--primary), 
                var(--primary-dark), 
                #ef4444, 
                var(--primary));
            background-size: 200% 100%;
            transform: translateY(-50%);
            transition: width 2.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 2;
            border-radius: 2px;
            box-shadow: 
                0 0 15px rgba(220, 38, 38, 0.3),
                inset 0 0 10px rgba(255, 255, 255, 0.3);
            animation: progressPulse 2s infinite;
        }

        @keyframes progressPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* Reduced Delivery Truck size */
        .delivery-truck {
            position: absolute;
            width: 65px;
            height: 35px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 10px 10px 0 0;
            left: 25px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            z-index: 3;
            box-shadow: 
                0 6px 20px rgba(220, 38, 38, 0.4),
                0 3px 10px rgba(0, 0, 0, 0.1),
                inset 0 0 0 1px rgba(255, 255, 255, 0.2);
            transition: all 0.1s linear;
            animation: truckFloat 3s infinite ease-in-out;
            transform-style: preserve-3d;
        }

        @keyframes truckFloat {
            0%, 100% { 
                transform: translateY(-50%) rotateX(0deg); 
                box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
            }
            25% { 
                transform: translateY(calc(-50% - 3px)) rotateX(2deg); 
                box-shadow: 0 10px 25px rgba(220, 38, 38, 0.5);
            }
            75% { 
                transform: translateY(calc(-50% + 2px)) rotateX(-1deg); 
                box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
            }
        }

        .truck-glow {
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.2) 0%, transparent 70%);
            border-radius: 16px;
            animation: truckGlow 2s infinite ease-in-out;
            z-index: -1;
        }

        @keyframes truckGlow {
            0%, 100% { opacity: 0.3; transform: scale(0.9); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }

        .truck-cabin {
            position: absolute;
            width: 18px;
            height: 22px;
            background: linear-gradient(135deg, #991b1b, #7f1d1d);
            border-radius: 6px 6px 0 0;
            right: -9px;
            top: -3px;
            box-shadow: 
                inset -3px 0 5px rgba(0, 0, 0, 0.3),
                0 2px 5px rgba(0, 0, 0, 0.1);
            transform-style: preserve-3d;
        }

        .truck-wheels {
            position: absolute;
            bottom: -8px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            padding: 0 10px;
            z-index: 2;
        }

        .wheel {
            width: 11px;
            height: 11px;
            background: linear-gradient(135deg, #1f2937, #111827);
            border: 2px solid #374151;
            border-radius: 50%;
            animation: wheelSpin 1s linear infinite;
            position: relative;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .wheel::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 3px;
            height: 3px;
            background: var(--gray-400);
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .wheel::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            right: 2px;
            bottom: 2px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        @keyframes wheelSpin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Reduced Mailbox size */
        .mailbox-container {
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            width: 75px;
            height: 55px;
            z-index: 4;
            perspective: 800px;
        }

        .mailbox {
            position: absolute;
            width: 60px;
            height: 40px;
            background: linear-gradient(135deg, var(--cyber-blue), #2563eb);
            border-radius: 8px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 
                0 8px 25px rgba(59, 130, 246, 0.4),
                inset 0 -3px 10px rgba(0, 0, 0, 0.2),
                0 0 20px rgba(59, 130, 246, 0.3);
            overflow: hidden;
            transform-style: preserve-3d;
            animation: mailboxGlow 3s infinite ease-in-out;
        }

        @keyframes mailboxGlow {
            0%, 100% { box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4); }
            50% { box-shadow: 0 8px 35px rgba(59, 130, 246, 0.6); }
        }

        .mailbox::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 0;
            right: 0;
            height: 12px;
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            border-radius: 4px 4px 0 0;
            box-shadow: inset 0 -2px 5px rgba(0, 0, 0, 0.2);
        }

        .mailbox::after {
            content: '';
            position: absolute;
            top: -6px;
            left: 20px;
            width: 20px;
            height: 10px;
            background: linear-gradient(135deg, #1e40af, #1e3a8a);
            border-radius: 3px 3px 0 0;
            transform: rotate(-12deg);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .mailbox-detail {
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
        }

        .mailbox-flag {
            position: absolute;
            top: -16px;
            right: 16px;
            width: 15px;
            height: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 2px 2px 0 0;
            transform-origin: bottom right;
            animation: flagWave 2.5s infinite ease-in-out;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        @keyframes flagWave {
            0%, 100% { transform: rotate(12deg) scale(1); }
            50% { transform: rotate(-8deg) scale(1.05); }
        }

        .mail-slot {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 35px;
            height: 5px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 3px;
            overflow: hidden;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.4);
        }

        .mail-slot::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.6), 
                transparent);
            animation: slotShine 2.5s infinite;
        }

        @keyframes slotShine {
            to { left: 100%; }
        }

        /* Enhanced Email Envelope */
        .email-envelope {
            position: absolute;
            width: 35px;
            height: 20px;
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 9px;
            opacity: 0;
            pointer-events: none;
            z-index: 5;
            box-shadow: 
                0 4px 15px rgba(0, 0, 0, 0.2),
                inset 0 0 0 1px rgba(220, 38, 38, 0.15),
                0 2px 5px rgba(0, 0, 0, 0.1);
            transform-style: preserve-3d;
            transition: transform 0.3s ease;
            transform-origin: center;
        }

        .envelope-flap {
            position: absolute;
            top: -6px;
            left: 0;
            width: 100%;
            height: 16px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            clip-path: polygon(0% 100%, 50% 0%, 100% 100%);
            transform-origin: top;
            border-radius: 3px 3px 0 0;
        }

        .envelope-body {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.4));
            border-radius: 5px;
            overflow: hidden;
        }

        .envelope-seal {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 10px;
            height: 10px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 5px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Flying Trail Effect */
        .trail-particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 4;
        }

        /* Enhanced Email Input - Reduced height */
        .email-input-container {
            margin-bottom: 20px;
            position: relative;
        }

        .input-wrapper {
            position: relative;
        }

        .email-input {
            width: 100%;
            padding: 16px 50px 16px 18px;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius);
            font-size: 15px;
            font-weight: 500;
            color: #1f2937;
            background: var(--white);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 54px;
            letter-spacing: 0.3px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .email-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 
                0 0 0 4px rgba(220, 38, 38, 0.15),
                0 6px 20px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            background: linear-gradient(135deg, #ffffff, #fefefe);
        }

        .email-input.valid {
            border-color: var(--success);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2310b981'%3E%3Cpath d='M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 20px;
        }

        .email-input.invalid {
            border-color: var(--error);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ef4444'%3E%3Cpath d='M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 20px;
        }

        .input-icon {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 18px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            pointer-events: none;
        }

        .email-input:focus ~ .input-icon {
            color: var(--primary);
            transform: translateY(-50%) scale(1.2) rotate(5deg);
            text-shadow: 0 0 10px rgba(220, 38, 38, 0.3);
        }

        /* Enhanced Submit Button - Reduced height */
        .submit-btn-container {
            position: relative;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: var(--radius);
            background: linear-gradient(135deg, var(--primary), var(--primary-dark), #ef4444);
            background-size: 200% 100%;
            box-shadow: 
                0 8px 25px rgba(220, 38, 38, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3),
                0 0 20px rgba(220, 38, 38, 0.2);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: gradientShift 3s infinite ease-in-out;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .submit-btn-container:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 12px 35px rgba(220, 38, 38, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3),
                0 0 30px rgba(220, 38, 38, 0.3);
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: transparent;
            color: white;
            border: none;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            position: relative;
            z-index: 2;
            letter-spacing: 0.8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            height: 52px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .submit-btn:disabled {
            cursor: not-allowed;
            opacity: 0.7;
        }

        .btn-glow {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.5) 0%, transparent 70%);
            opacity: 0;
            animation: btnGlow 2s infinite ease-in-out;
            pointer-events: none;
        }

        @keyframes btnGlow {
            0%, 100% { opacity: 0; transform: scale(0.8); }
            50% { opacity: 0.25; transform: scale(1.2); }
        }

        .loading-spinner {
            display: none;
            width: 18px;
            height: 18px;
            position: relative;
        }

        .loading-spinner::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Resend Timer Section */
        .resend-timer-container {
            display: none;
            text-align: center;
            margin: 20px 0;
            padding: 15px;
            background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);
            border-radius: var(--radius);
            border: 1px solid var(--gray-200);
            animation: fadeIn 0.5s ease;
        }

        .resend-timer-container.active {
            display: block;
        }

        .timer-text {
            font-size: 14px;
            color: var(--gray-600);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .timer-count {
            font-weight: 700;
            color: var(--primary);
            font-size: 16px;
            background: var(--primary-light);
            padding: 4px 10px;
            border-radius: 6px;
            min-width: 40px;
            display: inline-block;
            text-align: center;
            border: 1px solid rgba(220, 38, 38, 0.2);
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .resend-btn {
            background: linear-gradient(135deg, var(--cyber-blue), #2563eb);
            color: white;
            border: none;
            border-radius: var(--radius);
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
        }

        .resend-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .resend-btn:disabled {
            background: linear-gradient(135deg, var(--gray-400), var(--gray-500));
            cursor: not-allowed;
            opacity: 0.7;
        }

        /* Success Popup */
        .success-popup {
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
            transition: opacity 0.3s ease;
        }

        .success-popup.active {
            display: flex;
            animation: fadeIn 0.3s ease forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .popup-content {
            background: var(--white);
            border-radius: 20px;
            padding: 35px;
            text-align: center;
            max-width: 420px;
            width: 90%;
            animation: popupScale 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            transform-origin: center;
            box-shadow: 
                0 25px 70px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(220, 38, 38, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(220, 38, 38, 0.1);
            position: relative;
            overflow: hidden;
        }

        @keyframes popupScale {
            from { transform: scale(0.9) translateY(20px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }

        .popup-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--success), #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            margin: 0 auto 20px;
            position: relative;
            animation: iconBounce 0.6s 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275) both;
            box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
        }

        .popup-icon::after {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            animation: ripple 1.5s infinite;
            z-index: -1;
        }

        @keyframes ripple {
            0% { transform: scale(0.8); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        .popup-title {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .popup-message {
            font-size: 15px;
            color: var(--gray-600);
            font-weight: 500;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .popup-email {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-light), #fee2e2);
            color: var(--primary-dark);
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 600;
            margin: 15px 0;
            font-size: 14px;
            border: 1px solid rgba(220, 38, 38, 0.2);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.15);
            position: relative;
            overflow: hidden;
            animation: emailPulse 2s infinite;
        }

        @keyframes emailPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .popup-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--radius);
            padding: 14px 28px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            box-shadow: 
                0 8px 25px rgba(220, 38, 38, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .popup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 12px 35px rgba(220, 38, 38, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .popup-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .popup-btn:hover::after {
            opacity: 1;
        }

        /* Footer Links - Reduced margin */
        .footer-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--gray-200);
        }

        .footer-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: 6px;
            position: relative;
            overflow: hidden;
        }

        .footer-link:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.1);
        }

        /* Responsive */
        @media (max-width: 520px) {
            .compact-container { max-width: 100%; }
            .compact-card { padding: 20px; }
            .header-title { font-size: 20px; }
            .email-delivery-container { 
                height: 120px; 
                padding: 15px; 
                margin: 15px 0 20px;
            }
            .mailbox-container {
                right: 20px;
                width: 65px;
            }
            .popup-content { padding: 25px; }
            .footer-links { flex-direction: column; gap: 12px; align-items: center; }
            .resend-timer-container {
                padding: 12px;
                margin: 15px 0;
            }
        }
    </style>
</head>
<body>

<!-- Success Popup -->
<div class="success-popup" id="successPopup">
    <div class="popup-content">
        <div class="popup-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="popup-title">Reset Link Sent!</div>
        <div class="popup-message">We've sent a password reset link to:</div>
        <div class="popup-email" id="popupEmail"></div>
        <div class="popup-message" style="font-size:14px;">Check your inbox and follow the instructions to reset your password</div>
        <button class="popup-btn" onclick="closePopup()">
            <i class="fas fa-check-circle"></i> Got It
        </button>
    </div>
</div>

<!-- Main Container -->
<div class="compact-container">
    <div class="compact-card">
        <!-- Header -->
        <div class="compact-header">
            <div class="logo-wrapper">
                <div class="logo" onclick="animateLogo()">
                    <i class="fas fa-truck-fast"></i>
                </div>
            </div>
            <h1 class="header-title">Forgot Password?</h1>
            <p class="header-subtitle">Enter your email to receive a password reset link delivered straight to your inbox</p>
        </div>

        <!-- Enhanced Email Delivery Animation -->
        <div class="email-delivery-container">
            <div class="animation-grid"></div>
            <div class="delivery-path"></div>
            <div class="delivery-progress" id="deliveryProgress"></div>
            
            <div class="delivery-truck" id="deliveryTruck">
                <div class="truck-glow"></div>
                <i class="fas fa-envelope"></i>
                <div class="truck-cabin"></div>
                <div class="truck-wheels">
                    <div class="wheel"></div>
                    <div class="wheel"></div>
                </div>
            </div>
            
            <!-- Enhanced Mailbox -->
            <div class="mailbox-container">
                <div class="mailbox">
                    <div class="mailbox-detail"></div>
                    <div class="mailbox-flag"></div>
                    <div class="mail-slot"></div>
                </div>
            </div>
        </div>

        <!-- Resend Timer Section -->
        <div class="resend-timer-container" id="resendTimerContainer">
            <div class="timer-text">
                <i class="fas fa-clock"></i>
                Resend email in <span class="timer-count" id="countdown">60</span> seconds
            </div>
            <button class="resend-btn" id="resendBtn" disabled>
                <i class="fas fa-redo"></i> Resend Email
            </button>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}" id="passwordResetForm">
            @csrf
            
            <div class="email-input-container">
                <div class="input-wrapper">
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        class="email-input"
                        value="{{ old('email') }}"
                        required 
                        autofocus 
                        autocomplete="email"
                        placeholder="Enter your email address"
                    >
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>

            <div class="submit-btn-container">
                <div class="btn-glow"></div>
                <button type="submit" class="submit-btn" id="submitBtn">
                    <span id="btnText">Send Reset Link</span>
                    <div class="loading-spinner" id="loadingSpinner"></div>
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="footer-links">
            <a href="{{ route('login') }}" class="footer-link">
                <i class="fas fa-arrow-left"></i> Back to Login
            </a>
            <a href="{{ route('register') }}" class="footer-link">
                <i class="fas fa-user-plus"></i> Create Account
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const passwordResetForm = document.getElementById('passwordResetForm');
    const emailInput = document.getElementById('email');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const deliveryTruck = document.getElementById('deliveryTruck');
    const deliveryProgress = document.getElementById('deliveryProgress');
    const successPopup = document.getElementById('successPopup');
    const popupEmail = document.getElementById('popupEmail');
    const resendTimerContainer = document.getElementById('resendTimerContainer');
    const countdownElement = document.getElementById('countdown');
    const resendBtn = document.getElementById('resendBtn');
    const mailbox = document.querySelector('.mailbox');
    const mailboxFlag = document.querySelector('.mailbox-flag');
    
    // Variables
    let isSubmitting = false;
    let truckPosition = 25;
    let animationFrameId = null;
    let trailParticles = [];
    let envelopes = [];
    let countdownTimer = null;
    let countdownTime = 60; // 60 seconds
    let emailSent = false;
    
    // Initialize
    loadingSpinner.style.display = 'none';
    createInitialParticles();
    
    // Email input events
    emailInput.addEventListener('input', function() {
        validateEmail();
        updateTruckPosition();
        animateMailboxOnInput();
        createInputParticles();
    });
    
    emailInput.addEventListener('focus', function() {
        animateTruckOnFocus();
        mailboxFlag.style.animation = 'flagWave 1s infinite ease-in-out';
    });
    
    emailInput.addEventListener('blur', function() {
        mailboxFlag.style.animation = 'flagWave 2.5s infinite ease-in-out';
    });
    
    // Resend button click
    resendBtn.addEventListener('click', function() {
        if (!resendBtn.disabled && validateEmail()) {
            startResendProcess();
        }
    });
    
    // Form submission
    passwordResetForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (isSubmitting) return;
        
        if (!validateEmail()) {
            showError('Please enter a valid email address');
            shakeTruck();
            return;
        }
        
        await sendResetEmail();
    });
    
    // Send reset email function
    async function sendResetEmail() {
        if (isSubmitting) return;
        
        isSubmitting = true;
        submitBtn.disabled = true;
        btnText.textContent = 'Sending...';
        loadingSpinner.style.display = 'block';
        
        // Start advanced delivery animation
        startAdvancedDeliveryAnimation(emailInput.value);
        
        try {
            // Submit form data
            const formData = new FormData(passwordResetForm);
            const response = await fetch(passwordResetForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
            });
            
            const data = await response.json();
            
            if (response.ok) {
                // Success
                showSuccessPopup(emailInput.value);
                emailSent = true;
                
                // Complete animation after delay
                setTimeout(() => {
                    completeDeliveryAnimation();
                    submitBtn.style.background = 'linear-gradient(135deg, var(--success), #059669)';
                    btnText.textContent = 'Sent!';
                    
                    // Show resend timer
                    startResendTimer();
                    
                    // Reset after 3 seconds
                    setTimeout(() => {
                        submitBtn.style.background = 'transparent';
                        btnText.textContent = 'Send Reset Link';
                    }, 3000);
                }, 3500);
                
            } else {
                // Error handling
                const errors = data.errors || {};
                const errorMessage = errors.email ? errors.email[0] : 'Failed to send reset link';
                showError(errorMessage);
                resetFormState();
                shakeTruck();
            }
            
        } catch (error) {
            showError('Network error. Please try again.');
            resetFormState();
            shakeTruck();
        }
    }
    
    // Start resend timer
    function startResendTimer() {
        resendTimerContainer.classList.add('active');
        resendBtn.disabled = true;
        countdownTime = 60;
        countdownElement.textContent = countdownTime;
        
        clearInterval(countdownTimer);
        
        countdownTimer = setInterval(() => {
            countdownTime--;
            countdownElement.textContent = countdownTime;
            
            if (countdownTime <= 0) {
                clearInterval(countdownTimer);
                resendBtn.disabled = false;
                resendBtn.innerHTML = '<i class="fas fa-redo"></i> Resend Email Now';
                countdownElement.textContent = '0';
            }
        }, 1000);
    }
    
    // Start resend process
    async function startResendProcess() {
        // Reset timer UI
        resendBtn.disabled = true;
        resendBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Resending...';
        
        // Show sending animation
        startAdvancedDeliveryAnimation(emailInput.value);
        
        try {
            // Submit form data again
            const formData = new FormData(passwordResetForm);
            const response = await fetch(passwordResetForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
            });
            
            const data = await response.json();
            
            if (response.ok) {
                // Success
                showSuccessPopup(emailInput.value);
                
                // Complete animation
                setTimeout(() => {
                    completeDeliveryAnimation();
                    
                    // Reset resend button and restart timer
                    resendBtn.innerHTML = '<i class="fas fa-redo"></i> Resend Email';
                    startResendTimer();
                    
                    // Show success message
                    showToast('Reset link resent successfully!');
                }, 3500);
                
            } else {
                // Error handling
                const errors = data.errors || {};
                const errorMessage = errors.email ? errors.email[0] : 'Failed to resend reset link';
                showError(errorMessage);
                resetResendButton();
            }
            
        } catch (error) {
            showError('Network error. Please try again.');
            resetResendButton();
        }
    }
    
    // Reset resend button
    function resetResendButton() {
        resendBtn.disabled = false;
        resendBtn.innerHTML = '<i class="fas fa-redo"></i> Resend Email Now';
    }
    
    // Create initial floating particles
    function createInitialParticles() {
        const container = document.querySelector('.email-delivery-container');
        for (let i = 0; i < 12; i++) {
            setTimeout(() => {
                createFloatingParticle(container);
            }, i * 200);
        }
    }
    
    // Create floating particle
    function createFloatingParticle(container) {
        const particle = document.createElement('div');
        particle.className = 'trail-particle';
        
        const size = Math.random() * 5 + 2;
        const startX = Math.random() * (container.offsetWidth - 40) + 20;
        const startY = Math.random() * (container.offsetHeight - 40) + 20;
        const color = Math.random() > 0.5 ? 'rgba(220, 38, 38, 0.4)' : 'rgba(59, 130, 246, 0.4)';
        
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.background = color;
        particle.style.left = `${startX}px`;
        particle.style.top = `${startY}px`;
        particle.style.boxShadow = `0 0 ${size}px ${color}`;
        
        container.appendChild(particle);
        trailParticles.push(particle);
        
        // Animate particle
        animateFloatingParticle(particle, container);
    }
    
    // Animate floating particle
    function animateFloatingParticle(particle, container) {
        let x = parseFloat(particle.style.left);
        let y = parseFloat(particle.style.top);
        let xSpeed = (Math.random() - 0.5) * 0.5;
        let ySpeed = (Math.random() - 0.5) * 0.5;
        
        function move() {
            x += xSpeed;
            y += ySpeed;
            
            // Bounce off walls
            if (x <= 10 || x >= container.offsetWidth - 20) xSpeed *= -1;
            if (y <= 10 || y >= container.offsetHeight - 20) ySpeed *= -1;
            
            particle.style.left = `${x}px`;
            particle.style.top = `${y}px`;
            
            if (particle.parentNode) {
                requestAnimationFrame(move);
            }
        }
        
        move();
    }
    
    // Create input particles
    function createInputParticles() {
        if (emailInput.value.length % 3 === 0) {
            const container = document.querySelector('.email-delivery-container');
            const particle = document.createElement('div');
            particle.className = 'trail-particle';
            
            const size = Math.random() * 3 + 1;
            const x = truckPosition + 35;
            const y = container.offsetHeight / 2 + (Math.random() - 0.5) * 15;
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.background = 'rgba(220, 38, 38, 0.6)';
            particle.style.left = `${x}px`;
            particle.style.top = `${y}px`;
            particle.style.boxShadow = `0 0 ${size * 2}px rgba(220, 38, 38, 0.4)`;
            
            container.appendChild(particle);
            trailParticles.push(particle);
            
            // Remove after animation
            setTimeout(() => {
                if (particle.parentNode) {
                    particle.remove();
                    trailParticles = trailParticles.filter(p => p !== particle);
                }
            }, 1000);
        }
    }
    
    // Email validation
    function validateEmail() {
        const email = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!email) {
            emailInput.classList.remove('valid', 'invalid');
            return false;
        }
        
        const isValid = emailRegex.test(email);
        
        if (isValid) {
            emailInput.classList.add('valid');
            emailInput.classList.remove('invalid');
        } else {
            emailInput.classList.add('invalid');
            emailInput.classList.remove('valid');
        }
        
        return isValid;
    }
    
    // Update truck position based on email input
    function updateTruckPosition() {
        const email = emailInput.value.trim();
        if (!email) {
            truckPosition = 25;
            deliveryTruck.style.left = '25px';
            deliveryProgress.style.width = '0%';
            return;
        }
        
        const emailLength = email.length;
        const maxLength = 50;
        const progress = Math.min((emailLength / maxLength) * 100, 100);
        const container = document.querySelector('.email-delivery-container');
        const maxPosition = container.offsetWidth - 100; // Account for truck width and margin
        
        truckPosition = 25 + (progress / 100) * (maxPosition - 25);
        deliveryTruck.style.left = `${truckPosition}px`;
        deliveryProgress.style.width = `${progress}%`;
        
        // Create speed lines when typing fast
        if (emailLength > 10 && emailLength % 5 === 0) {
            createSpeedLines();
        }
    }
    
    // Create speed lines
    function createSpeedLines() {
        const container = document.querySelector('.email-delivery-container');
        for (let i = 0; i < 3; i++) {
            setTimeout(() => {
                const line = document.createElement('div');
                line.className = 'trail-particle';
                
                line.style.width = '12px';
                line.style.height = '1px';
                line.style.background = 'rgba(220, 38, 38, 0.4)';
                line.style.left = `${truckPosition - 8}px`;
                line.style.top = `${container.offsetHeight / 2 + (Math.random() - 0.5) * 15}px`;
                line.style.opacity = '0.6';
                line.style.transform = 'rotate(15deg)';
                
                container.appendChild(line);
                
                // Animate line
                line.animate([
                    { left: `${truckPosition - 8}px`, opacity: 0.6 },
                    { left: `${truckPosition - 30}px`, opacity: 0 }
                ], {
                    duration: 300,
                    easing: 'linear'
                });
                
                setTimeout(() => {
                    if (line.parentNode) line.remove();
                }, 300);
            }, i * 50);
        }
    }
    
    // Animate truck on focus
    function animateTruckOnFocus() {
        deliveryTruck.style.animation = 'none';
        void deliveryTruck.offsetWidth;
        deliveryTruck.style.animation = 'truckFloat 3s infinite ease-in-out';
        
        // Add bounce effect
        deliveryTruck.animate([
            { transform: 'translateY(-50%) scale(1)' },
            { transform: 'translateY(-53%) scale(1.05)' },
            { transform: 'translateY(-50%) scale(1)' }
        ], {
            duration: 300,
            easing: 'ease-in-out'
        });
    }
    
    // Animate mailbox on input
    function animateMailboxOnInput() {
        if (emailInput.value.length > 0) {
            mailbox.animate([
                { transform: 'translate(-50%, -50%) scale(1)' },
                { transform: 'translate(-50%, -50%) scale(1.06)' },
                { transform: 'translate(-50%, -50%) scale(1)' }
            ], {
                duration: 200,
                easing: 'ease-out'
            });
        }
    }
    
    // Start advanced delivery animation
    function startAdvancedDeliveryAnimation(email) {
        const container = document.querySelector('.email-delivery-container');
        const containerWidth = container.offsetWidth;
        const maxPosition = containerWidth - 100;
        
        // Clear any existing animations
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
        }
        
        // Reset progress
        deliveryProgress.style.width = '0%';
        deliveryTruck.style.left = '25px';
        
        // Create enhanced envelope
        const envelope = createEnhancedEnvelope();
        
        // Start animation sequence
        let startTime = null;
        const duration = 3000; // 3 seconds total
        
        function animate(timestamp) {
            if (!startTime) startTime = timestamp;
            const elapsed = timestamp - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Truck animation (cubic bezier for smooth acceleration/deceleration)
            const truckProgress = cubicBezier(progress, 0.34, 1.56, 0.64, 1);
            const truckPos = 25 + (truckProgress * 0.7) * (maxPosition - 25);
            deliveryTruck.style.left = `${truckPos}px`;
            deliveryProgress.style.width = `${truckProgress * 70}%`;
            
            // Envelope animation (starts at 1 second)
            if (progress > 0.3) {
                const envelopeProgress = Math.max(0, (progress - 0.3) / 0.6);
                const envelopeEase = cubicBezier(envelopeProgress, 0.68, -0.55, 0.265, 1.55);
                
                if (envelopeProgress < 1) {
                    const envelopeX = truckPos + (envelopeEase * (maxPosition - truckPos - 35));
                    const envelopeY = container.offsetHeight / 2 - (Math.sin(envelopeEase * Math.PI) * 40);
                    const rotation = envelopeEase * 45;
                    
                    envelope.style.left = `${envelopeX}px`;
                    envelope.style.top = `${envelopeY}px`;
                    envelope.style.opacity = '1';
                    envelope.style.transform = `rotate(${rotation}deg) scale(${0.8 + envelopeEase * 0.4})`;
                    
                    // Animate envelope flap
                    const flap = envelope.querySelector('.envelope-flap');
                    const flapAngle = 30 + envelopeEase * 45;
                    flap.style.transform = `rotateX(${flapAngle}deg)`;
                    
                    // Create trail particles
                    if (elapsed % 50 < 10) {
                        createEnvelopeTrail(envelopeX, envelopeY);
                    }
                } else {
                    // Envelope delivered
                    envelope.style.left = `${maxPosition - 50}px`;
                    envelope.style.top = `${container.offsetHeight - 50}px`;
                    envelope.style.opacity = '0';
                    envelope.style.transform = 'rotate(0deg) scale(0.5)';
                    
                    // Mailbox receive animation
                    mailbox.animate([
                        { transform: 'translate(-50%, -50%) scale(1)', boxShadow: '0 8px 25px rgba(59, 130, 246, 0.4)' },
                        { transform: 'translate(-50%, -50%) scale(1.12)', boxShadow: '0 12px 35px rgba(59, 130, 246, 0.6)' },
                        { transform: 'translate(-50%, -50%) scale(1)', boxShadow: '0 8px 25px rgba(59, 130, 246, 0.4)' }
                    ], {
                        duration: 500,
                        easing: 'ease-out'
                    });
                    
                    // Create mailbox particles
                    createMailboxParticles();
                }
            }
            
            // Truck continues after envelope delivery
            if (progress > 0.9) {
                const finalProgress = (progress - 0.9) / 0.1;
                const truckFinalPos = 25 + (0.7 + finalProgress * 0.3) * (maxPosition - 25);
                deliveryTruck.style.left = `${truckFinalPos}px`;
                deliveryProgress.style.width = `${(0.7 + finalProgress * 0.3) * 100}%`;
            }
            
            if (progress < 1) {
                animationFrameId = requestAnimationFrame(animate);
            } else {
                // Animation complete
                createCelebrationEffects();
            }
        }
        
        animationFrameId = requestAnimationFrame(animate);
    }
    
    // Cubic bezier easing function
    function cubicBezier(t, p1x, p1y, p2x, p2y) {
        const cx = 3 * p1x;
        const bx = 3 * (p2x - p1x) - cx;
        const ax = 1 - cx - bx;
        
        const cy = 3 * p1y;
        const by = 3 * (p2y - p1y) - cy;
        const ay = 1 - cy - by;
        
        function sampleCurveX(t) {
            return ((ax * t + bx) * t + cx) * t;
        }
        
        function sampleCurveY(t) {
            return ((ay * t + by) * t + cy) * t;
        }
        
        function sampleCurveDerivativeX(t) {
            return (3 * ax * t + 2 * bx) * t + cx;
        }
        
        // Newton's method to find t for given x
        function solveCurveX(x) {
            let t = x;
            for (let i = 0; i < 8; i++) {
                const x2 = sampleCurveX(t) - x;
                if (Math.abs(x2) < 1e-6) return t;
                const d2 = sampleCurveDerivativeX(t);
                if (Math.abs(d2) < 1e-6) break;
                t = t - x2 / d2;
            }
            return t;
        }
        
        const t2 = solveCurveX(t);
        return sampleCurveY(t2);
    }
    
    // Create enhanced envelope
    function createEnhancedEnvelope() {
        const container = document.querySelector('.email-delivery-container');
        const envelope = document.createElement('div');
        envelope.className = 'email-envelope';
        envelope.innerHTML = `
            <div class="envelope-flap"></div>
            <div class="envelope-body"></div>
            <div class="envelope-seal">
                <i class="fas fa-bolt"></i>
            </div>
            <i class="fas fa-envelope-open-text"></i>
        `;
        
        envelope.style.left = `${truckPosition}px`;
        envelope.style.top = '50%';
        envelope.style.opacity = '0';
        envelope.style.transform = 'rotate(0deg) scale(0.8)';
        
        container.appendChild(envelope);
        envelopes.push(envelope);
        
        return envelope;
    }
    
    // Create envelope trail particles
    function createEnvelopeTrail(x, y) {
        const container = document.querySelector('.email-delivery-container');
        const particle = document.createElement('div');
        particle.className = 'trail-particle';
        
        const size = Math.random() * 3 + 2;
        const colors = ['rgba(220, 38, 38, 0.6)', 'rgba(59, 130, 246, 0.6)', 'rgba(255, 255, 255, 0.8)'];
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.background = color;
        particle.style.left = `${x}px`;
        particle.style.top = `${y}px`;
        particle.style.boxShadow = `0 0 ${size * 2}px ${color}`;
        particle.style.borderRadius = '50%';
        
        container.appendChild(particle);
        trailParticles.push(particle);
        
        // Animate particle
        particle.animate([
            { 
                transform: 'scale(1) translate(0, 0)', 
                opacity: 1 
            },
            { 
                transform: `scale(0) translate(${Math.random() * 15 - 7}px, ${Math.random() * 15 - 7}px)`, 
                opacity: 0 
            }
        ], {
            duration: 800,
            easing: 'ease-out'
        });
        
        setTimeout(() => {
            if (particle.parentNode) {
                particle.remove();
                trailParticles = trailParticles.filter(p => p !== particle);
            }
        }, 800);
    }
    
    // Create mailbox particles
    function createMailboxParticles() {
        const container = document.querySelector('.email-delivery-container');
        const mailboxRect = mailbox.getBoundingClientRect();
        const containerRect = container.getBoundingClientRect();
        const mailboxX = mailboxRect.left - containerRect.left + mailbox.offsetWidth / 2;
        const mailboxY = mailboxRect.top - containerRect.top + mailbox.offsetHeight / 2;
        
        for (let i = 0; i < 15; i++) {
            setTimeout(() => {
                const particle = document.createElement('div');
                particle.className = 'trail-particle';
                
                const size = Math.random() * 6 + 3;
                const colors = ['#3b82f6', '#2563eb', '#1d4ed8', '#60a5fa'];
                const color = colors[Math.floor(Math.random() * colors.length)];
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.background = color;
                particle.style.left = `${mailboxX}px`;
                particle.style.top = `${mailboxY}px`;
                particle.style.boxShadow = `0 0 ${size}px ${color}`;
                particle.style.borderRadius = '50%';
                
                container.appendChild(particle);
                
                // Animate particle outward
                const angle = Math.random() * Math.PI * 2;
                const distance = Math.random() * 50 + 30;
                
                particle.animate([
                    { 
                        transform: 'scale(0) translate(0, 0)', 
                        opacity: 1 
                    },
                    { 
                        transform: `scale(1) translate(${Math.cos(angle) * distance}px, ${Math.sin(angle) * distance}px)`, 
                        opacity: 0 
                    }
                ], {
                    duration: 1000,
                    easing: 'ease-out'
                });
                
                setTimeout(() => {
                    if (particle.parentNode) particle.remove();
                }, 1000);
            }, i * 50);
        }
    }
    
    // Create celebration effects
    function createCelebrationEffects() {
        const container = document.querySelector('.email-delivery-container');
        
        // Create floating text effect
        const text = document.createElement('div');
        text.textContent = 'Email Sent!';
        text.style.position = 'absolute';
        text.style.left = '50%';
        text.style.top = '50%';
        text.style.transform = 'translate(-50%, -50%)';
        text.style.color = 'var(--success)';
        text.style.fontWeight = 'bold';
        text.style.fontSize = '16px';
        text.style.opacity = '0';
        text.style.zIndex = '10';
        text.style.textShadow = '0 2px 10px rgba(16, 185, 129, 0.3)';
        
        container.appendChild(text);
        
        // Animate text
        text.animate([
            { opacity: 0, transform: 'translate(-50%, -50%) scale(0.5)' },
            { opacity: 1, transform: 'translate(-50%, -50%) scale(1.15)' },
            { opacity: 1, transform: 'translate(-50%, -50%) scale(1)' },
            { opacity: 0, transform: 'translate(-50%, -50%) scale(1) translateY(-15px)' }
        ], {
            duration: 2000,
            easing: 'ease-out'
        });
        
        setTimeout(() => {
            if (text.parentNode) text.remove();
        }, 2000);
        
        // Create celebration particles
        for (let i = 0; i < 20; i++) {
            setTimeout(() => {
                createCelebrationParticle(container);
            }, i * 30);
        }
    }
    
    // Create celebration particle
    function createCelebrationParticle(container) {
        const particle = document.createElement('div');
        particle.className = 'trail-particle';
        
        const size = Math.random() * 8 + 4;
        const colors = ['#dc2626', '#3b82f6', '#10b981', '#f59e0b', '#8b5cf6'];
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.background = color;
        particle.style.left = `${Math.random() * container.offsetWidth}px`;
        particle.style.top = `${Math.random() * container.offsetHeight}px`;
        particle.style.boxShadow = `0 0 ${size}px ${color}`;
        particle.style.borderRadius = '50%';
        particle.style.opacity = '0';
        
        container.appendChild(particle);
        
        // Animate particle
        particle.animate([
            { opacity: 0, transform: 'scale(0) rotate(0deg)' },
            { opacity: 1, transform: 'scale(1) rotate(180deg)' },
            { opacity: 0, transform: 'scale(0) rotate(360deg)' }
        ], {
            duration: 1500,
            easing: 'ease-out'
        });
        
        setTimeout(() => {
            if (particle.parentNode) particle.remove();
        }, 1500);
    }
    
    // Complete delivery animation
    function completeDeliveryAnimation() {
        // Truck celebration
        deliveryTruck.animate([
            { transform: 'translateY(-50%) rotate(0deg)' },
            { transform: 'translateY(-50%) rotate(5deg)' },
            { transform: 'translateY(-50%) rotate(-5deg)' },
            { transform: 'translateY(-50%) rotate(0deg)' }
        ], {
            duration: 500,
            iterations: 2,
            easing: 'ease-in-out'
        });
        
        // Progress bar pulse
        deliveryProgress.animate([
            { opacity: 1 },
            { opacity: 0.5 },
            { opacity: 1 }
        ], {
            duration: 500,
            iterations: 3,
            easing: 'ease-in-out'
        });
    }
    
    // Show success popup
    function showSuccessPopup(email) {
        popupEmail.textContent = email;
        successPopup.classList.add('active');
        
        // Create popup celebration
        createPopupCelebration();
    }
    
    // Create popup celebration
    function createPopupCelebration() {
        const popup = document.querySelector('.popup-content');
        
        for (let i = 0; i < 20; i++) {
            setTimeout(() => {
                const particle = document.createElement('div');
                particle.style.position = 'absolute';
                particle.style.width = '6px';
                particle.style.height = '6px';
                particle.style.background = i % 3 === 0 ? 'var(--primary)' : i % 3 === 1 ? 'var(--success)' : '#3b82f6';
                particle.style.borderRadius = '50%';
                particle.style.left = '50%';
                particle.style.top = '50%';
                particle.style.opacity = '1';
                particle.style.zIndex = '100';
                
                popup.appendChild(particle);
                
                const angle = Math.random() * Math.PI * 2;
                const distance = Math.random() * 100 + 60;
                const size = Math.random() * 0.4 + 0.2;
                
                particle.animate([
                    {
                        transform: 'translate(-50%, -50%) scale(0)',
                        opacity: 1
                    },
                    {
                        transform: `translate(${Math.cos(angle) * distance}px, ${Math.sin(angle) * distance}px) scale(${size})`,
                        opacity: 0
                    }
                ], {
                    duration: 1200,
                    easing: 'ease-out'
                });
                
                setTimeout(() => {
                    if (particle.parentNode) particle.remove();
                }, 1200);
            }, i * 40);
        }
    }
    
    // Show error
    function showError(message) {
        // Create error notification
        const container = document.querySelector('.compact-card');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'status-message status-error';
        errorDiv.innerHTML = `
            <i class="fas fa-exclamation-circle"></i>
            ${message}
        `;
        
        // Style for error message
        errorDiv.style.background = 'linear-gradient(135deg, #fee2e2, #fecaca)';
        errorDiv.style.color = '#b91c1c';
        errorDiv.style.padding = '12px 16px';
        errorDiv.style.borderRadius = '8px';
        errorDiv.style.marginBottom = '15px';
        errorDiv.style.fontSize = '14px';
        errorDiv.style.border = '1px solid rgba(220, 38, 38, 0.2)';
        errorDiv.style.display = 'flex';
        errorDiv.style.alignItems = 'center';
        errorDiv.style.gap = '10px';
        errorDiv.style.animation = 'slideIn 0.3s ease-out';
        
        // Remove existing messages
        const existingMessages = document.querySelectorAll('.status-message');
        existingMessages.forEach(msg => msg.remove());
        
        container.insertBefore(errorDiv, container.firstChild.nextSibling);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (errorDiv.parentNode) errorDiv.remove();
        }, 5000);
    }
    
    // Show toast notification
    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'toast-message';
        toast.textContent = message;
        
        // Style for toast
        toast.style.position = 'fixed';
        toast.style.bottom = '20px';
        toast.style.right = '20px';
        toast.style.background = 'linear-gradient(135deg, var(--success), #059669)';
        toast.style.color = 'white';
        toast.style.padding = '12px 20px';
        toast.style.borderRadius = '8px';
        toast.style.fontSize = '14px';
        toast.style.fontWeight = '500';
        toast.style.boxShadow = '0 8px 25px rgba(16, 185, 129, 0.4)';
        toast.style.zIndex = '1001';
        toast.style.animation = 'slideIn 0.3s ease-out';
        toast.style.display = 'flex';
        toast.style.alignItems = 'center';
        toast.style.gap = '10px';
        
        // Add icon
        const icon = document.createElement('i');
        icon.className = 'fas fa-check-circle';
        toast.prepend(icon);
        
        document.body.appendChild(toast);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease-out forwards';
            setTimeout(() => {
                if (toast.parentNode) toast.remove();
            }, 300);
        }, 3000);
    }
    
    // Shake truck animation
    function shakeTruck() {
        deliveryTruck.animate([
            { transform: 'translateY(-50%) translateX(0)' },
            { transform: 'translateY(-50%) translateX(-6px)' },
            { transform: 'translateY(-50%) translateX(6px)' },
            { transform: 'translateY(-50%) translateX(-6px)' },
            { transform: 'translateY(-50%) translateX(6px)' },
            { transform: 'translateY(-50%) translateX(0)' }
        ], {
            duration: 500,
            easing: 'ease-in-out'
        });
    }
    
    // Reset form state
    function resetFormState() {
        isSubmitting = false;
        submitBtn.disabled = false;
        btnText.textContent = 'Send Reset Link';
        loadingSpinner.style.display = 'none';
        
        // Clear envelopes
        envelopes.forEach(envelope => {
            if (envelope.parentNode) envelope.remove();
        });
        envelopes = [];
        
        // Clear trail particles
        trailParticles.forEach(particle => {
            if (particle.parentNode) particle.remove();
        });
        trailParticles = [];
        
        // Reset animation
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
            animationFrameId = null;
        }
        
        // Reset truck position
        updateTruckPosition();
    }
});

// Global functions
function animateLogo() {
    const logo = document.querySelector('.logo');
    logo.style.animation = 'none';
    void logo.offsetWidth;
    logo.style.animation = 'logoFloat 1s ease-in-out, logoGlow 1s ease-in-out';
    
    setTimeout(() => {
        logo.style.animation = 'logoFloat 4s infinite ease-in-out';
    }, 1000);
}

function closePopup() {
    const successPopup = document.getElementById('successPopup');
    successPopup.classList.remove('active');
}
</script>
</body>
</html>