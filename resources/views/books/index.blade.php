@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    @section('breadcrumb', 'Koleksi Buku')
    <div class="heading">
        <div>
            <p class="eyebrow">PERPUSTAKAAN · KOLEKSI</p>
            <h1>Setiap buku punya cerita.</h1>
            <p class="subtitle">Jelajahi dan kelola koleksi yang ada di perpustakaanmu.</p>
        </div>
        <a class="button" href="{{ route('books.create') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
            Tambah buku
        </a>
    </div>
    <section class="stats-grid" aria-label="Ringkasan koleksi">
        <article class="stat-card">
            <span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v17H6.5A2.5 2.5 0 0 1 4 17.5z"/><path d="M4 17.5A2.5 2.5 0 0 1 6.5 15H20M8 7h7"/></svg></span>
            <span><strong class="stat-value">{{ number_format($totalBooks, 0, ',', '.') }}</strong><span class="stat-label">JUDUL BUKU</span></span>
        </article>
        <article class="stat-card">
            <span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/></svg></span>
            <span><strong class="stat-value">{{ number_format($totalCategories, 0, ',', '.') }}</strong><span class="stat-label">KATEGORI</span></span>
        </article>
        <article class="stat-card">
            <span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v17H6.5A2.5 2.5 0 0 1 4 17.5z"/><path d="M4 17.5A2.5 2.5 0 0 1 6.5 15H20M8 7h7M8 10h5"/></svg></span>
            <span><strong class="stat-value">{{ number_format($totalStock, 0, ',', '.') }}</strong><span class="stat-label">TOTAL EKSEMPLAR</span></span>
        </article>
    </section>
    <section class="catalog-card">
        <div class="catalog-toolbar">
            <div class="catalog-title">
                <div><h2>Semua buku</h2><p>Koleksi terbaru di perpustakaan</p></div>
                <span class="result-count">{{ $books->total() }} buku</span>
            </div>
            <form class="search" method="GET" action="{{ route('books.index') }}">
                <div class="search-field">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.8"/><path d="m16 16 4.5 4.5"/></svg>
                    <input type="search" name="search" value="{{ $search }}" placeholder="Cari judul, penulis, kategori..." aria-label="Cari koleksi buku">
                </div>
                <button class="button" type="submit">Cari</button>
            </form>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr><th>JUDUL BUKU</th><th>KATEGORI</th><th>TAHUN TERBIT</th><th>STOK</th><th class="actions-heading">AKSI</th></tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>
                                <a class="book-cell" href="{{ route('books.show', $book) }}">
                                    <span class="book-cover"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4.5A1.5 1.5 0 0 1 6.5 3H20v17H6.5A1.5 1.5 0 0 1 5 18.5z"/><path d="M5 18.5A1.5 1.5 0 0 1 6.5 17H20M8 7h8M8 10h6"/></svg></span>
                                    <span><strong class="book-name">{{ $book->title }}</strong><span class="book-author">{{ $book->author }}</span></span>
                                </a>
                            </td>
                            <td><span class="category-pill">{{ $book->category->name }}</span></td>
                            <td>{{ $book->year }}</td>
                            <td><span class="stock-value">{{ $book->stock }}</span> <span class="stock-unit">eks.</span></td>
                            <td><div class="row-actions">
                                <a class="icon-link" href="{{ route('books.show', $book) }}" aria-label="Detail {{ $book->title }}" title="Lihat detail">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2.5 12s3.4-6 9.5-6 9.5 6 9.5 6-3.4 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/></svg>
                                </a>
                                <a class="icon-link" href="{{ route('books.edit', $book) }}" aria-label="Ubah {{ $book->title }}" title="Ubah buku">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 5 4 4M4 20l4-.8L19 8a2.1 2.1 0 0 0-3-3L5 16z"/></svg>
                                </a>
                                <form class="delete-form" method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="icon-button" type="submit" aria-label="Hapus {{ $book->title }}" title="Hapus buku">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16M10 11v6m4-6v6M5.5 7l1 13h11l1-13M9 7V4h6v3"/></svg>
                                    </button>
                                </form>
                            </div></td>
                        </tr>
                    @empty
                        <tr><td colspan="5">
                            <div class="empty-state">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v17H6.5A2.5 2.5 0 0 1 4 17.5z"/><path d="M4 17.5A2.5 2.5 0 0 1 6.5 15H20"/></svg>
                                <strong>{{ $search !== '' ? 'Buku tidak ditemukan' : 'Rak bukunya masih kosong' }}</strong>
                                <span>{{ $search !== '' ? 'Coba kata kunci yang berbeda.' : 'Tambahkan buku pertama ke dalam koleksi.' }}</span>
                            </div>
                        </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($books->hasPages())
            <div class="pagination-wrap">{{ $books->links() }}</div>
        @endif
    </section>
@endsection
