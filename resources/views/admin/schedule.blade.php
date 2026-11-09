@extends('layouts.admin')

@section('title', 'Jadwal Pemotretan')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">

    <!-- Header & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white tracking-tight">Jadwal Pemotretan</h1>
            <p class="text-xs text-admin-muted mt-0.5">Kelola jadwal pemotretan dan ketersediaan studio.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.schedule.create') }}" class="btn-admin-gold">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Tambah Jadwal</span>
            </a>
        </div>
    </div>

    <!-- Calendar Card View (Exact replica from Figma Desktop 04) -->
    <div class="bg-admin-card border border-admin rounded-xl p-6">

        <!-- Top Date Range Pill & Controls -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div class="flex items-center gap-2">
                <button class="w-7 h-7 rounded border border-admin text-admin-dim hover:text-white flex items-center justify-center">
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </button>
                <div class="flex items-center gap-2 bg-[#17171a] border border-admin px-3.5 py-1.5 rounded-lg text-xs font-medium text-white">
                    <i data-lucide="calendar" class="w-3.5 h-3.5 text-admin-gold"></i>
                    <span>26 Apr 2026 – 02 Mei 2026</span>
                </div>
                <button class="w-7 h-7 rounded border border-admin text-admin-dim hover:text-white flex items-center justify-center">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </button>
            </div>

            <!-- View Modes -->
            <div class="flex items-center bg-[#17171a] border border-admin p-0.5 rounded-lg text-xs">
                <button class="px-3 py-1 rounded bg-admin-gold text-[#0d0d0d] font-semibold">Minggu</button>
                <button class="px-3 py-1 text-admin-muted hover:text-white">Bulan</button>
                <button class="px-3 py-1 text-admin-muted hover:text-white">Hari</button>
            </div>
        </div>

        <!-- Weekly Schedule Grid -->
        <div class="overflow-x-auto custom-scrollbar">
            <div class="min-w-[700px]">

                <!-- Days Header Row (7 days: Sen 26 Apr -> Min 02 Mei) -->
                <div class="grid grid-cols-8 border-b border-admin-subtle text-xs pb-3 text-center">
                    <div class="text-admin-dim text-left pl-2">Waktu</div>
                    <div>
                        <div class="text-admin-dim text-[0.68rem]">Sen.</div>
                        <div class="text-white font-semibold text-sm">26 Apr</div>
                    </div>
                    <div>
                        <div class="text-admin-dim text-[0.68rem]">Sel.</div>
                        <div class="text-white font-semibold text-sm">27 Apr</div>
                    </div>
                    <div>
                        <div class="text-admin-dim text-[0.68rem]">Rab.</div>
                        <div class="text-white font-semibold text-sm">28 Apr</div>
                    </div>
                    <div>
                        <div class="text-admin-dim text-[0.68rem]">Kam.</div>
                        <div class="text-white font-semibold text-sm">29 Apr</div>
                    </div>
                    <div>
                        <div class="text-admin-dim text-[0.68rem]">Jum.</div>
                        <div class="text-white font-semibold text-sm">30 Apr</div>
                    </div>
                    <div>
                        <div class="text-admin-dim text-[0.68rem]">Sab.</div>
                        <div class="text-white font-semibold text-sm">01 Mei</div>
                    </div>
                    <div>
                        <div class="text-admin-dim text-[0.68rem]">Min.</div>
                        <div class="text-white font-semibold text-sm">02 Mei</div>
                    </div>
                </div>

                <!-- Hours Rows (08:00 - 17:00) with Slot Blocks -->
                <div class="divide-y divide-admin-subtle/50 text-xs">

                    <!-- 08:00 -->
                    <div class="grid grid-cols-8 h-12 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">08:00</div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 09:00 - Contains Graduation booking on 26 Apr & 01 Mei -->
                    <div class="grid grid-cols-8 h-14 items-center relative">
                        <div class="text-admin-dim text-[0.72rem] pl-2">09:00</div>
                        <!-- Sen 26 Apr: Graduation -->
                        <div class="border-l border-admin-subtle/40 h-full p-1">
                            <div class="h-full bg-admin-gold-bg border border-admin-gold/40 rounded p-1.5 flex flex-col justify-center cursor-pointer hover:border-admin-gold transition-colors">
                                <span class="text-[0.72rem] font-semibold text-admin-gold leading-tight">Graduation</span>
                                <span class="text-[0.62rem] text-admin-muted">1 booking</span>
                            </div>
                        </div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <!-- Sab 01 Mei: Graduation -->
                        <div class="border-l border-admin-subtle/40 h-full p-1">
                            <div class="h-full bg-admin-gold-bg border border-admin-gold/40 rounded p-1.5 flex flex-col justify-center cursor-pointer hover:border-admin-gold transition-colors">
                                <span class="text-[0.72rem] font-semibold text-admin-gold leading-tight">Graduation</span>
                                <span class="text-[0.62rem] text-admin-muted">1 booking</span>
                            </div>
                        </div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 10:00 - Contains Family booking on 28 Apr -->
                    <div class="grid grid-cols-8 h-14 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">10:00</div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <!-- Rab 28 Apr: Family -->
                        <div class="border-l border-admin-subtle/40 h-full p-1">
                            <div class="h-full bg-[#23201a] border border-[#4a3b1d] rounded p-1.5 flex flex-col justify-center cursor-pointer hover:border-admin-gold transition-colors">
                                <span class="text-[0.72rem] font-semibold text-[#e5c384] leading-tight">Family</span>
                                <span class="text-[0.62rem] text-admin-muted">1 booking</span>
                            </div>
                        </div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 11:00 -->
                    <div class="grid grid-cols-8 h-12 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">11:00</div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 12:00 -->
                    <div class="grid grid-cols-8 h-12 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">12:00</div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 13:00 - Contains Portrait on 26 Apr & Event on 30 Apr -->
                    <div class="grid grid-cols-8 h-14 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">13:00</div>
                        <!-- Sen 26 Apr: Portrait -->
                        <div class="border-l border-admin-subtle/40 h-full p-1">
                            <div class="h-full bg-admin-gold-bg border border-admin-gold/40 rounded p-1.5 flex flex-col justify-center cursor-pointer hover:border-admin-gold transition-colors">
                                <span class="text-[0.72rem] font-semibold text-admin-gold leading-tight">Portrait</span>
                                <span class="text-[0.62rem] text-admin-muted">1 booking</span>
                            </div>
                        </div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <!-- Jum 30 Apr: Event -->
                        <div class="border-l border-admin-subtle/40 h-full p-1">
                            <div class="h-full bg-[#2a241b] border border-[#524124] rounded p-1.5 flex flex-col justify-center cursor-pointer hover:border-admin-gold transition-colors">
                                <span class="text-[0.72rem] font-semibold text-[#e5c384] leading-tight">Event</span>
                                <span class="text-[0.62rem] text-admin-muted">1 booking</span>
                            </div>
                        </div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 14:00 - Contains Couple on 27 Apr & Family on 29 Apr -->
                    <div class="grid grid-cols-8 h-14 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">14:00</div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <!-- Sel 27 Apr: Couple -->
                        <div class="border-l border-admin-subtle/40 h-full p-1">
                            <div class="h-full bg-[#23201a] border border-[#4a3b1d] rounded p-1.5 flex flex-col justify-center cursor-pointer hover:border-admin-gold transition-colors">
                                <span class="text-[0.72rem] font-semibold text-[#e5c384] leading-tight">Couple</span>
                                <span class="text-[0.62rem] text-admin-muted">1 booking</span>
                            </div>
                        </div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <!-- Kam 29 Apr: Family -->
                        <div class="border-l border-admin-subtle/40 h-full p-1">
                            <div class="h-full bg-[#23201a] border border-[#4a3b1d] rounded p-1.5 flex flex-col justify-center cursor-pointer hover:border-admin-gold transition-colors">
                                <span class="text-[0.72rem] font-semibold text-[#e5c384] leading-tight">Family</span>
                                <span class="text-[0.62rem] text-admin-muted">1 booking</span>
                            </div>
                        </div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 15:00 - Contains Family on 01 Mei -->
                    <div class="grid grid-cols-8 h-14 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">15:00</div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <!-- Sab 01 Mei: Family -->
                        <div class="border-l border-admin-subtle/40 h-full p-1">
                            <div class="h-full bg-[#23201a] border border-[#4a3b1d] rounded p-1.5 flex flex-col justify-center cursor-pointer hover:border-admin-gold transition-colors">
                                <span class="text-[0.72rem] font-semibold text-[#e5c384] leading-tight">Family</span>
                                <span class="text-[0.62rem] text-admin-muted">1 booking</span>
                            </div>
                        </div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 16:00 -->
                    <div class="grid grid-cols-8 h-12 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">16:00</div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                    <!-- 17:00 -->
                    <div class="grid grid-cols-8 h-12 items-center">
                        <div class="text-admin-dim text-[0.72rem] pl-2">17:00</div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                        <div class="border-l border-admin-subtle/40 h-full"></div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Legend Footer Bar (Exact from Figma) -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pt-5 border-t border-admin-subtle mt-5 text-xs">
            <div class="flex items-center gap-5">
                <span class="text-admin-dim font-medium">Keterangan Status:</span>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-white"></span>
                    <span class="text-admin-muted">Tersedia</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-admin-gold"></span>
                    <span class="text-admin-muted">Terisi</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#ff9f0a]"></span>
                    <span class="text-admin-muted">Maintenance</span>
                </div>
            </div>

            <a href="#" class="text-admin-gold hover:underline flex items-center gap-1 text-[0.75rem]">
                <span>Lihat detail jadwal</span>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>
    </div>
</div>
@endsection

