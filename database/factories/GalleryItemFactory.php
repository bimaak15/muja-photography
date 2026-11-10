<?php

namespace Database\Factories;

use App\Models\GalleryItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GalleryItem>
 */
class GalleryItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'position' => fake()->unique()->numberBetween(1, 17),
            'title' => fake()->sentence(3),
            'category' => fake()->randomElement(['Graduation', 'Portrait', 'Prewedding', 'Editorial']),
            'image_path' => 'img/hero/mjp_2866.webp',
            'alt_text' => fake()->sentence(3),
            'is_active' => true,
            'sort_order' => 1,
        ];
    }
}
