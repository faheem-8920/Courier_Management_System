@extends('admin.masterlayout')

@section('content')
<div class="dashboard-container">

    <!-- Animated Header -->
    <div class="dashboard-header">
        <div class="header-content">
            <div class="page-title">
                <div class="title-icon">
                    <i class="fas fa-motorcycle"></i>
                </div>
                <div>
                    <h1>Rider Profile</h1>
                    <p class="breadcrumb">
                        Dashboard <i class="fas fa-chevron-right"></i> Riders <i class="fas fa-chevron-right"></i> 
                        <span class="current">{{ $rider->Fullname }}</span>
                    </p>
                </div>
            </div>
            <div class="header-actions">
                <button class="btn-action btn-message" onclick="openMessageModal()">
                    <i class="fas fa-envelope"></i>
                    <span>Message</span>
                </button>
                <a href="/getriderdetails/{{ $rider->id }}" class="btn-action btn-edit">
                    <i class="fas fa-edit"></i>
                    <span>Edit</span>
                </a>
                <button class="btn-action btn-more">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
        </div>
        
        <!-- Profile Summary -->
        <div class="profile-summary">
            <div class="profile-avatar">
                <div class="avatar-circle">
                    {{ strtoupper(substr($rider->Fullname, 0, 2)) }}
                </div>
                <div class="status-indicator {{ $rider->VehicleInspected ? 'active' : 'inactive' }}"></div>
            </div>
            <div class="profile-details">
                <h2>{{ $rider->Fullname }}</h2>
                <div class="profile-meta">
                    <span class="meta-item">
                        <i class="fas fa-id-badge"></i>
                        ID: {{ str_pad($rider->id, 6, '0', STR_PAD_LEFT) }}
                    </span>
                    <span class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        Joined {{ \Carbon\Carbon::parse($rider->HireDate)->diffForHumans() }}
                    </span>
                    <span class="meta-item">
                        <i class="fas fa-{{ $rider->VehicleType == 'bike' ? 'motorcycle' : 'car' }}"></i>
                        {{ ucfirst($rider->VehicleType) }}
                    </span>
                </div>
            </div>
            <div class="profile-stats">
                <div class="stat-box"style="margin-left: -30PX">
                    <div class="stat-value">{{ $delivered }}</div>
                    <div class="stat-label">Delivered</div>
                </div>
                <div class="stat-box"style="margin-left: -20PX">
                    <div class="stat-value">{{ $pending + $pickedUp + $inTransit }}</div>
                    <div class="stat-label">Active</div>
                </div>
                <div class="stat-box"style="margin-left: -25PX">
                    <div class="stat-value" >{{ round($performance) }}%</div>
                    <div class="stat-label">Performance</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Today & Month Deliveries -->
    <div class="delivery-timeframe">
        <div class="timeframe-card today-card">
            <div class="timeframe-icon">
                <i class="fas fa-sun"></i>
            </div>
            <div class="timeframe-content">
                <div class="timeframe-label">Today's Deliveries</div>
                <div class="timeframe-value" data-count="{{ $todayDeliveries }}">{{ $todayDeliveries }}</div>
                <div class="timeframe-progress">
                    <div class="progress-fill" style="width: {{ $todayDeliveries > 0 ? min(($todayDeliveries/50)*100, 100) : 0 }}%"></div>
                </div>
            </div>
            <div class="timeframe-sparkline">
                <svg width="60" height="30" viewBox="0 0 60 30">
                    <path d="M0,15 L15,10 L30,20 L45,5 L60,15" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2"/>
                </svg>
            </div>
        </div>
        
        <div class="timeframe-card month-card">
            <div class="timeframe-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="timeframe-content">
                <div class="timeframe-label">This Month Deliveries</div>
                <div class="timeframe-value" data-count="{{ $monthDeliveries }}">{{ $monthDeliveries }}</div>
                <div class="timeframe-progress">
                    <div class="progress-fill" style="width: {{ $monthDeliveries > 0 ? min(($monthDeliveries/500)*100, 100) : 0 }}%"></div>
                </div>
            </div>
            <div class="timeframe-sparkline">
                <svg width="60" height="30" viewBox="0 0 60 30">
                    <path d="M0,25 L15,10 L30,15 L45,5 L60,20" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Performance Metrics -->
    <div class="metrics-grid">
        <div class="metric-card metric-pending">
            <div class="metric-icon">
                <i class="fas fa-clock"></i>
            </div>
          <div class="metric-content">
    <div class="metric-value" data-count="{{ $pending }}">
        {{ $pending }}
    </div>

    <div class="metric-label">Pending</div>

    <div class="metric-progress">
        <div class="progress-bar"
            style="width: {{
                ($pending + $pickedUp + $inTransit + $delivered) > 0
                ? ($pending / ($pending + $pickedUp + $inTransit + $delivered)) * 100
                : 0
            }}%">
        </div>
    </div>
</div>
        </div>
        
        <div class="metric-card metric-pickedup">
            <div class="metric-icon">
                <i class="fas fa-box-open"></i>
            </div>
           <div class="metric-content">
    <div class="metric-value" data-count="{{ $pickedUp }}">
        {{ $pickedUp }}
    </div>

    <div class="metric-label">Picked Up</div>

    <div class="metric-progress">
        <div class="progress-bar"
            style="width: {{
                ($pending + $pickedUp + $inTransit + $delivered) > 0
                ? ($pickedUp / ($pending + $pickedUp + $inTransit + $delivered)) * 100
                : 0
            }}%">
        </div>
    </div>
