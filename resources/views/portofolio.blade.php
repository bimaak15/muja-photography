@extends('layouts.app')

@section('title', 'Portofolio Terkurasi')
@section('meta_description', 'Koleksi karya fotografi terbaik MujaPhotography — wedding, pre-wedding, engagement, siraman, dan peliputan acara publik di Surabaya.')

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
                <img src="{{ asset('img/hero/mjp_2866.webp') }}" alt="Portofolio MujaPhotography">
            </div>
            <div class="page-hero__content">
                <nav class="breadcrumb-nav">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span>/</span>
                    <span>Portofolio</span>
                </nav>
                <p class="page-hero__ornament">— ✦ —</p>
                <span class="section-label">Galeri Terpilih</span>
                <h1 class="page-hero__title">
                    Satu Potret Mengabadikan<br><em>Sejuta Cerita yang Abadi</em>
                </h1>
                <p class="page-hero__sub">
                    Dari kehangatan ijab qabul hingga dinamika laju malam komunitas — telusuri momen-momen berharga yang kami abadikan dengan penuh ketulusan.
                </p>
            </div>
        </section>

        {{-- ============================================================
             GALLERY & FILTER SECTION
        ============================================================ --}}
        <section class="muja-section" style="padding-top: 3rem;">
            <div class="muja-container">

                {{-- Filter Tabs --}}
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">Semua Karya</button>
                    <button class="filter-tab" data-filter="wedding">Wedding</button>
                    <button class="filter-tab" data-filter="prewedding">Pre-Wedding</button>
                    <button class="filter-tab" data-filter="engagement">Engagement &amp; Siraman</button>
                    <button class="filter-tab" data-filter="event">Acara Komunitas</button>
                </div>

                {{-- Gallery Grid --}}
                <div class="portfolio-grid" id="portfolioGrid">
                    @foreach ($items as $item)
                        <div class="portfolio-card" data-category="{{ $item['kategori'] }}"
                             onclick="openLightbox('{{ $item['gambar'] }}', '{{ addslashes($item['judul']) }}', '{{ $item['kategori_label'] }} · {{ $item['lokasi'] }}')">
                            <img class="portfolio-card__img" src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}" loading="lazy">
                            <div class="portfolio-card__overlay">
                                <span class="portfolio-card__cat">{{ $item['kategori_label'] }}</span>
                                <h3 class="portfolio-card__title">{{ $item['judul'] }}</h3>
                                <p class="portfolio-card__loc">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    {{ $item['lokasi'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Lightbox Modal --}}
                <div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox(event)">
                    <div class="lightbox-content">
                        <button class="lightbox-close" onclick="closeLightboxDirect()" aria-label="Tutup">&times;</button>
                        <img class="lightbox-img" id="lightboxImg" src="" alt="Preview Portofolio">
                        <div class="lightbox-caption">
                            <h3 id="lightboxTitle"></h3>
                            <p id="lightboxSubtitle"></p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- ============================================================
             CTA SECTION
        ============================================================ --}}
        <section class="muja-section muja-section--cream" style="text-align: center; padding: 5rem 1.5rem;">
            <div class="muja-container" style="max-width: 44rem;">
                <span class="section-label">Rencanakan Momenmu</span>
                <h2 class="section-heading" style="color: #1a1714; margin-bottom: 1.25rem;">
                    Tertarik dengan <em>Gaya Visual</em> Kami?
                </h2>
                <div class="gold-line gold-line--center"></div>
                <p class="section-body" style="margin: 0 auto 2.5rem; color: rgba(26,23,20,0.65);">
                    Jangan biarkan tanggal bahagia Anda terisi oleh orang lain. Konsultasikan konsep impian Anda bersama tim MujaPhotography hari ini.
                </p>
                <div>
                    <a href="{{ route('booking') }}" class="btn-gold" style="background:#1a1714; color:#fff;">Pesan Sesi Sekarang</a>
                    <a href="{{ route('paket') }}" class="btn-outline-gold" style="color:#1a1714; border-color: rgba(26,23,20,0.3);">Lihat Paket Harga</a>
                </div>
            </div>
        </section>

    </main>

    @include('partials.site-footer')

@endsection

@push('scripts')
<script>
    // Filtering logic
    const filterTabs = document.querySelectorAll('.filter-tab');
    const cards = document.querySelectorAll('.portfolio-card');

    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            filterTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            const filterValue = tab.getAttribute('data-filter');

            cards.forEach(card => {
                if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                    card.style.display = 'block';
                    card.style.opacity = '1';
                } else {
                    card.style.display = 'none';
                    card.style.opacity = '0';
                }
            });
        });
    });

    // Lightbox Modal
    const modal = document.getElementById('lightboxModal');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxTitle = document.getElementById('lightboxTitle');
    const lightboxSubtitle = document.getElementById('lightboxSubtitle');

    function openLightbox(src, title, subtitle) {
        lightboxImg.src = src;
        lightboxTitle.textContent = title;
        lightboxSubtitle.textContent = subtitle;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightboxDirect() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    function closeLightbox(e) {
        if (e.target === modal) {
            closeLightboxDirect();
        }
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeLightboxDirect();
        }
    });
</script>
@endpush
