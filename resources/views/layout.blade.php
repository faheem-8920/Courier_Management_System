<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome | Courier Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries CSS -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Main Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white">CMS</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/index') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                <a href="{{ url('/service') }}" class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="{{ url('/price') }}" class="dropdown-item">Pricing Plan</a>
                        <a href="{{ url('/feature') }}" class="dropdown-item">Features</a>
                        <a href="{{ url('/quote') }}" class="dropdown-item">Free Quote</a>
                        <a href="{{ url('/team') }}" class="dropdown-item">Our Team</a>
                        <a href="{{ url('/testimonial') }}" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
            </div>


            <!-- Auth Section -->
          @guest
<div class="d-flex align-items-center gap-2">
    <a href="{{ route('login') }}"><button class="btn btn-primary rounded-3 btn-medium me-2"  >Login</button></a>
    <a href="{{ route('register') }}"><button class="btn btn-primary rounded-3 btn-medium me-2">Register</button></a>
</div>
@endguest



            @auth
                <ul class="navbar-nav align-items-center ms-lg-3 pe-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center"
                           href="#"
                           data-bs-toggle="dropdown">
<img src="{{ Auth::user()->profile_photo_url ?? asset('img/default-profile.png') }}"
     onerror="this.src='{{ asset('img/default-profile.png') }}'"
     class="rounded-circle me-2"
     width="30"
     height="30">


                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="fa fa-user me-2"></i> Profile
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fa fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endauth
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Content -->
    @yield('content')
    <!-- Page Content End -->

    <!-- Footer -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top:6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link">Air Freight</a>
                    <a class="btn btn-link">Sea Freight</a>
                    <a class="btn btn-link">Road Freight</a>
                    <a class="btn btn-link">Logistic Solutions</a>
                    <a class="btn btn-link">Industry Solutions</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link">About Us</a>
                    <a class="btn btn-link">Contact Us</a>
                    <a class="btn btn-link">Our Services</a>
                    <a class="btn btn-link">Terms & Conditions</a>
                    <a class="btn btn-link">Support</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Subscribe for latest updates</p>
                    <div class="position-relative mx-auto" style="max-width:400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} <strong>Courier Management System</strong>. All Rights Reserved.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>