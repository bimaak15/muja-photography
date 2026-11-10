@extends('layouts.admin')

@section('title', 'Daftar Booking Masuk')

@section('admin_content')
    <div class="admin-topbar">
        <div>
            <div class="section-label" style="margin-bottom:0.25rem;">Reservasi Sesi</div>
            <h1 class="admin-page-title">Daftar Booking Masuk</h1>
        </div>
        <div>
            <a href="{{ route('booking') }}" target="_blank" class="btn-outline-gold" style="font-size:0.7rem; padding:0.6rem 1.4rem;">
                + Tambah Booking Manual
            </a>
        </div>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-header">
            <div>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.4rem; color:#f7f2ea; margin:0;">
                    Seluruh Reservasi Klien ({{ count($bookings) }})
                </h3>
            </div>
            <div style="font-size:0.75rem; color:rgba(255,255,255,0.5);">
                Integrasi Midtrans Snap Aktif
            </div>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Klien</th>
                    <th>WhatsApp</th>
                    <th>Paket</th>
                    <th>Tanggal Sesi</th>
                    <th>Lokasi</th>
                    <th>Total Biaya</th>
                    <th>DP</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $b)
                    <tr>
                        <td><strong style="color:#e8d5b0; font-family:'Bebas Neue',sans-serif; font-size:1.1rem; letter-spacing:0.05em;">{{ $b['kode'] }}</strong></td>
                        <td>{{ $b['nama'] }}</td>
                        <td>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $b['wa']) }}" target="_blank" style="color:#c9a96e; text-decoration:none;">
                                {{ $b['wa'] }}
                            </a>
                        </td>
                        <td>{{ $b['paket'] }}</td>
                        <td>{{ $b['tgl'] }}</td>
                        <td>{{ $b['lokasi'] }}</td>
                        <td>Rp {{ number_format($b['total'], 0, ',', '.') }}</td>
                        <td><span style="color:#10b981;">Rp {{ number_format($b['dp'], 0, ',', '.') }}</span></td>
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
                            <div style="display:flex; gap:0.5rem;">
                                <a href="{{ route('status', ['kode' => $b['kode']]) }}" target="_blank" class="btn-outline-gold" style="margin:0; padding:0.3rem 0.6rem; font-size:0.65rem;">
                                    Status
                                </a>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $b['wa']) }}?text={{ urlencode('Halo Kak ' . $b['nama'] . ', kami dari tim Muja Photography ingin mengonfirmasi jadwal booking ' . $b['kode']) }}"
                                   target="_blank" class="btn-gold" style="padding:0.3rem 0.6rem; font-size:0.65rem;">
                                    WA
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
