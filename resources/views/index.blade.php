@extends('layout')
@section('content')
 
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative mb-5">
            <div class="owl-carousel-item position-relative">


                <img class="img-fluid" src="img/carousal-3.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Smart Courier Management System</h5>
                                <h1 class="display-6 display-lg-4 text-white animated slideInDown mb-4">
                                  Delivering Your Parcel <span class="text-primary">Safely & On Time</span></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Send parcels anywhere in Pakistan with real-time tracking, fast pickup, and secure delivery.</p>
                                
                                <a href="/addcourier" class="btn btn-danger py-md-3 px-md-5 animated slideInRight">Add Courier</a>
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
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Stay updated from booking to delivery</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Real-Time <span class="text-primary">Parcel Tracking</span></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                <a href="{{ url('/trackparcel') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Track Parcel</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Support</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/parcel.1.jpeg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3">About Us</h6>
                    <h1 class="mb-5">Fast & Reliable Courier Services</h1>
                    <p class="mb-5">Our Courier Management System provides a fast, secure, and fully trackable delivery process. Users can easily book parcels, track shipments in real time, and enjoy reliable door-to-door delivery services.</p>
                    <div class="row g-4 mb-5">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa-solid fa-location-dot fa-3x text-primary mb-3"></i>
                            <h5>Easy Parcel Tracking</h5>
                            <p class="m-0">Track your shipment in real-time through our integrated tracking system.</p>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa fa-shipping-fast fa-3x text-primary mb-3"></i>
                            <h5>On Time Delivery</h5>
                            <p class="m-0">We ensure safe handling of parcels and guarantee on-time delivery with reliable courier operations</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Some Facts</h6>
                    <h1 class="mb-5">#1 Place To Manage All Of Your Shipments</h1>
                    <p class="mb-5">Our Courier Management System allows you to book parcels, track shipments in real time, and manage your deliveries with ease. We focus on reliability, speed, and security to ensure a seamless courier experience.</p>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-headphones fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                        <div class="ps-4">
                            <h6>Call for any query!</h6>
                            <h3 class="text-primary m-0">+012 345 6789</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                                <i class="fa fa-users fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Satisfied Customers</p>
                            </div>
                            <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                                <i class="fa fa-ship fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Total Shipments Delivered</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                                <i class="fa fa-star fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Positive Feedback</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
   
    <div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Our Services</h6>
            <h1 class="mb-5">Explore Our Courier Services</h1>
        </div>
        <div class="row g-4">

            <!-- Same City Delivery -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid " src="img/bike.jfif" alt="">
                    </div>
                    <h4 class="mb-3">Same City Delivery</h4>
                    <p>Fast and secure delivery within the same city with real-time tracking updates.</p>
                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>

            <!-- Out of City Delivery -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="img/truck.jfif" alt="">
                    </div>
                    <h4 class="mb-3">Out of City Delivery</h4>
                    <p>Reliable parcel delivery across all major cities in Pakistan with timely dispatch.</p>
                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>

            <!-- International Courier -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="img/ships.jfif" alt="">
                    </div>
                    <h4 class="mb-3">International Courier</h4>
                    <p>Ship parcels worldwide with trusted partners ensuring safe handling and timely delivery.</p>
                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>

            <!-- Express Urgent Delivery -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="img/plane.jfif" alt="">
                    </div>
                    <h4 class="mb-3">Express Urgent Delivery</h4>
                    <p>Priority delivery service designed for urgent shipments requiring the fastest possible time.</p>
                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>

            <!-- Cash on Delivery (COD) -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="img/COD.jfif" alt="">
                    </div>
                    <h4 class="mb-3">Cash on Delivery (COD)</h4>
                    <p>Secure COD service for businesses with safe payment handling and instant confirmation.</p>
                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>

            <!-- Bulk & Business Shipments -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="img/bulk.jfif" alt="">
                    </div>
                    <h4 class="mb-3">Bulk & Business Shipments</h4>
                    <p>Cost-effective bulk parcel shipping designed for companies needing regular delivery support.</p>
                    <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                </div>
            </div>

        </div>
    </div>
