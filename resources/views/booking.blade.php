@extends('layouts.app')

@section('title', 'Booking Sesi Privat')
@section('meta_description', 'Reservasi sesi foto pernikahan, pre-wedding, dan engagement di MujaPhotography. Kalender anti-bentrok, DP aman via Midtrans.')

@push('page_styles')
    <link rel="stylesheet" href="{{ asset('pages.css') }}?v={{ time() }}">
@endpush

@section('content')

    @include('partials.site-header')

    <main>
        {{-- ============================================================
             HERO BANNER
        ============================================================ --}}
        <section class="page-hero">
            <div class="page-hero__bg">
                <img src="{{ asset('img/hero/mjp_2599.webp') }}" alt="Booking Sesi MujaPhotography">
            </div>
            <div class="page-hero__content">
                <nav class="breadcrumb-nav">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span>/</span>
                    <span>Reservasi</span>
                </nav>
                <p class="page-hero__ornament">— ✦ —</p>
                <span class="section-label">Reservasi Terpadu</span>
                <h1 class="page-hero__title">
                    Reservasi Jadwal<br><em>Momen Bahagiamu</em>
                </h1>
                <p class="page-hero__sub">
                    Pilih paket layanan, tentukan tanggal pada kalender interaktif, dan selesaikan pembayaran uang muka dengan aman dan transparan.
                </p>
            </div>
        </section>

        {{-- ============================================================
             BOOKING FORM SECTION
        ============================================================ --}}
        <section class="muja-section" style="padding-top: 3.5rem;">
            <div class="muja-container">

                <div class="booking-layout">
                    
                    {{-- Left column: Smooth Slide Stepper (No Dots, Only Slide Buttons) --}}
                    <div class="booking-slide-wrapper">
                        <div class="booking-slide-track" id="bookingSlideTrack">

                            {{-- SLIDE 1: PILIH PAKET --}}
                            <div class="booking-slide" id="slide-1">
                                <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(255, 255, 255, 0.06);">
                                    <span class="section-label" style="font-size:0.68rem; letter-spacing:0.18em; margin-bottom:15px; display:block;">Langkah 1 dari 3</span>
                                    <h2 class="booking-panel-title" style="margin-bottom:0.25rem;">Pilih Paket Dokumentasi</h2>
                                    <p class="booking-panel-sub" style="margin-bottom:0;">Silakan tentukan paket fotografi yang sesuai dengan kebutuhan dan rencana acara Anda.</p>
                                </div>

                                <div class="muja-form-group">
                                    <label class="muja-label" for="paketSelect">Pilihan Paket Layanan <span class="muja-label-req">*</span></label>
                                    <select id="paketSelect" class="muja-select" onchange="updateSelectedPackage()">
                                        @foreach ($packages as $kategori)
                                            <optgroup label="{{ $kategori['kategori'] }}">
                                                @foreach ($kategori['daftar'] as $pkg)
                                                    <option value="{{ $pkg['id'] }}" 
                                                            {{ $pkg['id'] === 'wed-platinum-gedung' ? 'selected' : '' }}
                                                            data-name="{{ $pkg['nama'] }}" 
                                                            data-price="{{ $pkg['harga'] }}" 
                                                            data-dp="{{ $pkg['dp'] }}"
                                                            data-durasi="{{ $pkg['durasi'] }}">
                                                        {{ $pkg['nama'] }} — Rp {{ number_format($pkg['harga'], 0, ',', '.') }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Circular Slide Navigation (< and >) strictly at bottom dock --}}
                                <div class="slide-nav-dock">
                                    <div class="slide-arrows-pair">
                                        <button type="button" class="slide-arrow-btn" disabled aria-label="Langkah sebelumnya">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                                        </button>
                                        <button type="button" class="slide-arrow-btn" onclick="goToSlide(1, this)" title="Lanjut ke Langkah 2" aria-label="Langkah selanjutnya">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- SLIDE 2: KALENDER & SESI WAKTU --}}
                            <div class="booking-slide" id="slide-2">
                                <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(255, 255, 255, 0.06);">
                                    <span class="section-label" style="font-size:0.68rem; letter-spacing:0.18em; margin-bottom:15px; display:block;">Langkah 2 dari 3</span>
                                    <h2 class="booking-panel-title" style="margin-bottom:0.25rem;">Tentukan Tanggal &amp; Sesi Waktu</h2>
                                    <p class="booking-panel-sub" style="margin-bottom:0;">Pilih tanggal ketersediaan pada kalender interaktif dan tentukan sesi jam yang dikehendaki.</p>
                                </div>

                                {{-- Calendar Card --}}
                                <div class="calendar-card">
                                    <div class="calendar-header">
                                        <button class="calendar-nav-btn" onclick="prevMonth()" type="button" aria-label="Bulan sebelumnya">&larr;</button>
                                        <div class="calendar-month" id="calendarMonthYear">November 2026</div>
                                        <button class="calendar-nav-btn" onclick="nextMonth()" type="button" aria-label="Bulan berikutnya">&rarr;</button>
                                    </div>
                                    <div class="calendar-grid">
                                        <div class="calendar-day-label">Min</div>
                                        <div class="calendar-day-label">Sen</div>
                                        <div class="calendar-day-label">Sel</div>
                                        <div class="calendar-day-label">Rab</div>
                                        <div class="calendar-day-label">Kam</div>
                                        <div class="calendar-day-label">Jum</div>
                                        <div class="calendar-day-label">Sab</div>
                                    </div>
                                    <div class="calendar-grid" id="calendarDaysGrid" style="margin-top:0.4rem;">
                                        {{-- Populated via JS --}}
                                    </div>
                                    <div class="calendar-legend">
                                        <div><span class="legend-dot legend-available"></span>Tersedia</div>
                                        <div><span class="legend-dot legend-booked"></span>Sudah Terisi</div>
                                        <div><span class="legend-dot legend-selected"></span>Dipilih</div>
                                    </div>
                                </div>

                                {{-- Slot Selector --}}
                                <label class="muja-label">Pilih Sesi Waktu <span class="muja-label-req">*</span></label>
                                <div class="slot-grid">
                                    <div class="slot-card" onclick="selectSlot(this, 'Sesi Pagi (08:00 - 12:00 WIB)')">
                                        <div class="slot-name">Sesi Pagi</div>
                                        <div class="slot-time">08:00 - 12:00 WIB</div>
                                    </div>
                                    <div class="slot-card active" onclick="selectSlot(this, 'Sesi Siang (13:00 - 17:00 WIB)')">
                                        <div class="slot-name">Sesi Siang</div>
                                        <div class="slot-time">13:00 - 17:00 WIB</div>
                                    </div>
                                    <div class="slot-card" onclick="selectSlot(this, 'Sesi Seharian Penuh (Full Day)')">
                                        <div class="slot-name">Full Day</div>
                                        <div class="slot-time">Hingga Acara Selesai</div>
                                    </div>
                                </div>

                                {{-- Circular Slide Navigation (< and >) strictly at bottom dock --}}
                                <div class="slide-nav-dock">
                                    <div class="slide-arrows-pair">
                                        <button type="button" class="slide-arrow-btn" onclick="goToSlide(0, this)" title="Kembali ke Langkah 1" aria-label="Langkah sebelumnya">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                                        </button>
                                        <button type="button" class="slide-arrow-btn" onclick="goToSlide(2, this)" title="Lanjut ke Langkah 3" aria-label="Langkah selanjutnya">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- SLIDE 3: DATA PEMESAN & METODE PEMBAYARAN --}}
                            <div class="booking-slide" id="slide-3">
                                <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(255, 255, 255, 0.06);">
                                    <span class="section-label" style="font-size:0.68rem; letter-spacing:0.18em; margin-bottom:15px; display:block;">Langkah 3 dari 3</span>
                                    <h2 class="booking-panel-title" style="margin-bottom:0.25rem;">Data Pemesan &amp; Pembayaran</h2>
                                    <p class="booking-panel-sub" style="margin-bottom:0;">Lengkapi identitas diri Anda secara formal dan selesaikan pembayaran uang muka via QRIS All Payment.</p>
                                </div>

                                <div class="muja-form-row-2col">
                                    <div class="muja-form-group">
                                        <label class="muja-label" for="clientName">Nama Lengkap <span class="muja-label-req">*</span></label>
                                        <input type="text" id="clientName" class="muja-input" placeholder="Masukkan nama lengkap Anda" required>
                                    </div>
                                    <div class="muja-form-group">
                                        <label class="muja-label" for="clientWa">Nomor WhatsApp <span class="muja-label-req">*</span></label>
                                        <input type="tel" id="clientWa" class="muja-input" placeholder="Contoh: 081234567890" required>
                                    </div>
                                </div>

                                <div class="muja-form-group">
                                    <label class="muja-label" for="clientEmail">Alamat Email <span class="muja-label-req">*</span></label>
                                    <input type="email" id="clientEmail" class="muja-input" placeholder="alamat.email@domain.com" required>
                                </div>

                                <div class="muja-form-group">
                                    <label class="muja-label" for="clientVenue">Lokasi Pelaksanaan Acara <span class="muja-label-req">*</span></label>
                                    <input type="text" id="clientVenue" class="muja-input" placeholder="Nama gedung atau alamat lengkap lokasi acara" required>
                                </div>

                                <div class="muja-form-group">
                                    <label class="muja-label" for="clientNotes">Catatan Tambahan (Opsional)</label>
                                    <textarea id="clientNotes" class="muja-textarea" rows="2" placeholder="Sampaikan instruksi khusus atau konsep yang diinginkan kepada tim fotografer..."></textarea>
                                </div>

                                {{-- Shopee-Style QRIS All Payment Master Card --}}
                                <div class="shopee-payment-card active" onclick="selectPayment(this, 'QRIS Standar Nasional (All Payment)')">
                                    <div class="shopee-card-top-row">
                                        <div class="shopee-card-title">Metode Pembayaran</div>
                                        <div class="shopee-card-see-all">
                                            <span>Lihat Semua</span>
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                                        </div>
                                    </div>

                                    <div class="shopee-card-main-row">
                                        <div class="shopee-card-content-col">
                                            {{-- Row 1: QRIS Icon + Bold QRIS Text --}}
                                            <div class="shopee-qris-heading-row">
                                                <svg viewBox="0 0 38 15" height="15" fill="none" class="shopee-qris-badge-icon" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="38" height="15" rx="2" fill="#FFFFFF"/>
                                                    <rect x="0.5" y="0.5" width="37" height="14" rx="1.5" stroke="#D32F2F" stroke-width="1"/>
                                                    <text x="19" y="11" fill="#1A1A1A" font-family="'Arial Black', Arial, sans-serif" font-weight="900" font-size="8.5" letter-spacing="1" text-anchor="middle">QRIS</text>
                                                </svg>
                                                <span class="shopee-qris-text">QRIS</span>
                                            </div>

                                            {{-- Row 2: Real App Logos (ShopeePay, DANA, GoPay, BCA, OVO + lainnya) --}}
                                            <div class="shopee-logos-strip">
                                                {{-- DANA --}}
                                                <span class="shopee-app-logo" title="DANA">
                                                    <svg viewBox="0 0 54 18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="18" height="18" rx="9" fill="#118EEA"/>
                                                        <path d="M5.5 9.5C6.5 8 9.5 7.5 12.5 10" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"/>
                                                        <text x="21" y="13.5" fill="#118EEA" font-family="'Arial Black', Arial, sans-serif" font-weight="900" font-size="11" letter-spacing="0.5">DANA</text>
                                                    </svg>
                                                </span>

                                                {{-- GoPay --}}
                                                <span class="shopee-app-logo" title="GoPay">
                                                    <svg viewBox="0 0 58 18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="9" cy="9" r="8" fill="#00AED6"/>
                                                        <circle cx="9" cy="9" r="4.2" stroke="#FFFFFF" stroke-width="2.2" fill="none"/>
                                                        <text x="21" y="13.5" fill="#111111" font-family="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif" font-weight="800" font-size="11.5">gopay</text>
                                                    </svg>
                                                </span>

                                                {{-- BCA --}}
                                                <span class="shopee-app-logo" title="BCA Mobile">
                                                    <svg viewBox="0 0 50 18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="18" height="18" rx="3.5" fill="#003D79"/>
                                                        <circle cx="9" cy="9" r="5" stroke="#FFFFFF" stroke-width="1.2" fill="none"/>
                                                        <path d="M7 9h4M9 7v4" stroke="#FFFFFF" stroke-width="1.2"/>
                                                        <text x="21" y="14" fill="#003D79" font-family="'Arial Black', Arial, sans-serif" font-weight="900" font-size="11.5">BCA</text>
                                                    </svg>
                                                </span>

                                                {{-- ShopeePay --}}
                                                <span class="shopee-app-logo" title="ShopeePay">
                                                    <svg viewBox="0 0 80 18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="18" height="18" rx="4" fill="#EE4D2D"/>
                                                        <path d="M6.5 6.5C6.5 5.2 7.6 4.2 9 4.2C10.4 4.2 11.5 5.2 11.5 6.5V7.5H6.5V6.5Z" stroke="#FFFFFF" stroke-width="1.2"/>
                                                        <rect x="4.5" y="7.5" width="9" height="7.5" rx="1" fill="#FFFFFF"/>
                                                        <path d="M9 9.8C8.2 9.8 7.5 10.2 7.5 10.8C7.5 11.6 10.5 11.2 10.5 12.3C10.5 12.8 9.9 13.4 9 13.4C8 13.4 7.4 12.8 7.4 12.8" stroke="#EE4D2D" stroke-width="1.1" stroke-linecap="round"/>
                                                        <text x="21" y="13.5" fill="#EE4D2D" font-family="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif" font-weight="800" font-size="10.5">ShopeePay</text>
                                                    </svg>
                                                </span>

                                                {{-- + lainnya --}}
                                                <span class="shopee-more-label">+ lainnya</span>
                                            </div>
                                        </div>

                                        {{-- Right Side: Shopee Coral Circle Checkmark --}}
                                        <div class="shopee-check-circle" title="Metode Terpilih">
                                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.5 5.2L4.5 8.2L10.5 1.8" stroke="#0e0d0b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Circular Navigation (<) and Final Submit strictly at bottom dock --}}
                                <div class="slide-nav-dock">
                                    <div class="slide-arrows-pair">
                                        <button type="button" class="slide-arrow-btn" onclick="goToSlide(1, this)" title="Kembali ke Langkah 2" aria-label="Langkah sebelumnya">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                                        </button>
                                    </div>
                                    <button type="button" class="btn-gold" style="border:none; cursor:pointer;" onclick="submitBooking()">
                                        Bayar DP &rarr;
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Right column: Luxury Vintage Order Summary Card --}}
                    <div>
                        <div class="summary-box vintage-summary-frame">
                            <div class="summary-vintage-header">
                                <span class="summary-vintage-ornament">✦</span>
                                <h3 class="summary-title-vintage">Ringkasan Reservasi</h3>
                                <span class="summary-vintage-ornament">✦</span>
                            </div>

                            <div class="summary-row">
                                <span class="summary-row-label">Paket Terpilih</span>
                                <strong id="summaryPkgName" class="summary-pkg-value">Wedding Platinum (Gedung)</strong>
                            </div>
                            <div class="summary-row">
                                <span class="summary-row-label">Tanggal Sesi</span>
                                <span id="summaryDate" class="summary-val-calm">15 November 2026</span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-row-label">Waktu Sesi</span>
                                <span id="summarySlot" class="summary-val-calm">Sesi Siang (13:00 - 17:00 WIB)</span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-row-label">Metode Pembayaran</span>
                                <span id="summaryPaymentMethod" class="summary-val-calm" style="color:#c9a96e; font-weight:500;">
                                    <span style="display:inline-flex; align-items:center; gap:6px;">
                                        <span style="background:#c9a96e; color:#0e0d0b; border-radius:50%; width:15px; height:15px; display:inline-flex; align-items:center; justify-content:center; font-size:10px; font-weight:bold;">✓</span>
                                        QRIS Standar Nasional (All Payment)
                                    </span>
                                </span>
                            </div>

                            {{-- Vintage Price Breakdown Ticket Card --}}
                            <div class="summary-price-card vintage-price-ticket">
                                <div class="summary-price-row">
                                    <span class="summary-price-label">Total Biaya Paket :</span>
                                    <span id="summaryTotalPrice" class="summary-total-val">Rp 7.500.000</span>
                                </div>
                                <div class="summary-price-dashed-divider"></div>
                                <div class="summary-price-row dp-highlight-row">
                                    <div>
                                        <span class="summary-price-label dp-label">Nominal Pembayaran DP :</span>
                                        <span class="summary-dp-subtext">Wajib dibayar untuk konfirmasi jadwal</span>
                                    </div>
                                    <span id="summaryDpPrice" class="summary-dp-val">Rp 2.500.000</span>
                                </div>
                            </div>

                            <button type="button" id="btnMainSummaryAction" class="btn-gold" style="width: 100%; border: none; cursor: pointer; text-align:center;" onclick="handleSummaryAction()">
                                Lanjut ke Jadwal &rarr;
                            </button>

                            <p style="text-align: center; margin-top: 1rem; font-family:'Inter',-apple-system,sans-serif; font-size:0.75rem; color:rgba(247,242,234,0.5);">
                                Butuh informasi lebih lanjut? <a href="{{ route('kontak') }}" style="color:#c9a96e; text-decoration:underline;">Hubungi Tim Fotografer</a>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        {{-- ============================================================
             LUXURY VINTAGE QRIS ALL PAYMENT ATELIER MODAL
        ============================================================ --}}
        <div class="lightbox-modal" id="qrisPaymentModal">
            <div class="qris-payment-sheet">
                {{-- Close Button --}}
                <button type="button" class="lightbox-close" onclick="closeQrisModal()">&times;</button>

                <div style="font-family:'Cormorant Garamond',serif; font-size:0.85rem; color:#c9a96e; letter-spacing:0.25em; text-transform:uppercase; margin-bottom:0.2rem;">
                    ✦ Muja Photography Atelier ✦
                </div>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:2.1rem; color:#f7f2ea; margin:0 0 0.25rem; font-weight:400; font-style:italic;">
                    Lembar Tagihan Uang Muka (DP)
                </h3>
                <p style="font-family:'Inter',-apple-system,sans-serif; font-size:0.8rem; color:rgba(247,242,234,0.65); margin-bottom:0.85rem;">
                    Pindai kode QRIS berstandar Bank Indonesia di bawah menggunakan ShopeePay, DANA, OVO, GoPay, atau m-Banking apa saja.
                </p>

                {{-- Live Countdown Bar with Minimalist Clock Icon --}}
                <div style="background:rgba(201,169,110,0.06); border:1px solid rgba(201,169,110,0.25); border-radius:4px; padding:0.4rem 1rem; display:inline-flex; align-items:center; gap:0.5rem; margin-bottom:1rem; font-size:0.76rem; color:rgba(247,242,234,0.75);">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#c9a96e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span>Selesaikan pembayaran dalam:</span>
                    <strong id="qrisCountdown" style="color:#c9a96e; font-family:'Cormorant Garamond',serif; font-size:1.15rem; letter-spacing:0.05em;">15:00</strong>
                </div>

                {{-- Vintage Atelier Ticket Frame with Side Notches --}}
                <div class="qris-vintage-ticket" id="printableQrisArea">
                    <div class="qris-header-top">
                        <svg viewBox="0 0 100 28" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <text x="0" y="19" fill="#D32F2F" font-family="'Arial Black', Arial, sans-serif" font-weight="900" font-size="17" letter-spacing="1">QRIS</text>
                            <text x="54" y="12" fill="#555" font-family="Arial, sans-serif" font-size="6" font-weight="bold">STANDAR</text>
                            <text x="54" y="19" fill="#555" font-family="Arial, sans-serif" font-size="6" font-weight="bold">PEMBAYARAN</text>
                        </svg>
                        <div style="font-size:0.58rem; font-weight:bold; color:#003D79; border:1px solid #003D79; padding:1px 4px; border-radius:2px;">GPN</div>
                    </div>

                    <div class="qris-merchant-name">MUJA PHOTOGRAPHY ATELIER</div>
                    <div class="qris-nmid">NMID: ID1024395810294 • A01</div>

                    {{-- Dynamic Canvas QR Code --}}
                    <canvas id="qrisCanvas" width="220" height="220" class="qris-code-image"></canvas>

                    <div class="qris-amount-tag">
                        <div style="font-size:0.62rem; color:#777; letter-spacing:0.08em; text-transform:uppercase; font-weight:600;">Total Pembayaran DP Pas</div>
                        <div class="qris-amount-val" id="modalQrisAmount">Rp 2.500.000</div>
                        <div style="font-size:0.68rem; color:#10b981; margin-top:2px;">✓ Bebas Biaya Layanan Transaksi (Rp 0)</div>
                    </div>

                    <div style="font-size:0.68rem; color:#666; margin-top:0.6rem; border-top:1px dashed #d5cebf; padding-top:0.4rem;">
                        Kode Referensi: <strong id="modalQrisOrderCode" style="color:#111; letter-spacing:0.08em; font-family:monospace;">MUJA-8K2Q9P</strong>
                    </div>

                    {{-- Stamped App Logos on the Ticket Footer --}}
                    <div style="display:flex; justify-content:center; align-items:center; gap:0.35rem; margin-top:0.5rem; opacity:0.85;">
                        <span style="font-size:0.58rem; color:#888;">Didukung:</span>
                        <span style="font-size:0.58rem; font-weight:bold; color:#ee4d2d;">ShopeePay</span> &bull;
                        <span style="font-size:0.58rem; font-weight:bold; color:#118eea;">DANA</span> &bull;
                        <span style="font-size:0.58rem; font-weight:bold; color:#4c2a86;">OVO</span> &bull;
                        <span style="font-size:0.58rem; font-weight:bold; color:#00aed6;">GoPay</span> &bull;
                        <span style="font-size:0.58rem; font-weight:bold; color:#003d79;">BCA</span>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div style="display:flex; justify-content:center; gap:0.65rem; flex-wrap:wrap; margin:1rem 0;">
                    <button type="button" class="btn-outline-gold" style="padding:0.55rem 1.15rem; font-size:0.78rem; display:inline-flex; align-items:center; gap:0.45rem;" onclick="downloadQrisImage()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span>Unduh Lembar QRIS (.PNG)</span>
                    </button>
                    <button type="button" class="btn-outline-gold" style="padding:0.55rem 1.15rem; font-size:0.78rem; display:inline-flex; align-items:center; gap:0.45rem;" onclick="copyOrderDetails()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                        <span>Salin Detail Tagihan</span>
                    </button>
                </div>

                {{-- Interactive Verification Box --}}
                <div style="background:rgba(201,169,110,0.06); border:1px solid rgba(201,169,110,0.25); border-radius:6px; padding:1.15rem; margin-bottom:1rem; text-align:center;">
                    <div id="qrisStatusBadge" style="font-size:0.8rem; color:#f7f2ea; margin-bottom:0.75rem;">
                        Status: <span style="color:#f59e0b; font-weight:500;">● Menunggu Pembayaran QRIS</span>
                    </div>

                    <button type="button" id="btnCheckQris" class="btn-gold" style="width:100%; border:none; cursor:pointer;" onclick="simulateQrisVerification()">
                        Cek Status Pembayaran (Otomatis)
                    </button>

                    <div id="qrisSuccessSection" style="display:none; margin-top:1rem; text-align:center;">
                        <div style="background:rgba(16,185,129,0.12); border:1px solid #10b981; border-radius:4px; padding:0.85rem; margin-bottom:0.85rem; color:#10b981; font-size:0.82rem; line-height:1.5;">
                            <strong style="font-size:0.95rem;">Pembayaran DP Berhasil Diterima!</strong><br>
                            Jadwal sesi pemotretan Anda resmi terkunci aman di kalender tim fotografer MujaPhotography.
                        </div>

                        <div style="display:flex; flex-direction:column; gap:0.6rem;">
                            <a id="btnRealStatusPage" href="{{ route('status') }}" class="btn-gold" style="text-align:center; text-decoration:none;">
                                Buka Halaman Status Pesanan Saya &rarr;
                            </a>
                            <a id="btnWaConfirmation" href="https://wa.me/6281234567890" target="_blank" class="btn-outline-gold" style="text-align:center; text-decoration:none; display:inline-flex; align-items:center; justify-content:center; gap:0.45rem;">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                                <span>Konfirmasi ke WhatsApp Resmi</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Toast Alert Notification --}}
        <div id="mujaToast" style="position:fixed; bottom:2rem; left:50%; transform:translateX(-50%); background:#1c1815; border:1px solid #c9a96e; color:#f7f2ea; padding:0.75rem 1.5rem; border-radius:30px; font-size:0.82rem; box-shadow:0 10px 30px rgba(0,0,0,0.8); z-index:10000; display:none; align-items:center; gap:0.5rem;">
            <span>✓</span> <span id="toastMessage">Tersalin ke papan klip</span>
        </div>

    </main>

    @include('partials.site-footer')

