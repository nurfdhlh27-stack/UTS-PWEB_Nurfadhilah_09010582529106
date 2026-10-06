@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    @section('breadcrumb', 'Tambah Buku')
    <div class="heading">
        <div>
            <p class="eyebrow">KOLEKSI · BUKU BARU</p>
            <h1>Tambahkan cerita baru.</h1>
            <p class="subtitle">Masukkan detail buku untuk menambahkannya ke koleksi.</p>
        </div>
    </div>
    <section class="form-card">
        @if ($categories->isEmpty())
            <div class="alert error-box">Belum ada kategori. Jalankan seeder terlebih dahulu: <code>php artisan db:seed</code>.</div>
        @else
            <form method="POST" action="{{ route('books.store') }}">
                @include('books.form', ['submitLabel' => 'Simpan Buku'])
            </form>
        @endif
    </section>
@endsection
