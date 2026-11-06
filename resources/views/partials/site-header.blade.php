{{-- ============================================================
     HEADER / NAVBAR (dari library/navbar)
============================================================ --}}
<header class="header" id="site-header">
    <div class="container">
        <div class="row v-center space-between">
            {{-- Logo --}}
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.svg') }}" alt="MujaPhotography Logo" style="height:36px;">
                </a>
            </div>
            {{-- Hamburger Toggle --}}
            <div class="nav-toggle">
                <button class="hamburger-menu" aria-label="Buka menu">
                    <span></span>
                    <span></span>
                </button>
                <button class="hamburger-menu-close" aria-label="Tutup menu">
                    <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                        viewBox="0 0 64 64" fill="none">
                        <line id="Line_1" y1="14.91" transform="translate(32 24.788)" stroke="#fff"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" />
                        <path id="Path_1" d="M6,9.155,10.949,5" transform="translate(21.051 19.302)" stroke="#fff"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" />
                        <path id="Path_2" d="M10.949,5,15.9,9.155" transform="translate(21.051 19.302)"
                            stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" />
                        <circle id="circle" cx="32" cy="32" r="30.75" stroke="rgba(255,255,255,0.35)"
                            stroke-width="2.5" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

{{-- NAV FULLSCREEN (dari library/navbar) --}}
<nav id="site-nav">
    <div class="container">
        <div class="nav-columns">
            <div class="nav-column">
                <div class="nav-label">Menu</div>
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('paket') }}">Paket &amp; Harga</a></li>
                    <li><a href="{{ route('acara.index') }}">Acara</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                    <li><a href="{{ route('booking') }}">Booking Sekarang</a></li>
                </ul>
            </div>
            <div class="nav-column">
                <div class="nav-label">Hubungi Kami</div>
                <div class="nav-infos">
                    <ul class="nav-info">
                        <li class="nav-info-label">Instagram</li>
                        <li><a href="https://www.instagram.com/muja_photography_/" target="_blank"
                                rel="noopener">@muja_photography_</a></li>
                    </ul>
                    <ul class="nav-info">
                        <li class="nav-info-label">WhatsApp</li>
                        <li><a href="{{ route('kontak') }}">Hubungi via WA</a></li>
                    </ul>
                    <ul class="nav-info">
                        <li class="nav-info-label">Cek Pesanan</li>
                        <li><a href="{{ route('status') }}">Lacak Status</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
