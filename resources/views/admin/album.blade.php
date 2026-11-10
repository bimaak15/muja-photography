@extends('layouts.admin')

@section('title', 'Manajemen Album Acara Publik')

@section('admin_content')
    <div class="admin-topbar">
        <div>
            <div class="section-label" style="margin-bottom:0.25rem;">Galeri Komunitas</div>
            <h1 class="admin-page-title">Album Acara &amp; Distribusi Foto HD</h1>
        </div>
        <div>
            <button type="button" class="btn-gold" style="font-size:0.7rem; padding:0.6rem 1.4rem; border:none; cursor:pointer;" onclick="alert('Buka dialog unggah massal foto dan penentuan jam melintas.');">
                + Unggah Album Baru
            </button>
        </div>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-header">
            <div>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.4rem; color:#f7f2ea; margin:0;">
                    Album Acara Publik Terbit ({{ count($albums) }})
                </h3>
            </div>
            <a href="{{ route('acara.index') }}" target="_blank" style="font-size:0.75rem; color:#c9a96e; text-decoration:none;">
                Lihat Galeri Publik &rarr;
            </a>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama Acara</th>
                    <th>Tanggal Peliputan</th>
                    <th>Jumlah Foto</th>
                    <th>Harga HD / Lembar</th>
                    <th>Foto Terjual</th>
                    <th>Estimasi Pendapatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $a)
                    <tr>
                        <td>
                            <strong style="color:#f7f2ea; font-size:0.95rem;">{{ $a['nama'] }}</strong>
                            <div style="font-size:0.7rem; color:rgba(255,255,255,0.4);">Slug: /acara/{{ $a['slug'] }}</div>
                        </td>
                        <td>{{ $a['tanggal'] }}</td>
                        <td>{{ $a['jumlah'] }} foto (Ber-watermark)</td>
                        <td><span style="color:#c9a96e;">Rp {{ number_format($a['harga'], 0, ',', '.') }}</span></td>
                        <td><strong style="color:#10b981;">{{ $a['terjual'] }} lembar</strong></td>
                        <td>Rp {{ number_format($a['harga'] * $a['terjual'], 0, ',', '.') }}</td>
                        <td>
                            <div style="display:flex; gap:0.5rem;">
                                <a href="{{ route('acara.show', $a['slug']) }}" target="_blank" class="btn-outline-gold" style="margin:0; padding:0.3rem 0.6rem; font-size:0.65rem;">
                                    Buka Galeri
                                </a>
                                <button type="button" class="btn-gold" style="padding:0.3rem 0.6rem; font-size:0.65rem; border:none; cursor:pointer;" onclick="alert('Edit album dan jam melintas');">
                                    Edit
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
