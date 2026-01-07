@extends('layout')

@section('content')
<div class="container-fluid px-0">
    
    <!-- HERO SECTION WITH ANIMATED BACKGROUND -->
    <div class="tracking-hero-section py-5">
        <div class="container position-relative z-2">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="hero-content">
                        <div class="d-flex align-items-center mb-3">
                            <div class="pulse-icon me-3">
                                <i class="fas fa-shipping-fast fa-2x text-white"></i>
                            </div>
                            <div>
                                <h1 class="text-white fw-bold mb-2">Live Package Tracking</h1>
                                <p class="text-white-75 mb-0">Tracking ID: <span class="fw-bold">{{ $courierdetail->TrackingNumber }}</span></p>
                            </div>
                        </div>
                        
                        <!-- STATUS BADGE -->
                        @php
                            $statusColors = [
                                'booked' => ['bg' => 'bg-secondary', 'text' => 'text-white'],
                                'picked_up' => ['bg' => 'bg-info', 'text' => 'text-white'],
                                'in_transit' => ['bg' => 'bg-warning', 'text' => 'text-dark'],
                                'delivered' => ['bg' => 'bg-success', 'text' => 'text-white']
                            ];
                            $currentStatus = strtolower($courierdetail->Status);
                            $statusColor = $statusColors[$currentStatus] ?? $statusColors['booked'];
                        @endphp
                        <div class="status-display d-inline-flex align-items-center px-4 py-2 rounded-pill {{ $statusColor['bg'] }} {{ $statusColor['text'] }} mb-4">
                            <i class="fas fa-circle fa-xs me-2"></i>
                            <span class="fw-bold">{{ ucfirst($courierdetail->Status) }}</span>
                        </div>
                        
                        <!-- SHIPMENT INFO -->
                        <div class="shipment-info-grid mb-4">
                            <div class="info-item">
                                <div class="label text-white-75">Delivery Zone</div>
                                <div class="value fw-bold text-white bg-danger bg-opacity-25 px-3 py-1 rounded d-inline-block">
                                    {{ $courierdetail->DeliveryZone }}
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="label text-white-75">Parcel Weight</div>
                                <div class="value fw-bold text-white">{{ $courierdetail->ParcelWeight }} kg</div>
                            </div>
                            <div class="info-item">
                                <div class="label text-white-75">Service Type</div>
                                <div class="value fw-bold text-white">{{ ucfirst($courierdetail->DeliveryType) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <!-- COUNTDOWN CARD -->
                    <div class="countdown-card bg-white rounded-3 shadow-lg p-4">
                        <div class="text-center mb-4">
                            <h4 class="text-danger fw-bold mb-2">⏰ Delivery Countdown</h4>
                            <p class="text-muted mb-3">
                                @php
                                    switch(strtolower($courierdetail->DeliveryType)){
                                        case 'overnight': $days = 1; break;
                                        case 'express': $days = 2; break;
                                        default: $days = 4; break;
                                    }
                                    $estimatedDate = \Carbon\Carbon::parse($courierdetail->created_at)->addDays($days);
                                @endphp
                                Estimated: <span class="fw-bold text-danger">{{ $estimatedDate->format('d M Y') }}</span>
                            </p>
                        </div>
                        
                        <!-- COUNTDOWN TIMER -->
                        <div class="countdown-container">
                            <div class="countdown-grid">
                                <div class="countdown-unit">
                                    <div class="countdown-number bg-danger text-white rounded" id="days">00</div>
                                    <div class="countdown-label">Days</div>
                                </div>
                                <div class="countdown-separator">:</div>
                                <div class="countdown-unit">
                                    <div class="countdown-number bg-danger text-white rounded" id="hours">00</div>
                                    <div class="countdown-label">Hours</div>
                                </div>
                                <div class="countdown-separator">:</div>
                                <div class="countdown-unit">
                                    <div class="countdown-number bg-danger text-white rounded" id="minutes">00</div>
                                    <div class="countdown-label">Minutes</div>
                                </div>
                                <div class="countdown-separator">:</div>
                                <div class="countdown-unit">
                                    <div class="countdown-number bg-danger text-white rounded" id="seconds">00</div>
                                    <div class="countdown-label">Seconds</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- PROGRESS BAR -->
                        <div class="progress-container mt-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Delivery Progress</span>
                                <span id="progressPercentage" class="fw-bold text-danger">0%</span>
                            </div>
                            <div class="progress" style="height: 10px; border-radius: 5px; background-color: #f1f3f5;">
                                <div id="progressBar" 
                                     class="progress-bar bg-danger progress-bar-striped progress-bar-animated" 
                                     role="progressbar" 
                                     style="width: 0%; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="container py-5">
        <div class="row">
            <!-- LEFT COLUMN - TRACKING DETAILS -->
            <div class="col-lg-8 mb-4">
                <!-- TRACKING TIMELINE -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="fw-bold mb-0"><i class="fas fa-route text-danger me-2"></i>Tracking Timeline</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="tracking-timeline">
                            @php
                                $stages = [
                                    'booked' => [
                                        'icon' => 'fa-box',
                                        'title' => 'Order Booked',
                                        'desc' => 'Package registered in our system',
                                        'time' => $courierdetail->created_at->format('d M, h:i A')
                                    ],
                                    'picked_up' => [
                                        'icon' => 'fa-truck-pickup',
                                        'title' => 'Picked Up',
                                        'desc' => 'Courier agent collected the package'
                                    ],
                                    'in_transit' => [
                                        'icon' => 'fa-shipping-fast',
                                        'title' => 'In Transit',
                                        'desc' => 'Package is on the way to destination'
                                    ],
                                    'delivered' => [
                                        'icon' => 'fa-check-circle',
                                        'title' => 'Delivered',
                                        'desc' => 'Successfully delivered to recipient'
                                    ]
                                ];
                                $currentIndex = array_search($currentStatus, array_keys($stages));
                            @endphp

                            @foreach($stages as $key => $stage)
                                @php
                                    $index = array_search($key, array_keys($stages));
                                    $isCompleted = $index <= $currentIndex;
                                    $isCurrent = $index == $currentIndex;
                                @endphp
                                <div class="timeline-step {{ $isCompleted ? 'completed' : '' }} {{ $isCurrent ? 'current' : '' }}">
                                    <div class="step-indicator">
                                        <div class="step-icon">
                                            <i class="fas {{ $stage['icon'] }}"></i>
                                        </div>
                                        @if(!$loop->first)
                                            <div class="step-line {{ $isCompleted ? 'active' : '' }}"></div>
                                        @endif
                                    </div>
                                    <div class="step-content">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="fw-bold mb-1">{{ $stage['title'] }}</h6>
                                                <p class="text-muted small mb-0">{{ $stage['desc'] }}</p>
                                            </div>
                                            @if($key == 'booked')
                                                <span class="badge bg-light text-dark">{{ $stage['time'] }}</span>
                                            @endif
                                        </div>
                                        @if($isCurrent)
                                            <div class="mt-2">
                                                <span class="badge bg-danger bg-opacity-10 text-danger">
                                                    <i class="fas fa-clock me-1"></i>Current Status
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- SENDER & RECEIVER DETAILS -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-danger text-white py-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle fa-lg me-2"></i>
                                    <h5 class="mb-0">Sender Information</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="contact-details">
                                    <div class="detail-item mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="detail-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted">Full Name</small>
                                                <p class="fw-bold mb-0">{{ $courierdetail->SenderName }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-item mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="detail-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted">Phone Number</small>
                                                <p class="fw-bold mb-0">{{ $courierdetail->SenderPhone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="d-flex align-items-start">
                                            <div class="detail-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted">Pickup Address</small>
                                                <p class="mb-0">{{ $courierdetail->PickupAddress }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-danger text-white py-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-check fa-lg me-2"></i>
                                    <h5 class="mb-0">Receiver Information</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="contact-details">
                                    <div class="detail-item mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="detail-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted">Full Name</small>
                                                <p class="fw-bold mb-0">{{ $courierdetail->ReceiverName }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-item mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="detail-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted">Phone Number</small>
                                                <p class="fw-bold mb-0">{{ $courierdetail->ReceiverPhone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="d-flex align-items-start">
                                            <div class="detail-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted">Delivery Address</small>
                                                <p class="mb-0">{{ $courierdetail->DeliveryAddress }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN - SHIPMENT INFO -->
            <div class="col-lg-4">
                <!-- SHIPMENT SUMMARY -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="fw-bold mb-0"><i class="fas fa-box text-danger me-2"></i>Shipment Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="summary-list">
                            <div class="summary-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                        <i class="fas fa-barcode"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Tracking ID</small>
                                        <p class="mb-0 fw-bold">{{ $courierdetail->TrackingNumber }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                        <i class="fas fa-weight-hanging"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Package Weight</small>
                                        <p class="mb-0 fw-bold">{{ $courierdetail->ParcelWeight }} kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Service Type</small>
                                        <p class="mb-0 fw-bold">{{ ucfirst($courierdetail->DeliveryType) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Order Date</small>
                                        <p class="mb-0 fw-bold">{{ $courierdetail->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-item d-flex justify-content-between align-items-center py-3">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Delivery Zone</small>
                                        <p class="mb-0 fw-bold">{{ $courierdetail->DeliveryZone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SUPPORT CARD -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="fw-bold mb-0"><i class="fas fa-headset text-danger me-2"></i>24/7 Support</h5>
                    </div>
                    <div class="card-body">
                        <div class="support-info">
                            <div class="support-item text-center mb-4">
                                <div class="support-icon mb-3">
                                    <i class="fas fa-phone-alt fa-2x text-danger"></i>
                                </div>
                                <h6 class="fw-bold">Call Us Anytime</h6>
                                <p class="text-muted small mb-3">24/7 customer support available</p>
                                <a href="tel:+923000000000" class="btn btn-danger w-100">
                                    <i class="fas fa-phone me-2"></i>+92-300-0000000
                                </a>
                            </div>
                            
                            <div class="support-item text-center">
                                <div class="support-icon mb-3">
                                    <i class="fas fa-envelope fa-2x text-danger"></i>
                                </div>
                                <h6 class="fw-bold">Email Support</h6>
                                <p class="text-muted small mb-3">We respond within 1 hour</p>
                                <a href="mailto:support@courierms.com" class="btn btn-outline-danger w-100">
                                    <i class="fas fa-envelope me-2"></i>support@courierms.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- IMPORTANT INFORMATION -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-danger border-2">
                    <div class="card-header bg-danger bg-opacity-10 border-danger py-3">
                        <h5 class="mb-0 text-danger fw-bold"><i class="fas fa-info-circle me-2"></i>Important Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-3">
                                <div class="info-box text-center">
                                    <div class="info-icon mb-2">
                                        <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Damage Claims</h6>
                                    <p class="text-muted small mb-0">Report any damage within 24 hours of delivery</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box text-center">
                                    <div class="info-icon mb-2">
                                        <i class="fas fa-map-marked-alt fa-2x text-danger"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Address Accuracy</h6>
                                    <p class="text-muted small mb-0">Ensure correct delivery address to avoid delays</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box text-center">
                                    <div class="info-icon mb-2">
                                        <i class="fas fa-undo-alt fa-2x text-danger"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Refund Policy</h6>
                                    <p class="text-muted small mb-0">Charges are non-refundable after dispatch</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box text-center">
                                    <div class="info-icon mb-2">
                                        <i class="fas fa-clock fa-2x text-danger"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Delivery Hours</h6>
                                    <p class="text-muted small mb-0">9:00 AM - 7:00 PM, Monday to Saturday</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.5485180451324!2d67.10809927515497!3d24.94744587787261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb3390008cfd9ab%3A0x50570e200b0de0fe!2sAptech%20scheme%2033!5e0!3m2!1sen!2s!4v1767694197929!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<style>
/* Hero Section */
.tracking-hero-section {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    position: relative;
    overflow: hidden;
}

.tracking-hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
    animation: float 15s infinite linear;
}

@keyframes float {
    0% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(-20px, 10px) rotate(120deg); }
    66% { transform: translate(10px, -20px) rotate(240deg); }
    100% { transform: translate(0, 0) rotate(360deg); }
}

/* Pulse Icon */
.pulse-icon {
    position: relative;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(255, 255, 255, 0); }
    100% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
}

/* Shipment Info Grid */
.shipment-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.info-item .label {
    font-size: 0.875rem;
    margin-bottom: 4px;
}

.info-item .value {
    font-size: 1.1rem;
}

/* Countdown Card */
.countdown-card {
    position: relative;
    z-index: 1;
    transition: transform 0.3s ease;
}

.countdown-card:hover {
    transform: translateY(-5px);
}

.countdown-container {
    padding: 20px 0;
}

.countdown-grid {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.countdown-unit {
    text-align: center;
    min-width: 70px;
}

.countdown-number {
    font-size: 2rem;
    font-weight: bold;
    padding: 10px;
    margin-bottom: 5px;
    box-shadow: 0 4px 6px rgba(220, 53, 69, 0.2);
    transition: all 0.3s ease;
}

.countdown-number:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(220, 53, 69, 0.3);
}

.countdown-label {
    font-size: 0.8rem;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.countdown-separator {
    font-size: 2rem;
    font-weight: bold;
    color: #dc3545;
    margin-bottom: 25px;
}

/* Progress Bar */
.progress-bar {
    background: linear-gradient(90deg, #dc3545, #ff6b6b);
    position: relative;
    overflow: hidden;
}

.progress-bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background-image: linear-gradient(
        -45deg,
        rgba(255, 255, 255, 0.2) 25%,
        transparent 25%,
        transparent 50%,
        rgba(255, 255, 255, 0.2) 50%,
        rgba(255, 255, 255, 0.2) 75%,
        transparent 75%,
        transparent
    );
    background-size: 20px 20px;
    animation: progressMove 1s linear infinite;
}

@keyframes progressMove {
    0% { background-position: 0 0; }
    100% { background-position: 20px 0; }
}

/* Tracking Timeline */
.tracking-timeline {
    position: relative;
    padding-left: 40px;
}

.tracking-timeline::before {
    content: '';
    position: absolute;
    left: 24px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
    z-index: 1;
}

.timeline-step {
    position: relative;
    margin-bottom: 30px;
    display: flex;
    align-items: flex-start;
}

.step-indicator {
    position: absolute;
    left: -40px;
    top: 0;
    z-index: 2;
}

.step-icon {
    width: 50px;
    height: 50px;
    background: white;
    border: 3px solid #e9ecef;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    transition: all 0.3s ease;
}

.timeline-step.completed .step-icon {
    background: #28a745;
    border-color: #28a745;
    color: white;
}

.timeline-step.current .step-icon {
    background: #dc3545;
    border-color: #dc3545;
    color: white;
    animation: heartbeat 1.5s infinite;
}

@keyframes heartbeat {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.step-line {
    position: absolute;
    top: 50px;
    left: 24px;
    width: 2px;
    height: 30px;
    background: #e9ecef;
}

.step-line.active {
    background: #28a745;
}

.timeline-step.completed .step-line {
    background: #28a745;
}

.step-content {
    padding-left: 20px;
    flex: 1;
}

/* Contact Details */
.detail-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* Summary List */
.summary-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.summary-item {
    transition: background-color 0.3s ease;
}

.summary-item:hover {
    background-color: #f8f9fa;
}

/* Support Info */
.support-icon {
    width: 60px;
    height: 60px;
    background: rgba(220, 53, 69, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

/* Info Box */
.info-box {
    padding: 20px;
    border-radius: 10px;
    transition: all 0.3s ease;
    height: 100%;
}

.info-box:hover {
    background: #f8f9fa;
    transform: translateY(-5px);
}

.info-icon {
    width: 60px;
    height: 60px;
    background: rgba(220, 53, 69, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

/* Responsive Design */
@media (max-width: 992px) {
    .shipment-info-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .tracking-timeline {
        padding-left: 30px;
    }
    
    .step-indicator {
        left: -30px;
    }
    
    .step-icon {
        width: 40px;
        height: 40px;
    }
}

@media (max-width: 768px) {
    .tracking-hero-section {
        padding: 3rem 0;
    }
    
    .hero-content {
        text-align: center;
    }
    
    .pulse-icon {
        margin: 0 auto 1rem;
    }
    
    .shipment-info-grid {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .countdown-grid {
        gap: 5px;
    }
    
    .countdown-unit {
        min-width: 60px;
    }
    
    .countdown-number {
        font-size: 1.5rem;
        padding: 8px;
    }
    
    .countdown-separator {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
    
    .tracking-timeline {
        padding-left: 20px;
    }
    
    .step-indicator {
        left: -20px;
    }
    
    .step-icon {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
    
    .step-content {
        padding-left: 15px;
    }
}

@media (max-width: 576px) {
    .countdown-grid {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .countdown-unit {
        min-width: 50px;
    }
    
    .countdown-number {
        font-size: 1.2rem;
        padding: 6px;
    }
    
    .countdown-label {
        font-size: 0.7rem;
    }
    
    .countdown-separator {
        display: none;
    }
    
    .info-box {
        margin-bottom: 20px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize variables
    const estimatedDate = new Date("{{ $estimatedDate->format('Y-m-d H:i:s') }}").getTime();
    const createdDate = new Date("{{ $courierdetail->created_at->format('Y-m-d H:i:s') }}").getTime();
    const isDelivered = "{{ $currentStatus }}" === 'delivered';
    
    // Function to update countdown and progress
    function updateTracking() {
        const now = new Date().getTime();
        
        // Update countdown
        if (!isDelivered) {
            const distance = estimatedDate - now;
            
            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById('days').textContent = days.toString().padStart(2, '0');
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            } else {
                // Time's up
                document.getElementById('days').textContent = '00';
                document.getElementById('hours').textContent = '00';
                document.getElementById('minutes').textContent = '00';
                document.getElementById('seconds').textContent = '00';
            }
        }
        
        // Update progress bar
        updateProgressBar();
    }
    
    // Function to update progress bar
    function updateProgressBar() {
        const now = new Date().getTime();
        const totalDuration = estimatedDate - createdDate;
        const elapsed = now - createdDate;
        
        // Calculate percentage
        let percentage = Math.min(Math.round((elapsed / totalDuration) * 100), 100);
        
        // Set minimum percentage based on status
        const statusMinProgress = {
            'booked': 25,
            'picked_up': 50,
            'in_transit': 75,
            'delivered': 100
        };
        
        const currentStatus = "{{ $currentStatus }}";
        const minProgress = statusMinProgress[currentStatus] || 0;
        
        if (percentage < minProgress) {
            percentage = minProgress;
        }
        
        if (isDelivered) {
            percentage = 100;
        }
        
        // Update progress bar
        const progressBar = document.getElementById('progressBar');
        const progressPercentage = document.getElementById('progressPercentage');
        
        progressBar.style.width = percentage + '%';
        progressPercentage.textContent = percentage + '%';
        
        // Add/remove animation
        if (percentage < 100 && !isDelivered) {
            progressBar.classList.add('progress-bar-animated');
        } else {
            progressBar.classList.remove('progress-bar-animated');
        }
    }
    
    // Initial update
    updateTracking();
    updateProgressBar();
    
    // Update every second if not delivered
    if (!isDelivered) {
        setInterval(updateTracking, 1000);
    }
    
    // Add hover effects to timeline steps
    const timelineSteps = document.querySelectorAll('.timeline-step');
    timelineSteps.forEach(step => {
        step.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.step-icon');
            if (icon) {
                icon.style.transform = 'scale(1.1)';
            }
        });
        
        step.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.step-icon');
            if (icon) {
                icon.style.transform = 'scale(1)';
            }
        });
    });
    
    // Add click effects to countdown numbers
    const countdownNumbers = document.querySelectorAll('.countdown-number');
    countdownNumbers.forEach(number => {
        number.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 200);
        });
    });
});
</script>
@endsection