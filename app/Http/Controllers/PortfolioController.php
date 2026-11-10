<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Tampilkan halaman portofolio terkurasi dengan filter kategori dan lightbox.
     */
    public function index(): View
    {
        $items = [
            [
                'id' => 1,
                'judul' => 'The Celestial Bond — Risky & Rahma',
                'kategori' => 'wedding',
                'kategori_label' => 'Wedding',
                'lokasi' => 'Surabaya, Jawa Timur',
                'gambar' => asset('img/hero/mjp_2866.webp'),
                'deskripsi' => 'Akad nikah dan resepsi megah dengan tata cahaya dramatis dan sentuhan pelaminan bertema galaksi.'
            ],
            [
                'id' => 2,
                'judul' => 'Sacred Vows Under Crystal Lights',
                'kategori' => 'wedding',
                'kategori_label' => 'Wedding',
                'lokasi' => 'Surabaya, Jawa Timur',
                'gambar' => asset('img/hero/mjp_2599.webp'),
                'deskripsi' => 'Momen jabat tangan sakral saat ijab qabul di bawah pendar lampu kristal hangat nan khidmat.'
            ],
            [
                'id' => 3,
                'judul' => 'Eternity in Ivory Grace',
                'kategori' => 'wedding',
                'kategori_label' => 'Wedding',
                'lokasi' => 'Sidoarjo, Jawa Timur',
                'gambar' => asset('img/hero/mjp_2609.webp'),
                'deskripsi' => 'Keindahan busana pengantin tradisional kontemporer bernuansa ivory dengan senyum tulus penuh kebahagiaan.'
            ],
            [
                'id' => 4,
                'judul' => 'Intimate Crimson Harmony',
                'kategori' => 'wedding',
                'kategori_label' => 'Wedding',
                'lokasi' => 'Surabaya, Jawa Timur',
                'gambar' => asset('img/hero/mjp_2614.webp'),
                'deskripsi' => 'Sentuhan merah maroon mewah yang memancarkan kehangatan keluarga dan cinta kedua mempelai.'
            ],
            [
                'id' => 5,
                'judul' => 'Candid Laughter & Pure Euphoria',
                'kategori' => 'wedding',
                'kategori_label' => 'Wedding',
                'lokasi' => 'Surabaya, Jawa Timur',
                'gambar' => asset('img/hero/mjp_2682.webp'),
                'deskripsi' => 'Tawa lepas spontan di tengah resepsi yang terekam abadi tanpa rekayasa pose kaku.'
            ],
            [
                'id' => 6,
                'judul' => 'Constellation of Two Hearts',
                'kategori' => 'prewedding',
                'kategori_label' => 'Pre-Wedding',
                'lokasi' => 'Surabaya, Jawa Timur',
                'gambar' => asset('img/hero/mjp_2862.webp'),
                'deskripsi' => 'Konsep prewedding modern berlatar instalasi seni rasi bintang dengan siluet elegan pasangan.'
            ],
            [
                'id' => 7,
                'judul' => 'Warm Sunset Embrace at Pine Forest',
                'kategori' => 'prewedding',
                'kategori_label' => 'Pre-Wedding',
                'lokasi' => 'Pacet, Mojokerto',
                'gambar' => asset('img/hero/mjp_2866.webp'),
                'deskripsi' => 'Pendar keemasan senja di antara rerimbun pohon pinus yang memberikan suasana romantis alami.'
            ],
            [
                'id' => 8,
                'judul' => 'Sacred Siraman & Family Blessings',
                'kategori' => 'engagement',
                'kategori_label' => 'Engagement & Siraman',
                'lokasi' => 'Surabaya, Jawa Timur',
                'gambar' => asset('img/hero/mjp_2609.webp'),
                'deskripsi' => 'Prosesi siraman adat Jawa penuh haru dengan gemericik air tujuh sumber dan doa restu orang tua.'
            ],
            [
                'id' => 9,
                'judul' => 'Surabaya Night Ride City Lights Vol. 8',
                'kategori' => 'event',
                'kategori_label' => 'Acara Komunitas',
                'lokasi' => 'Jl. Tunjungan, Surabaya',
                'gambar' => asset('img/hero/mjp_2862.webp'),
                'deskripsi' => 'Peliputan aksi ratusan motor melintasi jalanan bersejarah Surabaya di malam hari dengan teknik panning tajam.'
            ],
        ];

        return view('portofolio', compact('items'));
    }
}
