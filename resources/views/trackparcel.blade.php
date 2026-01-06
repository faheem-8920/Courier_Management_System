<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Track Your Parcel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f8;
    font-family: 'Segoe UI', sans-serif;
}

.track-card {
    max-width: 900px;
    margin: 40px auto;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    overflow: hidden;
}

.track-header {
    background: linear-gradient(135deg, #ff3b3b, #e60000);
    color: #fff;
    padding: 30px;
}

.track-header h3 {
    margin: 0;
    font-weight: 700;
}

.track-header p {
    margin: 5px 0 0;
    opacity: 0.9;
}

.form-section {
    padding: 35px;
}

.form-label {
    font-weight: 600;
    color: #333;
}

.form-control {
    height: 50px;
    border-radius: 12px;
}

.track-btn {
    background: #ff3b3b;
    color: #fff;
    border-radius: 14px;
    height: 50px;
    font-weight: 600;
    border: none;
}

.track-btn:hover {
    background: #e60000;
}
</style>
</head>

<body>

<div class="track-card">

    <!-- Header -->
    <div class="track-header">
        <h3>📦 Track Your Parcel</h3>
        <p>Enter tracking number to see parcel status</p>
    </div>

    <!-- Form -->
    <div class="form-section">

        <form method="POST" action="{{ route('track.shipment') }}">
            @csrf

            <div class="row g-4">
                <div class="col-md-8">
                    <label class="form-label">Tracking Number *</label>
                    <input
                        type="text"
                        name="TrackingNumber"
                        class="form-control"
                        placeholder="e.g. CMS-TRK-10234"
                        required
                    >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Phone (Optional)</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="+92 3xx xxxxxxx"
                    >
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type="submit" class="btn track-btn px-5">
                    Track Parcel
                </button>
            </div>
        </form>

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

    </div>
</div>

</body>
</html>




