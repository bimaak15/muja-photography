<!doctype html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('meta_description', 'MujaPhotography — Jasa fotografi profesional untuk wedding, pre-wedding, sesi personal, dan peliputan acara publik di Surabaya.')">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <title>@yield('title', 'MujaPhotography') | MujaPhotography</title>

        {{-- Google Fonts: Bebas Neue (display) + Inter (body) + Cormorant Garamond (elegant serif) --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

        {{-- Hero CSS dari library/hero --}}
        @stack('head_styles')
        <link rel="stylesheet" href="{{ asset('hero.min.css') }}">

        {{-- Custom hero enhancements: dark overlay, wedding typography, gold accents --}}
        <link rel="stylesheet" href="{{ asset('hero-custom.css') }}">

        {{-- Main content sections --}}
        <link rel="stylesheet" href="{{ asset('main-sections.css') }}">

        {{-- Gallery library integration --}}
        <link rel="stylesheet" href="{{ asset('gallery-custom.css') }}">

        {{-- Navbar CSS dari library/navbar --}}
        <link rel="stylesheet" href="{{ asset('navbar.css') }}">

        {{-- Vite (Tailwind + app.css) --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Page-specific styles --}}
        @stack('page_styles')
    </head>
    <body>
        <div class="wrapper">
            @yield('content')
        </div>

        {{-- Navbar JS dari library/navbar (GSAP + script) --}}
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script src="{{ asset('ScrollTrigger.min.js') }}"></script>
        <script src="{{ asset('imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('navbar.js') }}"></script>

        {{-- Gallery section (scroll-driven grid dari library/gallery) --}}
        <script src="{{ asset('gallery.js') }}"></script>

        {{-- Skrip tambahan per halaman --}}
        @stack('scripts')
    </body>
</html>
