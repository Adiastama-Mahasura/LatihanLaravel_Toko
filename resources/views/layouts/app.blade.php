<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Toko Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<nav class="navbar">
    <div class="nav-brand">TOKO LARAVEL</div>

    <div class="nav-menu">
        <a href="{{ route('produk.index') }}">Produk</a>
        <a href="{{ route('kategori.index') }}">Kategori</a>
    </div>
</nav>

<main class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

</main>

<footer class="footer">
    Sistem Informasi Penjualan Barang
</footer>

</body>
</html>