</div>

    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Our Features</h6>
                    <h1 class="mb-5">We Provide Smart & Reliable Courier Services</h1>
                    <div class="d-flex mb-5 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-globe text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Worldwide Service</h5>
                            <p class="mb-0">We provide fast and reliable courier services across all major cities, ensuring your parcels reach safely and on time.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-5 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-shipping-fast text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>On Time Delivery</h5>
                            <p class="mb-0">Our optimized delivery system ensures that all shipments reach their destination quickly and without delays.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-0 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-headphones text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>24/7 Telephone Support</h5>
                            <p class="mb-0">Our support team is available 24/7 to assist you with bookings, tracking, and delivery-related queries.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/reliable-courier.jpeg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    
    <div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Courier Service Pricing Plans</h6>
            <h1 class="mb-5">  Choose the Perfect Plan for Your Delivery Needs</h1>
        </div>
        <div class="row g-4">

            <!-- City Plan -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="price-item">
                    <div class="border-bottom p-4 mb-4">
                        <h5 class="text-primary mb-1">City Delivery Plan</h5>
                        <h1 class="display-5 mb-0">
                            <small class="align-top" style="font-size: 22px; line-height: 45px;">₨</small>4,999
                            <small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                        </h1>
                    </div>
                    <div class="p-4 pt-0">
                        <p><i class="fa fa-check text-success me-3"></i>City-Wide Deliveries</p>
                        <p><i class="fa fa-check text-success me-3"></i>Up to 50 Parcels / Month</p>
                        <p><i class="fa fa-check text-success me-3"></i>Live Delivery Tracking</p>
                        <p><i class="fa fa-check text-success me-3"></i>SMS Delivery Alerts</p>
                        <p><i class="fa fa-check text-success me-3"></i>Basic Customer Support</p>
                        <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order Now</span></a>
                    </div>
                </div>
            </div>

            <!-- Out of City Plan -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="price-item">
                    <div class="border-bottom p-4 mb-4">
                        <h5 class="text-primary mb-1">Out of City Delivery Plan</h5>
                        <h1 class="display-5 mb-0">
                            <small class="align-top" style="font-size: 22px; line-height: 45px;">₨</small>9,999
                            <small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                        </h1>
                    </div>
                    <div class="p-4 pt-0">
                        <p><i class="fa fa-check text-success me-3"></i>Inter-City Deliveries</p>
                        <p><i class="fa fa-check text-success me-3"></i>Up to 200 Parcels / Month</p>
                        <p><i class="fa fa-check text-success me-3"></i>Advanced Tracking System</p>
                        <p><i class="fa fa-check text-success me-3"></i>Priority Support</p>
                        <p><i class="fa fa-check text-success me-3"></i>Delivery Status Reports</p>
                        <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order Now</span></a>
                    </div>
                </div>
            </div>

            <!-- Out of Country Plan -->
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                <div class="price-item">
                    <div class="border-bottom p-4 mb-4">
                        <h5 class="text-primary mb-1">International Delivery Plan</h5>
                        <h1 class="display-5 mb-0">
                            <small class="align-top" style="font-size: 22px; line-height: 45px;">₨</small>14,999
                            <small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                        </h1>
                    </div>
                    <div class="p-4 pt-0">
                        <p><i class="fa fa-check text-success me-3"></i>Worldwide Deliveries</p>
                        <p><i class="fa fa-check text-success me-3"></i>Unlimited Shipments</p>
                        <p><i class="fa fa-check text-success me-3"></i>Real-Time Global Tracking</p>
                        <p><i class="fa fa-check text-success me-3"></i>Dedicated Support Agent</p>
                        <p><i class="fa fa-check text-success me-3"></i>Analytics & Reporting</p>
                        <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Order Now</span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <!-- Pricing End -->


    <!-- Quote Start -->
    
    <section class="quote-section" style="padding:60px 0;">
    <div class="container">
    <div class="row align-items-center g-4">
        <div class="col-lg-6 col-12">
            <h5 style="color:#00AEEF; font-size:14px; letter-spacing:1px;">REQUEST A CALLBACK</h5>
            <h2 style="font-size:38px; font-weight:800; margin-bottom:20px;">
                We will contact in<br> the shortest time.
            </h2>
            <p style="color:#666; margin-bottom:30px;">
                Monday to Friday, 9am–5pm.
            </p>

            <div style="display:flex; align-items:center; margin-top:30px;">
                <div style="background:#ff4747; padding:18px; border-radius:4px; margin-right:15px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" width="40">
                </div>
                <div>
                    <h4 style="margin:0; font-size:16px;">Call for any query!</h4>
                    <h3 style="margin:0; color:#ff4747; font-size:26px;">+012 345 6789</h3>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-12 bg-light p-4 rounded">
            <form>
               <div class="row g-3 mb-3">
    <div class="col-md-6 col-12">
        <input type="text" class="form-control" placeholder="Name">
    </div>
    <div class="col-md-6 col-12">
        <input type="email" class="form-control" placeholder="Email">
    </div>
