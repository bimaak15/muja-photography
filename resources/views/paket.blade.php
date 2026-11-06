@extends('layouts.app')

@section('title', 'Paket & Harga')
@section('meta_description',
    'Pricelist resmi MujaPhotography 2026 — wedding, pre-wedding, engagement, siraman, akad only,
    dan graduation. Harga transparan, pembayaran aman lewat Midtrans.')

@push('page_styles')
    <link rel="stylesheet" href="{{ asset('paket.css') }}">
@endpush

@php
    // ============================================================
    // Sumber data: "PL MUJA PHOTOGRAPHY 2026.pdf" (project root)
    // Harga disimpan sebagai rupiah penuh (contoh: 4.500.000).
    // ============================================================

    // Wedding — AKAD · TEMU · RESEPSI
    $weddingRumah = [
        [
            'nama' => 'Silver',
            'harga' => 4500000,
            'fitur' => [
                'Foto unlimited',
                'Video liputan',
                'Cetak 110 4R',
                'Album magnetic',
                'All file in flasdisk 16GB',
                'Free cetak 10RS 3 lembar',
            ],
            'unggulan' => false,
        ],
        [
            'nama' => 'Gold',
            'harga' => 5000000,
            'fitur' => [
                'Foto unlimited',
                'Video cinematic',
                'Album magnetic',
                'All file in flasdisk 16GB',
                'Free cetak 10RS 5 lembar',
            ],
            'unggulan' => true,
        ],
        [
            'nama' => 'Platinum',
            'harga' => 7000000,
            'fitur' => [
                'Foto unlimited',
                'Video cinematic',
                'Free prewedding outdoor / indoor',
                'Cetak 120 4R',
                'Album magnetic jumbo',
                'Album magazine',
                'All file in flasdisk 16GB',
                'Free cetak 10RS 5 lembar',
                'Free cetak 16RS + frame 1pcs',
            ],
            'unggulan' => false,
        ],
    ];

    // Wedding Gedung — AKAD · TEMU · RESEPSI
    $weddingGedung = [
        [
            'nama' => 'Silver',
            'harga' => 5000000,
            'fitur' => [
                'Foto unlimited',
                'Video cinematic',
                'Cetak 110 4R',
                'Album magnetic',
                'All file in flasdisk 16GB',
                'Free cetak 10RS 3 lembar',
            ],
            'unggulan' => false,
        ],
        [
            'nama' => 'Gold',
            'harga' => 6000000,
            'fitur' => [
                'Foto unlimited',
                'Video cinematic',
                'Album magazine',
                'All file in flasdisk 16GB',
                'Free cetak 10RS 5 lembar',
            ],
            'unggulan' => true,
        ],
        [
            'nama' => 'Platinum',
            'harga' => 7500000,
            'fitur' => [
                'Foto unlimited',
                'Video cinematic',
                'Free prewedding outdoor / indoor',
                'Cetak 120 4R',
                'Album magnetic jumbo',
                'Album magazine',
                'All file in flasdisk 16GB',
                'Free cetak 10RS 5 lembar',
                'Free cetak 16RS + frame 1pcs',
            ],
            'unggulan' => false,
        ],
    ];

    // Paket lain — Engagement, Prewedding, Siraman, Akad Only, Graduation
    $kategoriLain = [
        [
            'judul' => 'Engagement',
            'catatan' => '',
            'items' => [
                [
                    'nama' => 'Home Package',
                    'harga' => 2500000,
                    'fitur' => [
                        '1 fotografer',
                        '1 videografer',
                        'Cetak 80 4R',
                        'Album magnetic',
                        'Video cinematic 3 menit',
                        'All file in flasdisk 16GB',
                    ],
                ],
                [
                    'nama' => 'Gedung Package',
                    'harga' => 3000000,
                    'fitur' => [
                        '1 fotografer',
                        '1 videografer',
                        'Cetak 80 4R',
                        'Album magnetic',
                        'Video cinematic 3 menit',
                        'All file in flasdisk 16GB',
                    ],
                ],
            ],
        ],
        [
            'judul' => 'Prewedding',
            'catatan' => 'Sidoarjo · Surabaya · Mojokerto',
            'items' => [
                [
                    'nama' => 'Only Foto — Indoor',
                    'harga' => 1000000,
                    'fitur' => [
                        '2 fotografer',
                        '3 hours on duty',
                        '100 edited file',
                        'All file in google drive',
                    ],
                ],
                [
                    'nama' => 'Only Foto — Outdoor',
                    'harga' => 1500000,
                    'fitur' => [
                        '2 fotografer',
                        '3 hours on duty',
                        '100 edited file',
                        'All file in google drive',
                    ],
                ],
                [
                    'nama' => 'Indoor',
                    'harga' => 1500000,
                    'fitur' => [
                        'Makeup',
                        'Busana sepasang',
                        'Hijabdo',
                        'Foto unlimited file',
                        'Edit 20 foto',
                        'Studio MJ 2 jam',
                    ],
                ],
                [
                    'nama' => 'Outdoor',
                    'harga' => 2500000,
                    'fitur' => [
                        'Makeup',
                        'Busana sepasang',
                        'Hijabdo',
                        'Foto unlimited file',
                        'Edit 20 foto',
                    ],
                ],
            ],
        ],
        [
            'judul' => 'Siraman',
            'catatan' => '',
            'items' => [
                [
                    'nama' => 'Home Package',
                    'harga' => 2600000,
                    'fitur' => [
                        'Foto & video',
                        'Foto unlimited',
                        'Cetak 80 4R',
                        'Album magnetic',
                        'Video cinematic',
                        'All file in flasdisk 16GB',
                    ],
                ],
                [
                    'nama' => 'Gedung Package',
                    'harga' => 3100000,
                    'fitur' => [
                        'Foto & video',
                        'Foto unlimited',
                        'Cetak 80 4R',
                        'Album magnetic',
                        'Video cinematic',
                        'All file in flasdisk 16GB',
                    ],
                ],
            ],
        ],
        [
            'judul' => 'Akad Only',
            'catatan' => '',
            'items' => [
                [
                    'nama' => 'Foto & Video',
                    'harga' => 3500000,
                    'fitur' => [
                        '1 fotografer',
                        '4 hours on duty',
                        '100 edited file',
                        'Video cinematic',
                        'Album magnetic',
                        'All file in flasdisk',
                        'Cetak 10RS 2 lembar',
                    ],
                ],
                [
                    'nama' => 'Foto Saja',
                    'harga' => 1000000,
                    'fitur' => [
                        '1 fotografer',
                        '4 hours on duty',
                        '100 edited file',
                        'All file in google drive',
                    ],
                ],
            ],
        ],
        [
            'judul' => 'Graduation',
            'catatan' => '',
            'items' => [
                [
                    'nama' => 'Only Photo',
                    'harga' => 500000,
                    'fitur' => [
                        'Foto unlimited',
                        'Edit all file',
                        '3 hours on duty',
                    ],
                ],
                [
                    'nama' => 'Photo & Studio',
                    'harga' => 800000,
                    'fitur' => [
                        'Foto unlimited',
                        'Edit all file',
                        '3 hours on duty',
                        'Studio MJ',
                    ],
                ],
            ],
        ],
    ];

    // Catatan penting — sesuai pricelist resmi
    $catatan = [
        [
            'judul' => 'Belum Termasuk Transport',
            'teks' => 'Biaya transportasi belum termasuk dan dihitung terpisah sesuai jarak lokasi acara.',
        ],
        [
            'judul' => 'File Hanya 60 Hari',
            'teks' => 'Semua file bertahan 60 hari di Google Drive. Unduh dan simpan sebelum masa berlaku habis.',
        ],
        [
            'judul' => 'Area Layanan',
            'teks' => 'Sidoarjo, Surabaya, dan Mojokerto. Untuk lokasi lain, hubungi kami terlebih dahulu.',
        ],
        [
            'judul' => 'Pembayaran Aman',
            'teks' => 'DP dibayar lewat Midtrans Snap: transfer bank, e-wallet, kartu kredit, atau QRIS.',
        ],
    ];

    $faq = [
        [
            'tanya' => 'Bagaimana alur pemesanan paket?',
            'jawab' =>
                'Pilih paket yang sesuai, lalu isi formulir booking dan tentukan tanggal di kalender. Setelah itu Anda membayar DP melalui Midtrans Snap. Slot baru terkunci setelah pembayaran DP diterima.',
        ],
        [
            'tanya' => 'Metode pembayaran apa saja yang tersedia?',
            'jawab' =>
                'Pembayaran diproses melalui Midtrans Snap: transfer bank (virtual account), e-wallet seperti GoPay, OVO, DANA, dan ShopeePay, kartu kredit/debit, serta QRIS.',
        ],
        [
            'tanya' => 'Apakah harga sudah termasuk transportasi?',
            'jawab' =>
                'Belum. Biaya transportasi di luar area belum termasuk dan dihitung terpisah. Untuk lokasi di luar Sidoarjo, Surabaya, dan Mojokerto, kami akan informasikan biayanya sebelum booking dikonfirmasi.',
        ],
        [
            'tanya' => 'Berapa lama file bisa diakses?',
            'jawab' =>
                'File tersimpan di Google Drive selama 60 hari sejak diunggah. Mohon unduh seluruh file sebelum masa berlaku habis, karena setelah itu tautan tidak dapat dibuka kembali.',
        ],
        [
            'tanya' => 'Area mana saja yang dilayani?',
            'jawab' =>
                'Prewedding dan sesi lain melayani area Sidoarjo, Surabaya, dan Mojokerto. Untuk area di luar itu, silakan hubungi kami terlebih dahulu untuk memastikan ketersediaan.',
        ],
        [
            'tanya' => 'Bisakah paket disesuaikan dengan kebutuhan?',
            'jawab' =>
                'Bisa. Paket dapat ditambah atau dikurangi isinya sesuai rencana acara Anda. Hubungi kami melalui WhatsApp untuk menyusun paket custom beserta estimasi harganya.',
        ],
    ];
@endphp

@section('content')

    @include('partials.site-header')

    <main>

        {{-- ============================================================
             HERO HALAMAN — background foto sementara
        ============================================================ --}}
        <section class="price-hero">
            <div class="price-hero__bg">
                <picture>
                    <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2862-600.webp') }}"
                        type="image/webp">
                    <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2862-1200.webp') }}"
                        type="image/webp">
                    <img src="{{ asset('img/hero/mjp_2862.webp') }}"
                        alt="Pasangan pengantin di depan backdrop bertema galaksi — MujaPhotography">
                </picture>
            </div>
            <div class="price-hero__content">
                <p class="price-hero__ornament" aria-hidden="true">— ✦ —</p>
                <span class="section-label">Paket &amp; Harga</span>
                <h1 class="price-hero__title">
                    Investasi untuk <em>Kenangan</em><br>yang Tak Terulang
                </h1>
                <p class="price-hero__sub">
                    Pricelist resmi 2026 — dari pre-wedding, engagement, siraman,
                    hingga paket wedding lengkap. Isi paket dan harganya kami
                    tulis apa adanya, tanpa biaya tersembunyi.
                </p>
            </div>
        </section>

        {{-- ============================================================
             PAKET WEDDING — dengan pemilih lokasi acara
        ============================================================ --}}
        <section class="muja-section muja-section--cream price-section" id="daftar-paket">
            <div class="muja-container">
                <div class="price-header">
                    <span class="section-label">Wedding</span>
                    <h2 class="section-heading">Paket <em>Wedding</em></h2>
                    <div class="gold-line gold-line--center"></div>
                    <p class="section-body price-intro">
                        Untuk akad, temu keluarga, dan resepsi. Pilih dulu lokasi
                        acaranya — isi paket dan harganya menyesuaikan.
                    </p>
                </div>

                <div class="venue-switch">
                    <input class="venue-switch__input" type="radio" name="venue" id="venue-rumah" checked>
                    <input class="venue-switch__input" type="radio" name="venue" id="venue-gedung">

                    <div class="venue-switch__labels">
                        <label class="venue-switch__label" for="venue-rumah">Wedding Rumah</label>
                        <label class="venue-switch__label" for="venue-gedung">Wedding Gedung</label>
                    </div>

                    <div class="price-grid price-grid--venue" data-venue="rumah">
                        @foreach ($weddingRumah as $item)
                            <article class="price-card {{ $item['unggulan'] ? 'price-card--featured' : '' }}">
                                @if ($item['unggulan'])
                                    <span class="price-badge">Paling Diminati</span>
                                @endif

                                <h3 class="price-name">{{ $item['nama'] }}</h3>
                                <p class="price-tagline">Wedding Rumah</p>

                                <div class="price-value">
                                    <span class="price-currency">Rp</span>
                                    <span class="price-amount">{{ number_format($item['harga'], 0, ',', '.') }}</span>
                                </div>
                                <p class="price-unit">AKAD · TEMU · RESEPSI</p>

                                <ul class="price-features">
                                    @foreach ($item['fitur'] as $fitur)
                                        <li>{{ $fitur }}</li>
                                    @endforeach
                                </ul>

                                <a href="{{ route('booking') }}"
                                    class="price-cta {{ $item['unggulan'] ? 'btn-gold' : 'btn-outline-dark' }}">
                                    Pilih Paket {{ $item['nama'] }}
                                </a>
                            </article>
                        @endforeach
                    </div>

                    <div class="price-grid price-grid--venue" data-venue="gedung">
                        @foreach ($weddingGedung as $item)
                            <article class="price-card {{ $item['unggulan'] ? 'price-card--featured' : '' }}">
                                @if ($item['unggulan'])
                                    <span class="price-badge">Paling Diminati</span>
                                @endif

                                <h3 class="price-name">{{ $item['nama'] }}</h3>
                                <p class="price-tagline">Wedding Gedung</p>

                                <div class="price-value">
                                    <span class="price-currency">Rp</span>
                                    <span class="price-amount">{{ number_format($item['harga'], 0, ',', '.') }}</span>
                                </div>
                                <p class="price-unit">AKAD · TEMU · RESEPSI</p>

                                <ul class="price-features">
                                    @foreach ($item['fitur'] as $fitur)
                                        <li>{{ $fitur }}</li>
                                    @endforeach
                                </ul>

                                <a href="{{ route('booking') }}"
                                    class="price-cta {{ $item['unggulan'] ? 'btn-gold' : 'btn-outline-dark' }}">
                                    Pilih Paket {{ $item['nama'] }}
                                </a>
                            </article>
                        @endforeach
                    </div>

                    <p class="price-note">
                        Harga belum termasuk transportasi. File hanya bertahan
                        60 hari di Google Drive. Butuh kombinasi lain?
                        <a href="{{ route('kontak') }}">Hubungi kami</a> untuk paket custom.
                    </p>
                </div>
            </div>
        </section>

        {{-- ============================================================
             CATATAN PENTING
        ============================================================ --}}
        <section class="muja-section included-section" id="catatan">
            <div class="muja-container">
                <div class="included-grid">
                    @foreach ($catatan as $index => $poin)
                        <div class="included-item">
                            <span class="included-number">0{{ $index + 1 }}</span>
                            <h3 class="included-title">{{ $poin['judul'] }}</h3>
                            <p class="included-desc">{{ $poin['teks'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================
             PAKET LAINNYA
        ============================================================ --}}
        <section class="muja-section muja-section--cream price-section" id="paket-lain">
            <div class="muja-container">
                <div class="price-header">
                    <span class="section-label">Paket Lainnya</span>
                    <h2 class="section-heading">Sesi <em>Tersendiri</em></h2>
                    <div class="gold-line gold-line--center"></div>
                    <p class="section-body price-intro">
                        Engagement, pre-wedding, siraman, akad only, hingga wisuda —
                        masing-masing punya paket sendiri dengan isi yang jelas.
                    </p>
                </div>

                <div class="price-list">
                    @foreach ($kategoriLain as $kategori)
                        <div class="price-row">
                            <div class="price-row__label">
                                <h3 class="price-row__title">{{ $kategori['judul'] }}</h3>
                                @if ($kategori['catatan'])
                                    <p class="price-row__catatan">{{ $kategori['catatan'] }}</p>
                                @endif
                            </div>

                            <div class="price-row__items">
                                @foreach ($kategori['items'] as $item)
                                    <div class="price-mini">
                                        <div class="price-mini__head">
                                            <h4 class="price-mini__name">{{ $item['nama'] }}</h4>
                                            <p class="price-mini__price">
                                                <span>Rp</span>{{ number_format($item['harga'], 0, ',', '.') }}
                                            </p>
                                        </div>
                                        <ul class="price-mini__features">
                                            @foreach ($item['fitur'] as $fitur)
                                                <li>{{ $fitur }}</li>
                                            @endforeach
                                        </ul>
                                        <a class="price-mini__link" href="{{ route('booking') }}">Pesan paket ini</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================
             FAQ
        ============================================================ --}}
        <section class="muja-section faq-section" id="faq">
            <div class="muja-container">
                <div class="faq-header">
                    <span class="section-label">Pertanyaan Umum</span>
                    <h2 class="section-heading">Sebelum Anda <em>Memesan</em></h2>
                    <div class="gold-line gold-line--center"></div>
                </div>

                <div class="faq-list">
                    @foreach ($faq as $item)
                        <details class="faq-item">
                            <summary>{{ $item['tanya'] }}</summary>
                            <p class="faq-answer">{{ $item['jawab'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================================================
             CTA — Booking + Kontak
        ============================================================ --}}
        <section class="muja-section cta-section" id="booking-cta" style="padding: 0;">
            <div class="cta-bg">
                <picture>
                    <source media="(max-width: 600px)" srcset="{{ asset('img/hero/mjp_2682-600.webp') }}"
                        type="image/webp">
                    <source media="(max-width: 1200px)" srcset="{{ asset('img/hero/mjp_2682-1200.webp') }}"
                        type="image/webp">
                    <img src="{{ asset('img/hero/mjp_2682.webp') }}"
                        alt="Pengantin tertawa bersama di depan lampu gantung — MujaPhotography" loading="lazy">
                </picture>
            </div>
            <div class="cta-content">
                <p class="cta-ornament">— ✦ —</p>
                <h2 class="cta-heading">
                    Sudah Menemukan<br>Paket <em>Anda?</em>
                </h2>
                <p class="cta-body">
                    Amankan tanggal sebelum jadwal penuh. Konsultasi gratis, tanpa
                    komitmen — cukup mulai dari satu percakapan.
                </p>
                <div>
                    <a href="{{ route('booking') }}" class="btn-gold">Pesan Sekarang</a>
                    <a href="{{ route('kontak') }}" class="btn-outline-gold">Hubungi Kami</a>
                </div>
                <p class="cta-contact">
                    WhatsApp 0857-0671-7773 · mujaphotographyy@gmail.com
                </p>
            </div>
        </section>

    </main>

    @include('partials.site-footer')

@endsection
