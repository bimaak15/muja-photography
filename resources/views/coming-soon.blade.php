@extends('layouts.app')

@section('title', 'Segera Hadir')
@section('meta_description', 'Halaman ini sedang dalam tahap pengembangan. Pantau terus MujaPhotography.')

@section('content')
    <main style="display:grid;place-items:center;min-height:100dvh;text-align:center;padding:2rem;">
        <div>
            <p style="font-size:4rem;margin-bottom:1rem;">🚧</p>
            <h1 style="font-size:1.5rem;font-weight:600;margin-bottom:.5rem;">Segera Hadir</h1>
            <p style="color:#888;margin-bottom:1.5rem;">Halaman ini sedang kami bangun.</p>
            <a href="{{ route('home') }}"
               style="display:inline-block;padding:.75rem 1.5rem;background:#fff;color:#000;border-radius:.5rem;font-weight:500;">
                ← Kembali ke Beranda
            </a>
        </div>
    </main>
@endsection
