@extends('admin.masterlayout')

@section('content')
<style>
    /* Modern Base Styles */
    :root {
        --primary-red: #dc3545;
        --primary-red-dark: #b02a37;
        --primary-red-light: #fff5f5;
        --success-green: #28a745;
        --warning-orange: #ff9800;
        --light-bg: #f8f9fa;
        --dark-text: #2d3436;
        --border-radius: 12px;
        --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #f0f2f5 100%);
        min-height: 100vh;
    }

    /* Container Enhancement */
    .container.mt-4 {
        max-width: 1400px;
        padding: 0 20px;
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Enhanced Header - Red Theme */
    .header-section {
        margin-bottom: 2rem;
    }

    .header-main {
        background: linear-gradient(135deg, #dc3545, #c82333);
        border-radius: var(--border-radius);
        padding: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: var(--box-shadow);
        border-bottom: 3px solid #b02a37;
    }

    .header-main::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 20s infinite linear;
    }

    @keyframes float {
        0% {
            transform: translate(0, 0) rotate(0deg);
        }
        100% {
            transform: translate(50px, 50px) rotate(360deg);
        }
    }

    .header-title {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        color: white;
        position: relative;
        z-index: 2;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .header-subtitle {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        margin-top: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .stats-container {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
        position: relative;
        z-index: 2;
        flex-wrap: wrap;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        padding: 1rem 1.5rem;
        min-width: 150px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: var(--transition);
    }

    .stat-card:hover {
        transform: translateY(-3px);
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.9);
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* COMPACT TABLE STYLES */
    .table-container {
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--box-shadow);
        position: relative;
    }

    .table-header {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 1.25rem 1.75rem;
        border-bottom: 2px solid var(--primary-red);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .table-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--dark-text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .table-title i {
        color: var(--primary-red);
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table {
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        min-width: 700px;
    }

    .table thead {
        background: linear-gradient(135deg, #fff5f5, #ffeaea);
    }

    /* COMPACT COLUMN WIDTHS */
    .table thead th:nth-child(1) { /* Contact Information */
        width: 28%;
        min-width: 220px;
    }
    
    .table thead th:nth-child(2) { /* Status */
        width: 15%;
        min-width: 100px;
    }
    
    .table thead th:nth-child(3) { /* Date */
        width: 17%;
        min-width: 120px;
    }
    
    .table thead th:nth-child(4) { /* Actions */
        width: 20%;
        min-width: 150px;
    }

    .table thead th {
        border: none;
        padding: 1rem 0.75rem;
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--dark-text);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid var(--primary-red);
        white-space: nowrap;
    }

    .table tbody tr {
        transition: var(--transition);
        border-bottom: 1px solid #f0f0f0;
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background: var(--primary-red-light);
        transform: translateX(3px);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.08);
    }

    .table tbody td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
        border: none;
        color: var(--dark-text);
        font-weight: 500;
        font-size: 0.9rem;
    }

    /* Compact User Info Cell */
    .user-info-cell {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        min-width: 200px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1rem;
        flex-shrink: 0;
        box-shadow: 0 3px 8px rgba(220, 53, 69, 0.2);
        transition: var(--transition);
    }

    .user-details h6 {
        margin: 0;
        font-weight: 600;
        color: var(--dark-text);
        font-size: 0.95rem;
    }

    .user-details .email {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 0.125rem;
        word-break: break-word;
        max-width: 160px;
    }

    /* Compact Status Cell */
    .status-cell {
        text-align: center;
        min-width: 100px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.4rem 0.75rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
        transition: var(--transition);
        min-width: 90px;
        justify-content: center;
    }

    .status-replied {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border: 1px solid #c3e6cb;
        box-shadow: 0 2px 6px rgba(40, 167, 69, 0.12);
    }

    .status-pending {
        background: linear-gradient(135deg, #ffe5e5, #ffcccc);
        color: #721c24;
        border: 1px solid #f5c6cb;
        box-shadow: 0 2px 6px rgba(220, 53, 69, 0.12);
    }

    /* Compact Date Cell */
    .date-cell {
        text-align: center;
        min-width: 120px;
    }

    .date-display {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 0.6rem 0.75rem;
        border-radius: 8px;
        display: inline-block;
        border: 1px solid #dee2e6;
        min-width: 100px;
    }

    .date-main {
        font-weight: 700;
        color: var(--dark-text);
        font-size: 0.85rem;
    }

    .date-time {
        font-size: 0.75rem;
        color: #6c757d;
        margin-top: 0.125rem;
    }

    /* COMPACT HORIZONTAL ACTION BUTTONS */
    .actions-cell {
        text-align: center;
        min-width: 150px;
    }

    .action-buttons-horizontal {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        flex-wrap: nowrap;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 10px;
        border: none;
        font-size: 0.9rem;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        flex-shrink: 0;
    }

    .btn-reply {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
        color: white;
        box-shadow: 0 3px 10px rgba(220, 53, 69, 0.2);
    }

    .btn-reply:hover {
        background: linear-gradient(135deg, var(--primary-red-dark), #9a2530);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.25);
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        box-shadow: 0 3px 10px rgba(220, 53, 69, 0.2);
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #c82333, #b02a37);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.25);
    }

    .btn-view {
        background: linear-gradient(135deg, #17a2b8, #138496);
        color: white;
        box-shadow: 0 3px 10px rgba(23, 162, 184, 0.15);
    }

    .btn-view:hover {
        background: linear-gradient(135deg, #138496, #11707f);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 6px 20px rgba(23, 162, 184, 0.2);
    }

    .action-tooltip {
        position: absolute;
        bottom: -28px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--dark-text);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: 500;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
        pointer-events: none;
    }

    .action-btn:hover .action-tooltip {
        opacity: 1;
        visibility: visible;
        bottom: -24px;
    }

    /* Delete Confirmation Modal Styles */
    .delete-modal .modal-header {
        background: linear-gradient(135deg, #dc3545, #c82333);
    }
    
    .delete-modal .modal-body {
        text-align: center;
        padding: 2rem;
    }
    
    .delete-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #ffe5e5, #ffcccc);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: #dc3545;
        font-size: 2rem;
    }
    
    .delete-message {
        font-size: 1.1rem;
        color: var(--dark-text);
        margin-bottom: 0.5rem;
    }
    
    .delete-warning {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 1.5rem;
    }
    
    .delete-actions {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    
    .btn-delete-confirm {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        border: none;
        padding: 0.6rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: var(--transition);
    }
    
    .btn-delete-confirm:hover {
        background: linear-gradient(135deg, #c82333, #b02a37);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.25);
    }
    
    .btn-delete-cancel {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        color: #6c757d;
        border: 1px solid #dee2e6;
        padding: 0.6rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: var(--transition);
    }
    
    .btn-delete-cancel:hover {
        background: linear-gradient(135deg, #e9ecef, #dee2e6);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(108, 117, 125, 0.1);
    }

    /* COMPACT MODALS - RED/WHITE THEME */
    .modal {
        --bs-modal-zindex: 1055;
        --bs-modal-width: 700px;
        --bs-modal-padding: 1.5rem;
        --bs-modal-margin: 1.5rem;
        --bs-modal-bg: #fff;
        --bs-modal-border-color: transparent;
        --bs-modal-border-width: 0;
        --bs-modal-border-radius: var(--border-radius);
        --bs-modal-box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        --bs-modal-inner-border-radius: calc(var(--border-radius) - 1px);
        --bs-modal-header-padding-x: 1.5rem;
        --bs-modal-header-padding-y: 1.25rem;
        --bs-modal-header-border-color: transparent;
        --bs-modal-header-border-width: 0;
        --bs-modal-title-line-height: 1.4;
        --bs-modal-footer-gap: 0.5rem;
        --bs-modal-footer-bg: transparent;
        --bs-modal-footer-border-color: transparent;
        --bs-modal-footer-border-width: 0;
    }

    .modal-content {
        border: none;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--bs-modal-box-shadow);
        animation: modalSlideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* RED THEME MODAL HEADER */
    .modal-header {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
        padding: var(--bs-modal-header-padding-y) var(--bs-modal-header-padding-x);
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }

    .modal-header::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 120px;
        height: 120px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .modal-title {
        color: white;
        font-weight: 600;
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        position: relative;
        z-index: 1;
    }

    /* FIXED CLOSE BUTTON - RED THEME */
    .modal-header .btn-close {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 6px;
        width: 34px;
        height: 34px;
        padding: 0;
        margin: 0;
        position: relative;
        z-index: 2;
        border: 1px solid rgba(255, 255, 255, 0.25);
        opacity: 0.9;
        transition: var(--transition);
    }

    .modal-header .btn-close:hover {
        background: rgba(255, 255, 255, 0.25);
        opacity: 1;
        transform: rotate(90deg);
    }

    /* COMPACT MODAL BODY */
    .modal-body {
        padding: var(--bs-modal-padding);
        background: linear-gradient(135deg, #ffffff, #fcfcfc);
        max-height: 70vh;
        overflow-y: auto;
    }

    /* Compact Message Display */
    .message-display-card {
        background: white;
        border-radius: 10px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
        border: 1px solid #e9ecef;
        border-left: 3px solid var(--primary-red);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04);
    }

    .message-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
    }

    .message-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .message-sender h6 {
        margin: 0;
        font-weight: 600;
        color: var(--dark-text);
        font-size: 1rem;
    }

    .message-sender .email {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 0.125rem;
    }

    .message-content {
        color: var(--dark-text);
        line-height: 1.5;
        font-size: 0.9rem;
        white-space: pre-wrap;
        word-wrap: break-word;
        background: #f8f9fa;
        padding: 0.875rem;
        border-radius: 8px;
        border: 1px solid #e9ecef;
        max-height: 150px;
        overflow-y: auto;
    }

    /* COMPACT REPLY MODAL HEIGHT */
    #replyModal .modal-body {
        max-height: 65vh;
        padding: 1.25rem;
    }

    /* Compact Reply Form */
    .reply-form-container {
        background: white;
        border-radius: 10px;
        padding: 1.25rem;
        border: 1px solid #e9ecef;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04);
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    textarea.form-control {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.875rem;
        font-size: 0.9rem;
        transition: var(--transition);
        min-height: 120px; /* Reduced height */
        max-height: 200px; /* Added max height */
        resize: vertical;
    }

    textarea.form-control:focus {
        border-color: var(--primary-red);
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        outline: none;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .btn-modal {
        padding: 0.6rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-modal-secondary {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        color: #6c757d;
        border: 1px solid #dee2e6;
    }

    .btn-modal-secondary:hover {
        background: linear-gradient(135deg, #e9ecef, #dee2e6);
        transform: translateY(-2px);
        box-shadow: 0 3px 12px rgba(108, 117, 125, 0.08);
    }

    .btn-modal-primary {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
        color: white;
        border: none;
    }

    .btn-modal-primary:hover {
        background: linear-gradient(135deg, var(--primary-red-dark), #9a2530);
        transform: translateY(-2px);
        box-shadow: 0 3px 15px rgba(220, 53, 69, 0.25);
    }

    /* Compact Footer Stats */
    .stats-footer {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 1rem 1.5rem;
        border-top: 1px solid #dee2e6;
    }

    .footer-stats {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .footer-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
    }

    .badge-success {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .badge-warning {
        background: linear-gradient(135deg, #ffe5e5, #ffcccc);
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Compact Empty State */
    .empty-state {
        max-width: 500px;
        margin: 3rem auto;
        text-align: center;
    }

    .empty-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #ffe5e5, #ffcccc);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        border: 6px solid white;
        box-shadow: var(--box-shadow);
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    .empty-icon i {
        font-size: 2.5rem;
        color: var(--primary-red);
    }

    .empty-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 0.75rem;
    }

    .empty-text {
        font-size: 1rem;
        color: #6c757d;
        line-height: 1.5;
        max-width: 350px;
        margin: 0 auto;
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 1200px) {
        .container.mt-4 {
            max-width: 100%;
        }
        
        .header-main {
            padding: 1.75rem;
        }
        
        .header-title {
            font-size: 1.75rem;
        }
        
        .stat-card {
            min-width: 140px;
        }
        
        .stat-value {
            font-size: 1.75rem;
        }
        
        /* Adjust column widths for medium screens */
        .table thead th:nth-child(1) {
            width: 30%;
            min-width: 200px;
        }
        
        .table thead th:nth-child(2) {
            width: 15%;
            min-width: 90px;
        }
        
        .table thead th:nth-child(3) {
            width: 20%;
            min-width: 110px;
        }
        
        .table thead th:nth-child(4) {
            width: 20%;
            min-width: 140px;
        }
    }

    @media (max-width: 992px) {
        .container.mt-4 {
            padding: 0 16px;
        }
        
        .header-main {
            padding: 1.5rem;
        }
        
        .table-header {
            padding: 1rem 1.25rem;
        }
        
        .table-title {
            font-size: 1.1rem;
        }
        
        .table thead th,
        .table tbody td {
            padding: 0.875rem 0.5rem;
            font-size: 0.85rem;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            font-size: 0.9rem;
        }
        
        .user-details h6 {
            font-size: 0.9rem;
        }
        
        .user-details .email {
            font-size: 0.75rem;
            max-width: 140px;
        }
        
        .action-btn {
            width: 34px;
            height: 34px;
            font-size: 0.85rem;
        }
        
        .date-display {
            min-width: 90px;
            padding: 0.5rem 0.625rem;
        }
        
        .modal {
            --bs-modal-padding: 1.25rem;
            --bs-modal-header-padding-x: 1.25rem;
            --bs-modal-header-padding-y: 1rem;
        }
        
        .modal-body {
            max-height: 65vh;
        }
        
        #replyModal .modal-body {
            max-height: 60vh;
        }
        
        textarea.form-control {
            min-height: 100px;
        }
    }

    @media (max-width: 768px) {
        .container.mt-4 {
            padding: 0 12px;
        }
        
        .header-main {
            padding: 1.25rem;
            text-align: center;
        }
        
        .header-title {
            font-size: 1.5rem;
        }
        
        .stats-container {
            justify-content: center;
            gap: 0.75rem;
        }
        
        .stat-card {
            min-width: calc(50% - 0.5rem);
            padding: 0.875rem 1rem;
        }
        
        .stat-value {
            font-size: 1.5rem;
        }
        
        /* Table becomes scrollable on mobile */
        .table-responsive {
            border-radius: var(--border-radius);
            overflow: auto;
        }
        
        .table {
            min-width: 600px;
        }
        
        /* Reduce padding for mobile */
        .table thead th,
        .table tbody td {
            padding: 0.75rem 0.5rem;
        }
        
        /* Adjust column widths for mobile */
        .table thead th:nth-child(1) {
            width: 35%;
            min-width: 180px;
        }
        
        .table thead th:nth-child(2) {
            width: 20%;
            min-width: 80px;
        }
        
        .table thead th:nth-child(3) {
            width: 25%;
            min-width: 100px;
        }
        
        .table thead th:nth-child(4) {
            width: 20%;
            min-width: 120px;
        }
        
        /* Adjust button sizes for mobile */
        .action-btn {
            width: 32px;
            height: 32px;
            font-size: 0.8rem;
        }
        
        .action-buttons-horizontal {
            gap: 0.375rem;
        }
        
        /* Adjust modal for mobile */
        .modal-dialog {
            margin: 0.75rem;
        }
        
        .modal-header .btn-close {
            width: 32px;
            height: 32px;
        }
        
        .btn-modal {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .btn-modal {
            width: 100%;
            justify-content: center;
        }
        
        /* Footer adjustments */
        .footer-stats {
            flex-direction: column;
            text-align: center;
            gap: 0.5rem;
        }
        
        .empty-icon {
            width: 80px;
            height: 80px;
        }
        
        .empty-icon i {
            font-size: 2rem;
        }
        
        .empty-title {
            font-size: 1.5rem;
        }
        
        .empty-text {
            font-size: 0.9rem;
            max-width: 300px;
        }
    }

    @media (max-width: 576px) {
        .header-main {
            padding: 1rem;
        }
        
        .header-title {
            font-size: 1.25rem;
        }
        
        .header-subtitle {
            font-size: 0.9rem;
        }
        
        .stat-card {
            min-width: 100%;
            margin-bottom: 0.5rem;
        }
        
        .stat-card:last-child {
            margin-bottom: 0;
        }
        
        .table thead th,
        .table tbody td {
            padding: 0.625rem 0.375rem;
            font-size: 0.8rem;
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            font-size: 0.85rem;
        }
        
        .user-details h6 {
            font-size: 0.85rem;
        }
        
        .user-details .email {
            font-size: 0.7rem;
            max-width: 120px;
        }
        
        .action-btn {
            width: 30px;
            height: 30px;
            font-size: 0.75rem;
        }
        
        .action-tooltip {
            font-size: 0.65rem;
            padding: 0.2rem 0.4rem;
            bottom: -24px;
        }
        
        .modal-dialog {
            margin: 0.5rem;
        }
        
        .modal-header .btn-close {
            width: 30px;
            height: 30px;
        }
        
        .modal-title {
            font-size: 1.1rem;
        }
        
        .message-display-card,
        .reply-form-container {
            padding: 1rem;
        }
        
        textarea.form-control {
            min-height: 80px;
            font-size: 0.85rem;
            padding: 0.75rem;
        }
        
        .empty-icon {
            width: 70px;
            height: 70px;
        }
        
        .empty-icon i {
            font-size: 1.75rem;
        }
        
        .empty-title {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 400px) {
        .container.mt-4 {
            padding: 0 8px;
        }
        
        .action-buttons-horizontal {
            gap: 0.25rem;
        }
        
        .action-btn {
            width: 28px;
            height: 28px;
        }
        
        .status-badge {
            min-width: 80px;
            font-size: 0.75rem;
            padding: 0.3rem 0.5rem;
        }
        
        .date-display {
            min-width: 80px;
            padding: 0.4rem 0.5rem;
        }
        
        .date-main {
            font-size: 0.8rem;
        }
        
        .date-time {
            font-size: 0.7rem;
        }
        
        .modal-dialog {
            margin: 0.25rem;
        }
    }

    /* Loading Animation */
    .loading-skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }
    
    /* Scrollbar Styling */
    .modal-body::-webkit-scrollbar,
    .message-content::-webkit-scrollbar {
        width: 6px;
    }
    
    .modal-body::-webkit-scrollbar-track,
    .message-content::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .modal-body::-webkit-scrollbar-thumb,
    .message-content::-webkit-scrollbar-thumb {
        background: var(--primary-red);
        border-radius: 3px;
    }
    
    .modal-body::-webkit-scrollbar-thumb:hover,
    .message-content::-webkit-scrollbar-thumb:hover {
        background: var(--primary-red-dark);
    }
</style>

<div class="container mt-4">
    <!-- Enhanced Header -->
    <div class="header-section">
        <div class="header-main">
            <h1 class="header-title">
                <i class="fas fa-comments me-2"></i>
                Contact Messages
            </h1>
            <p class="header-subtitle">
                Manage and respond to user inquiries efficiently
            </p>
            
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-value">{{ $contacts->count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-inbox"></i>
                        <span>Total Messages</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $contacts->where('Reply', null)->count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-clock"></i>
                        <span>Pending Replies</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $contacts->where('Reply', '!=', null)->count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-check-circle"></i>
                        <span>Replied</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($contacts->isEmpty())
        <!-- Enhanced Empty State -->
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-envelope-open"></i>
            </div>
            <h2 class="empty-title">No Messages Yet</h2>
            <p class="empty-text">
                When users contact you through your website, their messages will appear here.
                You'll be able to view and respond to them directly from this dashboard.
            </p>
        </div>
    @else
        <!-- Main Content Area -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">
                    <i class="fas fa-list-alt"></i>
                    All Messages ({{ $contacts->count() }})
                </h2>
                <div class="table-actions">
                    <span class="badge bg-light text-dark px-2 py-1">
                        <i class="fas fa-sort-amount-down me-1 text-danger"></i>
                        Newest First
                    </span>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Contact Information</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $c)
                            <tr>
                                <td class="text-start">
                                    <div class="user-info-cell">
                                        <div class="user-avatar">
                                            {{ strtoupper(substr($c->Name, 0, 1)) }}
                                        </div>
                                        <div class="user-details">
                                            <h6>{{ $c->Name }}</h6>
                                            <div class="email">{{ $c->Email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="status-cell">
                                    @if($c->Reply)
                                        <span class="status-badge status-replied">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Replied</span>
                                        </span>
                                    @else
                                        <span class="status-badge status-pending">
                                            <i class="fas fa-clock"></i>
                                            <span>Pending</span>
                                        </span>
                                    @endif
                                </td>
                                <td class="date-cell">
                                    <div class="date-display">
                                        <div class="date-main">{{ $c->created_at->format('d M Y') }}</div>
                                        <div class="date-time">{{ $c->created_at->format('h:i A') }}</div>
                                    </div>
                                </td>
                                <td class="actions-cell">
                                    <!-- HORIZONTAL ACTION BUTTONS -->
                                    <div class="action-buttons-horizontal">
                                        <!-- View Message Button -->
                                        <button class="action-btn btn-view"
                                            data-bs-toggle="modal"
                                            data-bs-target="#viewModal{{ $c->id }}">
                                            <i class="fas fa-eye"></i>
                                            <span class="action-tooltip">View</span>
                                        </button>
                                        
                                        <!-- Reply Button -->
                                        <button class="action-btn btn-reply"
                                            data-bs-toggle="modal"
                                            data-bs-target="#replyModal{{ $c->id }}">
                                            <i class="fas fa-reply"></i>
                                            <span class="action-tooltip">Reply</span>
                                        </button>
                                        
                                        <!-- Delete Button - LARAVEL APPROACH -->
                                        <button class="action-btn btn-delete"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $c->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                            <span class="action-tooltip">Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade delete-modal" id="deleteModal{{ $c->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="fas fa-trash-alt me-2"></i>
                                                Delete Message
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="delete-icon">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                            <h6 class="delete-message">
                                                Delete message from <strong>{{ $c->Name }}</strong>?
                                            </h6>
                                            <p class="delete-warning">
                                                This action cannot be undone. The message will be permanently deleted.
                                            </p>
                                            
                                            <!-- Laravel Delete Form -->
                                            <form action="/deletecontact/{{$c->id}}" method="POST" class="mt-3">
                                                @csrf
                                                
                                                <div class="delete-actions">
                                                    <button type="button" class="btn btn-delete-cancel" data-bs-dismiss="modal">
                                                        <i class="fas fa-times me-2"></i>
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-delete-confirm">
                                                        <i class="fas fa-trash-alt me-2"></i>
                                                        Delete Message
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- View Message Modal -->
                            <div class="modal fade" id="viewModal{{ $c->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="fas fa-eye me-2"></i>
                                                Message from {{ $c->Name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="message-display-card">
                                                <div class="message-header">
                                                    <div class="message-avatar">
                                                        {{ strtoupper(substr($c->Name, 0, 1)) }}
                                                    </div>
                                                    <div class="message-sender">
                                                        <h6>{{ $c->Name }}</h6>
                                                        <div class="email">{{ $c->Email }}</div>
                                                    </div>
                                                </div>
                                                <div class="message-content">
                                                    {{ $c->Message }}
                                                </div>
                                            </div>
                                            
                                            <div class="message-info">
                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <div class="info-card p-2 rounded">
                                                            <small class="text-muted d-block mb-1">
                                                                <i class="fas fa-calendar me-1 text-danger"></i>
                                                                Date Sent
                                                            </small>
                                                            <span class="fw-semibold">{{ $c->created_at->format('d M Y, h:i A') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="info-card p-2 rounded">
                                                            <small class="text-muted d-block mb-1">
                                                                <i class="fas fa-info-circle me-1 text-danger"></i>
                                                                Status
                                                            </small>
                                                            <span class="fw-semibold">
                                                                @if($c->Reply)
                                                                    <span class="text-success">Replied</span>
                                                                @else
                                                                    <span class="text-danger">Pending Reply</span>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pt-0">
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-modal btn-modal-secondary" data-bs-dismiss="modal">
                                                    <i class="fas fa-times me-2"></i>
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-modal btn-modal-primary" 
                                                        data-bs-dismiss="modal"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#replyModal{{ $c->id }}">
                                                    <i class="fas fa-reply me-2"></i>
                                                    Reply to Message
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reply Modal (COMPACT) -->
                            <div class="modal fade" id="replyModal{{ $c->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="fas fa-reply me-2"></i>
                                                Reply to {{ $c->Name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="message-display-card mb-3">
                                                <div class="message-header">
                                                    <div class="message-avatar">
                                                        {{ strtoupper(substr($c->Name, 0, 1)) }}
                                                    </div>
                                                    <div class="message-sender">
                                                        <h6>{{ $c->Name }}</h6>
                                                        <div class="email">{{ $c->Email }}</div>
                                                    </div>
                                                </div>
                                                <div class="message-content">
                                                    {{ $c->Message }}
                                                </div>
                                            </div>
                                            
                                            <div class="reply-form-container">
                                                <form action="{{ url('/reply/'.$c->id) }}" method="POST" id="replyForm{{ $c->id }}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            <i class="fas fa-edit me-2 text-danger"></i>
                                                            Your Response
                                                        </label>
                                                        <textarea 
                                                            name="reply"
                                                            class="form-control"
                                                            rows="4"
                                                            placeholder="Type your response here..."
                                                            required>{{ old('reply', $c->Reply) }}</textarea>
                                                        <div class="form-text d-flex justify-content-between mt-1">
                                                            <span class="text-muted">Enter your response to the user</span>
                                                            <span class="char-count text-muted">0 characters</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="button" class="btn btn-modal btn-modal-secondary" data-bs-dismiss="modal">
                                                            <i class="fas fa-times me-2"></i>
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn-modal btn-modal-primary">
                                                            <i class="fas fa-paper-plane me-2"></i>
                                                            Send Reply
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Footer Stats -->
            <div class="stats-footer">
                <div class="footer-stats">
                    <div>
                        <span class="footer-badge badge-success">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ $contacts->where('Reply', '!=', null)->count() }} Replied Messages
                        </span>
                    </div>
                    <div>
                        <span class="footer-badge badge-warning">
                            <i class="fas fa-clock me-2"></i>
                            {{ $contacts->where('Reply', null)->count() }} Pending Replies
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all modals with proper close functionality
    initializeModals();
    
    // Character counter for reply textareas
    initializeCharCounters();
    
    // Add animation to table rows
    animateTableRows();
    
    // Initialize tooltips for action buttons
    initializeTooltips();
    
    // Handle modal transitions
    handleModalTransitions();
});

function initializeModals() {
    const modals = document.querySelectorAll('.modal');
    
    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function() {
            document.body.style.overflow = 'hidden';
            const modalContent = this.querySelector('.modal-content');
            modalContent.classList.add('animate__animated', 'animate__zoomIn');
        });
        
        modal.addEventListener('shown.bs.modal', function() {
            const firstInput = this.querySelector('input, textarea, select');
            if (firstInput) firstInput.focus();
        });
        
        modal.addEventListener('hide.bs.modal', function() {
            const modalContent = this.querySelector('.modal-content');
            modalContent.classList.remove('animate__animated', 'animate__zoomIn');
            modalContent.classList.add('animate__animated', 'animate__zoomOut');
        });
        
        modal.addEventListener('hidden.bs.modal', function() {
            document.body.style.overflow = '';
            const modalContent = this.querySelector('.modal-content');
            modalContent.classList.remove('animate__animated', 'animate__zoomOut');
        });
    });
}

function initializeCharCounters() {
    document.querySelectorAll('textarea[name="reply"]').forEach(textarea => {
        const counter = textarea.parentElement.querySelector('.char-count');
        if (counter) {
            counter.textContent = textarea.value.length + ' characters';
            
            textarea.addEventListener('input', function() {
                const charCount = this.value.length;
                counter.textContent = charCount + ' characters';
                
                if (charCount > 1000) {
                    counter.classList.add('text-danger');
                    counter.classList.remove('text-muted');
                } else {
                    counter.classList.remove('text-danger');
                    counter.classList.add('text-muted');
                }
            });
        }
    });
}

function animateTableRows() {
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row, index) => {
        row.style.animationDelay = `${index * 0.03}s`;
        row.classList.add('animate__animated', 'animate__fadeIn');
        
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(3px)';
            this.style.boxShadow = '0 4px 12px rgba(220, 53, 69, 0.08)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
}

function initializeTooltips() {
    const actionButtons = document.querySelectorAll('.action-btn');
    actionButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            const tooltip = this.querySelector('.action-tooltip');
            if (tooltip) {
                tooltip.style.opacity = '1';
                tooltip.style.visibility = 'visible';
                tooltip.style.bottom = '-24px';
            }
        });
        
        button.addEventListener('mouseleave', function() {
            const tooltip = this.querySelector('.action-tooltip');
            if (tooltip) {
                tooltip.style.opacity = '0';
                tooltip.style.visibility = 'hidden';
                tooltip.style.bottom = '-28px';
            }
        });
    });
}

function handleModalTransitions() {
    document.querySelectorAll('[data-bs-target]').forEach(button => {
        button.addEventListener('click', function() {
            const targetModal = this.getAttribute('data-bs-target');
            const currentModal = this.closest('.modal');
            
            if (currentModal && targetModal) {
                const currentModalInstance = bootstrap.Modal.getInstance(currentModal);
                const targetModalInstance = new bootstrap.Modal(document.querySelector(targetModal));
                
                currentModalInstance.hide();
                setTimeout(() => {
                    targetModalInstance.show();
                }, 200);
            }
        });
    });
}

// Add ripple effect to buttons
document.querySelectorAll('.action-btn').forEach(button => {
    button.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple 0.6s linear;
            width: ${size}px;
            height: ${size}px;
            top: ${y}px;
            left: ${x}px;
            pointer-events: none;
        `;
        
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 600);
    });
});

// Add CSS for ripple effect
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    .action-btn {
        position: relative;
        overflow: hidden;
    }
    
    .info-card {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        border: 1px solid #e9ecef;
    }
`;
document.head.appendChild(style);
</script>

<!-- Include required libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection