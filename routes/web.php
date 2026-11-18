<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('produk.index');
});

// CRUD Kategori
Route::resource('kategori', KategoriController::class);

// CRUD Produk
Route::resource('produk', ProdukController::class);