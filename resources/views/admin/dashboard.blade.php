@extends('layouts.admin')

@section('title', 'Ringkasan Dashboard')

@section('admin_content')
    <div class="admin-topbar">
        <div>
            <div class="section-label" style="margin-bottom:0.25rem;">Panel Pengelola</div>
            <h1 class="admin-page-title">Ringkasan Operasional</h1>
        </div>
        <div>
            <a href="{{ route('admin.booking') }}" class="btn-gold" style="font-size:0.7rem; padding:0.6rem 1.4rem;">
                + Cek Booking Terbaru
            </a>
        </div>
    </div>

    {{-- Stat Cards --}}
    <div class="admin-stat-grid">
        <div class="admin-stat-card">
            <div class="admin-stat-label">Total Booking Sesi</div>
            <div class="admin-stat-value">{{ $stats['total_booking'] }}</div>
            <div style="font-size:0.75rem; color:#10b981; margin-top:0.35rem;">↑ 8 booking aktif berjalan</div>
        </div>
        <div class="admin-stat-card">
            <div class="admin-stat-label">Estimasi Omset Bulan Ini</div>
            <div class="admin-stat-value" style="font-size:1.8rem;">Rp {{ number_format($stats['pendapatan_bulan'], 0, ',', '.') }}</div>
            <div style="font-size:0.75rem; color:#c9a96e; margin-top:0.35rem;">DP &amp; Pelunasan Midtrans</div>
        </div>
        <div class="admin-stat-card">
            <div class="admin-stat-label">Unduhan Foto HD Terjual</div>
            <div class="admin-stat-value">{{ $stats['pesanan_hd'] }}</div>
            <div style="font-size:0.75rem; color:#60a5fa; margin-top:0.35rem;">Dari 4 album acara publik</div>
        </div>
    </div>

    {{-- Recent Bookings Table --}}
    <div class="admin-table-card">
        <div class="admin-table-header">
            <div>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.4rem; color:#f7f2ea; margin:0;">
                    Booking Sesi Privat Terkini
                </h3>
            </div>
            <a href="{{ route('admin.booking') }}" style="font-size:0.75rem; color:#c9a96e; text-decoration:none;">
                Lihat Semua &rarr;
            </a>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Klien</th>
                    <th>Paket</th>
                    <th>Tanggal Sesi</th>
                    <th>Status DP</th>
                    <th>Tahapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentBookings as $b)
                    <tr>
                        <td><strong style="color:#e8d5b0; font-family:'Bebas Neue',sans-serif; font-size:1.1rem; letter-spacing:0.05em;">{{ $b['kode'] }}</strong></td>
                        <td>{{ $b['nama'] }}</td>
                        <td>{{ $b['paket'] }}</td>
                        <td>{{ $b['tgl'] }}</td>
                        <td><span style="color:#10b981;">{{ $b['dp'] }}</span></td>
                        <td>
                            @if ($b['status'] === 'waiting_dp')
                                <span class="status-badge badge-waiting">Menunggu DP</span>
                            @elseif ($b['status'] === 'confirmed')
                                <span class="status-badge badge-confirmed">Terkonfirmasi</span>
                            @elseif ($b['status'] === 'editing')
                                <span class="status-badge badge-editing">Editing</span>
                            @elseif ($b['status'] === 'done')
                                <span class="status-badge badge-done">Selesai</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('status', ['kode' => $b['kode']]) }}" target="_blank" style="color:#c9a96e; text-decoration:none; font-size:0.75rem;">
                                Detail &rarr;
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
