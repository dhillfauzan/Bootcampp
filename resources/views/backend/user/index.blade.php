@extends('backend.layout.app')

@section('content')
<!-- contentAwal -->

<!-- Menampilkan judul -->
<h3 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">{{$judul}}</h3>
<div>
    <!-- Tombol "Tambah" di sebelah kanan atas, dengan margin untuk memberi jarak -->
    <a href="{{ route('backend.user.create') }}">
        <button type="button" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Tambah
        </button>
    </a>
</div>

<div style="overflow-x:auto;">
    <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
        <thead>
            <tr style="background-color: #f4f4f4; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ddd;">No</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Email</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Nama</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Role</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Status</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($index as $row)
            <tr style="background-color: #fff;">
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $loop->iteration }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{$row->email}}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{$row->nama}}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{$row->role}}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{$row->status}}</td>
                <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">

                    <!-- Tombol "Ubah" dan "Hapus" -->
                    <a href="{{ route('backend.user.edit', $row->id) }}">
                        <button type="button" style="padding: 6px 12px; background-color: #ffa500; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Ubah
                        </button>
                    </a>
                    <form action="{{ route('backend.user.destroy', $row->id) }}" method="POST" style="display: inline;" id="delete-form-{{$row->id}}">
                        @method('delete')
                        @csrf
                        <button type="button" class="btn btn-danger btn-sm delete-confirm" data-id="{{$row->id}}" data-nama="{{$row->nama}}" style="padding: 6px 12px; background-color: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- contentAkhir -->
@endsection
