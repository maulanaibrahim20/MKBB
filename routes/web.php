<?php

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\ProdukController as ProdukControllerAdmin;
use App\Http\Controllers\Admin\BlogsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController; // tambahkan use statement untuk FrontendController
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Penjual\PesananController;
use App\Http\Controllers\Penjual\ProdukController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::post('cart/post', [FrontendController::class, 'cartPost']);
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/cart/plus/{id}', [FrontendController::class, 'pluscart']);
Route::get('/cart/minus/{id}', [FrontendController::class, 'minuscart']);
Route::delete('/cart/delete/{id}', [FrontendController::class, 'deletecart']);

Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::post('/checkout/produk', [FrontendController::class, 'checkoutProduk'])->name('checkout');

Route::get('/detail', [FrontendController::class, 'detail'])->name('detail');
Route::get('/product', [FrontendController::class, 'product'])->name('product');
Route::get('/info', [FrontendController::class, 'info'])->name('info');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');

// Route::get('/penjual', function () {
//     return view('penjual.penjual');
// });
// Route::get('/penjualan', [PenjualController::class, 'penjualan'])->name('penjualan');
Route::get('/pesanan', function () {
    return view('penjual.pesanan');
});
Route::get('/pesanan2', function () {
    return view('penjual.pesanan2');
});
//edit profil
Route::get('/profiltest', function () {
    return view('penjual.profil');
});
Route::get('/riwayat', function () {
    return view('penjual.riwayat');
});
Route::get('/toko', function () {
    return view('Frontend.info');
});

// Route::middleware(['auth'])->group(function () {
// Route::get('/admin', [AdminController::class, 'admin'])->name('admin')->middleware('admin');
Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
Route::get('/Tcustom', [AdminController::class, 'Tcustom'])->name('Tcustom');
Route::get('/Tpenjual', [AdminController::class, 'Tpenjual'])->name('Tpenjual');
Route::get('/Tproduk', [AdminController::class, 'Tproduk'])->name('Tproduk');
// });

Route::middleware(['auth'])->name('web.')->group(function () {
    Route::get('/logout', LogoutController::class)
        ->name('auth.logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/loginProccess', [AuthController::class, 'loginProccess'])->name('login.post');

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'registerProccess']);
});

Route::group(['middleware' => ['can:admin']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin']);
    Route::get('/admin/customer', [AkunController::class, 'customer']);
    Route::get('/admin/toko-penjual', [AkunController::class, 'penjual']);
    // blog
    Route::get('/admin/blog-test/index', [BlogsController::class, 'index']);
    Route::get('/admin/blog-test/create', [BlogsController::class, 'create']);
    Route::post('/admin/blog-test/store', [BlogsController::class, 'store']);
    Route::get('/admin/blog-test/edit/{id}', [BlogsController::class, 'edit']);
    Route::put('/admin/blog-test/update/{id}', [BlogsController::class, 'upload']);
    Route::delete('/admin/blog-test/delete/{id}', [BlogsController::class, 'destroy']);
    // produk
    Route::get('/admin/produk', [ProdukControllerAdmin::class, 'index']);
});

Route::group(['middleware' => ['can:penjual']], function () {
    Route::get('/penjual/dashboard', [DashboardController::class, 'penjual']);
    Route::get('/penjual/produk/index', [ProdukController::class, 'index']);
    Route::get('/penjual/produk/create', [ProdukController::class, 'create']);
    Route::post('/penjual/produk', [ProdukController::class, 'store']);
    Route::get('/penjual/produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::put('/penjual/produk/update/{id}', [ProdukController::class, 'update']);
    Route::delete('/penjual/produk/delete/{id}', [ProdukController::class, 'destroy']);

    Route::get('/penjual/produk/checkout', [PesananController::class, 'index']);
    Route::post('/penjual/produk/changeStatus/{id}', [PesananController::class, 'changeStatus']);

    Route::get('/penjual/produk/pesananDikirim', [PesananController::class, 'pesananDikirim']);
});

Route::group(['middleware' => ['can:pembeli']], function () {
    Route::get('/produk/detail/{id}', [AppController::class, 'produkDetail']);
    Route::post('/toko', [AppController::class, 'buatToko']);
    Route::get('/profile', [AppController::class, 'profile']);
    Route::put('/profile/update', [AppController::class, 'updateprofile']);
});
