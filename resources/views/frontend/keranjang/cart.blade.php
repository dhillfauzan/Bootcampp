@extends('frontend.layout.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Keranjang Belanja</h5>
            <h1 class="mb-5">Pesanan Anda</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(count((array) session('cart')))
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Menu</th>
                                        <th class="text-end">Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-end">Subtotal</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/img-produk/' . $details['image']) }}" class="img-thumbnail me-3" width="60" height="60" style="object-fit: cover;">
                                                <span>{{ $details['name'] }}</span>
                                            </div>
                                        </td>
                                        <td class="text-end align-middle">Rp {{ number_format($details['price'], 0, ',',
                                            '.') }}</td>
                                        <td class="text-center align-middle">
                                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart text-center" min="1" style="width: 70px; display: inline-block;">
                                        </td>
                                        <td class="text-end align-middle">Rp {{ number_format($details['price'] *
                                            $details['quantity'], 0, ',', '.') }}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-outline-danger btn-sm remove-from-cart" data-id="{{ $id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-group-divider">
                                    <tr>
                                        <th colspan="3" class="text-end">Total</th>
                                        <th class="text-end">Rp {{ number_format($total, 0, ',', '.') }}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-5">
                    <a href="{{ route('frontend.beranda') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                    </a>
                    <a href="{{ route('checkout') }}" class="btn btn-primary">
                        Lanjut ke Pembayaran <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
                @else
                <div class="card shadow-sm">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
                        <h4 class="text-muted">Keranjang Anda kosong</h4>
                        <p class="text-muted">Silakan tambahkan menu ke keranjang belanja Anda</p>
                        <a href="{{ route('frontend.beranda') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-utensils me-2"></i>Beranda
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        // Update quantity
        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            var produk_id = ele.closest("tr").find(".remove-from-cart").data("id");
            var quantity = ele.val();

            $.ajax({
                url: '{{ route("update.cart") }}'
                , method: 'PATCH'
                , data: {
                    _token: '{{ csrf_token() }}'
                    , produk_id: produk_id
                    , quantity: quantity
                }
                , success: function(response) {
                    if (response.success) {
                        window.location.reload();
                    } else {
                        alert(response.error || "Terjadi kesalahan");
                    }
                }
                , error: function(xhr) {
                    alert(xhr.responseJSON ? .error || "Terjadi kesalahan saat memperbarui keranjang");
                }
            });
        });

        // Remove item
        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
                $.ajax({
                    url: '{{ route("remove.from.cart") }}'
                    , method: 'DELETE'
                    , data: {
                        _token: '{{ csrf_token() }}'
                        , produk_id: ele.data("id")
                    }
                    , success: function(response) {
                        if (response.success) {
                            window.location.reload();
                        } else {
                            alert(response.error || "Terjadi kesalahan");
                        }
                    }
                    , error: function(xhr) {
                        alert(xhr.responseJSON ? .error || "Terjadi kesalahan saat menghapus item");
                    }
                });
            }
        });
    });

</script>
@endsection
@endsection
