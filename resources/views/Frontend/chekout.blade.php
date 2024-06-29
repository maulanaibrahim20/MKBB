@extends('index')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark text-white mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">chekout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">chekout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <form action="{{ url('checkoutPayment', $keranjang->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 form-group">
                                <label>Nama Pembeli</label>
                                <input class="form-control" type="text" value="{{ $pembeli->user->name }}"
                                    readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" value="{{ $pembeli->user->email }}"
                                    readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Nomor Telepon</label>
                                <input class="form-control" type="text" value="{{ $pembeli->noTelp }}"
                                    readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Alamat</label>
                                <textarea class="form-control">
                                {{ $pembeli->alamat }}
                            </textarea>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($customer as $produks)
                            <div class="d-flex justify-content-between">
                                <p>{{ $produks->produk->namaProduk }}</p>
                                <input type="hidden" name="produkId[]" value="{{ $produks->id }}">
                                <p>{{ $produks->produk->harga }} x {{ $keranjang->qty }}</p>
                                @php
                                    $subtotal += $produks->harga * $keranjang->qty;
                                @endphp
                            </div>
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $subtotal }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">10000</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Rp. {{ $subtotal + 10000 }}</h5>
                            <input type="hidden" name="total" value="{{ $subtotal + 10000 }}">
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" value="COD"
                                    id="paypal">
                                <label class="custom-control-label" for="paypal">COD</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" value="ONLINE_PAYMENT"
                                    id="directcheck">
                                <label class="custom-control-label" for="directcheck">Online Payment</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" id="placeOrderBtn">Place
                            Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                const paymentOptions = document.querySelectorAll('input[name="payment"]');
                let isChecked = false;

                paymentOptions.forEach(function(option) {
                    if (option.checked) {
                        isChecked = true;
                    }
                });

                if (!isChecked) {
                    alert('Please select a payment method.');
                    event.preventDefault(); // Prevent form submission if no option is selected
                }
            });
        });
    </script>
    <script>
        document.getElementById('placeOrderBtn').addEventListener('click', function(e) {
            var paymentMethods = document.getElementsByName('payment');
            var selectedMethod;
            for (var i = 0; i < paymentMethods.length; i++) {
                if (paymentMethods[i].checked) {
                    selectedMethod = paymentMethods[i].value;
                    break;
                }
            }

            if (selectedMethod === 'ONLINE_PAYMENT') {
                e.preventDefault(); // Prevent form submission
                var xenditUrl = "{{ config('xendit.url') }}{{ $xenditId }}";
                window.location.href = xenditUrl;
            } else {
                // Handle other payment methods, e.g., COD
                alert('You have chosen COD. Proceeding with order placement.');
            }
        });
    </script>
@endsection
