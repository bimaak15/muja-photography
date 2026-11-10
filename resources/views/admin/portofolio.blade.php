@extends('layouts.admin')

@section('title', 'Kurasi Portofolio')

@section('admin_content')
    <div class="admin-topbar">
        <div>
            <div class="section-label" style="margin-bottom:0.25rem;">Etalase Karya</div>
            <h1 class="admin-page-title">Kurasi Portofolio &amp; Urutan Tampilan</h1>
        </div>
        <div>
            <button type="button" class="btn-gold" style="font-size:0.7rem; padding:0.6rem 1.4rem; border:none; cursor:pointer;" onclick="alert('Dialog tambah foto portofolio baru.');">
                + Tambah Karya Baru
            </button>
        </div>
    </div>

    <div class="admin-table-card">
        <div class="admin-table-header">
            <div>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.4rem; color:#f7f2ea; margin:0;">
                    Karya Terbit di Web Publik ({{ count($portfolios) }})
                </h3>
            </div>
            <a href="{{ route('portofolio') }}" target="_blank" style="font-size:0.75rem; color:#c9a96e; text-decoration:none;">
                Buka Halaman Portofolio &rarr;
            </a>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Judul Karya / Sesi</th>
                    <th>Kategori</th>
                    <th>Status Visibilitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $p)
                    <tr>
                        <td><strong style="color:#c9a96e;">#{{ $p['urutan'] }}</strong></td>
                        <td><strong style="color:#f7f2ea;">{{ $p['judul'] }}</strong></td>
                        <td>{{ $p['kategori'] }}</td>
                        <td><span style="color:#10b981;">{{ $p['status'] }}</span></td>
                        <td>
                            <div style="display:flex; gap:0.5rem;">
                                <button type="button" class="btn-outline-gold" style="margin:0; padding:0.25rem 0.6rem; font-size:0.65rem;" onclick="alert('Ubah urutan atau sembunyikan foto.');">
                                    Edit
                                </button>
                                <button type="button" class="btn-outline-gold" style="margin:0; padding:0.25rem 0.6rem; font-size:0.65rem; border-color:rgba(239,68,68,0.4); color:#ef4444;" onclick="alert('Hapus foto dari portofolio.');">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
