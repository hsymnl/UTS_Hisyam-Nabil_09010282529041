@extends('layouts.app')

@section('title', 'Dashboard — Perpustakaan')

@section('content')
<!-- Header Sederhana -->
<div class="page-header">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-description">Ringkasan data perpustakaan.</p>
    </div>
</div>

<!-- 1. Ringkasan Data: Maksimal 2 Summary Card -->
<div class="summary-grid">
    <div class="summary-card">
        <div class="summary-card-label">Total Buku</div>
        <div class="summary-card-value">{{ $totalBooks }}</div>
    </div>

    <div class="summary-card">
        <div class="summary-card-label">Total Kategori</div>
        <div class="summary-card-value">{{ $totalCategories }}</div>
    </div>
</div>

<!-- 2. Koleksi Terbaru -->
<div style="margin-bottom: 32px;">
    <div class="section-header">
        <h2 class="section-title">Koleksi Terbaru</h2>
        <a href="{{ route('books.index') }}" class="section-link">
            Lihat semua &rarr;
        </a>
    </div>

    <div class="table-card">
        @if ($recentBooks->isEmpty())
            <div class="empty-state">
                <h3 class="empty-state-title">Belum ada data buku.</h3>
                <p class="empty-state-desc">Tambahkan buku pertama untuk mulai mengelola koleksi.</p>
                <a href="{{ route('books.create') }}" class="btn btn-primary">
                    + Tambah Buku
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th style="width: 100px; text-align: right;">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentBooks as $book)
                            <tr>
                                <td style="font-weight: 550; color: var(--color-text);">
                                    <a href="{{ route('books.show', $book) }}" style="color: inherit; text-decoration: none;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='inherit'">
                                        {{ $book->title }}
                                    </a>
                                </td>
                                <td style="color: var(--color-text-secondary);">{{ $book->author }}</td>
                                <td>
                                    <span class="badge-category">
                                        {{ $book->category->name ?? '-' }}
                                    </span>
                                </td>
                                <td style="text-align: right; color: var(--color-text-secondary); font-variant-numeric: tabular-nums;">
                                    {{ $book->stock }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<!-- 3. Aksi Cepat -->
<div>
    <h2 class="section-title" style="margin-bottom: 14px;">Aksi Cepat</h2>
    <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Lihat Buku
        </a>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            + Tambah Buku
        </a>
    </div>
</div>
@endsection
