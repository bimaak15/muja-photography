@extends('layouts.admin')

@section('title', 'Buat Booking Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-7">

    <!-- Header Breadcrumb & Title -->
    <div>
        <div class="flex items-center gap-2 text-xs text-admin-muted mb-2">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-white">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.booking') }}" class="hover:text-white">Bookings</a>
            <span>/</span>
            <span class="text-admin-gold">Buat Booking Baru</span>
        </div>
        <h1 class="text-2xl font-semibold text-white tracking-tight">Buat Booking Baru</h1>
        <p class="text-xs text-admin-muted mt-0.5">Lengkapi detail reservasi pemotretan klien untuk sistem studio MUJA.</p>
    </div>

    <!-- Stepper Indicator (Gold Bar Progress) -->
    <div class="grid grid-cols-5 gap-2">
        <div class="h-1 bg-admin-gold rounded-full"></div>
        <div class="h-1 bg-admin-gold/40 rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
    </div>

    <!-- Step 1: Data Pelanggan -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">1</span>
                <h3 class="text-sm font-semibold text-white">Data Pelanggan</h3>
            </div>
            <span class="text-[0.68rem] bg-white/[0.05] text-admin-muted px-2 py-0.5 rounded">Wajib Diisi</span>
        </div>

        <div class="flex items-center gap-2 text-xs text-admin-muted">
            <input type="checkbox" id="existing_cust" class="rounded bg-[#17171a] border-admin text-admin-gold focus:ring-0">
            <label for="existing_cust" class="cursor-pointer">Pelanggan Terdaftar Sebelumnya</label>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-1">
            <div class="md:col-span-2">
                <label class="block text-xs font-medium text-admin-muted mb-1.5">Nama Lengkap *</label>
                <div class="relative">
                    <i data-lucide="user" class="w-4 h-4 text-admin-dim absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                    <input type="text" value="Diana Olivia" placeholder="Contoh: Diana Olivia" class="admin-input pl-10">
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-admin-muted mb-1.5">WhatsApp / Seluler *</label>
                <div class="relative">
                    <i data-lucide="phone" class="w-4 h-4 text-admin-dim absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                    <input type="text" value="+62 812-3498-7712" placeholder="+62 8..." class="admin-input pl-10">
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-admin-muted mb-1.5">Alamat Email *</label>
                <div class="relative">
                    <i data-lucide="mail" class="w-4 h-4 text-admin-dim absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                    <input type="email" value="diana.olivia@gmail.com" placeholder="email@contoh.com" class="admin-input pl-10">
                </div>
            </div>
        </div>
    </div>

    <!-- Step 2: Pilih Paket Foto -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">2</span>
                <h3 class="text-sm font-semibold text-white">Pilih Paket Foto</h3>
            </div>
            <a href="{{ route('admin.packages') }}" class="text-xs text-admin-gold hover:underline">Katalog Lengkap</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Paket 1 (Selected) -->
            <label class="cursor-pointer border-2 border-admin-gold bg-admin-gold-bg/20 rounded-xl p-4.5 flex flex-col justify-between relative transition-all">
                <input type="radio" name="selected_package" checked class="hidden">
                <div class="flex items-start justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-admin-gold block mb-1">Pilihan</span>
                        <h4 class="text-base font-semibold text-white">Portrait Premium</h4>
                        <p class="text-xs text-admin-muted mt-1">Sesi individu personal & profesional</p>
                    </div>
                    <div class="w-5 h-5 rounded-full bg-admin-gold flex items-center justify-center text-[#0d0d0d]">
                        <i data-lucide="check" class="w-3.5 h-3.5"></i>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-admin-gold/30 flex items-baseline justify-between">
                    <span class="text-xs text-admin-dim">Tarif Paket</span>
                    <span class="text-lg font-bold text-white">Rp 450.000</span>
                </div>
            </label>

            <!-- Paket 2 -->
            <label class="cursor-pointer border border-admin bg-[#17171a] hover:border-[#38383e] rounded-xl p-4.5 flex flex-col justify-between relative transition-all">
                <input type="radio" name="selected_package" class="hidden">
                <div class="flex items-start justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-admin-dim block mb-1">Paket</span>
                        <h4 class="text-base font-semibold text-white">Family Package</h4>
                        <p class="text-xs text-admin-muted mt-1">Maks. 6 orang anggota keluarga</p>
                    </div>
                    <div class="w-5 h-5 rounded-full border border-admin-dim"></div>
                </div>
                <div class="mt-4 pt-3 border-t border-admin-subtle flex items-baseline justify-between">
                    <span class="text-xs text-admin-dim">Tarif Paket</span>
                    <span class="text-lg font-bold text-white">Rp 850.000</span>
                </div>
            </label>
        </div>
    </div>

    <!-- Step 3: Waktu & Lokasi Sesi -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">3</span>
                <h3 class="text-sm font-semibold text-white">Waktu & Lokasi Sesi</h3>
            </div>
            <span class="text-xs text-admin-dim">Pilih 1 sesi</span>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-xs font-medium text-admin-muted mb-1.5">Pilih Tanggal Reservasi</label>
                <div class="flex items-center justify-between bg-[#17171a] border border-admin px-4 py-3 rounded-lg text-xs">
                    <div class="flex items-center gap-2.5 text-white font-medium">
                        <i data-lucide="calendar" class="w-4 h-4 text-admin-gold"></i>
                        <span>Sabtu, 18 April 2026</span>
                    </div>
                    <span class="text-admin-green text-[0.7rem] bg-admin-green-bg px-2 py-0.5 rounded">4 slot kosong tersedia hari ini</span>
                </div>
            </div>

            <!-- Slots Grid -->
            <div>
                <label class="block text-xs font-medium text-admin-muted mb-2">Slot Jam Tersedia</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div class="p-3 rounded-lg border-2 border-admin-gold bg-admin-gold-bg/20 text-center cursor-pointer">
                        <div class="text-xs font-bold text-white">09.00 - 10.00</div>
                        <div class="text-[0.65rem] text-admin-gold font-semibold uppercase mt-0.5">Terpilih</div>
                    </div>
                    <div class="p-3 rounded-lg border border-admin bg-[#17171a] text-center cursor-pointer hover:border-[#38383e]">
                        <div class="text-xs font-medium text-white">10.30 - 11.30</div>
                        <div class="text-[0.65rem] text-admin-muted mt-0.5">Tersedia</div>
                    </div>
                    <div class="p-3 rounded-lg border border-admin bg-[#131315] opacity-50 text-center cursor-not-allowed">
                        <div class="text-xs font-medium text-admin-dim">13.00 - 14.00</div>
                        <div class="text-[0.65rem] text-admin-red mt-0.5">Penuh</div>
                    </div>
                    <div class="p-3 rounded-lg border border-admin bg-[#17171a] text-center cursor-pointer hover:border-[#38383e]">
                        <div class="text-xs font-medium text-white">15.00 - 16.00</div>
                        <div class="text-[0.65rem] text-admin-muted mt-0.5">Tersedia</div>
                    </div>
                </div>
            </div>

            <!-- Setup Studio / Lokasi -->
            <div>
                <label class="block text-xs font-medium text-admin-muted mb-2">Pilihan Setup Studio / Lokasi</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <label class="cursor-pointer border-2 border-admin-gold bg-admin-gold-bg/15 rounded-lg p-3.5 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <i data-lucide="home" class="w-4 h-4 text-admin-gold"></i>
                            <div>
                                <h5 class="text-xs font-semibold text-white">Studio A (Classic Minimalist)</h5>
                                <p class="text-[0.7rem] text-admin-muted">Background polos (Monochrome/Beige), spotlight dramatis</p>
                            </div>
                        </div>
                        <input type="radio" name="studio_setup" checked class="text-admin-gold">
                    </label>

                    <label class="cursor-pointer border border-admin bg-[#17171a] hover:border-[#38383e] rounded-lg p-3.5 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <i data-lucide="coffee" class="w-4 h-4 text-admin-muted"></i>
                            <div>
                                <h5 class="text-xs font-semibold text-white">Studio B (Warm Bohemian)</h5>
                                <p class="text-[0.7rem] text-admin-muted">Properti kayu, rotan, tirai lembut & dry flower natural</p>
                            </div>
                        </div>
                        <input type="radio" name="studio_setup" class="text-admin-gold">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Step 4: Konsep & Catatan Khusus -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-3">
        <div class="flex items-center gap-2 border-b border-admin-subtle pb-3">
            <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">4</span>
            <h3 class="text-sm font-semibold text-white">Konsep & Catatan Khusus</h3>
        </div>
        <textarea rows="3" class="admin-input text-xs" placeholder="Tema pakaian, properti pribadi, atau catatan lighting...">Tema pakaian business casual dengan blazer hitam & kemeja krem. Membawa laptop sendiri untuk properti foto profile LinkedIn.</textarea>
        <div class="flex justify-between text-[0.68rem] text-admin-dim">
            <span>Maks. 250 karakter</span>
            <span>024/250</span>
        </div>
    </div>

    <!-- Step 5: Skema Pembayaran -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">5</span>
                <h3 class="text-sm font-semibold text-white">Skema Pembayaran</h3>
            </div>
            <span class="badge-gold">DP Wajib 50%</span>
        </div>

        <div class="space-y-2 text-xs">
            <div class="flex justify-between text-admin-muted">
                <span>Total Paket Portrait Premium</span>
                <span class="text-white font-medium">Rp 450.000</span>
            </div>
            <div class="flex justify-between text-admin-muted">
                <span>Biaya Layanan & Administrasi</span>
                <span class="text-admin-green font-medium">GRATIS</span>
            </div>
            <div class="flex justify-between items-baseline pt-3 border-t border-admin-subtle">
                <div>
                    <span class="text-sm font-semibold text-white block">Nominal DP Minimal</span>
                    <span class="text-[0.68rem] text-admin-dim">Pelunasan di studio saat sesi</span>
                </div>
                <span class="text-2xl font-bold text-admin-gold">Rp 225.000</span>
            </div>
        </div>

        <!-- Payment method options -->
        <div class="pt-2">
            <label class="block text-xs font-medium text-admin-muted mb-2">Metode Penagihan DP</label>
            <div class="grid grid-cols-2 gap-3">
                <label class="cursor-pointer border-2 border-admin-gold bg-admin-gold-bg/15 rounded-lg p-3 flex items-center gap-3">
                    <input type="radio" name="pay_method" checked class="text-admin-gold">
                    <div class="text-xs">
                        <div class="font-semibold text-white">QRIS Instan</div>
                        <div class="text-[0.68rem] text-admin-dim">GoPay, OVO, BCA, Mandiri</div>
                    </div>
                </label>
                <label class="cursor-pointer border border-admin bg-[#17171a] rounded-lg p-3 flex items-center gap-3 hover:border-[#38383e]">
                    <input type="radio" name="pay_method" class="text-admin-gold">
                    <div class="text-xs">
                        <div class="font-semibold text-white">Transfer Bank</div>
                        <div class="text-[0.68rem] text-admin-dim">BCA / Mandiri Virtual Acc.</div>
                    </div>
                </label>
            </div>
        </div>
    </div>

    <!-- Submit Action Buttons -->
    <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
        <button type="button" class="btn-admin-gold w-full sm:w-auto justify-center text-sm py-3 px-8">
            <i data-lucide="check-circle" class="w-4 h-4"></i>
            <span>Konfirmasi & Buat Booking</span>
        </button>
        <button type="button" class="btn-admin-ghost w-full sm:w-auto justify-center text-sm py-3 px-6">
            <i data-lucide="save" class="w-4 h-4"></i>
            <span>Simpan sebagai Draft</span>
        </button>
    </div>

    <p class="text-[0.7rem] text-admin-dim text-center">
        Slot waktu otomatis direservasi selama 30 menit untuk pembayaran DP pelanggan.
    </p>

</div>
@endsection

