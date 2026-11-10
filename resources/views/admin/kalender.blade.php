@extends('layouts.admin')

@section('title', 'Kalender & Pengaturan Slot')

@section('admin_content')
    <div class="admin-topbar">
        <div>
            <div class="section-label" style="margin-bottom:0.25rem;">Manajemen Ketersediaan</div>
            <h1 class="admin-page-title">Kalender &amp; Blokir Slot Anti-Bentrok</h1>
        </div>
        <div>
            <button type="button" class="btn-gold" style="font-size:0.7rem; padding:0.6rem 1.4rem; border:none; cursor:pointer;" onclick="alert('Slot baru berhasil ditambahkan ke daftar blokir.');">
                + Blokir Tanggal / Jam Baru
            </button>
        </div>
    </div>

    <div style="display:grid; grid-template-columns:1fr 1.5fr; gap:2rem; align-items:start;">
        {{-- Add Block Form --}}
        <div class="booking-panel">
            <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.4rem; color:#f7f2ea; margin-bottom:1rem;">
                Form Blokir Jadwal Fotografer
            </h3>
            <p style="font-size:0.8rem; color:rgba(255,255,255,0.5); line-height:1.5; margin-bottom:1.5rem;">
                Tanggal dan jam yang diblokir otomatis tidak akan dapat dipilih oleh klien di kalender reservasi publik.
            </p>

            <div class="muja-form-group">
                <label class="muja-label">Pilih Tanggal</label>
                <input type="date" class="muja-input" value="2026-11-29">
            </div>

            <div class="muja-form-group">
                <label class="muja-label">Rentang Slot</label>
                <select class="muja-select">
                    <option value="full">Seharian Penuh (Full Day)</option>
                    <option value="pagi">Sesi Pagi (08:00 - 12:00)</option>
                    <option value="siang">Sesi Siang (13:00 - 17:00)</option>
                </select>
            </div>

            <div class="muja-form-group">
                <label class="muja-label">Keterangan Penjadwalan</label>
                <input type="text" class="muja-input" placeholder="Reservasi langsung klien offline / Libur operasional tim">
            </div>

            <button type="button" class="btn-gold" style="width:100%; border:none; cursor:pointer; text-align:center;" onclick="alert('Jadwal berhasil ditandai!');">
                Tandai Jadwal Terisi
            </button>
        </div>

        {{-- Blocked Slots Table --}}
        <div class="admin-table-card">
            <div class="admin-table-header">
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.4rem; color:#f7f2ea; margin:0;">
                    Daftar Tanggal yang Sedang Diblokir
                </h3>
            </div>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Alasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blockedSlots as $slot)
                        <tr>
                            <td><strong style="color:#f7f2ea;">{{ $slot['tanggal'] }}</strong></td>
                            <td><span style="color:#c9a96e;">{{ $slot['jam'] }}</span></td>
                            <td>{{ $slot['alasan'] }}</td>
                            <td>
                                <button type="button" class="btn-outline-gold" style="margin:0; padding:0.25rem 0.6rem; font-size:0.65rem;" onclick="alert('Slot telah dibuka kembali untuk publik.');">
                                    Buka Slot
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
