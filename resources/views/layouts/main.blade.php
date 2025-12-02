// resources/views/layouts/main.blade.php

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vikingos Barber Studio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @yield('head_extras')
</head>
<body class="@yield('body_class')">

    @include('partials.navbar') {{-- Incluye el navbar --}}

    <main>
        @yield('content') {{-- Contenido único de cada página --}}
    </main>

    @include('partials.footer') {{-- Incluye el footer --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts') {{-- Scripts únicos de cada página --}}
</body>
</html>