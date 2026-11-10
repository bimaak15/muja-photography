@extends('layouts.app')

@section('title', 'Lacak Status Pesanan')
@section('meta_description', 'Pantau progres pengerjaan sesi foto pernikahan dan pemesanan foto Anda secara real-time dengan kode unik pesanan MujaPhotography.')

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
                <img src="{{ asset('img/hero/mjp_2682.webp') }}" alt="Cek Status MujaPhotography">
            </div>
            <div class="page-hero__content">
                <nav class="breadcrumb-nav">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span>/</span>
                    <span>Pelacak Pesanan</span>
                </nav>
                <p class="page-hero__ornament">— ✦ —</p>
                <span class="section-label">Transparansi Pengerjaan</span>
                <h1 class="page-hero__title">
                    Lacak Progres<br><em>Sesi Foto Anda</em>
                </h1>
                <p class="page-hero__sub">
                    Pantau setiap tahapan dokumentasi Anda mulai dari verifikasi DP, sesi shooting, pascaproduksi editing, hingga penyerahan file akhir.
                </p>
            </div>
        </section>

        {{-- ============================================================
             TRACKER SECTION
        ============================================================ --}}
        <section class="muja-section" style="padding-top: 3.5rem;">
            <div class="muja-container">

                <div class="status-tracker-card" style="background:#14110f; border:1px solid rgba(201,169,110,0.3); border-radius:12px; box-shadow:0 15px 40px rgba(0,0,0,0.5);">
                    <div style="text-align: center; margin-bottom: 2rem;">
                        <span class="section-label" style="font-size:0.7rem; letter-spacing:0.2em;">Portal Resmi Klien</span>
                        <h2 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:2.2rem; font-weight:400; font-style:italic; color:#f7f2ea; margin-top:0.35rem;">
                            Lacak Progres &amp; Status Pesanan
                        </h2>
                        <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(247,242,234,0.65); max-width:540px; margin:0.4rem auto 0; line-height:1.6;">
                            Pantau tahapan pengerjaan sesi fotografi Anda secara transparan menggunakan kode reservasi resmi yang tercantum pada lembar tagihan atau pesan WhatsApp Anda.
                        </p>
                    </div>

                    {{-- Search Form --}}
                    <form action="{{ route('status') }}" method="GET" style="display:flex; gap:0.75rem; max-width:560px; margin:0 auto 1.25rem;">
                        <div style="position:relative; flex:1;">
                            <input type="text" name="kode" class="muja-input" 
                                   style="font-size:0.95rem; letter-spacing:0.12em; text-transform:uppercase; padding-left:2.5rem; height:48px;"
                                   placeholder="MASUKKAN KODE PESANAN (MISAL: MUJA-7K3P9Q)" value="{{ $kode }}" required>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c9a96e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 style="position:absolute; left:1rem; top:50%; transform:translateY(-50%); pointer-events:none;">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <button type="submit" class="btn-gold" style="border:none; cursor:pointer; flex-shrink:0; height:48px; padding:0 1.5rem;">
                            Lacak Pesanan &rarr;
                        </button>
                    </form>

                    {{-- Helpful Helper Bar --}}
                    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.75rem; max-width:560px; margin:0 auto 2.5rem; font-family:'Inter',sans-serif; font-size:0.74rem; color:rgba(247,242,234,0.55); border-top:1px dashed rgba(201,169,110,0.2); padding-top:0.75rem;">
                        <div>
                            <span>Contoh kode: </span>
                            <a href="{{ route('status', ['kode' => 'MUJA-7K3P9Q']) }}" style="color:#c9a96e; text-decoration:none; font-weight:500; border-bottom:1px dotted #c9a96e;">MUJA-7K3P9Q</a>
                        </div>
                        <div>
                            <span>Lupa kode Anda? </span>
                            <a href="https://wa.me/6281234567890?text={{ urlencode('Halo admin Muja Photography, saya ingin menanyakan kode pesanan atas nama saya.') }}" 
                               target="_blank" style="color:#c9a96e; text-decoration:none; font-weight:500;">
                                Cek via WhatsApp &rsaquo;
                            </a>
                        </div>
                    </div>

                    {{-- Order Results Display --}}
                    @if ($currentOrder)
                        @php
                            $status = $currentOrder['status'];
                            $stepIndex = 1;
                            if ($status === 'waiting_dp') $stepIndex = 1;
                            elseif ($status === 'confirmed') $stepIndex = 2;
                            elseif ($status === 'shooting') $stepIndex = 3;
                            elseif ($status === 'editing') $stepIndex = 4;
                            elseif ($status === 'done') $stepIndex = 5;

                            $trackWidth = match($stepIndex) {
                                1 => '10%',
                                2 => '30%',
                                3 => '55%',
                                4 => '80%',
                                5 => '100%',
                                default => '20%'
                            };
                        @endphp

                        {{-- Step-by-Step Timeline --}}
                        <div class="status-timeline">
                            <div class="timeline-track">
                                <div class="timeline-track-progress" style="width: {{ $trackWidth }};"></div>
                            </div>
                            <div class="timeline-steps">
                                <div class="timeline-step {{ $stepIndex >= 1 ? ($stepIndex == 1 ? 'current' : 'completed') : '' }}">
                                    <div class="step-circle">{{ $stepIndex > 1 ? '✓' : '1' }}</div>
                                    <div class="step-label">Menunggu DP</div>
                                </div>
                                <div class="timeline-step {{ $stepIndex >= 2 ? ($stepIndex == 2 ? 'current' : 'completed') : '' }}">
                                    <div class="step-circle">{{ $stepIndex > 2 ? '✓' : '2' }}</div>
                                    <div class="step-label">Terkonfirmasi</div>
                                </div>
                                <div class="timeline-step {{ $stepIndex >= 3 ? ($stepIndex == 3 ? 'current' : 'completed') : '' }}">
                                    <div class="step-circle">{{ $stepIndex > 3 ? '✓' : '3' }}</div>
                                    <div class="step-label">Shooting</div>
                                </div>
                                <div class="timeline-step {{ $stepIndex >= 4 ? ($stepIndex == 4 ? 'current' : 'completed') : '' }}">
                                    <div class="step-circle">{{ $stepIndex > 4 ? '✓' : '4' }}</div>
                                    <div class="step-label">Editing</div>
                                </div>
                                <div class="timeline-step {{ $stepIndex >= 5 ? 'completed' : '' }}">
                                    <div class="step-circle">{{ $stepIndex >= 5 ? '✓' : '5' }}</div>
                                    <div class="step-label">Selesai</div>
                                </div>
                            </div>
                        </div>

                        {{-- Order Card Details --}}
                        <div class="order-detail-card">
                            <div class="order-badge-row">
                                <div>
                                    <div style="font-family:'Inter',sans-serif; font-size:0.65rem; color:rgba(255,255,255,0.4); letter-spacing:0.15em; text-transform:uppercase;">Nomor Pesanan</div>
                                    <div style="font-family:'Bebas Neue',sans-serif; font-size:1.8rem; color:#f7f2ea; letter-spacing:0.05em;">{{ $currentOrder['kode'] }}</div>
                                </div>
                                <div>
                                    @if ($status === 'waiting_dp')
                                        <span class="status-badge badge-waiting">Menunggu DP</span>
                                    @elseif ($status === 'confirmed')
                                        <span class="status-badge badge-confirmed">Terkonfirmasi</span>
                                    @elseif ($status === 'shooting')
                                        <span class="status-badge badge-shooting">Shooting</span>
                                    @elseif ($status === 'editing')
                                        <span class="status-badge badge-editing">Editing</span>
                                    @elseif ($status === 'done')
                                        <span class="status-badge badge-done">Selesai &amp; Siap</span>
                                    @endif
                                </div>
                            </div>

                            <div class="muja-form-row-2col" style="gap:1.25rem; margin-bottom:1.25rem;">
                                <div>
                                    <div class="muja-label" style="margin-bottom:0.2rem; font-size:0.65rem;">Nama Klien</div>
                                    <div style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.2rem; color:#f7f2ea;">{{ $currentOrder['nama'] }}</div>
                                </div>
                                <div>
                                    <div class="muja-label" style="margin-bottom:0.2rem; font-size:0.65rem;">Paket Dipilih</div>
                                    <div style="font-family:'Inter',sans-serif; font-size:0.85rem; color:#e8d5b0;">{{ $currentOrder['paket'] }}</div>
                                </div>
                                <div>
                                    <div class="muja-label" style="margin-bottom:0.2rem; font-size:0.65rem;">Tanggal Sesi</div>
                                    <div style="font-family:'Inter',sans-serif; font-size:0.85rem; color:rgba(255,255,255,0.8);">{{ $currentOrder['tanggal'] }}</div>
                                </div>
                                <div>
                                    <div class="muja-label" style="margin-bottom:0.2rem; font-size:0.65rem;">Status Pembayaran DP</div>
                                    <div style="font-family:'Inter',sans-serif; font-size:0.85rem; color:#10b981;">{{ $currentOrder['dp_status'] }}</div>
                                </div>
                            </div>

                            <div style="margin-bottom:1.5rem; padding:1rem; background:rgba(255,255,255,0.03); border-left:3px solid #c9a96e; border-radius:4px;">
                                <div class="muja-label" style="margin-bottom:0.25rem; font-size:0.65rem;">Catatan Tim Fotografer:</div>
                                <p style="font-family:'Inter',sans-serif; font-size:0.82rem; color:rgba(255,255,255,0.7); line-height:1.6; margin:0;">
                                    {{ $currentOrder['catatan'] }}
                                </p>
                            </div>

                            <div style="display:flex; flex-wrap:wrap; gap:0.75rem; justify-content:space-between; align-items:center;">
                                <div style="font-family:'Inter',sans-serif; font-size:0.75rem; color:rgba(255,255,255,0.45);">
                                    Estimasi Selesai: <strong style="color:#f7f2ea;">{{ $currentOrder['estimasi_selesai'] }}</strong>
                                </div>
                                <div style="display:flex; gap:0.75rem;">
                                    @if ($currentOrder['drive_link'])
                                        <a href="{{ $currentOrder['drive_link'] }}" target="_blank" class="btn-gold" style="padding:0.6rem 1.4rem; font-size:0.65rem;">
                                            Buka Galeri Drive
                                        </a>
                                    @endif
                                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Muja Photography, saya ingin tanya mengenai pesanan ' . $currentOrder['kode']) }}"
                                       target="_blank" class="btn-outline-gold" style="margin-left:0; padding:0.6rem 1.4rem; font-size:0.65rem;">
                                        Chat WhatsApp Tim
                                    </a>
                                </div>
                            </div>
                        </div>

                    @else
                        {{-- Empty prompt state --}}
                        <div style="text-align: center; padding: 2rem 1rem; color: rgba(255,255,255,0.4); font-family: 'Inter', sans-serif; font-size: 0.85rem;">
                            <div style="font-size: 2.5rem; margin-bottom: 0.75rem; opacity: 0.6;">🔍</div>
                            <p>Masukkan kode pesanan Anda pada kolom pencarian di atas atau pilih salah satu kode contoh untuk melihat simulasi alur status.</p>
                        </div>
                    @endif

                </div>

            </div>
        </section>

    </main>

    @include('partials.site-footer')

@endsection
