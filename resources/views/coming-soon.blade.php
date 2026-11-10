@extends('layouts.app')

@section('title', 'Layanan & Navigasi')
@section('meta_description', 'Jelajahi portofolio, reservasi kalender sesi, galeri acara publik, dan paket harga resmi MujaPhotography.')

@push('page_styles')
    <link rel="stylesheet" href="{{ asset('pages.css') }}">
@endpush

@section('content')

    @include('partials.site-header')

    <main>
        <section class="page-hero">
            <div class="page-hero__bg">
                <img src="{{ asset('img/hero/mjp_2866.webp') }}" alt="MujaPhotography">
            </div>
            <div class="page-hero__content">
                <p class="page-hero__ornament">— ✦ —</p>
                <span class="section-label">Layanan Lengkap MujaPhotography</span>
                <h1 class="page-hero__title">
                    Pilih Layanan yang Ingin<br><em>Anda Akses</em>
                </h1>
                <p class="page-hero__sub">
                    Semua modul kini telah selesai dan siap Anda gunakan. Silakan pilih layanan berikut sesuai kebutuhan Anda:
                </p>
            </div>
        </section>

        <section class="muja-section" style="padding-top: 3.5rem;">
            <div class="muja-container">
                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1.75rem;">
                    
                    {{-- Portofolio --}}
                    <div class="booking-panel" style="display:flex; flex-direction:column; justify-content:space-between;">
                        <div>
                            <span class="section-label" style="font-size:0.65rem;">Galeri Karya</span>
                            <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.6rem; color:#f7f2ea; margin:0.3rem 0 0.75rem;">
                                Portofolio Terkurasi
                            </h3>
                            <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(255,255,255,0.6); line-height:1.6; margin-bottom:1.5rem;">
                                Koleksi foto wedding, pre-wedding, engagement, dan acara komunitas dengan filter kategori dan lightbox layar penuh.
                            </p>
                        </div>
                        <a href="{{ route('portofolio') }}" class="btn-gold" style="text-align:center;">
                            Buka Portofolio &rarr;
                        </a>
                    </div>

                    {{-- Booking --}}
                    <div class="booking-panel" style="display:flex; flex-direction:column; justify-content:space-between;">
                        <div>
                            <span class="section-label" style="font-size:0.65rem;">Reservasi Online</span>
                            <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.6rem; color:#f7f2ea; margin:0.3rem 0 0.75rem;">
                                Booking Kalender Sesi
                            </h3>
                            <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(255,255,255,0.6); line-height:1.6; margin-bottom:1.5rem;">
                                Pilih paket, tentukan tanggal di kalender anti-bentrok, dan amankan slot sesi Anda langsung dengan DP aman.
                            </p>
                        </div>
                        <a href="{{ route('booking') }}" class="btn-gold" style="text-align:center;">
                            Mulai Booking &rarr;
                        </a>
                    </div>

                    {{-- Galeri Acara --}}
                    <div class="booking-panel" style="display:flex; flex-direction:column; justify-content:space-between;">
                        <div>
                            <span class="section-label" style="font-size:0.65rem;">Peliputan Komunitas</span>
                            <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.6rem; color:#f7f2ea; margin:0.3rem 0 0.75rem;">
                                Galeri Acara &amp; Foto HD
                            </h3>
                            <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(255,255,255,0.6); line-height:1.6; margin-bottom:1.5rem;">
                                Cari foto Anda saat melintas di rute acara dengan filter jam melintas dan unduh foto resolusi asli (HD).
                            </p>
                        </div>
                        <a href="{{ route('acara.index') }}" class="btn-gold" style="text-align:center;">
                            Buka Galeri Acara &rarr;
                        </a>
                    </div>

                    {{-- Cek Status --}}
                    <div class="booking-panel" style="display:flex; flex-direction:column; justify-content:space-between;">
                        <div>
                            <span class="section-label" style="font-size:0.65rem;">Lacak Pesanan</span>
                            <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.6rem; color:#f7f2ea; margin:0.3rem 0 0.75rem;">
                                Pelacak Status Sesi
                            </h3>
                            <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(255,255,255,0.6); line-height:1.6; margin-bottom:1.5rem;">
                                Masukkan kode unik pesanan Anda untuk memantau progres tahapan (Menunggu DP &rarr; Terkonfirmasi &rarr; Shooting &rarr; Editing &rarr; Selesai).
                            </p>
                        </div>
                        <a href="{{ route('status') }}" class="btn-gold" style="text-align:center;">
                            Lacak Pesanan &rarr;
                        </a>
                    </div>

                    {{-- Kontak --}}
                    <div class="booking-panel" style="display:flex; flex-direction:column; justify-content:space-between;">
                        <div>
                            <span class="section-label" style="font-size:0.65rem;">Bantuan &amp; Konsultasi</span>
                            <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.6rem; color:#f7f2ea; margin:0.3rem 0 0.75rem;">
                                Kontak &amp; WhatsApp Tim
                            </h3>
                            <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(255,255,255,0.6); line-height:1.6; margin-bottom:1.5rem;">
                                Konsultasi konsep fotografi gratis via WhatsApp langsung atau baca jawaban pertanyaan umum di FAQ.
                            </p>
                        </div>
                        <a href="{{ route('kontak') }}" class="btn-gold" style="text-align:center;">
                            Hubungi Kami &rarr;
                        </a>
                    </div>

                    {{-- Paket --}}
                    <div class="booking-panel" style="display:flex; flex-direction:column; justify-content:space-between;">
                        <div>
                            <span class="section-label" style="font-size:0.65rem;">Pricelist Resmi</span>
                            <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.6rem; color:#f7f2ea; margin:0.3rem 0 0.75rem;">
                                Daftar Paket &amp; Harga
                            </h3>
                            <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(255,255,255,0.6); line-height:1.6; margin-bottom:1.5rem;">
                                Rincian harga transparan 2026 untuk wedding rumah, wedding gedung, prewedding, siraman, dan graduation.
                            </p>
                        </div>
                        <a href="{{ route('paket') }}" class="btn-gold" style="text-align:center;">
                            Lihat Paket Harga &rarr;
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </main>

    @include('partials.site-footer')

@endsection
