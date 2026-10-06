@extends('layouts.app')

@section('title', 'Detail Buku — Perpustakaan')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Detail Buku</h1>
        <p class="page-description">Informasi lengkap buku.</p>
    </div>
</div>

<div class="panel">
    <!-- Grid Label-Value dalam Satu Panel Informasi Sesuai Desain.md -->
    <div style="display: grid; grid-template-columns: 180px 1fr; row-gap: 16px; column-gap: 24px; font-size: 15px; margin-bottom: 32px;">
        <div style="font-weight: 600; color: var(--color-text-secondary);">Judul Buku</div>
        <div style="color: var(--color-text); font-weight: 550;">{{ $book->title }}</div>

        <div style="font-weight: 600; color: var(--color-text-secondary);">Penulis</div>
        <div style="color: var(--color-text);">{{ $book->author }}</div>

        <div style="font-weight: 600; color: var(--color-text-secondary);">Penerbit</div>
        <div style="color: var(--color-text);">{{ $book->publisher }}</div>

        <div style="font-weight: 600; color: var(--color-text-secondary);">Tahun Terbit</div>
        <div style="color: var(--color-text);">{{ $book->year }}</div>

        <div style="font-weight: 600; color: var(--color-text-secondary);">Stok</div>
        <div style="color: var(--color-text);">{{ $book->stock }}</div>

        <div style="font-weight: 600; color: var(--color-text-secondary);">Kategori</div>
        <div>
            <span style="display: inline-block; padding: 2px 10px; border-radius: 4px; background-color: var(--color-page); border: 1px solid var(--color-border); font-size: 13px; color: var(--color-text-secondary);">
                {{ $book->category->name ?? '-' }}
            </span>
        </div>
    </div>

    <div style="display: flex; gap: 12px; align-items: center; border-top: 1px solid var(--color-border); padding-top: 24px;">
        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">
            Edit Buku
        </a>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
@endsection
