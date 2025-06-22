@extends('backend.layout.app')

@section('content')
<!-- Content Awal -->
<div class="row">
    <div class="col-12">
        <a href="{{ route('backend.katagori.create') }}">
            <button type="button" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Tambah
            </button>
        </a>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $judul }}</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 5%; text-align: center;">No</th>
                                <th style="width: 70%;">Nama Kategori</th>
                                <th style="width: 25%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($index as $row)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $row->nama_katagori }}</td>
                                <td style="text-align: center;">

                                    <!-- Tombol Ubah -->
                                    <a href="{{ route('backend.katagori.edit', $row->id) }}" title="Ubah Data">
                                        <button type="button" class="btn btn-sm btn-warning">
                                            <i class="far fa-edit"></i> Ubah
                                        </button>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form method="POST" action="{{ route('backend.katagori.destroy', $row->id) }}" style="display: inline-block;">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger show_confirm" data-konf-delete="{{ $row->nama_katagori }}" title="Hapus Data">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Akhir -->
@endsection