</div>
        </div>
        
        <div class="metric-card metric-transit">
            <div class="metric-icon">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <div class="metric-content">
    <div class="metric-value" data-count="{{ $inTransit }}">
        {{ $inTransit }}
    </div>

    <div class="metric-label">In Transit</div>

    <div class="metric-progress">
        <div class="progress-bar"
            style="width: {{
                ($pending + $pickedUp + $inTransit + $delivered) > 0
                ? ($inTransit / ($pending + $pickedUp + $inTransit + $delivered)) * 100
                : 0
            }}%">
        </div>
    </div>
</div>
        </div>
        
        <div class="metric-card metric-delivered">
            <div class="metric-icon">
                <i class="fas fa-check-double"></i>
            </div>
           <div class="metric-content">
    <div class="metric-value" data-count="{{ $delivered }}">
        {{ $delivered }}
    

    <div class="metric-label">Delivered</div>
        </div>
    <div class="metric-progress">
        <div class="progress-bar"
            style="width: {{
                ($pending + $pickedUp + $inTransit + $delivered) > 0
                ? ($delivered / ($pending + $pickedUp + $inTransit + $delivered)) * 100
                : 0
            }}%">
        </div>
    </div>
</div>
        </div>
        
        <div class="metric-card metric-total">
            <div class="metric-icon">
                <i class="fas fa-trophy"></i>
            </div>
            <div class="metric-content">
    <div class="metric-value"
         data-count="{{ $pending + $pickedUp + $inTransit + $delivered }}">
        {{ $pending + $pickedUp + $inTransit + $delivered }}
    </div>

    <div class="metric-label">Total Shipments</div>

    <div class="metric-trend">
        <i class="fas fa-arrow-up text-success me-1"></i>
        {{ round($performance) }}% Success Rate
    </div>
