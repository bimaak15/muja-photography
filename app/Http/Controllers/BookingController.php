<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Package;
use App\Models\Payment;
use App\Services\MidtransService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class BookingController extends Controller
{
    /**
     * Tampilkan formulir pemesanan paket beserta ringkasan harga.
     */
    public function create(Request $request): View
    {
        $packages = Package::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $selectedSlug = $request->string('paket')->toString();
        $selectedPackage = $selectedSlug !== ''
            ? $packages->firstWhere('slug', $selectedSlug)
            : $packages->first();

        if ($selectedPackage === null) {
            $selectedPackage = $packages->first();
        }

        return view('booking', compact('packages', 'selectedPackage'));
    }

    /**
     * Simpan data pelanggan, booking, dan tagihan pembayaran awal lalu arahkan ke halaman Snap.
     */
    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $package = Package::query()->findOrFail($validated['package_id']);

        $booking = DB::transaction(function () use ($validated, $package): Booking {
            $customer = Customer::query()
                ->where('phone', $validated['phone'])
                ->orWhere('email', $validated['email'])
                ->first();

            if ($customer === null) {
                $customer = Customer::query()->create([
                    'name' => $validated['name'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'address' => $validated['address'],
                    'instagram' => $validated['instagram'] ?? null,
                ]);
            } else {
                $customer->update([
                    'name' => $validated['name'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'address' => $validated['address'],
                    'instagram' => $validated['instagram'] ?? $customer->instagram,
                ]);
            }

            $totalPrice = $package->price;
            $depositAmount = (int) round($totalPrice * ($package->deposit_percentage / 100));
            $paymentAmount = $validated['payment_type'] === 'deposit' ? $depositAmount : $totalPrice;

            $endTime = Carbon::createFromFormat('H:i', $validated['start_time'])
                ->addMinutes($package->duration_minutes)
                ->format('H:i');

            $booking = Booking::query()->create([
                'booking_code' => 'BK-'.date('Ymd').'-'.strtoupper(Str::random(4)),
                'customer_id' => $customer->id,
                'package_id' => $package->id,
                'session_date' => $validated['session_date'],
                'start_time' => $validated['start_time'],
                'end_time' => $endTime,
                'studio_room' => str_contains(strtolower($package->category), 'gedung') ? 'Gedung / Venue' : 'Studio / Lokasi',
                'total_price' => $totalPrice,
                'deposit_amount' => $depositAmount,
                'status' => 'pending',
                'notes' => $validated['notes'] ?? null,
            ]);

            Payment::query()->create([
                'booking_id' => $booking->id,
                'invoice_number' => 'INV-'.date('Ymd').'-'.strtoupper(Str::random(4)),
                'amount' => $paymentAmount,
                'payment_type' => $validated['payment_type'],
                'payment_method' => 'midtrans',
                'status' => 'pending',
            ]);

            return $booking;
        });

        return redirect()->route('booking.pay', $booking->booking_code);
    }

    /**
     * Tampilkan halaman pembayaran Midtrans Snap untuk booking tertentu.
     */
    public function pay(Booking $booking, MidtransService $midtransService): View
    {
        $booking->load(['customer', 'package', 'payments']);
        $payment = $booking->payments()->latest('id')->firstOrFail();

        $snapToken = null;
        $snapError = null;

        if ($payment->status === 'pending') {
            if (! empty($payment->reference_id)) {
                $snapToken = $payment->reference_id;
            } else {
                try {
                    $snapToken = $midtransService->createSnapToken($booking, $payment);
                    $payment->update(['reference_id' => $snapToken]);
                } catch (Throwable $e) {
                    Log::error('Gagal membuat Snap Token Midtrans.', [
                        'booking_code' => $booking->booking_code,
                        'invoice_number' => $payment->invoice_number,
                        'error' => $e->getMessage(),
                    ]);
                    $snapError = 'Gagal terhubung ke layanan pembayaran Midtrans. Silakan muat ulang halaman atau coba beberapa saat lagi.';
                }
            }
        }

        return view('booking-pay', compact('booking', 'payment', 'snapToken', 'snapError'));
    }

    /**
     * Tampilkan halaman cek status pesanan berdasarkan kode booking.
     */
    public function status(Request $request): View
    {
        $kode = trim($request->string('kode')->toString());
        $booking = null;

        if ($kode !== '') {
            $booking = Booking::query()
                ->with(['customer', 'package', 'payments'])
                ->where('booking_code', $kode)
                ->first();
        }

        return view('status', compact('booking', 'kode'));
    }
}
