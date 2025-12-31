@extends('Rider.riderlayout')
@section('content')


<div class="container-fluid px-3 px-md-4 py-3" style="background: linear-gradient(135deg, #fff5f5 0%, #fff 100%); min-height: 100vh;">
    <!-- Header with Stats -->
    <div class="row mb-4 align-items-end">
        <div class="col-lg-8 col-md-7 mb-3 mb-md-0">
            <div class="d-flex align-items-center">
                <div class="header-icon-container me-3">
                    <i class="fas fa-shipping-fast text-white"></i>
                </div>
                <div>
                    <h1 class="h2 fw-bold text-dark mb-1">My Shipments</h1>
                    <p class="text-muted mb-0">Manage and track all your delivery assignments</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="card border-0 shadow-sm bg-white">
                <div class="card-body py-2 px-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block">Total Shipments</small>
                            <h3 class="fw-bold mb-0 text-danger" id="totalShipments">{{ $shipments->count() }}</h3>
                        </div>
                        <button class="btn btn-danger btn-sm d-flex align-items-center" type="button" id="clearFilters">
                            <i class="fas fa-sync-alt me-2"></i>Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Filter Tabs -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body py-3">
                    <div class="filter-tabs d-flex flex-wrap justify-content-center gap-2">
                        <button class="filter-tab btn btn-outline-danger active" data-filter="all">
                            <i class="fas fa-box me-2"></i>All Shipments
                            <span class="badge bg-danger ms-2">{{ $shipments->count() }}</span>
                        </button>
                        <button class="filter-tab btn btn-outline-danger" data-filter="Pending">
                            <i class="fas fa-clock me-2"></i>Pending
                            <span class="badge bg-warning ms-2">{{ $shipments->where('Status', 'Pending')->count() }}</span>
                        </button>
                        <button class="filter-tab btn btn-outline-danger" data-filter="PickedUp">
                            <i class="fas fa-box-open me-2"></i>Picked Up
                            <span class="badge bg-purple ms-2">{{ $shipments->where('Status', 'PickedUp')->count() }}</span>
                        </button>
                        <button class="filter-tab btn btn-outline-danger" data-filter="InTransit">
                            <i class="fas fa-truck me-2"></i>In Transit
                            <span class="badge bg-info ms-2">{{ $shipments->where('Status', 'InTransit')->count() }}</span>
                        </button>
                        <button class="filter-tab btn btn-outline-danger" data-filter="Delivered">
                            <i class="fas fa-check-circle me-2"></i>Delivered
                            <span class="badge bg-success ms-2">{{ $shipments->where('Status', 'Delivered')->count() }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="card stat-card border-0 shadow-sm h-100" style="border-left: 4px solid #ff9800;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted text-uppercase small mb-1">Pending</h6>
                            <h2 class="fw-bold mb-0">{{ $shipments->where('Status', 'Pending')->count() }}</h2>
                            <small class="text-muted">{{ round(($shipments->where('Status', 'Pending')->count() / max($shipments->count(), 1)) * 100) }}% of total</small>
                        </div>
                        <div class="stat-icon bg-warning-light">
                            <i class="fas fa-clock text-warning"></i>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar bg-warning" style="width: {{ ($shipments->where('Status', 'Pending')->count() / max($shipments->count(), 1)) * 100 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="card stat-card border-0 shadow-sm h-100" style="border-left: 4px solid #2196f3;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted text-uppercase small mb-1">In Transit</h6>
                            <h2 class="fw-bold mb-0">{{ $shipments->where('Status', 'InTransit')->count() }}</h2>
                            <small class="text-muted">{{ round(($shipments->where('Status', 'InTransit')->count() / max($shipments->count(), 1)) * 100) }}% of total</small>
                        </div>
                        <div class="stat-icon bg-info-light">
                            <i class="fas fa-truck-moving text-info"></i>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar bg-info" style="width: {{ ($shipments->where('Status', 'InTransit')->count() / max($shipments->count(), 1)) * 100 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="card stat-card border-0 shadow-sm h-100" style="border-left: 4px solid #9c27b0;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted text-uppercase small mb-1">Picked Up</h6>
                            <h2 class="fw-bold mb-0">{{ $shipments->where('Status', 'PickedUp')->count() }}</h2>
                            <small class="text-muted">{{ round(($shipments->where('Status', 'PickedUp')->count() / max($shipments->count(), 1)) * 100) }}% of total</small>
                        </div>
                        <div class="stat-icon bg-purple-light">
                            <i class="fas fa-box-open text-purple"></i>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar bg-purple" style="width: {{ ($shipments->where('Status', 'PickedUp')->count() / max($shipments->count(), 1)) * 100 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="card stat-card border-0 shadow-sm h-100" style="border-left: 4px solid #4caf50;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted text-uppercase small mb-1">Delivered</h6>
                            <h2 class="fw-bold mb-0">{{ $shipments->where('Status', 'Delivered')->count() }}</h2>
                            <small class="text-muted">{{ round(($shipments->where('Status', 'Delivered')->count() / max($shipments->count(), 1)) * 100) }}% of total</small>
                        </div>
                        <div class="stat-icon bg-success-light">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar bg-success" style="width: {{ ($shipments->where('Status', 'Delivered')->count() / max($shipments->count(), 1)) * 100 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shipments Grid -->
    <div class="row g-4" id="shipmentsContainer">
        @if($shipments->count() > 0)
            @foreach($shipments as $shipment)
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 shipment-card-wrapper" data-status="{{ $shipment->Status }}">
                    <div class="card shipment-card border-0 shadow-sm h-100">
                        <!-- Card Header -->
                        <div class="card-header bg-white border-0 pb-0 pt-4 px-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="text-muted small mb-1">SHIPMENT ID</h6>
                                    <h5 class="fw-bold text-dark mb-0">#{{ str_pad($shipment->id, 6, '0', STR_PAD_LEFT) }}</h5>
                                </div>
                                <span class="status-badge badge rounded-pill py-2 px-3 
                                    @if($shipment->Status == 'Delivered') bg-success
                                    @elseif($shipment->Status == 'Pending') bg-warning
                                    @elseif($shipment->Status == 'InTransit') bg-info
                                    @elseif($shipment->Status == 'PickedUp') bg-purple
                                    @else bg-danger @endif">
                                    {{ $shipment->Status }}
                                </span>
                            </div>
                            
                            <!-- Tracking Info -->
                            <div class="tracking-card bg-light p-3 rounded">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted small mb-1">TRACKING NUMBER</h6>
                                        <h6 class="fw-bold mb-0 text-dark">{{ $shipment->TrackingNumber }}</h6>
                                    </div>
                                    <button class="btn btn-sm btn-light copy-tracking" data-tracking="{{ $shipment->TrackingNumber }}">
                                        <i class="fas fa-copy text-danger"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body px-4 pt-3">
                            <!-- Shipment Details -->
                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <div class="detail-item">
                                        <div class="detail-icon bg-danger-light">
                                            <i class="fas fa-user text-danger"></i>
                                        </div>
                                        <div class="detail-content">
                                            <small class="text-muted d-block">Receiver</small>
                                            <span class="fw-bold text-truncate d-block">{{ $shipment->ReceiverName }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="detail-item">
                                        <div class="detail-icon bg-danger-light">
                                            <i class="fas fa-map-marker-alt text-danger"></i>
                                        </div>
                                        <div class="detail-content">
                                            <small class="text-muted d-block">Zone</small>
                                            <span class="fw-bold">{{ $shipment->DeliveryZone }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="detail-item">
                                        <div class="detail-icon bg-danger-light">
                                            <i class="fas fa-location-dot text-danger"></i>
                                        </div>
                                        <div class="detail-content">
                                            <small class="text-muted d-block">Delivery Address</small>
                                            <span class="fw-bold text-truncate d-block">{{ $shipment->DeliveryAddress }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress Timeline -->
                            <div class="progress-section">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0 fw-bold">Delivery Progress</h6>
                                    <small class="text-danger fw-bold">
                                        @if($shipment->Status == 'Pending') Step 1/4
                                        @elseif($shipment->Status == 'PickedUp') Step 2/4
                                        @elseif($shipment->Status == 'InTransit') Step 3/4
                                        @else Step 4/4 @endif
                                    </small>
                                </div>
                                <div class="timeline-wrapper">
                                    <div class="timeline">
                                        <div class="timeline-step @if(in_array($shipment->Status, ['Pending', 'PickedUp', 'InTransit', 'Delivered'])) active @endif">
                                            <div class="timeline-step-dot">
                                                <i class="fas fa-receipt"></i>
                                            </div>
                                            <small class="timeline-step-label">Pending</small>
                                        </div>
                                        <div class="timeline-step @if(in_array($shipment->Status, ['PickedUp', 'InTransit', 'Delivered'])) active @endif">
                                            <div class="timeline-step-dot">
                                                <i class="fas fa-box-open"></i>
                                            </div>
                                            <small class="timeline-step-label">Picked</small>
                                        </div>
                                        <div class="timeline-step @if(in_array($shipment->Status, ['InTransit', 'Delivered'])) active @endif">
                                            <div class="timeline-step-dot">
                                                <i class="fas fa-truck-moving"></i>
                                            </div>
                                            <small class="timeline-step-label">Transit</small>
                                        </div>
                                        <div class="timeline-step @if($shipment->Status == 'Delivered') active @endif">
                                            <div class="timeline-step-dot">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <small class="timeline-step-label">Delivered</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->

                        <div class="card-footer bg-white border-0 pt-0 pb-4 px-4">
                            <div class="d-flex flex-column gap-3">
                                <!-- Action Buttons -->
                                <div class="action-buttons">
                                    @if ($shipment->Status == 'Pending')
                                        <div class="d-flex gap-2">
                                            <form method="POST" action="{{ route('rider.accept', $shipment->id) }}" class="flex-fill">
                                                @csrf
                                                <button class="btn btn-success fw-bold w-100 py-2 shadow-sm">
                                                    <i class="fas fa-check-circle me-2"></i>Accept Delivery
                                                </button>
                                            </form>
                                            <button class="btn btn-outline-danger fw-bold px-3" data-bs-toggle="modal" data-bs-target="#shipmentModal{{ $shipment->id }}">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                        </div>
                                    @elseif ($shipment->Status == 'PickedUp' && $shipment->AssignedRiderId == auth()->id())
                                        <div class="d-flex gap-2">
                                            <form method="POST" action="{{ route('rider.transit', $shipment->id) }}" class="flex-fill">
                                                @csrf
                                                <button class="btn btn-warning fw-bold w-100 py-2 shadow-sm">
                                                    <i class="fas fa-truck-moving me-2"></i>Start Transit
                                                </button>
                                            </form>
                                            <button class="btn btn-outline-danger fw-bold px-3" data-bs-toggle="modal" data-bs-target="#shipmentModal{{ $shipment->id }}">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                        </div>
                                    @elseif ($shipment->Status == 'InTransit' && $shipment->AssignedRiderId == auth()->id())
                                        <div class="d-flex gap-2">
                                            <form method="POST" action="{{ route('rider.delivered', $shipment->id) }}" class="flex-fill">
                                                @csrf
                                                <button class="btn btn-primary fw-bold w-100 py-2 shadow-sm">
                                                    <i class="fas fa-check-double me-2"></i>Mark Delivered
                                                </button>
                                            </form>
                                            <button class="btn btn-outline-danger fw-bold px-3" data-bs-toggle="modal" data-bs-target="#shipmentModal{{ $shipment->id }}">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                        </div>
                                    @else
                                        <button class="btn btn-outline-danger fw-bold w-100 py-2" data-bs-toggle="modal" data-bs-target="#shipmentModal{{ $shipment->id }}">
                                            <i class="fas fa-eye me-2"></i>View Details
                                        </button>
                                    @endif
                                </div>
                                
                                <!-- Date Info -->
                                <div class="d-flex justify-content-between align-items-center text-muted small">
                                    <span>
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $shipment->created_at->format('d M Y') }}
                                    </span>
                                    <span>
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $shipment->created_at->format('h:i A') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Modal -->
                <div class="modal fade" id="shipmentModal{{ $shipment->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 shadow-lg">
                            <!-- Modal Header -->
                            <div class="modal-header bg-gradient-danger text-white py-4">
                                <div class="d-flex align-items-center">
                                    <div class="modal-icon me-3">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <div>
                                        <h5 class="modal-title fw-bold mb-0">Shipment Details</h5>
                                        <p class="mb-0 opacity-90 small">ID: #{{ str_pad($shipment->id, 6, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            
                            <!-- Modal Body -->
                            <div class="modal-body p-0">
                                <div class="row g-0">
                                    <!-- Left Panel -->
                                    <div class="col-lg-6 border-end">
                                        <div class="p-4">
                                            <h6 class="section-title text-danger mb-3 fw-bold">
                                                <i class="fas fa-user-circle me-2"></i>Contact Information
                                            </h6>
                                            <div class="info-grid">
                                                <div class="info-item">
                                                    <span class="info-label">Sender</span>
                                                    <span class="info-value">{{ $shipment->SenderName }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-label">Sender Phone</span>
                                                    <span class="info-value">{{ $shipment->SenderPhone }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-label">Receiver</span>
                                                    <span class="info-value">{{ $shipment->ReceiverName }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-label">Receiver Phone</span>
                                                    <span class="info-value">{{ $shipment->ReceiverPhone }}</span>
                                                </div>
                                            </div>

                                            <h6 class="section-title text-danger mt-4 mb-3 fw-bold">
                                                <i class="fas fa-map me-2"></i>Location Details
                                            </h6>
                                            <div class="info-grid">
                                                <div class="info-item">
                                                    <span class="info-label">Pickup Address</span>
                                                    <span class="info-value">{{ $shipment->PickupAddress }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-label">Delivery Address</span>
                                                    <span class="info-value">{{ $shipment->DeliveryAddress }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-label">Delivery Zone</span>
                                                    <span class="info-value">{{ $shipment->DeliveryZone }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Right Panel -->
                                    <div class="col-lg-6">
                                        <div class="p-4">
                                            <h6 class="section-title text-danger mb-3 fw-bold">
                                                <i class="fas fa-info-circle me-2"></i>Shipment Information
                                            </h6>
                                            <div class="info-grid">
                                                <div class="info-item">
                                                    <span class="info-label">Tracking Number</span>
                                                    <span class="info-value">{{ $shipment->TrackingNumber }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-label">Status</span>
                                                    <span class="badge 
                                                        @if($shipment->Status == 'Delivered') bg-success
                                                        @elseif($shipment->Status == 'Pending') bg-warning
                                                        @elseif($shipment->Status == 'InTransit') bg-info
                                                        @else bg-purple @endif px-3 py-1">
                                                        {{ $shipment->Status }}
                                                    </span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-label">Delivery Type</span>
                                                    <span class="info-value">{{ $shipment->DeliveryType }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-label">Parcel Weight</span>
                                                    <span class="info-value">{{ $shipment->ParcelWeight }} kg</span>
                                                </div>
                                            </div>

                                            <h6 class="section-title text-danger mt-4 mb-3 fw-bold">
                                                <i class="fas fa-clock me-2"></i>Timeline
                                            </h6>
                                            <div class="info-grid">
                                                @if($shipment->PickupTime)
                                                <div class="info-item">
                                                    <span class="info-label">Pickup Time</span>
                                                    <span class="info-value">{{ $shipment->PickupTime }}</span>
                                                </div>
                                                @endif
                                                @if($shipment->DeliveryTime)
                                                <div class="info-item">
                                                    <span class="info-label">Delivery Time</span>
                                                    <span class="info-value">{{ $shipment->DeliveryTime }}</span>
                                                </div>
                                                @endif
                                                <div class="info-item">
                                                    <span class="info-label">Created At</span>
                                                    <span class="info-value">{{ $shipment->created_at->format('d M Y, h:i A') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal Footer -->
                            <div class="modal-footer border-0 bg-light py-3">
                                <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-2"></i>Close
                                </button>
                                @if($shipment->Status == 'Pending')
                                <form method="POST" action="{{ route('rider.accept', $shipment->id ) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger px-4">
                                        <i class="fas fa-check me-2"></i>Accept Shipment
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <!-- Empty State -->
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body py-5 text-center">
                        <div class="empty-state mb-4">
                            <i class="fas fa-box-open fa-4x text-muted mb-4"></i>
                            <h3 class="text-dark mb-3">No Shipments Found</h3>
                            <p class="text-muted mb-4">You don't have any shipments assigned to your zone yet.</p>
                            <button class="btn btn-danger px-4">
                                <i class="fas fa-sync-alt me-2"></i>Refresh
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Enhanced Styles -->
<style>
:root {
    --primary-red: #dc3545;
    --light-red: #f8d7da;
    --dark-red: #c82333;
    --warning: #ff9800;
    --info: #2196f3;
    --success: #4caf50;
    --purple: #9c27b0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
}

/* Header Styling */
.header-icon-container {
    width: 50px;
    height: 50px;
    background: var(--primary-red);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Filter Tabs */
.filter-tabs {
    gap: 10px;
}

.filter-tab {
    border-radius: 50px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
    border-width: 2px;
}

.filter-tab:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.15);
}

.filter-tab.active {
    background: var(--primary-red) !important;
    color: white !important;
    border-color: var(--primary-red) !important;
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
}

.filter-tab .badge {
    font-size: 0.7rem;
    padding: 4px 8px;
}

/* Stat Cards */
.stat-card {
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(220, 53, 69, 0.1) !important;
}

.stat-icon {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bg-warning-light { background-color: rgba(255, 152, 0, 0.1); }
.bg-info-light { background-color: rgba(33, 150, 243, 0.1); }
.bg-purple-light { background-color: rgba(156, 39, 176, 0.1); }
.bg-success-light { background-color: rgba(76, 175, 80, 0.1); }
.bg-danger-light { background-color: var(--light-red); }

/* Shipment Cards */
.shipment-card {
    border-radius: 15px;
    border: 1px solid rgba(220, 53, 69, 0.1);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeInUp 0.5s ease forwards;
}

.shipment-card:hover {
    border-color: var(--primary-red);
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.15) !important;
    transform: translateY(-3px);
}

/* Status Badges */
.status-badge {
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Tracking Card */
.tracking-card {
    background: linear-gradient(135deg, #fff, #f8f9fa);
    border: 1px solid rgba(220, 53, 69, 0.15);
}

/* Detail Items */
.detail-item {
    display: flex;
    align-items: center;
    padding: 8px;
    border-radius: 8px;
    background: rgba(248, 215, 218, 0.05);
}

.detail-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    flex-shrink: 0;
}

.detail-content {
    flex: 1;
    min-width: 0;
}

/* Timeline */
.timeline-wrapper {
    position: relative;
    padding: 20px 0;
}

.timeline {
    display: flex;
    justify-content: space-between;
    position: relative;
}

.timeline:before {
    content: '';
    position: absolute;
    top: 20px;
    left: 20px;
    right: 20px;
    height: 2px;
    background: #e9ecef;
    z-index: 1;
}

.timeline-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
    flex: 1;
}

.timeline-step-dot {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    margin-bottom: 8px;
    border: 3px solid white;
    transition: all 0.3s ease;
}

.timeline-step.active .timeline-step-dot {
    background: var(--primary-red);
    color: white;
    box-shadow: 0 0 0 5px rgba(220, 53, 69, 0.15);
}

.timeline-step-label {
    font-size: 0.75rem;
    color: #6c757d;
    text-align: center;
    font-weight: 500;
}

.timeline-step.active .timeline-step-label {
    color: var(--primary-red);
    font-weight: 600;
}

/* Modal Styling */
.modal-content {
    border-radius: 20px;
    overflow: hidden;
}

.modal-header {
    background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
}

.modal-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.section-title {
    border-bottom: 2px solid var(--light-red);
    padding-bottom: 8px;
}

.info-grid {
    display: grid;
    gap: 15px;
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.info-label {
    color: #6c757d;
    font-weight: 500;
}

.info-value {
    font-weight: 600;
    color: #212529;
    text-align: right;
    max-width: 60%;
}

/* Buttons */
.btn-danger {
    background: var(--primary-red);
    border-color: var(--primary-red);
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background: var(--dark-red);
    border-color: var(--dark-red);
    transform: translateY(-2px);
}

.btn-outline-danger {
    color: var(--primary-red);
    border-color: var(--primary-red);
}

.btn-outline-danger:hover {
    background: var(--primary-red);
    border-color: var(--primary-red);
}

/* Animation for filtering */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    to {
        opacity: 0;
        transform: translateY(20px);
    }
}

.shipment-card-wrapper {
    animation: fadeInUp 0.5s ease forwards;
}

.shipment-card-wrapper.hidden {
    display: none;
    animation: fadeOut 0.3s ease forwards;
}

/* Empty state when filtering */
.empty-filter-state {
    text-align: center;
    padding: 50px 20px;
}

.empty-filter-state i {
    font-size: 4rem;
    color: #dee2e6;
    margin-bottom: 20px;
}

/* Responsive Design */
@media (max-width: 992px) {
    .filter-tabs {
        gap: 8px;
    }
    
    .filter-tab {
        padding: 6px 15px;
        font-size: 0.9rem;
    }
    
    .filter-tab .badge {
        font-size: 0.6rem;
        padding: 3px 6px;
        margin-left: 4px !important;
    }
}

@media (max-width: 768px) {
    .filter-tabs {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-tab {
        width: 100%;
        justify-content: center;
        margin-bottom: 5px;
    }
    
    .timeline:before {
        left: 15px;
        right: 15px;
        top: 17px;
    }
    
    .timeline-step-dot {
        width: 30px;
        height: 30px;
        font-size: 0.8rem;
    }
}

@media (max-width: 576px) {
    .filter-tab {
        padding: 5px 12px;
        font-size: 0.85rem;
    }
    
    .timeline:before {
        left: 10px;
        right: 10px;
        top: 15px;
    }
    
    .timeline-step-dot {
        width: 25px;
        height: 25px;
        font-size: 0.7rem;
    }
    
    .timeline-step-label {
        font-size: 0.65rem;
    }
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: var(--primary-red);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--dark-red);
}

/* Loading Animation */
.loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}
</style>

<!-- Enhanced Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize animations
    const cards = document.querySelectorAll('.shipment-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });

    // Filter functionality
    const filterTabs = document.querySelectorAll('.filter-tab');
    const shipmentsContainer = document.getElementById('shipmentsContainer');
    const shipmentWrappers = document.querySelectorAll('.shipment-card-wrapper');
    const totalShipmentsElement = document.getElementById('totalShipments');
    const clearFiltersBtn = document.getElementById('clearFilters');

    // Initialize filter state
    let currentFilter = 'all';
    let visibleCount = shipmentWrappers.length;

    // Function to update visible count
    function updateVisibleCount() {
        visibleCount = document.querySelectorAll('.shipment-card-wrapper:not(.hidden)').length;
        totalShipmentsElement.textContent = visibleCount;
        
        // Show empty state if no shipments visible
        const emptyState = document.getElementById('emptyFilterState');
        if (emptyState) {
            emptyState.remove();
        }
        
        if (visibleCount === 0 && shipmentWrappers.length > 0) {
            const emptyHtml = `
                <div class="col-12" id="emptyFilterState">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-5 text-center">
                            <div class="empty-filter-state mb-4">
                                <i class="fas fa-search fa-4x text-muted mb-4"></i>
                                <h3 class="text-dark mb-3">No Shipments Found</h3>
                                <p class="text-muted mb-4">No shipments match the selected filter.</p>
                                <button class="btn btn-danger px-4" id="showAllBtn">
                                    <i class="fas fa-box me-2"></i>Show All Shipments
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            shipmentsContainer.insertAdjacentHTML('beforeend', emptyHtml);
            
            document.getElementById('showAllBtn').addEventListener('click', function() {
                filterByStatus('all');
                updateFilterTab('all');
            });
        }
    }

    // Function to filter shipments
    function filterByStatus(status) {
        shipmentWrappers.forEach(wrapper => {
            if (status === 'all') {
                wrapper.classList.remove('hidden');
                wrapper.style.animation = 'fadeInUp 0.5s ease forwards';
            } else {
                if (wrapper.getAttribute('data-status') === status) {
                    wrapper.classList.remove('hidden');
                    wrapper.style.animation = 'fadeInUp 0.5s ease forwards';
                } else {
                    wrapper.style.animation = 'fadeOut 0.3s ease forwards';
                    setTimeout(() => {
                        wrapper.classList.add('hidden');
                    }, 300);
                }
            }
        });
        
        currentFilter = status;
        updateVisibleCount();
        
        // Store filter in localStorage
        localStorage.setItem('riderShipmentFilter', status);
        
        // Show notification
        if (status === 'all') {
            showNotification('Showing all shipments', 'info');
        } else {
            showNotification(`Showing ${status} shipments`, 'info');
        }
    }

    // Function to update active filter tab
    function updateFilterTab(status) {
        filterTabs.forEach(tab => {
            tab.classList.remove('active');
            if (tab.getAttribute('data-filter') === status) {
                tab.classList.add('active');
            }
        });
    }

    // Add click event listeners to filter tabs
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            filterByStatus(filter);
            updateFilterTab(filter);
        });
    });

    // Clear filters button
    clearFiltersBtn.addEventListener('click', function() {
        filterByStatus('all');
        updateFilterTab('all');
        showNotification('Filters cleared', 'success');
    });

    // Check for saved filter in localStorage
    const savedFilter = localStorage.getItem('riderShipmentFilter');
    if (savedFilter) {
        filterByStatus(savedFilter);
        updateFilterTab(savedFilter);
    }

    // Copy tracking number functionality
    document.querySelectorAll('.copy-tracking').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const trackingNumber = this.getAttribute('data-tracking');
            
            // Create temporary input
            const tempInput = document.createElement('input');
            tempInput.value = trackingNumber;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            
            // Visual feedback
            const originalHTML = this.innerHTML;
            const originalClass = this.className;
            this.innerHTML = '<i class="fas fa-check"></i>';
            this.className = 'btn btn-sm btn-success';
            
            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.className = originalClass;
            }, 1500);
            
            // Show notification
            showNotification('Tracking number copied to clipboard!', 'success');
        });
    });

    // Refresh button functionality
    const refreshBtn = document.querySelector('.btn-outline-danger[href="#"]');
    if (refreshBtn) {
        refreshBtn.addEventListener('click', function(e) {
            e.preventDefault();
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Refreshing...';
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-sync-alt me-2"></i>Refresh Page';
                showNotification('Page refreshed successfully!', 'success');
            }, 1500);
        });
    }

    // Status color coding
    document.querySelectorAll('.status-badge').forEach(badge => {
        const status = badge.textContent.trim();
        let color = '';
        
        switch(status) {
            case 'Delivered':
                color = 'success';
                break;
            case 'Pending':
                color = 'warning';
                break;
            case 'InTransit':
                color = 'info';
                break;
            case 'PickedUp':
                color = 'purple';
                break;
            default:
                color = 'danger';
        }
        
        badge.classList.add(`text-bg-${color}`);
    });

    // Show notification function
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existing = document.querySelector('.notification-toast');
        if (existing) existing.remove();
        
        // Create notification
        const notification = document.createElement('div');
        notification.className = `notification-toast alert alert-${type} alert-dismissible fade show`;
        notification.innerHTML = `
            <strong>${type.charAt(0).toUpperCase() + type.slice(1)}!</strong> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Style notification
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
            border-radius: 10px;
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 3000);
    }

    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        .text-bg-purple {
            background-color: var(--purple) !important;
            color: white !important;
        }
    `;
    document.head.appendChild(style);

    // Initialize
    updateVisibleCount();
});
</script>

@endsection
