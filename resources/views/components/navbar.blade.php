<div class="container-fluid">
    <div class="row bg-dark py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div>
                <a class="text-white text-decoration-none" href="">Selamat datang di marketplace konveksi baju</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
            <div class="d-inline-flex align-items-center">
                <a class="text-white px-2" href="">
                    <i class="bi bi-facebook"></i>
                </a>
                <a class="text-white px-2" href="">
                    <i class="bi bi-twitter"></i>
                </a>
                <a class="text-white px-2" href="">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a class="text-white px-2" href="">
                    <i class="bi bi-instagram"></i>
                </a>
                <a class="text-white ps-2" href="">
                    <i class="bi bi-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 fw-semi-bold text-dark"><strong>MKB</strong></h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-start">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <button class="btn bg-transparent text-dark" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-end">
            <a href="" class="btn border">
                <i class="bi bi-heart text-dark"></i>
            </a>
            <a href="{{ route('cart')}}" class="btn border">
                <i class="bi bi-cart text-dark"></i>
            </a>
            <a href="{{ route('penjual')}}" class="btn border">
                <i class="bi bi-shop text-dark"></i>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        @if(Request::is('/'))
            @guest
                <div class="col-lg-3 d-none d-lg-block">
                    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-dark text-white w-100"
                       data-bs-toggle="collapse" href="#navbar-vertical" role="button" aria-expanded="false"
                       aria-controls="navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                        <h6 class="m-0">Categories</h6>
                        <i class="bi bi-chevron-down text-white"></i>
                    </a>
                    <nav class="collapse navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                         id="navbar-vertical">
                        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                            <a href="" class="nav-item nav-link">Kaos</a>
                            <a href="" class="nav-item nav-link">Jaket</a>
                            <a href="" class="nav-item nav-link">Sweater</a>
                            <a href="" class="nav-item nav-link">Kemeja</a>
                        </div>
                    </nav>
                </div>
            @endguest
        @endif
        <div class="@if(Request::is('/') && !Auth::check()) col-lg-9 @else col-12 @endif">
            <nav class="navbar navbar-expand-lg bg-white navbar-light">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold text-dark"><strong>MKB</strong></h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="{{ route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('product')}}" class="nav-item nav-link">Produk</a>
                        <a href="{{ route('detail')}}" class="nav-item nav-link">Shop Detail</a>
                        <a href="{{ route('blogs')}}" class="nav-item nav-link">Blogs</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        @guest
                            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                            <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                        @else
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu bg-light border-0 rounded-0 rounded-bottom m-0">
                                    <a href="#" class="dropdown-item">Profil</a>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
            @if(Request::is('/') && !Auth::check())
                <!-- Carousel Start -->
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="images/7.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="images/8.png" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="images/13.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="images/10.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
                <!-- Carousel End -->
            @endif
        </div>
    </div>
</div>
<!-- Navbar End -->
