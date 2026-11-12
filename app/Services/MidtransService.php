<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class MidtransService
{
    /**
     * Inisialisasi konfigurasi kredensial dan preferensi Midtrans SDK.
     */
    public function __construct()
    {
        Config::$serverKey = (string) config('services.midtrans.server_key');
        Config::$isProduction = (bool) config('services.midtrans.is_production', false);
        Config::$isSanitized = (bool) config('services.midtrans.is_sanitized', true);
        Config::$is3ds = (bool) config('services.midtrans.is_3ds', true);
    }

    /**
     * Buat Snap Token untuk transaksi booking & pembayaran.
     */
    public function createSnapToken(Booking $booking, Payment $payment): string
    {
        $payload = $this->buildSnapPayload($booking, $payment);

        return Snap::getSnapToken($payload);
    }

    /**
     * Buat transaksi Snap dan kembalikan token beserta URL redirect-nya.
     *
     * @return array{token: string, redirect_url: string}
     */
    public function createTransaction(Booking $booking, Payment $payment): array
    {
        $payload = $this->buildSnapPayload($booking, $payment);
        $response = Snap::createTransaction($payload);

        return [
            'token' => (string) $response->token,
            'redirect_url' => (string) $response->redirect_url,
        ];
    }

    /**
     * Verifikasi keaslian signature key yang dikirim oleh notifikasi Webhook Midtrans.
     */
    public function isValidSignature(string $orderId, string $statusCode, string $grossAmount, string $signatureKey): bool
    {
        $serverKey = (string) config('services.midtrans.server_key');
        $expectedSignature = hash('sha512', $orderId.$statusCode.$grossAmount.$serverKey);

        return hash_equals($expectedSignature, $signatureKey);
    }

    /**
     * Cek status transaksi langsung ke server Midtrans berdasarkan Order ID (invoice number).
     */
    public function getTransactionStatus(string $orderId): object
    {
        return Transaction::status($orderId);
    }

    /**
     * Susun array payload sesuai spesifikasi Snap API Midtrans.
     *
     * @return array<string, mixed>
     */
    protected function buildSnapPayload(Booking $booking, Payment $payment): array
    {
        $customer = $booking->customer;
        $package = $booking->package;

        $paymentLabel = $payment->payment_type === 'deposit' ? 'DP' : 'Pelunasan';
        $packageName = $package?->name ?? 'Sesi Pemotretan Studio';

        return [
            'transaction_details' => [
                'order_id' => $payment->invoice_number,
                'gross_amount' => (int) $payment->amount,
            ],
            'customer_details' => [
                'first_name' => $customer?->name ?? 'Pelanggan',
                'email' => $customer?->email ?? 'pelanggan@example.com',
                'phone' => $customer?->phone ?? '',
            ],
            'item_details' => [
                [
                    'id' => $package !== null ? 'PKG-'.$package->id : 'CUSTOM-SESSION',
                    'price' => (int) $payment->amount,
                    'quantity' => 1,
                    'name' => 'Bayar '.$paymentLabel.' - '.substr($packageName, 0, 30),
                ],
            ],
        ];
    }
}
