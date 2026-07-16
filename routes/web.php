<?php

<<<<<<< HEAD
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PelangganController::class, 'welcome'])->name('pelanggan.welcome');

Route::get('/register', [PelangganController::class, 'register'])->name('pelanggan.register');

Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');

Route::get('/menu', [PesananController::class, 'index'])->name('pesanan.index');

Route::post('/pesanan/checkout', [PesananController::class, 'checkout'])->name('pesanan.checkout');

Route::get('/nota/{id_pesanan}', [PesananController::class, 'nota'])->name('pesanan.nota');


// ================= ALUR OPERASIONAL (KASIR & DAPUR) =================

// PANEL KASIR: Konfirmasi Pembayaran Tagihan Pelanggan
Route::get('/kasir', [PembayaranController::class, 'index'])->name('kasir.index');
Route::post('/kasir/bayar/{id_pembayaran}', [PembayaranController::class, 'prosesBayar'])->name('kasir.bayar');

// PANEL DAPUR: Pengendali Status Masakan Koki
Route::get('/dapur', [PesananController::class, 'indexDapur'])->name('dapur.index');
Route::post('/dapur/update/{id_pesanan}', [PesananController::class, 'updateDapur'])->name('dapur.update');
=======
use App\Http\Controllers\OrderSystemController;
use Illuminate\Support\Facades\Route;

// KITA PENGKAUM KEMBALI KE URL /login YANG NORMAL
Route::get('/', function() {
    return redirect('/login');
});

Route::get('/login', [OrderSystemController::class, 'showLogin'])->name('login');
Route::post('/login', [OrderSystemController::class, 'processLogin'])->name('login.process');

// Rute Aplikasi
Route::middleware(['web'])->group(function () {
    Route::get('/menu', [OrderSystemController::class, 'showMenu'])->name('menu');
    Route::post('/cart/add', [OrderSystemController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [OrderSystemController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/update/{id}', [OrderSystemController::class, 'updateCart']);
    
    Route::get('/checkout', [OrderSystemController::class, 'showCheckout'])->name('checkout');
    Route::post('/checkout/process', [OrderSystemController::class, 'processOrder'])->name('checkout.process');
    Route::get('/receipt/{id}', [OrderSystemController::class, 'showReceipt'])->name('receipt');
    
    // TOMBOL LOGOUT TOTAL DENGAN FLUSH SESSION
    Route::get('/logout', function () {
        session()->flush(); // Mengosongkan SEMUA session (termasuk nadita & keranjang) tanpa sisa!
        return redirect('/login'); // Lempar balik ke login awal
    })->name('logout');
});
>>>>>>> c3c11e12d80f15e54e43ee6aa0eba709ceb142ac
