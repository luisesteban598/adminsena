<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AdminSENA')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- Ocultar el Navbar si estamos en la vista de Login --}}
    @if (!request()->routeIs('login'))
        <nav class="public-navbar">
            <div class="public-navbar-inner">
                <div class="public-brand">
                    <div class="logo-mark">SENA</div>
                    <div class="titles">
                        <h1>ADMIN SENA</h1>
                        <p>Sistema de Gestión Institucional</p>
                    </div>
                </div>

                <div class="public-nav-links">
                    <a href="{{ route('home') }}" class="active">&#8962; Inicio</a>
                    <a href="#contacto">&#9993; Contacto</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary" style="padding:0.5rem 1rem;">Ir al Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary" style="padding:0.5rem 1rem;">Iniciar sesión</a>
                    @endauth
                </div>
            </div>
        </nav>
    @endif

    @if (session('success'))
        <div class="section-block" style="padding-bottom:0;">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif

    @yield('content')

    {{-- Ocultar el Footer si estamos en la vista de Login --}}
    @if (!request()->routeIs('login'))
        <footer class="footer">
            &copy; {{ date('Y') }} Servicio Nacional de Aprendizaje — SENA. Todos los derechos reservados.
        </footer>
    @endif

</body>
</html>