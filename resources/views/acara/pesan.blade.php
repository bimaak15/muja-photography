@extends('layouts.app')

@section('title', 'Pemesanan Foto HD — ' . $albumData['nama'])
@section('meta_description', 'Checkout pesanan foto resolusi tinggi (HD) tanpa watermark dari album ' . $albumData['nama'] . '. Pembayaran instan via Midtrans.')

@push('page_styles')
    <link rel="stylesheet" href="{{ asset('pages.css') }}">
@endpush

@section('content')

    @include('partials.site-header')

    <main>
        {{-- ============================================================
             HERO BANNER
        ============================================================ --}}
        <section class="page-hero">
            <div class="page-hero__bg">
                <img src="{{ $albumData['cover'] }}" alt="{{ $albumData['nama'] }}">
            </div>
            <div class="page-hero__content">
                <nav class="breadcrumb-nav">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span>/</span>
                    <a href="{{ route('acara.index') }}">Acara Publik</a>
                    <span>/</span>
                    <a href="{{ route('acara.show', $albumData['slug']) }}">{{ $albumData['nama'] }}</a>
                    <span>/</span>
                    <span>Pesan Foto HD</span>
                </nav>
                <p class="page-hero__ornament">— ✦ —</p>
                <span class="section-label">Checkout Berkas Resolusi Penuh</span>
                <h1 class="page-hero__title">
                    Unduh Foto Asli<br><em>Bebas Watermark</em>
                </h1>
                <p class="page-hero__sub">
                    Master resolusi tinggi tanpa kompresi langsung dari kamera fotografer. Tautan unduh terbuka secara otomatis setelah pembayaran terverifikasi.
                </p>
            </div>
        </section>

        {{-- ============================================================
             CHECKOUT SECTION
        ============================================================ --}}
        <section class="muja-section" style="padding-top: 3.5rem;">
            <div class="muja-container">

                <div class="checkout-layout">

                    {{-- Left column: Selected Photos & Buyer Details --}}
                    <div>
                        {{-- Selected Photos Card --}}
                        <div class="booking-panel" style="margin-bottom: 2rem;">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                                <h2 class="booking-panel-title" style="font-size:1.5rem; margin-bottom:0;">
                                    Foto yang Dipilih ({{ count($selectedPhotos) }})
                                </h2>
                                <a href="{{ route('acara.show', $albumData['slug']) }}" style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif; font-size:0.75rem; color:#c9a96e; text-decoration:none;">
                                    &larr; Ubah Pilihan Foto
                                </a>
                            </div>
                            <p class="booking-panel-sub" style="margin-bottom:1.5rem;">
                                Periksa kembali foto pilihan Anda. Seluruh berkas akan diberikan dalam format JPEG kualitas maksimal tanpa kompresi dan bersih dari watermark.
                            </p>

                            <div class="selected-photos-preview">
                                @foreach ($selectedPhotos as $p)
                                    <div class="preview-thumb-card">
                                        <img src="{{ $p['img'] }}" alt="Foto {{ $p['id'] }}">
                                        <div class="preview-thumb-code">{{ $p['id'] }} &bull; {{ $p['jam'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Buyer Contact Details --}}
                        <div class="booking-panel" style="margin-bottom: 2rem;">
                            <h2 class="booking-panel-title" style="font-size:1.5rem;">Data Pengiriman Tautan Unduh</h2>
                            <p class="booking-panel-sub">Tautan unduh berkas foto HD dan bukti pembayaran resmi akan dikirimkan secara otomatis.</p>

                            <div class="muja-form-group">
                                <label class="muja-label" for="buyerName">Nama Lengkap Pemesan <span class="muja-label-req">*</span></label>
                                <input type="text" id="buyerName" class="muja-input" placeholder="Masukkan nama lengkap Anda" required>
                            </div>

                            <div class="muja-form-row-2col">
                                <div class="muja-form-group">
                                    <label class="muja-label" for="buyerWa">Nomor WhatsApp <span class="muja-label-req">*</span></label>
                                    <input type="tel" id="buyerWa" class="muja-input" placeholder="Contoh: 081234567890 (nomor aktif)" required>
                                </div>
                                <div class="muja-form-group">
                                    <label class="muja-label" for="buyerEmail">Alamat Email <span class="muja-label-req">*</span></label>
                                    <input type="email" id="buyerEmail" class="muja-input" placeholder="alamat.email@domain.com" required>
                                </div>
                            </div>
                        </div>

                        {{-- Official Payment Methods Selection --}}
                        <div class="booking-panel">
                            <h2 class="booking-panel-title" style="font-size:1.5rem;">Metode Pembayaran</h2>
                            <p class="booking-panel-sub">Selesaikan pembayaran foto resolusi tinggi secara instan via QRIS All Payment:</p>

                            {{-- Shopee-Style QRIS All Payment Master Card --}}
                            <div class="shopee-payment-card active" onclick="selectPaymentMethod(this, 'QRIS Standar Nasional (All Payment)')">
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
                                            <path d="M1.5 5.2L4.5 8.2L10.5 1.8" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right column: Cost Summary & Payment --}}
                    <div>
                        <div class="summary-box">
                            <h3 class="summary-title">Rincian Pembayaran</h3>

                            <div class="summary-row">
                                <span>Nama Acara</span>
                                <strong style="color:#f7f2ea; text-align:right; max-width:60%;">{{ $albumData['nama'] }}</strong>
                            </div>
                            <div class="summary-row">
                                <span>Jumlah Foto Dipilih</span>
                                <strong style="color:#c9a96e;">{{ count($selectedPhotos) }} lembar foto</strong>
                            </div>
                            <div class="summary-row">
                                <span>Harga per Foto</span>
                                <span>Rp {{ number_format($albumData['harga_hd'], 0, ',', '.') }}</span>
                            </div>
                            <div class="summary-row">
                                <span>Metode Pembayaran</span>
                                <strong id="summaryPaymentMethodHd" style="color:#e8d5b0;">QRIS All Payment</strong>
                            </div>

                            <div class="summary-row total">
                                <span>Total Tagihan</span>
                                <span style="color:#e8d5b0; font-size:1.3rem;">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>

                            <div class="payment-badge-group">
                                <p style="margin-bottom:0.35rem;"><strong style="color:#c9a96e;">Pengiriman Otomatis</strong></p>
                                <p style="margin:0; font-size:0.73rem; color:rgba(255,255,255,0.6);">
                                    Tautan unduh berkas asli beresolusi penuh akan aktif selama 7 hari kalender dan dapat diakses melalui ponsel maupun komputer.
                                </p>
                            </div>

                            <button type="button" class="btn-gold" style="width: 100%; border:none; cursor:pointer; text-align:center;" onclick="payNow()">
                                Bayar Sekarang (Rp {{ number_format($totalPrice, 0, ',', '.') }})
                            </button>

                            <p style="text-align: center; margin-top: 1rem; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif; font-size:0.75rem; color:rgba(255,255,255,0.45);">
                                Transaksi aman &bull; Jaminan file asli beresolusi tinggi tanpa kompresi
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        {{-- Payment Success Simulation Modal --}}
        <div class="lightbox-modal" id="paymentSuccessModal">
            <div class="lightbox-content" style="max-width: 520px; background:#14110f; border:1px solid rgba(201,169,110,0.3); border-radius:8px; padding:2.5rem; text-align:center;">
                <div style="font-size: 3.5rem; margin-bottom: 0.5rem;">✨</div>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:2.2rem; color:#f7f2ea; margin-bottom:0.5rem;">
                    Pembayaran Berhasil
                </h3>
                <p style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif; font-size:0.85rem; color:rgba(255,255,255,0.68); margin-bottom:1.5rem; line-height:1.6;">
                    Terima kasih. Pembayaran Anda telah terverifikasi secara otomatis. Berkas foto resolusi tinggi Anda telah siap diunduh:
                </p>

                <div style="background:#0c0a09; border:1px solid rgba(16,185,129,0.3); padding:1.25rem; border-radius:6px; margin-bottom:1.5rem;">
                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif; font-size:0.7rem; color:#10b981; letter-spacing:0.18em; text-transform:uppercase; font-weight:600;">ID Transaksi Pembayaran</div>
                    <div id="modalTrxCode" style="font-family:'Bebas Neue',sans-serif; font-size:2rem; color:#fff; letter-spacing:0.05em; margin-top:0.2rem;">
                        MID-HD-89301
                    </div>
                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif; font-size:0.76rem; color:rgba(255,255,255,0.6); margin-top:0.3rem;">
                        {{ count($selectedPhotos) }} Berkas Foto HD &bull; Status: Lunas Otomatis
                    </div>
                </div>

                <div style="display:flex; flex-direction:column; gap:0.75rem;">
                    <a href="{{ $selectedPhotos[0]['img'] ?? asset('img/hero/mjp_2866.webp') }}" download="MujaPhotography_HD.webp" class="btn-gold" style="text-align:center;">
                        Unduh Seluruh Berkas Foto HD (.ZIP)
                    </a>
                    <a href="{{ route('acara.show', $albumData['slug']) }}" class="btn-outline-gold" style="margin-left:0; text-align:center;">
                        &larr; Kembali ke Galeri Acara
                    </a>
                </div>
            </div>
        </div>

    </main>

    @include('partials.site-footer')

@endsection

@push('scripts')
<script>
    let selectedPaymentHd = 'QRIS Standar Nasional (All Payment)';
    function selectPaymentMethod(el, name) {
        document.querySelectorAll('.shopee-payment-card, .qris-allpay-card').forEach(c => c.classList.remove('active'));
        el.classList.add('active');
        selectedPaymentHd = name;
        document.getElementById('summaryPaymentMethodHd').textContent = name;
    }

    function payNow() {
        const name = document.getElementById('buyerName').value.trim();
        const wa = document.getElementById('buyerWa').value.trim();
        const email = document.getElementById('buyerEmail').value.trim();

        if (!name || !wa || !email) {
            alert('Mohon lengkapi Nama Lengkap, Nomor WhatsApp, dan Alamat Email Anda.');
            return;
        }

        // Generate transaction code
        const trxNum = Math.floor(10000 + Math.random() * 90000);
        document.getElementById('modalTrxCode').textContent = 'MID-HD-' + trxNum;

        const modal = document.getElementById('paymentSuccessModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
</script>
@endpush
