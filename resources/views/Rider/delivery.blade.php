@extends('Rider.riderlayout')
@section('content')

<div class="container py-5">
    <h2 class="text-center mb-5 text-danger wow fadeInDown" data-wow-delay="0.1s">
        My Shipments
    </h2>

    @if($shipments->count() > 0)
        <div class="row g-4">
            @foreach($shipments as $shipment)
                <div class="col-md-6 col-lg-4 wow slideInUp" data-wow-delay="{{ 0.1 * $loop->index }}s">
                    <div class="card shipment-card border-0 shadow-sm h-100 overflow-hidden position-relative hover-elevate">

                        <!-- Gradient Header -->
                        <div class="card-header text-white fw-bold d-flex justify-content-between align-items-center px-3 py-2 gradient-header">
                            <span>Shipment #{{ $shipment->id }}</span>
                            <span class="badge status-badge 
                                @if($shipment->Status == 'Delivered') bg-success
                                @elseif($shipment->Status == 'Pending') bg-warning text-dark
                                @else bg-danger @endif px-3 py-2 shadow-sm">
                                {{ $shipment->Status }}
                            </span>
                        </div>

                        <div class="card-body">
                            <!-- Tracking Number -->
                            <p class="text-primary fw-bold mb-2"><i class="fas fa-barcode me-2"></i>{{ $shipment->TrackingNumber }}</p>

                            <!-- Shipment Details -->
                            <p><i class="fas fa-map-marker-alt text-danger me-2"></i> <strong>Zone:</strong> {{ $shipment->DeliveryZone }}</p>
                            <p><i class="fas fa-user text-danger me-2"></i> <strong>Receiver:</strong> {{ $shipment->ReceiverName }}</p>
                            <p><i class="fas fa-location-dot text-danger me-2"></i> <strong>Address:</strong> {{ $shipment->DeliveryAddress }}</p>

                            <!-- Static Delivery Progress -->
                            <div class="mt-3">
                                <div class="progress rounded-pill" style="height: 12px;">
                                    <div class="progress-bar 
                                        @if($shipment->Status == 'Delivered') bg-success
                                        @elseif($shipment->Status == 'Pending') bg-warning
                                        @else bg-danger @endif" 
                                        role="progressbar" 
                                        style="width: 
                                        @if($shipment->Status == 'Delivered') 100%
                                        @elseif($shipment->Status == 'Pending') 50%
                                        @else 25% @endif;">
                                    </div>
                                </div>
                                <small class="text-muted mt-1 d-block fw-bold">
                                    @if($shipment->Status == 'Delivered') Completed
                                    @elseif($shipment->Status == 'Pending') In Progress
                                    @else Delayed @endif
                                </small>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-white d-flex justify-content-between align-items-center border-0">
                            <a href="#" class="btn btn-sm btn-outline-danger fw-bold">View Details</a>
                            <small class="text-muted">{{ $shipment->created_at->format('d M Y') }}</small>
                        </div>

                        <!-- Decorative Icon -->
                        <i class="fas fa-truck position-absolute top-0 end-0 display-1 text-danger opacity-10"></i>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-danger text-center wow fadeIn" data-wow-delay="0.2s">
            No shipments found in your zone.
        </div>
    @endif
</div>

<!-- Custom Styling & Animations -->
<style>
.shipment-card {
    transition: all 0.4s ease, transform 0.3s ease;
    background: #fff;
    border-radius: 15px;
}
.hover-elevate:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}
.gradient-header {
    background: linear-gradient(135deg, #e74a3b, #ff6b6b);
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.status-badge {
    animation: pulse 1.5s infinite;
}
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}
.card-body p {
    margin-bottom: 0.6rem;
    font-size: 0.95rem;
}
.card-title {
    font-weight: 600;
}
.progress {
    border-radius: 10px;
    overflow: hidden;
}
.fas.fa-truck {
    pointer-events: none;
    font-size: 5rem;
    top: -10px;
    right: -10px;
}
@media (max-width: 768px) {
    .fas.fa-truck {
        font-size: 3rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.shipment-card');
    cards.forEach((card, index) => {
        setTimeout(() => card.classList.add('show'), index * 200);
    });
});
</script>

@endsection
