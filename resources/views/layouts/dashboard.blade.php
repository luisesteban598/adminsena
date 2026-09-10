<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AdminSENA')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="dashboard-shell">
        <aside class="dashboard-sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="{{ asset('img/logo-sena.png') }}" alt="Logo SENA" class="sena-logo-sidebar" style="max-width: 40px; height: auto; filter: brightness(0) invert(1);">
                <span>ADMIN SENA</span>
            </div>

            <nav class="sidebar-nav">
                {{-- Marco el enlace del dashboard solo cuando estoy realmente en esa ruta. --}}
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="icon">&#8962;</span> Dashboard
                </a>

                {{-- Agrego el acceso a noticias porque también es un módulo administrativo. --}}
                <a href="{{ route('news.index') }}" class="nav-item {{ request()->routeIs('news.*') ? 'active' : '' }}">
                    <span class="icon">&#128240;</span> Noticias
                </a>

                {{-- Mantengo activo el módulo de aprendices durante sus diferentes acciones. --}}
                <a href="{{ route('apprentice.index') }}" class="nav-item {{ request()->routeIs('apprentice.*') ? 'active' : '' }}">
                    <span class="icon">&#128101;</span> Aprendices
                </a>

                {{-- Mantengo activo el módulo de cursos durante sus diferentes acciones. --}}
                <a href="{{ route('course.index') }}" class="nav-item {{ request()->routeIs('course.*') ? 'active' : '' }}">
                    <span class="icon">&#128218;</span> Cursos
                </a>

                {{-- Mantengo activo el módulo de instructores durante sus diferentes acciones. --}}
                <a href="{{ route('teacher.index') }}" class="nav-item {{ request()->routeIs('teacher.*') ? 'active' : '' }}">
                    <span class="icon">&#128100;</span> Instructores
                </a>

                {{-- Mantengo activo el módulo de computadores durante sus diferentes acciones. --}}
                <a href="{{ route('computer.index') }}" class="nav-item {{ request()->routeIs('computer.*') ? 'active' : '' }}">
                    <span class="icon">&#128421;</span> Computadores
                </a>

                {{-- Mantengo activo el módulo de centros durante sus diferentes acciones. --}}
                <a href="{{ route('trainingCenter.index') }}" class="nav-item {{ request()->routeIs('trainingCenter.*') ? 'active' : '' }}">
                    <span class="icon">&#127970;</span> Centros de Formación
                </a>

                {{-- Mantengo activo el módulo de áreas durante sus diferentes acciones. --}}
                <a href="{{ route('area.index') }}" class="nav-item {{ request()->routeIs('area.*') ? 'active' : '' }}">
                    <span class="icon">&#9638;</span> Áreas
                </a>
            </nav>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">&#8629; Cerrar sesión</button>
                </form>
            </div>
        </aside>

        <div class="dashboard-main">
            <header class="dashboard-topbar">
                <div class="topbar-left">
                    <button class="sidebar-toggle" id="sidebarToggle" aria-label="Abrir menú">&#9776;</button>
                    <span>@yield('page-title', 'Dashboard')</span>
                </div>

                <div class="topbar-user">
                    <div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
                    {{ auth()->user()->name ?? 'Administrador' }}
                </div>
            </header>

            <div class="dashboard-content">
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                <div class="alert alert-error">{{ $errors->first() }}</div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>