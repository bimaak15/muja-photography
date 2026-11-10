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
                <li><span id="sby">Surabaya</span>, Indonesia</li>
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
