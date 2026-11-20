@extends('layouts.app')

@section('title', 'Pembayaran Pesanan')
@section('meta_description', 'Selesaikan pembayaran booking fotografi MujaPhotography melalui Midtrans Snap.')

@push('page_styles')
    <link rel="stylesheet" href="{{ asset('booking.css') }}">
@endpush

@section('content')
    @include('partials.site-header')

    <main class="booking-page">
        <div class="booking-page__bg" aria-hidden="true">
            <img src="{{ asset('SCRL_0046.webp') }}" alt="" loading="lazy">
        </div>

        <div class="booking-wrap booking-wrap--narrow">
            <div class="booking-header">
                <span class="section-label">Invoice Pembayaran</span>
                <h1 class="booking-title">
                    Selesaikan <em>Pembayaran</em>
                </h1>
                <div class="gold-line gold-line--center"></div>
                <p class="booking-subtitle">
                    Kode Booking: <strong style="color: #e8d5b0;">{{ $booking->booking_code }}</strong>
                    · Invoice: <strong style="color: #e8d5b0;">{{ $payment->invoice_number }}</strong>
                </p>
            </div>

            <div class="booking-card">
                <!-- Status Badge -->
                <div class="invoice-head">
                    <div>
                        <p class="invoice-info-title">Status Pembayaran</p>
                        <p class="invoice-info-main">
                            @if ($payment->status === 'paid')
                                Pembayaran Lunas
                            @elseif ($payment->status === 'expired')
                                Tagihan Kadaluarsa
                            @elseif ($payment->status === 'failed')
                                Pembayaran Gagal
                            @else
                                Menunggu Pembayaran
                            @endif
                        </p>
                    </div>
                    <span class="invoice-badge {{ $payment->status === 'paid' ? 'invoice-badge--paid' : '' }}">
                        {{ strtoupper($payment->status) }}
                    </span>
                </div>

                <!-- Detail Pemesan & Paket -->
                <div class="invoice-grid">
                    <div>
                        <p class="invoice-info-title">Data Pemesan</p>
                        <p class="invoice-info-main">{{ $booking->customer->name }}</p>
                        <p class="invoice-info-sub">{{ $booking->customer->phone }} · {{ $booking->customer->email }}</p>
                        <p class="invoice-info-sub">{{ $booking->customer->address }}</p>
                    </div>

                    <div>
                        <p class="invoice-info-title">Detail Paket &amp; Sesi</p>
                        <p class="invoice-info-main">{{ $booking->package?->name ?? 'Paket Studio' }}</p>
                        <p class="invoice-info-sub">
                            Tanggal: {{ $booking->session_date->translatedFormat('d M Y') }} ({{ $booking->start_time }} WIB)
                        </p>
                        <p class="invoice-info-sub">
                            Tipe: {{ $payment->payment_type === 'deposit' ? 'Down Payment (DP)' : 'Pelunasan Penuh' }}
                        </p>
                    </div>
                </div>

                <!-- Nominal -->
                <div class="invoice-amount-box">
                    <div>
                        <p class="invoice-info-title" style="margin-bottom: 0.2rem;">Total Tagihan Sekarang</p>
                        <p class="invoice-info-sub">Dari total harga paket Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                    </div>
                    <div class="booking-summary-total__amount">
                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                    </div>
                </div>

                @if ($snapError)
                    <div class="booking-alert">
                        {{ $snapError }}
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="invoice-actions">
                    @if ($payment->status === 'pending' && $snapToken)
                        <button id="pay-button" type="button" class="booking-submit-btn" style="margin-top: 0;">
                            Bayar Sekarang via Midtrans
                        </button>
                    @endif

                    <a href="{{ route('status', ['kode' => $booking->booking_code]) }}" class="booking-ghost-btn">
                        Cek Status Pesanan
                    </a>
                </div>
            </div>
        </div>
    </main>

    @include('partials.site-footer')
@endsection

@if ($payment->status === 'pending' && $snapToken)
    @push('scripts')
        @php
            $snapUrl = config('services.midtrans.is_production')
                ? 'https://app.midtrans.com/snap/snap.js'
                : 'https://app.sandbox.midtrans.com/snap/snap.js';
        @endphp
        <script src="{{ $snapUrl }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const payButton = document.getElementById('pay-button');
                if (!payButton) return;

                payButton.addEventListener('click', function () {
                    window.snap.pay(@json($snapToken), {
                        onSuccess: function () {
                            window.location.href = @json(route('status', ['kode' => $booking->booking_code]));
                        },
                        onPending: function () {
                            window.location.href = @json(route('status', ['kode' => $booking->booking_code]));
                        },
                        onError: function () {
                            alert('Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
                        },
                        onClose: function () {
                            // User menutup popup tanpa menyelesaikan pembayaran
                        }
                    });
                });
            });
        </script>
    @endpush
@endif