</div>
        </div>
    </div>

    <!-- Information Cards Grid -->
    <div class="cards-grid container" >
        <!-- Personal Information -->
        <div class="info-card">
            <div class="card-header">
                <div class="header-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h3>Personal Information</h3>
            </div>
            <div class="card-body">
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-envelope"></i>
                        Email Address
                    </div>
                    <div class="info-value">{{ $rider->Email }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-phone-alt"></i>
                        Phone Number
                    </div>
                    <div class="info-value">{{ $rider->Phone }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-birthday-cake"></i>
                        Date of Birth
                    </div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($rider->DateOfBirth)->format('d M Y') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-user-check"></i>
                        Account Status
                    </div>
                    <div class="info-value status-badge status-{{ strtolower($rider->status) }}">
                        {{ ucfirst($rider->status) }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Employment Details -->
        <div class="info-card">
            <div class="card-header">
                <div class="header-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3>Employment Details</h3>
            </div>
            <div class="card-body">
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-calendar-check"></i>
                        Hire Date
                    </div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($rider->HireDate)->format('d M Y') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-clock"></i>
                        Working Shift
                    </div>
                    <div class="info-value shift-badge">{{ ucfirst($rider->WorkingShift) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-map-marker-alt"></i>
                        Working Zone
                    </div>
                    <div class="info-value zone-badge">{{ ucfirst($rider->WorkingZone) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-file-contract"></i>
                        Terms Accepted
                    </div>
                    <div class="info-value">
                        @if($rider->TermsAccepted)
                        <span class="badge-accepted">Accepted</span>
                        @else
                        <span class="badge-pending">Pending</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Vehicle Information -->
        <div class="info-card">
            <div class="card-header">
                <div class="header-icon">
                    <i class="fas fa-{{ $rider->VehicleType == 'bike' ? 'motorcycle' : 'car' }}"></i>
                </div>
                <h3>Vehicle Details</h3>
                <span class="vehicle-status {{ $rider->VehicleInspected ? 'verified' : 'pending' }}">
                    {{ $rider->VehicleInspected ? 'Verified' : 'Pending' }}
                </span>
            </div>
            <div class="card-body">
                <div class="vehicle-display">
                    <div class="vehicle-model">{{ $rider->VehicleModel }}</div>
                    <div class="vehicle-type">{{ ucfirst($rider->VehicleType) }}</div>
                </div>
                <div class="vehicle-details">
                    <div class="detail-item">
                        <span class="detail-label">License Number</span>
                        <span class="detail-value">{{ $rider->LicenseNumber }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Plate Number</span>
                        <span class="detail-value plate-number">{{ $rider->PlateNumber }}</span>
                    </div>
                </div>
                <div class="vehicle-inspection">
                    <div class="inspection-status">
                        <i class="fas fa-{{ $rider->VehicleInspected ? 'check-circle' : 'exclamation-circle' }}"></i>
                        Vehicle Inspection: {{ $rider->VehicleInspected ? 'Completed' : 'Required' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <!-- Delivery History -->
    <div class="delivery-section ">
        <div class="section-header ">
            <h2>
                <i class="fas fa-history"></i>
                Delivery History
            </h2>
            <div class="delivery-summary ">
                <span class="summary-item">
                    <i class="fas fa-list-alt"></i>
                    Total: {{ $shipments->count() }} shipments
                </span>
                <span class="summary-item">
                    <i class="fas fa-clock"></i>
                    Last Updated: {{ now()->format('d M Y, h:i A') }}
                </span>
            </div>
        </div>
        
        <div class="delivery-table-container">
            <div class="table-responsive">
                <table class="delivery-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Tracking #</th>
                            <th>Status</th>
                            <th>Timeline</th>
                            <th>Created</th>
                            <th>Delivered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shipments as $index => $shipment)
                        <tr class="delivery-row">
                            <td class="serial">{{ $index + 1 }}</td>
                            <td>
                                <div class="tracking-info">
                                    <i class="fas fa-barcode"></i>
                                    <span class="tracking-number">{{ $shipment->TrackingNumber }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="delivery-status status-{{ strtolower($shipment->Status) }}">
                                    {{ $shipment->Status }}
                                </span>
                            </td>
                            <td>
                                <div class="timeline-tracker">
                                    <div class="timeline-step {{ $shipment->PickedUpAt ? 'completed' : '' }}">
                                        <div class="step-icon">1</div>
                                        <span class="step-label">Picked</span>
                                    </div>
                                    <div class="timeline-line"></div>
                                    <div class="timeline-step {{ $shipment->InTransitAt ? 'completed' : '' }}">
                                        <div class="step-icon">2</div>
                                        <span class="step-label">Transit</span>
                                    </div>
                                    <div class="timeline-line"></div>
                                    <div class="timeline-step {{ $shipment->DeliveredAt ? 'completed' : '' }}">
                                        <div class="step-icon">3</div>
                                        <span class="step-label">Delivered</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="date-cell">
                                    <i class="fas fa-calendar"></i>
                                    {{ $shipment->created_at->format('d M Y') }}
                                </div>
                            </td>
                            <td>
                                @if($shipment->DeliveredAt)
                                <div class="date-cell delivered">
                                    <i class="fas fa-check-circle"></i>
                                    {{ \Carbon\Carbon::parse($shipment->DeliveredAt)->format('d M Y') }}
                                </div>
                                @else
                                <span class="pending-badge">Pending</span>
                                @endif
                            </td>
                           
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="fas fa-box-open"></i>
                                    <p>No delivery records found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Enhanced Modal -->
<div id="messageModal" class="modal-enhanced">
    <div class="modal-overlay" onclick="closeMessageModal()"></div>
    <div class="modal-container">
        <div class="modal-header">
            <h3><i class="fas fa-envelope"></i> Contact Rider</h3>
            <button class="modal-close" onclick="closeMessageModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="messageForm" method="POST" action="/sendridermessage">
            @csrf
            <input type="hidden" name="email" value="{{ $rider->Email }}">
            <input type="hidden" name="name" value="{{ $rider->Fullname }}">
            
            <div class="modal-body">
                <div class="form-group">
                    <label>Rider Name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" value="{{ $rider->Fullname }}" disabled>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Rider Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-control" value="{{ $rider->Email }}" disabled>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Subject</label>
                    <div class="input-with-icon">
                        <i class="fas fa-tag"></i>
                        <input type="text" name="subject" class="form-control" placeholder="Important delivery notice" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Message</label>
                    <div class="textarea-with-icon">
                        <i class="fas fa-edit"></i>
                        <textarea name="message" class="form-control" rows="6" placeholder="Write your message professionally..." required></textarea>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                
                <button type="button" class="btn-cancel" onclick="closeMessageModal()">Cancel</button>
                <button type="submit" class="btn-send" >
                    <i class="fas fa-paper-plane"></i>
                    Send Message
                    
                </button>
                
            </div>

        </form>
    </div>
</div>

<!-- Shipment Details Modal -->
<div id="shipmentModal" class="modal-enhanced">
    <div class="modal-overlay" onclick="closeShipmentModal()"></div>
    <div class="modal-container" style="max-width: 600px;">
        <div class="modal-header">
            <h3><i class="fas fa-box"></i> Shipment Details</h3>
            <button class="modal-close" onclick="closeShipmentModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="shipmentModalContent">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>

<style>
:root {
    --primary-red: #dc3545;
    --red-light: #ff4757;
    --red-dark: #c82333;
    --white: #ffffff;
    --gray-50: #f8f9fa;
    --gray-100: #f1f3f5;
    --gray-200: #e9ecef;
    --gray-300: #dee2e6;
    --gray-400: #ced4da;
    --gray-500: #adb5bd;
    --gray-600: #868e96;
    --gray-700: #495057;
    --gray-800: #343a40;
    --gray-900: #212529;
    --success: #28a745;
    --warning: #ffc107;
    --info: #17a2b8;
    --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
    --shadow-md: 0 6px 20px rgba(0,0,0,0.12);
    --shadow-lg: 0 12px 35px rgba(0,0,0,0.15);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
}

.dashboard-container {
    padding: 24px;
    background: linear-gradient(135deg, var(--gray-50) 0%, var(--white) 100%);
    min-height: 100vh;
}

/* Header Styles - Updated */
.dashboard-header {
    margin-bottom: 32px;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.page-title {
    display: flex;
    align-items: center;
    gap: 16px;
}

.title-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--primary-red), var(--red-dark));
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 24px;
    box-shadow: var(--shadow-md);
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

.page-title h1 {
    font-size: 28px;
    font-weight: 800;
    background: linear-gradient(45deg, var(--primary-red), var(--red-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 0;
    line-height: 1.2;
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gray-600);
    font-size: 14px;
    margin-top: 4px;
}

.breadcrumb .current {
    color: var(--primary-red);
    font-weight: 600;
}

.header-actions {
    display: flex;
    gap: 12px;
}

.btn-action {
    padding: 10px 20px;
    border: none;
    border-radius: var(--radius-sm);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    position: relative;
    overflow: hidden;
}

.btn-action::after {
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

.btn-action:hover::after {
    width: 300px;
    height: 300px;
}

.btn-message {
    background: linear-gradient(135deg, var(--primary-red), var(--red-dark));
    color: var(--white);
    box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
}

.btn-message:hover {
    background: linear-gradient(135deg, var(--red-dark), var(--primary-red));
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 10px 25px rgba(220, 53, 69, 0.4);
}

.btn-edit {
    background: var(--white);
    color: var(--primary-red);
    border: 2px solid var(--primary-red);
    text-decoration: none;
    padding: 8px 18px;
}

.btn-edit:hover {
    background: var(--primary-red);
    color: var(--white);
    transform: translateY(-2px);
}

.btn-more {
    width: 40px;
    height: 40px;
    border: 1px solid var(--gray-300);
    background: var(--white);
    color: var(--gray-700);
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.btn-more:hover {
    border-color: var(--primary-red);
    color: var(--primary-red);
    transform: rotate(90deg);
}

/* Profile Summary */
.profile-summary {
    background: linear-gradient(135deg, var(--white) 0%, var(--gray-50) 100%);
    border-radius: var(--radius-lg);
    padding: 32px;
    display: flex;
    align-items: center;
    gap: 32px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.profile-summary::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(220, 53, 69, 0.1), transparent);
    transform: rotate(45deg);
    animation: shines 3s infinite;
}

@keyframes shines {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
}

.profile-summary:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.profile-avatar {
    position: relative;
}

.avatar-circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-red), var(--red-dark));
    color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    font-weight: 700;
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
    transition: all 0.3s ease;
}

.avatar-circle:hover {
    transform: scale(1.1) rotate(5deg);
}

.status-indicator {
    position: absolute;
    bottom: 8px;
    right: 8px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 3px solid var(--white);
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.status-indicator.active {
    background: var(--success);
}

.status-indicator.inactive {
    background: var(--warning);
}

.profile-details {
    flex: 1;
}

.profile-details h2 {
    font-size: 32px;
    font-weight: 800;
    color: var(--gray-900);
    margin: 0 0 12px 0;
    line-height: 1.2;
}

.profile-meta {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gray-600);
    font-size: 14px;
    padding: 8px 16px;
    background: var(--gray-100);
    border-radius: 50px;
    transition: all 0.3s ease;
}

.meta-item:hover {
    background: linear-gradient(135deg, var(--red-light), var(--primary-red));
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

.meta-item i {
    color: var(--primary-red);
    transition: color 0.3s ease;
}

.meta-item:hover i {
    color: var(--white);
}

.profile-stats {
    display: flex;
    gap: 32px;
}

.stat-box {
    text-align: center;
    padding: 16px;
    min-width: 100px;
    background: var(--white);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
}

.stat-box:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.stat-value {
    font-size: 32px;
    font-weight: 800;
    color: var(--primary-red);
    line-height: 1;
    margin-bottom: 4px;
    transition: all 0.3s ease;
}

.stat-box:hover .stat-value {
    background: linear-gradient(45deg, var(--primary-red), var(--red-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.stat-label {
    font-size: 14px;
    color: var(--gray-600);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Today & Month Deliveries - Enhanced */
.delivery-timeframe {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 32px;
}

.timeframe-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: var(--shadow-sm);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
    border: 1px solid transparent;
}

.timeframe-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.today-card {
    background: linear-gradient(135deg, #ff6b6b, #ff4757);
    color: var(--white);
    border: none;
}

.today-card:hover {
    background: linear-gradient(135deg, #ff4757, #ff3838);
}

.month-card {
    background: linear-gradient(135deg, #2ed573, #1dd1a1);
    color: var(--white);
    border: none;
}

.month-card:hover {
    background: linear-gradient(135deg, #1dd1a1, #10ac84);
}

.timeframe-icon {
    width: 64px;
    height: 64px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.timeframe-card:hover .timeframe-icon {
    transform: scale(1.1) rotate(10deg);
    background: rgba(255, 255, 255, 0.3);
}

.timeframe-content {
    flex: 1;
}

.timeframe-label {
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    opacity: 0.9;
    margin-bottom: 8px;
}

.timeframe-value {
    font-size: 36px;
    font-weight: 800;
    line-height: 1;
    margin-bottom: 12px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.timeframe-progress {
    height: 6px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 3px;
    overflow: hidden;
    margin-top: 8px;
}

.progress-fill {
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 3px;
    transition: width 1.5s ease-out;
    position: relative;
    overflow: hidden;
}

.progress-fill::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.timeframe-sparkline {
    opacity: 0.7;
    transition: all 0.3s ease;
}

.timeframe-card:hover .timeframe-sparkline {
    opacity: 1;
    transform: translateY(-5px);
}

/* Metrics Grid */
.metrics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 32px;
}

.metric-card {
    background: var(--white);
    border-radius: var(--radius-md);
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: var(--shadow-sm);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
    border: 1px solid transparent;
}

.metric-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-red), var(--red-light));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.metric-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-red);
}

.metric-card:hover::before {
    transform: scaleX(1);
}

.metric-pending { border-top: 4px solid var(--warning); }
.metric-pickedup { border-top: 4px solid var(--info); }
.metric-transit { border-top: 4px solid #9c27b0; }
.metric-delivered { border-top: 4px solid var(--success); }
.metric-total { border-top: 4px solid var(--primary-red); }

.metric-icon {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: var(--white);
    transition: all 0.3s ease;
}

.metric-card:hover .metric-icon {
    transform: scale(1.1) rotate(10deg);
}

.metric-pending .metric-icon { background: linear-gradient(135deg, var(--warning), #ff9800); }
.metric-pickedup .metric-icon { background: linear-gradient(135deg, var(--info), #2196f3); }
.metric-transit .metric-icon { background: linear-gradient(135deg, #9c27b0, #673ab7); }
.metric-delivered .metric-icon { background: linear-gradient(135deg, var(--success), #4caf50); }
.metric-total .metric-icon { background: linear-gradient(135deg, var(--primary-red), var(--red-dark)); }

.metric-content {
    flex: 1;
}

.metric-value {
    font-size: 32px;
    font-weight: 800;
    color: var(--gray-900);
    line-height: 1;
    margin-bottom: 4px;
}

.metric-label {
    font-size: 14px;
    color: var(--gray-600);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
}

.metric-progress {
    height: 6px;
    background: var(--gray-200);
    border-radius: 3px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, var(--primary-red), var(--red-light));
    border-radius: 3px;
    transition: width 1.5s ease-out;
}

.metric-trend {
    font-size: 12px;
    color: var(--success);
    display: flex;
    align-items: center;
    gap: 4px;
    margin-top: 8px;
}

/* Cards Grid */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 24px;
    margin-bottom: 32px;
}

.info-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all 0.4s ease;
    border: 1px solid var(--gray-200);
}

.info-card:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-red);
}

.card-header {
    padding: 20px 24px;
    background: linear-gradient(to right, var(--gray-50), var(--white));
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    align-items: center;
    gap: 16px;
}

.header-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--primary-red), var(--red-dark));
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 18px;
    transition: all 0.3s ease;
}

.info-card:hover .header-icon {
    transform: rotate(360deg);
}

.card-header h3 {
    flex: 1;
    font-size: 18px;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0;
}

.vehicle-status {
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.vehicle-status.verified {
    background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.2));
    color: var(--success);
    border: 1px solid rgba(40, 167, 69, 0.2);
}

.vehicle-status.pending {
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.2));
    color: var(--warning);
    border: 1px solid rgba(255, 193, 7, 0.2);
}

.card-body {
    padding: 24px;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--gray-100);
}

.info-item:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
}

.info-label {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gray-600);
    font-size: 14px;
}

.info-label i {
    color: var(--primary-red);
    width: 16px;
    transition: color 0.3s ease;
}

.info-item:hover .info-label i {
    color: var(--red-dark);
    transform: scale(1.1);
}

.info-value {
    font-size: 16px;
    font-weight: 600;
    color: var(--gray-900);
    transition: all 0.3s ease;
}

.info-item:hover .info-value {
    color: var(--primary-red);
    padding-left: 5px;
}

.status-badge {
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
    transition: all 0.3s ease;
}

.status-active { 
    background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.2));
    color: var(--success);
    border: 1px solid rgba(40, 167, 69, 0.2);
}
.status-inactive { 
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.2));
    color: var(--warning);
    border: 1px solid rgba(255, 193, 7, 0.2);
}
.status-suspended { 
    background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.2));
    color: var(--primary-red);
    border: 1px solid rgba(220, 53, 69, 0.2);
}

.shift-badge, .zone-badge {
    padding: 6px 12px;
    background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
    color: var(--gray-700);
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.shift-badge:hover, .zone-badge:hover {
    background: linear-gradient(135deg, var(--primary-red), var(--red-dark));
    color: var(--white);
    transform: translateY(-2px);
}

.badge-accepted {
    padding: 6px 12px;
    background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.2));
    color: var(--success);
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

.badge-pending {
    padding: 6px 12px;
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.2));
    color: var(--warning);
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

.vehicle-display {
    text-align: center;
    padding: 20px;
    background: linear-gradient(135deg, var(--gray-50), var(--white));
    border-radius: var(--radius-md);
    margin-bottom: 20px;
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.info-card:hover .vehicle-display {
    border-color: var(--primary-red);
    background: linear-gradient(135deg, rgba(220, 53, 69, 0.05), rgba(220, 53, 69, 0.1));
}

.vehicle-model {
    font-size: 24px;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: 4px;
    transition: all 0.3s ease;
}

.info-card:hover .vehicle-model {
    color: var(--primary-red);
}

.vehicle-type {
    color: var(--gray-600);
    font-size: 14px;
}

.vehicle-details {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 20px;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    background: var(--gray-50);
    border-radius: var(--radius-sm);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.detail-item:hover {
    background: var(--white);
    border-color: var(--primary-red);
    transform: translateX(5px);
}

.detail-label {
    color: var(--gray-600);
    font-size: 14px;
}

.detail-value {
    font-weight: 600;
    color: var(--gray-900);
    font-family: 'Courier New', monospace;
    letter-spacing: 1px;
}

.plate-number {
    background: var(--gray-100);
    padding: 4px 8px;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.detail-item:hover .plate-number {
    background: var(--primary-red);
    color: var(--white);
}

.vehicle-inspection {
    padding-top: 16px;
    border-top: 1px solid var(--gray-200);
}

.inspection-status {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gray-700);
    font-weight: 600;
    transition: all 0.3s ease;
}

.inspection-status i {
    color: var(--primary-red);
    transition: all 0.3s ease;
}

.info-card:hover .inspection-status i {
    transform: scale(1.2);
}

/* Delivery Section */
.delivery-section {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.delivery-section:hover {
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-red);
}

.section-header {
    padding: 20px 24px;
    background: linear-gradient(to right, var(--white), var(--gray-50));
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.section-header h2 {
    font-size: 20px;
    font-weight: 700;
    color: var(--gray-900);
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0;
}

.section-header h2 i {
    color: var(--primary-red);
    animation: spin 10s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.delivery-summary {
    display: flex;
    gap: 20px;
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--gray-600);
    font-size: 14px;
    padding: 6px 12px;
    background: var(--gray-100);
    border-radius: 20px;
    transition: all 0.3s ease;
}

.summary-item:hover {
    background: var(--primary-red);
    color: var(--white);
    transform: translateY(-2px);
}

.summary-item i {
    font-size: 12px;
}

/* Delivery Table */
.delivery-table-container {
    padding: 0;
}

.delivery-table {
    overflow: hidden;
    width: 100%;
    border-collapse: collapse;
}

.delivery-table thead {
    background: linear-gradient(to right, var(--primary-red), var(--red-dark));
    position: sticky;
    top: 0;
    z-index: 10;
}

.delivery-table th {
    padding: 16px 24px;
    text-align: left;
    color: var(--white);
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.delivery-table th::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to right, transparent, var(--white), transparent);
    transform: translateX(-100%);
    transition: transform 0.5s ease;
}

.delivery-table thead:hover th::after {
    transform: translateX(100%);
}

.delivery-table tbody tr {
    border-bottom: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.delivery-table tbody tr:hover {
    background: rgba(220, 53, 69, 0.04);
    transform: translateX(8px);
}

.delivery-table td {
    padding: 16px 24px;
    vertical-align: middle;
}

.serial {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: var(--gray-600);
    text-align: center;
}

.tracking-info {
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.delivery-row:hover .tracking-info {
    transform: translateX(5px);
}

.tracking-info i {
    color: var(--primary-red);
    transition: all 0.3s ease;
}

.delivery-row:hover .tracking-info i {
    transform: rotate(360deg);
}

.tracking-number {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: var(--gray-800);
    transition: all 0.3s ease;
}

.delivery-row:hover .tracking-number {
    color: var(--primary-red);
}

.delivery-status {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
    transition: all 0.3s ease;
}

.delivery-row:hover .delivery-status {
    transform: scale(1.1);
}

.status-pending { 
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.2));
    color: var(--warning);
    border: 1px solid rgba(255, 193, 7, 0.3);
}
.status-pickedup { 
    background: linear-gradient(135deg, rgba(23, 162, 184, 0.1), rgba(23, 162, 184, 0.2));
    color: var(--info);
    border: 1px solid rgba(23, 162, 184, 0.3);
}
.status-intransit { 
    background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(156, 39, 176, 0.2));
    color: #9c27b0;
    border: 1px solid rgba(156, 39, 176, 0.3);
}
.status-delivered { 
    background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.2));
    color: var(--success);
    border: 1px solid rgba(40, 167, 69, 0.3);
}

