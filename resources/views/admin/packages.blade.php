@extends('layouts.admin')

@section('title', 'Packages')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">

    <!-- Header & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white tracking-tight">Packages</h1>
            <p class="text-xs text-admin-muted mt-0.5">Kelola paket foto yang tersedia untuk pelanggan.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.packages.create') }}" class="btn-admin-gold">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Tambah Paket</span>
            </a>
        </div>
    </div>

    <!-- Package Visual Cards Grid (from Figma Desktop 03: Graduation, Portrait, Family, Couple) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- Card 1: Graduation -->
        <div class="bg-admin-card border border-admin rounded-xl overflow-hidden flex flex-col justify-between group hover:border-[#333338] transition-colors">
            <div class="h-40 bg-[#1e1e24] relative overflow-hidden">
                <img src="{{ asset('img/hero/mjp_2866.webp') }}" alt="Graduation" class="w-full h-full object-cover object-top opacity-75 group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-admin-card via-transparent to-transparent"></div>
            </div>
            <div class="p-4 space-y-3">
                <div>
                    <h3 class="text-base font-semibold text-white">Graduation</h3>
                    <div class="text-admin-gold font-bold text-sm mt-0.5">Rp 750.000</div>
                    <span class="text-[0.68rem] text-admin-dim">12 booking</span>
                </div>
                <div class="flex items-center justify-between pt-2 border-t border-admin-subtle">
                    <a href="{{ route('admin.packages.create') }}" class="btn-admin-gold text-xs py-1.5 px-4">Edit</a>
                    <button class="text-admin-dim hover:text-white p-1"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                </div>
            </div>
        </div>

        <!-- Card 2: Portrait -->
        <div class="bg-admin-card border border-admin rounded-xl overflow-hidden flex flex-col justify-between group hover:border-[#333338] transition-colors">
            <div class="h-40 bg-[#1e1e24] relative overflow-hidden">
                <img src="{{ asset('img/hero/mjp_2609.webp') }}" alt="Portrait" class="w-full h-full object-cover object-top opacity-75 group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-admin-card via-transparent to-transparent"></div>
            </div>
            <div class="p-4 space-y-3">
                <div>
                    <h3 class="text-base font-semibold text-white">Portrait</h3>
                    <div class="text-admin-gold font-bold text-sm mt-0.5">Rp 500.000</div>
                    <span class="text-[0.68rem] text-admin-dim">8 booking</span>
                </div>
                <div class="flex items-center justify-between pt-2 border-t border-admin-subtle">
                    <a href="{{ route('admin.packages.create') }}" class="btn-admin-gold text-xs py-1.5 px-4">Edit</a>
                    <button class="text-admin-dim hover:text-white p-1"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                </div>
            </div>
        </div>

        <!-- Card 3: Family -->
        <div class="bg-admin-card border border-admin rounded-xl overflow-hidden flex flex-col justify-between group hover:border-[#333338] transition-colors">
            <div class="h-40 bg-[#1e1e24] relative overflow-hidden">
                <img src="{{ asset('img/hero/mjp_2614.webp') }}" alt="Family" class="w-full h-full object-cover object-top opacity-75 group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-admin-card via-transparent to-transparent"></div>
            </div>
            <div class="p-4 space-y-3">
                <div>
                    <h3 class="text-base font-semibold text-white">Family</h3>
                    <div class="text-admin-gold font-bold text-sm mt-0.5">Rp 1.000.000</div>
                    <span class="text-[0.68rem] text-admin-dim">6 booking</span>
                </div>
                <div class="flex items-center justify-between pt-2 border-t border-admin-subtle">
                    <a href="{{ route('admin.packages.create') }}" class="btn-admin-gold text-xs py-1.5 px-4">Edit</a>
                    <button class="text-admin-dim hover:text-white p-1"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                </div>
            </div>
        </div>

        <!-- Card 4: Couple -->
        <div class="bg-admin-card border border-admin rounded-xl overflow-hidden flex flex-col justify-between group hover:border-[#333338] transition-colors">
            <div class="h-40 bg-[#1e1e24] relative overflow-hidden">
                <img src="{{ asset('img/hero/mjp_2862.webp') }}" alt="Couple" class="w-full h-full object-cover object-top opacity-75 group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-admin-card via-transparent to-transparent"></div>
            </div>
            <div class="p-4 space-y-3">
                <div>
                    <h3 class="text-base font-semibold text-white">Couple</h3>
                    <div class="text-admin-gold font-bold text-sm mt-0.5">Rp 800.000</div>
                    <span class="text-[0.68rem] text-admin-dim">4 booking</span>
                </div>
                <div class="flex items-center justify-between pt-2 border-t border-admin-subtle">
                    <a href="{{ route('admin.packages.create') }}" class="btn-admin-gold text-xs py-1.5 px-4">Edit</a>
                    <button class="text-admin-dim hover:text-white p-1"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table: Daftar Paket -->
    <div class="bg-admin-card border border-admin rounded-xl p-6">
        <h2 class="text-sm font-semibold text-white mb-5">Daftar Paket</h2>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="text-admin-dim border-b border-admin-subtle">
                        <th class="pb-3.5 font-medium">Nama Paket</th>
                        <th class="pb-3.5 font-medium">Harga</th>
                        <th class="pb-3.5 font-medium">Durasi</th>
                        <th class="pb-3.5 font-medium">Deskripsi</th>
                        <th class="pb-3.5 font-medium text-center">Status</th>
                        <th class="pb-3.5 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-admin-subtle/70">
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Graduation</td>
                        <td class="py-4 font-medium text-admin-gold">Rp 750.000</td>
                        <td class="py-4 text-admin-muted">1 sesi (60m)</td>
                        <td class="py-4 text-admin-dim">Foto wisuda dengan background studio & toga</td>
                        <td class="py-4 text-center">
                            <span class="badge-confirmed">Aktif</span>
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Portrait</td>
                        <td class="py-4 font-medium text-admin-gold">Rp 500.000</td>
                        <td class="py-4 text-admin-muted">1 sesi (60m)</td>
                        <td class="py-4 text-admin-dim">Foto portrait personal atau couple profile</td>
                        <td class="py-4 text-center">
                            <span class="badge-confirmed">Aktif</span>
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Family</td>
                        <td class="py-4 font-medium text-admin-gold">Rp 1.000.000</td>
                        <td class="py-4 text-admin-muted">1 sesi (90m)</td>
                        <td class="py-4 text-admin-dim">Foto keluarga dengan konsep bebas & properti lengkap</td>
                        <td class="py-4 text-center">
                            <span class="badge-confirmed">Aktif</span>
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-admin-dim group-hover:text-admin-muted">
                                <button class="hover:text-white p-1"><i data-lucide="eye" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-admin-gold p-1"><i data-lucide="edit-3" class="w-3.5 h-3.5"></i></button>
                                <button class="hover:text-red-400 p-1"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="py-4 font-semibold text-white">Couple</td>
                        <td class="py-4 font-medium text-admin-gold">Rp 800.000</td>
                        <td class="py-4 text-admin-muted">1 sesi (60m)</td>
                        <td class="py-4 text-admin-dim">Foto pasangan dengan konsep romantis & aesthetic</td>
                        <td class="py-4 text-center">
                            <span class="badge-confirmed">Aktif</span>
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

        <div class="flex items-center justify-between pt-5 border-t border-admin-subtle mt-4 text-xs text-admin-muted">
            <span>Show 5 items</span>
            <div class="flex items-center gap-1.5">
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-dim">&lt;</button>
                <button class="w-6 h-6 rounded flex items-center justify-center bg-admin-gold text-[#0d0d0d] font-bold">1</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-muted">2</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-muted">3</button>
                <button class="w-6 h-6 rounded flex items-center justify-center border border-admin text-admin-dim">&gt;</button>
            </div>
        </div>
    </div>
</div>
@endsection

