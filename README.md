# UTS Perpustakaan

Aplikasi Laravel sederhana untuk mengelola data buku perpustakaan. Nama folder proyek dapat disesuaikan menjadi `uts_nama_nim` sesuai nama dan NIM mahasiswa.

## Persyaratan

- PHP 8.3 atau lebih baru
- Composer
- Ekstensi PHP `pdo_sqlite` (atau MySQL jika koneksi `.env` disesuaikan)

## Menjalankan aplikasi

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Buka `http://127.0.0.1:8000` lalu masuk dengan akun demo:

- Email: `test@example.com`
- Kata sandi: `password`

Untuk instalasi ulang database lokal, jalankan `php artisan migrate:fresh --seed`. Perintah tersebut akan menghapus semua data pada database yang terhubung.

## Fitur

- Autentikasi login/logout; seluruh halaman dan operasi buku mensyaratkan pengguna masuk.
- CRUD buku beserta pencarian judul, penulis, dan kategori, detail buku, serta pagination.
- Kategori memiliki banyak buku; setiap buku memiliki satu kategori.
- Validasi input dan foreign key `books.category_id`.

## Pengujian

```bash
php artisan test
```