.timeline-tracker {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 200px;
}

.timeline-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    position: relative;
    z-index: 1;
}

.step-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: var(--gray-300);
    color: var(--white);
    font-size: 10px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.timeline-step.completed .step-icon {
    background: linear-gradient(135deg, var(--primary-red), var(--red-dark));
    box-shadow: 0 0 10px rgba(220, 53, 69, 0.3);
}

.step-label {
    font-size: 10px;
    color: var(--gray-600);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.delivery-row:hover .step-label {
    color: var(--primary-red);
}

.timeline-line {
    flex: 1;
    height: 2px;
    background: var(--gray-300);
    margin: 0 4px;
    transition: all 0.3s ease;
}

.timeline-step.completed ~ .timeline-line {
    background: var(--primary-red);
}

.date-cell {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gray-700);
    font-size: 14px;
    transition: all 0.3s ease;
}

.delivery-row:hover .date-cell {
    color: var(--primary-red);
}

.date-cell i {
    color: var(--gray-500);
    transition: all 0.3s ease;
}

.delivery-row:hover .date-cell i {
    color: var(--primary-red);
    transform: scale(1.2);
}

.date-cell.delivered i {
    color: var(--success);
}

.pending-badge {
    padding: 4px 8px;
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.2));
    color: var(--warning);
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.delivery-row:hover .pending-badge {
    transform: scale(1.1);
}

