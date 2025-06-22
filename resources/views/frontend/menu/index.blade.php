@extends('frontend.layout.app')

@section('hero')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Menu Kami</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Nikmati berbagai pilihan menu khas Medan</p>
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
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Menu Pilihan</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-utensils fa-3x text-primary mb-4"></i>
                        <h5>Makanan</h5>
                        <p>Berbagai pilihan makanan khas Medan</p>
                        <a href="{{ route('menu.makanan') }}" class="btn btn-primary">Lihat Menu</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-mug-hot fa-3x text-primary mb-4"></i>
                        <h5>Minuman</h5>
                        <p>Minuman segar khas Medan</p>
                        <a href="{{ route('menu.minuman') }}" class="btn btn-primary">Lihat Menu</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-cookie fa-3x text-primary mb-4"></i>
                        <h5>Snack</h5>
                        <p>Camilan dan kue khas Medan</p>
                        <a href="{{ route('menu.snack') }}" class="btn btn-primary">Lihat Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
