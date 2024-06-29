@extends('index')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark text-white mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Detail Toko Mulai -->
    <!-- Detail Toko Mulai -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <!-- Carousel -->
                <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner border">
                        @foreach (gambarproduk($produkDetail['id']) as $index => $gambars)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img class="d-block w-100 h-100" src="{{ asset('storage/' . $gambars->gambar) }}"
                                    alt="Gambar">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#product-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#product-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $produkDetail['namaProduk'] }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    <small class="pt-1">(50 Ulasan)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">Rp {{ number_format($produkDetail['harga'], 0, ',', '.') }}</h3>
                <p class="mb-4">Stok : {{ $produkDetail['stok'] }}</p>
                <p class="mb-4">{{ $produkDetail['deskripsiProduk'] }}</p>
                <form action="{{ url('/cart/post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produkDetail['id'] }}">
                    <input type="hidden" name="toko_id" value="{{ $produkDetail['toko_id'] }}">
                    <input type="hidden" name="harga" value="{{ $produkDetail['harga'] }}">
                    <div class="d-flex mb-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Ukuran:</p>
                        @foreach ($ukuran as $size)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="size-{{ $size }}" name="size"
                                    value="{{ $size }}" required>
                                <label class="form-check-label" for="size-{{ $size }}">{{ $size }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex mb-4">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Warna:</p>
                        @foreach ($warnaProduk as $color)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="color-{{ $color }}"
                                    name="color" value="{{ $color }}" required>
                                <label class="form-check-label"
                                    for="color-{{ $color }}">{{ $color }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mx-3" style="width: 130px;">
                            <button class="btn btn-dark btn-minus">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="text" class="form-control bg-secondary text-center" value="1"
                                name="qty" id="quantity-input">
                            <button class="btn btn-dark btn-plus">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <button type="submit" class="btn btn-dark px-3"><i class="bi bi-cart3 mr-1"></i> Tambahkan ke
                            Keranjang</button>
                    </div>
                </form>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Bagikan di:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="bi bi-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Detail Toko Selesai -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.btn-plus').addEventListener('click', function() {
                let quantityInput = document.getElementById('quantity-input');
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue)) {
                    quantityInput.value = currentValue + 1;
                }
            });

            document.querySelector('.btn-minus').addEventListener('click', function() {
                let quantityInput = document.getElementById('quantity-input');
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        });
    </script>
@endsection
