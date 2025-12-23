@extends('Rider.riderlayout')
@section('content')




<!-- Carousel -->

<div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative mb-5">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousal-3.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Rider Dashboard</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Manage Your <span class="text-primary">Deliveries</span>Easily</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">View assigned parcels, check delivery routes, and update delivery status in real time.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Assigned Orders</a>
                                <a href="{{ url('/profile') }}" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">My Profile</a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/image-4.avif" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Fast & Secure Delivery</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Deliver Parcels <span class="text-primary">On Time</span> Solution</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Navigate optimized routes, confirm deliveries, and ensure customer satisfaction.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"> Update Status</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Get Support</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Carousel end--> 

<div class="container-xxl py-5 bg-light">
    <div class="container py-5">

        <div class="text-center mb-5">
            <h6 class="text-secondary text-uppercase"></h6>
            <h1 class="mb-4">My Work Modules</h1>
            <p class="text-muted">Manage your daily tasks from here</p>
        </div>

        <div class="row g-4">

            <!-- Deliveries -->
            <div class="col-md-6 col-lg-3">
                <div class="service-item p-4 h-100 text-center">
                    <i class="fa fa-box fa-3x text-primary mb-4"></i>
                    <h4 class="mb-3">My Deliveries</h4>
                    <p>View assigned deliveries and update delivery status.</p>
                    <a class="btn-slide mt-2" href="{{ url('/delivery') }}">
                        <i class="fa fa-arrow-right"></i><span>Open</span>
                    </a>
                </div>
            </div>

            <!-- Pickups -->
            <div class="col-md-6 col-lg-3">
                <div class="service-item p-4 h-100 text-center">
                    <i class="fa fa-truck-loading fa-3x text-success mb-4"></i>
                    <h4 class="mb-3">Pickup Requests</h4>
                    <p>Check and manage pickup locations assigned to you.</p>
                    <a class="btn-slide mt-2" href="{{ url('/pickup') }}">
                        <i class="fa fa-arrow-right"></i><span>Open</span>
                    </a>
                </div>
            </div>

            <!-- Earnings -->
            <div class="col-md-6 col-lg-3">
                <div class="service-item p-4 h-100 text-center">
                    <i class="fa fa-wallet fa-3x text-warning mb-4"></i>
                    <h4 class="mb-3">My Earnings</h4>
                    <p>Track today’s and monthly earnings in detail.</p>
                    <a class="btn-slide mt-2" href="{{ url('/earning') }}">
                        <i class="fa fa-arrow-right"></i><span>View</span>
                    </a>
                </div>
            </div>

            <!-- Support -->
            <div class="col-md-6 col-lg-3">
                <div class="service-item p-4 h-100 text-center">
                    <i class="fa fa-headset fa-3x text-danger mb-4"></i>
                    <h4 class="mb-3">Help & Support</h4>
                    <p>Contact support for delivery or app-related issues.</p>
                    <a class="btn-slide mt-2" href="{{ url('/support') }}">
                        <i class="fa fa-arrow-right"></i><span>Get Help</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

 
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-secondary text-uppercase"></h6>
            <h1 class="mb-3">Today’s Work Summary</h1>
            <p class="text-muted">Track your deliveries, pickups, and earnings at a glance</p>
        </div>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="bg-white p-4 text-center shadow rounded">
                    <i class="fa fa-box fa-3x text-primary mb-3"></i>
                    <h5>Assigned Orders</h5>
                    <h3 class="text-primary">12</h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-white p-4 text-center shadow rounded">
                    <i class="fa fa-check-circle fa-3x text-success mb-3"></i>
                    <h5>Delivered</h5>
                    <h3 class="text-success">8</h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-white p-4 text-center shadow rounded">
                    <i class="fa fa-clock fa-3x text-warning mb-3"></i>
                    <h5>Pending</h5>
                    <h3 class="text-warning">4</h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-white p-4 text-center shadow rounded">
                    <i class="fa fa-wallet fa-3x text-danger mb-3"></i>
                    <h5>Today’s Earnings</h5>
                    <h3 class="text-danger">PKR 3,200</h3>
                </div>
            </div>

        </div>
    </div>
</div>






@endsection