.action-buttons {
    display: flex;
    gap: 8px;
}

.action-btn {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-sm);
    border: 1px solid var(--gray-300);
    background: var(--white);
    color: var(--gray-600);
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.action-btn::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(220, 53, 69, 0.1);
    transform: translate(-50%, -50%);
    transition: width 0.3s, height 0.3s;
}

.action-btn:hover::after {
    width: 100px;
    height: 100px;
}

.view-btn:hover {
    background: var(--info);
    color: var(--white);
    border-color: var(--info);
    transform: scale(1.1);
}

.track-btn:hover {
    background: var(--success);
    color: var(--white);
    border-color: var(--success);
    transform: scale(1.1);
}

.empty-state {
    text-align: center;
    padding: 60px;
    color: var(--gray-500);
}

.empty-state i {
    font-size: 48px;
    margin-bottom: 16px;
    opacity: 0.3;
    animation: float 3s ease-in-out infinite;
}

.empty-state p {
    margin: 0;
    font-size: 14px;
}

/* Modal - Fixed and Enhanced */
.modal-enhanced {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    align-items: center;
    justify-content: center;
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(4px);
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.modal-container {
    position: relative;
    background: var(--white);
    border-radius: var(--radius-lg);
    margin: 20px;
    max-width: 600px;
    max-height: 90vh;
    animation: modalSlideIn 0.3s ease;
    box-shadow: 0 25px 50px rgba(0,0,0,0.3);
    z-index: 10000;
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

.modal-header {
    padding: 24px;
    border-bottom: 1px solid var(--gray-200);
    background: linear-gradient(to right, var(--primary-red), var(--red-dark));
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.modal-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
    transform: rotate(45deg);
    animation: shines 2s infinite;
}

.modal-header h3 {
    font-size: 20px;
    font-weight: 700;
    color: var(--white);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
    position: relative;
    z-index: 1;
}

.modal-close {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-sm);
    border: 1px solid rgba(255, 255, 255, 0.3);
    background: transparent;
    color: var(--white);
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 1;
}

.modal-close:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: rotate(90deg);
}

