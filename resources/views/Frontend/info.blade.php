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
                <button class="nav-link active text-dark" id="bio-tab" data-bs-toggle="tab" data-bs-target="#bio" type="button" role="tab" aria-controls="bio" aria-selected="true">Biodata Diri</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="false">Belum Dibayar</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">Dikemas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="bank-tab" data-bs-toggle="tab" data-bs-target="#bank" type="button" role="tab" aria-controls="bank" aria-selected="false">Dikirim</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="notif-tab" data-bs-toggle="tab" data-bs-target="#notif" type="button" role="tab" aria-controls="notif" aria-selected="false">Selesai</button>
            </li>
        </ul>
        <div class="tab-content d-flex justify-content-center" id="profileTabsContent">
            <div class="tab-pane fade show active" id="bio" role="tabpanel" aria-labelledby="bio-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Biodata Diri</h5>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="notif" role="tabpanel" aria-labelledby="notif-tab">
                <div class="card mt-3">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
@endsection
