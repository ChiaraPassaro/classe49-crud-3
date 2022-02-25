<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('documentTitle')</title>
</head>

<body>
    <header>
        @include('admin.partials.header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer mt-auto py-3 bg-light">
        @include('admin.partials.footer')
    </footer>
</body>

</html>
