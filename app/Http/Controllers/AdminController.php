<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Ringkasan Dashboard Admin
     */
    public function dashboard(): View
    {
        $stats = [
            'total_booking' => 24,
            'booking_aktif' => 8,
            'pendapatan_bulan' => 38500000,
            'pesanan_hd' => 142,
        ];

        $recentBookings = [
            ['kode' => 'MUJA-7K3P9Q', 'nama' => 'Risky & Rahma', 'paket' => 'Wedding Gold (Rumah)', 'tgl' => '12 Okt 2026', 'status' => 'editing', 'status_label' => 'Editing', 'dp' => 'Lunas Midtrans'],
            ['kode' => 'MUJA-2W9X4L', 'nama' => 'Dimas & Annisa', 'paket' => 'Prewedding Outdoor Lengkap', 'tgl' => '20 Nov 2026', 'status' => 'confirmed', 'status_label' => 'Terkonfirmasi', 'dp' => 'Lunas Midtrans'],
            ['kode' => 'MUJA-5B8R2T', 'nama' => 'Bima Satria', 'paket' => 'Engagement Home Package', 'tgl' => '28 Nov 2026', 'status' => 'waiting_dp', 'status_label' => 'Menunggu DP', 'dp' => 'Pending (Midtrans)'],
            ['kode' => 'MUJA-9Y1M5K', 'nama' => 'Ferry & Claudia', 'paket' => 'Wedding Platinum (Gedung)', 'tgl' => '25 Sep 2026', 'status' => 'done', 'status_label' => 'Selesai', 'dp' => 'Lunas Penuh'],
        ];

        return view('admin.dashboard', compact('stats', 'recentBookings'));
    }

    /**
     * Daftar Booking Masuk
     */
    public function booking(): View
    {
        $bookings = [
            ['kode' => 'MUJA-7K3P9Q', 'nama' => 'Risky & Rahma', 'wa' => '081234567890', 'paket' => 'Wedding Gold (Rumah)', 'tgl' => '12 Okt 2026', 'lokasi' => 'Surabaya', 'status' => 'editing', 'status_label' => 'Editing', 'total' => 5000000, 'dp' => 1500000],
            ['kode' => 'MUJA-2W9X4L', 'nama' => 'Dimas & Annisa', 'wa' => '082198765432', 'paket' => 'Prewedding Outdoor Lengkap', 'tgl' => '20 Nov 2026', 'lokasi' => 'Pacet, Mojokerto', 'status' => 'confirmed', 'status_label' => 'Terkonfirmasi', 'total' => 2500000, 'dp' => 750000],
            ['kode' => 'MUJA-5B8R2T', 'nama' => 'Bima Satria', 'wa' => '081345678912', 'paket' => 'Engagement Home Package', 'tgl' => '28 Nov 2026', 'lokasi' => 'Sidoarjo', 'status' => 'waiting_dp', 'status_label' => 'Menunggu DP', 'total' => 2500000, 'dp' => 750000],
            ['kode' => 'MUJA-9Y1M5K', 'nama' => 'Ferry & Claudia', 'wa' => '085612345678', 'paket' => 'Wedding Platinum (Gedung)', 'tgl' => '25 Sep 2026', 'lokasi' => 'Grand City, Surabaya', 'status' => 'done', 'status_label' => 'Selesai', 'total' => 7500000, 'dp' => 2500000],
            ['kode' => 'MUJA-3L1K8Z', 'nama' => 'Andi & Sarah', 'wa' => '087812349900', 'paket' => 'Wedding Silver (Rumah)', 'tgl' => '05 Des 2026', 'lokasi' => 'Surabaya Barat', 'status' => 'confirmed', 'status_label' => 'Terkonfirmasi', 'total' => 4500000, 'dp' => 1000000],
        ];

        return view('admin.booking', compact('bookings'));
    }

    /**
     * Kalender & Pengaturan Blokir Slot
     */
    public function kalender(): View
    {
        $blockedSlots = [
            ['tanggal' => '07 November 2026', 'jam' => 'Full Day', 'alasan' => 'Libur Kru Fotografer & Maintenance Alat'],
            ['tanggal' => '08 November 2026', 'jam' => '08:00 - 12:00', 'alasan' => 'Peliputan Acara Internal'],
            ['tanggal' => '14 November 2026', 'jam' => 'Full Day', 'alasan' => 'Slot Terisi Klien (Wedding Offline)'],
            ['tanggal' => '21 November 2026', 'jam' => 'Full Day', 'alasan' => 'Slot Terisi Klien (Wedding Offline)'],
            ['tanggal' => '22 November 2026', 'jam' => 'Full Day', 'alasan' => 'Slot Terisi Klien (Wedding Offline)'],
        ];

        return view('admin.kalender', compact('blockedSlots'));
    }

    /**
     * Album Acara Publik
     */
    public function album(): View
    {
        $albums = [
            ['nama' => 'Surabaya Night Ride Vol. 8', 'slug' => 'surabaya-night-ride-vol-8', 'tanggal' => '24 Okt 2026', 'jumlah' => 420, 'harga' => 25000, 'terjual' => 84],
            ['nama' => 'Sunday Morning Ride Cangar - Batu', 'slug' => 'sunmori-cangar-batu', 'tanggal' => '12 Okt 2026', 'jumlah' => 680, 'harga' => 25000, 'terjual' => 112],
            ['nama' => 'Rolling Thunder Superbike East Java', 'slug' => 'rolling-thunder-superbike', 'tanggal' => '28 Sep 2026', 'jumlah' => 350, 'harga' => 25000, 'terjual' => 45],
            ['nama' => 'Morning Roll Classic Vespa Club', 'slug' => 'morning-roll-vespa-club', 'tanggal' => '15 Sep 2026', 'jumlah' => 290, 'harga' => 25000, 'terjual' => 38],
        ];

        return view('admin.album', compact('albums'));
    }

    /**
     * Pesanan Foto HD
     */
    public function pesananFoto(): View
    {
        $orders = [
            ['id' => 'MID-HD-89301', 'pemesan' => 'Rian Hidayat', 'wa' => '081299887766', 'album' => 'Surabaya Night Ride Vol. 8', 'qty' => 3, 'total' => 75000, 'status' => 'Lunas (Midtrans)', 'waktu' => '25 Okt 2026, 09:14'],
            ['id' => 'MID-HD-89240', 'pemesan' => 'Kevin Sanjaya', 'wa' => '082133445566', 'album' => 'Sunday Morning Ride Cangar', 'qty' => 2, 'total' => 50000, 'status' => 'Lunas (Midtrans)', 'waktu' => '13 Okt 2026, 14:22'],
            ['id' => 'MID-HD-89195', 'pemesan' => 'Bagus Wicaksono', 'wa' => '085711223344', 'album' => 'Rolling Thunder Superbike', 'qty' => 4, 'total' => 100000, 'status' => 'Lunas (Midtrans)', 'waktu' => '29 Sep 2026, 11:05'],
        ];

        return view('admin.pesanan-foto', compact('orders'));
    }

    /**
     * Kurasi Portofolio
     */
    public function portofolio(): View
    {
        $portfolios = [
            ['judul' => 'The Celestial Bond — Risky & Rahma', 'kategori' => 'Wedding', 'status' => 'Tampil di Beranda & Portofolio', 'urutan' => 1],
            ['judul' => 'Sacred Vows Under Crystal Lights', 'kategori' => 'Wedding', 'status' => 'Tampil di Portofolio', 'urutan' => 2],
            ['judul' => 'Eternity in Ivory Grace', 'kategori' => 'Wedding', 'status' => 'Tampil di Portofolio', 'urutan' => 3],
            ['judul' => 'Intimate Crimson Harmony', 'kategori' => 'Wedding', 'status' => 'Tampil di Portofolio', 'urutan' => 4],
            ['judul' => 'Constellation of Two Hearts', 'kategori' => 'Prewedding', 'status' => 'Tampil di Portofolio', 'urutan' => 5],
        ];

        return view('admin.portofolio', compact('portfolios'));
    }
}
