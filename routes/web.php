<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\ManajemenAkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

// WEB DEPAN
Route::get('/', [FrontController::class, 'index'])->middleware('minify');
// PENCARIAN
Route::get('pencarian', [FrontController::class, 'cari'])->middleware('minify');
// KATEGORI
Route::get('kategori/{id}/{kategori}', [FrontController::class, 'kategori'])->middleware('minify');
// TAMPILAN SINGLE PRODUK
Route::get('produk/{id}/{nama_produk}', [FrontController::class, 'single_produk'])->middleware('minify');

// DASHBOARD ADMIN
Route::group(['middleware' => ['minify', 'admin']], function () {

    // MENU BERANDA
    Route::get('admin/beranda', [BerandaController::class, 'admin'])->name('admin.beranda');

    // MENU PRODUK
    Route::get('admin/semua-produk', [ProdukController::class, 'index']);
    Route::get('admin/hapus-produk/{id}', [ProdukController::class, 'hapus']);

    // MENU PROFIL
    Route::get('admin/profil', [ProfilController::class, 'profil']);
    Route::post('admin/profil/perbarui', [ProfilController::class, 'gantiprofil']);

    // MENU GANTI PASSWORD
    Route::get('admin/ganti-password', [GantiPasswordController::class, 'index']);
    Route::post('admin/ganti-password/perbarui', [GantiPasswordController::class, 'gantipassword']);

    // MANAJEMEN AKUN
    Route::get('admin/semua-akun-penjual', [ManajemenAkunController::class, 'index']);
    Route::get('admin/tambah-akun', [ManajemenAkunController::class, 'tambahakun_view']);
    Route::post('admin/tambah-akun/proses', [ManajemenAkunController::class, 'tambahakun']);
    Route::get('admin/akun-penjual/{id}/ganti-password', [ManajemenAkunController::class, 'gantipasswordpenjual']);
    Route::post('admin/akun-penjual/ganti-password/proses', [ManajemenAkunController::class, 'proses']);
    Route::get('admin/hapus/{id}', [ManajemenAkunController::class, 'hapusakun']);

});

// DASHBOARD USER
Route::group(['middleware' => ['minify', 'user']], function () {

    // MENU BERANDA
    Route::get('user/beranda', [App\Http\Controllers\User\BerandaController::class, 'user'])->name('user.beranda');

    // MENU PRODUK
    Route::get('user/semua-produk', [App\Http\Controllers\User\ProdukController::class, 'index']);
    Route::get('user/tambah-produk', [App\Http\Controllers\User\ProdukController::class, 'tambah_view']);
    Route::post('user/tambah-produk/proses', [App\Http\Controllers\User\ProdukController::class, 'tambahproduk']);
    Route::get('user/hapus/{id}', [App\Http\Controllers\User\ProdukController::class, 'hapus']);

    // MENU PROFIL
    Route::get('user/profil', [App\Http\Controllers\User\ProfilController::class, 'profil']);
    Route::post('user/profil/perbarui', [App\Http\Controllers\User\ProfilController::class, 'gantiprofil']);

    // MENU GANTI PASSWORD
    Route::get('user/ganti-password', [App\Http\Controllers\User\GantiPasswordController::class, 'index']);
    Route::post('user/ganti-password/perbarui', [App\Http\Controllers\User\GantiPasswordController::class, 'gantipassword']);

});
