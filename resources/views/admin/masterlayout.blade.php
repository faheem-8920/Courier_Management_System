<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Custom CSS -->
    <style>
        /* Sidebar & Brand Animations */
        .slide-left { animation: slideInLeft 1s ease-out; }
        .animated-text { font-weight: 800; font-size: 1.3rem; color: #fff; text-shadow: 2px 2px 8px rgba(0,0,0,0.3); display: inline-block; position: relative; overflow: hidden; cursor: default; transition: transform 0.3s ease, text-shadow 0.3s ease; }
        .animated-text::after { content: ''; position: absolute; width: 80%; height: 100%; top: 0; left: -80%; background: linear-gradient(90deg, rgba(255,255,255,0.3), rgba(255,255,255,0.1), rgba(255,255,255,0.3)); animation: shine 2.5s infinite; }
        .animated-text:hover { transform: scale(1.1); text-shadow: 1px 1px 4px rgba(0,0,0,0.35); }
        @keyframes shine { 0% { left: -100%; } 50% { left: 100%; } 100% { left: 100%; } }
        @keyframes slideInLeft { from { transform: translateX(-50px); opacity: 0; } to { transform: translateX(0); opacity: 1; } }

        /* Sidebar Modern Look */
        .sidebar { backdrop-filter: blur(12px); box-shadow: 4px 0 25px rgba(0,0,0,0.25); transition: all 0.4s ease; }
        .sidebar:hover { box-shadow: 6px 0 35px rgba(0,0,0,0.35); }
        .sidebar .nav-item { margin: 6px 10px; position: relative; overflow: hidden; }
        .sidebar .nav-link { border-radius: 14px; padding: 12px 16px; transition: all 0.35s ease; position: relative; overflow: hidden; }
        .sidebar .nav-link::before { content: ""; position: absolute; left: -100%; top: 0; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent); transition: all 0.4s ease; }
        .sidebar .nav-link:hover::before { left: 100%; }
        .sidebar .nav-link:hover { background: rgba(255,255,255,0.15); transform: translateX(6px); }
        .sidebar .nav-item.active .nav-link { background: rgba(255,255,255,0.25); box-shadow: inset 4px 0 0 #ffffff; }
        .sidebar .nav-link i { transition: transform 0.4s ease, color 0.3s ease; }
        .sidebar .nav-link:hover i { transform: rotate(-8deg) scale(1.2); color: #fff; }
        .sidebar-brand { padding: 20px 0; transition: all 0.4s ease; }
        .sidebar-brand:hover { transform: scale(1.05); }
        .sidebar-brand-icon i { animation: pulseIcon 2.5s infinite; }
        @keyframes pulseIcon { 0% { transform: scale(1); } 50% { transform: scale(1.15); } 100% { transform: scale(1); } }

        /* Sidebar Links Hover */
        .user-link:hover .user-icon { transform: translateX(6px); color: #4e73df; }
        .rider-link:hover .rider-icon { transform: translateX(8px) rotate(-5deg); color: #1cc88a; }
        .shipment-link:hover .shipment-icon { transform: translateY(-4px) scale(1.05); color: #f6c23e; }
        .add-rider-link:hover .add-rider-icon { transform: scale(1.08); color: #36b9cc; text-shadow: 0 0 8px rgba(54,185,204,0.6); }
    </style>
    @stack('styles')

</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background:#e74a3b">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon slide-left">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="sidebar-brand-text mx-3 animated-text">Courier Admin</div>
            </a>

            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admindashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Users -->
            <li class="nav-item">
                <a class="nav-link user-link" href="/users">
                    <i class="fas fa-fw fa-users user-icon"></i>
                    <span class="nav-text">Users</span>
                </a>
            </li>

            <!-- Riders -->
            <li class="nav-item">
                <a class="nav-link rider-link" href="/riders">
                    <i class="fas fa-fw fa-motorcycle rider-icon"></i>
                    <span class="nav-text">Riders</span>
                </a>
            </li>

            <!-- Shipments -->
            <li class="nav-item">
                <a class="nav-link shipment-link" href="/shipments">
                    <i class="fas fa-fw fa-box shipment-icon"></i>
                    <span class="nav-text">Shipments</span>
                </a>
            </li>

            <!-- Add Rider -->
            <li class="nav-item">
                <a class="nav-link add-rider-link" href="/addrider">
                    <i class="fas fa-fw fa-user-plus add-rider-icon"></i>
                    <span class="nav-text">Add Rider</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background:linear-gradient(135deg, #f9f9f9 0%, #ffecec 100%);">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @auth
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-800 small font-weight-bold">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ Auth::user()->profile_photo_url }}" style="width:32px;height:32px;">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Main Content -->
                @yield("content")
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
</body>
</html>