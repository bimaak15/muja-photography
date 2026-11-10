{{-- ============================================================
     FLOATING WHATSAPP BUTTON
     Muncul di semua halaman publik yang menggunakan layouts/app.
     Pesan template otomatis diisi lewat parameter URL wa.me.
============================================================ --}}
@php
    $waMessage = urlencode(
        'Halo Muja Photography 👋, saya ingin konsultasi mengenai sesi foto. Bisa bantu saya?'
    );
    $waNumber  = '6281234567890'; // Ganti dengan nomor WA resmi Muja Photography
    $waUrl     = "https://wa.me/{$waNumber}?text={$waMessage}";
@endphp

<a href="{{ $waUrl }}"
   target="_blank"
   rel="noopener noreferrer"
   class="wa-float"
   aria-label="Chat via WhatsApp">
    <span class="wa-float__tooltip">Hubungi via WhatsApp</span>
    <img src="{{ asset('whatsapp-logo.webp') }}"
         alt="WhatsApp"
         class="wa-float__icon"
         width="56"
         height="56">
</a>

<style>
    /* ---- Floating WA Button ---- */
    .wa-float {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        z-index: 999;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #25d366;
        box-shadow: 0 4px 20px rgba(37, 211, 102, 0.45);
        text-decoration: none;
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1),
                    box-shadow 0.3s ease;
        animation: wa-entrance 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.2s both;
    }

    .wa-float:hover {
        transform: scale(1.12);
        box-shadow: 0 8px 32px rgba(37, 211, 102, 0.6);
    }

    .wa-float:hover .wa-float__tooltip {
        opacity: 1;
        transform: translateX(0);
        pointer-events: auto;
    }

    /* Pulsing ring */
    .wa-float::before {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        border: 2px solid rgba(37, 211, 102, 0.5);
        animation: wa-pulse 2.4s ease-out infinite;
    }

    .wa-float__icon {
        width: 34px;
        height: 34px;
        object-fit: contain;
        display: block;
        filter: drop-shadow(0 1px 2px rgba(0,0,0,0.15));
        pointer-events: none;
    }

    /* Tooltip bubble */
    .wa-float__tooltip {
        position: absolute;
        right: calc(100% + 14px);
        top: 50%;
        transform: translateX(8px) translateY(-50%);
        background: #111;
        color: #fff;
        font-family: 'Inter', sans-serif;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0.01em;
        white-space: nowrap;
        padding: 0.45rem 0.85rem;
        border-radius: 8px;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s ease, transform 0.2s ease;
        box-shadow: 0 4px 16px rgba(0,0,0,0.25);
    }

    /* Tooltip arrow */
    .wa-float__tooltip::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 100%;
        transform: translateY(-50%);
        border: 6px solid transparent;
        border-left-color: #111;
    }

    /* Entrance animation */
    @keyframes wa-entrance {
        from {
            opacity: 0;
            transform: scale(0.4) translateY(20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    /* Pulse ring animation */
    @keyframes wa-pulse {
        0%   { transform: scale(1);   opacity: 0.7; }
        70%  { transform: scale(1.4); opacity: 0;   }
        100% { transform: scale(1.4); opacity: 0;   }
    }

    /* Responsif: sedikit lebih kecil di mobile agar tidak menutupi konten */
    @media (max-width: 640px) {
        .wa-float {
            width: 52px;
            height: 52px;
            bottom: 1.25rem;
            right: 1.25rem;
        }

        .wa-float__icon {
            width: 29px;
            height: 29px;
        }

        .wa-float__tooltip {
            display: none; /* Tooltip disembunyikan di layar kecil */
        }
    }
</style>

{{-- ============================================================
     FOOTER
============================================================ --}}
<footer class="muja-footer" id="site-footer">
    <div class="footer-grid">
        <div class="footer-brand">
            <p class="footer-brand-name">Muja Photography</p>
            <p class="footer-brand-desc">
                Jasa fotografi profesional untuk wedding, pre-wedding, sesi personal,
                dan peliputan acara publik di Surabaya.
            </p>
        </div>
        <div>
            <p class="footer-column-title">Navigasi</p>
            <ul class="footer-links">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('portofolio') }}">Portofolio</a></li>
                <li><a href="{{ route('paket') }}">Paket &amp; Harga</a></li>
                <li><a href="{{ route('acara.index') }}">Acara</a></li>
            </ul>
        </div>
        <div>
            <p class="footer-column-title">Layanan</p>
            <ul class="footer-links">
                <li><a href="{{ route('booking') }}">Booking Sesi</a></li>
                <li><a href="{{ route('status') }}">Cek Status</a></li>
                <li><a href="{{ route('kontak') }}">Kontak</a></li>
            </ul>
        </div>
        <div>
            <p class="footer-column-title">Kontak</p>
            <ul class="footer-links">
                <li><a href="https://www.instagram.com/muja_photography_/" target="_blank" rel="noopener">Instagram</a></li>
                <li><a href="{{ route('kontak') }}">WhatsApp</a></li>
                <li>Surabaya, Indonesia</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="footer-copyright">&copy; {{ date('Y') }} Muja Photography. All rights reserved.</p>
        <div class="footer-social">
            <a href="https://www.instagram.com/muja_photography_/" target="_blank" rel="noopener">Instagram</a>
            <a href="{{ route('kontak') }}">WhatsApp</a>
        </div>
    </div>
</footer>
