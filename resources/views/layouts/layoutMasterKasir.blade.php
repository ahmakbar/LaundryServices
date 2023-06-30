<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('kasir/assets/style.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}

    @yield('style')

</head>

<body>
    <div class="nav flex justify-center">
        <nav class="flex align-center">
            <div class="burger-icon" style="font-size: 0px">&#9776;</div>
            <p style="font-weight: bold; font-size: 20px">QuickCare</p>
            <div class="nav-items flex align-center">
                {{-- <div class="nav-item">
                    <div class=""
                    style="width: 40px; height: 40px; background-color: black; border-radius: 100%;"></div>
                </div> --}}
            </div>
        </nav>
    </div>
    <div class="flex justify-center">
        <section class="left hide-left" style="overflow-x: hidden">
            <div class="pad-content flex hide-left justify-center">
                <h1>Kasir</h1>
            </div>
            <div class="pad-content" style="margin: -20px 0;">
                <hr>
            </div>
            <div class="pad2 flex column py20">
                <a style="color: black;" class="text-hover py10" href="#">Dashboard</a>
                <a class="text-hover py10" style="cursor: pointer" onclick="$('#logoutForm').submit()">Logout</a>
            </div>
            <div class="pad-content" style="margin: -20px 0;">
                <hr>
            </div>
        </section>


        @yield('content')

        @yield('script')
        <script>
            const burgerIcon = document.querySelector('.burger-icon');
            const leftSection = document.querySelector('.left');

            burgerIcon.addEventListener('click', () => {
                leftSection.classList.toggle('show-left');
                burgerIcon.classList.toggle('left');
            });
        </script>
</body>

</html>
