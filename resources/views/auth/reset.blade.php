<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<!-- Topbar Start -->
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
                <a href="" class="btn border">
                    <i class="bi bi-cart text-dark"></i>
                </a>
                <a href="" class="btn border">
                    <i class="bi bi-shop text-dark"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-white navbar-white">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold text-dark"><strong>MKB</strong></h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav me-auto">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <a href="shop.html" class="nav-item nav-link">produk</a>
                            <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                            <a href="contact.html" class="nav-item nav-link">Blogs</a>
                        </div>
                        <div class="navbar-nav ms-auto">
                            <a href="" class="nav-item nav-link">Login</a>
                            <a href="" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Reset Password</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">New Password</label>
									<input id="password" type="password" class="form-control" name="password" value="" required autofocus>
									<div class="invalid-feedback">
										Password is required	
									</div>
								</div>
	
								<div class="mb-3">
									<label class="mb-2 text-muted" for="password-confirm">Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
									<div class="invalid-feedback">
										Please confirm your new password
									</div>
								</div>
	
								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="logout_devices" id="logout" class="form-check-input">
										<label for="logout" class="form-check-label">Logout all devices</label>
									</div>
									<button type="submit" class="btn btn-primary ms-auto">
										Reset Password	
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer Start -->
    <div class="container-fluid bg-dark text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold text-white"><strong>MKB</strong></h1>
                </a>
                <p class="text-white">Terima kasih sudah Mengunjungi website Marketplace konveksi baju</p>
                <p class="text-white mb-2"><i class="bi bi-geo-alt text-white mr-3"></i>Indramayu , Jawa Barat , Indonesia</p>
                <p class="text-white mb-2"><i class="bi bi-envelope text-white mr-3"></i>MKB@example.com</p>
                <p class="text-white mb-0"><i class="bi bi-telephone text-white mr-3"></i>+6287 8765 6252</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2 text-decoration-none" href="index.html"><i class="bi bi-chevron-right mr-2"></i>Home</a>
                            <a class="text-white mb-2 text-decoration-none" href="shop.html"><i class="bi bi-chevron-right mr-2"></i>Our Shop</a>
                            <a class="text-white mb-2 text-decoration-none" href="detail.html"><i class="bi bi-chevron-right mr-2"></i>Shop Detail</a>
                            <a class="text-white mb-2 text-decoration-none" href="cart.html"><i class="bi bi-chevron-right mr-2"></i>Shopping Cart</a>
                            <a class="text-white mb-2 text-decoration-none" href="checkout.html"><i class="bi bi-chevron-right mr-2"></i>Checkout</a>
                            <a class="text-white text-decoration-none" href="contact.html"><i class="bi bi-chevron-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2 text-decoration-none" href="index.html"><i class="bi bi-chevron-right mr-2"></i>Home</a>
                            <a class="text-white mb-2 text-decoration-none" href="shop.html"><i class="bi bi-chevron-right mr-2"></i>Our Shop</a>
                            <a class="text-white mb-2 text-decoration-none" href="detail.html"><i class="bi bi-chevron-right mr-2"></i>Shop Detail</a>
                            <a class="text-white mb-2 text-decoration-none" href="cart.html"><i class="bi bi-chevron-right mr-2"></i>Shopping Cart</a>
                            <a class="text-white mb-2 text-decoration-none" href="checkout.html"><i class="bi bi-chevron-right mr-2"></i>Checkout</a>
                            <a class="text-white text-decoration-none" href="contact.html"><i class="bi bi-chevron-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

	<script src="js/login.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