.modal-body {
    padding: 24px;
    max-height: calc(90vh - 140px);
    overflow-y: auto;
}

.form-group {
    margin-bottom: 20px;
    animation: slideUp 0.5s ease;
    animation-fill-mode: both;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-group:nth-child(1) { animation-delay: 0.1s; }
.form-group:nth-child(2) { animation-delay: 0.2s; }
.form-group:nth-child(3) { animation-delay: 0.3s; }
.form-group:nth-child(4) { animation-delay: 0.4s; }

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-group label::before {
    content: '';
    width: 6px;
    height: 6px;
    background: var(--primary-red);
    border-radius: 50%;
}

.input-with-icon,
.textarea-with-icon {
    position: relative;
}

.input-with-icon i,
.textarea-with-icon i {
    position: absolute;
    left: 12px;
    top: 12px;
    color: var(--primary-red);
    width: 16px;
    transition: all 0.3s ease;
}

.input-with-icon:focus-within i,
.textarea-with-icon:focus-within i {
    color: var(--red-dark);
    transform: scale(1.2);
}

.input-with-icon input,
.textarea-with-icon textarea {
    width: 100%;
    padding: 12px 12px 12px 40px;
    border: 2px solid var(--gray-300);
    border-radius: var(--radius-sm);
    font-size: 14px;
    background: var(--white);
    transition: all 0.3s ease;
}

.textarea-with-icon textarea {
    min-height: 120px;
    resize: vertical;
    padding-top: 12px;
}

.input-with-icon input:focus,
.textarea-with-icon textarea:focus {
    outline: none;
    border-color: var(--primary-red);
    box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1);
    transform: translateY(-2px);
}

