@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
    <div class="login-layout">
        <section class="login-art" aria-label="Selamat datang di Ruang Baca">
            <a class="login-art-brand" href="{{ route('login') }}">
                <span class="brand-mark">
                    <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 7v14M3 18V5a2 2 0 0 1 2-2h5a2 2 0 0 1 2 2v16a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2Zm18 0V5a2 2 0 0 0-2-2h-5a2 2 0 0 0-2 2v16a2 2 0 0 1 2-2h5a2 2 0 0 1 2 2Z"/></svg>
                </span>
                <span><span class="brand-name">Ruang Baca</span><span class="brand-caption">Library workspace</span></span>
            </a>
            <div class="login-art-copy">
                <p class="login-art-kicker">Selamat datang kembali</p>
                <h1>Buku membuka<br><em>jendela dunia.</em></h1>
                <p>Kelola koleksi perpustakaanmu dengan mudah. Temukan inspirasi baru dari setiap halaman.</p>
            </div>
            <span class="login-art-foot">SEBUAH RUANG KECIL UNTUK IDE-IDE BESAR</span>
            <div class="book-stack" aria-hidden="true"><span></span><span></span><span></span><span></span></div>
        </section>
        <section class="login-panel">
            <div class="login-card">
                <span class="login-welcome">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l1.9 5.8L20 11l-6.1 2.2L12 19l-1.9-5.8L4 11l6.1-2.2L12 3z"/></svg>
                    PORTAL PERPUSTAKAAN
                </span>
                <h2>Masuk ke akun</h2>
                <p>Silakan masuk untuk mulai mengelola koleksi buku.</p>
            @if ($errors->has('login'))
                <div class="alert error-box">{{ $errors->first('login') }}</div>
            @endif
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="form-row">
                    <label for="login">Username atau email</label>
                    <input id="login" type="text" name="login" value="{{ old('login') }}" placeholder="Masukkan username atau email" required autofocus autocomplete="username">
                </div>
                <div class="form-row">
                    <label for="password">Kata sandi</label>
                    <input id="password" type="password" name="password" placeholder="Masukkan kata sandi" required autocomplete="current-password">
                </div>
                <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
                <button class="button login-submit" type="submit">
                    <span>Masuk ke dashboard</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6"/></svg>
                </button>
            </form>
                <div class="login-meta"><span>✦</span> Koleksi yang tertata, pikiran yang terbuka <span>✦</span></div>
            </div>
        </div>
@endsection
