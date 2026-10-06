@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <div class="heading">
        <div>
            <h1>Daftar Buku</h1>
            <p class="muted">Kelola koleksi buku dan informasi stok perpustakaan.</p>
        </div>
        <a class="button" href="{{ route('books.create') }}">+ Tambah Buku</a>
    </div>
    <form class="search" method="GET" action="{{ route('books.index') }}">
        <input type="search" name="search" value="{{ $search }}" placeholder="Cari judul, penulis, kategori...">
        <button class="button" type="submit">Cari</button>
    </form>
    <section class="card">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr><th>Judul</th><th>Penulis</th><th>Kategori</th><th>Tahun</th><th>Stok</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td><a href="{{ route('books.show', $book) }}"><strong>{{ $book->title }}</strong></a></td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->stock }}</td>
                            <td><div class="actions">
                                <a href="{{ route('books.show', $book) }}">Detail</a>
                                <a href="{{ route('books.edit', $book) }}">Ubah</a>
                                <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border:0;background:none;color:#b93442;cursor:pointer;font:inherit;padding:0">Hapus</button>
                                </form>
                            </div></td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="muted">Belum ada data buku.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="margin-top:18px">{{ $books->links() }}</div>
    </section>
@endsection
