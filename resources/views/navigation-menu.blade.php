
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

            <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>+012 345 6789</h4>

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

