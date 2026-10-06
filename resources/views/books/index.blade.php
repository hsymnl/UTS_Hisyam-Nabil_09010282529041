@extends('layouts.app')

@section('title', 'Daftar Buku — Perpustakaan')

@section('content')
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

<div class="table-card">
    @if ($books->isEmpty())
        <div class="empty-state">
            <h2 class="empty-state-title">Belum ada data buku.</h2>
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
                        <th style="width: 50px;">No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th style="width: 80px;">Tahun</th>
                        <th style="width: 80px;">Stok</th>
                        <th>Kategori</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $index => $book)
                        <tr>
                            <td style="color: var(--color-text-secondary);">{{ $index + 1 }}</td>
                            <td style="font-weight: 550; color: var(--color-text);">{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>
                                <span style="display: inline-block; padding: 2px 8px; border-radius: 4px; background-color: var(--color-page); border: 1px solid var(--color-border); font-size: 13px; color: var(--color-text-secondary);">
                                    {{ $book->category->name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-secondary btn-sm">
                                        Detail
                                    </a>
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary btn-sm">
                                        Edit
                                    </a>
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm"
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

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="modal-dialog">
        <h3 id="modalTitle" class="modal-title">Hapus Buku?</h3>
        <p class="modal-body">
            Apakah Anda yakin ingin menghapus buku <strong id="deleteBookTitle"></strong>? Tindakan ini tidak dapat dibatalkan.
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

    // Tutup modal jika klik di luar card atau tekan tombol Escape
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
