@extends('index')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-dark text-white mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Produk</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="" class="text-white">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Produk</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by Price</h5>
                    <form>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" checked id="price-all">
                            <label class="form-check-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal text-dark">1000</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="price-1">
                            <label class="form-check-label" for="price-1">Rp.0 - Rp.20.000</label>
                            <span class="badge border font-weight-normal text-dark">150</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="price-2">
                            <label class="form-check-label" for="price-2">Rp.25.000 - Rp.50.000</label>
                            <span class="badge border font-weight-normal text-dark">295</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="price-3">
                            <label class="form-check-label" for="price-3">Rp.55.000 - Rp.70.000</label>
                            <span class="badge border font-weight-normal text-dark">246</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="price-4">
                            <label class="form-check-label" for="price-4">Rp.75.000 - Rp.100.000</label>
                            <span class="badge border font-weight-normal text-dark">145</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="form-check-input" id="price-5">
                            <label class="form-check-label" for="price-5">Rp.105.000- Rp.1.000.000</label>
                            <span class="badge border font-weight-normal text-dark">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Kategori Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by category</h5>
                    <form>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" checked id="category-all">
                            <label class="form-check-label" for="category-all">All category</label>
                            <span class="badge border font-weight-normal text-dark">1000</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="category-1>
                            <label class="form-check-label" for="category-1">Kaos</label>
                            <span class="badge border font-weight-normal text-dark">150</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="category-2">
                            <label class="form-check-label" for="category-2">Jaket</label>
                            <span class="badge border font-weight-normal text-dark">295</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="category-3">
                            <label class="form-check-label" for="category-3">Sweater</label>
                            <span class="badge border font-weight-normal text-dark">246</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="category-4">
                            <label class="form-check-label" for="category-4">Kemeja</label>
                            <span class="badge border font-weight-normal text-dark">145</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    <form>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" checked id="size-all">
                            <label class="form-check-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal text-dark">1000</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="size-1">
                            <label class="form-check-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal text-dark">150</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="size-2">
                            <label class="form-check-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal text-dark">295</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="size-3">
                            <label class="form-check-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal text-dark">246</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="form-check-input" id="size-4">
                            <label class="form-check-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal text-dark">145</span>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="form-check-input" id="size-5">
                            <label class="form-check-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal text-dark">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <button class="btn btn-outline-dark" type="button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="triggerId">
                                    <li><a class="dropdown-item" href="#">Latest</a></li>
                                    <li><a class="dropdown-item" href="#">Popularity</a></li>
                                    <li><a class="dropdown-item" href="#">Best Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Example product item start -->
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid product-img-custom" src="images/1.jpg" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Kaos Dimas Majantara</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rp.70.000</h6>
                                    <h6 class="text-muted ml-2"><del>Rp.90.000</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-eye text-dark mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-cart text-dark mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <!-- Example product item end -->

                    <!-- Additional product items start -->
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid product-img-custom" src="images/2.jpg" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Kaos Dimas Majantara</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rp.70.000</h6>
                                    <h6 class="text-muted ml-2"><del>Rp.90.000</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-eye text-dark mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-cart text-dark mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid product-img-custom" src="images/3.jpg" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Kaos Dan Bonus Topi</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rp.80.000</h6>
                                    <h6 class="text-muted ml-2"><del>Rp.100.000</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid product-img-custom" src="images/4.jpg" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid product-img-custom" src="images/8.png" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid product-img-custom" src="images/7.jpg" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="bi bi-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <!-- Additional product items end -->

                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-end mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->






    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
