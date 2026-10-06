<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCrudTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::firstOrCreate(
            ['email' => 'hisyamnabil@gmail.com'],
            ['name' => 'Hisyam Nabil', 'password' => 'secret']
        );

        $this->category = Category::firstOrCreate(
            ['name' => 'Fiksi'],
            ['description' => 'Buku cerita imajinatif']
        );
    }

    public function test_guest_cannot_access_dashboard(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_access_books(): void
    {
        $response = $this->get('/books');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_dashboard(): void
    {
        $response = $this->actingAs($this->user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Dashboard');
        $response->assertSee('Ringkasan data perpustakaan.');
        $response->assertSee('Total Buku');
        $response->assertSee('Total Kategori');
        $response->assertSee('Lihat Buku');
        $response->assertSee('+ Tambah Buku');
    }

    public function test_authenticated_user_can_view_books_index(): void
    {
        $book = Book::firstOrCreate(
            ['title' => 'Buku Uji Index'],
            [
                'author' => 'Penulis Index',
                'publisher' => 'Penerbit Index',
                'year' => 2023,
                'stock' => 10,
                'category_id' => $this->category->id,
            ]
        );

        $response = $this->actingAs($this->user)->get('/books');
        $response->assertStatus(200);
        $response->assertSee('Buku');
        $response->assertSee('Kelola seluruh data buku perpustakaan.');
        $response->assertSee('Buku Uji Index');
        $response->assertSee($this->category->name);
    }

    public function test_authenticated_user_can_view_create_book_page(): void
    {
        $response = $this->actingAs($this->user)->get('/books/create');
        $response->assertStatus(200);
        $response->assertSee('Tambah Buku');
        $response->assertSee('Masukkan informasi buku yang akan disimpan.');
        $response->assertSee('Judul Buku');
        $response->assertSee('Penulis');
        $response->assertSee('Penerbit');
        $response->assertSee('Tahun Terbit');
        $response->assertSee('Stok');
        $response->assertSee('Kategori');
    }

    public function test_create_book_validation_fails_for_empty_input(): void
    {
        $response = $this->actingAs($this->user)->post('/books', []);
        $response->assertSessionHasErrors(['title', 'author', 'publisher', 'year', 'stock', 'category_id']);
    }

    public function test_authenticated_user_can_store_book(): void
    {
        $bookData = [
            'title' => 'Buku Baru ' . time(),
            'author' => 'Penulis Baru',
            'publisher' => 'Penerbit Baru',
            'year' => 2024,
            'stock' => 15,
            'category_id' => $this->category->id,
        ];

        $response = $this->actingAs($this->user)->post('/books', $bookData);
        $response->assertRedirect('/books');
        $response->assertSessionHas('success', 'Buku berhasil ditambahkan.');

        $this->assertDatabaseHas('books', [
            'title' => $bookData['title'],
            'author' => 'Penulis Baru',
            'stock' => 15,
        ]);
    }

    public function test_authenticated_user_can_view_book_detail(): void
    {
        $book = Book::firstOrCreate(
            ['title' => 'Buku Detail Test'],
            [
                'author' => 'Penulis Detail',
                'publisher' => 'Penerbit Detail',
                'year' => 2022,
                'stock' => 5,
                'category_id' => $this->category->id,
            ]
        );

        $response = $this->actingAs($this->user)->get("/books/{$book->id}");
        $response->assertStatus(200);
        $response->assertSee('Detail Buku');
        $response->assertSee('Informasi lengkap buku.');
        $response->assertSee('Buku Detail Test');
        $response->assertSee('Penulis Detail');
        $response->assertSee('Edit Buku');
        $response->assertSee('Kembali');
    }

    public function test_authenticated_user_can_view_edit_book_page(): void
    {
        $book = Book::firstOrCreate(
            ['title' => 'Buku Edit Test'],
            [
                'author' => 'Penulis Edit',
                'publisher' => 'Penerbit Edit',
                'year' => 2021,
                'stock' => 8,
                'category_id' => $this->category->id,
            ]
        );

        $response = $this->actingAs($this->user)->get("/books/{$book->id}/edit");
        $response->assertStatus(200);
        $response->assertSee('Edit Buku');
        $response->assertSee('Perbarui informasi buku yang dipilih.');
        $response->assertSee('Buku Edit Test');
        $response->assertSee('Simpan Perubahan');
        $response->assertSee('Batal');
    }

    public function test_authenticated_user_can_update_book(): void
    {
        $book = Book::create([
            'title' => 'Buku Sebelum Update',
            'author' => 'Penulis Awal',
            'publisher' => 'Penerbit Awal',
            'year' => 2020,
            'stock' => 3,
            'category_id' => $this->category->id,
        ]);

        $updatedData = [
            'title' => 'Buku Setelah Update',
            'author' => 'Penulis Baru',
            'publisher' => 'Penerbit Baru',
            'year' => 2025,
            'stock' => 12,
            'category_id' => $this->category->id,
        ];

        $response = $this->actingAs($this->user)->put("/books/{$book->id}", $updatedData);
        $response->assertRedirect('/books');
        $response->assertSessionHas('success', 'Buku berhasil diperbarui.');

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Buku Setelah Update',
            'stock' => 12,
        ]);
    }

    public function test_authenticated_user_can_delete_book(): void
    {
        $book = Book::create([
            'title' => 'Buku Mau Dihapus',
            'author' => 'Penulis Hapus',
            'publisher' => 'Penerbit Hapus',
            'year' => 2020,
            'stock' => 1,
            'category_id' => $this->category->id,
        ]);

        $response = $this->actingAs($this->user)->delete("/books/{$book->id}");
        $response->assertRedirect('/books');
        $response->assertSessionHas('success', 'Buku berhasil dihapus.');

        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }

    public function test_logout_redirects_to_login(): void
    {
        $response = $this->actingAs($this->user)->post('/logout');
        $response->assertRedirect('/login');
        $this->assertGuest();
    }
}
