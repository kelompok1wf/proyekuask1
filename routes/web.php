<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderSystemController;
use App\Http\Controllers\StaffController;


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');



/*
|--------------------------------------------------------------------------
| LOGIN PELANGGAN
|--------------------------------------------------------------------------
*/

Route::get('/login', [OrderSystemController::class, 'showLogin'])
    ->name('login');


Route::post('/login', [OrderSystemController::class, 'processLogin'])
    ->name('login.process');





/*
|--------------------------------------------------------------------------
| SISTEM PEMESANAN PELANGGAN
|--------------------------------------------------------------------------
*/


Route::get('/menu', [OrderSystemController::class, 'showMenu'])
    ->name('menu');


Route::post('/cart/add', [OrderSystemController::class, 'addToCart'])
    ->name('cart.add');


Route::post('/cart/update', [OrderSystemController::class, 'updateCart'])
    ->name('cart.update');


Route::post('/cart/update/{id}', [OrderSystemController::class, 'updateCart'])
    ->name('cart.update.item');



Route::get('/checkout', [OrderSystemController::class, 'showCheckout'])
    ->name('checkout');


Route::post('/checkout/process', [OrderSystemController::class, 'processOrder'])
    ->name('checkout.process');


Route::get('/receipt/{id}', [OrderSystemController::class, 'showReceipt'])
    ->name('receipt');





/*
|--------------------------------------------------------------------------
| LOGOUT PELANGGAN
|--------------------------------------------------------------------------
*/


Route::get('/logout/pelanggan', function () {

    session()->flush();

    return redirect()->route('login');
    
})->name('pelanggan.logout');







/*
|--------------------------------------------------------------------------
| LOGIN PEMILIK
|--------------------------------------------------------------------------
*/


Route::get('/login/pemilik', [LoginController::class, 'showLogin'])
    ->name('login.pemilik');


Route::post('/login/pemilik', [LoginController::class, 'prosesLogin'])
    ->name('login.pemilik.proses');






/*
|--------------------------------------------------------------------------
| LOGIN STAFF
|--------------------------------------------------------------------------
*/


Route::get('/login/staff', [LoginController::class, 'showLoginStaff'])
    ->name('login.staff');


Route::post('/login/staff', [LoginController::class, 'prosesLoginStaff'])
    ->name('login.staff.proses');







/*
|--------------------------------------------------------------------------
| LOGOUT PEMILIK & STAFF
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD PEMILIK
|--------------------------------------------------------------------------
*/


Route::middleware('pemilik')->group(function () {


    Route::get(
        '/dashboard/pemilik',
        [LoginController::class, 'dashboardPemilik']
    )->name('dashboard.pemilik');



    /*
    |--------------------------------------------------------------------------
    | CRUD STAFF
    |--------------------------------------------------------------------------
    */


    Route::resource('staff', StaffController::class);



    /*
    |--------------------------------------------------------------------------
    | LAPORAN PENJUALAN
    |--------------------------------------------------------------------------
    */


    Route::get('/laporan/penjualan', function () {

        return view('dashboard.laporan_penjualan');
    })->name('laporan.penjualan');
});







/*
|--------------------------------------------------------------------------
| DASHBOARD STAFF
|--------------------------------------------------------------------------
*/


Route::get(
    '/dashboard/pelayan',
    [LoginController::class, 'dashboardPelayan']
)->name('dashboard.pelayan');



Route::get(
    '/dashboard/koki',
    [LoginController::class, 'dashboardKoki']
)->name('dashboard.koki');



Route::get(
    '/dashboard/kasir',
    [LoginController::class, 'dashboardKasir']
)->name('dashboard.kasir');
