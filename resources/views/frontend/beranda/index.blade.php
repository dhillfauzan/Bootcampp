@extends('frontend.layout.app')

@section('hero')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Rumah Makan<br>Khas Medan</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Cita Rasa Khas Dari Makanan Asli Kota Medan</p>

            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="{{ asset('template2/img/hero.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Menu Pilihan</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="nav-pills-scroll-container">
                <ul class="nav nav-pills flex-nowrap overflow-auto pb-2" style="scrollbar-width: none;">
                    <li class="nav-item flex-shrink-0">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#makanan">
                            <i class="fa fa-utensils fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Menu</small>
                                <h6 class="mt-n1 mb-0">Makanan</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#minuman">
                            <i class="fa fa-mug-hot fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Menu</small>
                                <h6 class="mt-n1 mb-0">Minuman</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#snack">
                            <i class="fa fa-cookie fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Menu</small>
                                <h6 class="mt-n1 mb-0">Cemilan</h6>
                            </div>
                        </a>
                    </li>
                </ul>
                <style>
                    .nav-pills-scroll-container {
                        width: 100%;
                        overflow: hidden;
                    }

                    .nav-pills {
                        display: flex;
                        flex-wrap: nowrap;
                        overflow-x: auto;
                        -webkit-overflow-scrolling: touch;
                        -ms-overflow-style: -ms-autohiding-scrollbar;
                        scrollbar-width: none;
                        padding-bottom: 5px;
                    }

                    .nav-pills::-webkit-scrollbar {
                        display: none;
                    }

                    .nav-item {
                        flex: 0 0 auto;
                    }

                    @media (min-width: 768px) {
                        .nav-pills {
                            justify-content: center;
                            overflow-x: visible;
                        }
                    }

                </style>
                <div class="tab-content mt-5 mb-5">
                    <!-- Makanan Tab -->
                    <div id="makanan" class="tab-pane fade show active">
                        <div class="row g-4">
                            @foreach($makanan as $item)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/img-produk/' . $item->foto) }}" alt="{{ $item->nama_produk }}" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $item->nama_produk }}</span>
                                            <span class="text-primary">Rp {{ number_format($item->harga, 0, ',', '.')
                                                }}</span>
                                        </h5>
                                        <small class="fst-italic">{{ $item->detail }}</small>
                                        <!-- Tombol Tambah ke Keranjang yang benar -->
                                        <form action="{{ route('add.to.cart') }}" method="POST" class="mt-2">
                                            @csrf
                                            <input type="hidden" name="produk_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Minuman Tab -->
                    <div id="minuman" class="tab-pane fade">
                        <div class="row g-4">
                            @foreach($minuman as $item)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/img-produk/' . $item->foto) }}" alt="{{ $item->nama_produk }}" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $item->nama_produk }}</span>
                                            <span class="text-primary">Rp {{ number_format($item->harga, 0, ',', '.')
                                                }}</span>
                                        </h5>
                                        <small class="fst-italic">{{ $item->detail }}</small>
                                        <!-- Tombol Tambah ke Keranjang -->
                                        <form action="{{ route('add.to.cart') }}" method="POST" class="mt-2">
                                            @csrf
                                            <input type="hidden" name="produk_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Snack Tab -->
                    <div id="snack" class="tab-pane fade">
                        <div class="row g-4">
                            @foreach($snack as $item)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/img-produk/' . $item->foto) }}" alt="{{ $item->nama_produk }}" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $item->nama_produk }}</span>
                                            <span class="text-primary">Rp {{ number_format($item->harga, 0, ',', '.')
                                                }}</span>
                                        </h5>
                                        <small class="fst-italic">{{ $item->detail }}</small>
                                        <!-- Tombol Tambah ke Keranjang -->
                                        <form action="{{ route('add.to.cart') }}" method="POST" class="mt-2">
                                            @csrf
                                            <input type="hidden" name="produk_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
