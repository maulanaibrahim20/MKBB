<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
                    <h2>Pesanan Masuk</h2>
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Pesanan Masuk</h5>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Ukuran</th>
                                        <th>Warna</th>
                                        <th>Design</th>
                                        <th>Status Pembayaran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->checkout->customer->user->name }}</td>
                                            <td>{{ $data->produk->namaProduk }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td>
                                                @foreach ($data->produk->ukuran as $ukuran)
                                                    {{ $ukuran->ukuran }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($data->produk->warna as $warna)
                                                    {{ $warna->warna }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($data->produk->kategoriProduk == 'kaos-polos' )
                                                    <img src="{{ asset('storage/designs/' . desainbaju($data->keranjang_id)->gambar_id) }}"
                                                        alt="Design Image" width="100">
                                                @else
                                                    Tidak ada design
                                                @endif
                                            </td>
                                            <td>{{ $data->checkout->status }}</td>
                                            <td>
                                                <form action="{{ url('/penjual/produk/changeStatus/' . $data->id) }}"
                                                    style="display: inline;" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary deleteBtn"
                                                        data-id="{{ $data->id }}">
                                                        <i class="fa fa-paper-plane"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-end">
                            {{-- <button class="btn btn-secondary">Aksi Lainnya</button> --}}
                        </div>
                    </div>
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
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
