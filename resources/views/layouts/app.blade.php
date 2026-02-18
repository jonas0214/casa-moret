<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Casa Morêt | Café de Especialidad')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    @stack('styles')
    @livewireStyles
</head>
<body>
    @include('cafe.partials.header')

    <main>
        @yield('content')
    </main>

    @include('cafe.partials.footer')


    <script src="{{ asset('js/main.js') }}"></script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
