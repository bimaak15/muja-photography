@extends('layouts.app')

@section('title', $albumData['nama'] . ' — Galeri Foto')
@section('meta_description', 'Galeri foto ber-watermark untuk acara ' . $albumData['nama'] . '. Filter berdasarkan jam melintas dan dapatkan foto HD tanpa watermark.')

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
                    <span>{{ $albumData['nama'] }}</span>
                </nav>
                <p class="page-hero__ornament">— ✦ —</p>
                <span class="section-label">{{ $albumData['kategori'] }} &bull; {{ $albumData['tanggal'] }}</span>
                <h1 class="page-hero__title">
                    {{ $albumData['nama'] }}
                </h1>
                <p class="page-hero__sub">
                    📍 {{ $albumData['lokasi'] }} &bull; Rentang: {{ $albumData['jam_rentang'] }}
                </p>
            </div>
        </section>

        {{-- ============================================================
             GALLERY & TIME FILTER SECTION
        ============================================================ --}}
        <section class="muja-section" style="padding-top: 3.5rem;">
            <div class="muja-container">

                {{-- Album Header Info Bar --}}
                <div class="album-header-bar">
                    <div>
                        <span class="section-label" style="font-size:0.65rem;">Galeri Pratinjau Ber-Watermark</span>
                        <h2 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.8rem; color:#f7f2ea; margin-top:0.2rem;">
                            Pilih Foto &amp; Filter Jam Melintas
                        </h2>
                    </div>
                    <div style="font-family:'Inter',sans-serif; font-size:0.8rem; color:rgba(255,255,255,0.7); background:#14110f; padding:0.6rem 1.25rem; border-radius:4px; border:1px solid rgba(201,169,110,0.3);">
                        Harga HD: <strong style="color:#c9a96e;">Rp {{ number_format($albumData['harga_hd'], 0, ',', '.') }}</strong> / foto (Tanpa Watermark)
                    </div>
                </div>

                {{-- Filter Jam Melintas (CRITICAL PRD FEATURE) --}}
                <div class="time-filter-strip">
                    <div class="time-filter-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        Filter Jam Melintas:
                    </div>
                    <div class="time-filter-pills">
                        @foreach ($albumData['jam_filter'] as $index => $slot)
                            <button class="time-pill {{ $index === 0 ? 'active' : '' }}" 
                                    data-slot="{{ $slot }}"
                                    onclick="filterByTime(this, '{{ $slot }}')">
                                {{ $slot }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Photo Grid with Watermark --}}
                <div class="portfolio-grid" id="acaraPhotoGrid">
                    @foreach ($albumData['photos'] as $photo)
                        <div class="photo-watermark-card" data-slot="{{ $photo['slot'] }}" id="card-{{ $photo['id'] }}">
                            <div class="watermark-container" onclick="openPhotoPreview('{{ $photo['img'] }}', '{{ $photo['id'] }}', 'Jam Melintas: {{ $photo['jam'] }} WIB')">
                                <img src="{{ $photo['img'] }}" alt="Foto {{ $photo['id'] }}" loading="lazy">
                                <div class="watermark-overlay">
                                    <div class="watermark-text">MUJA PHOTOGRAPHY</div>
                                </div>
                            </div>
                            <div class="photo-card-info">
                                <div>
                                    <div class="photo-code">{{ $photo['id'] }}</div>
                                    <div class="photo-time-badge">⏱ {{ $photo['jam'] }} WIB</div>
                                </div>
                                <button type="button" class="photo-select-btn" id="btn-{{ $photo['id'] }}" onclick="toggleSelectPhoto('{{ $photo['id'] }}')">
                                    + Pilih Foto
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- Floating Cart Checkout Bar --}}
        <div class="floating-cart-bar" id="floatingCartBar">
            <div class="cart-bar-info">
                <span id="selectedCountText">0</span> foto dipilih &bull; Total: <strong id="selectedPriceText">Rp 0</strong>
            </div>
            <a id="btnProceedOrder" href="#" class="btn-gold" style="padding:0.6rem 1.4rem; font-size:0.7rem; border:none; text-decoration:none;">
                Lanjut Pesan Foto HD &rarr;
            </a>
        </div>

        {{-- Lightbox Photo Preview Modal --}}
        <div class="lightbox-modal" id="photoPreviewModal" onclick="closePhotoPreview(event)">
            <div class="lightbox-content">
                <button class="lightbox-close" onclick="closePhotoPreviewDirect()" aria-label="Tutup">&times;</button>
                <div style="position:relative; width:100%; display:flex; justify-content:center;">
                    <img class="lightbox-img" id="previewModalImg" src="" alt="Preview Foto">
                    <div style="position:absolute; inset:0; display:grid; place-items:center; pointer-events:none;">
                        <span style="font-family:'Bebas Neue',sans-serif; font-size:3rem; color:rgba(255,255,255,0.3); transform:rotate(-25deg); letter-spacing:0.2em;">
                            MUJA PHOTOGRAPHY • PREVIEW
                        </span>
                    </div>
                </div>
                <div class="lightbox-caption">
                    <h3 id="previewModalTitle"></h3>
                    <p id="previewModalSubtitle"></p>
                </div>
            </div>
        </div>

    </main>

    @include('partials.site-footer')

