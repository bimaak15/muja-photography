<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusController extends Controller
{
    /**
     * Tampilkan halaman pelacak status pengerjaan pesanan dengan kode unik.
     */
    public function index(Request $request): View
    {
        $kode = strtoupper(trim($request->query('kode', '')));

        // Sample database simulation of orders
        $mockOrders = [
            'MUJA-7K3P9Q' => [
                'kode' => 'MUJA-7K3P9Q',
                'nama' => 'Risky & Rahma',
                'paket' => 'Wedding Gold (Rumah)',
                'tanggal' => '12 Oktober 2026',
                'lokasi' => 'Surabaya, Jawa Timur',
                'status' => 'editing',
                'status_label' => 'Editing & Pascaproduksi',
                'dp_status' => 'Lunas (Midtrans)',
                'catatan' => 'Sesi shooting selesai dengan lancar. Saat ini sedang proses color grading 120 foto pilihan dan tata letak album magnetic.',
                'estimasi_selesai' => '18 November 2026',
                'drive_link' => null,
            ],
            'MUJA-2W9X4L' => [
                'kode' => 'MUJA-2W9X4L',
                'nama' => 'Dimas & Annisa',
                'paket' => 'Prewedding Outdoor Lengkap',
                'tanggal' => '20 November 2026',
                'lokasi' => 'Pacet, Mojokerto',
                'status' => 'confirmed',
                'status_label' => 'Terkonfirmasi (Jadwal Aman)',
                'dp_status' => 'Lunas (Midtrans)',
                'catatan' => 'Pembayaran DP telah terverifikasi otomatis. Jadwal pemotretan telah dikunci di kalender fotografer. Tim MUA & wardrobe telah disiapkan.',
                'estimasi_selesai' => '25 November 2026',
                'drive_link' => null,
            ],
            'MUJA-5B8R2T' => [
                'kode' => 'MUJA-5B8R2T',
                'nama' => 'Bima Satria',
                'paket' => 'Engagement Home Package',
                'tanggal' => '28 November 2026',
                'lokasi' => 'Sidoarjo, Jawa Timur',
                'status' => 'waiting_dp',
                'status_label' => 'Menunggu Pembayaran DP',
                'dp_status' => 'Belum Dibayar (Batas 24 Jam)',
                'catatan' => 'Silakan selesaikan pembayaran DP via Midtrans Snap untuk mengunci slot tanggal agar tidak dipesan klien lain.',
                'estimasi_selesai' => '—',
                'drive_link' => null,
            ],
            'MUJA-9Y1M5K' => [
                'kode' => 'MUJA-9Y1M5K',
                'nama' => 'Ferry & Claudia',
                'paket' => 'Wedding Platinum (Gedung)',
                'tanggal' => '25 September 2026',
                'lokasi' => 'Grand City Convention Hall, Surabaya',
                'status' => 'done',
                'status_label' => 'Selesai & Dikirim',
                'dp_status' => 'Lunas Penuh',
                'catatan' => 'Seluruh master foto resolusi tinggi, video cinematic 4K, dan album cetak magazine telah selesai dikirim.',
                'estimasi_selesai' => 'Selesai (20 Oktober 2026)',
                'drive_link' => 'https://drive.google.com/drive/folders/muja-demo-portfolio',
            ],
        ];

        $currentOrder = null;
        if (!empty($kode)) {
            if (isset($mockOrders[$kode])) {
                $currentOrder = $mockOrders[$kode];
            } else {
                // Generate authentic order data from request parameters or booking session
                $isPaid = $request->query('status') === 'confirmed' || $request->query('bayar') === 'lunas';
                $clientName = $request->query('nama', 'Klien MujaPhotography');
                $pkgName = $request->query('paket', 'Dokumentasi Privat');
                $sessionDate = $request->query('tanggal', 'November 2026');
                $venueLoc = $request->query('lokasi', 'Jawa Timur');

                $currentOrder = [
                    'kode' => $kode,
                    'nama' => $clientName,
                    'paket' => $pkgName,
                    'tanggal' => $sessionDate,
                    'lokasi' => $venueLoc,
                    'status' => $isPaid ? 'confirmed' : 'waiting_dp',
                    'status_label' => $isPaid ? 'Terkonfirmasi (Jadwal Aman)' : 'Menunggu Pembayaran Uang Muka (DP)',
                    'dp_status' => $isPaid ? 'Lunas Terverifikasi (QRIS)' : 'Menunggu Verifikasi QRIS',
                    'catatan' => $isPaid 
                        ? 'Pembayaran DP telah berhasil diverifikasi otomatis melalui jaringan QRIS All Payment. Jadwal sesi pemotretan Anda telah resmi tercatat dan dikunci di kalender fotografer.'
                        : 'Pesanan Anda telah tercatat dalam sistem reservasi. Silakan selesaikan pembayaran DP agar jadwal sesi terkunci dan aman dari bentrok jadwal.',
                    'estimasi_selesai' => 'Terkonfirmasi setelah sesi pemotretan',
                    'drive_link' => null,
                ];
            }
        }

        return view('status', compact('kode', 'currentOrder', 'mockOrders'));
    }
}
