<!doctype html>
<html lang="en" dir="ltr" data-bs-theme="light" data-bs-theme-color="theme-color-default">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rumah Makan Maro</title>


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/html/assets/images/favicon.ico') }}">

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/core/libs.min.css') }}">

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/hope-ui.min.css?v=5.0.0') }}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/custom.min.css?v=5.0.0') }}">

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/customizer.min.css?v=5.0.0') }}">

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/rtl.min.css?v=5.0.0') }}">
</head>



</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body">
            </div>
        </div>
    </div>
    <!-- loader END -->

    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="{{ route('backend.beranda') }}" class="navbar-brand">
                <div class="logo-main">
                    <!-- Logo Normal -->
                    <div class="logo-normal">
                        <svg class="icon-30" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Atap rumah -->
                            <polygon points="32,10 10,28 54,28" fill="none" stroke="currentColor" stroke-width="2" />

                            <!-- Dinding rumah -->
                            <rect x="16" y="28" width="32" height="26" fill="none" stroke="currentColor" stroke-width="2" />

                            <!-- Garpu (di kiri) -->
                            <line x1="22" y1="32" x2="22" y2="48" stroke="currentColor" stroke-width="2" />
                            <line x1="20.5" y1="32" x2="20.5" y2="38" stroke="currentColor" stroke-width="1.5" />
                            <line x1="22" y1="32" x2="22" y2="38" stroke="currentColor" stroke-width="1.5" />
                            <line x1="23.5" y1="32" x2="23.5" y2="38" stroke="currentColor" stroke-width="1.5" />

                            <!-- Sendok (di kanan) -->
                            <path d="M42 32 C44 32, 44 36, 42 36 C40 36, 40 32, 42 32 Z" fill="currentColor" />
                            <line x1="42" y1="36" x2="42" y2="48" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>

                </div>
                <h5 class="logo-title">RM Maro</h5>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>

        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.beranda') }}">
                            <i class="icon">📊</i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>

                    <!-- User Management (Hanya Admin) -->
                    @if(Auth::user()->role == 1 || Auth::user()->role == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.user.index') }}">
                            <i class="icon">👥</i>
                            <span class="item-name">User</span>
                        </a>
                    </li>
                    @endif

                    <!-- Produk (Tampilkan untuk semua, tapi beda isi dropdown) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="produkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon">🍔</i>
                            <span class="item-name">Produk</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="produkDropdown">
                            @if(Auth::user()->role == 1 || Auth::user()->role == 0)
                            <!-- Tampilkan Kategori hanya untuk Admin -->
                            <li><a class="dropdown-item" href="{{ route('backend.katagori.index') }}">Kategori</a></li>
                            @endif
                            <!-- Tampilkan Produk untuk semua role -->
                            <li><a class="dropdown-item" href="{{ route('backend.produk.index') }}">Produk</a></li>
                        </ul>
                    </li>

                    <!-- Laporan (Hanya Admin) -->
                    @if(Auth::user()->role == 1 || Auth::user()->role == 0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon">📋</i>
                            <span class="item-name">Laporan</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="laporanDropdown">
                            <li><a class="dropdown-item" href="{{ route('backend.laporan.formuser') }}">User</a></li>
                            <li><a class="dropdown-item" href="{{ route('backend.laporan.formproduk') }}">Produk</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->role == 2)
                    <!-- Kasir -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kasir.index') }}">
                            <i class="icon">💵</i>
                            <span class="item-name">Kasir</span>
                        </a>
                    </li>

                    <!-- Order Item -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.orders.index') }}">
                            <i class="icon">🛒</i>
                            <span class="item-name">Order Item</span>
                            @if($pendingOrdersCount > 0)
                            <span class="badge bg-danger">{{ $pendingOrdersCount }}</span>
                            @endif
                        </a>
                    </li>
                    @endif

                    <!-- Laporan Kasir -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan.index') }}">
                            <i class="icon">📈</i>
                            <span class="item-name">Laporan Kasir</span>
                        </a>
                    </li>


                    <!-- Logout -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon">🚪</i>
                            <span class="item-name">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('backend.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>

        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="{{ route('backend.beranda') }}" class="navbar-brand">

                        <div class="logo-main">
                            <!-- Logo Normal -->
                            <div class="logo-normal">
                                <svg class="icon-30" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Atap rumah -->
                                    <polygon points="32,10 10,28 54,28" fill="none" stroke="currentColor" stroke-width="2" />

                                    <!-- Dinding rumah -->
                                    <rect x="16" y="28" width="32" height="26" fill="none" stroke="currentColor" stroke-width="2" />

                                    <!-- Garpu (di kiri) -->
                                    <line x1="22" y1="32" x2="22" y2="48" stroke="currentColor" stroke-width="2" />
                                    <line x1="20.5" y1="32" x2="20.5" y2="38" stroke="currentColor" stroke-width="1.5" />
                                    <line x1="22" y1="32" x2="22" y2="38" stroke="currentColor" stroke-width="1.5" />
                                    <line x1="23.5" y1="32" x2="23.5" y2="38" stroke="currentColor" stroke-width="1.5" />

                                    <!-- Sendok (di kanan) -->
                                    <path d="M42 32 C44 32, 44 36, 42 36 C40 36, 40 32, 42 32 Z" fill="currentColor" />
                                    <line x1="42" y1="36" x2="42" y2="48" stroke="currentColor" stroke-width="2" />
                                </svg>
                            </div>
                        </div>
                        <h5 class="logo-title ">Rumah Makan Khas Medan</h5>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            @auth
                            <li class="nav-item dropdown custom-drop">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (Auth::user()->foto)
                                    <img src="{{ asset('storage/img-user/' . Auth::user()->foto) }}" alt="user" class="rounded-circle" width="31">
                                    @else
                                    <img src="{{ asset('storage/img-user/img-default.jpg') }}" alt="user" class="rounded-circle" width="31">
                                    @endif
                                    <div class="caption ms-3 d-none d-md-block">
                                        <h6 class="mb-0 caption-title">{{ Auth::user()->nama }}</h6>
                                        <p class="mb-0 caption-sub-title">
                                            @if (Auth::user()->role == 1)
                                            Super Admin
                                            @elseif (Auth::user()->role == 0)
                                            Admin
                                            @endif
                                        </p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('backend.user.edit', Auth::user()->id) }}">Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form id="keluar-app" action="{{ route('backend.logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        <button class="dropdown-item" type="button" onclick="document.getElementById('keluar-app').submit();">
                                            Logout
                                        </button>
                                    </li>
                                </ul>
                            </li>
                            @endauth
                        </ul>
                    </div>

                </div>
            </nav> <!-- Nav Header Component Start -->
            <div>
                @yield('content')
            </div>

            <div class="iq-navbar-header" style="height: 215px;">
                <!-- Nav Header Component End -->
                <!--Nav End-->
            </div>
            <div class="conatiner-fluid content-inner mt-n5 py-0">
            </div>
            <!-- Footer Section Start -->
            <footer class="footer">
                <div class="footer-body">
                    <ul class="left-panel list-inline mb-0 p-0">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                    <div class="right-panel">
                        ©<script>
                            document.write(new Date().getFullYear())

                        </script> Web Programing. Web Resto
                        <span class="">
                    </div>
                </div>
            </footer>
            <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->

    <!-- sweetalert -->
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    <!-- sweetalert End -->
    <!-- konfirmasi success-->
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Berhasil!'
            , text: "{{ session('success') }}"
        });

    </script>
    @endif
    <!-- sweetalert -->

    <!-- Script Hapus User-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-confirm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    const userName = this.getAttribute('data-nama');
                    const form = document.getElementById(`delete-form-${userId}`);

                    Swal.fire({
                        title: 'Apakah Anda yakin?'
                        , text: `Data pengguna "${userName}" akan dihapus!`
                        , icon: 'warning'
                        , showCancelButton: true
                        , confirmButtonColor: '#d33'
                        , cancelButtonColor: '#3085d6'
                        , confirmButtonText: 'Ya, hapus!'
                        , cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });

    </script>
    <!-- Script Hapus user end -->

    <!-- Script Hapus kategori -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.show_confirm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the form submission on click

                    const nama_katagori = this.getAttribute('data-konf-delete'); // Pastikan mengambil data-konf-delete

                    Swal.fire({
                        title: 'Apakah Anda yakin?'
                        , text: `Kategori "${nama_katagori}" akan dihapus!`
                        , icon: 'warning'
                        , showCancelButton: true
                        , confirmButtonColor: '#d33'
                        , cancelButtonColor: '#3085d6'
                        , confirmButtonText: 'Ya, hapus!'
                        , cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.closest('form').submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });

    </script>
    <!-- Script Hapus kategori end -->

    <script>
        // previewFoto
        function previewFoto() {
            const foto = document.querySelector('input[name="foto"]');
            const fotoPreview = document.querySelector('.foto-preview');
            fotoPreview.style.display = 'block';
            const fotoReader = new FileReader();
            fotoReader.readAsDataURL(foto.files[0]);
            fotoReader.onload = function(fotoEvent) {
                fotoPreview.src = fotoEvent.target.result;
                fotoPreview.style.width = '100%';
            }
        }

    </script>

    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- <script
          src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> -->
    <script>
        ClassicEditor.create(document.querySelector('#ckeditor')).catch(error => {
            console.error(error);
        });

    </script>

    <!-- Library Bundle Script -->
    <script src="{{ asset('template/html/assets/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('template/html/assets/js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('template/html/assets/js/charts/widgetcharts.js') }}"></script>

    <!-- mapchart Script -->
    <script src="{{ asset('template/html/assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('template/html/assets/js/charts/dashboard.js') }}"></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('template/html/assets/js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ asset('template/html/assets/js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('template/html/assets/js/plugins/slider-tabs.js') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('template/html/assets/js/plugins/form-wizard.js') }}"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="{{ asset('template/html/assets/js/hope-ui.js') }}" defer></script>



</body>

</html>
