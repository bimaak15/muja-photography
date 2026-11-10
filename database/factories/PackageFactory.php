<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Graduation Studio Special',
            'Portrait Premium Solo',
            'Couple Studio Editorial',
            'Prewedding Intimate Gold',
            'Family Warm Reunion',
            'Creative Fashion Editorial',
            'Personal Branding Executive',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'category' => fake()->randomElement(['Graduation', 'Portrait', 'Prewedding', 'Family', 'Fashion']),
            'price' => fake()->randomElement([350000, 500000, 750000, 1200000, 2500000]),
            'deposit_percentage' => 30,
            'duration_minutes' => fake()->randomElement([45, 60, 90, 120]),
            'description' => fake()->paragraph(),
            'features' => [
                'All Soft Files via Google Drive',
                'Color Grading Eksklusif 10 Foto',
                '3 Cetak Foto 4R + Frame Minimalis',
                '1 Konsep Studio Setup',
            ],
            'cover_image' => 'img/hero/mjp_2866.webp',
            'badge' => fake()->randomElement(['Best Seller', 'Popular', null]),
            'is_active' => true,
            'is_popular' => fake()->boolean(40),
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
