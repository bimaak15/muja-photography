@extends('layouts.admin')

@section('title', 'Pesanan Foto HD')

@section('admin_content')
    <div class="admin-topbar">
        <div>
            <div class="section-label" style="margin-bottom:0.25rem;">Transaksi Unduhan</div>
            <h1 class="admin-page-title">Daftar Pesanan Foto HD Resolusi Penuh</h1>
        </div>
        <div style="font-size:0.8rem; color:#10b981; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); padding:0.5rem 1rem; border-radius:4px;">
            ● Webhook Midtrans Aktif (Otomatis Buka Unduhan)
        </div>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-header">
            <div>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.4rem; color:#f7f2ea; margin:0;">
                    Riwayat Transaksi Foto HD ({{ count($orders) }})
                </h3>
            </div>
            <div style="font-size:0.75rem; color:rgba(255,255,255,0.5);">
                Masa aktif link: 7 hari
            </div>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Pemesan</th>
                    <th>WhatsApp</th>
                    <th>Album Acara</th>
                    <th>Jumlah Foto</th>
                    <th>Total Bayar</th>
                    <th>Status Midtrans</th>
                    <th>Waktu Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $o)
                    <tr>
                        <td><strong style="color:#e8d5b0; font-family:'Bebas Neue',sans-serif; font-size:1.1rem; letter-spacing:0.05em;">{{ $o['id'] }}</strong></td>
                        <td>{{ $o['pemesan'] }}</td>
                        <td>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $o['wa']) }}" target="_blank" style="color:#c9a96e; text-decoration:none;">
                                {{ $o['wa'] }}
                            </a>
                        </td>
                        <td>{{ $o['album'] }}</td>
                        <td>{{ $o['qty'] }} foto HD</td>
                        <td><strong style="color:#f7f2ea;">Rp {{ number_format($o['total'], 0, ',', '.') }}</strong></td>
                        <td><span style="color:#10b981;">{{ $o['status'] }}</span></td>
                        <td>{{ $o['waktu'] }}</td>
                        <td>
                            <button type="button" class="btn-outline-gold" style="margin:0; padding:0.25rem 0.6rem; font-size:0.65rem;" onclick="alert('Tautan unduhan baru berhasil dikirimkan ulang ke WhatsApp pemesan.');">
                                Kirim Ulang Link
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
