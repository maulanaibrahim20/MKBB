@extends('index')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-dark text-white mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Profile</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="" class="text-white">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Profile</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="container my-4">
    <ul class="nav nav-tabs justify-content-center" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-dark" id="bio-tab" data-bs-toggle="tab" data-bs-target="#bio"
                type="button" role="tab" aria-controls="bio" aria-selected="true">Biodata Diri</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-dark" id="address-tab" data-bs-toggle="tab" data-bs-target="#address"
                type="button" role="tab" aria-controls="address" aria-selected="false">Belum Dibayar</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-dark" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment"
                type="button" role="tab" aria-controls="payment" aria-selected="false">Dikemas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-dark" id="bank-tab" data-bs-toggle="tab" data-bs-target="#bank" type="button"
                role="tab" aria-controls="bank" aria-selected="false">Dikirim</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-dark" id="notif-tab" data-bs-toggle="tab" data-bs-target="#notif" type="button"
                role="tab" aria-controls="notif" aria-selected="false">Selesai</button>
        </li>
    </ul>
    <div class="tab-content d-flex justify-content-center" id="profileTabsContent">
        <div class="tab-pane fade show active" id="bio" role="tabpanel" aria-labelledby="bio-tab">
            <div class="card mt-3" style="height: auto; width:700px;">
                <div class="card-body">
                    <h5 class="card-title text-center">Biodata Diri</h5>
                    <form action="{{url('/profile/update')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    @if($profile->image != null )
                                    <img src="{{ asset('storage/'.$profile->image) }}" class="rounded-circle"
                                        style="max-width: 50%;" />
                                    @else
                                    <img src="{{ asset('images/preview.png') }}" class="rounded-circle"
                                        style="max-width: 50%;" />
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name"
                                            value="{{$profile->user->name}}" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            value="{{$profile->user->email}}" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="noTelp" class="form-label">No Telepon</label>
                                        <input type="number" class="form-control" id="noTelp"
                                            value="{{$profile->noTelp}}" name="noTelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat"
                                            name="alamat">{{$profile->alamat}}</textarea>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3 text-end">
                                        <button type="submit" class="form-control btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
            <div class="card mt-3 overflow-auto" style="height: 400px; width:800px;">
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            @forelse ($checkout as $belumBayar )
                            @if ($belumBayar->status == 'belum bayar')
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3" style="height: auto; width:700px;">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    @foreach (checkoutproduk($belumBayar->id) as $produk)
                                                    <div class="col-md-12">
                                                        <h4 style="border-bottom: 1px solid black;">
                                                            {{$produk->toko->namaToko}}</h4>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">Nama Produk</p>
                                                                <p style="margin-bottom: 5px;">Harga Produk</p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p style="margin-bottom: 5px;">|</p>
                                                                <p style="margin-bottom: 5px;">|</p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">
                                                                    {{$produk->produk->namaProduk}} x
                                                                    {{$produk->qtyProduk}}</p>
                                                                <p style="margin-bottom: 5px;">
                                                                    {{$produk->produk->harga}} x
                                                                    {{$produk->qtyProduk}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div class="col-md-12">
                                                        <h4 style="border-bottom: 1px solid black;"></h4>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <h4>Total Harga</h4>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <h4>{{ formatRupiah($belumBayar->totalHarga) }}</h4>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button class="btn btn-success">Bayar</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3" style="height: auto; width:700px;">
                                        <div class="card-body">
                                            <!-- Konten untuk tab alamat -->
                                            <h5 class="card-title text-center">Tidak Ada Data Pembayaran</h5>
                                            <!-- Tambahkan form atau konten lainnya di sini -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
            <div class="card mt-3 overflow-auto" style="height: 400px; width:800px;">
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            @forelse ($checkout as $sudahBayar )
                            @if ($sudahBayar->status == 'sudah bayar' && $sudahBayar->statusPengiriman ==
                            'belum_dikirim')
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3" style="height: auto; width:700px;">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    @foreach (checkoutproduk($sudahBayar->id) as $produk)
                                                    <div class="col-md-12">
                                                        <h4 style="border-bottom: 1px solid black;">
                                                            {{$produk->toko->namaToko}}</h4>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">Nama Produk</p>
                                                                <p style="margin-bottom: 5px;">Harga Produk</p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p style="margin-bottom: 5px;">|</p>
                                                                <p style="margin-bottom: 5px;">|</p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">
                                                                    {{$produk->produk->namaProduk}} x
                                                                    {{$produk->qtyProduk}}</p>
                                                                <p style="margin-bottom: 5px;">
                                                                    {{formatRupiah($produk->produk->harga)}}
                                                                    x
                                                                    {{$produk->qtyProduk}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div class="col-md-12">
                                                        <h4 style="border-bottom: 1px solid black;"></h4>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <p style="margin-bottom: 5px;">Harga Ongkir</p>
                                                                <h4 style="margin-bottom: 5px;">Total Harga</h4>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">Rp 10.000</p>
                                                                <h4 style="margin-bottom: 5px;">{{
                                                                    formatRupiah($sudahBayar->totalHarga)
                                                                    }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3" style="height: auto; width:700px;">
                                        <div class="card-body">
                                            <!-- Konten untuk tab alamat -->
                                            <h5 class="card-title text-center">Tidak Ada Data</h5>
                                            <!-- Tambahkan form atau konten lainnya di sini -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
            <div class="card mt-3 overflow-auto" style="height: 400px; width:800px;">
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            @forelse ($checkout as $pesanan)
                            @if ($pesanan->status == 'sudah bayar' && $pesanan->statusPengiriman == 'dikirim')
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3" style="height: auto; width:700px;">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    @foreach (checkoutproduk($pesanan->id) as $produk)
                                                    <div class="col-md-12">
                                                        <h4 style="border-bottom: 1px solid black;">
                                                            {{$produk->toko->namaToko}}</h4>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">Nama Produk</p>
                                                                <p style="margin-bottom: 5px;">Harga Produk</p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p style="margin-bottom: 5px;">|</p>
                                                                <p style="margin-bottom: 5px;">|</p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">
                                                                    {{$produk->produk->namaProduk}} x
                                                                    {{$produk->qtyProduk}}</p>
                                                                <p style="margin-bottom: 5px;">
                                                                    {{formatRupiah($produk->produk->harga)}}
                                                                    x {{$produk->qtyProduk}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div class="col-md-12">
                                                        <h4 style="border-bottom: 1px solid black;"></h4>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <p style="margin-bottom: 5px;">Harga Ongkir</p>
                                                                <h4 style="margin-bottom: 5px;">Total Harga</h4>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p style="margin-bottom: 5px;">Rp 10.000</p>
                                                                <h4 style="margin-bottom: 5px;">{{
                                                                    formatRupiah($pesanan->totalHarga) }}
                                                                </h4>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a href="{{url('selesai/'.$produk->id)}}" type="submit"
                                                                    class="btn btn-success">Selesai</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3" style="height: auto; width:700px;">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Tidak Ada Data</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="notif" role="tabpanel" aria-labelledby="notif-tab">
            <div class="card mt-3 overflow-auto" style="height: 400px; width:800px;">
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            @forelse ($checkout as $sudahBayar )
                            @if ($sudahBayar->status == 'selesai' && $sudahBayar->statusPengiriman == 'diterima')
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3" style="height: auto; width:700px;">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    @foreach (checkoutproduk($sudahBayar->id) as $produk)
                                                    <div class="col-md-12">
                                                        <h4 style="border-bottom: 1px solid black;">
                                                            {{$produk->toko->namaToko}}</h4>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">Nama Produk</p>
                                                                <p style="margin-bottom: 5px;">Harga Produk</p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p style="margin-bottom: 5px;">|</p>
                                                                <p style="margin-bottom: 5px;">|</p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">
                                                                    {{$produk->produk->namaProduk}} x
                                                                    {{$produk->qtyProduk}}</p>
                                                                <p style="margin-bottom: 5px;">
                                                                    {{formatRupiah($produk->produk->harga)}}
                                                                    x
                                                                    {{$produk->qtyProduk}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div class="col-md-12">
                                                        <h4 style="border-bottom: 1px solid black;"></h4>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <p style="margin-bottom: 5px;">Harga Ongkir</p>
                                                                <h4 style="margin-bottom: 5px;">Total Harga</h4>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <p style="margin-bottom: 5px;">Rp 10.000</p>
                                                                <h4 style="margin-bottom: 5px;">{{
                                                                    formatRupiah($sudahBayar->totalHarga)
                                                                    }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3" style="height: auto; width:700px;">
                                        <div class="card-body">
                                            <!-- Konten untuk tab alamat -->
                                            <h5 class="card-title text-center">Tidak Ada Data</h5>
                                            <!-- Tambahkan form atau konten lainnya di sini -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>

</html>
@endsection
