<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Category Fiksi
        $fiksi = Category::create([
            'name' => 'Fiksi',
            'description' => 'Buku yang berisi cerita atau karya imajinatif.',
        ]);

        // 2. Buat Category Non-Fiksi
        $nonFiksi = Category::create([
            'name' => 'Non-Fiksi',
            'description' => 'Buku yang berisi informasi, pengetahuan, atau fakta.',
        ]);

        // 3. Buat Category Pendidikan
        Category::create([
            'name' => 'Pendidikan',
            'description' => 'Buku yang berkaitan dengan pembelajaran dan pendidikan.',
        ]);

        // 4. Buat Book kategori Fiksi
        Book::create([
            'category_id' => $fiksi->id,
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'year' => 2005,
            'stock' => 10,
        ]);

        Book::create([
            'category_id' => $fiksi->id,
            'title' => 'Bumi Manusia',
            'author' => 'Pramoedya Ananta Toer',
            'publisher' => 'Hasta Mitra',
            'year' => 1980,
            'stock' => 7,
        ]);

        // 5. Buat Book kategori Non-Fiksi
        Book::create([
            'category_id' => $nonFiksi->id,
            'title' => 'Filosofi Teras',
            'author' => 'Henry Manampiring',
            'publisher' => 'Buku Kompas',
            'year' => 2018,
            'stock' => 15,
        ]);

        Book::create([
            'category_id' => $nonFiksi->id,
            'title' => 'Atomic Habits (Edisi Indonesia)',
            'author' => 'James Clear',
            'publisher' => 'Gramedia Pustaka Utama',
            'year' => 2019,
            'stock' => 12,
        ]);

        Book::create([
            'category_id' => $nonFiksi->id,
            'title' => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'author' => 'Mark Manson',
            'publisher' => 'Grasindo',
            'year' => 2018,
            'stock' => 8,
        ]);

        // 6. Akun Pengguna
        $password = env('DEMO_USER_PASSWORD', 'password123');
        User::updateOrCreate(
            ['email' => 'hisyamnabil@gmail.com'],
            [
                'name' => 'Hisyam Nabil',
                'password' => Hash::make($password),
            ]
        );
    }
}
