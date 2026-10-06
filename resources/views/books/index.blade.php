@extends('layouts.app')

@section('title', 'Daftar Buku — Perpustakaan')

@section('content')
<!-- Header Halaman -->
<div class="page-header">
    <div>
        <h1 class="page-title">Buku</h1>
        <p class="page-description">Kelola seluruh data buku perpustakaan.</p>
    </div>
    <div>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            + Tambah Buku
        </a>
    </div>
</div>

<!-- Search Toolbar Sederhana -->
<div style="margin-bottom: 20px;">
    <form action="{{ route('books.index') }}" method="GET" style="display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
        <input
            type="text"
            name="search"
            value="{{ $search ?? '' }}"
            placeholder="Cari judul atau penulis..."
            class="form-input"
            style="height: 40px; max-width: 360px; width: 100%;"
        >
        <button type="submit" class="btn btn-primary" style="height: 40px; padding: 0 14px;">
            Cari
        </button>
        @if (!empty($search))
            <a href="{{ route('books.index') }}" class="btn btn-secondary" style="height: 40px; padding: 0 14px;">
                Reset
            </a>
        @endif
    </form>
</div>

<!-- Table Panel -->
<div class="table-card">
    @if ($books->isEmpty())
        <div class="empty-state">
            @if (!empty($search))
                <h2 class="empty-state-title">Buku tidak ditemukan.</h2>
                <p class="empty-state-desc">Coba gunakan kata pencarian yang berbeda.</p>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">
                    Tampilkan Semua Buku
                </a>
            @else
                <h2 class="empty-state-title">Belum ada data buku.</h2>
                <p class="empty-state-desc">Tambahkan buku pertama untuk mulai mengelola koleksi.</p>
                <a href="{{ route('books.create') }}" class="btn btn-primary">
                    + Tambah Buku
                </a>
            @endif
        </div>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 48px;">No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th style="width: 80px;">Tahun</th>
                        <th style="width: 80px;">Stok</th>
                        <th>Kategori</th>
                        <th style="width: 170px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $index => $book)
                        <tr>
                            <td style="color: var(--color-text-secondary); font-variant-numeric: tabular-nums;">
                                {{ $index + 1 }}
                            </td>
                            <td style="font-weight: 550; color: var(--color-text);">
                                <a href="{{ route('books.show', $book) }}" style="color: inherit; text-decoration: none;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='inherit'">
                                    {{ $book->title }}
                                </a>
                            </td>
                            <td style="color: var(--color-text-secondary);">{{ $book->author }}</td>
                            <td style="color: var(--color-text-secondary);">{{ $book->publisher }}</td>
                            <td style="color: var(--color-text-secondary); font-variant-numeric: tabular-nums;">{{ $book->year }}</td>
                            <td style="color: var(--color-text-secondary); font-variant-numeric: tabular-nums;">{{ $book->stock }}</td>
                            <td>
                                <span class="badge-category">
                                    {{ $book->category->name ?? '-' }}
                                </span>
                            </td>
                            <td style="text-align: right;">
                                <div class="table-actions" style="justify-content: flex-end;">
                                    <a href="{{ route('books.show', $book) }}" class="btn-link-action">
                                        Detail
                                    </a>
                                    <a href="{{ route('books.edit', $book) }}" class="btn-link-action">
                                        Edit
                                    </a>
                                    <button
                                        type="button"
                                        class="btn-link-danger"
                                        onclick="confirmDelete('{{ route('books.destroy', $book) }}', '{{ addslashes($book->title) }}')"
                                    >
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Modal Konfirmasi Hapus Sederhana -->
<div id="deleteModal" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="modal-dialog">
        <h3 id="modalTitle" class="modal-title">Hapus Buku?</h3>
        <p class="modal-body">
            Apakah Anda yakin ingin menghapus buku <span id="deleteBookTitle" style="font-weight: 600; color: var(--color-text);"></span>? Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="modal-actions">
            <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">
                Batal
            </button>
            <form id="deleteForm" action="" method="POST" style="margin: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(url, title) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const titleSpan = document.getElementById('deleteBookTitle');

        form.action = url;
        titleSpan.textContent = title ? '"' + title + '"' : 'ini';
        modal.classList.add('active');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('active');
    }

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>
@endsection
