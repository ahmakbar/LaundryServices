<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('style')

</head>

<body>
    <nav class="flex justify-between align-center">
        <div class="logo">
            Quickcare
        </div>
        <div class="nav-items flex align-center">
            <a href="#" class="nav-item mx10">Beranda</a>
            <a href="#cuci" class="nav-item mx10">Cuci</a>
            <a href="#" class="nav-item mx10">Riwayat</a>
            @guest
                <a href="{{ route('login') }}" class="login nav-item mx10">Login</a>
            @endguest
            @auth
                <form action="{{ route('logout') }}" method="POST" id="logoutFormNow">@csrf</form>
                <button type="submit" onclick="$('#logoutFormNow').submit()">Logout</button>
            @endauth
        </div>
    </nav>

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    @yield('script')

</body>

</html>
