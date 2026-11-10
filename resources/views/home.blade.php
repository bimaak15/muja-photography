@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description',
    'MujaPhotography — Jasa fotografi profesional untuk wedding, pre-wedding, sesi personal,
    dan peliputan acara publik di Surabaya. Pesan sesi sekarang.')

@section('content')

    @include('partials.site-header')

    {{-- ============================================================
         MAIN — HERO SECTION
    ============================================================ --}}
    <main class="page">

        {{-- ----------------------------------------------------------
             PRELOADER / LOADER — animasi intro foto
        ---------------------------------------------------------- --}}
        <div class="loader">
            <div class="loader__img">
                <picture>
                    <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2866-600.webp') }}"
                        type="image/webp">
                    <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2866-1200.webp') }}"
                        type="image/webp">
                    <img alt="Pengantin bersanding di pelaminan bertema galaksi — MujaPhotography"
                        src="{{ asset('img/hero/mjp_2866.webp') }}">
                </picture>
            </div>
            <div class="loader__img">
                <picture>
                    <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2599-600.webp') }}"
                        type="image/webp">
                    <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2599-1200.webp') }}"
                        type="image/webp">
                    <img alt="Pengantin berjabat tangan di bawah lampu gantung kristal — MujaPhotography"
                        src="{{ asset('img/hero/mjp_2599.webp') }}">
                </picture>
            </div>
            <div class="loader__img">
                <picture>
                    <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2862-600.webp') }}"
                        type="image/webp">
                    <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2862-1200.webp') }}"
                        type="image/webp">
                    <img alt="Pasangan pengantin membelakangi backdrop galaksi berhuruf RR — MujaPhotography"
                        src="{{ asset('img/hero/mjp_2862.webp') }}">
                </picture>
            </div>
            <div class="loader__img">
                <picture>
                    <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2682-600.webp') }}"
                        type="image/webp">
                    <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2682-1200.webp') }}"
                        type="image/webp">
                    <img alt="Pengantin tertawa di depan lampu gantung besar — MujaPhotography"
                        src="{{ asset('img/hero/mjp_2682.webp') }}">
                </picture>
            </div>
            <div class="loader__img">
                <picture>
                    <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2614-600.webp') }}"
                        type="image/webp">
                    <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2614-1200.webp') }}"
                        type="image/webp">
                    <img alt="Pengantin bersalaman di antara tirai merah dan lampu gantung — MujaPhotography"
                        src="{{ asset('img/hero/mjp_2614.webp') }}">
                </picture>
            </div>
            <div class="loader__img">
                <picture>
                    <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2609-600.webp') }}"
                        type="image/webp">
                    <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2609-1200.webp') }}"
                        type="image/webp">
                    <img alt="Pengantin mengenakan busana ivory tersenyum di depan pelaminan — MujaPhotography"
                        src="{{ asset('img/hero/mjp_2609.webp') }}">
                </picture>
            </div>
        </div>

        {{-- ----------------------------------------------------------
             OVERLAY — teks intro + CTA
        ---------------------------------------------------------- --}}
        <div class="overlay">
            <div class="overlay__column">
                <h1 class="overlay__text">
                    <div>Abadikan Momen</div>
                </h1>
                <h2 class="overlay__text">
                    <div>Terbaik Hidupmu</div>
                </h2>
                <h2 class="overlay__text">
                    <div>Bersama Muja</div>
                </h2>
            </div>
            <div class="overlay__column overlay__column--cta">
                <h2 class="overlay__text">
                    <div>
                        <span>klik</span> di mana saja untuk melanjutkan
                    </div>
                </h2>
            </div>
        </div>

        {{-- ----------------------------------------------------------
             HERO BLOCKS — section parallax per foto
        ---------------------------------------------------------- --}}

        {{-- Block 1 --}}
        <section class="block">
            <picture>
                <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2866-600.webp') }}"
                    type="image/webp">
                <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2866-1200.webp') }}"
                    type="image/webp">
                <img class="block__background" alt="Pengantin bersanding di pelaminan bertema galaksi — MujaPhotography"
                    src="{{ asset('img/hero/mjp_2866.webp') }}">
            </picture>
            <div class="block__container">
                <div class="block__content">
                    <p class="block__text">
                        Dari momen sakral pernikahan hingga peliputan aksi komunitas — setiap jepretan kami merekam cerita
                        yang nyata.
                    </p>
                    <p class="block__text">
                        Satu platform untuk portofolio, pemesanan sesi, dan distribusi foto acara.
                    </p>
                </div>
            </div>
        </section>

        {{-- Block 2 --}}
        <section class="block">
            <picture>
                <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2599-600.webp') }}"
                    type="image/webp">
                <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2599-1200.webp') }}"
                    type="image/webp">
                <img class="block__background" alt="Pengantin berjabat tangan di bawah lampu gantung kristal — MujaPhotography"
                    src="{{ asset('img/hero/mjp_2599.webp') }}">
            </picture>
            <div class="block__container">
                <div class="block__content block__content--center">
                    <p class="block__text">
                        Booking sesi privat langsung dari kalender. Tidak perlu chat, tidak ada risiko jadwal bentrok.
                    </p>
                </div>
            </div>
        </section>

        {{-- Block 3 --}}
        <section class="block">
            <picture>
                <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2862-600.webp') }}"
                    type="image/webp">
                <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2862-1200.webp') }}"
                    type="image/webp">
                <img class="block__background" alt="Pasangan pengantin membelakangi backdrop galaksi berhuruf RR — MujaPhotography"
                    src="{{ asset('img/hero/mjp_2862.webp') }}">
            </picture>
            <div class="block__container">
                <div class="block__content">
                    <p class="block__text">
                        Peserta acara publik dapat menemukan foto mereka sendiri hanya dengan memfilter rentang jam
                        melintas.
                    </p>
                    <p class="block__text">
                        Preview tersedia gratis ber-watermark. Foto resolusi tinggi (HD) tersedia untuk dibeli.
                    </p>
                </div>
            </div>
        </section>

        {{-- Block 4 --}}
        <section class="block">
            <picture>
                <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2682-600.webp') }}"
                    type="image/webp">
                <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2682-1200.webp') }}"
                    type="image/webp">
                <img class="block__background" alt="Pengantin tertawa di depan lampu gantung besar — MujaPhotography"
                    src="{{ asset('img/hero/mjp_2682.webp') }}">
            </picture>
            <div class="block__container">
                <div class="block__content">
                    <p class="block__text">
                        Pantau progres pesananmu kapan saja menggunakan kode unik yang kamu terima saat booking.
                    </p>
                    <p class="block__text">
                        Tidak perlu menunggu balasan chat — status pesanan selalu terbaru.
                    </p>
                </div>
            </div>
        </section>

        {{-- Block 5 --}}
        <section class="block">
            <picture>
                <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2614-600.webp') }}"
                    type="image/webp">
                <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2614-1200.webp') }}"
                    type="image/webp">
                <img class="block__background" alt="Pengantin bersalaman di antara tirai merah dan lampu gantung — MujaPhotography"
                    src="{{ asset('img/hero/mjp_2614.webp') }}">
            </picture>
            <div class="block__container">
                <div class="block__content">
                    <p class="block__text">
                        Kami meliput sunmori dan ride komunitas dari titik kumpul sampai garis finish.
                    </p>
                    <p class="block__text">
                        Setiap acara terbit sebagai galeri per album, siap dibuka lewat ponsel peserta.
                    </p>
                </div>
            </div>
        </section>

        {{-- Block 6 --}}
        <section class="block">
            <picture>
                <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2609-600.webp') }}"
                    type="image/webp">
                <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2609-1200.webp') }}"
                    type="image/webp">
                <img class="block__background" alt="Pengantin mengenakan busana ivory tersenyum di depan pelaminan — MujaPhotography"
                    src="{{ asset('img/hero/mjp_2609.webp') }}">
            </picture>
            <div class="block__container">
                <div class="block__content">
                    <p class="block__text">
                        Sudah siap mengabadikan momen terbaikmu?
                    </p>
                    <p class="block__text">
                        Pilih paket, tentukan tanggal di kalender, dan amankan slot sesimu sekarang.
                    </p>
                </div>
            </div>
        </section>

    </main>

    {{-- ============================================================
         MAIN CONTENT SECTIONS — After Hero
    ============================================================ --}}

    {{-- ----------------------------------------------------------
         SECTION 1: ABOUT — Split layout
    ---------------------------------------------------------- --}}
    <section class="muja-section" id="tentang-kami">
        <div class="muja-container">
            <div class="about-grid">
                <div class="about-image">
                    <picture>
                        <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2609-600.webp') }}"
                            type="image/webp">
                        <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2609-1200.webp') }}"
                            type="image/webp">
                        <img src="{{ asset('img/hero/mjp_2609.webp') }}"
                            alt="Pengantin mengenakan busana ivory tersenyum di depan pelaminan — MujaPhotography"
                            loading="lazy">
                    </picture>
                </div>
                <div class="about-text">
                    <span class="section-label">Tentang Kami</span>
                    <h2 class="section-heading">
                        Setiap Momen<br>Punya <em>Cerita</em>
                    </h2>
                    <div class="gold-line"></div>
                    <p class="section-body">
                        Muja Photography hadir untuk merekam hari-hari yang tak akan terulang.
                        Kami percaya bahwa fotografi bukan sekadar gambar — melainkan cara
                        paling jujur untuk menyimpan perasaan.
                    </p>
                    <p class="section-body" style="margin-top: 1rem;">
                        Dari pernikahan intim hingga perayaan besar, kami menjaga setiap
                        detail, emosi, dan tatapan agar tetap hidup dalam setiap frame.
                    </p>
                    <p class="about-signature" style="margin-top: 2rem;">
                        — <span>Muja Photography</span>, Surabaya
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ----------------------------------------------------------
         SECTION 2: PORTFOLIO GALLERY — Library scroll animation (data-grid-first)
    ---------------------------------------------------------- --}}
    <section class="muja-section muja-section--cream gallery-wrapper" id="portofolio-preview">

        {{-- Section header (above the pinned grid) --}}
        <div class="gallery-header">
            <span class="section-label">Portofolio</span>
            <h2 class="section-heading">
                Karya <em>Terbaru</em> Kami
            </h2>
            <div class="gold-line gold-line--center"></div>
        </div>

        {{-- Library grid: content--full wraps the grid + overlaid title --}}
        <div class="content content--full content--padded">
            {{-- data-grid-first: 17 positioned images, fly in from below on scroll pin --}}
            <div class="grid grid--spaced" data-grid-first>
                @php
                    $defaultFallbacks = [
                        1 => 'img/hero/mjp_2866.webp',
                        2 => 'img/hero/mjp_2599.webp',
                        3 => 'img/hero/mjp_2862.webp',
                        4 => 'img/hero/mjp_2682.webp',
                        5 => 'img/hero/mjp_2614.webp',
                        6 => 'img/hero/mjp_2609.webp',
                        7 => 'img/hero/mjp_2866.webp',
                        8 => 'img/hero/mjp_2599.webp',
                        9 => 'img/hero/mjp_2862.webp',
                        10 => 'img/hero/mjp_2682.webp',
                        11 => 'img/hero/mjp_2614.webp',
                        12 => 'img/hero/mjp_2609.webp',
                        13 => 'img/hero/mjp_2866.webp',
                        14 => 'img/hero/mjp_2599.webp',
                        15 => 'img/hero/mjp_2862.webp',
                        16 => 'img/hero/mjp_2682.webp',
                        17 => 'img/hero/mjp_2614.webp',
                    ];
                @endphp
                @for ($i = 1; $i <= 17; $i++)
                    @php
                        $item = isset($galleryItems) ? $galleryItems->get($i) : null;
                        $imgUrl = ($item && $item->is_active) ? $item->image_url : asset($defaultFallbacks[$i] ?? 'img/hero/mjp_2866.webp');
                    @endphp
                    <div class="grid__img pos-{{ $i }}" style="background-image:url('{{ $imgUrl }}')"></div>
                @endfor
            </div>
            {{-- Overlaid title, fades in after grid settles --}}
            <div class="content__title">
                <h2 class="content__title-main">Portofolio</h2>
                <p>Setiap momen, abadi</p>
            </div>
        </div>

        {{-- Footer link (below the pinned grid) --}}
        <div class="gallery-footer">
            <a href="{{ route('portofolio') }}" class="link-elegant">Lihat Semua Karya</a>
        </div>

    </section>


    {{-- ----------------------------------------------------------
         SECTION 3: SERVICES
    ---------------------------------------------------------- --}}
    <section class="muja-section" id="layanan">
        <div class="muja-container">
            <div class="services-header">
                <span class="section-label">Layanan</span>
                <h2 class="section-heading">
                    Apa yang Kami <em>Tawarkan</em>
                </h2>
                <div class="gold-line gold-line--center"></div>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-number">01</div>
                    <h3 class="service-title">Wedding Photography</h3>
                    <p class="service-desc">
                        Dokumentasi lengkap hari pernikahan Anda — dari persiapan, akad, resepsi,
                        hingga sesi foto keluarga. Dua fotografer, satu hari penuh.
                    </p>
                </div>
                <div class="service-card">
                    <div class="service-number">02</div>
                    <h3 class="service-title">Pre-Wedding</h3>
                    <p class="service-desc">
                        Sesi foto pasangan sebelum hari besar. Indoor atau outdoor,
                        konsep sesuai keinginan Anda, dengan arahan pose yang natural.
                    </p>
                </div>
                <div class="service-card">
                    <div class="service-number">03</div>
                    <h3 class="service-title">Peliputan Acara</h3>
                    <p class="service-desc">
                        Sunmori, gathering komunitas, atau acara perusahaan — kami hadir
                        dengan galeri online agar peserta bisa menemukan foto mereka sendiri.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ----------------------------------------------------------
         SECTION 4: PROCESS — How It Works
    ---------------------------------------------------------- --}}
    <section class="muja-section muja-section--cream" id="cara-kerja">
        <div class="muja-container">
            <div class="process-header">
                <span class="section-label">Cara Kerja</span>
                <h2 class="section-heading">
                    Empat Langkah <em>Sederhana</em>
                </h2>
                <div class="gold-line gold-line--center"></div>
            </div>

            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3 class="step-title" style="color: #1a1714;">Pilih Paket</h3>
                    <p class="step-desc" style="color: rgba(26,23,20,0.5);">
                        Telusuri paket yang sesuai kebutuhan dan anggaran Anda.
                    </p>
                </div>
                <div class="process-step">
                    <div class="step-number" style="background: #f5f0ea;">2</div>
                    <h3 class="step-title" style="color: #1a1714;">Tentukan Tanggal</h3>
                    <p class="step-desc" style="color: rgba(26,23,20,0.5);">
                        Cek ketersediaan kalender dan pilih tanggal yang Anda inginkan.
                    </p>
                </div>
                <div class="process-step">
                    <div class="step-number" style="background: #f5f0ea;">3</div>
                    <h3 class="step-title" style="color: #1a1714;">Konfirmasi Booking</h3>
                    <p class="step-desc" style="color: rgba(26,23,20,0.5);">
                        Selesaikan pemesanan dan terima kode unik untuk melacak progres.
                    </p>
                </div>
                <div class="process-step">
                    <div class="step-number" style="background: #f5f0ea;">4</div>
                    <h3 class="step-title" style="color: #1a1714;">Terima Hasil</h3>
                    <p class="step-desc" style="color: rgba(26,23,20,0.5);">
                        Foto diedit profesional dan dikirim dalam galeri online pribadi Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ----------------------------------------------------------
         SECTION 5: TESTIMONIAL
    ---------------------------------------------------------- --}}
    <section class="muja-section muja-section--cream" id="testimoni" style="padding-top: 0;">
        <div class="muja-container">
            <div class="testimonial-wrapper">
                <div class="gold-line gold-line--center" style="margin-bottom: 3rem;"></div>
                <blockquote class="testimonial-quote">
                    Foto-fotonya bukan sekadar dokumentasi. Mereka berhasil menangkap perasaan
                    yang bahkan kami sendiri tidak sadar sedang kami rasakan di hari itu.
                </blockquote>
                <p class="testimonial-author">Risky &amp; Rahma — Surabaya, 2024</p>
            </div>
        </div>
    </section>

    {{-- ----------------------------------------------------------
         SECTION 6: CTA — Booking
    ---------------------------------------------------------- --}}
    <section class="muja-section cta-section" id="booking-cta" style="padding: 0;">
        <div class="cta-bg">
            <picture>
                <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2862-600.webp') }}"
                    type="image/webp">
                <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2862-1200.webp') }}"
                    type="image/webp">
                <img src="{{ asset('img/hero/mjp_2862.webp') }}"
                    alt="Background — pelaminan bertema galaksi" loading="lazy">
            </picture>
        </div>
        <div class="cta-content">
            <p class="cta-ornament">— ✦ —</p>
            <h2 class="cta-heading">
                Siap Mengabadikan<br>Momen <em>Terbaik</em> Anda?
            </h2>
            <p class="cta-body">
                Amankan tanggal Anda sebelum jadwal penuh. Konsultasi gratis,
                tanpa komitmen — cukup mulai dari satu percakapan.
            </p>
            <div>
                <a href="{{ route('booking') }}" class="btn-gold">Pesan Sekarang</a>
                <a href="{{ route('kontak') }}" class="btn-outline-gold">Hubungi Kami</a>
            </div>
        </div>
    </section>

    @include('partials.site-footer')

@endsection

@push('scripts')
    {{-- Hero JS dari library/hero — hanya beranda yang punya blok hero --}}
    <script type="module" src="{{ asset('hero.min.js') }}"></script>
@endpush
