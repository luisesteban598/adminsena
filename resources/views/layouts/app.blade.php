<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SENA</title>

    {{-- Cargar Bootstrap para estilos del menú y otros componentes --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #2e7d32 !important;
        }
        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
        }
        .nav-link:hover {
            color: #c8e6c9 !important;
        }
        .alert-success {
            background-color: #dcedc8 !important;
            border-color: #c5e1a5 !important;
            color: #2e7d32 !important;
        }
    </style>
</head>
<body>
    {{-- Mostrar la barra de navegación en todas las páginas que usen este layout --}}
    @include('includes.navbar')

    {{-- Aquí se inserta el contenido de cada vista --}}
    @yield('content')

    {{-- Footer global para todas las páginas --}}
    @include('includes.footer')

    {{-- Cargar JavaScript de Bootstrap para que funcione el botón hamburguesa --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>