@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <div class="heading">
        <div><h1>Detail Buku</h1><p class="muted">Informasi lengkap koleksi buku.</p></div>
        <div class="actions">
            <a class="button secondary" href="{{ route('books.index') }}">Kembali</a>
            <a class="button" href="{{ route('books.edit', $book) }}">Ubah Buku</a>
        </div>
    </div>
    <section class="card">
        <h2 style="margin-top:0">{{ $book->title }}</h2>
        <dl class="detail">
            <dt>Kategori</dt><dd>{{ $book->category->name }}</dd>
            <dt>Penulis</dt><dd>{{ $book->author }}</dd>
            <dt>Penerbit</dt><dd>{{ $book->publisher }}</dd>
            <dt>Tahun terbit</dt><dd>{{ $book->year }}</dd>
            <dt>Stok</dt><dd>{{ $book->stock }} buku</dd>
        </dl>
    </section>
@endsection
