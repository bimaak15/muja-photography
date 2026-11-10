<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->randomElement([450000, 750000, 1200000]);

        return [
            'booking_code' => 'BK-'.fake()->unique()->numerify('####'),
            'customer_id' => Customer::factory(),
            'package_id' => Package::factory(),
            'session_date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'start_time' => '10:00',
            'end_time' => '11:00',
            'studio_room' => fake()->randomElement(['Studio A', 'Studio B', 'Outdoor Garden']),
            'photographer_name' => fake()->randomElement(['Muja (Lead)', 'Fajar (Photographer)', 'Dian (Photographer)']),
            'total_price' => $price,
            'deposit_amount' => (int) ($price * 0.3),
            'status' => fake()->randomElement(['pending', 'confirmed', 'completed']),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
