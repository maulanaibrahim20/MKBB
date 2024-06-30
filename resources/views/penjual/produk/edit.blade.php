<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- end: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- end: CSS -->
    <title>Penjual MKB</title>
</head>

<body>

    @include('sidebar')

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Pages</h5>
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">{{ Auth::user()->name }}</span>
                        <img class="navbar-profile-image"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Chat</a></li>
                        <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <div class="container">
                    <h2>Edit Produk</h2>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('/penjual/produk/update/' . $produk->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="foto-produk" class="form-label">Tambahkan Foto</label>
                            <input type="file" class="form-control" id="foto-produk" name="gambar">
                            @foreach (gambarproduk($produk->id) as $gambar)
                                <img src="{{ asset('storage/' . $gambar->gambar) }}" style="height: 100px; width:auto;"
                                    alt="">
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="namaProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="namaProduk" name="namaProduk"
                                value="{{ $produk->namaProduk }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Ukuran</label>
                                    <div>
                                        @foreach (['S', 'M', 'L', 'XL'] as $size)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    id="ukuran{{ $size }}" name="ukuran[]"
                                                    value="{{ $size }}"
                                                    {{ in_array($size, $produk->ukuran->pluck('ukuran')->toArray()) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="ukuran{{ $size }}">{{ $size }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Warna</label>
                                    <div>
                                        @foreach (['Merah', 'Biru', 'Hijau'] as $color)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    id="warna{{ $color }}" name="warnaProduk[]"
                                                    value="{{ $color }}"
                                                    {{ in_array($color, $produk->warna->pluck('warna')->toArray()) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="warna{{ $color }}">{{ $color }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kategoriProduk" class="form-label">Kategori</label>
                                    <select name="kategoriProduk" id="kategoriProduk" class="form-select">
                                        <option value="">-- Pilih --</option>
                                        <option value="kaos-gambar"
                                            {{ $produk->kategoriProduk == 'kaos-gambar' ? 'selected' : '' }}>Kaos
                                            Bergambar</option>
                                        <option value="kaos-polos"
                                            {{ $produk->kategoriProduk == 'kaos-polos' ? 'selected' : '' }}>Kaos
                                            Polo</option>
                                        <option value="kemeja"
                                            {{ $produk->kategoriProduk == 'kemeja' ? 'selected' : '' }}>Kemeja</option>
                                        <option value="jaket"
                                            {{ $produk->kategoriProduk == 'jaket' ? 'selected' : '' }}>Jaket</option>
                                        <option value="sweter"
                                            {{ $produk->kategoriProduk == 'sweter' ? 'selected' : '' }}>Sweter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga"
                                        value="{{ $produk->harga }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" class="form-control" id="stok" name="stok"
                                        value="{{ $produk->stok }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsiProduk">{{ $produk->deskripsiProduk }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
            <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
        integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            Swal.fire({
                title: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif
    <!-- end: JS -->

</body>

</html>
