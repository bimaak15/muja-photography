<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidtransCallbackController;
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

/** Booking sesi privat - /booking */
Route::get('/booking', [BookingController::class, 'create'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/{booking:booking_code}/bayar', [BookingController::class, 'pay'])->name('booking.pay');

/** Cek status pesanan - /status */
Route::get('/status', [BookingController::class, 'status'])->name('status');

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

/** Midtrans Webhook Callback — /midtrans/callback */
Route::post('/midtrans/callback', MidtransCallbackController::class)->name('midtrans.callback');

/*
|--------------------------------------------------------------------------
| Autentikasi Admin & reCAPTCHA v2 — /admin/login
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('login.submit');
});

/*
|--------------------------------------------------------------------------
| Dashboard Admin — /admin (dilindungi autentikasi)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    /** Logout Admin — /admin/logout */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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
