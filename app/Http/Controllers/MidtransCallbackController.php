<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Services\MidtransService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MidtransCallbackController extends Controller
{
    /**
     * Tangani notifikasi webhook transaksi dari server Midtrans.
     */
    public function __invoke(Request $request, MidtransService $midtransService): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'order_id' => ['required', 'string'],
            'status_code' => ['required', 'string'],
            'gross_amount' => ['required', 'numeric'],
            'signature_key' => ['required', 'string'],
            'transaction_status' => ['required', 'string'],
            'fraud_status' => ['nullable', 'string'],
            'payment_type' => ['nullable', 'string'],
            'transaction_id' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Payload notifikasi tidak lengkap.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $orderId = (string) $request->input('order_id');
        $statusCode = (string) $request->input('status_code');
        $grossAmount = (string) $request->input('gross_amount');
        $signatureKey = (string) $request->input('signature_key');

        if (! $midtransService->isValidSignature($orderId, $statusCode, $grossAmount, $signatureKey)) {
            Log::warning('Midtrans callback ditolak karena signature tidak valid.', [
                'order_id' => $orderId,
            ]);

            return response()->json([
                'message' => 'Signature tidak valid.',
            ], 403);
        }

        $transactionStatus = (string) $request->input('transaction_status');
        $fraudStatus = (string) $request->input('fraud_status', '');
        $newPaymentStatus = $this->resolvePaymentStatus($transactionStatus, $fraudStatus);

        if ($newPaymentStatus === null) {
            return response()->json([
                'message' => 'Status transaksi tidak dikenali.',
            ], 422);
        }

        return DB::transaction(function () use ($request, $orderId, $grossAmount, $newPaymentStatus): JsonResponse {
            $payment = Payment::query()
                ->with('booking')
                ->where('invoice_number', $orderId)
                ->lockForUpdate()
                ->first();

            if ($payment === null) {
                return response()->json([
                    'message' => 'Data pembayaran tidak ditemukan.',
                ], 404);
            }

            $receivedAmount = (int) round((float) $grossAmount);

            if ($receivedAmount !== $payment->amount) {
                Log::warning('Midtrans callback nominal tidak cocok.', [
                    'order_id' => $orderId,
                    'expected_amount' => $payment->amount,
                    'received_amount' => $receivedAmount,
                ]);

                return response()->json([
                    'message' => 'Nominal pembayaran tidak sesuai.',
                ], 422);
            }

            if ($payment->status === 'paid' && ! in_array($newPaymentStatus, ['paid', 'refunded'], true)) {
                return response()->json([
                    'message' => 'Pembayaran sudah lunas sebelumnya.',
                ]);
            }

            $paymentType = (string) $request->input('payment_type', '');
            $transactionId = $request->input('transaction_id');

            $payment->update([
                'status' => $newPaymentStatus,
                'payment_method' => $this->mapPaymentMethod($paymentType, $payment->payment_method),
                'reference_id' => $transactionId !== null ? (string) $transactionId : $payment->reference_id,
                'paid_at' => $newPaymentStatus === 'paid' ? ($payment->paid_at ?? now()) : $payment->paid_at,
            ]);

            if ($newPaymentStatus === 'paid' && $payment->booking !== null && $payment->booking->status === 'pending') {
                $payment->booking->update([
                    'status' => 'confirmed',
                ]);
            }

            return response()->json([
                'message' => 'Notifikasi pembayaran berhasil diproses.',
                'status' => $newPaymentStatus,
            ]);
        });
    }

    /**
     * Petakan status transaksi Midtrans menjadi status pembayaran internal.
     */
    protected function resolvePaymentStatus(string $transactionStatus, string $fraudStatus): ?string
    {
        return match ($transactionStatus) {
            'capture' => match ($fraudStatus) {
                'challenge' => 'challenge',
                'deny' => 'failed',
                default => 'paid',
            },
            'settlement' => 'paid',
            'pending' => 'pending',
            'deny', 'cancel' => 'failed',
            'expire' => 'expired',
            'refund', 'partial_refund' => 'refunded',
            default => null,
        };
    }

    /**
     * Petakan tipe pembayaran Midtrans agar konsisten dengan metode pembayaran internal.
     */
    protected function mapPaymentMethod(string $paymentType, string $fallbackMethod): string
    {
        if ($paymentType === '') {
            return $fallbackMethod;
        }

        return match ($paymentType) {
            'bank_transfer', 'echannel', 'permata' => 'bank_transfer',
            'qris', 'gopay', 'shopeepay' => 'qris',
            default => $paymentType,
        };
    }
}
