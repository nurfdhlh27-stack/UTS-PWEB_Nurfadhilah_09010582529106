@extends('layouts.app')

@section('title', 'Ubah Buku')

@section('content')
    @section('breadcrumb', 'Ubah Buku')
    <div class="heading">
        <div>
            <p class="eyebrow">KOLEKSI · PERBARUI</p>
            <h1>Perbarui detail buku.</h1>
            <p class="subtitle">Perubahan akan langsung tersimpan pada koleksi perpustakaan.</p>
        </div>
    </div>
    <section class="form-card">
        <form method="POST" action="{{ route('books.update', $book) }}">
            @method('PUT')
            @include('books.form', ['submitLabel' => 'Simpan Perubahan'])
        </form>
    </section>
@endsection
