<!-- component -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <link rel="icon" href="{{ asset('images/logo_sge.svg') }}">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  @vite('resources/css/app.css')

  <title>@yield('titulo')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="text-gray-800 font-inter">
    <main>
      @yield('contenido')
    </main>

  </section>
  <script src="https://unpkg.com/@popperjs/core@2"></script>

</body>

</html>
