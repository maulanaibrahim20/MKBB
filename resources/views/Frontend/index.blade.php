@extends('index')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark text-white mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Home</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Home</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="bi bi-check text-dark m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="bi bi-truck text-dark m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-2">Fast delivery</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="bi bi-arrow-left-right text-dark m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-2">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="bi bi-telephone-fill text-dark m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-2">Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Produk</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @forelse ($produk as $data)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @php
                                $gambar = gambarproduk($data->id)->first();
                            @endphp
                            @if ($gambar)
                                <img class="img-fluid product-img-custom" style="height: 480px; width:auto;"
                                    src="{{ asset('storage/' . $gambar->gambar) }}" alt="">
                            @else
                                <img class="img-fluid product-img-custom" src="{{ asset('storage/default-image.jpg') }}"
                                    alt="Default Image">
                            @endif
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $data['namaProduk'] }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>Rp. {{ number_format($data['harga'], 0, ',', '.') }}</h6>
                                @php
                                    $harga_diskon = $data['harga'] + 30000; // Menggunakan harga produk dan tambahan 30.000
                                @endphp
                                <h6 class="text-muted ml-2">
                                    <del>Rp.{{ number_format($harga_diskon, 0, ',', '.') }}</del>
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ url('/produk/detail/' . $data['id']) }}" class="btn btn-sm text-dark p-0"><i
                                    class="bi bi-eye text-dark mr-1"></i>View
                                Detail</a>
                            <form action="{{ url('/cart/post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $data['id'] }}">
                                <input type="hidden" name="toko_id" value="{{ $data['toko_id'] }}">
                                <input type="hidden" name="harga" value="{{ $data['harga'] }}">
                                <button type="submit" class="btn btn-sm text-dark p-0">
                                    <i class="bi bi-cart text-dark mr-1"></i>Add To Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>Produk Tidak Tersedia</p>
            @endforelse

        </div>
    </div>
    <!-- Products End -->
@endsection
