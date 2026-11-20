@extends('layouts.app')

@section('title', 'Form Pemesanan Paket')
@section('meta_description', 'Formulir pemesanan paket fotografi MujaPhotography. Lengkapi data diri, pilih jadwal sesi, dan lanjutkan ke pembayaran aman lewat Midtrans.')

@push('page_styles')
    <link rel="stylesheet" href="{{ asset('booking.css') }}">
@endpush

@section('content')
    @include('partials.site-header')

    <main class="booking-page">
        <div class="booking-page__bg" aria-hidden="true">
            <img src="{{ asset('SCRL_0046.webp') }}" alt="" loading="lazy">
        </div>

        <div class="booking-wrap">
            <!-- Header -->
            <div class="booking-header">
                <span class="section-label">Reservasi Sesi</span>
                <h1 class="booking-title">
                    Lengkapi Data <em>Pemesanan</em>
                </h1>
                <div class="gold-line gold-line--center"></div>
                <p class="booking-subtitle">
                    Isi informasi diri dan jadwal acara Anda di bawah ini. Setelah itu Anda akan langsung diarahkan ke halaman pembayaran Midtrans.
                </p>
            </div>

            @if ($errors->any())
                <div class="booking-alert">
                    <strong>Mohon periksa kembali isian Anda:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('booking.store') }}" class="booking-layout">
                @csrf

                <!-- Form Data Pemesan & Jadwal -->
                <div class="booking-card">
                    <div class="booking-section-head">
                        <h2 class="booking-section-title">1. Pilih Paket &amp; Jadwal</h2>
                    </div>

                    <div class="booking-field">
                        <label for="package_id" class="booking-label">Paket Fotografi *</label>
                        <select id="package_id" name="package_id" required class="booking-select">
                            @foreach ($packages as $pkg)
                                <option value="{{ $pkg->id }}"
                                        data-price="{{ $pkg->price }}"
                                        data-dp="{{ $pkg->deposit_percentage }}"
                                        data-name="{{ $pkg->name }}"
                                        data-category="{{ $pkg->category }}"
                                        data-features="{{ json_encode($pkg->features ?? []) }}"
                                        @selected(old('package_id', $selectedPackage?->id) == $pkg->id)>
                                    {{ $pkg->name }} - Rp {{ number_format($pkg->price, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="booking-row">
                        <div class="booking-field">
                            <label for="session_date" class="booking-label">Tanggal Acara / Sesi *</label>
                            <input id="session_date"
                                   type="date"
                                   name="session_date"
                                   min="{{ date('Y-m-d') }}"
                                   value="{{ old('session_date') }}"
                                   required
                                   class="booking-input">
                        </div>
                        <div class="booking-field">
                            <label for="start_time" class="booking-label">Jam Mulai *</label>
                            <input id="start_time"
                                   type="time"
                                   name="start_time"
                                   value="{{ old('start_time', '09:00') }}"
                                   required
                                   class="booking-input">
                        </div>
                    </div>

                    <div class="booking-section-head booking-section-divider">
                        <h2 class="booking-section-title">2. Data Diri Pemesan</h2>
                    </div>

                    <div class="booking-row">
                        <div class="booking-field">
                            <label for="name" class="booking-label">Nama Lengkap *</label>
                            <input id="name"
                                   type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                                   placeholder="Nama sesuai KTP / panggilan"
                                   class="booking-input">
                        </div>
                        <div class="booking-field">
                            <label for="phone" class="booking-label">No. WhatsApp / Telepon *</label>
                            <input id="phone"
                                   type="tel"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   required
                                   placeholder="08xxxxxxxxxx"
                                   class="booking-input">
                        </div>
                    </div>

                    <div class="booking-row">
                        <div class="booking-field">
                            <label for="email" class="booking-label">Alamat Email *</label>
                            <input id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   placeholder="email@contoh.com"
                                   class="booking-input">
                        </div>
                        <div class="booking-field">
                            <label for="instagram" class="booking-label">Instagram (Opsional)</label>
                            <input id="instagram"
                                   type="text"
                                   name="instagram"
                                   value="{{ old('instagram') }}"
                                   placeholder="@username"
                                   class="booking-input">
                        </div>
                    </div>

                    <div class="booking-field">
                        <label for="address" class="booking-label">Alamat Lengkap / Lokasi Acara *</label>
                        <textarea id="address"
                                  name="address"
                                  rows="3"
                                  required
                                  placeholder="Tuliskan alamat lengkap rumah atau nama gedung lokasi pemotretan"
                                  class="booking-textarea">{{ old('address') }}</textarea>
                    </div>

                    <div class="booking-field">
                        <label for="notes" class="booking-label">Catatan Tambahan (Opsional)</label>
                        <textarea id="notes"
                                  name="notes"
                                  rows="2"
                                  placeholder="Contoh: konsep foto, warna busana, atau request khusus"
                                  class="booking-textarea">{{ old('notes') }}</textarea>
                    </div>

                    <div class="booking-section-head booking-section-divider">
                        <h2 class="booking-section-title">3. Opsi Pembayaran</h2>
                    </div>

                    <div class="booking-pay-options">
                        <label class="booking-pay-option">
                            <input type="radio"
                                   name="payment_type"
                                   value="deposit"
                                   @checked(old('payment_type', 'deposit') === 'deposit')>
                            <div>
                                <span class="booking-pay-option__title">Down Payment (DP 30%)</span>
                                <span class="booking-pay-option__desc">Kunci tanggal terlebih dahulu, sisa dibayar saat hari H.</span>
                            </div>
                        </label>

                        <label class="booking-pay-option">
                            <input type="radio"
                                   name="payment_type"
                                   value="full"
                                   @checked(old('payment_type') === 'full')>
                            <div>
                                <span class="booking-pay-option__title">Bayar Lunas (100%)</span>
                                <span class="booking-pay-option__desc">Langsung selesaikan seluruh tagihan paket sekarang.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Ringkasan Paket & Tagihan -->
                <aside class="booking-card booking-card--summary">
                    <span class="booking-summary-tag">Ringkasan Pesanan</span>
                    <h3 id="summary-name" class="booking-summary-name">
                        {{ $selectedPackage?->name ?? 'Pilih Paket' }}
                    </h3>
                    <p id="summary-category" class="booking-summary-cat">
                        {{ $selectedPackage?->category ?? '' }}
                    </p>

                    <ul id="summary-features" class="booking-summary-features">
                        @foreach (($selectedPackage?->features ?? []) as $feat)
                            <li>
                                <span>✦</span>
                                <span>{{ $feat }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="booking-summary-calc">
                        <div class="booking-summary-line">
                            <span>Harga Paket</span>
                            <span id="summary-total">Rp {{ number_format($selectedPackage?->price ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="booking-summary-line">
                            <span>Jenis Pembayaran</span>
                            <span id="summary-type">DP (30%)</span>
                        </div>
                        <div class="booking-summary-total">
                            <span class="booking-summary-total__label">Tagihan Sekarang</span>
                            <span id="summary-pay-now" class="booking-summary-total__amount">
                                Rp {{ number_format((int) round(($selectedPackage?->price ?? 0) * 0.3), 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="booking-submit-btn">
                        Lanjutkan ke Pembayaran
                    </button>

                    <p class="booking-footnote">
                        Pembayaran aman melalui Midtrans (QRIS, Transfer Bank Virtual Account, GoPay, OVO, Kartu Kredit).
                    </p>
                </aside>
            </form>
        </div>
    </main>

    @include('partials.site-footer')
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectEl = document.getElementById('package_id');
        const radios = document.querySelectorAll('input[name="payment_type"]');
        const summaryName = document.getElementById('summary-name');
        const summaryCategory = document.getElementById('summary-category');
        const summaryFeatures = document.getElementById('summary-features');
        const summaryTotal = document.getElementById('summary-total');
        const summaryType = document.getElementById('summary-type');
        const summaryPayNow = document.getElementById('summary-pay-now');

        function formatRupiah(num) {
            return 'Rp ' + Number(num).toLocaleString('id-ID');
        }

        function updateSummary() {
            const opt = selectEl.options[selectEl.selectedIndex];
            if (!opt) return;

            const price = parseInt(opt.dataset.price || '0', 10);
            const dpPct = parseInt(opt.dataset.dp || '30', 10);
            const features = JSON.parse(opt.dataset.features || '[]');
            const selectedPayType = document.querySelector('input[name="payment_type"]:checked')?.value || 'deposit';

            summaryName.textContent = opt.dataset.name || '';
            summaryCategory.textContent = opt.dataset.category || '';
            summaryTotal.textContent = formatRupiah(price);

            summaryFeatures.innerHTML = '';
            features.forEach(function (f) {
                const li = document.createElement('li');
                li.innerHTML = '<span>✦</span><span></span>';
                li.querySelector('span:last-child').textContent = f;
                summaryFeatures.appendChild(li);
            });

            if (selectedPayType === 'deposit') {
                summaryType.textContent = 'DP (' + dpPct + '%)';
                summaryPayNow.textContent = formatRupiah(Math.round(price * (dpPct / 100)));
            } else {
                summaryType.textContent = 'Bayar Lunas (100%)';
                summaryPayNow.textContent = formatRupiah(price);
            }
        }

        selectEl.addEventListener('change', updateSummary);
        radios.forEach(function (r) {
            r.addEventListener('change', updateSummary);
        });
        updateSummary();
    });
</script>
@endpush
