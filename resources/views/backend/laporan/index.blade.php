@extends('backend.layout.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-12">
            <h1 class="h3 mb-0">Laporan Transaksi Kasir</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Filter Laporan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('laporan.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="end_date">Tanggal Akhir</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}">
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary mr-2">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('laporan.cetak') }}?start_date={{ $startDate }}&end_date={{ $endDate }}" target="_blank" class="btn btn-success">
                            <i class="fas fa-print"></i> Cetak
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Ringkasan Laporan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <h6 class="card-title">Total Pendapatan</h6>
                            <h4 class="text-primary">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <h6 class="card-title">Total Transaksi</h6>
                            <h4 class="text-success">{{ $totalTransaksi }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <h6 class="card-title">Total Item Terjual</h6>
                            <h4 class="text-warning">{{ $totalItemTerjual }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-secondary">
            <h5 class="mb-0 text-black">Detail Transaksi</h5>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th>Total Item</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $key => $transaksi)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $transaksi->kode_transaksi }}</td>
                        <td>{{ $transaksi->tanggal->format('d/m/Y H:i') }}</td>
                        <td>{{ $transaksi->user->name }}</td>
                        <td>{{ $transaksi->total_item }}</td>
                        <td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('laporan.show', $transaksi->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
