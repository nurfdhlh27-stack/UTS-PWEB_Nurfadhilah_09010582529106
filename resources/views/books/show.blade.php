@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    @section('breadcrumb', 'Detail Buku')
    <div class="heading">
        <div>
            <p class="eyebrow">KOLEKSI · DETAIL</p>
            <h1>Jejak sebuah buku.</h1>
            <p class="subtitle">Informasi lengkap dari koleksi perpustakaan.</p>
        </div>
        <div class="actions">
            <a class="button secondary" href="{{ route('books.index') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
                Kembali
            </a>
            <a class="button" href="{{ route('books.edit', $book) }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 5 4 4M4 20l4-.8L19 8a2.1 2.1 0 0 0-3-3L5 16z"/></svg>
                Ubah buku
            </a>
        </div>
    </div>
    <section class="detail-card">
        <div class="detail-hero">
            <span class="detail-cover">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4.5A1.5 1.5 0 0 1 6.5 3H20v17H6.5A1.5 1.5 0 0 1 5 18.5z"/><path d="M5 18.5A1.5 1.5 0 0 1 6.5 17H20M8 7h8M8 10h6"/></svg>
            </span>
            <div class="detail-hero-copy">
                <p class="eyebrow">{{ $book->category->name }}</p>
                <h1>{{ $book->title }}</h1>
                <p class="subtitle">Karya {{ $book->author }}</p>
            </div>
        </div>
        <div class="detail-info">
            <div class="info-item"><span>Penulis</span><strong>{{ $book->author }}</strong></div>
            <div class="info-item"><span>Penerbit</span><strong>{{ $book->publisher }}</strong></div>
            <div class="info-item"><span>Tahun terbit</span><strong>{{ $book->year }}</strong></div>
            <div class="info-item"><span>Stok tersedia</span><strong>{{ $book->stock }} eksemplar</strong></div>
        </div>
    </section>
@endsection
