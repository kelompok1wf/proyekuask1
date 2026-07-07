<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LoginController;

// HALAMAN AWAL
Route::get('/', function () {
    return view('welcome');
});

// LOGIN PEMILIK
Route::get('/login/pemilik', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'prosesLogin'])
    ->name('login.proses');

// LOGIN STAFF
Route::get('/login/staff', [LoginController::class, 'showLoginStaff'])
    ->name('login.staff');

Route::post('/login/staff', [LoginController::class, 'prosesLoginStaff'])
    ->name('login.staff.proses');

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// DASHBOARD PEMILIK
Route::get('/dashboard/pemilik', [LoginController::class, 'dashboardPemilik'])
    ->name('dashboard.pemilik')
    ->middleware('pemilik');

// LAPORAN PENJUALAN
Route::get('/laporan/penjualan', function () {
    return view('dashboard.laporan_penjualan');
})
    ->name('laporan.penjualan')
    ->middleware('pemilik');

// CRUD STAFF
// KHUSUS PEMILIK
Route::resource('staff', StaffController::class)
    ->middleware('pemilik');

// DASHBOARD STAFF
Route::get('/dashboard/pelayan', [LoginController::class, 'dashboardPelayan'])
    ->name('dashboard.pelayan');

Route::get('/dashboard/koki', [LoginController::class, 'dashboardKoki'])
    ->name('dashboard.koki');

Route::get('/dashboard/kasir', [LoginController::class, 'dashboardKasir'])
    ->name('dashboard.kasir');