.modal-footer {

    padding: 16px 24px;
    background: var(--gray-50);
    border-top: 1px solid var(--gray-200);
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    
}

.btn-cancel,
.btn-send {
    padding: 10px 24px;
    border-radius: var(--radius-sm);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    position: relative;
    overflow: hidden;
    
}

.btn-cancel {
    background: var(--white);
    color: var(--gray-700);
    border: 2px solid var(--gray-300);
}

.btn-cancel:hover {
    background: var(--gray-100);
    border-color: var(--gray-400);
    transform: translateY(-2px);
}

.btn-send {
    background: linear-gradient(135deg, var(--primary-red), var(--red-dark));
    color: var(--white);
    border: none;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
}

.btn-send:hover {
    background: linear-gradient(135deg, var(--red-dark), var(--primary-red));
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
}

.btn-send::after {
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

.btn-send:hover::after {
    width: 300px;
    height: 300px;
}

/* Shipment Modal Specific */
#shipmentModal .modal-container {
    max-width: 500px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .cards-grid {
        grid-template-columns: 1fr;
    }
    
    .metrics-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .delivery-timeframe {
        grid-template-columns: 1fr;
    }
    
    .delivery-summary {
        flex-direction: column;
        gap: 10px;
    }
}

@media (max-width: 768px) {
    .dashboard-container {
        padding: 16px;
    }
    
    .header-content {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }
    
    .profile-summary {
        flex-direction: column;
        text-align: center;
        gap: 24px;
    }
    
    .profile-meta {
        justify-content: center;
    }
    
    .profile-stats {
        justify-content: center;
        gap: 16px;
    }
    
    .metrics-grid {
        grid-template-columns: 1fr;
    }
    
    .section-header {
        flex-direction: column;
        gap: 16px;
        text-align: center;
    }
    
    .delivery-table th,
    .delivery-table td {
        padding: 12px;
        font-size: 12px;
    }
    
    .timeline-tracker {
        flex-direction: column;
        gap: 8px;
    }
    
    .timeline-line {
        width: 2px;
        height: 20px;
    }
    
    .header-actions {
        width: 100%;
        justify-content: space-between;
    }
    
    .modal-container {
        margin: 10px;
        max-height: 95vh;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize animated counters
    initializeCounters();
    
    // Initialize modals
    initializeModals();
    
    // Add ripple effects
    initializeRippleEffects();
});

function initializeCounters() {
    // Animated counters for all numeric values
    const counters = document.querySelectorAll('.metric-value, .timeframe-value, .stat-value');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count') || counter.textContent);
        const count = parseInt(counter.textContent);
        
        if (!isNaN(target) && count > 0) {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current);
                }
            }, 20);
        }
    });
}

function initializeModals() {
    // Message Modal
    window.openMessageModal = function() {
        const modal = document.getElementById('messageModal');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        // Focus on subject input
        setTimeout(() => {
            const subjectInput = modal.querySelector('input[name="subject"]');
            if (subjectInput) subjectInput.focus();
        }, 300);
    };
    
    window.closeMessageModal = function() {
        const modal = document.getElementById('messageModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    };
    
    // Shipment Modal
    window.closeShipmentModal = function() {
        const modal = document.getElementById('shipmentModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    };
    
    // Close modals on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeMessageModal();
            closeShipmentModal();
        }
    });
    
    // Prevent modal close when clicking inside modal
    const modals = document.querySelectorAll('.modal-container');
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
}

function initializeRippleEffects() {
    const buttons = document.querySelectorAll('.btn-action, .action-btn, .btn-send, .btn-cancel, .modal-close');
    
    buttons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            createRippleEffect(this, e);
        });
    });
}

