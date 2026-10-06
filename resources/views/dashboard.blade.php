@extends('layouts.app')

@section('title', 'Dashboard — Perpustakaan')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-description">Ringkasan data perpustakaan.</p>
    </div>
</div>

<!-- Summary Cards (Maksimal 2 Kartu Sesuai Desain.md) -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 32px;">
    <div class="card">
        <div style="font-size: 13px; font-weight: 500; color: var(--color-text-secondary); margin-bottom: 8px;">
            Total Buku
        </div>
        <div style="font-size: 32px; font-weight: 700; color: var(--color-text); line-height: 1.2;">
            {{ $totalBooks }}
        </div>
    </div>

    <div class="card">
        <div style="font-size: 13px; font-weight: 500; color: var(--color-text-secondary); margin-bottom: 8px;">
            Total Kategori
        </div>
        <div style="font-size: 32px; font-weight: 700; color: var(--color-text); line-height: 1.2;">
            {{ $totalCategories }}
        </div>
    </div>
</div>

<!-- Aksi Cepat -->
<div class="panel">
    <h2 style="font-size: 18px; font-weight: 600; color: var(--color-text); margin-bottom: 16px;">
        Aksi Cepat
    </h2>
    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Lihat Buku
        </a>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            + Tambah Buku
        </a>
    </div>
</div>
@endsection
