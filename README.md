# Tugas Proyek Pemrograman Web III — Aplikasi Perpustakaan

Aplikasi web sederhana untuk pengelolaan data buku dan kategori perpustakaan berbasis Laravel. Proyek ini dibuat untuk memenuhi tugas proyek UTS mata kuliah Pemrograman Web III (FMD2169), Program Studi D3 Manajemen Informatika, Fakultas Ilmu Komputer, Universitas Sriwijaya.

## Identitas Mahasiswa
- **Nama:** Hisyam Nabil
- **NIM:** 09010282529041
- **Kelas / Prodi:** D3 Manajemen Informatika

---

## Akun Login (Demo)
Aplikasi menggunakan sistem autentikasi. Data akun demo sudah disediakan melalui database seeder:
- **URL Login:** `http://127.0.0.1:8000/login`
- **Email:** `hisyamnabil@gmail.com`
- **Password:** `password123`

---

## Fitur Aplikasi
Sesuai ketentuan tugas proyek, fitur yang telah diimplementasikan meliputi:
1. **Autentikasi:** Login dan logout pengguna dengan proteksi route (`auth` middleware).
2. **Dashboard:** Ringkasan total buku, total kategori, serta preview koleksi buku terbaru.
3. **Pengelolaan Buku (CRUD):**
   - Melihat daftar seluruh buku beserta kategorinya
   - Menambah buku baru
   - Melihat detail lengkap buku
   - Mengubah (edit) data buku
   - Menghapus buku (disertai modal konfirmasi)
4. **Relasi Database (Eloquent ORM):** Relasi One-to-Many antara tabel `categories` dan `books` (`Category hasMany Book`, `Book belongsTo Category`).
5. **Database Migration & Seeder:** Skema tabel otomatis dan data awal (3 kategori, 5 buku, 1 user).
6. **Fitur Bonus (Pencarian):** Filter pencarian data buku berdasarkan judul atau nama penulis.

---

## Cara Menjalankan Aplikasi di Lokal

### Prasyarat
- PHP >= 8.2
- Composer
- SQLite (default) atau MySQL

### Langkah Instalasi
1. Buka terminal di folder project ini:
   ```bash
   cd Tester
   ```

2. Install dependensi composer:
   ```bash
   composer install
   ```

3. Siapkan file konfigurasi `.env`:
   ```bash
   cp .env.example .env
   ```

4. Generate Application Key:
   ```bash
   php artisan key:generate
   ```

5. Jalankan migrasi dan isi data awal (seeder):
   ```bash
   php artisan migrate:fresh --seed
   ```

6. Jalankan server lokal Laravel:
   ```bash
   php artisan serve
   ```

7. Buka browser dan akses alamat:
   ```text
   http://127.0.0.1:8000
   ```

---
