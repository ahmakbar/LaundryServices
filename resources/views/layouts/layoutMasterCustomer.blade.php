<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="flex justify-between align-center">
        <div class="logo">
            Quickcare
        </div>
        <div class="nav-items flex align-center">
            <a href="{{ route('home') }}" class="nav-item mx10">Beranda</a>
            <a href="#cuci" class="nav-item mx10">Cuci</a>
            <a href="{{ route('riwayat') }}" class="nav-item mx10">Riwayat</a>
            <a href="{{ route('login') }}" class="login nav-item mx10">Login</a>
        </div>
    </nav>

    @yield('content')

</body>

</html>
