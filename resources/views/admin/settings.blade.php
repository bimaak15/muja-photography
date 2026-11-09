@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto" x-data="{ tab: 'informasi', role: 'owner' }">

    <!-- Header & Subtitle -->
    <div>
        <h1 class="text-2xl font-semibold text-white tracking-tight">Settings</h1>
        <p class="text-xs text-admin-muted mt-0.5">Atur informasi studio dan preferensi sistem.</p>
    </div>

    <!-- Navigation Tabs (Informasi Studio, Akun, Pembayaran) -->
    <div class="flex items-center gap-6 border-b border-admin-subtle text-xs font-medium pb-2">
        <button type="button"
                @click="tab = 'informasi'"
                :class="tab === 'informasi' ? 'text-admin-gold border-b-2 border-admin-gold pb-2 font-semibold' : 'text-admin-muted hover:text-white pb-2'">
            Informasi Studio
        </button>
        <button type="button"
                @click="tab = 'akun'"
                :class="tab === 'akun' ? 'text-admin-gold border-b-2 border-admin-gold pb-2 font-semibold' : 'text-admin-muted hover:text-white pb-2'">
            Akun
        </button>
        <button type="button"
                @click="tab = 'pembayaran'"
                :class="tab === 'pembayaran' ? 'text-admin-gold border-b-2 border-admin-gold pb-2 font-semibold' : 'text-admin-muted hover:text-white pb-2'">
            Pembayaran
        </button>
    </div>

    <!-- ========================================================================= -->
    <!-- TAB 1: INFORMASI STUDIO (Figma Desktop 06) -->
    <!-- ========================================================================= -->
    <div x-show="tab === 'informasi'" class="space-y-6">
        <div class="bg-admin-card border border-admin rounded-xl p-6 max-w-3xl space-y-5">
            <h2 class="text-sm font-semibold text-white border-b border-admin-subtle pb-3">Informasi Studio</h2>

            <div class="space-y-4 text-xs">
                <div>
                    <label class="block font-medium text-admin-muted mb-1.5">Nama Studio</label>
                    <input type="text" value="MUJA PHOTOGRAPHY" class="admin-input">
                </div>

                <div>
                    <label class="block font-medium text-admin-muted mb-1.5">Email Studio</label>
                    <input type="email" value="studio@gmail.com" class="admin-input">
                </div>

                <div>
                    <label class="block font-medium text-admin-muted mb-1.5">Nomor Telepon</label>
                    <input type="text" value="0812-3456-7890" class="admin-input">
                </div>

                <div>
                    <label class="block font-medium text-admin-muted mb-1.5">Alamat</label>
                    <textarea rows="3" class="admin-input">Jl. Contoh No. 123, Surabaya, Jawa Timur</textarea>
                </div>
            </div>

            <div class="pt-2">
                <button type="button" class="btn-admin-gold text-xs py-2 px-6">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- TAB 2: AKUN & PENGGUNA (Figma Page 20 & 21) -->
    <!-- ========================================================================= -->
    <div x-show="tab === 'akun'" class="space-y-6 max-w-5xl" style="display: none;">

        <!-- Role Preview Switcher (Figma: Pratinjau tampilan sesuai peran: Owner / Admin) -->
        <div class="flex items-center gap-3">
            <span class="text-xs text-admin-dim">Pratinjau tampilan sesuai peran:</span>
            <div class="bg-[#17171a] border border-admin p-0.5 rounded-lg text-xs inline-flex">
                <button type="button" @click="role = 'owner'"
                        :class="role === 'owner' ? 'bg-admin-gold text-[#0d0d0d] font-semibold' : 'text-admin-muted hover:text-white'"
                        class="px-3 py-1 rounded">Owner</button>
                <button type="button" @click="role = 'admin'"
                        :class="role === 'admin' ? 'bg-admin-gold text-[#0d0d0d] font-semibold' : 'text-admin-muted hover:text-white'"
                        class="px-3 py-1 rounded">Admin</button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left Col: Profile Badge Box -->
            <div class="bg-admin-card border border-admin rounded-xl p-6 flex flex-col items-center text-center justify-between">
                <div class="space-y-3 w-full">
                    <!-- Big Avatar -->
                    <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-[#c9a96e] to-[#f0deb8] text-[#0d0d0d] font-bold text-xl flex items-center justify-center mx-auto shadow-lg shadow-admin-gold-glow">
                        <span x-text="role === 'owner' ? 'MA' : 'RS'">MA</span>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-white" x-text="role === 'owner' ? 'Muja Ardiansyah' : 'Rina Safitri'">Muja Ardiansyah</h3>
                        <p class="text-xs text-admin-muted mt-0.5" x-text="role === 'owner' ? 'muja@mujaphotography.com' : 'rina@mujaphotography.com'">muja@mujaphotography.com</p>
                        <span class="inline-block mt-2 badge-gold text-[0.68rem]" x-text="role === 'owner' ? 'Owner' : 'Admin'">Owner</span>
                    </div>
                </div>

                <div class="w-full pt-6 border-t border-admin-subtle mt-6 space-y-2 text-xs">
                    <div class="flex justify-between text-admin-dim">
                        <span>Bergabung</span>
                        <span class="text-white" x-text="role === 'owner' ? 'Jan 2022' : 'Mar 2023'">Jan 2022</span>
                    </div>
                    <div class="flex justify-between text-admin-dim">
                        <span>Login terakhir</span>
                        <span class="text-white">Hari ini, 08.42</span>
                    </div>
                    <div class="flex justify-between text-admin-dim">
                        <span>Keamanan akun</span>
                        <span class="text-admin-green font-medium">Kuat</span>
                    </div>
                </div>
            </div>

            <!-- Right Col: Profile Form, Password, Security -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Profil Pribadi -->
                <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
                    <div class="border-b border-admin-subtle pb-3">
                        <h3 class="text-sm font-semibold text-white">Profil pribadi</h3>
                        <p class="text-[0.68rem] text-admin-dim">Data ini tampil di riwayat aktivitas dan catatan booking.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div>
                            <label class="block text-admin-muted mb-1">Nama lengkap</label>
                            <input type="text" :value="role === 'owner' ? 'Muja Ardiansyah' : 'Rina Safitri'" class="admin-input">
                        </div>
                        <div>
                            <label class="block text-admin-muted mb-1">Jabatan</label>
                            <input type="text" :value="role === 'owner' ? 'Pemilik Studio' : 'Admin Studio'" class="admin-input">
                        </div>
                        <div>
                            <label class="block text-admin-muted mb-1">Email</label>
                            <input type="email" :value="role === 'owner' ? 'muja@mujaphotography.com' : 'rina@mujaphotography.com'" class="admin-input">
                        </div>
                        <div>
                            <label class="block text-admin-muted mb-1">Nomor telepon</label>
                            <input type="text" :value="role === 'owner' ? '0812-3456-7890' : '0857-1122-3344'" class="admin-input">
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" class="btn-admin-ghost text-xs">Batal</button>
                        <button type="button" class="btn-admin-gold text-xs">Simpan perubahan</button>
                    </div>
                </div>

                <!-- Ubah Kata Sandi -->
                <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
                    <div class="border-b border-admin-subtle pb-3">
                        <h3 class="text-sm font-semibold text-white">Ubah kata sandi</h3>
                        <p class="text-[0.68rem] text-admin-dim">Gunakan minimal 8 karakter dengan huruf besar, angka, dan simbol.</p>
                    </div>

                    <div class="space-y-3 text-xs">
                        <div>
                            <label class="block text-admin-muted mb-1">Kata sandi saat ini</label>
                            <div class="relative">
                                <input type="password" placeholder="••••••••" class="admin-input pr-10">
                                <i data-lucide="eye" class="w-4 h-4 text-admin-dim absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-admin-muted mb-1">Kata sandi baru</label>
                                <div class="relative">
                                    <input type="password" placeholder="••••••••" class="admin-input pr-10">
                                    <i data-lucide="eye" class="w-4 h-4 text-admin-dim absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-admin-muted mb-1">Ulangi kata sandi baru</label>
                                <div class="relative">
                                    <input type="password" placeholder="••••••••" class="admin-input pr-10">
                                    <i data-lucide="eye" class="w-4 h-4 text-admin-dim absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-1">
                        <button type="button" class="btn-admin-gold text-xs">Perbarui kata sandi</button>
                    </div>
                </div>

                <!-- Keamanan & Perangkat -->
                <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
                    <div class="border-b border-admin-subtle pb-3">
                        <h3 class="text-sm font-semibold text-white">Keamanan & perangkat</h3>
                        <p class="text-[0.68rem] text-admin-dim">Lindungi data customer dan pembayaran studio.</p>
                    </div>

                    <div class="space-y-3 text-xs">
                        <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
                            <div>
                                <div class="font-semibold text-white">Verifikasi dua langkah</div>
                                <div class="text-[0.68rem] text-admin-dim">Kode OTP dikirim saat login di perangkat baru</div>
                            </div>
                            <input type="checkbox" checked class="w-4 h-4 rounded text-admin-gold focus:ring-0">
                        </div>

                        <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
                            <div>
                                <div class="font-semibold text-white">Peringatan login baru</div>
                                <div class="text-[0.68rem] text-admin-dim">Email jika akun dibuka dari perangkat asing</div>
                            </div>
                            <input type="checkbox" checked class="w-4 h-4 rounded text-admin-gold focus:ring-0">
                        </div>

                        <!-- Perangkat Aktif -->
                        <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
                            <div class="flex items-center gap-3">
                                <i data-lucide="laptop" class="w-5 h-5 text-admin-muted"></i>
                                <div>
                                    <div class="font-semibold text-white">MacBook · Chrome</div>
                                    <div class="text-[0.68rem] text-admin-dim">Surabaya · Sedang aktif</div>
                                </div>
                            </div>
                            <span class="badge-confirmed text-[0.65rem]">Perangkat ini</span>
                        </div>

                        <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
                            <div class="flex items-center gap-3">
                                <i data-lucide="smartphone" class="w-5 h-5 text-admin-muted"></i>
                                <div>
                                    <div class="font-semibold text-white">iPhone · Safari</div>
                                    <div class="text-[0.68rem] text-admin-dim">Surabaya · 2 jam lalu</div>
                                </div>
                            </div>
                            <button class="btn-admin-ghost text-[0.68rem] py-1 px-3">Keluarkan</button>
                        </div>
                    </div>
                </div>

                <!-- Pengguna & Peran (Hanya jika role === owner) -->
                <div x-show="role === 'owner'" class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
                    <div class="flex items-center justify-between border-b border-admin-subtle pb-3">
                        <div>
                            <h3 class="text-sm font-semibold text-white">Pengguna & peran</h3>
                            <p class="text-[0.68rem] text-admin-dim">Kelola siapa saja yang bisa masuk ke dashboard studio.</p>
                        </div>
                        <button class="btn-admin-gold text-xs py-1.5 px-3">Undang pengguna</button>
                    </div>

                    <div class="space-y-3 text-xs">
                        <div class="flex items-center justify-between p-3 bg-[#17171a] border border-admin rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-admin-gold text-[#0d0d0d] font-bold text-xs flex items-center justify-center">MA</div>
                                <div>
                                    <div class="font-semibold text-white">Muja Ardiansyah</div>
                                    <div class="text-[0.68rem] text-admin-dim">muja@mujaphotography.com</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="badge-gold text-[0.62rem]">Owner</span>
                                <span class="badge-confirmed text-[0.62rem]">Aktif</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-[#17171a] border border-admin rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-admin-blue-bg text-admin-blue font-bold text-xs flex items-center justify-center">RS</div>
                                <div>
                                    <div class="font-semibold text-white">Rina Safitri</div>
                                    <div class="text-[0.68rem] text-admin-dim">rina@mujaphotography.com</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="badge-pending text-[0.62rem]">Admin</span>
                                <span class="badge-confirmed text-[0.62rem]">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hak Akses Peran Table -->
                <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-3">
                    <h3 class="text-sm font-semibold text-white">Hak akses peran</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead>
                                <tr class="text-admin-dim border-b border-admin-subtle">
                                    <th class="pb-2 font-medium">Fitur</th>
                                    <th class="pb-2 font-medium text-center">Owner</th>
                                    <th class="pb-2 font-medium text-center">Admin</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-admin-subtle/50 text-admin-muted">
                                <tr>
                                    <td class="py-2.5">Kelola booking & jadwal</td>
                                    <td class="text-center text-admin-green">✓</td>
                                    <td class="text-center text-admin-green">✓</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5">Kelola paket & customer</td>
                                    <td class="text-center text-admin-green">✓</td>
                                    <td class="text-center text-admin-green">✓</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5">Lihat laporan keuangan</td>
                                    <td class="text-center text-admin-green">✓</td>
                                    <td class="text-center text-admin-dim">✕</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5">Ubah info & pembayaran studio</td>
                                    <td class="text-center text-admin-green">✓</td>
                                    <td class="text-center text-admin-dim">✕</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- TAB 3: PEMBAYARAN & KEUANGAN (Figma Page 19) -->
    <!-- ========================================================================= -->
    <div x-show="tab === 'pembayaran'" class="space-y-6" style="display: none;">

        <!-- 4 Revenue Metrics & Bar Chart Row (From Figma Page 19) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left: 4 Metric Cards (Diterima Bulan Ini, Sisa Pelunasan, Menunggu DP, Refund) -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Diterima Bulan Ini -->
                <div class="bg-admin-card border border-admin rounded-xl p-4">
                    <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                        <i data-lucide="wallet" class="w-3.5 h-3.5 text-admin-green"></i>
                        <span>Diterima Bulan Ini</span>
                    </div>
                    <div class="text-lg font-bold text-white tracking-tight">Rp 5.575.000</div>
                    <div class="text-[0.68rem] text-admin-green mt-1">▲ 12% dari Maret</div>
                </div>

                <!-- Sisa Pelunasan -->
                <div class="bg-admin-card border border-admin rounded-xl p-4">
                    <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                        <i data-lucide="hourglass" class="w-3.5 h-3.5 text-admin-yellow"></i>
                        <span>Sisa Pelunasan</span>
                    </div>
                    <div class="text-lg font-bold text-white tracking-tight">Rp 725.000</div>
                    <div class="text-[0.68rem] text-admin-dim mt-1">2 sesi belum lunas</div>
                </div>

                <!-- Menunggu DP -->
                <div class="bg-admin-card border border-admin rounded-xl p-4">
                    <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                        <i data-lucide="clock" class="w-3.5 h-3.5 text-admin-gold"></i>
                        <span>Menunggu DP</span>
                    </div>
                    <div class="text-lg font-bold text-white tracking-tight">Rp 425.000</div>
                    <div class="text-[0.68rem] text-admin-dim mt-1">1 transaksi, slot ditahan</div>
                </div>

                <!-- Refund -->
                <div class="bg-admin-card border border-admin rounded-xl p-4">
                    <div class="flex items-center gap-2 text-admin-muted text-xs mb-1">
                        <i data-lucide="rotate-ccw" class="w-3.5 h-3.5 text-admin-red"></i>
                        <span>Refund</span>
                    </div>
                    <div class="text-lg font-bold text-white tracking-tight">Rp 225.000</div>
                    <div class="text-[0.68rem] text-admin-dim mt-1">1 transaksi bulan ini</div>
                </div>
            </div>

            <!-- Right: Pemasukan 6 Bulan Terakhir Bar Chart (Figma 19) -->
            <div class="lg:col-span-2 bg-admin-card border border-admin rounded-xl p-6 flex flex-col justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-white">Pemasukan 6 Bulan Terakhir</h3>
                    <p class="text-xs text-admin-dim">Dalam jutaan rupiah, pembayaran yang sudah diterima.</p>
                </div>

                <!-- Bar Chart Visual (Nov - Apr) -->
                <div class="h-44 flex items-end justify-between gap-3 pt-6 px-4">
                    <!-- Nov: 3.1 jt -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <span class="text-[0.68rem] text-admin-dim">3,1</span>
                        <div class="w-full max-w-[42px] bg-[#3a3224] rounded-t" style="height: 52%;"></div>
                        <span class="text-[0.68rem] text-admin-dim">Nov</span>
                    </div>
                    <!-- Des: 4.8 jt -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <span class="text-[0.68rem] text-admin-dim">4,8</span>
                        <div class="w-full max-w-[42px] bg-[#54452a] rounded-t" style="height: 80%;"></div>
                        <span class="text-[0.68rem] text-admin-dim">Des</span>
                    </div>
                    <!-- Jan: 3.9 jt -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <span class="text-[0.68rem] text-admin-dim">3,9</span>
                        <div class="w-full max-w-[42px] bg-[#3a3224] rounded-t" style="height: 65%;"></div>
                        <span class="text-[0.68rem] text-admin-dim">Jan</span>
                    </div>
                    <!-- Feb: 4.4 jt -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <span class="text-[0.68rem] text-admin-dim">4,4</span>
                        <div class="w-full max-w-[42px] bg-[#54452a] rounded-t" style="height: 73%;"></div>
                        <span class="text-[0.68rem] text-admin-dim">Feb</span>
                    </div>
                    <!-- Mar: 5.0 jt -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <span class="text-[0.68rem] text-admin-dim">5,0</span>
                        <div class="w-full max-w-[42px] bg-[#755e35] rounded-t" style="height: 85%;"></div>
                        <span class="text-[0.68rem] text-admin-dim">Mar</span>
                    </div>
                    <!-- Apr: 5.6 jt (Highlighted Gold) -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <span class="text-[0.68rem] font-bold text-admin-gold">5,6</span>
                        <div class="w-full max-w-[42px] bg-gradient-to-t from-admin-gold to-admin-gold-light rounded-t shadow-md shadow-admin-gold-glow" style="height: 94%;"></div>
                        <span class="text-[0.68rem] font-semibold text-admin-gold">Apr</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle: Metode Pembayaran & Rekening Pencairan -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Metode Pembayaran Setup -->
            <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
                <h3 class="text-sm font-semibold text-white border-b border-admin-subtle pb-3">Metode Pembayaran</h3>

                <div class="space-y-3 text-xs">
                    <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
                        <div>
                            <div class="font-semibold text-white">QRIS Instan <span class="badge-confirmed text-[0.62rem] ml-1">Aktif</span></div>
                            <div class="text-[0.68rem] text-admin-dim">GoPay, OVO, BCA, Mandiri</div>
                        </div>
                        <input type="checkbox" checked class="w-4 h-4 rounded text-admin-gold focus:ring-0">
                    </div>

                    <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
                        <div>
                            <div class="font-semibold text-white">Transfer Bank <span class="badge-confirmed text-[0.62rem] ml-1">Aktif</span></div>
                            <div class="text-[0.68rem] text-admin-dim">BCA / Mandiri Virtual Account</div>
                        </div>
                        <input type="checkbox" checked class="w-4 h-4 rounded text-admin-gold focus:ring-0">
                    </div>

                    <div>
                        <label class="block text-admin-muted mb-1.5 font-medium">DP Minimal Booking</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button class="btn-admin-ghost justify-center py-2 text-xs">30%</button>
                            <button class="btn-admin-gold justify-center py-2 text-xs">50%</button>
                            <button class="btn-admin-ghost justify-center py-2 text-xs">100% Lunas</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rekening Pencairan -->
            <div class="bg-admin-card border border-admin rounded-xl p-6 space-y-4">
                <h3 class="text-sm font-semibold text-white border-b border-admin-subtle pb-3">Rekening Pencairan</h3>

                <div class="space-y-3 text-xs">
                    <div class="p-3.5 bg-[#17171a] border border-admin rounded-lg flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-admin-gold/20 text-admin-gold flex items-center justify-center font-bold">BCA</div>
                            <div>
                                <div class="font-semibold text-white">BCA •••• 7788 <span class="badge-confirmed text-[0.62rem] ml-1">✓ Terverifikasi</span></div>
                                <div class="text-[0.68rem] text-admin-dim">a/n MUJA PHOTOGRAPHY</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-admin-muted mb-1 font-medium">Jadwal Pencairan</label>
                        <select class="admin-input">
                            <option>Setiap Senin</option>
                            <option>Setiap Hari</option>
                            <option>Bulanan</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between p-3.5 bg-[#17171a] border border-admin rounded-lg">
                        <div>
                            <div class="font-semibold text-white">Kirim Bukti Bayar via WhatsApp</div>
                            <div class="text-[0.68rem] text-admin-dim">Otomatis ke pelanggan setelah pembayaran masuk</div>
                        </div>
                        <input type="checkbox" checked class="w-4 h-4 rounded text-admin-gold focus:ring-0">
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom: Histori Pembayaran Table (From Figma Page 19 bottom) -->
        <div class="bg-admin-card border border-admin rounded-xl p-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">
                <div>
                    <h3 class="text-sm font-semibold text-white">Histori Pembayaran</h3>
                    <p class="text-xs text-admin-dim">Semua transaksi DP, pelunasan, dan refund dari booking pelanggan.</p>
                </div>
                <button class="btn-admin-ghost text-xs py-1.5 px-3">
                    <i data-lucide="download" class="w-3.5 h-3.5"></i>
                    <span>Ekspor CSV</span>
                </button>
            </div>

            <!-- Status Tabs (Semua 7, Lunas 3, DP Dibayar 2, Menunggu 1, Refund 1) -->
            <div class="flex items-center gap-2 mb-4 overflow-x-auto text-xs pb-1">
                <button class="px-3 py-1 rounded-full bg-admin-gold text-[#0d0d0d] font-semibold">Semua 7</button>
                <button class="px-3 py-1 rounded-full bg-[#1a1a1d] text-admin-muted hover:text-white">Lunas 3</button>
                <button class="px-3 py-1 rounded-full bg-[#1a1a1d] text-admin-muted hover:text-white">DP Dibayar 2</button>
                <button class="px-3 py-1 rounded-full bg-[#1a1a1d] text-admin-muted hover:text-white">Menunggu 1</button>
                <button class="px-3 py-1 rounded-full bg-[#1a1a1d] text-admin-muted hover:text-white">Refund 1</button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-admin-dim border-b border-admin-subtle">
                            <th class="pb-3.5 font-medium">Pelanggan & Paket</th>
                            <th class="pb-3.5 font-medium">Invoice</th>
                            <th class="pb-3.5 font-medium">Metode</th>
                            <th class="pb-3.5 font-medium">Nominal</th>
                            <th class="pb-3.5 font-medium text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-admin-subtle/60">
                        <tr>
                            <td class="py-3.5">
                                <div class="font-medium text-white">Diana Olivia</div>
                                <div class="text-[0.68rem] text-admin-dim">Portrait Premium</div>
                            </td>
                            <td class="py-3.5 text-admin-muted">
                                <div>INV-0128</div>
                                <div class="text-[0.68rem] text-admin-dim">18 Apr 2026</div>
                            </td>
                            <td class="py-3.5 text-admin-muted">QRIS Instan</td>
                            <td class="py-3.5 font-medium text-white">
                                <div>Rp 225.000</div>
                                <div class="text-[0.68rem] text-admin-dim">Dari Rp 450.000</div>
                            </td>
                            <td class="py-3.5 text-right"><span class="badge-gold">DP Dibayar</span></td>
                        </tr>
                        <tr>
                            <td class="py-3.5">
                                <div class="font-medium text-white">Clarissa Wijaya</div>
                                <div class="text-[0.68rem] text-admin-dim">Maternity Gold Elegance</div>
                            </td>
                            <td class="py-3.5 text-admin-muted">
                                <div>INV-0127</div>
                                <div class="text-[0.68rem] text-admin-dim">17 Apr 2026</div>
                            </td>
                            <td class="py-3.5 text-admin-muted">Transfer BCA</td>
                            <td class="py-3.5 font-medium text-white">
                                <div>Rp 750.000</div>
                                <div class="text-[0.68rem] text-admin-dim">Pembayaran penuh</div>
                            </td>
                            <td class="py-3.5 text-right"><span class="badge-confirmed">✓ Lunas</span></td>
                        </tr>
                        <tr>
                            <td class="py-3.5">
                                <div class="font-medium text-white">Keluarga Santoso</div>
                                <div class="text-[0.68rem] text-admin-dim">Family Package</div>
                            </td>
                            <td class="py-3.5 text-admin-muted">
                                <div>INV-0126</div>
                                <div class="text-[0.68rem] text-admin-dim">16 Apr 2026</div>
                            </td>
                            <td class="py-3.5 text-admin-muted">QRIS Instan</td>
                            <td class="py-3.5 font-medium text-white">
                                <div>Rp 425.000</div>
                                <div class="text-[0.68rem] text-admin-dim">DP 50% dari Rp 850.000</div>
                            </td>
                            <td class="py-3.5 text-right"><span class="badge-pending">Menunggu</span></td>
                        </tr>
                        <tr>
                            <td class="py-3.5">
                                <div class="font-medium text-white">Bagas Wirawan</div>
                                <div class="text-[0.68rem] text-admin-dim">Portrait Premium</div>
                            </td>
                            <td class="py-3.5 text-admin-muted">
                                <div>INV-0122</div>
                                <div class="text-[0.68rem] text-admin-dim">10 Apr 2026</div>
                            </td>
                            <td class="py-3.5 text-admin-muted">QRIS Instan</td>
                            <td class="py-3.5 font-medium text-admin-red">
                                <div>- Rp 225.000</div>
                                <div class="text-[0.68rem] text-admin-dim">Dikembalikan ke pelanggan</div>
                            </td>
                            <td class="py-3.5 text-right"><span class="badge-cancelled">Refund</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<!-- Alpine.js for lightweight tab & role preview switching -->
@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
@endsection

