@extends('layout')

@section('content')

@php
    $statusColors = [
        'booked' => ['bg' => 'bg-secondary', 'text' => 'text-white'],
        'picked_up' => ['bg' => 'bg-info', 'text' => 'text-white'],
        'in_transit' => ['bg' => 'bg-warning', 'text' => 'text-dark'],
        'delivered' => ['bg' => 'bg-success', 'text' => 'text-white']
    ];

    $currentStatus = strtolower($courierdetail->Status);
    $statusColor = $statusColors[$currentStatus] ?? $statusColors['booked'];

    switch(strtolower($courierdetail->DeliveryType)){
        case 'overnight': $days = 1; break;
        case 'express': $days = 2; break;
        default: $days = 4; break;
    }

    $estimatedDate = \Carbon\Carbon::parse($courierdetail->created_at)->addDays($days);
@endphp

<div class="container-fluid px-0">

    <!-- HERO -->
    <div class="tracking-hero-section py-5">
        <div class="container">
            <h2 class="text-white fw-bold mb-2">📦 Live Package Tracking</h2>
            <p class="text-white-75 mb-3">
                Tracking ID: <strong>{{ $courierdetail->TrackingNumber }}</strong>
            </p>

            <span class="badge {{ $statusColor['bg'] }} {{ $statusColor['text'] }} px-4 py-2 fs-6">
                {{ ucfirst($courierdetail->Status) }}
            </span>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container py-5">
        <div class="row">

            <!-- LEFT -->
            <div class="col-lg-8 mb-4">

                <!-- TIMELINE -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header fw-bold">Tracking Timeline</div>
                    <div class="card-body">

                        @php
                            $stages = ['booked', 'picked_up', 'in_transit', 'delivered'];
                            $currentIndex = array_search($currentStatus, $stages);
                        @endphp

                        @foreach($stages as $index => $stage)
                            <p class="{{ $index <= $currentIndex ? 'text-success fw-bold' : 'text-muted' }}">
                                {{ ucfirst(str_replace('_',' ',$stage)) }}
                            </p>
                        @endforeach

                    </div>
                </div>

                <!-- SENDER / RECEIVER -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header bg-danger text-white">Sender</div>
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $courierdetail->SenderName }}</p>
                                <p><strong>Phone:</strong> {{ $courierdetail->SenderPhone }}</p>
                                <p><strong>Address:</strong> {{ $courierdetail->PickupAddress }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header bg-danger text-white">Receiver</div>
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $courierdetail->ReceiverName }}</p>
                                <p><strong>Phone:</strong> {{ $courierdetail->ReceiverPhone }}</p>
                                <p><strong>Address:</strong> {{ $courierdetail->DeliveryAddress }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-4">

                <div class="card shadow-sm mb-4">
                    <div class="card-header fw-bold">Shipment Summary</div>
                    <div class="card-body">
                        <p><strong>Weight:</strong> {{ $courierdetail->ParcelWeight }} kg</p>
                        <p><strong>Zone:</strong> {{ $courierdetail->DeliveryZone }}</p>
                        <p><strong>Service:</strong> {{ ucfirst($courierdetail->DeliveryType) }}</p>
                        <p><strong>Estimated:</strong> {{ $estimatedDate->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Support</div>
                    <div class="card-body text-center">
                        <p>📞 +92-300-0000000</p>
                        <p>✉ support@courierms.com</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

