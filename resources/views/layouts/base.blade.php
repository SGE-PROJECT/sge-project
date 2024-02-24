<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <title>SGE</title>
    <title>@yield('title', 'SGE')</title>
</head>
<body>
    <header>
    </header>
    <main>
        @yield('sidebar')
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>
</body>
</html>
