<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MidtransCallbackControllerTest extends TestCase
{
    use RefreshDatabase;

    private string $serverKey = 'SB-Mid-server-test-key';

    protected function setUp(): void
    {
        parent::setUp();

        config(['services.midtrans.server_key' => $this->serverKey]);
    }

    public function test_rejects_incomplete_payload_with_422(): void
    {
        $response = $this->postJson(route('midtrans.callback'), []);

        $response->assertUnprocessable();
        $response->assertJsonValidationErrors([
            'order_id',
            'status_code',
            'gross_amount',
            'signature_key',
            'transaction_status',
        ]);
    }

    public function test_rejects_invalid_signature_with_403_and_leaves_payment_unchanged(): void
    {
        $booking = Booking::factory()->create(['status' => 'pending']);
        $payment = Payment::factory()->create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-20261112-0001',
            'amount' => 250000,
            'status' => 'pending',
            'paid_at' => null,
        ]);

        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => 'INV-20261112-0001',
            'status_code' => '200',
            'gross_amount' => '250000.00',
            'signature_key' => 'invalid-signature',
            'transaction_status' => 'settlement',
        ]);

        $response->assertForbidden();
        $payment->refresh();
        $booking->refresh();
        $this->assertSame('pending', $payment->status);
        $this->assertSame('pending', $booking->status);
    }

    public function test_returns_404_when_payment_invoice_is_not_found(): void
    {
        $orderId = 'INV-UNKNOWN-9999';
        $statusCode = '200';
        $grossAmount = '250000.00';

        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => $orderId,
            'status_code' => $statusCode,
            'gross_amount' => $grossAmount,
            'signature_key' => $this->makeSignature($orderId, $statusCode, $grossAmount),
            'transaction_status' => 'settlement',
        ]);

        $response->assertNotFound();
    }

    public function test_rejects_amount_mismatch_with_422_and_leaves_payment_unchanged(): void
    {
        $booking = Booking::factory()->create(['status' => 'pending']);
        $payment = Payment::factory()->create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-20261112-0002',
            'amount' => 300000,
            'status' => 'pending',
            'paid_at' => null,
        ]);

        $grossAmount = '150000.00';

        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => $payment->invoice_number,
            'status_code' => '200',
            'gross_amount' => $grossAmount,
            'signature_key' => $this->makeSignature($payment->invoice_number, '200', $grossAmount),
            'transaction_status' => 'settlement',
        ]);

        $response->assertUnprocessable();
        $payment->refresh();
        $this->assertSame('pending', $payment->status);
    }

    public function test_settlement_notification_marks_payment_paid_and_confirms_booking(): void
    {
        $booking = Booking::factory()->create(['status' => 'pending']);
        $payment = Payment::factory()->create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-20261112-0003',
            'amount' => 225000,
            'payment_method' => 'qris',
            'status' => 'pending',
            'reference_id' => null,
            'paid_at' => null,
        ]);

        $grossAmount = '225000.00';

        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => $payment->invoice_number,
            'status_code' => '200',
            'gross_amount' => $grossAmount,
            'signature_key' => $this->makeSignature($payment->invoice_number, '200', $grossAmount),
            'transaction_status' => 'settlement',
            'payment_type' => 'bank_transfer',
            'transaction_id' => 'midtrans-tx-12345',
        ]);

        $response->assertOk();
        $response->assertJson(['status' => 'paid']);

        $payment->refresh();
        $booking->refresh();
        $this->assertSame('paid', $payment->status);
        $this->assertSame('bank_transfer', $payment->payment_method);
        $this->assertSame('midtrans-tx-12345', $payment->reference_id);
        $this->assertNotNull($payment->paid_at);
        $this->assertSame('confirmed', $booking->status);
    }

    public function test_capture_with_accept_fraud_status_marks_payment_paid_and_confirms_booking(): void
    {
        $booking = Booking::factory()->create(['status' => 'pending']);
        $payment = Payment::factory()->create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-20261112-0004',
            'amount' => 500000,
            'status' => 'pending',
            'paid_at' => null,
        ]);

        $grossAmount = '500000.00';

        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => $payment->invoice_number,
            'status_code' => '200',
            'gross_amount' => $grossAmount,
            'signature_key' => $this->makeSignature($payment->invoice_number, '200', $grossAmount),
            'transaction_status' => 'capture',
            'fraud_status' => 'accept',
            'payment_type' => 'credit_card',
            'transaction_id' => 'midtrans-cc-999',
        ]);

        $response->assertOk();
        $payment->refresh();
        $booking->refresh();
        $this->assertSame('paid', $payment->status);
        $this->assertSame('credit_card', $payment->payment_method);
        $this->assertSame('confirmed', $booking->status);
    }

    public function test_expire_notification_marks_payment_expired_and_keeps_booking_pending(): void
    {
        $booking = Booking::factory()->create(['status' => 'pending']);
        $payment = Payment::factory()->create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-20261112-0005',
            'amount' => 250000,
            'status' => 'pending',
            'paid_at' => null,
        ]);

        $grossAmount = '250000.00';

        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => $payment->invoice_number,
            'status_code' => '202',
            'gross_amount' => $grossAmount,
            'signature_key' => $this->makeSignature($payment->invoice_number, '202', $grossAmount),
            'transaction_status' => 'expire',
            'payment_type' => 'gopay',
        ]);

        $response->assertOk();
        $response->assertJson(['status' => 'expired']);

        $payment->refresh();
        $booking->refresh();
        $this->assertSame('expired', $payment->status);
        $this->assertSame('qris', $payment->payment_method);
        $this->assertNull($payment->paid_at);
        $this->assertSame('pending', $booking->status);
    }

    public function test_does_not_downgrade_already_paid_payment_on_pending_webhook(): void
    {
        $booking = Booking::factory()->create(['status' => 'confirmed']);
        $payment = Payment::factory()->create([
            'booking_id' => $booking->id,
            'invoice_number' => 'INV-20261112-0006',
            'amount' => 450000,
            'status' => 'paid',
            'paid_at' => now(),
        ]);

        $grossAmount = '450000.00';

        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => $payment->invoice_number,
            'status_code' => '201',
            'gross_amount' => $grossAmount,
            'signature_key' => $this->makeSignature($payment->invoice_number, '201', $grossAmount),
            'transaction_status' => 'pending',
        ]);

        $response->assertOk();
        $payment->refresh();
        $this->assertSame('paid', $payment->status);
    }

    private function makeSignature(string $orderId, string $statusCode, string $grossAmount): string
    {
        return hash('sha512', $orderId.$statusCode.$grossAmount.$this->serverKey);
    }
}
