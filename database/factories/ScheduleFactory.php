<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'title' => fake()->sentence(3),
            'session_type' => fake()->randomElement(['client', 'internal', 'maintenance']),
            'date' => fake()->dateTimeBetween('now', '+2 weeks')->format('Y-m-d'),
            'start_time' => '13:00',
            'end_time' => '14:30',
            'studio_room' => fake()->randomElement(['Studio A', 'Studio B']),
            'photographer_name' => fake()->randomElement(['Muja (Lead)', 'Fajar (Photographer)']),
            'crew_name' => fake()->randomElement(['Rian (Lighting)', 'Bayu (Assistant)']),
            'status' => 'scheduled',
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
