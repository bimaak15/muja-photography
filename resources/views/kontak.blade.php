@extends('layouts.app')

@section('title', 'Kontak & Konsultasi')
@section('meta_description', 'Hubungi tim MujaPhotography untuk konsultasi konsep pernikahan, prewedding, peliputan acara, atau pertanyaan seputar pricelist di Surabaya.')

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
                <img src="{{ asset('img/hero/mjp_2614.webp') }}" alt="Kontak MujaPhotography">
            </div>
            <div class="page-hero__content">
                <nav class="breadcrumb-nav">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span>/</span>
                    <span>Kontak</span>
                </nav>
                <p class="page-hero__ornament">— ✦ —</p>
                <span class="section-label">Mari Terhubung</span>
                <h1 class="page-hero__title">
                    Bicarakan Rencana<br><em>Momen Bahagiamu</em>
                </h1>
                <p class="page-hero__sub">
                    Ada pertanyaan tentang tanggal, konsep foto, atau paket khusus? Kami siap mendengar dan membantu mewujudkan visual impian Anda.
                </p>
            </div>
        </section>

        {{-- ============================================================
             CONTACT INFO & FORM SECTION
        ============================================================ --}}
        <section class="muja-section" style="padding-top: 3.5rem;">
            <div class="muja-container">

                <div class="contact-layout">

                    {{-- Left column: Direct Contacts --}}
                    <div>
                        <span class="section-label">Saluran Komunikasi</span>
                        <h2 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:2rem; color:#f7f2ea; margin-top:0.25rem; margin-bottom:1.5rem;">
                            Hubungi Tim Fotografer
                        </h2>

                        <div class="contact-card-grid">
                            {{-- WhatsApp --}}
                            <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Muja Photography, saya ingin konsultasi mengenai sesi foto.') }}"
                               target="_blank" class="contact-info-card" style="text-decoration:none;">
                                <div class="contact-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#c9a96e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="contact-card-label">WhatsApp Resmi</div>
                                    <div class="contact-card-val">+62 812-3456-7890</div>
                                    <div class="contact-card-sub">Konsultasi konsep langsung dengan tim fotografer</div>
                                </div>
                            </a>

                            {{-- Instagram --}}
                            <a href="https://www.instagram.com/muja_photography_/" target="_blank" rel="noopener" class="contact-info-card" style="text-decoration:none;">
                                <div class="contact-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#c9a96e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>
                                </div>
                                <div>
                                    <div class="contact-card-label">Instagram Portfolio</div>
                                    <div class="contact-card-val">@muja_photography_</div>
                                    <div class="contact-card-sub">Eksplorasi visual dan dokumentasi karya terbaru</div>
                                </div>
                            </a>

                            {{-- Studio & Coverage Area --}}
                            <div class="contact-info-card">
                                <div class="contact-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#c9a96e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div>
                                    <div class="contact-card-label">Area Layanan Utama</div>
                                    <div class="contact-card-val">Surabaya, Jawa Timur</div>
                                    <div class="contact-card-sub">Siap melayani seluruh wilayah Jawa Timur &amp; luar kota</div>
                                </div>
                            </div>

                            {{-- Operational Hours --}}
                            <div class="contact-info-card">
                                <div class="contact-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#c9a96e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <div class="contact-card-label">Waktu Layanan &amp; Diskusi</div>
                                    <div class="contact-card-val">08.00 – 21.00 WIB</div>
                                    <div class="contact-card-sub">Setiap hari kerja maupun akhir pekan</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right column: Inquiry Form --}}
                    <div>
                        <div class="booking-panel">
                            <span class="section-label" style="font-size:0.65rem;">Kirim Pesan Langsung</span>
                            <h2 class="booking-panel-title">Formulir Pertanyaan &amp; Konsultasi</h2>
                            <p class="booking-panel-sub">Tinggalkan pesan Anda di bawah ini atau kirimkan langsung via WhatsApp.</p>

                            <form id="contactForm" onsubmit="handleContactSubmit(event)">
                                <div class="muja-form-row-2col">
                                    <div class="muja-form-group">
                                        <label class="muja-label" for="contactName">Nama Lengkap <span class="muja-label-req">*</span></label>
                                        <input type="text" id="contactName" class="muja-input" placeholder="Masukkan nama lengkap Anda" required>
                                    </div>
                                    <div class="muja-form-group">
                                        <label class="muja-label" for="contactWa">Nomor WhatsApp <span class="muja-label-req">*</span></label>
                                        <input type="tel" id="contactWa" class="muja-input" placeholder="Contoh: 081234567890" required>
                                    </div>
                                </div>

                                <div class="muja-form-group">
                                    <label class="muja-label" for="contactMsg">Pesan / Rencana Pelaksanaan Acara <span class="muja-label-req">*</span></label>
                                    <textarea id="contactMsg" class="muja-textarea" rows="4" placeholder="Sampaikan rincian rencana acara, tanggal yang diinginkan, atau pertanyaan Anda secara lengkap..." required></textarea>
                                </div>

                               <div style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center;">
    <button type="submit" class="btn-gold">
        Kirim via WhatsApp &rarr;
    </button>
</div>
                    </div>

                </div>

                {{-- FAQ Accordion --}}
                <div style="margin-top: 5rem; max-width: 52rem; margin-left:auto; margin-right:auto;">
                    <div style="text-align: center; margin-bottom: 2.5rem;">
                        <span class="section-label">Pertanyaan Umum</span>
                        <h2 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:2.2rem; color:#f7f2ea; margin-top:0.25rem;">
                            Pertanyaan yang Sering <em>Diajukan</em>
                        </h2>
                        <div class="gold-line gold-line--center" style="margin-top:1rem;"></div>
                    </div>

                    <div class="faq-list">
                        @foreach ($faqs as $faq)
                            <div class="faq-item">
                                <button class="faq-question" type="button" onclick="toggleFaq(this)">
                                    <span>{{ $faq['q'] }}</span>
                                    <span class="faq-icon">+</span>
                                </button>
                                <div class="faq-answer">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

    </main>

    @include('partials.site-footer')

@endsection

@push('scripts')
<script>
    function toggleFaq(btn) {
        const item = btn.closest('.faq-item');
        const isOpen = item.classList.contains('open');

        // Close other items
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));

        if (!isOpen) {
            item.classList.add('open');
        }
    }

    function handleContactSubmit(e) {
        e.preventDefault();
        const name = document.getElementById('contactName').value.trim();
        const wa = document.getElementById('contactWa').value.trim();
        const category = document.getElementById('contactCategory').value;
        const msg = document.getElementById('contactMsg').value.trim();

        if (!name || !wa || !msg) {
            alert('Mohon lengkapi nama, nomor WhatsApp, dan pesan Anda.');
            return;
        }

        const fullText = `Halo Muja Photography,\nNama: ${name}\nNo. WhatsApp: ${wa}\nLayanan: ${category}\nPesan: ${msg}`;
        const waUrl = 'https://wa.me/6281234567890?text=' + encodeURIComponent(fullText);
        window.open(waUrl, '_blank');
    }
</script>
@endpush
