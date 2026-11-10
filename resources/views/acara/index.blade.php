@extends('layouts.app')

@section('title', 'Galeri Acara Publik')
@section('meta_description', 'Temukan foto aksi Anda saat melintas di rute acara publik MujaPhotography — Sunmori, Night Ride, dan rolling komunitas motor di Surabaya & sekitarnya.')

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
                <img src="{{ asset('img/hero/mjp_2862.webp') }}" alt="Galeri Acara Publik MujaPhotography">
            </div>
            <div class="page-hero__content">
                <nav class="breadcrumb-nav">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span>/</span>
                    <span>Acara Publik</span>
                </nav>
                <p class="page-hero__ornament">— ✦ —</p>
                <span class="section-label">Distribusi Foto Komunitas</span>
                <h1 class="page-hero__title">
                    Cari Foto Aksi Kamu<br><em>Di Setiap Rute Acara</em>
                </h1>
                <p class="page-hero__sub">
                    Tidak perlu lagi membongkar ribuan file di cloud storage. Buka album acara, filter berdasarkan rentang jam kamu melintas, dan temukan foto terbaikmu.
                </p>
            </div>
        </section>

        {{-- ============================================================
             ALBUM LIST SECTION
        ============================================================ --}}
        <section class="muja-section" style="padding-top: 3.5rem;">
            <div class="muja-container">

                <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:1.5rem; margin-bottom:2.5rem;">
                    <div>
                        <span class="section-label">Daftar Album Terbit</span>
                        <h2 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:2.2rem; color:#f7f2ea; margin-top:0.3rem;">
                            Album Acara <em>Terbaru</em>
                        </h2>
                    </div>
                    <div style="font-family:'Inter',sans-serif; font-size:0.8rem; color:rgba(255,255,255,0.5);">
                        Menampilkan {{ count($albums) }} album peliputan
                    </div>
                </div>

                {{-- Cards Grid --}}
                <div class="acara-grid">
                    @foreach ($albums as $album)
                        <div class="acara-card">
                            <div class="acara-card__media">
                                <img src="{{ $album['cover'] }}" alt="{{ $album['nama'] }}" loading="lazy">
                                <span class="acara-card__badge">{{ $album['kategori'] }}</span>
                            </div>
                            <div class="acara-card__body">
                                <span class="acara-card__date">{{ $album['tanggal'] }}</span>
                                <h3 class="acara-card__title">{{ $album['nama'] }}</h3>
                                <p class="acara-card__loc">
                                    📍 {{ $album['lokasi'] }}
                                </p>
                                <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(255,255,255,0.6); line-height:1.6; margin-bottom:1.5rem;">
                                    {{ $album['deskripsi'] }}
                                </p>
                                <div class="acara-card__meta">
                                    <div>
                                        <strong>{{ $album['jumlah_foto'] }}</strong> Foto &bull; <span style="color:#c9a96e;">Rp {{ number_format($album['harga_hd'], 0, ',', '.') }}/HD</span>
                                    </div>
                                    <a href="{{ route('acara.show', $album['slug']) }}" class="btn-gold" style="padding:0.6rem 1.25rem; font-size:0.65rem;">
                                        Lihat Galeri &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- How It Works Strip (Intuitive Visitor Guide) --}}
                <div style="margin-top: 5rem; background:#14110f; border:1px solid rgba(201,169,110,0.3); border-radius:12px; padding:clamp(2rem,4vw,3rem); box-shadow:0 12px 35px rgba(0,0,0,0.4);">
                    <div style="text-align: center; margin-bottom: 2.5rem;">
                        <span class="section-label" style="font-size:0.7rem; letter-spacing:0.2em;">Alur Mudah &amp; Cepat</span>
                        <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:2.2rem; color:#f7f2ea; margin-top:0.35rem; font-style:italic;">
                            Cara Mendapatkan Foto Resolusi Penuh (HD)
                        </h3>
                        <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(247,242,234,0.6); max-width:580px; margin:0.4rem auto 0; line-height:1.6;">
                            Ikuti 4 langkah sederhana berikut untuk menemukan dan mengunduh berkas foto original Anda tanpa kompresi dan bersih dari watermark.
                        </p>
                        <div class="gold-line gold-line--center" style="margin-top:1rem;"></div>
                    </div>

                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(230px, 1fr)); gap:1.75rem;">
                        {{-- Step 1 --}}
                        <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); border-radius:8px; padding:1.5rem 1.25rem; text-align:center;">
                            <div style="width:38px; height:38px; border-radius:50%; background:rgba(201,169,110,0.12); border:1px solid #c9a96e; color:#c9a96e; display:flex; align-items:center; justify-content:center; margin:0 auto 1rem; font-family:'Cormorant Garamond',serif; font-size:1.2rem; font-weight:600;">1</div>
                            <h4 style="font-family:'Inter',sans-serif; font-size:0.92rem; font-weight:600; color:#f7f2ea; margin-bottom:0.5rem;">Cari Album &amp; Filter Waktu</h4>
                            <p style="font-family:'Inter',sans-serif; font-size:0.78rem; color:rgba(247,242,234,0.6); line-height:1.6; margin:0;">
                                Buka album acara yang Anda hadiri, lalu gunakan tombol filter rentang jam saat Anda melintas agar foto Anda mudah ditemukan.
                            </p>
                        </div>

                        {{-- Step 2 --}}
                        <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); border-radius:8px; padding:1.5rem 1.25rem; text-align:center;">
                            <div style="width:38px; height:38px; border-radius:50%; background:rgba(201,169,110,0.12); border:1px solid #c9a96e; color:#c9a96e; display:flex; align-items:center; justify-content:center; margin:0 auto 1rem; font-family:'Cormorant Garamond',serif; font-size:1.2rem; font-weight:600;">2</div>
                            <h4 style="font-family:'Inter',sans-serif; font-size:0.92rem; font-weight:600; color:#f7f2ea; margin-bottom:0.5rem;">Pilih &amp; Tandai Foto</h4>
                            <p style="font-family:'Inter',sans-serif; font-size:0.78rem; color:rgba(247,242,234,0.6); line-height:1.6; margin:0;">
                                Klik foto untuk melihat pratinjau lebih besar. Tekan tombol <strong>+ Pilih Foto</strong> pada semua pose yang ingin Anda unduh.
                            </p>
                        </div>

                        {{-- Step 3 --}}
                        <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); border-radius:8px; padding:1.5rem 1.25rem; text-align:center;">
                            <div style="width:38px; height:38px; border-radius:50%; background:rgba(201,169,110,0.12); border:1px solid #c9a96e; color:#c9a96e; display:flex; align-items:center; justify-content:center; margin:0 auto 1rem; font-family:'Cormorant Garamond',serif; font-size:1.2rem; font-weight:600;">3</div>
                            <h4 style="font-family:'Inter',sans-serif; font-size:0.92rem; font-weight:600; color:#f7f2ea; margin-bottom:0.5rem;">Bayar via QRIS All Payment</h4>
                            <p style="font-family:'Inter',sans-serif; font-size:0.78rem; color:rgba(247,242,234,0.6); line-height:1.6; margin:0;">
                                Masukkan nama dan nomor WhatsApp Anda, lalu pindai QRIS menggunakan ShopeePay, DANA, GoPay, OVO, atau m-Banking pilihan Anda.
                            </p>
                        </div>

                        {{-- Step 4 --}}
                        <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); border-radius:8px; padding:1.5rem 1.25rem; text-align:center;">
                            <div style="width:38px; height:38px; border-radius:50%; background:rgba(201,169,110,0.12); border:1px solid #c9a96e; color:#c9a96e; display:flex; align-items:center; justify-content:center; margin:0 auto 1rem; font-family:'Cormorant Garamond',serif; font-size:1.2rem; font-weight:600;">4</div>
                            <h4 style="font-family:'Inter',sans-serif; font-size:0.92rem; font-weight:600; color:#f7f2ea; margin-bottom:0.5rem;">Terima File Asli HD</h4>
                            <p style="font-family:'Inter',sans-serif; font-size:0.78rem; color:rgba(247,242,234,0.6); line-height:1.6; margin:0;">
                                Setelah pembayaran terverifikasi otomatis, tautan unduh master foto resolusi penuh (tanpa watermark) langsung dikirimkan ke Anda.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    @include('partials.site-footer')

@endsection
