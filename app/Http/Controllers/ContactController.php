<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Tampilkan halaman kontak, media sosial, dan konsultasi WhatsApp.
     */
    public function index(): View
    {
        $faqs = [
            [
                'q' => 'Bagaimana cara melakukan booking sesi foto?',
                'a' => 'Anda dapat memilih paket di halaman Paket & Harga, lalu menentukan tanggal dan waktu di halaman Booking. Setelah mengisi formulir dan membayar DP melalui Midtrans, slot Anda akan langsung terkonfirmasi otomatis.'
            ],
            [
                'q' => 'Berapa besaran DP yang harus dibayarkan?',
                'a' => 'Besaran DP bervariasi tergantung paket yang dipilih, mulai dari Rp 300.000 untuk sesi prewedding hingga Rp 1.000.000 - Rp 2.500.000 untuk paket wedding lengkap.'
            ],
            [
                'q' => 'Berapa lama proses editing foto?',
                'a' => 'Untuk peliputan acara publik, foto HD langsung dapat diunduh otomatis setelah pembayaran lunas. Untuk sesi privat (wedding/prewedding), proses seleksi dan color grading membutuhkan waktu 7 hingga 21 hari kerja, dan Anda dapat memantau progresnya di halaman Cek Status.'
            ],
            [
                'q' => 'Apakah melayani pemotretan di luar Surabaya?',
                'a' => 'Ya, kami melayani wilayah Surabaya, Sidoarjo, Mojokerto, Gresik, Malang, dan kota lainnya di Jawa Timur dengan penyesuaian biaya akomodasi transportasi.'
            ],
            [
                'q' => 'Bagaimana jika ingin berkonsultasi konsep terlebih dahulu?',
                'a' => 'Anda sangat dipersilakan menghubungi kami melalui WhatsApp atau formulir di halaman ini. Konsultasi konsep dan pemilihan paket 100% gratis tanpa komitmen.'
            ],
        ];

        return view('kontak', compact('faqs'));
    }
}
