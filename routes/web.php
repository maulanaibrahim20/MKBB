<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController; // tambahkan use statement untuk FrontendController
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::get('/detail', [FrontendController::class, 'detail'])->name('detail');
Route::get('/product', [FrontendController::class, 'product'])->name('product');
Route::get('/info', [FrontendController::class, 'info'])->name('info');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');

Route::get('/penjual', [PenjualController::class, 'penjual'])->name('penjual');
Route::get('/penjualan', [PenjualController::class, 'penjualan'])->name('penjualan');
Route::get('/pesanan', [PenjualController::class, 'pesanan'])->name('pesanan');
Route::get('/pesanan2', [PenjualController::class, 'pesanan2'])->name('pesanan2');
Route::get('/produk', [PenjualController::class, 'produk'])->name('produk');
Route::get('/profil', [PenjualController::class, 'profil'])->name('profil');
Route::get('/riwayat', [PenjualController::class, 'riwayat'])->name('riwayat');

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
});

Route::group(['middleware' => ['can:customer']], function () {
    // Route::get('/customer/dashboard', [DashboardController::class, 'customer']);
});
