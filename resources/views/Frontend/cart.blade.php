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
                        <tr>
                            <td class="align-middle"><img src="images/1.jpg" alt="" style="width: 50px;"> Kaos</td>
                            <td class="align-middle">RP. 70.000</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <button class="btn btn-sm btn-dark btn-minus" onclick="decrementQuantity()">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input id="quantity" type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <button class="btn btn-sm btn-dark btn-plus" onclick="incrementQuantity()">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </td>
                            <td id="subtotal" class="align-middle">Rp. 70.000</td>
                            <td class="align-middle"><button class="btn btn-sm btn-dark"><i class="bi bi-x"></i></button></td>
                        </tr>
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
                            <h6 class="font-weight-medium" id="subtotalAmount">Rp. 70.000</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold" id="totalAmount">Rp. 70.000</h5>
                        </div>
                        <button class="btn btn-block btn-dark my-3 py-3 text-white">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function incrementQuantity() {
            var quantityElement = document.getElementById('quantity');
            var quantity = parseInt(quantityElement.value);
            quantityElement.value = quantity + 1;
            updateTotal();
        }
    
        function decrementQuantity() {
            var quantityElement = document.getElementById('quantity');
            var quantity = parseInt(quantityElement.value);
            if (quantity > 1) {
                quantityElement.value = quantity - 1;
                updateTotal();
            }
        }
    
        function updateTotal() {
            var quantity = parseInt(document.getElementById('quantity').value);
            var price = 70000; // Harga per item
            var subtotal = quantity * price;
            document.getElementById('subtotal').textContent = 'Rp. ' + subtotal.toLocaleString();
            document.getElementById('subtotalAmount').textContent = 'Rp. ' + subtotal.toLocaleString();
            document.getElementById('totalAmount').textContent = 'Rp. ' + subtotal.toLocaleString();
        }
    </script>
@endsection