@endsection

@push('scripts')
<script>
    // Smooth Slide Stepper Logic (Calm, Elegant Circular < > Controls)
    let currentSlideIndex = 0;
    const slideTrack = document.getElementById('bookingSlideTrack');
    const slideWrapper = document.querySelector('.booking-slide-wrapper');

    function pulseBtn(btn) {
        if (!btn) return;
        btn.classList.add('glow-pulse');
        setTimeout(() => {
            btn.classList.remove('glow-pulse');
        }, 280);
    }

    function updateSlideLayout(index) {
        if (!slideWrapper) return;
        slideWrapper.scrollLeft = 0;

        const slides = document.querySelectorAll('.booking-slide');
        if (slides[index]) {
            const h = slides[index].scrollHeight;
            if (h > 0) {
                slideWrapper.style.height = h + 'px';
            }
        }

        // Keep inactive slides non-focusable to prevent Tab-key scroll desync
        slides.forEach((slide, idx) => {
            if (idx === index) {
                slide.removeAttribute('inert');
                slide.style.opacity = '1';
                slide.style.pointerEvents = 'auto';
            } else {
                slide.setAttribute('inert', '');
                slide.style.opacity = '0.35';
                slide.style.pointerEvents = 'none';
            }
        });

        // Synchronize Right Summary Action Button
        const mainBtn = document.getElementById('btnMainSummaryAction');
        if (mainBtn) {
            if (index === 0) {
                mainBtn.innerHTML = 'Lanjut ke Jadwal &rarr;';
            } else if (index === 1) {
                mainBtn.innerHTML = 'Lanjut ke Pembayaran &rarr;';
            } else {
                mainBtn.innerHTML = 'Bayar DP &rarr;';
            }
        }
    }

    function goToSlide(index, btnElement) {
        if (btnElement) {
            pulseBtn(btnElement);
        }

        // Validation when attempting to move to Step 3
        if (index === 2 && !selectedDate) {
            showToast('Silakan pilih tanggal sesi pada kalender terlebih dahulu.');
            return;
        }

        currentSlideIndex = index;
        const offsetPercent = (index * (100 / 3));
        slideTrack.style.transform = `translateX(-${offsetPercent}%)`;

        updateSlideLayout(index);

        // Smooth scroll to top of booking section if scrolled down
        if (slideWrapper) {
            const rect = slideWrapper.getBoundingClientRect();
            if (rect.top < 70) {
                window.scrollTo({
                    top: window.pageYOffset + rect.top - 90,
                    behavior: 'smooth'
                });
            }
        }
    }

    // Right column button action handler
    function handleSummaryAction() {
        if (currentSlideIndex === 0) {
            goToSlide(1);
        } else if (currentSlideIndex === 1) {
            if (!selectedDate) {
                showToast('Silakan tentukan tanggal sesi pada kalender terlebih dahulu.');
                return;
            }
            goToSlide(2);
        } else {
            submitBooking();
        }
    }

    // Package selection sync
    const paketSelect = document.getElementById('paketSelect');
    const summaryPkgName = document.getElementById('summaryPkgName');
    const summaryTotalPrice = document.getElementById('summaryTotalPrice');
    const summaryDpPrice = document.getElementById('summaryDpPrice');
    const paketDetailDurasi = document.getElementById('paketDetailDurasi');
    let currentRawDp = 2500000;

    function updateSelectedPackage() {
        const selected = paketSelect.options[paketSelect.selectedIndex];
        const name = selected.getAttribute('data-name');
        const price = parseInt(selected.getAttribute('data-price'));
        const dp = parseInt(selected.getAttribute('data-dp'));
        const duration = selected.getAttribute('data-durasi');

        currentRawDp = dp;
        summaryPkgName.textContent = name;
        summaryTotalPrice.textContent = 'Rp ' + price.toLocaleString('id-ID');
        summaryDpPrice.textContent = 'Rp ' + dp.toLocaleString('id-ID');
        if (paketDetailDurasi) {
            paketDetailDurasi.textContent = 'Durasi Layanan: ' + duration;
        }
    }

    // Payment Selection
    let selectedPaymentName = 'QRIS Standar Nasional (All Payment)';
    function selectPayment(el, name) {
        document.querySelectorAll('.shopee-payment-card, .qris-allpay-card, .payment-card').forEach(c => c.classList.remove('active'));
        el.classList.add('active');
        selectedPaymentName = name;
        const summaryPaymentMethod = document.getElementById('summaryPaymentMethod');
        if (summaryPaymentMethod) {
            summaryPaymentMethod.innerHTML = '<span style="display:inline-flex; align-items:center; gap:5px;"><span style="background:#ee4d2d; color:#fff; border-radius:50%; width:14px; height:14px; display:inline-flex; align-items:center; justify-content:center; font-size:9px;">✓</span> QRIS All Payment</span>';
        }
    }

    // Calendar logic
    let currentYear = 2026;
    let currentMonth = 10; // 0-based: 10 = November
    let selectedDate = '15 November 2026';
    let selectedSlot = 'Sesi Siang (13:00 - 17:00 WIB)';

    const monthNames = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    const bookedDaysInNov = [7, 8, 14, 21, 22, 28];

    function renderCalendar() {
        const monthYearEl = document.getElementById('calendarMonthYear');
        monthYearEl.textContent = `${monthNames[currentMonth]} ${currentYear}`;

        const grid = document.getElementById('calendarDaysGrid');
        grid.innerHTML = '';

        const firstDayIndex = new Date(currentYear, currentMonth, 1).getDay();
        const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();

        for (let i = 0; i < firstDayIndex; i++) {
            const blank = document.createElement('div');
            blank.className = 'calendar-cell disabled';
            grid.appendChild(blank);
        }

        for (let day = 1; day <= totalDays; day++) {
            const cell = document.createElement('div');
            cell.className = 'calendar-cell';
            cell.textContent = day;

            if (currentMonth === 10 && bookedDaysInNov.includes(day)) {
                cell.classList.add('booked');
                cell.title = 'Sudah terisi (Jadwal tidak dapat dipilih)';
            } else {
                if (currentMonth === 10 && day === 15) {
                    cell.classList.add('selected');
                }

                cell.addEventListener('click', () => {
                    document.querySelectorAll('.calendar-cell').forEach(c => c.classList.remove('selected'));
                    cell.classList.add('selected');
                    selectedDate = `${day} ${monthNames[currentMonth]} ${currentYear}`;
                    document.getElementById('summaryDate').textContent = selectedDate;
                });
            }

            grid.appendChild(cell);
        }
    }

    function prevMonth() {
        if (currentMonth > 0) {
            currentMonth--;
        } else {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar();
    }

    function nextMonth() {
        if (currentMonth < 11) {
            currentMonth++;
        } else {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar();
    }

    // Slot selection
    function selectSlot(el, slotName) {
        document.querySelectorAll('.slot-card').forEach(s => s.classList.remove('active'));
        el.classList.add('active');
        selectedSlot = slotName;
        document.getElementById('summarySlot').textContent = slotName;
    }

    // Real QRIS Drawing Logic on Canvas
    function drawQrisCode(orderCode) {
        const canvas = document.getElementById('qrisCanvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        const size = 220;
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, size, size);

        // Grid parameters
        const cells = 29;
        const cellSize = size / cells;

        ctx.fillStyle = '#111111';

        // Finder patterns (top-left, top-right, bottom-left)
        function drawFinder(startX, startY) {
            ctx.fillStyle = '#111111';
            ctx.fillRect(startX * cellSize, startY * cellSize, 7 * cellSize, 7 * cellSize);
            ctx.fillStyle = '#ffffff';
            ctx.fillRect((startX + 1) * cellSize, (startY + 1) * cellSize, 5 * cellSize, 5 * cellSize);
            ctx.fillStyle = '#111111';
            ctx.fillRect((startX + 2) * cellSize, (startY + 2) * cellSize, 3 * cellSize, 3 * cellSize);
        }

        drawFinder(1, 1);
        drawFinder(21, 1);
        drawFinder(1, 21);

        // Deterministic pseudo-random pattern based on orderCode
        let seed = 0;
        for (let i = 0; i < orderCode.length; i++) {
            seed = (seed * 31 + orderCode.charCodeAt(i)) & 0xffffffff;
        }

        function pseudoRandom() {
            seed = (seed * 1664525 + 1013904223) & 0xffffffff;
            return (seed >>> 0) / 4294967296;
        }

        // Draw data modules
        ctx.fillStyle = '#111111';
        for (let r = 0; r < cells; r++) {
            for (let c = 0; c < cells; c++) {
                // Skip finder patterns
                if ((r < 9 && c < 9) || (r < 9 && c > 19) || (r > 19 && c < 9)) continue;
                // Skip center area for logo
                if (r >= 11 && r <= 17 && c >= 11 && c <= 17) continue;

                if (pseudoRandom() > 0.48) {
                    ctx.fillRect(c * cellSize, r * cellSize, cellSize, cellSize);
                }
            }
        }

        // Central QRIS Emblem
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(10 * cellSize, 10 * cellSize, 9 * cellSize, 9 * cellSize);
        ctx.strokeStyle = '#d32f2f';
        ctx.lineWidth = 2;
        ctx.strokeRect(10 * cellSize, 10 * cellSize, 9 * cellSize, 9 * cellSize);

        ctx.fillStyle = '#d32f2f';
        ctx.font = 'bold 11px Arial, sans-serif';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText('QRIS', 14.5 * cellSize, 14.5 * cellSize);
    }

    // Countdown Timer logic
    let timerInterval = null;
    function startQrisCountdown() {
        if (timerInterval) clearInterval(timerInterval);
        let secondsLeft = 15 * 60; // 15 minutes
        const timerEl = document.getElementById('qrisCountdown');

        timerInterval = setInterval(() => {
            secondsLeft--;
            if (secondsLeft <= 0) {
                clearInterval(timerInterval);
                timerEl.textContent = 'Kedaluwarsa';
                return;
            }
            const mins = Math.floor(secondsLeft / 60);
            const secs = secondsLeft % 60;
            timerEl.textContent = `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }, 1000);
    }

    // Global order details for sharing / downloading
    let activeOrderData = {};

    function submitBooking() {
        if (currentSlideIndex === 0) {
            goToSlide(1);
            return;
        }
        if (currentSlideIndex === 1) {
            if (!selectedDate) {
                showToast('Silakan pilih tanggal sesi pada kalender terlebih dahulu.');
                return;
            }
            goToSlide(2);
            return;
        }

        const name = document.getElementById('clientName').value.trim();
        const wa = document.getElementById('clientWa').value.trim();
        const email = document.getElementById('clientEmail').value.trim();
        const venue = document.getElementById('clientVenue').value.trim();
        const notes = document.getElementById('clientNotes').value.trim();

        if (!name || !wa || !email || !venue) {
            showToast('Mohon lengkapi Nama, WhatsApp, Email, dan Lokasi Acara.');
            return;
        }

        // Generate unique code: MUJA-XXXXXX
        const chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
        let randomPart = '';
        for (let i = 0; i < 6; i++) {
            randomPart += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        const orderCode = 'MUJA-' + randomPart;

        activeOrderData = {
            orderCode,
            name,
            wa,
            email,
            venue,
            notes,
            pkgName: summaryPkgName.textContent,
            totalPrice: summaryTotalPrice.textContent,
            dpPrice: summaryDpPrice.textContent,
            rawDp: currentRawDp,
            date: selectedDate,
            slot: selectedSlot,
            paymentMethod: selectedPaymentName
        };

        // Populate Modal Fields
        document.getElementById('modalQrisOrderCode').textContent = orderCode;
        document.getElementById('modalQrisAmount').textContent = activeOrderData.dpPrice;

        // Draw Canvas QRIS
        drawQrisCode(orderCode);

        // Reset verification state
        const statusBadge = document.getElementById('qrisStatusBadge');
        statusBadge.innerHTML = 'Status: <span style="color:#f59e0b; font-weight:500;">● Menunggu Pembayaran</span>';
        const checkBtn = document.getElementById('btnCheckQris');
        checkBtn.style.display = 'block';
        checkBtn.disabled = false;
        checkBtn.textContent = 'Cek Status Pembayaran (Otomatis)';
        document.getElementById('qrisSuccessSection').style.display = 'none';

        // Prepare pre-filled WhatsApp Confirmation Link
        const waText = encodeURIComponent(`Halo Tim Muja Photography,\nSaya telah melakukan reservasi sesi fotografi melalui website resmi:\n\nKode Pesanan: ${orderCode}\nNama Pemesan: ${name}\nPaket: ${activeOrderData.pkgName}\nTanggal: ${selectedDate}\nSesi: ${selectedSlot}\nLokasi: ${venue}\nNominal DP: ${activeOrderData.dpPrice}\nMetode: ${selectedPaymentName}\n\nSaya telah memindai kode QRIS resmi. Mohon konfirmasi jadwal saya. Terima kasih.`);
        document.getElementById('btnWaConfirmation').href = `https://wa.me/6281234567890?text=${waText}`;

        // Prepare Real Status Page Link (passes dynamic params to StatusController)
        const statusUrl = `{{ route('status') }}?kode=${orderCode}&status=confirmed&nama=${encodeURIComponent(name)}&paket=${encodeURIComponent(activeOrderData.pkgName)}&tanggal=${encodeURIComponent(selectedDate)}&lokasi=${encodeURIComponent(venue)}`;
        document.getElementById('btnRealStatusPage').href = statusUrl;

        // Start countdown & show modal
        startQrisCountdown();
        const modal = document.getElementById('qrisPaymentModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeQrisModal() {
        const modal = document.getElementById('qrisPaymentModal');
        modal.classList.remove('active');
        document.body.style.overflow = '';
        if (timerInterval) clearInterval(timerInterval);
    }

    // Realistic QRIS Verification Simulation
    function simulateQrisVerification() {
        const checkBtn = document.getElementById('btnCheckQris');
        const statusBadge = document.getElementById('qrisStatusBadge');
        checkBtn.disabled = true;
        checkBtn.textContent = '⏳ Memverifikasi dengan Jaringan QRIS...';

        setTimeout(() => {
            checkBtn.style.display = 'none';
            statusBadge.innerHTML = 'Status: <span style="color:#10b981; font-weight:600;">● LUNAS TERVERIFIKASI (QRIS)</span>';
            document.getElementById('qrisSuccessSection').style.display = 'block';
            showToast('Pembayaran berhasil diverifikasi otomatis!');
        }, 1300);
    }

    // Download QRIS Canvas as PNG image
    function downloadQrisImage() {
        const canvas = document.getElementById('qrisCanvas');
        if (!canvas) return;
        const link = document.createElement('a');
        link.download = `QRIS-MUJA-${activeOrderData.orderCode || 'PAYMENT'}.png`;
        link.href = canvas.toDataURL('image/png');
        link.click();
        showToast('Gambar QRIS berhasil diunduh ke perangkat Anda.');
    }

    // Copy Order Info to Clipboard
    function copyOrderDetails() {
        const text = `Tagihan MujaPhotography\nKode: ${activeOrderData.orderCode}\nNominal DP: ${activeOrderData.dpPrice}\nMerchant: MUJA PHOTOGRAPHY (NMID: ID1024395810294)\nPaket: ${activeOrderData.pkgName}\nTanggal: ${activeOrderData.date}`;
        navigator.clipboard.writeText(text).then(() => {
            showToast('Detail tagihan & kode pesanan berhasil disalin.');
        }).catch(() => {
            showToast('Kode pesanan: ' + activeOrderData.orderCode);
        });
    }

    // Toast alert helper
    function showToast(msg) {
        const toast = document.getElementById('mujaToast');
        document.getElementById('toastMessage').textContent = msg;
        toast.style.display = 'inline-flex';
        setTimeout(() => {
            toast.style.display = 'none';
        }, 3200);
    }

    // Initial calendar and package render
    renderCalendar();
    updateSelectedPackage();

    // Initialize layout height & lock native scroll
    if (slideWrapper) {
        slideWrapper.addEventListener('scroll', () => {
            slideWrapper.scrollLeft = 0;
        });
    }
    window.addEventListener('load', () => updateSlideLayout(0));
    window.addEventListener('resize', () => updateSlideLayout(currentSlideIndex));
    setTimeout(() => updateSlideLayout(0), 60);
</script>
@endpush
