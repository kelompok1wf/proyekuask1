<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'showLogin'])->name('login');

Route::post('/login', [LoginController::class, 'prosesLogin'])->name('login.proses');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard/pemilik', [LoginController::class, 'dashboardPemilik'])
    ->name('dashboard.pemilik')
    ->middleware('pemilik');

Route::get('/laporan/penjualan', function () {
    return view('dashboard.laporan_penjualan');
})->name('laporan.penjualan')->middleware('pemilik');

Route::resource('staff', StaffController::class)
    ->middleware('pemilik');
