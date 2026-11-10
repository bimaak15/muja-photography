<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AcaraController extends Controller
{
    /**
     * Data mock album acara publik MujaPhotography
     */
    private function getAlbums(): array
    {
        return [
            'surabaya-night-ride-vol-8' => [
                'slug' => 'surabaya-night-ride-vol-8',
                'nama' => 'Surabaya Night Ride Vol. 8',
                'kategori' => 'Night Ride',
                'tanggal' => '24 Oktober 2026',
                'lokasi' => 'Jl. Tunjungan — Mayjen Sungkono, Surabaya',
                'jam_rentang' => '21:00 - 23:30 WIB',
                'jumlah_foto' => 420,
                'harga_hd' => 25000,
                'cover' => asset('img/hero/mjp_2862.webp'),
                'deskripsi' => 'Peliputan resmi ratusan rider motor klasik dan sport melintasi gemerlap lampu malam kota Surabaya.',
                'jam_filter' => ['Semua Jam', '21:00 - 21:30', '21:30 - 22:00', '22:00 - 22:30', '22:30 - 23:00'],
                'photos' => [
                    ['id' => 'SNR-0104', 'jam' => '21:12', 'slot' => '21:00 - 21:30', 'img' => asset('img/hero/mjp_2862.webp')],
                    ['id' => 'SNR-0118', 'jam' => '21:24', 'slot' => '21:00 - 21:30', 'img' => asset('img/hero/mjp_2866.webp')],
                    ['id' => 'SNR-0142', 'jam' => '21:38', 'slot' => '21:30 - 22:00', 'img' => asset('img/hero/mjp_2599.webp')],
                    ['id' => 'SNR-0155', 'jam' => '21:46', 'slot' => '21:30 - 22:00', 'img' => asset('img/hero/mjp_2614.webp')],
                    ['id' => 'SNR-0189', 'jam' => '21:58', 'slot' => '21:30 - 22:00', 'img' => asset('img/hero/mjp_2609.webp')],
                    ['id' => 'SNR-0205', 'jam' => '22:08', 'slot' => '22:00 - 22:30', 'img' => asset('img/hero/mjp_2682.webp')],
                    ['id' => 'SNR-0220', 'jam' => '22:19', 'slot' => '22:00 - 22:30', 'img' => asset('img/hero/mjp_2862.webp')],
                    ['id' => 'SNR-0245', 'jam' => '22:27', 'slot' => '22:00 - 22:30', 'img' => asset('img/hero/mjp_2866.webp')],
                    ['id' => 'SNR-0278', 'jam' => '22:35', 'slot' => '22:30 - 23:00', 'img' => asset('img/hero/mjp_2599.webp')],
                    ['id' => 'SNR-0294', 'jam' => '22:48', 'slot' => '22:30 - 23:00', 'img' => asset('img/hero/mjp_2614.webp')],
                    ['id' => 'SNR-0312', 'jam' => '22:56', 'slot' => '22:30 - 23:00', 'img' => asset('img/hero/mjp_2609.webp')],
                    ['id' => 'SNR-0330', 'jam' => '23:04', 'slot' => '22:30 - 23:00', 'img' => asset('img/hero/mjp_2682.webp')],
                ]
            ],
            'sunmori-cangar-batu' => [
                'slug' => 'sunmori-cangar-batu',
                'nama' => 'Sunday Morning Ride Cangar - Batu',
                'kategori' => 'Sunmori',
                'tanggal' => '12 Oktober 2026',
                'lokasi' => 'Tikungan Gotekan, Jalur Pacet — Cangar',
                'jam_rentang' => '06:30 - 10:30 WIB',
                'jumlah_foto' => 680,
                'harga_hd' => 25000,
                'cover' => asset('img/hero/mjp_2866.webp'),
                'deskripsi' => 'Aksi cornering rapi dan rombongan komunitas motor melibas tanjakan sejuk Pacet Cangar.',
                'jam_filter' => ['Semua Jam', '06:30 - 07:30', '07:30 - 08:30', '08:30 - 09:30', '09:30 - 10:30'],
                'photos' => [
                    ['id' => 'SMR-0052', 'jam' => '06:45', 'slot' => '06:30 - 07:30', 'img' => asset('img/hero/mjp_2866.webp')],
                    ['id' => 'SMR-0088', 'jam' => '07:15', 'slot' => '06:30 - 07:30', 'img' => asset('img/hero/mjp_2599.webp')],
                    ['id' => 'SMR-0130', 'jam' => '07:42', 'slot' => '07:30 - 08:30', 'img' => asset('img/hero/mjp_2614.webp')],
                    ['id' => 'SMR-0175', 'jam' => '08:10', 'slot' => '07:30 - 08:30', 'img' => asset('img/hero/mjp_2609.webp')],
                    ['id' => 'SMR-0210', 'jam' => '08:45', 'slot' => '08:30 - 09:30', 'img' => asset('img/hero/mjp_2682.webp')],
                    ['id' => 'SMR-0260', 'jam' => '09:12', 'slot' => '08:30 - 09:30', 'img' => asset('img/hero/mjp_2862.webp')],
                    ['id' => 'SMR-0310', 'jam' => '09:48', 'slot' => '09:30 - 10:30', 'img' => asset('img/hero/mjp_2866.webp')],
                    ['id' => 'SMR-0345', 'jam' => '10:15', 'slot' => '09:30 - 10:30', 'img' => asset('img/hero/mjp_2599.webp')],
                ]
            ],
            'rolling-thunder-superbike' => [
                'slug' => 'rolling-thunder-superbike',
                'nama' => 'Rolling Thunder Superbike East Java',
                'kategori' => 'Track Day',
                'tanggal' => '28 September 2026',
                'lokasi' => 'Kenjeran Park & Jembatan Suramadu',
                'jam_rentang' => '07:00 - 11:00 WIB',
                'jumlah_foto' => 350,
                'harga_hd' => 25000,
                'cover' => asset('img/hero/mjp_2599.webp'),
                'deskripsi' => 'Kecepatan dan kegagahan motor sport 4 silinder saat konvoi di pesisir Surabaya.',
                'jam_filter' => ['Semua Jam', '07:00 - 08:00', '08:00 - 09:00', '09:00 - 10:00', '10:00 - 11:00'],
                'photos' => [
                    ['id' => 'RTS-0012', 'jam' => '07:22', 'slot' => '07:00 - 08:00', 'img' => asset('img/hero/mjp_2599.webp')],
                    ['id' => 'RTS-0045', 'jam' => '07:54', 'slot' => '07:00 - 08:00', 'img' => asset('img/hero/mjp_2614.webp')],
                    ['id' => 'RTS-0089', 'jam' => '08:30', 'slot' => '08:00 - 09:00', 'img' => asset('img/hero/mjp_2609.webp')],
                    ['id' => 'RTS-0120', 'jam' => '09:15', 'slot' => '09:00 - 10:00', 'img' => asset('img/hero/mjp_2682.webp')],
                    ['id' => 'RTS-0160', 'jam' => '10:05', 'slot' => '10:00 - 11:00', 'img' => asset('img/hero/mjp_2862.webp')],
                ]
            ],
            'morning-roll-vespa-club' => [
                'slug' => 'morning-roll-vespa-club',
                'nama' => 'Morning Roll Classic Vespa Club',
                'kategori' => 'Classic Ride',
                'tanggal' => '15 September 2026',
                'lokasi' => 'Kawasan Kota Tua Surabaya',
                'jam_rentang' => '06:00 - 09:30 WIB',
                'jumlah_foto' => 290,
                'harga_hd' => 25000,
                'cover' => asset('img/hero/mjp_2614.webp'),
                'deskripsi' => 'Nuansa retro skuter klasik Italia menyusuri bangunan bersejarah dan Jembatan Merah.',
                'jam_filter' => ['Semua Jam', '06:00 - 07:00', '07:00 - 08:00', '08:00 - 09:30'],
                'photos' => [
                    ['id' => 'MRV-0015', 'jam' => '06:20', 'slot' => '06:00 - 07:00', 'img' => asset('img/hero/mjp_2614.webp')],
                    ['id' => 'MRV-0038', 'jam' => '06:45', 'slot' => '06:00 - 07:00', 'img' => asset('img/hero/mjp_2609.webp')],
                    ['id' => 'MRV-0072', 'jam' => '07:30', 'slot' => '07:00 - 08:00', 'img' => asset('img/hero/mjp_2682.webp')],
                    ['id' => 'MRV-0110', 'jam' => '08:15', 'slot' => '08:00 - 09:30', 'img' => asset('img/hero/mjp_2866.webp')],
                ]
            ],
        ];
    }

    /**
     * Tampilkan daftar album acara publik.
     */
    public function index(): View
    {
        $albums = $this->getAlbums();
        return view('acara.index', compact('albums'));
    }

    /**
     * Tampilkan galeri satu album acara dengan filter jam melintas dan preview watermark.
     */
    public function show(string $album): View
    {
        $albums = $this->getAlbums();
        $albumData = $albums[$album] ?? $albums['surabaya-night-ride-vol-8'];

        return view('acara.show', compact('albumData'));
    }

    /**
     * Tampilkan halaman pemesanan & checkout foto resolusi tinggi (HD) tanpa watermark.
     */
    public function pesan(Request $request, string $album): View
    {
        $albums = $this->getAlbums();
        $albumData = $albums[$album] ?? $albums['surabaya-night-ride-vol-8'];

        // Get selected photo IDs from query param e.g. ?photos=SNR-0142,SNR-0155
        $selectedIdsParam = $request->query('photos', '');
        $selectedIds = array_filter(explode(',', $selectedIdsParam));

        if (empty($selectedIds)) {
            // Default select first two photos for demonstration
            $selectedIds = [$albumData['photos'][0]['id'] ?? 'SNR-0104'];
            if (isset($albumData['photos'][1])) {
                $selectedIds[] = $albumData['photos'][1]['id'];
            }
        }

        $selectedPhotos = array_filter($albumData['photos'], function ($photo) use ($selectedIds) {
            return in_array($photo['id'], $selectedIds);
        });

        // Re-index array
        $selectedPhotos = array_values($selectedPhotos);
        $totalPrice = count($selectedPhotos) * $albumData['harga_hd'];

        return view('acara.pesan', compact('albumData', 'selectedPhotos', 'totalPrice'));
    }
}
