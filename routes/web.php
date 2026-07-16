<?php

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