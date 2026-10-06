# UTS Perpustakaan

Aplikasi Laravel untuk mengelola koleksi buku perpustakaan. Nama folder proyek dapat disesuaikan menjadi `uts_nama_nim` sesuai nama dan NIM mahasiswa.

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

- Username: `Dhilah123` (atau email `test@example.com`)
- Kata sandi: `Dhilah123`

Akun demo dibuat oleh seeder untuk pengembangan lokal. Ganti kredensial tersebut sebelum aplikasi digunakan di lingkungan produksi.

Untuk instalasi ulang database lokal, jalankan `php artisan migrate:fresh --seed`. Perintah tersebut akan menghapus semua data pada database yang terhubung.

## Fitur

- **MVC:** route di `routes/web.php`, controller di `app/Http/Controllers`, model di `app/Models`, dan tampilan Blade di `resources/views`.
- **Authentication:** login dengan username atau email dan logout; operasi buku dilindungi middleware `auth`.
- **CRUD:** buku dapat ditambah, dilihat, diubah, dan dihapus melalui `BookController`, dengan validasi input.
- **Eloquent ORM:** query dan operasi data buku, kategori, dan pengguna menggunakan model Eloquent.
- **Migration:** struktur tabel pengguna, kategori, dan buku dikelola melalui `database/migrations`.
- **Seeder:** `DatabaseSeeder` membuat akun demo, kategori, dan contoh buku dengan aman saat dijalankan berulang.
- **Relationship:** satu kategori memiliki banyak buku (`Category::books`), dan setiap buku dimiliki satu kategori (`Book::category`); foreign key kategori membatasi penghapusan kategori yang masih digunakan.
- **Git:** proyek ini berada dalam repository Git. Gunakan `git status` untuk melihat perubahan dan `git add`/`git commit` untuk menyimpan pekerjaan.
- Pencarian berdasarkan judul atau penulis, filter berdasarkan kategori, serta pagination daftar buku.

## Pengujian

```bash
php artisan test
```
