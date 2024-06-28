@extends('index')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark text-white mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse ($keranjang as $keranjangs)
                            @php
                                $hargaProduk = $keranjangs->produk->harga;
                                $jumlahStok = $keranjangs->qty; // Menggunakan qty dari database
                                $subtotal = $hargaProduk * $jumlahStok;
                            @endphp
                            <tr>
                                <td class="align-middle"><img src="images/1.jpg" alt=""
                                        style="width: 50px;">{{ $keranjangs->produk->namaProduk }}</td>
                                <td class="align-middle">Rp.{{ number_format($hargaProduk, 0, ',', '.') }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <a href="{{ url('/cart/minus/' . $keranjangs->id) }}"
                                            class="btn btn-sm btn-dark btn-minus">
                                            <i class="bi bi-dash"></i>
                                        </a>
                                        <input id="quantity-{{ $keranjangs->id }}" type="text"
                                            class="form-control form-control-sm bg-secondary text-center quantity-input"
                                            value="{{ $jumlahStok }}" min="1" max="{{ $keranjangs->produk->stok }}"
                                            data-id="{{ $keranjangs->id }}" data-harga="{{ $hargaProduk }}">
                                        <a href="{{ url('/cart/plus/' . $keranjangs->id) }}"
                                            class="btn btn-sm btn-dark btn-plus">
                                            <i class="bi bi-plus"></i>
                                        </a>
                                    </div>
                                </td>
                                <td id="subtotal-{{ $keranjangs->id }}" class="align-middle">
                                    Rp.{{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td class="align-middle"><button class="btn btn-sm btn-dark"><i
                                            class="bi bi-x"></i></button></td>
                            </tr>
                        @empty
                            <tr>
                                <p>belum ada produk yang ditambahkan!</p>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0 text-dark">Total</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium" id="subtotalAmount">Rp. 0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold" id="totalAmount">Rp. 0</h5>
                        </div>
                        <button class="btn btn-block btn-dark my-3 py-3 text-white">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function updateSubtotal(id, hargaProduk) {
            let quantityInput = document.getElementById('quantity-' + id);
            let currentQuantity = parseInt(quantityInput.value);

            let subtotal = hargaProduk * currentQuantity;
            document.getElementById('subtotal-' + id).innerText = 'Rp. ' + subtotal.toLocaleString();

            updateTotal(); // Update total setelah subtotal berubah
        }

        function updateTotal() {
            let subtotalElements = document.querySelectorAll('[id^="subtotal-"]');
            let total = 0;

            subtotalElements.forEach(function(element) {
                let subtotalValue = parseInt(element.innerText.replace(/[^\d]/g, ''));
                total += subtotalValue;
            });

            document.getElementById('subtotalAmount').innerText = 'Rp. ' + formatCurrency(total);
            document.getElementById('totalAmount').innerText = 'Rp. ' + formatCurrency(total);
        }

        function formatCurrency(amount) {
            return amount.toLocaleString('id-ID');
        }

        document.addEventListener("DOMContentLoaded", function() {
            updateTotal(); // Panggil fungsi updateTotal saat halaman dimuat

            // Event listener untuk tombol tambah
            let plusButtons = document.querySelectorAll('.btn-plus');
            plusButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = button.previousElementSibling;
                    let currentValue = parseInt(input.value);
                    let maxValue = parseInt(input.getAttribute('max'));
                    if (currentValue < maxValue) {
                        input.value = currentValue + 1;
                        updateSubtotal(input.dataset.id, input.dataset.harga);
                    }
                });
            });

            // Event listener untuk tombol kurang
            let minusButtons = document.querySelectorAll('.btn-minus');
            minusButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = button.nextElementSibling;
                    let currentValue = parseInt(input.value);
                    if (currentValue > 1) {
                        input.value = currentValue - 1;
                        updateSubtotal(input.dataset.id, input.dataset.harga);
                    }
                });
            });

            // Event listener untuk perubahan nilai input
            let quantityInputs = document.querySelectorAll('.quantity-input');
            quantityInputs.forEach(function(input) {
                input.addEventListener('change', function() {
                    let newValue = parseInt(input.value);
                    let maxValue = parseInt(input.getAttribute('max'));
                    if (newValue < 1 || isNaN(newValue)) {
                        input.value = 1;
                        newValue = 1;
                    } else if (newValue > maxValue) {
                        input.value = maxValue;
                        newValue = maxValue;
                    }
                    updateSubtotal(input.dataset.id, input.dataset.harga);
                });
            });
        });
    </script>
@endsection
