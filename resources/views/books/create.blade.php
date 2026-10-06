@extends('layouts.app')

@section('title', 'Tambah Buku — Perpustakaan')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Tambah Buku</h1>
        <p class="page-description">Masukkan informasi buku yang akan disimpan.</p>
    </div>
</div>

<div class="panel">
    <form action="{{ route('books.store') }}" method="POST" novalidate>
        @csrf

        <div class="form-grid">
            <!-- Judul Buku -->
            <div class="form-group">
                <label for="title" class="form-label">Judul Buku</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-input @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
                    placeholder="Contoh: Laskar Pelangi"
                    required
                >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Penulis -->
            <div class="form-group">
                <label for="author" class="form-label">Penulis</label>
                <input
                    type="text"
                    id="author"
                    name="author"
                    class="form-input @error('author') is-invalid @enderror"
                    value="{{ old('author') }}"
                    placeholder="Contoh: Andrea Hirata"
                    required
                >
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Penerbit -->
            <div class="form-group">
                <label for="publisher" class="form-label">Penerbit</label>
                <input
                    type="text"
                    id="publisher"
                    name="publisher"
                    class="form-input @error('publisher') is-invalid @enderror"
                    value="{{ old('publisher') }}"
                    placeholder="Contoh: Bentang Pustaka"
                    required
                >
                @error('publisher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tahun Terbit -->
            <div class="form-group">
                <label for="year" class="form-label">Tahun Terbit</label>
                <input
                    type="number"
                    id="year"
                    name="year"
                    class="form-input @error('year') is-invalid @enderror"
                    value="{{ old('year') }}"
                    placeholder="Contoh: 2005"
                    min="1000"
                    max="2100"
                    required
                >
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Stok -->
            <div class="form-group">
                <label for="stock" class="form-label">Stok</label>
                <input
                    type="number"
                    id="stock"
                    name="stock"
                    class="form-input @error('stock') is-invalid @enderror"
                    value="{{ old('stock', 0) }}"
                    placeholder="Contoh: 10"
                    min="0"
                    required
                >
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kategori -->
            <div class="form-group">
                <label for="category_id" class="form-label">Kategori</label>
                <select
                    id="category_id"
                    name="category_id"
                    class="form-select @error('category_id') is-invalid @enderror"
                    required
                >
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                Simpan Buku
            </button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
