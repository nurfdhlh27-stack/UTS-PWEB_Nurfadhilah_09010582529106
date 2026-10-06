@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
    <div style="max-width: 440px; margin: 8vh auto;">
        <div class="card">
            <h1>Masuk</h1>
            <p class="muted">Silakan masuk untuk mengelola koleksi buku.</p>
            @if ($errors->has('email'))
                <div class="alert error-box">{{ $errors->first('email') }}</div>
            @endif
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="form-row">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                </div>
                <div class="form-row">
                    <label for="password">Kata sandi</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                </div>
                <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
                <button class="button" type="submit" style="width:100%; margin-top:18px">Masuk</button>
            </form>
        </div>
    </div>
@endsection
