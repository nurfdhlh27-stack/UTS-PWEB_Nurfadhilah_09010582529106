@extends('layouts.app')

@section('title', 'Ubah Buku')

@section('content')
    <div class="heading"><h1>Ubah Buku</h1></div>
    <section class="card">
        <form method="POST" action="{{ route('books.update', $book) }}">
            @method('PUT')
            @include('books.form', ['submitLabel' => 'Simpan Perubahan'])
        </form>
    </section>
@endsection
