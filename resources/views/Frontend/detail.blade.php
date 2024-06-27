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
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="d-block w-100 h-100" src="images/1.jpg" alt="Gambar">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="images/2.jpg" alt="Gambar">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="images/3.jpg" alt="Gambar">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#product-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#product-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">Kaos</h3>
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
                <h3 class="font-weight-semi-bold mb-4">Rp. 70.000</h3>
                <p class="mb-4">Kami menghadirkan baju-baju berkualitas tinggi yang terbuat dari bahan pilihan, memberikan kenyamanan dan kepuasan dalam setiap pemakaian. Dibuat dengan tekad untuk menjaga kualitas dan gaya, setiap baju kami tidak hanya memberikan nilai yang luar biasa, tetapi juga mengekspresikan kepribadian Anda dengan cara yang unik.</p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Ukuran:</p>
                    <form>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="size-1" name="size">
                            <label class="form-check-label" for="size-1">XS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="size-2" name="size">
                            <label class="form-check-label" for="size-2">S</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="size-3" name="size">
                            <label class="form-check-label" for="size-3">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="size-4" name="size">
                            <label class="form-check-label" for="size-4">L</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="size-5" name="size">
                            <label class="form-check-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Warna:</p>
                    <form>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="color-1" name="color">
                            <label class="form-check-label" for="color-1">Hitam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="color-2" name="color">
                            <label class="form-check-label" for="color-2">Putih</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="color-3" name="color">
                            <label class="form-check-label" for="color-3">Merah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="color-4" name="color">
                            <label class="form-check-label" for="color-4">Biru</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="color-5" name="color">
                            <label class="form-check-label" for="color-5">Hijau</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mx-3" style="width: 130px;">
                        <button class="btn btn-dark btn-minus">
                            <i class="bi bi-dash"></i>
                        </button>
                        <input type="text" class="form-control bg-secondary text-center" value="1" id="quantity-input">
                        <button class="btn btn-dark btn-plus">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <button class="btn btn-dark px-3"><i class="bi bi-cart3 mr-1"></i> Tambahkan ke Keranjang</button>
                </div>
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
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <button class="nav-link active text-dark" data-bs-toggle="tab" data-bs-target="#tab-pane-1">Toko</button>
                    <button class="nav-link text-dark" data-bs-toggle="tab" data-bs-target="#tab-pane-2">Deskripsi</button>
                    <button class="nav-link text-dark" data-bs-toggle="tab" data-bs-target="#tab-pane-3">Informasi</button>
                    <button class="nav-link text-dark" data-bs-toggle="tab" data-bs-target="#tab-pane-4">Ulasan (0)</button>
                </div>                
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <!-- Foto Profil -->
                        <div class="text-center mb-3">
                            <img src="images/6.jpg" alt="Foto Profil" style="width: 150px; height: 150px; border-radius: 50%;">
                        </div>
                    
                        <!-- Nama, Alamat, Nomor Telepon -->
                        <h4 class="text-center">Nama Toko</h4>
                        <p class="text-center">Alamat Toko</p>
                        <p class="text-center">Nomor Telepon Toko</p>
                    
                        <!-- Button Jumlah Pelanggan -->
                        <div class="text-center">
                            <button class="btn btn-primary">Jumlah Pelanggan</button>
                        </div>
                    
                        <!-- Button Pesanan Diterima -->
                        <div class="text-center mt-3">
                            <button class="btn btn-success">Pesanan Diterima</button>
                        </div>
                    
                        <!-- Button Informasi Bergabung -->
                        <div class="text-center mt-3">
                            <button class="btn btn-info">Informasi Bergabung</button>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Deskripsi Produk</h4>
                        <p>Dapatkan gaya yang unik dan trendi dengan koleksi baju desain Majantara kami yang terbaru! Setiap potongan baju dirancang dengan penuh perhatian pada detailnya, menciptakan kombinasi sempurna antara gaya kontemporer dan motif tradisional Majantara yang ikonik.

                            Dengan harga yang terjangkau, kami menghadirkan baju-baju berkualitas tinggi yang terbuat dari bahan pilihan, memberikan kenyamanan dan kepuasan dalam setiap pemakaian. Dibuat dengan tekad untuk menjaga kualitas dan gaya, setiap baju kami tidak hanya memberikan nilai yang luar biasa, tetapi juga mengekspresikan kepribadian Anda dengan cara yang unik.
                            
                            Saat Anda berbelanja di sini, Anda tidak hanya mendapatkan produk yang berkualitas, tetapi juga pengalaman belanja yang memuaskan. Jadi, jangan ragu untuk memilih baju desain Majantara kami sebagai tambahan yang sempurna untuk lemari pakaian Anda. Segera dapatkan gaya yang berbeda dan menarik dengan harga yang terjangkau hari ini!</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <h4 class="mb-3">Informasi Tambahan</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                       <strong>Desain Unik: </strong>Kaos desain Majantara menawarkan desain yang unik dan memikat, menciptakan penampilan yang berbeda dan menarik dari yang lain.
                                    </li>
                                    <li class="list-group-item px-0">
                                        <strong>Kualitas Terbaik: </strong>Dibuat dengan bahan berkualitas tinggi, kaos ini menawarkan kenyamanan maksimal saat dipakai sekaligus daya tahan yang luar biasa.
                                    </li>
                                    <li class="list-group-item px-0">
                                        <strong>Harga Terjangkau:</strong> Meskipun menawarkan desain yang eksklusif dan kualitas yang tinggi, kaos desain Majantara tetap terjangkau, sehingga memungkinkan Anda untuk tampil bergaya tanpa perlu menguras dompet.
                                    </li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 ulasan untuk "Kemeja Gaya Berwarna-warni"</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Gambar" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <i class="bi bi-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Tinggalkan ulasan</h4>
                                <small>Alamat email Anda tidak akan dipublikasikan. Kolom yang wajib diisi ditandai *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Penilaian Anda * :</p>
                                    <div class="text-primary">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Ulasan Anda *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Anda *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Anda *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Tinggalkan Ulasan Anda" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Toko Selesai -->









    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.btn-plus').addEventListener('click', function () {
            let quantityInput = document.getElementById('quantity-input');
            let currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue)) {
                quantityInput.value = currentValue + 1;
            }
        });

        document.querySelector('.btn-minus').addEventListener('click', function () {
            let quantityInput = document.getElementById('quantity-input');
            let currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });
    });
</script>
@endsection


