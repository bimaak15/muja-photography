@extends('layouts.admin')

@section('title', 'Gallery Management — Muja Studio')

@section('content')
<div x-data="{
    editModalOpen: false,
    activeSlot: null,
    previewUrl: null,
    tab: 'file',
    openEdit(item) {
        this.activeSlot = item;
        this.previewUrl = item.image_url;
        this.tab = 'file';
        this.editModalOpen = true;
    },
    handleFileChange(event) {
        const file = event.target.files[0];
        if (file) {
            this.previewUrl = URL.createObjectURL(file);
        }
    },
    setUrlPreview(value) {
        const v = (value || '').trim();
        if (!v) {
            this.previewUrl = null;
            return;
        }
        // Samakan perilaku asset() Laravel: path relatif dibuat root-relative
        this.previewUrl = /^(https?:)?\/\//.test(v) || v.startsWith('/') ? v : '/' + v;
    }
}" class="space-y-8">

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="flex items-center gap-3 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm">
            <i data-lucide="check-circle" class="w-5 h-5 flex-shrink-0 text-emerald-400"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-sm space-y-1">
            <div class="flex items-center gap-2 font-semibold">
                <i data-lucide="alert-triangle" class="w-4 h-4"></i>
                <span>Gagal menyimpan perubahan:</span>
            </div>
            <ul class="list-disc list-inside pl-2 space-y-0.5 text-xs text-red-300">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Header & Action Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-admin-dim mb-1">
                <span>Dashboard</span>
                <span>/</span>
                <span class="text-admin-gold">Gallery Management</span>
            </div>
            <h1 class="font-['Cormorant_Garamond'] text-3xl font-semibold tracking-wide text-[#f5f5f7]">
                Portofolio & Gallery Showcase
            </h1>
            <p class="text-xs text-admin-muted mt-1">
                Kelola 17 slot visual foto landing page beranda secara dinamis. Foto yang diunggah langsung tampil saat klien membuka halaman beranda.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <!-- Link to Live Preview on Home Page -->
            <a href="{{ route('home') }}#portofolio-preview" target="_blank"
               class="admin-btn-secondary inline-flex items-center gap-2 text-xs px-4 py-2.5 rounded-lg border border-admin-gold/30 hover:border-admin-gold hover:text-admin-gold transition-all">
                <i data-lucide="external-link" class="w-4 h-4"></i>
                <span>Lihat di Beranda</span>
            </a>

            <!-- Reset All to Factory Default -->
            <form action="{{ route('admin.gallery.reset-all') }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin mengembalikan SEMUA 17 slot foto ke preset default bawaan studio?');">
                @csrf
                <button type="submit"
                        class="admin-btn-secondary inline-flex items-center gap-2 text-xs px-3.5 py-2.5 rounded-lg border border-red-500/20 text-red-400 hover:bg-red-500/10 hover:border-red-500/40 transition-all">
                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                    <span class="hidden sm:inline">Reset Semua Default</span>
                </button>
            </form>
        </div>
    </div>

    <!-- 4 Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-admin-card p-4 rounded-xl border border-admin flex items-center gap-3.5">
            <div class="w-11 h-11 rounded-lg bg-[#c9a96e]/10 border border-[#c9a96e]/20 flex items-center justify-center text-admin-gold flex-shrink-0">
                <i data-lucide="grid" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[0.7rem] uppercase tracking-wider text-admin-dim">Total Layout Slots</p>
                <p class="text-xl font-bold text-white tracking-tight mt-0.5">17 Slots</p>
                <p class="text-[0.68rem] text-admin-muted">Scroll-pinned 17-grid</p>
            </div>
        </div>

        <div class="bg-admin-card p-4 rounded-xl border border-admin flex items-center gap-3.5">
            <div class="w-11 h-11 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 flex-shrink-0">
                <i data-lucide="eye" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[0.7rem] uppercase tracking-wider text-admin-dim">Active On Home</p>
                <p class="text-xl font-bold text-emerald-400 tracking-tight mt-0.5">{{ $stats['active'] }} / 17</p>
                <p class="text-[0.68rem] text-admin-muted">Live visible slots</p>
            </div>
        </div>

        <div class="bg-admin-card p-4 rounded-xl border border-admin flex items-center gap-3.5">
            <div class="w-11 h-11 rounded-lg bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400 flex-shrink-0">
                <i data-lucide="cloud-upload" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[0.7rem] uppercase tracking-wider text-admin-dim">Custom Uploads</p>
                <p class="text-xl font-bold text-purple-400 tracking-tight mt-0.5">{{ $stats['custom_uploads'] }} Foto</p>
                <p class="text-[0.68rem] text-admin-muted">Tersimpan di Storage</p>
            </div>
        </div>

        <div class="bg-admin-card p-4 rounded-xl border border-admin flex items-center gap-3.5">
            <div class="w-11 h-11 rounded-lg bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 flex-shrink-0">
                <i data-lucide="tag" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[0.7rem] uppercase tracking-wider text-admin-dim">Kategori Foto</p>
                <p class="text-xl font-bold text-blue-400 tracking-tight mt-0.5">{{ $stats['categories'] }} Kategori</p>
                <p class="text-[0.68rem] text-admin-muted">Graduation, Portrait, dll</p>
            </div>
        </div>
    </div>

    <!-- Instructions / Guide Note -->
    <div class="p-4 rounded-xl bg-[#141417] border border-[#232328] flex items-start gap-3 text-xs text-admin-muted">
        <i data-lucide="sparkles" class="w-5 h-5 text-admin-gold flex-shrink-0 mt-0.5"></i>
        <div>
            <span class="text-white font-medium">Cara Kerja Galeri Muja Photography:</span>
            <span class="ml-1">
                Setiap kartu di bawah ini merepresentasikan posisi foto (Slot #1 sampai #17) pada animasi scroll-pin interaktif di beranda. Klik tombol
                <span class="text-admin-gold font-medium">"Ubah Foto"</span> pada salah satu slot untuk mengunggah foto sesi terbaru klien Anda.
            </span>
        </div>
    </div>

    <!-- 17 Slots Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-5">
        @foreach ($items as $item)
            @php
                $isStorage = str_starts_with($item->image_path, 'storage/');
            @endphp
            <div class="bg-admin-card rounded-xl border border-admin overflow-hidden flex flex-col group hover:border-admin-gold/50 transition-all duration-300">
                <!-- Top Card Header: Position badge & status -->
                <div class="p-3.5 border-b border-admin flex items-center justify-between bg-[#151519]/70">
                    <div class="flex items-center gap-2">
                        <span class="font-['Cormorant_Garamond'] text-base font-bold text-admin-gold">
                            Slot #{{ sprintf('%02d', $item->position) }}
                        </span>
                        @if ($item->category)
                            <span class="px-2 py-0.5 rounded text-[0.65rem] font-medium bg-[#c9a96e]/10 text-admin-gold border border-[#c9a96e]/20">
                                {{ $item->category }}
                            </span>
                        @endif
                    </div>
                    @if ($item->is_active)
                        <span class="inline-flex items-center gap-1 text-[0.65rem] font-medium text-emerald-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Live</span>
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 text-[0.65rem] font-medium text-admin-dim">
                            <span class="w-1.5 h-1.5 rounded-full bg-zinc-600"></span>
                            <span>Hidden</span>
                        </span>
                    @endif
                </div>

                <!-- Image Preview Area -->
                <div class="relative aspect-[4/5] bg-[#0d0d0f] overflow-hidden group/img cursor-pointer"
                     @click="openEdit({{ json_encode($item) }})">
                    <img src="{{ $item->image_url }}"
                         alt="{{ $item->title ?? 'Slot ' . $item->position }}"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                         loading="lazy"
                         onerror="this.src='{{ asset('img/hero/mjp_2866.webp') }}'">

                    <!-- Hover Quick Overlay -->
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-2 text-white p-4">
                        <div class="w-10 h-10 rounded-full bg-admin-gold text-[#0d0d0d] flex items-center justify-center font-bold shadow-lg transform -translate-y-2 group-hover:translate-y-0 transition-transform">
                            <i data-lucide="camera" class="w-5 h-5"></i>
                        </div>
                        <span class="text-xs font-semibold tracking-wide">Klik untuk Ubah Foto</span>
                        <span class="text-[0.65rem] text-zinc-300">Posisi Grid #{{ $item->position }}</span>
                    </div>

                    <!-- Source Tag Badge -->
                    <div class="absolute bottom-2.5 left-2.5">
                        @if ($isStorage)
                            <span class="px-2 py-0.5 rounded-md bg-black/75 backdrop-blur text-[0.62rem] text-purple-300 border border-purple-500/30 flex items-center gap-1">
                                <i data-lucide="check" class="w-3 h-3"></i>
                                <span>Uploaded</span>
                            </span>
                        @else
                            <span class="px-2 py-0.5 rounded-md bg-black/75 backdrop-blur text-[0.62rem] text-admin-dim border border-white/10">
                                Preset Default
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Card Details & Actions Footer -->
                <div class="p-3.5 flex flex-col justify-between flex-1 gap-3 bg-[#131316]">
                    <div>
                        <h3 class="text-xs font-medium text-white truncate" title="{{ $item->title }}">
                            {{ $item->title ?: 'Foto Sesi #' . $item->position }}
                        </h3>
                        <p class="text-[0.65rem] text-admin-dim truncate mt-0.5" title="{{ $item->image_path }}">
                            {{ $item->image_path }}
                        </p>
                    </div>

                    <div class="flex items-center gap-2 pt-2 border-t border-admin/60">
                        <button type="button"
                                @click="openEdit({{ json_encode($item) }})"
                                class="flex-1 py-1.5 px-3 rounded-lg bg-admin-gold/15 hover:bg-admin-gold text-admin-gold hover:text-black text-xs font-medium transition-all duration-200 flex items-center justify-center gap-1.5">
                            <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                            <span>Ubah</span>
                        </button>

                        <form action="{{ route('admin.gallery.reset', $item->id) }}" method="POST"
                              onsubmit="return confirm('Kembalikan slot #{{ $item->position }} ke preset foto default?');">
                            @csrf
                            <button type="submit"
                                    title="Kembalikan ke preset default"
                                    class="p-1.5 rounded-lg border border-admin hover:border-admin-dim text-admin-dim hover:text-white transition-colors">
                                <i data-lucide="rotate-ccw" class="w-3.5 h-3.5"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ==================== ALPINE EDIT MODAL ==================== -->
    <div x-cloak x-show="editModalOpen"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">

        <div @click.away="editModalOpen = false"
             class="bg-admin-card w-full max-w-lg rounded-2xl border border-admin-gold/40 shadow-2xl overflow-hidden flex flex-col max-h-[90vh]"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">

            <!-- Modal Header -->
            <div class="p-5 border-b border-admin flex items-center justify-between bg-[#16161a]">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-admin-gold/15 border border-admin-gold/30 flex items-center justify-center text-admin-gold">
                        <i data-lucide="image" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-semibold text-white">
                            Ubah Foto Galeri <span class="text-admin-gold" x-text="activeSlot ? 'Slot #' + activeSlot.position : ''"></span>
                        </h2>
                        <p class="text-[0.72rem] text-admin-dim">Pilih gambar baru atau masukkan URL/path gambar</p>
                    </div>
                </div>
                <button type="button" @click="editModalOpen = false" class="text-admin-dim hover:text-white p-1">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Modal Form with File Upload & Dynamic Action -->
            <form :action="'{{ url('/admin/gallery') }}/' + (activeSlot ? activeSlot.id : '')"
                  method="POST"
                  enctype="multipart/form-data"
                  @submit="!activeSlot && $event.preventDefault()"
                  class="p-5 space-y-4 overflow-y-auto flex-1 min-h-0">
                @csrf

                <!-- Image Live Preview -->
                <div class="flex items-center gap-4 p-3 rounded-xl bg-[#101013] border border-admin">
                    <div class="w-20 h-24 rounded-lg overflow-hidden bg-black flex-shrink-0 border border-white/10 relative">
                        <img :src="previewUrl || (activeSlot ? activeSlot.image_url : '')"
                             alt="Preview"
                             onerror="this.src='{{ asset('img/hero/mjp_2866.webp') }}'"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 text-xs space-y-1">
                        <p class="font-medium text-white">Preview Gambar Terpilih</p>
                        <p class="text-[0.7rem] text-admin-dim leading-relaxed">
                            Rekomendasi rasio foto: portrait 4:5 atau 2:3 dengan resolusi minimal 1200x1500px agar tajam saat animasi pin beranda.
                        </p>
                    </div>
                </div>

                <!-- Tabs: Upload File vs Path URL -->
                <div class="flex border-b border-admin">
                    <button type="button"
                            @click="tab = 'file'"
                            :class="tab === 'file' ? 'border-b-2 border-admin-gold text-admin-gold font-semibold' : 'text-admin-dim hover:text-white'"
                            class="px-4 py-2 text-xs transition-colors">
                        Unggah File Baru
                    </button>
                    <button type="button"
                            @click="tab = 'url'"
                            :class="tab === 'url' ? 'border-b-2 border-admin-gold text-admin-gold font-semibold' : 'text-admin-dim hover:text-white'"
                            class="px-4 py-2 text-xs transition-colors">
                        Gunakan URL / Path Kustom
                    </button>
                </div>

                <!-- Tab 1: Upload File -->
                <div x-show="tab === 'file'" class="space-y-2">
                    <label class="block text-xs font-medium text-admin-muted">File Gambar</label>
                    <div class="border-2 border-dashed border-[#2d2d32] hover:border-admin-gold/50 rounded-xl p-4 text-center cursor-pointer bg-[#141418] transition-colors relative">
                        <input type="file"
                               name="image_file"
                               accept="image/jpeg,image/png,image/webp,image/avif"
                               @change="handleFileChange($event)"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <i data-lucide="upload-cloud" class="w-8 h-8 text-admin-gold/70 mx-auto mb-2"></i>
                        <p class="text-xs text-white font-medium">Klik atau seret file gambar ke sini</p>
                        <p class="text-[0.7rem] text-admin-dim mt-0.5">Mendukung format JPG, PNG, WEBP hingga 10MB</p>
                    </div>
                </div>

                <!-- Tab 2: Custom URL / Asset Path -->
                <div x-show="tab === 'url'" class="space-y-1.5">
                    <label class="block text-xs font-medium text-admin-muted">URL atau Path Gambar</label>
                    <input type="text"
                           name="image_url"
                           :value="activeSlot ? activeSlot.image_path : ''"
                           @input="setUrlPreview($event.target.value)"
                           placeholder="img/hero/mjp_2866.webp atau https://..."
                           class="admin-input text-xs w-full">
                    <p class="text-[0.68rem] text-admin-dim">Contoh: <code>img/hero/mjp_2866.webp</code> atau link CDN luar</p>
                </div>

                <!-- Title & Category Fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-admin-muted">Judul / Caption Foto</label>
                        <input type="text"
                               name="title"
                               :value="activeSlot ? activeSlot.title : ''"
                               placeholder="e.g. Graduation Golden Glow"
                               class="admin-input text-xs w-full">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-admin-muted">Kategori</label>
                        <input type="text"
                               name="category"
                               list="category-suggestions"
                               :value="activeSlot ? activeSlot.category : ''"
                               placeholder="e.g. Graduation"
                               class="admin-input text-xs w-full">
                        <datalist id="category-suggestions">
                            <option value="Graduation">
                            <option value="Portrait">
                            <option value="Prewedding">
                            <option value="Family">
                            <option value="Fashion">
                            <option value="Editorial">
                            <option value="Beauty">
                            <option value="Fine Art">
                            <option value="Vintage">
                            <option value="Urban">
                            <option value="Artistic">
                            <option value="Cinematic">
                        </datalist>
                    </div>
                </div>

                <!-- Live Status Toggle -->
                <div class="pt-2 flex items-center justify-between p-3 rounded-xl bg-[#121215] border border-admin">
                    <div>
                        <p class="text-xs font-medium text-white">Tampilkan di Beranda</p>
                        <p class="text-[0.68rem] text-admin-dim">Jika dinonaktifkan, posisi slot ini akan memakai foto cadangan bawaan.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               :checked="activeSlot && activeSlot.is_active"
                               class="sr-only peer">
                        <div class="w-9 h-5 bg-zinc-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-admin-gold"></div>
                    </label>
                </div>

                <!-- Modal Action Footer -->
                <div class="sticky bottom-0 z-10 -mb-5 pb-5 -mx-5 px-5 pt-4 bg-[#141415] border-t border-admin flex items-center justify-end gap-3">
                    <button type="button"
                            @click="editModalOpen = false"
                            class="px-4 py-2 rounded-lg text-xs font-medium text-admin-muted hover:text-white transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                            :disabled="!activeSlot"
                            class="btn-admin-gold px-5 py-2 rounded-lg text-xs font-semibold flex items-center gap-1.5 disabled:opacity-40 disabled:cursor-not-allowed">
                        <i data-lucide="check" class="w-4 h-4"></i>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

