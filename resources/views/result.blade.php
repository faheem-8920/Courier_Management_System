<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tracking Result</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f6f8;
            font-family: 'Segoe UI', sans-serif;
        }

        .track-card{
            max-width:800px;
            margin:50px auto;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 15px 40px rgba(0,0,0,0.12);
            background:#fff;
        }

        .track-header{
            background:linear-gradient(135deg,#ff2e2e,#c40000);
            color:#fff;
            padding:25px 30px;
        }

        .track-header h4{
            margin:0;
            font-weight:700;
        }

        .track-body{
            padding:30px;
        }

        .info-row{
            display:flex;
            justify-content:space-between;
            border-bottom:1px dashed #ddd;
            padding:12px 0;
        }

        .info-row:last-child{
            border-bottom:none;
        }

        .info-title{
            font-weight:600;
            color:#444;
        }

        .badge{
            padding:8px 14px;
            font-size:14px;
            border-radius:12px;
        }

        .btn-back{
            border-radius:14px;
            padding:10px 28px;
            font-weight:600;
        }
    </style>
</head>

<body>

<div class="track-card">

    <!-- Header -->
    <div class="track-header">
        <h4>📦 Parcel Tracking Result</h4>
        <small>Live shipment status information</small>
    </div>

    <!-- Body -->
    <div class="track-body">

        <div class="info-row">
            <span class="info-title">Tracking Number</span>
            <span>{{ $shipment->TrackingNumber }}</span>
        </div>

        <div class="info-row">
            <span class="info-title">Status</span>
            <span class="badge
                @if($shipment->Status == 'Delivered') bg-success
                @elseif($shipment->Status == 'InTransit') bg-warning text-dark
                @elseif($shipment->Status == 'PickedUp') bg-info
                @else bg-secondary @endif">
                {{ $shipment->Status }}
            </span>
        </div>

        @if($shipment->PickedUpAt)
        <div class="info-row">
            <span class="info-title">📍 Picked Up At</span>
            <span>{{ $shipment->PickedUpAt }}</span>
        </div>
        @endif

        @if($shipment->InTransitAt)
        <div class="info-row">
            <span class="info-title">🚚 In Transit At</span>
            <span>{{ $shipment->InTransitAt }}</span>
        </div>
        @endif

        @if($shipment->DeliveredAt)
        <div class="info-row">
            <span class="info-title">✅ Delivered At</span>
            <span>{{ $shipment->DeliveredAt }}</span>
        </div>
        @endif

        <div class="text-end mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-outline-danger btn-back">
                ⬅ Go Back
            </a>
        </div>

    </div>
</div>

</body>
</html>
