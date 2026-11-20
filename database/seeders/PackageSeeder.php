<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Seed the official Muja Photography 2026 pricelist packages.
     */
    public function run(): void
    {
        $packages = [
            // Wedding Rumah
            [
                'name' => 'Wedding Rumah - Silver',
                'slug' => 'wedding-rumah-silver',
                'category' => 'Wedding Rumah',
                'price' => 4500000,
                'deposit_percentage' => 30,
                'duration_minutes' => 480,
                'description' => 'Paket dokumentasi Akad, Temu, dan Resepsi di rumah.',
                'features' => ['Foto & video', 'Foto unlimited', 'Video liputan', 'Cetak 110 4R', 'Album magnetic', 'All file in flashdisk 16GB', 'Free cetak 10RS 3 lembar'],
                'is_popular' => false,
                'sort_order' => 1,
            ],
            [
                'name' => 'Wedding Rumah - Gold',
                'slug' => 'wedding-rumah-gold',
                'category' => 'Wedding Rumah',
                'price' => 5000000,
                'deposit_percentage' => 30,
                'duration_minutes' => 480,
                'description' => 'Paket favorit Akad, Temu, dan Resepsi di rumah dengan video cinematic.',
                'features' => ['Foto & video', 'Foto unlimited', 'Video cinematic', 'Album magnetic', 'All file in flashdisk 16GB', 'Free cetak 10RS 5 lembar'],
                'badge' => 'Paling Diminati',
                'is_popular' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Wedding Rumah - Platinum',
                'slug' => 'wedding-rumah-platinum',
                'category' => 'Wedding Rumah',
                'price' => 7000000,
                'deposit_percentage' => 30,
                'duration_minutes' => 600,
                'description' => 'Paket lengkap Wedding Rumah termasuk bonus prewedding & album magazine.',
                'features' => ['Foto & video', 'Foto unlimited', 'Video cinematic', 'Free prewedding outdoor / indoor', 'Cetak 120 4R', 'Album magnetic jumbo', 'Album magazine', 'All file in flashdisk 16GB', 'Free cetak 10RS 5 lembar', 'Free cetak 16RS + frame 1pcs'],
                'is_popular' => false,
                'sort_order' => 3,
            ],

            // Wedding Gedung
            [
                'name' => 'Wedding Gedung - Silver',
                'slug' => 'wedding-gedung-silver',
                'category' => 'Wedding Gedung',
                'price' => 5000000,
                'deposit_percentage' => 30,
                'duration_minutes' => 480,
                'description' => 'Paket dokumentasi Akad, Temu, dan Resepsi di gedung.',
                'features' => ['Foto & video', 'Foto unlimited', 'Video cinematic', 'Cetak 110 4R', 'Album magnetic', 'All file in flashdisk 16GB', 'Free cetak 10RS 3 lembar'],
                'is_popular' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'Wedding Gedung - Gold',
                'slug' => 'wedding-gedung-gold',
                'category' => 'Wedding Gedung',
                'price' => 6000000,
                'deposit_percentage' => 30,
                'duration_minutes' => 480,
                'description' => 'Paket favorit Wedding Gedung dengan album magazine eksklusif.',
                'features' => ['Foto & video', 'Foto unlimited', 'Video cinematic', 'Album magazine', 'All file in flashdisk 16GB', 'Free cetak 10RS 5 lembar'],
                'badge' => 'Paling Diminati',
                'is_popular' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Wedding Gedung - Platinum',
                'slug' => 'wedding-gedung-platinum',
                'category' => 'Wedding Gedung',
                'price' => 7500000,
                'deposit_percentage' => 30,
                'duration_minutes' => 600,
                'description' => 'Paket terlengkap Wedding Gedung dengan bonus prewedding dan frame 16RS.',
                'features' => ['Foto & video', 'Foto unlimited', 'Video cinematic', 'Free prewedding outdoor / indoor', 'Cetak 120 4R', 'Album magnetic jumbo', 'Album magazine', 'All file in flashdisk 16GB', 'Free cetak 10RS 5 lembar', 'Free cetak 16RS + frame 1pcs'],
                'is_popular' => false,
                'sort_order' => 6,
            ],

            // Engagement
            [
                'name' => 'Engagement - Home Package',
                'slug' => 'engagement-home-package',
                'category' => 'Engagement',
                'price' => 2500000,
                'deposit_percentage' => 30,
                'duration_minutes' => 240,
                'description' => 'Dokumentasi acara lamaran di rumah.',
                'features' => ['1 fotografer', '1 videografer', 'Cetak 80 4R', 'Album magnetic', 'Video cinematic 3 menit', 'All file in flashdisk 16GB'],
                'is_popular' => false,
                'sort_order' => 7,
            ],
            [
                'name' => 'Engagement - Gedung Package',
                'slug' => 'engagement-gedung-package',
                'category' => 'Engagement',
                'price' => 3000000,
                'deposit_percentage' => 30,
                'duration_minutes' => 240,
                'description' => 'Dokumentasi acara lamaran di gedung.',
                'features' => ['1 fotografer', '1 videografer', 'Cetak 80 4R', 'Album magnetic', 'Video cinematic 3 menit', 'All file in flashdisk 16GB'],
                'is_popular' => false,
                'sort_order' => 8,
            ],

            // Prewedding
            [
                'name' => 'Prewedding - Only Foto (Indoor)',
                'slug' => 'prewedding-only-foto-indoor',
                'category' => 'Prewedding',
                'price' => 1000000,
                'deposit_percentage' => 30,
                'duration_minutes' => 180,
                'description' => 'Sesi prewedding khusus foto indoor area Sidoarjo, Surabaya, Mojokerto.',
                'features' => ['2 fotografer', '3 hours on duty', '100 edited file', 'All file in google drive'],
                'is_popular' => false,
                'sort_order' => 9,
            ],
            [
                'name' => 'Prewedding - Only Foto (Outdoor)',
                'slug' => 'prewedding-only-foto-outdoor',
                'category' => 'Prewedding',
                'price' => 1500000,
                'deposit_percentage' => 30,
                'duration_minutes' => 180,
                'description' => 'Sesi prewedding khusus foto outdoor area Sidoarjo, Surabaya, Mojokerto.',
                'features' => ['2 fotografer', '3 hours on duty', '100 edited file', 'All file in google drive'],
                'is_popular' => false,
                'sort_order' => 10,
            ],
            [
                'name' => 'Prewedding - Indoor',
                'slug' => 'prewedding-indoor',
                'category' => 'Prewedding',
                'price' => 1500000,
                'deposit_percentage' => 30,
                'duration_minutes' => 120,
                'description' => 'Paket lengkap prewedding indoor dengan makeup, busana sepasang, dan Studio MJ 2 jam.',
                'features' => ['Makeup', 'Busana sepasang', 'Hijabdo', 'Foto unlimited file', 'Edit 20 foto', 'Studio MJ 2 jam'],
                'is_popular' => false,
                'sort_order' => 11,
            ],
            [
                'name' => 'Prewedding - Outdoor',
                'slug' => 'prewedding-outdoor',
                'category' => 'Prewedding',
                'price' => 2500000,
                'deposit_percentage' => 30,
                'duration_minutes' => 180,
                'description' => 'Paket lengkap prewedding outdoor termasuk makeup dan busana sepasang.',
                'features' => ['Makeup', 'Busana sepasang', 'Hijabdo', 'Foto unlimited file', 'Edit 20 foto'],
                'is_popular' => false,
                'sort_order' => 12,
            ],

            // Siraman
            [
                'name' => 'Siraman - Home Package',
                'slug' => 'siraman-home-package',
                'category' => 'Siraman',
                'price' => 2600000,
                'deposit_percentage' => 30,
                'duration_minutes' => 240,
                'description' => 'Dokumentasi prosesi siraman dan pengajian di rumah.',
                'features' => ['Foto & video', 'Foto unlimited', 'Cetak 80 4R', 'Album magnetic', 'Video cinematic', 'All file in flashdisk 16GB'],
                'is_popular' => false,
                'sort_order' => 13,
            ],
            [
                'name' => 'Siraman - Gedung Package',
                'slug' => 'siraman-gedung-package',
                'category' => 'Siraman',
                'price' => 3100000,
                'deposit_percentage' => 30,
                'duration_minutes' => 240,
                'description' => 'Dokumentasi prosesi siraman dan pengajian di gedung.',
                'features' => ['Foto & video', 'Foto unlimited', 'Cetak 80 4R', 'Album magnetic', 'Video cinematic', 'All file in flashdisk 16GB'],
                'is_popular' => false,
                'sort_order' => 14,
            ],

            // Akad Only
            [
                'name' => 'Akad Only - Foto & Video',
                'slug' => 'akad-only-foto-video',
                'category' => 'Akad Only',
                'price' => 3500000,
                'deposit_percentage' => 30,
                'duration_minutes' => 240,
                'description' => 'Dokumentasi akad nikah foto dan video cinematic.',
                'features' => ['1 fotografer', '4 hours on duty', '100 edited file', 'Video cinematic', 'Album magnetic', 'All file in flashdisk', 'Cetak 10RS 2 lembar'],
                'is_popular' => false,
                'sort_order' => 15,
            ],
            [
                'name' => 'Akad Only - Foto Saja',
                'slug' => 'akad-only-foto-saja',
                'category' => 'Akad Only',
                'price' => 1000000,
                'deposit_percentage' => 30,
                'duration_minutes' => 240,
                'description' => 'Dokumentasi akad nikah khusus foto.',
                'features' => ['1 fotografer', '4 hours on duty', '100 edited file', 'All file in google drive'],
                'is_popular' => false,
                'sort_order' => 16,
            ],

            // Graduation
            [
                'name' => 'Graduation - Only Photo',
                'slug' => 'graduation-only-photo',
                'category' => 'Graduation',
                'price' => 500000,
                'deposit_percentage' => 30,
                'duration_minutes' => 180,
                'description' => 'Sesi foto wisuda outdoor/kampus.',
                'features' => ['Foto unlimited', 'Edit all file', '3 hours on duty'],
                'is_popular' => false,
                'sort_order' => 17,
            ],
            [
                'name' => 'Graduation - Photo & Studio',
                'slug' => 'graduation-photo-studio',
                'category' => 'Graduation',
                'price' => 800000,
                'deposit_percentage' => 30,
                'duration_minutes' => 180,
                'description' => 'Sesi foto wisuda lengkap dengan pemakaian Studio MJ.',
                'features' => ['Foto unlimited', 'Edit all file', '3 hours on duty', 'Studio MJ'],
                'is_popular' => false,
                'sort_order' => 18,
            ],
        ];

        foreach ($packages as $package) {
            Package::updateOrCreate(
                ['slug' => $package['slug']],
                [
                    'name' => $package['name'],
                    'category' => $package['category'],
                    'price' => $package['price'],
                    'deposit_percentage' => $package['deposit_percentage'],
                    'duration_minutes' => $package['duration_minutes'],
                    'description' => $package['description'],
                    'features' => $package['features'],
                    'badge' => $package['badge'] ?? null,
                    'is_active' => true,
                    'is_popular' => $package['is_popular'],
                    'sort_order' => $package['sort_order'],
                ]
            );
        }
    }
}
