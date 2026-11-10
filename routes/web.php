<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Publik — sesuai PRD MujaPhotography
|--------------------------------------------------------------------------
*/

/** Beranda — / */
Route::get('/', [HomeController::class, 'index'])->name('home');

/** Portofolio — /portofolio */
Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portofolio');

/** Paket & Harga — /paket */
Route::get('/paket', function () {
    return view('paket');
})->name('paket');

/** Booking sesi privat — /booking */
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

/** Cek status pesanan — /status */
Route::get('/status', [StatusController::class, 'index'])->name('status');

/** Daftar album acara — /acara */
Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index');

/** Galeri per album — /acara/{album} */
Route::get('/acara/{album}', [AcaraController::class, 'show'])->name('acara.show');

/** Pesanan foto HD — /acara/{album}/pesan */
Route::get('/acara/{album}/pesan', [AcaraController::class, 'pesan'])->name('acara.pesan');

/** Kontak — /kontak */
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| Dashboard Admin — /admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /** Ringkasan — /admin */
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    /** Daftar booking — /admin/booking */
    Route::get('/booking', [AdminController::class, 'booking'])->name('booking');

    /** Kalender — /admin/kalender */
    Route::get('/kalender', [AdminController::class, 'kalender'])->name('kalender');

    /** Album acara — /admin/album */
    Route::get('/album', [AdminController::class, 'album'])->name('album');

    /** Pesanan foto HD — /admin/pesanan-foto */
    Route::get('/pesanan-foto', [AdminController::class, 'pesananFoto'])->name('pesanan-foto');

    /** Portofolio & paket — /admin/portofolio */
    Route::get('/portofolio', [AdminController::class, 'portofolio'])->name('portofolio');
});
