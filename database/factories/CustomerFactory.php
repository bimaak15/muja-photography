<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => '08'.fake()->numerify('##########'),
            'instagram' => '@'.fake()->userName(),
            'address' => fake()->address(),
            'total_bookings' => fake()->numberBetween(1, 5),
            'total_spend' => fake()->numberBetween(500000, 5000000),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
