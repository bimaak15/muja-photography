@extends('layouts.admin')

@section('title', 'Tambah Paket Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-7">

    <!-- Header Breadcrumb & Title -->
    <div>
        <div class="flex items-center gap-2 text-xs text-admin-muted mb-2">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-white">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.packages') }}" class="hover:text-white">Packages</a>
            <span>/</span>
            <span class="text-admin-gold">Tambah Paket Baru</span>
        </div>
        <h1 class="text-2xl font-semibold text-white tracking-tight">Tambah Paket Baru</h1>
        <p class="text-xs text-admin-muted mt-0.5">Buat paket foto eksklusif untuk ditampilkan pada sistem booking dan katalog klien MUJA Photography.</p>
    </div>

    <!-- Stepper Progress Bar -->
    <div class="grid grid-cols-5 gap-2">
        <div class="h-1 bg-admin-gold rounded-full"></div>
        <div class="h-1 bg-admin-gold/40 rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
    </div>

    <!-- 1. Informasi Dasar Paket -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">1</span>
                <h3 class="text-sm font-semibold text-white">Informasi Dasar Paket</h3>
            </div>
            <span class="text-[0.68rem] bg-white/[0.05] text-admin-muted px-2 py-0.5 rounded">Wajib Diisi</span>
        </div>

        <div>
            <label class="block text-xs font-medium text-admin-muted mb-1.5">Nama Paket Foto *</label>
            <input type="text" value="Maternity Glamour & Fine Art" placeholder="Contoh: Graduation Gold Studio" class="admin-input">
        </div>

        <div>
            <label class="block text-xs font-medium text-admin-muted mb-1.5">Kategori Paket *</label>
            <div class="flex flex-wrap gap-2">
                <button type="button" class="btn-admin-ghost text-xs py-1.5 px-3">Portrait</button>
                <button type="button" class="btn-admin-ghost text-xs py-1.5 px-3">Family</button>
                <button type="button" class="btn-admin-ghost text-xs py-1.5 px-3">Graduation</button>
                <button type="button" class="btn-admin-gold text-xs py-1.5 px-3.5">Couple</button>
                <button type="button" class="btn-admin-ghost text-xs py-1.5 px-3">Wedding</button>
                <button type="button" class="btn-admin-ghost text-xs py-1.5 px-3">Commercial</button>
                <button type="button" class="btn-admin-ghost text-xs py-1.5 px-3">Event</button>
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-admin-muted mb-1.5">Deskripsi & Konsep Paket</label>
            <textarea rows="3" class="admin-input text-xs" placeholder="Ceritakan konsep pemotretan, wardrobe, dan suasana yang diusung...">Sesi foto eksklusif bertema maternity mewah dengan pencahayaan fine art studio, gaun satin sutra dan riasan wajah profesional.</textarea>
        </div>
    </div>

    <!-- 2. Harga & Ketentuan Sesi -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center gap-2 border-b border-admin-subtle pb-3">
            <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">2</span>
            <h3 class="text-sm font-semibold text-white">Harga & Ketentuan Sesi</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-admin-muted mb-1.5">Harga Paket (Rp) *</label>
                <input type="text" value="Rp 750.000" class="admin-input font-semibold text-white">
            </div>
            <div>
                <label class="block text-xs font-medium text-admin-muted mb-1.5">Durasi Pemotretan *</label>
                <select class="admin-input">
                    <option>60 Menit</option>
                    <option selected>90 Menit</option>
                    <option>120 Menit</option>
                    <option>Full Day (Wedding)</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-admin-muted mb-2">Minimal Down Payment (DP)</label>
            <div class="grid grid-cols-3 gap-3">
                <button type="button" class="btn-admin-ghost justify-center py-2 text-xs">30%</button>
                <button type="button" class="btn-admin-gold justify-center py-2 text-xs">50%</button>
                <button type="button" class="btn-admin-ghost justify-center py-2 text-xs">100% Lunas</button>
            </div>
        </div>

        <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
            <div>
                <div class="text-xs font-semibold text-white">Izinkan Reschedule Gratis</div>
                <div class="text-[0.68rem] text-admin-dim">Maksimal konfirmasi H-3 sesi pemotretan</div>
            </div>
            <input type="checkbox" checked class="w-4 h-4 rounded text-admin-gold focus:ring-0">
        </div>
    </div>

    <!-- 3. Fasilitas & Output Klien -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">3</span>
                <h3 class="text-sm font-semibold text-white">Fasilitas & Output Klien</h3>
            </div>
            <span class="text-xs text-admin-dim">Termasuk Hasil</span>
        </div>

        <!-- Jumlah Foto Edited -->
        <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
            <div>
                <div class="text-xs font-semibold text-white">Foto Edited & Retouch</div>
                <div class="text-[0.68rem] text-admin-dim">Output resolusi tinggi siap cetak</div>
            </div>
            <div class="flex items-center gap-3">
                <button class="w-7 h-7 rounded border border-admin text-white flex items-center justify-center hover:bg-white/[0.05]">-</button>
                <span class="text-sm font-bold text-admin-gold">15 Foto</span>
                <button class="w-7 h-7 rounded border border-admin text-white flex items-center justify-center hover:bg-white/[0.05]">+</button>
            </div>
        </div>

        <!-- Checkboxes -->
        <div class="space-y-2.5 pt-1">
            <label class="flex items-center gap-3 text-xs text-admin-muted hover:text-white cursor-pointer">
                <input type="checkbox" checked class="rounded text-admin-gold focus:ring-0">
                <span>Semua Master File (RAW / High-Res Google Drive)</span>
            </label>
            <label class="flex items-center gap-3 text-xs text-admin-muted hover:text-white cursor-pointer">
                <input type="checkbox" checked class="rounded text-admin-gold focus:ring-0">
                <span>Studio Indoor AC & Pro Lighting Setup</span>
            </label>
            <label class="flex items-center gap-3 text-xs text-admin-muted hover:text-white cursor-pointer">
                <input type="checkbox" checked class="rounded text-admin-gold focus:ring-0">
                <span>1 Cetak Kanvas 30×40cm + Minimalist Frame</span>
            </label>
            <label class="flex items-center gap-3 text-xs text-admin-muted hover:text-white cursor-pointer">
                <input type="checkbox" class="rounded text-admin-gold focus:ring-0">
                <span>Makeup Artist (MUA) & Professional Hairdo</span>
            </label>
            <label class="flex items-center gap-3 text-xs text-admin-muted hover:text-white cursor-pointer">
                <input type="checkbox" class="rounded text-admin-gold focus:ring-0">
                <span>Kostum / Wardrobe Pilihan Studio (2 Gaun)</span>
            </label>
            <label class="flex items-center gap-3 text-xs text-admin-muted hover:text-white cursor-pointer">
                <input type="checkbox" checked class="rounded text-admin-gold focus:ring-0">
                <span>Konsultasi Konsep, Moodboard & Poses Directing</span>
            </label>
        </div>
    </div>

    <!-- 4. Foto Sampul Katalog -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">4</span>
                <h3 class="text-sm font-semibold text-white">Foto Sampul Katalog</h3>
            </div>
            <span class="text-xs text-admin-dim">Preview Klien</span>
        </div>

        <div class="border-2 border-dashed border-[#2f2f35] rounded-xl p-6 text-center space-y-3 bg-[#131316]">
            <div class="w-12 h-12 rounded-full bg-white/[0.04] text-admin-gold flex items-center justify-center mx-auto">
                <i data-lucide="image" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-xs font-semibold text-white">Unggah Foto Sampul Baru</p>
                <p class="text-[0.7rem] text-admin-dim mt-0.5">Format JPG/PNG maks 5MB. Rasio rekomendasi 16:9 atau 4:3</p>
            </div>
            <button type="button" class="btn-admin-ghost text-xs py-1.5 px-4">
                <i data-lucide="upload" class="w-3.5 h-3.5"></i>
                <span>Pilih Berkas</span>
            </button>
        </div>
    </div>

    <!-- 5. Visibilitas & Penanda -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center gap-2 border-b border-admin-subtle pb-3">
            <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">5</span>
            <h3 class="text-sm font-semibold text-white">Visibilitas & Penanda</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <label class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg cursor-pointer">
                <div>
                    <div class="text-xs font-semibold text-white">Tampilkan di Web</div>
                    <div class="text-[0.68rem] text-admin-dim">Status: Aktif & Publik</div>
                </div>
                <input type="checkbox" checked class="rounded text-admin-gold focus:ring-0">
            </label>

            <label class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg cursor-pointer">
                <div>
                    <div class="text-xs font-semibold text-white">Tandai sebagai Paket Populer</div>
                    <div class="text-[0.68rem] text-admin-dim">Tampilkan lencana 'Best Seller'</div>
                </div>
                <input type="checkbox" checked class="rounded text-admin-gold focus:ring-0">
            </label>
        </div>
    </div>

    <!-- Submit Action -->
    <div class="flex items-center gap-3 pt-2">
        <button type="button" class="btn-admin-gold py-3 px-8 text-sm">
            <i data-lucide="check-circle" class="w-4 h-4"></i>
            <span>Simpan & Publikasikan Paket</span>
        </button>
        <a href="{{ route('admin.packages') }}" class="btn-admin-ghost py-3 px-6 text-sm">
            Batal
        </a>
    </div>

</div>
@endsection

