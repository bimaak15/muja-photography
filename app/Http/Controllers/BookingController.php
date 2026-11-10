<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * Tampilkan formulir reservasi sesi privat dengan kalender anti-bentrok.
     */
    public function index(): View
    {
        $packages = [
            [
                'kategori' => 'Wedding',
                'daftar' => [
                    ['id' => 'wed-silver-rumah', 'nama' => 'Wedding Silver (Rumah)', 'harga' => 4500000, 'dp' => 1000000, 'durasi' => 'Full Day (Akad + Resepsi)'],
                    ['id' => 'wed-gold-rumah', 'nama' => 'Wedding Gold (Rumah)', 'harga' => 5000000, 'dp' => 1500000, 'durasi' => 'Full Day (Akad + Resepsi)'],
                    ['id' => 'wed-platinum-rumah', 'nama' => 'Wedding Platinum (Rumah)', 'harga' => 7000000, 'dp' => 2000000, 'durasi' => 'Full Day (Akad + Resepsi + Prewedding)'],
                    ['id' => 'wed-silver-gedung', 'nama' => 'Wedding Silver (Gedung)', 'harga' => 5000000, 'dp' => 1500000, 'durasi' => 'Full Day'],
                    ['id' => 'wed-gold-gedung', 'nama' => 'Wedding Gold (Gedung)', 'harga' => 6000000, 'dp' => 2000000, 'durasi' => 'Full Day (Magazine)'],
                    ['id' => 'wed-platinum-gedung', 'nama' => 'Wedding Platinum (Gedung)', 'harga' => 7500000, 'dp' => 2500000, 'durasi' => 'Full Day (Magazine + Prewedding)'],
                ]
            ],
            [
                'kategori' => 'Prewedding',
                'daftar' => [
                    ['id' => 'pre-foto-indoor', 'nama' => 'Prewedding Foto Only (Indoor)', 'harga' => 1000000, 'dp' => 300000, 'durasi' => '3 Jam on Duty'],
                    ['id' => 'pre-foto-outdoor', 'nama' => 'Prewedding Foto Only (Outdoor)', 'harga' => 1500000, 'dp' => 500000, 'durasi' => '3 Jam on Duty'],
                    ['id' => 'pre-indoor-full', 'nama' => 'Prewedding Lengkap (Indoor Studio MJ)', 'harga' => 1500000, 'dp' => 500000, 'durasi' => 'Include MUA & Busana'],
                    ['id' => 'pre-outdoor-full', 'nama' => 'Prewedding Lengkap (Outdoor)', 'harga' => 2500000, 'dp' => 750000, 'durasi' => 'Include MUA & Busana'],
                ]
            ],
            [
                'kategori' => 'Engagement & Siraman',
                'daftar' => [
                    ['id' => 'eng-home', 'nama' => 'Engagement Home Package', 'harga' => 2500000, 'dp' => 750000, 'durasi' => 'Foto & Video Cinematic'],
                    ['id' => 'eng-gedung', 'nama' => 'Engagement Gedung Package', 'harga' => 3000000, 'dp' => 1000000, 'durasi' => 'Foto & Video Cinematic'],
                    ['id' => 'sir-home', 'nama' => 'Siraman Home Package', 'harga' => 2600000, 'dp' => 800000, 'durasi' => 'Foto, Video, Album Magnetic'],
                    ['id' => 'sir-gedung', 'nama' => 'Siraman Gedung Package', 'harga' => 3100000, 'dp' => 1000000, 'durasi' => 'Foto, Video, Album Magnetic'],
                ]
            ],
            [
                'kategori' => 'Akad Only & Graduation',
                'daftar' => [
                    ['id' => 'akad-only', 'nama' => 'Akad Only', 'harga' => 1800000, 'dp' => 500000, 'durasi' => '3 Jam on Duty'],
                    ['id' => 'grad-basic', 'nama' => 'Graduation Sesi Personal/Grup', 'harga' => 800000, 'dp' => 250000, 'durasi' => '2 Jam on Duty'],
                ]
            ],
        ];

        return view('booking', compact('packages'));
    }
}
