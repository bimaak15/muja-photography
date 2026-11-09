@extends('layouts.admin')

@section('title', 'Bookings')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">

    <!-- Header & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white tracking-tight">Bookings</h1>
            <p class="text-xs text-admin-muted mt-0.5">Kelola semua data pemesanan dari pelanggan.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.booking.create') }}" class="btn-admin-gold">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>New Booking</span>
            </a>
        </div>
    </div>

    <!-- 4 Mini Status Cards (from Figma: Total Booking, Confirmed, Pending, Cancelled) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Booking -->
        <div class="bg-admin-card border border-admin rounded-xl p-4">
            <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                <i data-lucide="calendar" class="w-3.5 h-3.5 text-admin-gold"></i>
                <span>Total Booking</span>
            </div>
            <div class="text-2xl font-bold text-white tracking-tight">24</div>
            <div class="text-[0.7rem] text-admin-green mt-1">+12% from last week</div>
        </div>

        <!-- Confirmed -->
        <div class="bg-admin-card border border-admin rounded-xl p-4">
            <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                <i data-lucide="check-circle" class="w-3.5 h-3.5 text-admin-green"></i>
                <span>Confirmed</span>
            </div>
            <div class="text-2xl font-bold text-white tracking-tight">18</div>
            <div class="text-[0.7rem] text-admin-green mt-1">+8% from last week</div>
        </div>

        <!-- Pending -->
        <div class="bg-admin-card border border-admin rounded-xl p-4">
            <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                <i data-lucide="clock" class="w-3.5 h-3.5 text-admin-yellow"></i>
                <span>Pending</span>
            </div>
            <div class="text-2xl font-bold text-white tracking-tight">4</div>
            <div class="text-[0.7rem] text-admin-dim mt-1">-2% from last week</div>
        </div>

        <!-- Cancelled -->
        <div class="bg-admin-card border border-admin rounded-xl p-4">
            <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                <i data-lucide="x-circle" class="w-3.5 h-3.5 text-admin-red"></i>
                <span>Cancelled</span>
            </div>
            <div class="text-2xl font-bold text-white tracking-tight">2</div>
            <div class="text-[0.7rem] text-admin-dim mt-1">-1% from last week</div>
        </div>
    </div>

    <!-- Booking Table Section -->
    <div class="bg-admin-card border border-admin rounded-xl p-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <h2 class="text-sm font-semibold text-white">Daftar Booking</h2>
            <!-- Search & Filter bar -->
            <div class="flex items-center gap-3">
                <div class="relative w-64">
                    <i data-lucide="search" class="w-3.5 h-3.5 text-admin-dim absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                    <input type="text" placeholder="Cari nama atau kode booking..."
                           class="admin-input pl-9 text-xs py-1.5 bg-[#17171a] rounded-lg">
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="text-admin-dim border-b border-admin-subtle">
                        <th class="pb-3.5 font-medium">No. Booking</th>
                        <th class="pb-3.5 font-medium">Nama Pelanggan</th>
                        <th class="pb-3.5 font-medium">Paket</th>
                        <th class="pb-3.5 font-medium">Tanggal & Jam</th>
                        <th class="pb-3.5 font-medium text-center">Status</th>
                        <th class="pb-3.5 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-admin-subtle/70">
                    <!-- Row 1 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-admin-gold">BK-0012</td>
                        <td class="py-4 text-white font-medium">Rina Amelia</td>
                        <td class="py-4 text-admin-muted">Graduation</td>
                        <td class="py-4 text-admin-muted">26 Apr 2026 · 10:00</td>
                        <td class="py-4 text-center">
                            <span class="badge-confirmed">Confirmed</span>
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1" title="Lihat Detail"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1" title="Edit"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1" title="Hapus"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-admin-gold">BK-0011</td>
                        <td class="py-4 text-white font-medium">Budi Santoso</td>
                        <td class="py-4 text-admin-muted">Portrait</td>
                        <td class="py-4 text-admin-muted">26 Apr 2026 · 13:00</td>
                        <td class="py-4 text-center">
                            <span class="badge-confirmed">Confirmed</span>
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-admin-gold">BK-0010</td>
                        <td class="py-4 text-white font-medium">Siti Nurhaliza</td>
                        <td class="py-4 text-admin-muted">Family</td>
                        <td class="py-4 text-admin-muted">27 Apr 2026 · 10:00</td>
                        <td class="py-4 text-center">
                            <span class="badge-pending">Pending</span>
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-admin-gold">BK-0009</td>
                        <td class="py-4 text-white font-medium">Andi Pratama</td>
                        <td class="py-4 text-admin-muted">Couple</td>
                        <td class="py-4 text-admin-muted">27 Apr 2026 · 14:00</td>
                        <td class="py-4 text-center">
                            <span class="badge-confirmed">Confirmed</span>
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 5 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-admin-gold">BK-0008</td>
                        <td class="py-4 text-white font-medium">Dewi Lestari</td>
                        <td class="py-4 text-admin-muted">Graduation</td>
                        <td class="py-4 text-admin-muted">28 Apr 2026 · 11:00</td>
                        <td class="py-4 text-center">
                            <span class="badge-cancelled">Cancelled</span>
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination Bar (Figma replica) -->
        <div class="flex items-center justify-between pt-5 border-t border-admin-subtle mt-4 text-xs text-admin-muted">
            <div class="flex items-center gap-2">
                <span>Show</span>
                <select class="bg-[#17171a] border border-admin rounded px-2 py-1 text-white text-xs">
                    <option>5 items</option>
                    <option>10 items</option>
                    <option>25 items</option>
                </select>
            </div>
            <div class="flex items-center gap-1.5">
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-dim hover:text-white">&lt;</button>
                <button class="w-6 h-6 rounded flex items-center justify-center bg-admin-gold text-[#0d0d0d] font-bold">1</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-muted hover:text-white">2</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-muted hover:text-white">3</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-dim hover:text-white">&gt;</button>
            </div>
        </div>
    </div>
</div>
@endsection

