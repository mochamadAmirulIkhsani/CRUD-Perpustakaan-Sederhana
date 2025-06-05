<?php

use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('manual-auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class)->middleware('auth');
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('buku', BukuController::class);
});



//Route untuk login dan logout
Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');
