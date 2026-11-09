@extends('layouts.admin')

@section('title', 'Tambah Jadwal Sesi')

@section('content')
<div class="max-w-4xl mx-auto space-y-7">

    <!-- Header Breadcrumb & Title -->
    <div>
        <div class="flex items-center gap-2 text-xs text-admin-muted mb-2">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-white">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.schedule') }}" class="hover:text-white">Schedule</a>
            <span>/</span>
            <span class="text-admin-gold">Tambah Jadwal Baru</span>
        </div>
        <h1 class="text-2xl font-semibold text-white tracking-tight">Tambah Jadwal Sesi</h1>
        <p class="text-xs text-admin-muted mt-0.5">Atur jadwal pemotretan baru, alokasi fotografer, serta ketersediaan studio MUJA.</p>
    </div>

    <!-- Stepper Progress Bar -->
    <div class="grid grid-cols-5 gap-2">
        <div class="h-1 bg-admin-gold rounded-full"></div>
        <div class="h-1 bg-admin-gold/40 rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
        <div class="h-1 bg-white/[0.08] rounded-full"></div>
    </div>

    <!-- 1. Jenis & Detail Sesi -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">1</span>
                <h3 class="text-sm font-semibold text-white">Jenis & Detail Sesi</h3>
            </div>
            <i data-lucide="sliders" class="w-4 h-4 text-admin-dim"></i>
        </div>

        <!-- Toggle Jenis Sesi -->
        <div class="grid grid-cols-2 gap-3 bg-[#131316] p-1.5 rounded-lg border border-admin">
            <button type="button" class="btn-admin-gold justify-center py-2 text-xs">
                <i data-lucide="camera" class="w-3.5 h-3.5"></i>
                <span>Pemotretan Klien</span>
            </button>
            <button type="button" class="text-admin-muted hover:text-white py-2 text-xs font-medium flex items-center justify-center gap-1.5">
                <i data-lucide="wrench" class="w-3.5 h-3.5"></i>
                <span>Maintenance</span>
            </button>
        </div>

        <!-- Cari Klien & Paket Connected Card -->
        <div class="space-y-3 pt-1">
            <label class="block text-xs font-medium text-admin-muted">Cari Klien / No. Reservasi</label>
            <div class="flex items-center justify-between bg-[#17171a] border border-admin p-3 rounded-lg text-xs">
                <div class="flex items-center gap-2.5">
                    <i data-lucide="search" class="w-4 h-4 text-admin-dim"></i>
                    <span class="text-white font-medium">Diana Olivia (#BK-0128)</span>
                </div>
                <span class="badge-confirmed text-[0.68rem]">Terhubung</span>
            </div>

            <!-- Connected Package Pill -->
            <div class="flex items-center justify-between bg-admin-gold-bg/15 border border-admin-gold/30 p-3.5 rounded-lg text-xs">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-admin-gold/20 text-admin-gold flex items-center justify-center">
                        <i data-lucide="package" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <div class="text-white font-semibold">Portrait Premium</div>
                        <div class="text-[0.68rem] text-admin-muted">Studio A • 1 Jam Sesi</div>
                    </div>
                </div>
                <div class="text-sm font-bold text-white">Rp 1.450.000</div>
            </div>
        </div>
    </div>

    <!-- 2. Waktu & Tanggal Pemotretan -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">2</span>
                <h3 class="text-sm font-semibold text-white">Waktu & Tanggal Pemotretan</h3>
            </div>
            <i data-lucide="calendar" class="w-4 h-4 text-admin-dim"></i>
        </div>

        <div>
            <div class="text-[0.68rem] font-bold text-admin-gold tracking-widest uppercase mb-1">Tanggal Terpilih</div>
            <div class="text-base font-semibold text-white mb-3">Selasa, 14 April 2026</div>

            <!-- Mini Day Selector Pills (Sen 13 -> Kam 16) -->
            <div class="grid grid-cols-4 gap-3">
                <div class="p-2.5 rounded-lg border border-admin bg-[#17171a] text-center cursor-pointer hover:border-[#38383e]">
                    <div class="text-[0.68rem] text-admin-dim uppercase">Sen</div>
                    <div class="text-sm font-bold text-white">13</div>
                </div>
                <div class="p-2.5 rounded-lg border-2 border-admin-gold bg-admin-gold-bg/25 text-center cursor-pointer">
                    <div class="text-[0.68rem] text-admin-gold uppercase font-bold">Sel</div>
                    <div class="text-sm font-bold text-white">14</div>
                </div>
                <div class="p-2.5 rounded-lg border border-admin bg-[#17171a] text-center cursor-pointer hover:border-[#38383e]">
                    <div class="text-[0.68rem] text-admin-dim uppercase">Rab</div>
                    <div class="text-sm font-bold text-white">15</div>
                </div>
                <div class="p-2.5 rounded-lg border border-admin bg-[#17171a] text-center cursor-pointer hover:border-[#38383e]">
                    <div class="text-[0.68rem] text-admin-dim uppercase">Kam</div>
                    <div class="text-sm font-bold text-white">16</div>
                </div>
            </div>
        </div>

        <!-- Start & End Time Input Boxes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
            <div class="bg-[#17171a] border border-admin rounded-lg p-3.5">
                <span class="text-[0.68rem] text-admin-dim block mb-1">Mulai</span>
                <div class="flex items-center gap-2 text-lg font-bold text-white">
                    <i data-lucide="clock" class="w-4 h-4 text-admin-gold"></i>
                    <span>09.00</span>
                    <span class="text-xs text-admin-dim font-normal">WIB</span>
                </div>
            </div>
            <div class="bg-[#17171a] border border-admin rounded-lg p-3.5">
                <span class="text-[0.68rem] text-admin-dim block mb-1">Selesai</span>
                <div class="flex items-center gap-2 text-lg font-bold text-white">
                    <i data-lucide="clock" class="w-4 h-4 text-admin-gold"></i>
                    <span>10.00</span>
                    <span class="text-xs text-admin-dim font-normal">WIB</span>
                </div>
            </div>
        </div>

        <!-- Duration & Conflict Status Alert -->
        <div class="flex items-center justify-between text-xs text-admin-muted pt-1">
            <span>Total Durasi Pemakaian:</span>
            <span class="text-white font-semibold">60 Menit (1 Jam Sesi)</span>
        </div>

        <div class="flex items-center gap-2 bg-admin-green-bg border border-admin-green/30 p-3 rounded-lg text-xs text-admin-green">
            <i data-lucide="check-circle-2" class="w-4 h-4 shrink-0"></i>
            <span>Slot Waktu Tersedia (Tidak Ada Bentrok Jadwal)</span>
        </div>
    </div>

    <!-- 3. Alokasi Studio & Fotografer -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">3</span>
                <h3 class="text-sm font-semibold text-white">Alokasi Studio & Fotografer</h3>
            </div>
            <i data-lucide="camera" class="w-4 h-4 text-admin-dim"></i>
        </div>

        <!-- Ruang Studio Options -->
        <div>
            <label class="block text-xs font-medium text-admin-muted mb-2">Pilih Ruang Studio</label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <!-- Studio A (Selected) -->
                <label class="cursor-pointer border-2 border-admin-gold bg-admin-gold-bg/15 rounded-lg p-3.5 flex flex-col justify-between">
                    <div class="flex items-start justify-between">
                        <span class="w-7 h-7 rounded-lg bg-admin-gold text-[#0d0d0d] font-bold text-xs flex items-center justify-center">A</span>
                        <span class="badge-confirmed text-[0.62rem]">Aktif</span>
                    </div>
                    <div class="mt-3">
                        <div class="text-xs font-semibold text-white">Studio A</div>
                        <div class="text-[0.68rem] text-admin-muted mt-0.5 leading-snug">Main Indoor AC & Dramatic Spotlight</div>
                    </div>
                    <input type="radio" name="studio_room" checked class="hidden">
                </label>

                <!-- Studio B -->
                <label class="cursor-pointer border border-admin bg-[#17171a] rounded-lg p-3.5 flex flex-col justify-between hover:border-[#38383e]">
                    <div class="flex items-start justify-between">
                        <span class="w-7 h-7 rounded-lg bg-white/[0.05] text-white font-bold text-xs flex items-center justify-center">B</span>
                    </div>
                    <div class="mt-3">
                        <div class="text-xs font-semibold text-white">Studio B</div>
                        <div class="text-[0.68rem] text-admin-muted mt-0.5 leading-snug">Warm Bohemian & Natural Light</div>
                    </div>
                    <input type="radio" name="studio_room" class="hidden">
                </label>

                <!-- Outdoor -->
                <label class="cursor-pointer border border-admin bg-[#17171a] rounded-lg p-3.5 flex flex-col justify-between hover:border-[#38383e]">
                    <div class="flex items-start justify-between">
                        <span class="w-7 h-7 rounded-lg bg-white/[0.05] text-white font-bold text-xs flex items-center justify-center">
                            <i data-lucide="sun" class="w-3.5 h-3.5"></i>
                        </span>
                    </div>
                    <div class="mt-3">
                        <div class="text-xs font-semibold text-white">Outdoor / On-Location</div>
                        <div class="text-[0.68rem] text-admin-muted mt-0.5 leading-snug">Garden area & Rooftop View</div>
                    </div>
                    <input type="radio" name="studio_room" class="hidden">
                </label>
            </div>
        </div>

        <!-- Fotografer & Kru Allocations -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
            <div>
                <label class="block text-xs font-medium text-admin-muted mb-1.5">Fotografer Utama</label>
                <div class="flex items-center justify-between bg-[#17171a] border border-admin p-3 rounded-lg text-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-admin-gold/20 text-admin-gold font-bold text-xs flex items-center justify-center">
                            AR
                        </div>
                        <div>
                            <div class="text-white font-medium">Arif Rahman</div>
                            <div class="text-[0.68rem] text-admin-dim">Lead Photographer • Studio Portrait</div>
                        </div>
                    </div>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-admin-dim"></i>
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-admin-muted mb-1.5">Kru Lighting / Asisten</label>
                <div class="flex items-center justify-between bg-[#17171a] border border-admin p-3 rounded-lg text-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-white/[0.05] text-admin-muted font-bold text-xs flex items-center justify-center">
                            RN
                        </div>
                        <div>
                            <div class="text-white font-medium">Rian</div>
                            <div class="text-[0.68rem] text-admin-dim">Lighting & Tech Crew</div>
                        </div>
                    </div>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-admin-dim"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Status Jadwal & Kesiapan -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">4</span>
                <h3 class="text-sm font-semibold text-white">Status Jadwal & Kesiapan</h3>
            </div>
            <i data-lucide="help-circle" class="w-4 h-4 text-admin-dim"></i>
        </div>

        <div>
            <label class="block text-xs font-medium text-admin-muted mb-2">Status Sesi</label>
            <div class="grid grid-cols-3 gap-3">
                <button type="button" class="py-2.5 rounded-lg border-2 border-admin-green bg-admin-green-bg text-admin-green font-semibold text-xs flex items-center justify-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-admin-green"></span>
                    <span>Confirmed</span>
                </button>
                <button type="button" class="py-2.5 rounded-lg border border-admin bg-[#17171a] text-admin-muted text-xs hover:text-white flex items-center justify-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-admin-yellow"></span>
                    <span>Pending</span>
                </button>
                <button type="button" class="py-2.5 rounded-lg border border-admin bg-[#17171a] text-admin-muted text-xs hover:text-white flex items-center justify-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-admin-dim"></span>
                    <span>Hold</span>
                </button>
            </div>
        </div>

        <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
            <div class="flex items-center gap-3">
                <i data-lucide="lightbulb" class="w-4 h-4 text-admin-gold"></i>
                <div>
                    <div class="text-xs font-semibold text-white">Studio Lighting & Backdrop Setup</div>
                    <div class="text-[0.68rem] text-admin-dim">Alat dan lighting dipersiapkan 30m sebelum sesi</div>
                </div>
            </div>
            <input type="checkbox" checked class="w-4 h-4 rounded text-admin-gold focus:ring-0">
        </div>
    </div>

    <!-- 5. Catatan Tambahan Sesi -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-3">
        <div class="flex items-center gap-2 border-b border-admin-subtle pb-3">
            <span class="w-6 h-6 rounded-full bg-admin-gold/20 text-admin-gold text-xs font-semibold flex items-center justify-center">5</span>
            <h3 class="text-sm font-semibold text-white">Catatan Tambahan Sesi</h3>
        </div>
        <textarea rows="3" class="admin-input text-xs">Sesi portrait solo studio. Klien membawa 2 gaun alternatif. Membutuhkan pencahayaan low-key dramatic spotlight.</textarea>
        <div class="flex justify-between text-[0.68rem] text-admin-dim">
            <span>Instruksi internal kru & fotografer</span>
            <span>108/300</span>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
        <button type="button" class="btn-admin-gold w-full sm:w-auto justify-center text-sm py-3 px-8">
            <i data-lucide="calendar-plus" class="w-4 h-4"></i>
            <span>Simpan & Jadwalkan Sesi</span>
        </button>
        <a href="{{ route('admin.schedule') }}" class="btn-admin-ghost w-full sm:w-auto justify-center text-sm py-3 px-6">
            Batal
        </a>
    </div>

    <p class="text-[0.7rem] text-admin-dim text-center">
        Notifikasi jadwal akan otomatis disinkronkan ke kalender studio dan WhatsApp fotografer terkait.
    </p>

</div>
@endsection

