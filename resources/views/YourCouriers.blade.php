@extends('layout')
@section('content')
<style>
    /* Professional Courier Dashboard - Clean Red & White Theme */
    .courier-container {
        min-height: 85vh;
        background: linear-gradient(135deg, #fefefe 0%, #fafafa 100%);
        padding: 2rem 0;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Clean Header */
    .compact-header {
        text-align: center;
        margin-bottom: 2.5rem;
        position: relative;
        z-index: 2;
        padding: 0 1rem;
    }

    .header-title {
        font-size: 2rem;
        font-weight: 700;
        color: #d32f2f;
        margin-bottom: 0.5rem;
        position: relative;
        display: inline-block;
    }

    .header-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: #d32f2f;
        border-radius: 2px;
    }

    .header-subtitle {
        color: #666;
        font-size: 1rem;
        font-weight: 400;
        max-width: 500px;
        margin: 1.5rem auto 0;
        line-height: 1.5;
    }

    /* Action Header */
    .action-header {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #eaeaea;
        margin-bottom: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .summary-stats {
        display: flex;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .stat-label {
        font-size: 0.85rem;
        color: #666;
        font-weight: 500;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #d32f2f;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .btn-book {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1.75rem;
        background: linear-gradient(135deg, #d32f2f, #b71c1c);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(211, 47, 47, 0.2);
        position: relative;
        overflow: hidden;
    }

    .btn-book:hover {
        background: linear-gradient(135deg, #b71c1c, #8b0000);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(211, 47, 47, 0.3);
    }

    .btn-book::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-book:hover::after {
        width: 300px;
        height: 300px;
    }

    /* Main Table Container */
    .main-table-container {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
        border: 1px solid #eaeaea;
        width: 100%;
        max-width: 1300px;
        margin: 0 auto;
        position: relative;
    }

    /* Professional Table - Compact Layout */
    .professional-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.85rem;
        table-layout: fixed;
    }

    /* Reduced Column Widths - 5 columns */
    .professional-table thead th:nth-child(1),
    .professional-table tbody td:nth-child(1) {
        width: 15%; /* Tracking ID - Reduced from 22% */
        min-width: 120px;
        max-width: 140px;
    }
    
    .professional-table thead th:nth-child(2),
    .professional-table tbody td:nth-child(2) {
        width: 15%; /* Sender - Reduced from 22% */
        min-width: 120px;
        max-width: 140px;
    }
    
    .professional-table thead th:nth-child(3),
    .professional-table tbody td:nth-child(3) {
        width: 15%; /* Receiver - Reduced from 22% */
        min-width: 120px;
        max-width: 140px;
    }
    
    .professional-table thead th:nth-child(4),
    .professional-table tbody td:nth-child(4) {
        width: 15%; /* Status - Same width */
        min-width: 100px;
        max-width: 120px;
    }
    
    .professional-table thead th:nth-child(5),
    .professional-table tbody td:nth-child(5) {
        width: 40%; /* Actions - Increased for two buttons */
        min-width: 180px;
        max-width: 220px;
    }

    /* Table Head */
    .professional-table thead {
        background: #f8f8f8;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .professional-table thead th {
        padding: 1rem 0.75rem;
        color: #333;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: left;
        border-bottom: 2px solid #eaeaea;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Table Body - No animations */
    .professional-table tbody tr {
        border-bottom: 1px solid #f5f5f5;
        transition: background-color 0.2s ease;
    }

    .professional-table tbody tr:hover {
        background-color: #fef5f5;
    }

    .professional-table tbody td {
        padding: 1rem 0.75rem;
        color: #444;
        font-weight: 500;
        vertical-align: middle;
        border-bottom: 1px solid #f5f5f5;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Tracking ID - Compact */
    .tracking-id {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(211, 47, 47, 0.05);
        color: #d32f2f;
        border-radius: 6px;
        font-family: 'SF Mono', monospace;
        font-weight: 600;
        font-size: 0.8rem;
        border: 1px solid rgba(211, 47, 47, 0.1);
        cursor: pointer;
        transition: all 0.3s ease;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        position: relative;
    }

    .tracking-id::before {
        content: '📦';
        font-size: 0.9rem;
    }

    .tracking-id:hover {
        background: rgba(211, 47, 47, 0.1);
        border-color: rgba(211, 47, 47, 0.3);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(211, 47, 47, 0.15);
    }

    /* Compact Text Formatting */
    .compact-text {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 0.85rem;
    }

    .name-text {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.25rem;
    }

    .contact-text {
        font-size: 0.8rem;
        color: #666;
    }

    /* Status Badges - Compact */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 0.875rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        border: 1px solid transparent;
        white-space: nowrap;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: all 0.3s ease;
    }

    .status-badge::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
        flex-shrink: 0;
    }

    .status-pending {
        background: linear-gradient(135deg, #fff3e0, #ffecb3);
        color: #f57c00;
        border-color: #ffb74d;
    }

    .status-in-transit {
        background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        color: #1976d2;
        border-color: #64b5f6;
    }

    .status-delivered {
        background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
        color: #388e3c;
        border-color: #81c784;
    }

    .status-badge:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Action Buttons - Enhanced with Icons */
    .action-buttons-container {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        justify-content: flex-start;
        width: 100%;
        flex-wrap: wrap;
    }

    .btn-view {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        background: linear-gradient(135deg, #2196f3, #1976d2);
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.8rem;
        transition: all 0.3s ease;
        border: none;
        white-space: nowrap;
        min-width: 120px;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .btn-view::before {
        content: '👁️';
        font-size: 0.9rem;
    }

    .btn-view:hover {
        background: linear-gradient(135deg, #1976d2, #0d47a1);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(33, 150, 243, 0.3);
    }

    .btn-view:active {
        transform: translateY(0);
    }

    .pdf-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        background: linear-gradient(135deg, #d32f2f, #c2185b);
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.8rem;
        transition: all 0.3s ease;
        border: none;
        white-space: nowrap;
        min-width: 120px;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .pdf-btn::before {
        content: '📄';
        font-size: 0.9rem;
    }

    .pdf-btn:hover {
        background: linear-gradient(135deg, #b71c1c, #880e4f);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(211, 47, 47, 0.3);
    }

    .pdf-btn:active {
        transform: translateY(0);
    }

    /* Button Ripple Effect */
    .ripple-effect {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
        border: 1px solid #eaeaea;
        max-width: 500px;
        margin: 2rem auto;
    }

    .empty-icon {
        width: 100px;
        height: 100px;
        background: rgba(211, 47, 47, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: #d32f2f;
        font-size: 2.5rem;
    }

    .empty-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 0.75rem;
    }

    .empty-text {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 2rem;
    }

    /* Table Footer */
    .table-footer {
        padding: 1.25rem 1.5rem;
        background: #fafafa;
        border-top: 1px solid #eaeaea;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .showing-count {
        font-size: 0.9rem;
        color: #666;
    }

    .count-highlight {
        font-weight: 700;
        color: #d32f2f;
        margin: 0 0.25rem;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .main-table-container {
            width: 98%;
        }
        
        .professional-table th,
        .professional-table td {
            padding: 0.875rem 0.5rem;
        }
        
        .professional-table {
            font-size: 0.82rem;
        }
        
        .btn-view, .pdf-btn {
            min-width: 110px;
            font-size: 0.75rem;
            padding: 0.45rem 1rem;
        }
    }

    @media (max-width: 992px) {
        .professional-table {
            display: block;
            overflow-x: visible;
            table-layout: auto;
        }
        
        .professional-table thead {
            display: none;
        }
        
        .professional-table tbody,
        .professional-table tr,
        .professional-table td {
            display: block;
            width: 100%;
        }
        
        .professional-table tr {
            background: white;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            margin-bottom: 1rem;
            padding: 1.25rem;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        }
        
        .professional-table td {
            padding: 0.75rem 0;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            white-space: normal;
            text-overflow: clip;
            max-width: 100%;
        }
        
        .professional-table td:last-child {
            border-bottom: none;
            padding-top: 1rem;
            justify-content: center;
        }
        
        .professional-table td::before {
            content: attr(data-label);
            font-weight: 600;
            color: #d32f2f;
            font-size: 0.75rem;
            text-transform: uppercase;
            margin-right: 1rem;
            flex-shrink: 0;
            min-width: 90px;
        }
        
        .action-header {
            flex-direction: column;
            align-items: stretch;
        }
        
        .summary-stats {
            justify-content: center;
        }
        
        .action-buttons {
            justify-content: center;
        }
        
        .action-buttons-container {
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }
        
        .btn-view, .pdf-btn {
            width: 100%;
            max-width: 200px;
        }
    }

    @media (max-width: 768px) {
        .courier-container {
            padding: 1rem 0;
        }
        
        .header-title {
            font-size: 1.5rem;
        }
        
        .header-subtitle {
            font-size: 0.9rem;
        }
        
        .action-header {
            padding: 1.25rem;
        }
        
        .summary-stats {
            gap: 1.5rem;
        }
        
        .stat-item {
            align-items: center;
        }
        
        .stat-value {
            font-size: 1.25rem;
        }
        
        .btn-book {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .header-title {
            font-size: 1.25rem;
        }
        
        .stat-item {
            min-width: calc(50% - 1rem);
            text-align: center;
        }
        
        .tracking-id {
            padding: 0.4rem 0.75rem;
            font-size: 0.75rem;
        }
        
        .status-badge {
            padding: 0.35rem 0.75rem;
            font-size: 0.65rem;
        }
        
        .btn-view, .pdf-btn {
            padding: 0.4rem 0.875rem;
            font-size: 0.75rem;
            min-width: 100px;
        }
    }
</style>

<br>
<br>

<div class="courier-container">
    <div class="container">
        <!-- Clean Header -->
        <div class="compact-header">
            <h1 class="header-title">Shipment Management</h1>
            <p class="header-subtitle">View and manage all your shipments in one place</p>
        </div>

        @if($couriers->count() > 0)
            <!-- Action Header with Stats and Book Button -->
            <div class="action-header">
                <div class="summary-stats">
                    @php
                        $pending = $couriers->where('Status', 'Pending')->count();
                        $transit = $couriers->where('Status', 'In Transit')->count();
                        $delivered = $couriers->where('Status', 'Delivered')->count();
                    @endphp
                    
                    <div class="stat-item">
                        <span class="stat-label">Total Shipments</span>
                        <span class="stat-value">{{ $couriers->count() }}</span>
                    </div>
                    
                    <div class="stat-item">
                        <span class="stat-label">Pending</span>
                        <span class="stat-value">{{ $pending }}</span>
                    </div>
                    
                    <div class="stat-item">
                        <span class="stat-label">In Transit</span>
                        <span class="stat-value">{{ $transit }}</span>
                    </div>
                    
                    <div class="stat-item">
                        <span class="stat-label">Delivered</span>
                        <span class="stat-value">{{ $delivered }}</span>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <a href="/addcourier" class="btn-book">
                        <span>📦 Book a Courier</span>
                    </a>
                </div>
            </div>

            <!-- Main Table Container -->
            <div class="main-table-container">
                <!-- Table -->
                <table class="professional-table">
                    <thead>
                        <tr>
                            <th>Tracking ID</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($couriers as $courier)
                        <tr>
                            <td data-label="Tracking ID">
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <span class="tracking-id" onclick="copyTracking('{{ $courier->TrackingNumber }}')">
                                        {{ $courier->TrackingNumber }}
                                    </span>
                                </div>
                            </td>
                            <td data-label="Sender">
                                <span class="compact-text name-text">{{ $courier->SenderName }}</span>
                                @if($courier->SenderContact)
                                <span class="compact-text contact-text">{{ $courier->SenderContact }}</span>
                                @endif
                            </td>
                            <td data-label="Receiver">
                                <span class="compact-text name-text">{{ $courier->ReceiverName }}</span>
                                @if($courier->ReceiverContact)
                                <span class="compact-text contact-text">{{ $courier->ReceiverContact }}</span>
                                @endif
                            </td>
                            <td data-label="Status">
                                @php
                                    $statusClass = match($courier->Status) {
                                        'Pending' => 'status-pending',
                                        'In Transit' => 'status-in-transit',
                                        'Delivered' => 'status-delivered',
                                        default => 'status-pending',
                                    };
                                @endphp
                                <span class="status-badge {{ $statusClass }}">{{ $courier->Status }}</span>
                            </td>
                            <td data-label="Actions">
                                <div class="action-buttons-container">
                                    <a href="/usercourierdetails/{{$courier->id}}" class="btn-view">
                                        View Details
                                    </a>
                                    <a href="/downloadcourierdetails/{{ $courier->id }}" class="pdf-btn">
                                        Download PDF
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Table Footer -->
                <div class="table-footer">
                    <div class="showing-count">
                        Showing <span class="count-highlight">{{ $couriers->count() }}</span> shipment{{ $couriers->count() > 1 ? 's' : '' }}
                    </div>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">📦</div>
                <h3 class="empty-title">No Shipments Found</h3>
                <p class="empty-text">You haven't created any shipments yet. Start by booking your first delivery.</p>
                <div class="action-buttons">
                    <a href="/addcourier" class="btn-book">
                        <span>📦 Book a Courier</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Copy Tracking Number
        window.copyTracking = function(trackingNumber) {
            const element = event.target.closest('.tracking-id');
            
            // Create ripple effect
            createRippleEffect(event, element);
            
            // Copy to clipboard
            navigator.clipboard.writeText(trackingNumber).then(() => {
                // Visual feedback
                const originalContent = element.innerHTML;
                element.innerHTML = '✓ Copied ' + element.textContent;
                element.style.background = 'rgba(76, 175, 80, 0.1)';
                element.style.borderColor = '#4caf50';
                element.style.color = '#4caf50';
                
                setTimeout(() => {
                    element.innerHTML = originalContent;
                    element.style.background = '';
                    element.style.borderColor = '';
                    element.style.color = '';
                }, 1000);
                
                // Show notification
                showNotification('✓ Tracking ID copied to clipboard!', 'success');
            }).catch(err => {
                console.error('Failed to copy: ', err);
                showNotification('✗ Failed to copy tracking ID', 'error');
            });
        };
        
        // Ripple effect function
        function createRippleEffect(event, element) {
            const ripple = document.createElement('span');
            const rect = element.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;
            
            ripple.classList.add('ripple-effect');
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            
            element.style.position = 'relative';
            element.style.overflow = 'hidden';
            element.appendChild(ripple);
            
            // Remove ripple after animation
            setTimeout(() => {
                ripple.remove();
            }, 600);
        }
        
        // Add ripple effect to buttons
        const buttons = document.querySelectorAll('.btn-view, .pdf-btn, .btn-book, .tracking-id');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (!button.classList.contains('tracking-id')) {
                    createRippleEffect(e, this);
                }
            });
        });
        
        // Notification function
        function showNotification(message, type = 'success') {
            // Remove existing notification
            const existing = document.querySelector('.copy-notification');
            if (existing) existing.remove();
            
            const colors = {
                success: '#4caf50',
                error: '#f44336',
                info: '#2196f3'
            };
            
            // Create notification
            const notification = document.createElement('div');
            notification.className = 'copy-notification';
            notification.innerHTML = message;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${colors[type]};
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                font-weight: 600;
                font-size: 0.9rem;
                z-index: 9999;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
                transform: translateX(120%);
                transition: transform 0.3s ease;
                display: flex;
                align-items: center;
                gap: 0.75rem;
            `;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
            // Remove after 2 seconds
            setTimeout(() => {
                notification.style.transform = 'translateX(120%)';
                setTimeout(() => notification.remove(), 300);
            }, 2000);
        }
        
        // View Details functionality
        const viewButtons = document.querySelectorAll('.btn-view');
        viewButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const trackingId = this.closest('tr').querySelector('.tracking-id').textContent;
                
                // Add loading effect
                const originalText = this.innerHTML;
                this.innerHTML = '⏳ Loading...';
                this.style.pointerEvents = 'none';
                
                // Simulate API call or navigation
        //         setTimeout(() => {
        //             this.innerHTML = originalText;
        //             this.style.pointerEvents = 'auto';
        //             showNotification('📋 Loading shipment details...', 'info');
        //         }, 800);
        //     });
        // });
        
        // Add hover effect to table rows
        const tableRows = document.querySelectorAll('.professional-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#fef5f5';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
        
        // Add keyboard shortcut for copying (Ctrl+C on hovered tracking ID)
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'c') {
                const hoveredElement = document.querySelector('.tracking-id:hover');
                if (hoveredElement) {
                    const trackingNumber = hoveredElement.textContent;
                    navigator.clipboard.writeText(trackingNumber).then(() => {
                        showNotification('✓ Tracking ID copied to clipboard!', 'success');
                    });
                }
            }
        });
    });
</script>

@endsection