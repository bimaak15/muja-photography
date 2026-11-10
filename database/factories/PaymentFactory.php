<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
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
            'invoice_number' => 'INV-'.date('Ymd').'-'.fake()->unique()->numerify('####'),
            'amount' => fake()->randomElement([250000, 350000, 500000, 750000]),
            'payment_type' => fake()->randomElement(['deposit', 'full', 'settlement']),
            'payment_method' => fake()->randomElement(['qris', 'bank_transfer', 'va', 'cash']),
            'status' => 'paid',
            'reference_id' => 'REF-'.fake()->numerify('######'),
            'paid_at' => now(),
        ];
    }
}
