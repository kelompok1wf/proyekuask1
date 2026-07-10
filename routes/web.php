<?php

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