</div>

                <div style="margin-bottom:20px;">
                    <textarea placeholder="Message" 
                        style="width:100%; padding:14px; border:1px solid #ddd; border-radius:4px; height:120px;"></textarea>
                </div>

                <button type="submit" 
                    style="width:100%; padding:15px; background:#ff4747; color:#fff; border:none; border-radius:4px; font-size:18px;">
                    Send Message
                </button>
            </form>
        </div>

    </div>
</section>

    <!-- Quote End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Our Team</h6>
                <h1 class="mb-5">Our Operations & Delivery Team</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="img/teams-1.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Delivery Team</h5>
                        <p>Fast and secure parcel delivery across all locations.</p>
                        <div class="btn-slide mt-1">
                            <i class="fa fa-share"></i>
                            <span>
                                <a href=""><i class="fa fa-truck-fast"></i></a>
                                <a href=""><i class="fa fa-box"></i></a>
                                <a href=""><i class="fa fa-motorcycle"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="img/teams-2.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Operations Team</h5>
                        <p>Manages routes, dispatching, scheduling, and daily workflow.</p>
                        <div class="btn-slide mt-1">
                            <i class="fa fa-share"></i>
                            <span>
                                <a href="#"><i class="fa fa-cog"></i></a>
                                <a href="#"><i class="fa fa-project-diagram"></i></a>
                                <a href="#"><i class="fa fa-sitemap"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="img/teams-3.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Logistics Team</h5>
                        <p>Handles parcel movement, sorting, and shipment coordination.</p>
                        <div class="btn-slide mt-1">
                            <i class="fa fa-share"></i>
                            <span>
                                <a href="#"><i class="fa fa-warehouse"></i></a>
                                <a href="#"><i class="fa fa-route"></i></a>
                                <a href="#"><i class="fa fa-boxes"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="img/teams-4.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Support Team</h5>
                        <p>Assists customers with tracking, queries, and delivery updates.</p>
                        <div class="btn-slide mt-1">
                            <i class="fa fa-share"></i>
                            <span>
                                <a href="#"><i class="fa fa-headset"></i></a>
                                <a href="#"><i class="fa fa-comments"></i></a>
                                <a href="#"><i class="fa fa-user-circle"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="text-center">
            <h6 class="text-secondary text-uppercase">Testimonial</h6>
            <h1 class="mb-0">Our Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">

            <!-- Testimonial 1 -->
            <div class="testimonial-item p-4 my-5">
                <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                <div class="d-flex align-items-end mb-4">
                    <img class="img-fluid flex-shrink-0" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <div class="ms-4">
                        <h5 class="mb-1"> Sara Malik</h5>
                        <p class="m-0">Online Store Owner</p>
                    </div>
                </div>
                <p class="mb-0">"Unki fast delivery ne mere e-commerce store ki shipping speed ko bohot improve kar diya. Tracking system reliable hai aur parcels hamesha safe deliver hote hain."</p>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-item p-4 my-5">
                <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                <div class="d-flex align-items-end mb-4">
                    <img class="img-fluid flex-shrink-0" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <div class="ms-4">
                        <h5 class="mb-1"> Bilal Raza</h5>
                        <p class="m-0">Corporate Client</p>
                    </div>
                </div>
                <p class="mb-0">"Daily document deliveries ke liye hum in par depend karte hain. Time se delivery, professional staff, aur zero complaints — excellent service!"</p>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-item p-4 my-5">
                <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                <div class="d-flex align-items-end mb-4">
                    <img class="img-fluid flex-shrink-0" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <div class="ms-4">
                        <h5 class="mb-1">Ahmed Khan</h5>
                        <p class="m-0">E-Commerce Seller</p>
                    </div>
                </div>
                <p class="mb-0">"Cash-on-delivery returns bohot smoothly handle karte hain. Customer support friendly hai aur shipping rates bhi reasonable."</p>
            </div>

            <!-- Testimonial 4 -->
            <div class="testimonial-item p-4 my-5">
                <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                <div class="d-flex align-items-end mb-4">
                    <img class="img-fluid flex-shrink-0" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <div class="ms-4">
                        <h5 class="mb-1">Fatima Noor</h5>
                        <p class="m-0">Regular Customer</p>
                    </div>
                </div>
                <p class="mb-0">"City-to-city parcels hamesha time par deliver hote hain. Prices affordable hain aur packing secure hoti hai. Highly recommended!"</p>
            </div>

        </div>
    </div>
</div>

    <!-- Testimonial End -->
 @endsection

