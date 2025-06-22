@extends('frontend.layout.app')

@section('hero')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Menu Snack</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Nikmati berbagai pilihan camilan khas Medan</p>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="{{ asset('template2/img/hero.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Snack Menu</h5>
            <h1 class="mb-5">Menu Snack</h1>
        </div>
        <div class="row g-4">
            @foreach($snack as $item)
            <div class="col-lg-6">
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/img-produk/' . $item->foto) }}" alt="{{ $item->nama_produk  }}" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="w-100 d-flex flex-column text-start ps-4">
                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                            <span>{{ $item->nama_produk }}</span>
                            <span class="text-primary">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        </h5>
                        <small class="fst-italic">{{ $item->detail }}</small>
                    </div>
                </div>
                <!-- Tombol Tambah ke Keranjang yang benar -->
                <form action="{{ route('add.to.cart') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
