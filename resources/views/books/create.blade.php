@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="heading"><h1>Tambah Buku</h1></div>
    <section class="card">
        @if ($categories->isEmpty())
            <p class="muted">Belum ada kategori. Jalankan seeder terlebih dahulu: <code>php artisan db:seed</code>.</p>
        @else
            <form method="POST" action="{{ route('books.store') }}">
                @include('books.form', ['submitLabel' => 'Simpan Buku'])
            </form>
        @endif
    </section>
@endsection