function createRippleEffect(element, event) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.cssText = `
        position: absolute;
        border-radius: 50%;
        background: ${element.classList.contains('btn-action') || element.classList.contains('btn-send') 
            ? 'rgba(255, 255, 255, 0.4)' 
            : 'rgba(220, 53, 69, 0.2)'};
        transform: scale(0);
        animation: ripple 0.6s linear;
        width: ${size}px;
        height: ${size}px;
        top: ${y}px;
        left: ${x}px;
        pointer-events: none;
    `;
    
    element.style.position = 'relative';
    element.style.overflow = 'hidden';
    element.appendChild(ripple);
    
    setTimeout(() => ripple.remove(), 600);
}

// Shipment Details Functions
function viewShipmentDetails(shipmentId) {
    const modal = document.getElementById('shipmentModal');
    const content = document.getElementById('shipmentModalContent');
    
    // Show loading
    content.innerHTML = `
        <div class="text-center p-8">
            <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-red-600 mb-4"></div>
            <p>Loading shipment details...</p>
        </div>
    `;
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    // Simulate API call
    setTimeout(() => {
        content.innerHTML = `
            <div class="space-y-6">
                <div class="text-center">
                    <div class="text-4xl text-red-500 mb-3">
                        <i class="fas fa-box"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-1">Shipment #${shipmentId}</h4>
                    <p class="text-gray-600">Tracking Number: TRK${shipmentId.toString().padStart(8, '0')}</p>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-500 mb-1">Status</div>
                        <div class="font-semibold text-green-600">Delivered</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-500 mb-1">Delivery Date</div>
                        <div class="font-semibold">${new Date().toLocaleDateString()}</div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="text-sm text-gray-500 mb-2">Delivery Address</div>
                    <div class="font-medium">123 Main Street, New York, NY 10001</div>
                </div>
                
                <div class="flex justify-center">
                    <button onclick="trackShipment('${shipmentId}')" 
                            class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors flex items-center gap-2">
                        <i class="fas fa-map-marked-alt"></i>
                        Track This Shipment
                    </button>
                </div>
            </div>
        `;
    }, 800);
}

function trackShipment(shipmentId) {
    closeShipmentModal();
    
    // Create tracking modal
    const modalHTML = `
        <div class="modal-enhanced" id="trackingModal">
            <div class="modal-overlay" onclick="closeTrackingModal()"></div>
            <div class="modal-container" style="max-width: 400px;">
                <div class="modal-header">
                    <h3><i class="fas fa-map-marked-alt"></i> Live Tracking</h3>
                    <button class="modal-close" onclick="closeTrackingModal()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center p-6">
                        <div class="text-4xl text-green-500 mb-4 animate-pulse">
                            <i class="fas fa-satellite"></i>
                        </div>
                        <h4 class="text-xl font-bold mb-2">Tracking Active</h4>
                        <p class="text-gray-600 mb-4">Shipment #${shipmentId}</p>
                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <div class="text-sm text-gray-500">Current Location</div>
                            <div class="font-semibold">Brooklyn, New York</div>
                            <div class="text-xs text-gray-500 mt-1">Updated: Just now</div>
                        </div>
                        <div class="flex gap-3">
                            <button class="flex-1 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                <i class="fas fa-directions"></i> Directions
                            </button>
                            <button class="flex-1 px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                                <i class="fas fa-share"></i> Share
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    const trackingModal = document.getElementById('trackingModal');
    trackingModal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    window.closeTrackingModal = function() {
        trackingModal.remove();
        document.body.style.overflow = 'auto';
    };
}

// Message Form Submission
const messageForm = document.getElementById('messageForm');
if (messageForm) {
    messageForm.addEventListener('submit', function(e) {
        // e.preventDefault();
        
        const sendBtn = this.querySelector('.btn-send');
        const originalText = sendBtn.innerHTML;
        const originalBg = sendBtn.style.background;
        
        // Show loading state
        sendBtn.innerHTML = `
            <span class="flex items-center gap-2">
                <i class="fas fa-spinner fa-spin"></i>
                Sending...
            </span>
        `;
        sendBtn.disabled = true;
        
        // Simulate sending
        setTimeout(() => {
            sendBtn.innerHTML = `
                <span class="flex items-center gap-2">
                    <i class="fas fa-check"></i>
                    Sent Successfully!
                </span>
            `;
            sendBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
            
            setTimeout(() => {
                sendBtn.innerHTML = originalText;
                sendBtn.style.background = originalBg;
                sendBtn.disabled = false;
                closeMessageModal();
                
                // Reset form
                this.reset();
                
                // Show success notification
                showNotification('Message sent successfully!', 'success');
            }, 1500);
        }, 1500);
    });
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-9999 ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } text-white`;
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Add animation styles
    notification.style.animation = 'slideInRight 0.3s ease';
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Add CSS for animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOutRight {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
    
    @keyframes ripple {
        to { transform: scale(4); opacity: 0; }
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .animate-spin {
        animation: spin 1s linear infinite;
    }
    
    .z-9999 {
        z-index: 9999;
    }
    
    /* Custom scrollbar */
    .modal-body::-webkit-scrollbar {
        width: 6px;
    }
    
    .modal-body::-webkit-scrollbar-track {
        background: var(--gray-100);
        border-radius: 3px;
    }
    
    .modal-body::-webkit-scrollbar-thumb {
        background: var(--primary-red);
        border-radius: 3px;
    }
    
    .modal-body::-webkit-scrollbar-thumb:hover {
        background: var(--red-dark);
    }
`;
document.head.appendChild(style);
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection