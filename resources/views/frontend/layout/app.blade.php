<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rumah Makan Medan Maro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('template2/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template2/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template2/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template2/css/style.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<style>
    /* Tambahan warna kuning saat hover dan active */
    .dropdown-menu .dropdown-item:hover,
    .dropdown-menu .dropdown-item.active {
        background-color: #ffc107;
        /* Bootstrap yellow */
        color: #000 !important;
    }

    .nav-link.dropdown-toggle.active {
        color: #ffc107 !important;
        /* Warna kuning untuk menu aktif */
    }

</style>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ route('frontend.beranda') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>RM Maro</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('frontend.beranda') }}" class="nav-item nav-link {{ request()->routeIs('frontend.beranda') ? 'active' : '' }}">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('menu.*') ? 'active' : '' }}" data-bs-toggle="dropdown">Menu</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('menu.makanan') }}" class="dropdown-item {{ request()->routeIs('menu.makanan') ? 'active' : '' }}">Makanan</a>
                                <a href="{{ route('menu.minuman') }}" class="dropdown-item {{ request()->routeIs('menu.minuman') ? 'active' : '' }}">Minuman</a>
                                <a href="{{ route('menu.snack') }}" class="dropdown-item {{ request()->routeIs('menu.snack') ? 'active' : '' }}">Cemilan</a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('cart') }}" class="btn btn-warning ms-3 position-relative">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="d-none d-lg-inline">Keranjang</span>
                        @if(session('cart'))
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count(session('cart')) }}
                        </span>
                        @endif
                    </a>

                </div>
            </nav>

            @yield('hero')
        </div>
        <!-- Navbar & Hero End -->
        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="text-center py-3 border-top border-secondary">
                &copy; 2026 <strong>Rumah Makan Medan Maro</strong>. All rights reserved.
            </div>
        </div>
        <!-- Footer End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template2/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template2/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template2/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template2/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template2/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template2/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('template2/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('template2/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('template2/js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>
