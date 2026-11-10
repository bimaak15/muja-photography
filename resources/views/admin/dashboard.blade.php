@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-7 max-w-7xl mx-auto">

    <!-- Top Greeting Banner -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-white tracking-tight">Good Morning, Admin!</h1>
            <p class="text-xs text-admin-muted mt-0.5">Here's what's happening with your studio today.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.booking.create') }}" class="btn-admin-gold">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Booking Baru</span>
            </a>
        </div>
    </div>

    <!-- 4 Stats Cards (from Figma: Total Booking, Total Pelanggan, Paket Terjual, Total Pendapatan) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1: Total Booking -->
        <div class="bg-admin-card border border-admin rounded-xl p-5 hover:border-[#333338] transition-colors relative overflow-hidden group">
            <div class="flex items-center justify-between text-admin-muted mb-3">
                <span class="text-xs font-medium">Total Booking</span>
                <div class="w-8 h-8 rounded-lg bg-white/[0.04] flex items-center justify-center text-admin-gold">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-2xl font-bold text-white tracking-tight">24</h3>
            </div>
            <div class="flex items-center gap-1.5 mt-2 text-[0.72rem]">
                <span class="text-admin-green font-medium flex items-center">
                    <i data-lucide="trending-up" class="w-3 h-3 inline mr-0.5"></i>+12%
                </span>
                <span class="text-admin-dim">from last week</span>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[2px] bg-gradient-to-r from-transparent via-admin-gold/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </div>

        <!-- Card 2: Total Pelanggan -->
        <div class="bg-admin-card border border-admin rounded-xl p-5 hover:border-[#333338] transition-colors relative overflow-hidden group">
            <div class="flex items-center justify-between text-admin-muted mb-3">
                <span class="text-xs font-medium">Total Pelanggan</span>
                <div class="w-8 h-8 rounded-lg bg-white/[0.04] flex items-center justify-center text-admin-gold">
                    <i data-lucide="users" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-2xl font-bold text-white tracking-tight">18</h3>
            </div>
            <div class="flex items-center gap-1.5 mt-2 text-[0.72rem]">
                <span class="text-admin-green font-medium flex items-center">
                    <i data-lucide="trending-up" class="w-3 h-3 inline mr-0.5"></i>+12%
                </span>
                <span class="text-admin-dim">from last week</span>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[2px] bg-gradient-to-r from-transparent via-admin-gold/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </div>

        <!-- Card 3: Paket Terjual -->
        <div class="bg-admin-card border border-admin rounded-xl p-5 hover:border-[#333338] transition-colors relative overflow-hidden group">
            <div class="flex items-center justify-between text-admin-muted mb-3">
                <span class="text-xs font-medium">Paket Terjual</span>
                <div class="w-8 h-8 rounded-lg bg-white/[0.04] flex items-center justify-center text-admin-gold">
                    <i data-lucide="package" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-2xl font-bold text-white tracking-tight">32</h3>
            </div>
            <div class="flex items-center gap-1.5 mt-2 text-[0.72rem]">
                <span class="text-admin-green font-medium flex items-center">
                    <i data-lucide="trending-up" class="w-3 h-3 inline mr-0.5"></i>+12%
                </span>
                <span class="text-admin-dim">from last week</span>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[2px] bg-gradient-to-r from-transparent via-admin-gold/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </div>

        <!-- Card 4: Total Pendapatan -->
        <div class="bg-admin-card border border-admin rounded-xl p-5 hover:border-[#333338] transition-colors relative overflow-hidden group">
            <div class="flex items-center justify-between text-admin-muted mb-3">
                <span class="text-xs font-medium">Total Pendapatan</span>
                <div class="w-8 h-8 rounded-lg bg-white/[0.04] flex items-center justify-center text-admin-gold">
                    <i data-lucide="wallet" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-xl font-bold text-white tracking-tight">Rp 9.600.000</h3>
            </div>
            <div class="flex items-center gap-1.5 mt-2 text-[0.72rem]">
                <span class="text-admin-green font-medium flex items-center">
                    <i data-lucide="trending-up" class="w-3 h-3 inline mr-0.5"></i>+12%
                </span>
                <span class="text-admin-dim">from last week</span>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[2px] bg-gradient-to-r from-transparent via-admin-gold/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </div>
    </div>

    <!-- Charts Row: Tingkat Booking 7 Hari Terakhir & Paket Terpopuler -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Line Chart: Tingkat Booking 7 Hari Terakhir -->
        <div class="lg:col-span-2 bg-admin-card border border-admin rounded-xl p-6 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-semibold text-white">Tingkat Booking 7 Hari Terakhir</h3>
                    <p class="text-xs text-admin-dim">Grafik fluktuasi sesi foto per hari</p>
                </div>
                <div class="flex items-center gap-1 text-[0.7rem] bg-[#1a1a1d] px-2.5 py-1 rounded-md text-admin-muted">
                    <span class="w-2 h-2 rounded-full bg-admin-gold inline-block"></span>
                    <span>Sesi Booking</span>
                </div>
            </div>

            <!-- Line Chart SVG Reproduction -->
            <div class="h-56 w-full relative pt-4 flex items-end">
                <svg class="w-full h-full overflow-visible" viewBox="0 0 500 180" preserveAspectRatio="none">
                    <!-- Grid Lines -->
                    <line x1="0" y1="20" x2="500" y2="20" stroke="#222226" stroke-dasharray="4 4" />
                    <line x1="0" y1="70" x2="500" y2="70" stroke="#222226" stroke-dasharray="4 4" />
                    <line x1="0" y1="120" x2="500" y2="120" stroke="#222226" stroke-dasharray="4 4" />
                    <line x1="0" y1="170" x2="500" y2="170" stroke="#222226" />

                    <!-- Area Glow -->
                    <defs>
                        <linearGradient id="goldGradient" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#c9a96e" stop-opacity="0.25" />
                            <stop offset="100%" stop-color="#c9a96e" stop-opacity="0.0" />
                        </linearGradient>
                    </defs>

                    <!-- Filled Area -->
                    <polygon points="0,170 30,170 80,120 130,140 180,95 230,115 280,75 330,85 380,55 430,70 480,35 480,170 0,170" fill="url(#goldGradient)" />

                    <!-- Line -->
                    <polyline points="0,170 30,170 80,120 130,140 180,95 230,115 280,75 330,85 380,55 430,70 480,35"
                              fill="none" stroke="#c9a96e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />

                    <!-- Peak Point with glow -->
                    <circle cx="480" cy="35" r="4.5" fill="#f5e1b8" stroke="#c9a96e" stroke-width="2" />
                </svg>
            </div>

            <!-- X Axis Dates -->
            <div class="flex justify-between text-[0.68rem] text-admin-dim pt-3 border-t border-admin-subtle mt-2">
                <span>26 Apr</span>
                <span>27 Apr</span>
                <span>28 Apr</span>
                <span>29 Apr</span>
                <span>30 Apr</span>
                <span>01 Mei</span>
                <span>02 Mei</span>
            </div>
        </div>

        <!-- Donut Chart: Paket Terpopuler -->
        <div class="bg-admin-card border border-admin rounded-xl p-6 flex flex-col justify-between">
            <div>
                <h3 class="text-sm font-semibold text-white">Paket Terpopuler</h3>
                <p class="text-xs text-admin-dim">Distribusi pemesanan paket studio</p>
            </div>

            <!-- Donut Visual (CSS/SVG Circle) -->
            <div class="my-6 flex items-center justify-center relative">
                <svg class="w-36 h-36 transform -rotate-90" viewBox="0 0 100 100">
                    <!-- Background circle -->
                    <circle cx="50" cy="50" r="38" stroke="#222226" stroke-width="12" fill="none" />
                    <!-- Graduation (50%) -->
                    <circle cx="50" cy="50" r="38" stroke="#c9a96e" stroke-width="12" fill="none"
                            stroke-dasharray="119.38 238.76" stroke-dashoffset="0" />
                    <!-- Portrait (22%) -->
                    <circle cx="50" cy="50" r="38" stroke="#9a783e" stroke-width="12" fill="none"
                            stroke-dasharray="52.52 238.76" stroke-dashoffset="-119.38" />
                    <!-- Family (15%) -->
                    <circle cx="50" cy="50" r="38" stroke="#52452e" stroke-width="12" fill="none"
                            stroke-dasharray="35.81 238.76" stroke-dashoffset="-171.9" />
                    <!-- Couple + Event (13%) -->
                    <circle cx="50" cy="50" r="38" stroke="#333338" stroke-width="12" fill="none"
                            stroke-dasharray="31.03 238.76" stroke-dashoffset="-207.71" />
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-2xl font-bold text-white tracking-tight">32</span>
                    <span class="text-[0.68rem] text-admin-dim uppercase">Total Paket</span>
                </div>
            </div>

            <!-- Legend Items -->
            <div class="space-y-2 text-xs">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#c9a96e]"></span>
                        <span class="text-admin-muted">Graduation</span>
                    </div>
                    <span class="font-medium text-white">50%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#9a783e]"></span>
                        <span class="text-admin-muted">Portrait</span>
                    </div>
                    <span class="font-medium text-white">22%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#52452e]"></span>
                        <span class="text-admin-muted">Family</span>
                    </div>
                    <span class="font-medium text-white">15%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#383840]"></span>
                        <span class="text-admin-muted">Couple</span>
                    </div>
                    <span class="font-medium text-white">8%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#26262c]"></span>
                        <span class="text-admin-muted">Event</span>
                    </div>
                    <span class="font-medium text-white">5%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Row: Booking Terbaru & Aktivitas Terbaru -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Table: Booking Terbaru (2 Cols) -->
        <div class="lg:col-span-2 bg-admin-card border border-admin rounded-xl p-6">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-sm font-semibold text-white">Booking Terbaru</h3>
                    <p class="text-xs text-admin-dim">Daftar reservasi sesi yang baru masuk</p>
                </div>
                <a href="{{ route('admin.booking') }}" class="text-xs text-admin-gold hover:underline flex items-center gap-1">
                    <span>Lihat Semua</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-admin-dim border-b border-admin-subtle">
                            <th class="pb-3 font-medium">No. Booking</th>
                            <th class="pb-3 font-medium">Nama Pelanggan</th>
                            <th class="pb-3 font-medium">Paket</th>
                            <th class="pb-3 font-medium">Tanggal & Jam</th>
                            <th class="pb-3 font-medium text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-admin-subtle/60">
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3 font-medium text-admin-gold">BK-0012</td>
                            <td class="py-3 text-white font-medium">Rina Amelia</td>
                            <td class="py-3 text-admin-muted">Graduation</td>
                            <td class="py-3 text-admin-dim">26 Apr 2026 · 10:00</td>
                            <td class="py-3 text-right">
                                <span class="badge-confirmed">Confirmed</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3 font-medium text-admin-gold">BK-0011</td>
                            <td class="py-3 text-white font-medium">Budi Santoso</td>
                            <td class="py-3 text-admin-muted">Portrait</td>
                            <td class="py-3 text-admin-dim">26 Apr 2026 · 13:00</td>
                            <td class="py-3 text-right">
                                <span class="badge-confirmed">Confirmed</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3 font-medium text-admin-gold">BK-0010</td>
                            <td class="py-3 text-white font-medium">Siti Nurhaliza</td>
                            <td class="py-3 text-admin-muted">Family</td>
                            <td class="py-3 text-admin-dim">27 Apr 2026 · 10:00</td>
                            <td class="py-3 text-right">
                                <span class="badge-pending">Pending</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3 font-medium text-admin-gold">BK-0009</td>
                            <td class="py-3 text-white font-medium">Andi Pratama</td>
                            <td class="py-3 text-admin-muted">Couple</td>
                            <td class="py-3 text-admin-dim">27 Apr 2026 · 14:00</td>
                            <td class="py-3 text-right">
                                <span class="badge-confirmed">Confirmed</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="py-3 font-medium text-admin-gold">BK-0008</td>
                            <td class="py-3 text-white font-medium">Dewi Lestari</td>
                            <td class="py-3 text-admin-muted">Graduation</td>
                            <td class="py-3 text-admin-dim">28 Apr 2026 · 09:00</td>
                            <td class="py-3 text-right">
                                <span class="badge-cancelled">Cancelled</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Activity Feed: Aktivitas Terbaru (1 Col) -->
        <div class="bg-admin-card border border-admin rounded-xl p-6 flex flex-col justify-between">
            <div>
                <h3 class="text-sm font-semibold text-white mb-1">Aktivitas Terbaru</h3>
                <p class="text-xs text-admin-dim mb-4">Log riwayat aksi sistem & pelanggan</p>

                <div class="space-y-4">
                    <!-- Item 1 -->
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-admin-gold-bg text-admin-gold flex items-center justify-center shrink-0 mt-0.5">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-xs text-white font-medium">Booking baru diterima</p>
                            <p class="text-[0.7rem] text-admin-muted">Rina Amelia · Graduation</p>
                            <span class="text-[0.65rem] text-admin-dim">26 Apr 2026 · 10:15</span>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-admin-blue-bg text-admin-blue flex items-center justify-center shrink-0 mt-0.5">
                            <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-xs text-white font-medium">Status booking berubah</p>
                            <p class="text-[0.7rem] text-admin-muted">Budi Santoso · Portrait</p>
                            <span class="text-[0.65rem] text-admin-dim">26 Apr 2026 · 11:45</span>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-admin-green-bg text-admin-green flex items-center justify-center shrink-0 mt-0.5">
                            <i data-lucide="user-plus" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-xs text-white font-medium">Pelanggan baru mendaftar</p>
                            <p class="text-[0.7rem] text-admin-muted">Siti Nurhaliza</p>
                            <span class="text-[0.65rem] text-admin-dim">26 Apr 2026 · 14:20</span>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-admin-gold-bg text-admin-gold flex items-center justify-center shrink-0 mt-0.5">
                            <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-xs text-white font-medium">Pembayaran berhasil</p>
                            <p class="text-[0.7rem] text-admin-muted">Andi Pratama · Couple</p>
                            <span class="text-[0.65rem] text-admin-dim">26 Apr 2026 · 16:30</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-admin-subtle mt-4 text-center">
                <a href="{{ route('admin.booking') }}" class="text-[0.75rem] text-admin-dim hover:text-admin-gold transition-colors">
                    Lihat lebih banyak →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

