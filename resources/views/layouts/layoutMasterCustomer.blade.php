<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('style')

</head>

<body id="style-2">
    <nav class="flex justify-between align-center">
        <div class="logo">
          Quickcare
        </div>
        <div class="nav-items flex align-center">
          <a href="#" class="nav-item mx10">Beranda</a>
          <a href="#cuci" class="nav-item mx10">Cuci</a>
          <a href="#riwayat" class="nav-item mx10">Riwayat</a>
          @guest
          <a href="{{ route('login') }}" class="login nav-item mx10">Login</a>
          @endguest
          @auth
          <form action="{{ route('logout') }}" method="POST" id="logoutFormNow">@csrf</form>
          <button type="submit" style="padding: 10px 30px; font-family: 'Quicksand'; font-size: 15px; background-color: black; font-weight: bold" onclick="$('#logoutFormNow').submit()">Logout</button>
          @endauth
        </div>
        <div class="burger-icon">&#9776;</div>
      </nav>


    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    @yield('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          const burgerIcon = document.querySelector(".burger-icon");
          const navItems = document.querySelector(".nav-items");

          burgerIcon.addEventListener("click", function() {
            navItems.classList.toggle("show-nav-items");

            if (navItems.classList.contains("show-nav-items")) {
              navItems.style.maxHeight = navItems.scrollHeight + "px";
            } else {
              navItems.style.maxHeight = 0;
            }
          });
        });
      </script>


</body>

</html>
