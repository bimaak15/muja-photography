<?php

use App\Http\Controllers\Admin\GalleryController;
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

    /** Dashboard Utama — /admin */
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    /** Daftar booking — /admin/booking */
    Route::get('/booking', function () {
        return view('admin.bookings');
    })->name('booking');

    /** Buat booking baru — /admin/booking/create */
    Route::get('/booking/create', function () {
        return view('admin.booking-create');
    })->name('booking.create');

    /** Packages / Daftar Paket — /admin/packages */
    Route::get('/packages', function () {
        return view('admin.packages');
    })->name('packages');

    /** Tambah Paket Baru — /admin/packages/create */
    Route::get('/packages/create', function () {
        return view('admin.package-create');
    })->name('packages.create');

    /** Schedule / Jadwal Pemotretan — /admin/schedule */
    Route::get('/schedule', function () {
        return view('admin.schedule');
    })->name('schedule');

    /** Tambah Jadwal Sesi — /admin/schedule/create */
    Route::get('/schedule/create', function () {
        return view('admin.schedule-create');
    })->name('schedule.create');

    /** Customer Database — /admin/customer */
    Route::get('/customer', function () {
        return view('admin.customer');
    })->name('customer');

    /** Gallery & Portofolio Beranda — /admin/gallery */
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::post('/gallery/reset-all', [GalleryController::class, 'resetAll'])->name('gallery.reset-all');
    Route::post('/gallery/{galleryItem}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/gallery/{galleryItem}/reset', [GalleryController::class, 'reset'])->name('gallery.reset');

    /** Settings / Pengaturan Studio, Akun & Pembayaran — /admin/settings */
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');

    /** Rute PRD legacy / backward-compatibility aliases */
    Route::get('/kalender', function () {
        return redirect()->route('admin.schedule');
    })->name('kalender');

    Route::get('/portofolio', function () {
        return redirect()->route('admin.gallery');
    })->name('portofolio');

    Route::get('/album', function () {
        return view('coming-soon');
    })->name('album');

    Route::get('/pesanan-foto', function () {
        return view('coming-soon');
    })->name('pesanan-foto');
});
