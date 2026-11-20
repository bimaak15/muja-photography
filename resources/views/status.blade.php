@extends('layouts.app')

@section('title', 'Cek Status Pesanan')
@section('meta_description', 'Lacak status booking dan pembayaran Anda di MujaPhotography menggunakan kode booking.')

@push('page_styles')
    <link rel="stylesheet" href="{{ asset('booking.css') }}">
@endpush

@section('content')
    @include('partials.site-header')

    <main class="booking-page">
        <div class="booking-page__bg" aria-hidden="true">
            <img src="{{ asset('SCRL_0052.webp') }}" alt="" loading="lazy">
        </div>

        <div class="booking-wrap booking-wrap--narrow">
            <div class="booking-header">
                <span class="section-label">Lacak Pesanan</span>
                <h1 class="booking-title">
                    Status <em>Booking</em> Anda
                </h1>
                <div class="gold-line gold-line--center"></div>
                <p class="booking-subtitle">
                    Masukkan kode booking (contoh: <strong style="color: #e8d5b0;">BK-20261120-XXXX</strong>) untuk melihat progres reservasi dan pembayaran.
                </p>
            </div>

            <form method="GET" action="{{ route('status') }}" class="status-search-form">
                <input type="text"
                       name="kode"
                       value="{{ $kode }}"
                       placeholder="Masukkan kode booking..."
                       required
                       class="booking-input">
                <button type="submit" class="booking-submit-btn">
                    Cek Status
                </button>
            </form>

            @if ($kode !== '' && $booking === null)
                <div class="booking-alert" style="text-align: center;">
                    Kode booking <strong>{{ $kode }}</strong> tidak ditemukan. Periksa kembali kode Anda.
                </div>
            @elseif ($booking !== null)
                @php
                    $latestPayment = $booking->payments->sortByDesc('id')->first();
                @endphp
                <div class="booking-card">
                    <div class="invoice-head">
                        <div>
                            <p class="invoice-info-title">Kode Booking</p>
                            <h2 class="booking-section-title">{{ $booking->booking_code }}</h2>
                        </div>
                        <span class="invoice-badge {{ $booking->status === 'confirmed' ? 'invoice-badge--paid' : '' }}">
                            {{ $booking->status === 'confirmed' ? 'Terkonfirmasi' : ucfirst($booking->status) }}
                        </span>
                    </div>

                    <div class="invoice-grid">
                        <div>
                            <p class="invoice-info-title">Nama Pemesan</p>
                            <p class="invoice-info-main">{{ $booking->customer->name }}</p>
                        </div>
                        <div>
                            <p class="invoice-info-title">Paket</p>
                            <p class="invoice-info-main">{{ $booking->package?->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="invoice-info-title">Jadwal Sesi</p>
                            <p class="invoice-info-main">{{ $booking->session_date->translatedFormat('d M Y') }} · {{ $booking->start_time }} WIB</p>
                        </div>
                        <div>
                            <p class="invoice-info-title">Status Pembayaran</p>
                            <p class="invoice-info-main" style="color: #e8d5b0;">
                                {{ $latestPayment ? strtoupper($latestPayment->status).' (Rp '.number_format($latestPayment->amount, 0, ',', '.').')' : 'Belum ada tagihan' }}
                            </p>
                        </div>
                    </div>

                    @if ($latestPayment && $latestPayment->status === 'pending')
                        <a href="{{ route('booking.pay', $booking->booking_code) }}" class="booking-submit-btn">
                            Lanjutkan Pembayaran
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </main>

    @include('partials.site-footer')
@endsection