@endsection

@push('scripts')
<script>
    const pricePerHd = {{ $albumData['harga_hd'] }};
    const albumSlug = '{{ $albumData['slug'] }}';
    let selectedPhotoIds = [];

    // Filter by Time
    function filterByTime(btn, slot) {
        document.querySelectorAll('.time-pill').forEach(p => p.classList.remove('active'));
        btn.classList.add('active');

        const cards = document.querySelectorAll('.photo-watermark-card');
        cards.forEach(card => {
            if (slot === 'Semua Jam' || card.getAttribute('data-slot') === slot) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Toggle Select Photo
    function toggleSelectPhoto(id) {
        const index = selectedPhotoIds.indexOf(id);
        const card = document.getElementById('card-' + id);
        const btn = document.getElementById('btn-' + id);

        if (index > -1) {
            selectedPhotoIds.splice(index, 1);
            card.classList.remove('selected');
            btn.textContent = '+ Pilih Foto';
        } else {
            selectedPhotoIds.push(id);
            card.classList.add('selected');
            btn.textContent = '✓ Dipilih';
        }

        updateCartBar();
    }

    // Update Floating Cart Bar
    function updateCartBar() {
        const bar = document.getElementById('floatingCartBar');
        const countText = document.getElementById('selectedCountText');
        const priceText = document.getElementById('selectedPriceText');
        const btnProceed = document.getElementById('btnProceedOrder');

        const count = selectedPhotoIds.length;
        const total = count * pricePerHd;

        countText.textContent = count;
        priceText.textContent = 'Rp ' + total.toLocaleString('id-ID');

        if (count > 0) {
            bar.classList.add('active');
            btnProceed.href = "{{ url('/acara') }}/" + albumSlug + "/pesan?photos=" + selectedPhotoIds.join(',');
        } else {
            bar.classList.remove('active');
        }
    }

    // Lightbox Preview
    const previewModal = document.getElementById('photoPreviewModal');
    const previewModalImg = document.getElementById('previewModalImg');
    const previewModalTitle = document.getElementById('previewModalTitle');
    const previewModalSubtitle = document.getElementById('previewModalSubtitle');

    function openPhotoPreview(src, id, subtitle) {
        previewModalImg.src = src;
        previewModalTitle.textContent = 'Kode Foto: ' + id;
        previewModalSubtitle.textContent = subtitle;
        previewModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closePhotoPreviewDirect() {
        previewModal.classList.remove('active');
        document.body.style.overflow = '';
    }

    function closePhotoPreview(e) {
        if (e.target === previewModal) {
            closePhotoPreviewDirect();
        }
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && previewModal.classList.contains('active')) {
            closePhotoPreviewDirect();
        }
    });
</script>
@endpush
