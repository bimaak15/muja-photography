<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'position' => 1,
                'title' => 'Graduation Portrait',
                'category' => 'Graduation',
                'image_path' => 'img/hero/mjp_2866.webp',
                'alt_text' => 'Graduation Portrait in Studio',
            ],
            [
                'position' => 2,
                'title' => 'Studio Monochrome',
                'category' => 'Portrait',
                'image_path' => 'img/hero/mjp_2599.webp',
                'alt_text' => 'Studio Monochrome Portrait',
            ],
            [
                'position' => 3,
                'title' => 'Couple Elegant',
                'category' => 'Prewedding',
                'image_path' => 'img/hero/mjp_2862.webp',
                'alt_text' => 'Elegant Couple Session',
            ],
            [
                'position' => 4,
                'title' => 'Creative Fashion',
                'category' => 'Fashion',
                'image_path' => 'img/hero/mjp_2682.webp',
                'alt_text' => 'Creative Fashion Shoot',
            ],
            [
                'position' => 5,
                'title' => 'Classic Editorial',
                'category' => 'Editorial',
                'image_path' => 'img/hero/mjp_2614.webp',
                'alt_text' => 'Classic Editorial Lighting',
            ],
            [
                'position' => 6,
                'title' => 'Warm Portrait',
                'category' => 'Portrait',
                'image_path' => 'img/hero/mjp_2609.webp',
                'alt_text' => 'Warm Toned Portrait',
            ],
            [
                'position' => 7,
                'title' => 'Editorial Glamour',
                'category' => 'Editorial',
                'image_path' => 'img/hero/mjp_2866.webp',
                'alt_text' => 'Editorial Glamour',
            ],
            [
                'position' => 8,
                'title' => 'Minimalist Silhouette',
                'category' => 'Artistic',
                'image_path' => 'img/hero/mjp_2599.webp',
                'alt_text' => 'Minimalist Silhouette Shot',
            ],
            [
                'position' => 9,
                'title' => 'Golden Hour Magic',
                'category' => 'Prewedding',
                'image_path' => 'img/hero/mjp_2862.webp',
                'alt_text' => 'Golden Hour Magic Session',
            ],
            [
                'position' => 10,
                'title' => 'Vintage Aesthetic',
                'category' => 'Vintage',
                'image_path' => 'img/hero/mjp_2682.webp',
                'alt_text' => 'Vintage Aesthetic Mood',
            ],
            [
                'position' => 11,
                'title' => 'Fine Art Studio',
                'category' => 'Fine Art',
                'image_path' => 'img/hero/mjp_2614.webp',
                'alt_text' => 'Fine Art Studio Lighting',
            ],
            [
                'position' => 12,
                'title' => 'Modern Family',
                'category' => 'Family',
                'image_path' => 'img/hero/mjp_2609.webp',
                'alt_text' => 'Modern Family Portrait',
            ],
            [
                'position' => 13,
                'title' => 'High Key Beauty',
                'category' => 'Beauty',
                'image_path' => 'img/hero/mjp_2866.webp',
                'alt_text' => 'High Key Beauty Session',
            ],
            [
                'position' => 14,
                'title' => 'Urban Portrait',
                'category' => 'Urban',
                'image_path' => 'img/hero/mjp_2599.webp',
                'alt_text' => 'Urban Mood Portrait',
            ],
            [
                'position' => 15,
                'title' => 'Prewedding Serenity',
                'category' => 'Prewedding',
                'image_path' => 'img/hero/mjp_2862.webp',
                'alt_text' => 'Serene Prewedding Photo',
            ],
            [
                'position' => 16,
                'title' => 'Artistic Grain',
                'category' => 'Artistic',
                'image_path' => 'img/hero/mjp_2682.webp',
                'alt_text' => 'Artistic Film Grain',
            ],
            [
                'position' => 17,
                'title' => 'Cinematic Mood',
                'category' => 'Cinematic',
                'image_path' => 'img/hero/mjp_2614.webp',
                'alt_text' => 'Cinematic Moody Lighting',
            ],
        ];

        foreach ($items as $item) {
            GalleryItem::updateOrCreate(
                ['position' => $item['position']],
                [
                    'title' => $item['title'],
                    'category' => $item['category'],
                    'image_path' => $item['image_path'],
                    'alt_text' => $item['alt_text'],
                    'is_active' => true,
                    'sort_order' => $item['position'],
                ]
            );
        }
    }
}
