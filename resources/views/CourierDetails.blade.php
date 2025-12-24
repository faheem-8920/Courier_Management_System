@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE TITLE -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-danger">📦 Courier Details</h2>
        <p class="text-muted">Track and monitor your shipment in real-time</p>
    </div>

    <!-- COURIER SUMMARY -->
    <div class="card shadow-lg mb-4 border-danger rounded-3">
        <div class="card-body">
            <div class="row g-3 text-center">
                <div class="col-md-3">
                    <strong>Tracking No</strong>
                    <p class="mb-0 text-danger fw-bold">{{ $courierdetail->TrackingNumber }}</p>
                </div>
                <div class="col-md-3">
                    <strong>Status</strong><br>
                    <span class="badge 
                        @if($courierdetail->Status == 'delivered') bg-success
                        @elseif($courierdetail->Status == 'in_transit') bg-warning text-dark
                        @else bg-secondary
                        @endif p-2 fs-6">
                        {{ ucfirst($courierdetail->Status) }}
                    </span>
                </div>
                <div class="col-md-3">
                    <strong>Parcel Weight</strong>
                    <p class="mb-0">{{ $courierdetail->ParcelWeight }} kg</p>
                </div>
                <div class="col-md-3">
                    <strong>Delivery Zone</strong>
                    <p class="mb-0">{{ $courierdetail->DeliveryZone }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- DELIVERY ESTIMATE & TIMER -->
    @php
        switch(strtolower($courierdetail->DeliveryType)){
            case 'overnight': $days = 1; break;
            case 'express': $days = 2; break;
            default: $days = 4; break;
        }
        $estimatedDate = \Carbon\Carbon::parse($courierdetail->created_at)->addDays($days);
    @endphp

    <div class="card shadow-lg mb-4 border-danger rounded-3">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <h5 class="fw-bold mb-1 text-danger">🚚 Estimated Delivery Date</h5>
                <p class="mb-0 text-muted">
                    Expected by <strong class="text-danger">{{ $estimatedDate->format('d M Y') }}</strong>
                </p>
                <small class="text-muted">Based on <strong>{{ ucfirst($courierdetail->DeliveryType) }}</strong> shipment</small>
            </div>
            <div class="text-center mt-3 mt-md-0">
                <h5 class="fw-bold mb-1">⏰ Countdown</h5>
                <p id="countdown" class="text-danger fs-5 fw-bold"></p>
            </div>
        </div>
    </div>

    <!-- SENDER & RECEIVER -->
    <div class="row mb-4 g-3">
        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-danger rounded-3 hover-card">
                <div class="card-header bg-danger text-white fw-bold">Sender Details</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $courierdetail->SenderName }}</p>
                    <p><strong>Phone:</strong> {{ $courierdetail->SenderPhone }}</p>
                    <p><strong>Pickup Address:</strong><br>{{ $courierdetail->PickupAddress }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-danger rounded-3 hover-card">
                <div class="card-header bg-danger text-white fw-bold">Receiver Details</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $courierdetail->ReceiverName }}</p>
                    <p><strong>Phone:</strong> {{ $courierdetail->ReceiverPhone }}</p>
                    <p><strong>Delivery Address:</strong><br>{{ $courierdetail->DeliveryAddress }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- RESPONSIVE TRACKING TIMELINE -->
    <div class="card shadow-sm mb-4 border-danger rounded-3">
        <div class="card-header bg-danger text-white fw-bold">📍 Tracking Timeline</div>
        <div class="card-body position-relative timeline-container">

            @php
                $stages = [
                    'booked' => 'Courier Booked',
                    'picked_up' => 'Picked Up',
                    'in_transit' => 'In Transit',
                    'delivered' => 'Delivered'
                ];
                $currentIndex = array_search(strtolower($courierdetail->Status), array_keys($stages));
            @endphp

            @foreach($stages as $key => $label)
                @php $index = array_search($key, array_keys($stages)); @endphp
                <div class="timeline-stage @if($index <= $currentIndex) completed @endif">
                    <div class="stage-dot"></div>
                    <div class="stage-label">
                        <h6 class="fw-bold mb-1">{{ $label }}</h6>
                        @if($index == 0)
                            <small class="text-muted">{{ $courierdetail->created_at->format('d M Y, h:i A') }}</small>
                        @else
                            <small class="text-muted">{{ ucfirst($key) }} stage info</small>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- PROGRESS BAR -->
        <div class="progress mt-4" style="height:12px; border-radius:10px;">
            <div id="progressBar" class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                0%
            </div>
        </div>
    </div>

    <!-- RULES & SUPPORT -->
    <div class="card shadow-sm border-danger mb-5 rounded-3">
        <div class="card-header bg-danger text-white fw-bold">📝 Rules & Support</div>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <li class="mb-2"><i class="fa fa-check-circle text-danger me-2"></i>Charges are non-refundable after dispatch.</li>
                <li class="mb-2"><i class="fa fa-exclamation-triangle text-warning me-2"></i>Incorrect address may cause delivery delay.</li>
                <li class="mb-2"><i class="fa fa-clock text-danger me-2"></i>Report damage within 24 hours.</li>
                <li class="mb-2"><i class="fa fa-headset text-danger me-2"></i>Support: support@courierms.com | +92-300-0000000</li>
            </ul>
        </div>
    </div>

</div>

<style>
.hover-card:hover { transform: translateY(-5px); transition:0.3s; }

.timeline-container { position: relative; min-height: 300px; }
.timeline-stage { position: relative; margin-bottom: 50px; padding-left: 40px; }
.timeline-stage::before { content:""; position:absolute; left:15px; top:0; bottom:0; width:10px; background:#f5c6cb; border-radius:5px; }
.timeline-stage.completed::before { background:#dc3545; }
.stage-dot { position:absolute; left:6px; width:28px; height:28px; border-radius:50%; background:#ccc; display:flex; align-items:center; justify-content:center; z-index:1; }
.timeline-stage.completed .stage-dot { background:#dc3545; box-shadow:0 0 10px #dc3545; }
.stage-label { padding-left:50px; }

@media(max-width:767px){
    .timeline-stage { display:inline-block; width:22%; margin-bottom:0; padding-left:0; vertical-align:top; text-align:center; }
    .timeline-stage::before { display:none; }
    .timeline-container { min-height:auto; overflow-x:auto; white-space:nowrap; padding:20px 0; }
    .stage-dot { position:relative; left:auto; margin:auto; }
    .stage-label { padding-left:0; margin-top:5px; }
}
</style>

<script>
// Countdown & progress bar
let endTime = new Date("{{ $estimatedDate }}").getTime();
let startTime = new Date("{{ $courierdetail->created_at }}").getTime();
let totalDuration = endTime - startTime;

let countdownFunction = setInterval(function() {
    let now = new Date().getTime();
    let distance = endTime - now;

    let days = Math.floor(distance / (1000*60*60*24));
    let hours = Math.floor((distance % (1000*60*60*24))/(1000*60*60));
    let minutes = Math.floor((distance % (1000*60*60))/(1000*60));
    let seconds = Math.floor((distance % (1000*60))/1000);

    if(distance < 0){
        clearInterval(countdownFunction);
        document.getElementById("countdown").innerHTML = "Delivered / Estimated Time Passed";
        document.getElementById("progressBar").style.width = "100%";
        document.getElementById("progressBar").innerHTML = "100%";
    } else {
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
        let elapsed = now - startTime;
        let percent = Math.min(Math.round((elapsed/totalDuration)*100), 100);
        document.getElementById("progressBar").style.width = percent + "%";
        document.getElementById("progressBar").innerHTML = percent + "%";
    }
}, 1000);
</script>
@endsection
