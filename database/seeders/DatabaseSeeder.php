<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Admin Perpustakaan', 'password' => Hash::make('password')],
        );

        $categories = collect([
            'Fiksi' => 'Novel dan karya sastra.',
            'Pendidikan' => 'Buku pelajaran dan referensi.',
            'Teknologi' => 'Komputer dan ilmu teknologi.',
        ])->mapWithKeys(fn (string $description, string $name) => [
            $name => Category::firstOrCreate(['name' => $name], ['description' => $description]),
        ]);

        $books = [
            [
                'title' => 'Laskar Pelangi',
                'category' => 'Fiksi',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'year' => 2005,
                'stock' => 5,
            ],
            [
                'title' => 'Bumi Manusia',
                'category' => 'Fiksi',
                'author' => 'Pramoedya Ananta Toer',
                'publisher' => 'Hasta Mitra',
                'year' => 1980,
                'stock' => 3,
            ],
            [
                'title' => 'Negeri 5 Menara',
                'category' => 'Fiksi',
                'author' => 'Ahmad Fuadi',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 2009,
                'stock' => 4,
            ],
            [
                'title' => 'Matematika untuk SMA',
                'category' => 'Pendidikan',
                'author' => 'D. Kurniawan',
                'publisher' => 'Erlangga',
                'year' => 2022,
                'stock' => 8,
            ],
            [
                'title' => 'Dasar-Dasar Pemrograman',
                'category' => 'Teknologi',
                'author' => 'Budi Raharjo',
                'publisher' => 'Informatika',
                'year' => 2021,
                'stock' => 6,
            ],
        ];

        foreach ($books as $book) {
            Book::firstOrCreate(
                ['title' => $book['title']],
                [
                    'category_id' => $categories[$book['category']]->id,
                    'author' => $book['author'],
                    'publisher' => $book['publisher'],
                    'year' => $book['year'],
                    'stock' => $book['stock'],
                ],
            );
        }
    }
}
