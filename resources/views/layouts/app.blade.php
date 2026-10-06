<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Perpustakaan') | UTS Perpustakaan</title>
    <style>
        :root { color-scheme: light; font-family: Inter, "Segoe UI", Arial, sans-serif; color: #172033; background: #f4f6fb; }
        * { box-sizing: border-box; }
        body { margin: 0; }
        a { color: #3157c8; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .topbar { background: #18264a; color: white; padding: 16px 24px; }
        .nav { max-width: 1080px; margin: auto; display: flex; align-items: center; justify-content: space-between; gap: 16px; }
        .brand { font-size: 18px; font-weight: 700; color: white; }
        .nav form { margin: 0; }
        .container { max-width: 1080px; margin: 36px auto; padding: 0 20px; }
        .heading { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 20px; }
        h1 { margin: 0; font-size: 28px; }
        p.muted { color: #68738a; }
        .card { background: white; border: 1px solid #e3e7ef; border-radius: 12px; padding: 24px; box-shadow: 0 6px 22px #1d2a4510; }
        .button { display: inline-flex; align-items: center; justify-content: center; border: 0; border-radius: 7px; padding: 10px 15px; background: #3157c8; color: white; font: inherit; cursor: pointer; }
        .button:hover { background: #2546aa; color: white; text-decoration: none; }
        .button.secondary { background: #e9edf7; color: #26324c; }
        .button.danger { background: #b93442; }
        .actions { display: flex; gap: 8px; align-items: center; flex-wrap: wrap; }
        input, select { width: 100%; border: 1px solid #cbd2e0; border-radius: 7px; padding: 10px 12px; font: inherit; background: white; }
        label { display: block; font-weight: 600; margin: 14px 0 6px; }
        .form-row { margin-bottom: 14px; }
        .error { color: #b42332; font-size: 14px; margin-top: 5px; }
        .alert { border-radius: 7px; padding: 12px 15px; margin-bottom: 16px; background: #e5f6ec; color: #1e6639; }
        .alert.error-box { background: #fff0f0; color: #a22330; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 13px 10px; border-bottom: 1px solid #edf0f5; }
        th { color: #68738a; font-size: 13px; text-transform: uppercase; letter-spacing: .04em; }
        .search { display: flex; gap: 8px; max-width: 430px; margin-bottom: 18px; }
        .search input { flex: 1; }
        .detail { display: grid; grid-template-columns: 160px 1fr; gap: 12px; }
        .detail dt { font-weight: 600; color: #68738a; }
        .detail dd { margin: 0; }
        .footer { text-align: center; padding: 20px; color: #758097; font-size: 13px; }
        .remember { display: flex; align-items: center; gap: 8px; font-weight: 400; }
        .remember input { width: auto; }
        @media (max-width: 650px) { .heading { align-items: flex-start; flex-direction: column; } .table-wrap { overflow-x: auto; } .detail { grid-template-columns: 1fr; gap: 5px; } .detail dd { margin-bottom: 10px; } }
    </style>
</head>
<body>
    <header class="topbar">
        <nav class="nav">
            <a class="brand" href="{{ auth()->check() ? route('books.index') : route('login') }}">Perpustakaan</a>
            @auth
                <div class="actions">
                    <span>{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="button secondary" type="submit">Keluar</button>
                    </form>
                </div>
            @endauth
        </nav>
    </header>
    <main class="container">
        @if (session('status'))
            <div class="alert">{{ session('status') }}</div>
        @endif
        @if ($errors->any() && ! $errors->has('email'))
            <div class="alert error-box">Periksa kembali isian yang ditandai.</div>
        @endif
        @yield('content')
    </main>
    <footer class="footer">Aplikasi pengelolaan data buku perpustakaan</footer>
</body>
</html>
