@extends('layouts.admin')

@section('title', 'Customer')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">

    <!-- Header & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white tracking-tight">Customer</h1>
            <p class="text-xs text-admin-muted mt-0.5">Kelola data pelanggan yang pernah melakukan booking.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="btn-admin-gold">
                <i data-lucide="user-plus" class="w-4 h-4"></i>
                <span>Tambah Customer</span>
            </button>
        </div>
    </div>

    <!-- Main Table Container -->
    <div class="bg-admin-card border border-admin rounded-xl p-6">

        <!-- Search Bar Inside Table Box (Exact from Figma 05) -->
        <div class="mb-5">
            <div class="relative max-w-md">
                <i data-lucide="search" class="w-4 h-4 text-admin-dim absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                <input type="text" placeholder="Cari nama atau email pelanggan..."
                       class="admin-input pl-10 text-xs py-2 bg-[#17171a] rounded-lg">
            </div>
        </div>

        <!-- Customer Table -->
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="text-admin-dim border-b border-admin-subtle">
                        <th class="pb-3.5 font-medium">Nama</th>
                        <th class="pb-3.5 font-medium">Email</th>
                        <th class="pb-3.5 font-medium">Telepon</th>
                        <th class="pb-3.5 font-medium text-center">Total Booking</th>
                        <th class="pb-3.5 font-medium">Terakhir Booking</th>
                        <th class="pb-3.5 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-admin-subtle/70">
                    <!-- Customer 1 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Rina Amelia</td>
                        <td class="py-4 text-admin-muted">rina@gmail.com</td>
                        <td class="py-4 text-admin-muted font-mono">0812-3456-7890</td>
                        <td class="py-4 text-center font-semibold text-admin-gold">3</td>
                        <td class="py-4 text-admin-dim">26 Apr 2026</td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Customer 2 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Budi Santoso</td>
                        <td class="py-4 text-admin-muted">budi@gmail.com</td>
                        <td class="py-4 text-admin-muted font-mono">0813-9876-5432</td>
                        <td class="py-4 text-center font-semibold text-admin-gold">2</td>
                        <td class="py-4 text-admin-dim">26 Apr 2026</td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Customer 3 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Siti Nurhaliza</td>
                        <td class="py-4 text-admin-muted">siti@gmail.com</td>
                        <td class="py-4 text-admin-muted font-mono">0821-2345-5678</td>
                        <td class="py-4 text-center font-semibold text-admin-gold">1</td>
                        <td class="py-4 text-admin-dim">27 Apr 2026</td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Customer 4 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Andi Pratama</td>
                        <td class="py-4 text-admin-muted">andi@gmail.com</td>
                        <td class="py-4 text-admin-muted font-mono">0852-9876-3210</td>
                        <td class="py-4 text-center font-semibold text-admin-gold">4</td>
                        <td class="py-4 text-admin-dim">27 Apr 2026</td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Customer 5 -->
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Dewi Lestari</td>
                        <td class="py-4 text-admin-muted">dewi@gmail.com</td>
                        <td class="py-4 text-admin-muted font-mono">0811-3456-7890</td>
                        <td class="py-4 text-center font-semibold text-admin-gold">2</td>
                        <td class="py-4 text-admin-dim">28 Apr 2026</td>
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

        <!-- Pagination Bar -->
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
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-dim">&lt;</button>
                <button class="w-6 h-6 rounded flex items-center justify-center bg-admin-gold text-[#0d0d0d] font-bold">1</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-muted">2</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-muted">3</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-dim">&gt;</button>
            </div>
        </div>
    </div>

    <!-- Total Pelanggan Wave Chart Card (Exact from Figma 05 bottom) -->
    <div class="bg-admin-card border border-admin rounded-xl p-6 relative overflow-hidden flex flex-col justify-between">
        <div class="relative z-10 mb-4">
            <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                <i data-lucide="users" class="w-4 h-4 text-admin-gold"></i>
                <span class="font-medium">Total Pelanggan</span>
            </div>
            <div class="flex items-baseline gap-3">
                <h3 class="text-3xl font-bold text-white tracking-tight">18</h3>
                <span class="text-xs text-admin-green font-medium">+8% dari minggu lalu</span>
            </div>
        </div>

        <!-- Ambient Golden Mountain Wave Graph -->
        <div class="h-28 w-full relative -mb-2">
            <svg class="w-full h-full overflow-hidden" viewBox="0 0 700 120" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="waveGoldGradient" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#c9a96e" stop-opacity="0.6" />
                        <stop offset="50%" stop-color="#9a783e" stop-opacity="0.3" />
                        <stop offset="100%" stop-color="#141415" stop-opacity="0.0" />
                    </linearGradient>
                </defs>
                <!-- Smooth Curve Wave Area -->
                <path d="M 0,100
                         C 120,40 160,110 260,85
                         C 340,65 390,95 480,45
                         C 570,-5 640,60 700,20
                         L 700,120 L 0,120 Z"
                      fill="url(#waveGoldGradient)" />
                <path d="M 0,100
                         C 120,40 160,110 260,85
                         C 340,65 390,95 480,45
                         C 570,-5 640,60 700,20"
                      fill="none" stroke="#e5c384" stroke-width="2" />
            </svg>
        </div>
    </div>
</div>
@endsection

