@extends('backend.layout.app')

@section('content')
<!-- Content Awal -->
<div style="display: flex; flex-direction: column; margin-top: 20px; align-items: center; height: calc(100vh - 80px); text-align: center; margin-left: 100px;">
    <div style="border: 2px solid #ddd; border-radius: 10px; padding: 30px; width: 60%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); background-color: #fff;">
        @if (Auth::check())
        <h1 style="font-size: 2.5rem; font-weight: bold; color: #333;">
            Selamat Datang, <b>{{ Auth::user()->nama }}</b>
        </h1>
        <p class="mb-0 caption-sub-title">
            @if (Auth::user()->role == 1)
            <h1 style="font-size: 2.5rem; font-weight: bold; color: #333;">Super Admin</h1>
            @elseif (Auth::user()->role == 0)
            <h1 style="font-size: 2.5rem; font-weight: bold; color: #333;">Admin</h1>
            @elseif (Auth::user()->role == 2)
            <h1 style="font-size: 2.5rem; font-weight: bold; color: #333;">Kasir</h1>
            @endif </p>
        @else
        <h1 style="font-size: 2.5rem; font-weight: bold; color: #333;">Selamat Datang</h1>
        <p style="margin-top: 1rem; font-size: 1.2rem; color: #555;">
            Silakan login untuk mengakses fitur aplikasi Web Maro.
        </p>
        @endif
    </div>
</div>
<!-- Content Akhir -->
@endsection
