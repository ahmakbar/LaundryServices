<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('kasir/assets/style.css') }}">
</head>

<body>
    <div class="nav flex justify-center">
        <nav class="flex">
            <p>QuickCare</p>
            <div class="nav-items flex align-center">
                <div class="nav-item">
                    aaa
                </div>
                <div class="nav-item">
                    aaa
                </div>
                <div class="nav-item">
                    <div class=""
                        style="width: 40px; height: 40px; background-color: black; border-radius: 100%;"></div>
                </div>
            </div>
        </nav>
    </div>
    <div class="flex justify-center">
        <section class="left">
            <div class="pad-content flex justify-center">
                <h1>Kasir</h1>
            </div>
            <div class="pad-content" style="margin: -20px 0;">
                <hr>
            </div>
            <div class="pad2 flex column py20">
                <a style="color: black;" class="text-hover py10" href="{{ route('kasir_index') }}">Dashboard</a>
            </div>
            <div class="pad-content" style="margin: -20px 0;">
                <hr>
            </div>
        </section>

        @yield('content')

</body>

</html>
