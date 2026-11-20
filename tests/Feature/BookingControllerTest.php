<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Package;
use App\Models\Payment;
use App\Services\MidtransService;
use Database\Seeders\PackageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Tests\TestCase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_paket_page_links_packages_to_booking_form_with_paket_query(): void
    {
        $response = $this->get(route('paket'));

        $response->assertOk();
        $response->assertSee(route('booking', ['paket' => 'wedding-rumah-gold']), false);
        $response->assertSee(route('booking', ['paket' => 'graduation-only-photo']), false);
    }

    public function test_booking_form_renders_and_preselects_package_from_query_parameter(): void
    {
        $this->seed(PackageSeeder::class);

        $response = $this->get(route('booking', ['paket' => 'wedding-rumah-gold']));

        $response->assertOk();
        $response->assertSee('Lengkapi Data');
        $response->assertSee('Wedding Rumah - Gold');
        $response->assertSee('name="name"', false);
        $response->assertSee('name="phone"', false);
        $response->assertSee('name="email"', false);
        $response->assertSee('name="address"', false);
    }

    public function test_booking_submission_validates_required_customer_fields(): void
    {
        $response = $this->post(route('booking.store'), []);

        $response->assertSessionHasErrors([
            'package_id',
            'name',
            'phone',
            'email',
            'address',
            'session_date',
            'start_time',
            'payment_type',
        ]);
    }

    public function test_booking_submission_creates_customer_booking_and_deposit_payment_then_redirects_to_pay_page(): void
    {
        $package = Package::factory()->create([
            'name' => 'Wedding Rumah - Gold',
            'slug' => 'wedding-rumah-gold',
            'price' => 5000000,
            'deposit_percentage' => 30,
            'duration_minutes' => 120,
        ]);

        $response = $this->post(route('booking.store'), [
            'package_id' => $package->id,
            'name' => 'Budi Santoso',
            'phone' => '081234567890',
            'email' => 'budi@example.com',
            'address' => 'Jl. Ahmad Yani No. 10, Surabaya',
            'instagram' => '@budisantoso',
            'session_date' => now()->addDays(5)->format('Y-m-d'),
            'start_time' => '09:00',
            'payment_type' => 'deposit',
            'notes' => 'Mohon datang 30 menit lebih awal.',
        ]);

        $booking = Booking::query()->firstOrFail();

        $response->assertRedirect(route('booking.pay', $booking->booking_code));

        $this->assertDatabaseHas(Customer::class, [
            'name' => 'Budi Santoso',
            'phone' => '081234567890',
            'email' => 'budi@example.com',
            'address' => 'Jl. Ahmad Yani No. 10, Surabaya',
        ]);

        $this->assertSame(5000000, $booking->total_price);
        $this->assertSame(1500000, $booking->deposit_amount);
        $this->assertSame('11:00', $booking->end_time);
        $this->assertSame('pending', $booking->status);

        $this->assertDatabaseHas(Payment::class, [
            'booking_id' => $booking->id,
            'amount' => 1500000,
            'payment_type' => 'deposit',
            'status' => 'pending',
        ]);
    }

    public function test_booking_submission_with_full_payment_creates_full_amount_payment(): void
    {
        $package = Package::factory()->create([
            'price' => 2500000,
            'deposit_percentage' => 30,
        ]);

        $this->post(route('booking.store'), [
            'package_id' => $package->id,
            'name' => 'Siti Aminah',
            'phone' => '089876543210',
            'email' => 'siti@example.com',
            'address' => 'Jl. Diponegoro No. 5, Sidoarjo',
            'session_date' => now()->addDays(7)->format('Y-m-d'),
            'start_time' => '10:00',
            'payment_type' => 'full',
        ]);

        $payment = Payment::query()->firstOrFail();
        $this->assertSame(2500000, $payment->amount);
        $this->assertSame('full', $payment->payment_type);
    }

    public function test_pay_page_renders_snap_button_when_midtrans_returns_snap_token(): void
    {
        $booking = Booking::factory()->create(['status' => 'pending']);
        $payment = Payment::factory()->create([
            'booking_id' => $booking->id,
            'amount' => 1500000,
            'status' => 'pending',
            'reference_id' => null,
            'paid_at' => null,
        ]);

        $this->mock(MidtransService::class, function (MockInterface $mock): void {
            $mock->shouldReceive('createSnapToken')
                ->once()
                ->andReturn('fake-snap-token-abc123');
        });

        $response = $this->get(route('booking.pay', $booking->booking_code));

        $response->assertOk();
        $response->assertSee($booking->booking_code);
        $response->assertSee($payment->invoice_number);
        $response->assertSee('Bayar Sekarang via Midtrans');
        $response->assertSee('fake-snap-token-abc123');
    }

    public function test_status_page_displays_booking_details_when_valid_code_is_provided(): void
    {
        $booking = Booking::factory()->create([
            'booking_code' => 'BK-20261120-TEST',
            'status' => 'confirmed',
        ]);

        $response = $this->get(route('status', ['kode' => 'BK-20261120-TEST']));

        $response->assertOk();
        $response->assertSee('BK-20261120-TEST');
        $response->assertSee('Terkonfirmasi');
        $response->assertSee($booking->customer->name);
    }
}
