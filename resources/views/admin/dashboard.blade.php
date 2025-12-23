@extends('admin.masterlayout')
<style>

.fade-up {
    animation: fadeUp 0.9s ease forwards;
}
.delay-1 { animation-delay: .1s; }
.delay-2 { animation-delay: .2s; }
.delay-3 { animation-delay: .3s; }
.delay-4 { animation-delay: .4s; }

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}


.stat-card {
    border-radius: 18px;
    backdrop-filter: blur(10px);
    transition: all 0.35s ease;
    cursor: pointer;
}
.stat-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

.stat-icon {
    transition: transform 0.4s ease;
}
.stat-card:hover .stat-icon {
    transform: rotate(-8deg) scale(1.2);
}
*/
.progress-bar {
    animation: progressFill 1.5s ease-in-out;
}
@keyframes progressFill {
    from { width: 0; }
}
</style>

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 fade-up">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
            🚀 Dashboard Overview
        </h1>
        <a href="#" class="btn btn-sm btn-danger shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Stats Row -->
    <div class="row">

        <!-- Monthly Earnings -->
        <div class="col-xl-3 col-md-6 mb-4 fade-up delay-1">
            <div class="card stat-card border-left-primary shadow h-100 py-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Monthly Earnings
                            </div>
                            <div class="h4 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <i class="fas fa-calendar fa-2x text-primary stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annual Earnings -->
        <div class="col-xl-3 col-md-6 mb-4 fade-up delay-2">
            <div class="card stat-card border-left-success shadow h-100 py-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Annual Earnings
                            </div>
                            <div class="h4 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <i class="fas fa-dollar-sign fa-2x text-success stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks -->
        <div class="col-xl-3 col-md-6 mb-4 fade-up delay-3">
            <div class="card stat-card border-left-info shadow h-100 py-3">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-2">
                        Delivery Progress
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="h4 mb-0 font-weight-bold text-gray-800 mr-3">50%</div>
                        <div class="progress w-100">
                            <div class="progress-bar bg-info" role="progressbar"
                                style="width: 50%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests -->
        <div class="col-xl-3 col-md-6 mb-4 fade-up delay-4">
            <div class="card stat-card border-left-warning shadow h-100 py-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Shipments
                            </div>
                            <div class="h4 font-weight-bold text-gray-800">18</div>
                        </div>
                        <i class="fas fa-box fa-2x text-warning stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Extra Section -->
    <div class="row mt-4 fade-up">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-danger text-white">
                    <h6 class="m-0 font-weight-bold">📦 Recent Activity</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">• New shipment added</p>
                    <p class="text-muted mb-2">• Rider assigned to delivery</p>
                    <p class="text-muted mb-2">• Payment received successfully</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection