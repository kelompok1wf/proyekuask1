<?php

use App\Http\Controllers\OrderSystemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LoginController;


// =============================
// HALAMAN AWAL
// =============================

Route::get('/', function () {
    return view('welcome');
})->name('home');




// =============================
// LOGIN PELANGGAN
// =============================

Route::get('/login', [OrderSystemController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [OrderSystemController::class, 'processLogin'])
    ->name('login.process');




// =============================
// LOGIN PEMILIK
// =============================

Route::get('/login/pemilik', [LoginController::class, 'showLogin'])
    ->name('login.pemilik');

Route::post('/login/pemilik', [LoginController::class, 'prosesLogin'])
    ->name('login.pemilik.proses');




// =============================
// LOGIN STAFF
// =============================

Route::get('/login/staff', [LoginController::class, 'showLoginStaff'])
    ->name('login.staff');


Route::post('/login/staff', [LoginController::class, 'prosesLoginStaff'])
    ->name('login.staff.proses');




// =============================
// LOGOUT STAFF & PEMILIK
// =============================

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');




// =============================
// LOGOUT PELANGGAN
// =============================

Route::get('/logout/pelanggan', function () {

    session()->flush();

    return redirect()->route('login');

})->name('pelanggan.logout');




// =============================
// DASHBOARD PEMILIK
// =============================

Route::get('/dashboard/pemilik', [LoginController::class, 'dashboardPemilik'])
    ->name('dashboard.pemilik')
    ->middleware('pemilik');




// =============================
// LAPORAN PENJUALAN
// =============================

Route::get('/laporan/penjualan', function () {

    return view('dashboard.laporan_penjualan');

})
->name('laporan.penjualan')
->middleware('pemilik');




// =============================
// CRUD STAFF
// =============================

Route::resource('staff', StaffController::class)
    ->middleware('pemilik');




// =============================
// DASHBOARD STAFF
// =============================

Route::get('/dashboard/pelayan', [LoginController::class, 'dashboardPelayan'])
    ->name('dashboard.pelayan');


Route::get('/dashboard/koki', [LoginController::class, 'dashboardKoki'])
    ->name('dashboard.koki');


Route::get('/dashboard/kasir', [LoginController::class, 'dashboardKasir'])
    ->name('dashboard.kasir');




// =============================
// SISTEM PELANGGAN
// =============================

Route::get('/menu', [OrderSystemController::class, 'showMenu'])
    ->name('menu');


Route::post('/cart/add', [OrderSystemController::class, 'addToCart'])
    ->name('cart.add');


Route::post('/cart/update', [OrderSystemController::class, 'updateCart'])
    ->name('cart.update');


Route::post('/cart/update/{id}', [OrderSystemController::class, 'updateCart']);



Route::get('/checkout', [OrderSystemController::class, 'showCheckout'])
    ->name('checkout');


Route::post('/checkout/process', [OrderSystemController::class, 'processOrder'])
    ->name('checkout.process');


Route::get('/receipt/{id}', [OrderSystemController::class, 'showReceipt'])
    ->name('receipt');