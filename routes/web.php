<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Publik — sesuai PRD MujaPhotography
|--------------------------------------------------------------------------
*/

/** Beranda — / */
Route::get('/', [HomeController::class, 'index'])->name('home');

/** Portofolio — /portofolio */
Route::get('/portofolio', function () {
    return view('coming-soon');
})->name('portofolio');

/** Paket & Harga — /paket */
Route::get('/paket', function () {
    return view('paket');
})->name('paket');

/** Booking sesi privat — /booking */
Route::get('/booking', function () {
    return view('coming-soon');
})->name('booking');

/** Cek status pesanan — /status */
Route::get('/status', function () {
    return view('coming-soon');
})->name('status');

/** Daftar album acara — /acara */
Route::get('/acara', function () {
    return view('coming-soon');
})->name('acara.index');

/** Galeri per album — /acara/{album} */
Route::get('/acara/{album}', function (string $album) {
    return view('coming-soon');
})->name('acara.show');

/** Pesanan foto HD — /acara/{album}/pesan */
Route::get('/acara/{album}/pesan', function (string $album) {
    return view('coming-soon');
})->name('acara.pesan');

/** Kontak — /kontak */
Route::get('/kontak', function () {
    return view('coming-soon');
})->name('kontak');

/*
|--------------------------------------------------------------------------
| Dashboard Admin — /admin (dilindungi autentikasi)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /** Ringkasan — /admin */
    Route::get('/', function () {
        return view('coming-soon');
    })->name('dashboard');

    /** Daftar booking — /admin/booking */
    Route::get('/booking', function () {
        return view('coming-soon');
    })->name('booking');

    /** Kalender — /admin/kalender */
    Route::get('/kalender', function () {
        return view('coming-soon');
    })->name('kalender');

    /** Album acara — /admin/album */
    Route::get('/album', function () {
        return view('coming-soon');
    })->name('album');

    /** Pesanan foto HD — /admin/pesanan-foto */
    Route::get('/pesanan-foto', function () {
        return view('coming-soon');
    })->name('pesanan-foto');

    /** Portofolio & paket — /admin/portofolio */
    Route::get('/portofolio', function () {
        return view('coming-soon');
    })->name('portofolio');
});
