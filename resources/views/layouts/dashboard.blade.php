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
                <div class="logo-mark">SENA</div>
                <span>ADMIN SENA</span>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">&#8962; Dashboard</a>

                <span class="sidebar-disabled">&#128101; Aprendices <span class="tag-soon">Próximamente</span></span>
                <span class="sidebar-disabled">&#128218; Cursos <span class="tag-soon">Próximamente</span></span>
                <span class="sidebar-disabled">&#128100; Instructores <span class="tag-soon">Próximamente</span></span>

                <a href="{{ route('computer.create') }}" class="{{ request()->routeIs('computer.*') ? 'active' : '' }}">&#128421; Computadores</a>
                <a href="{{ route('trainingCenter.create') }}" class="{{ request()->routeIs('trainingCenter.*') ? 'active' : '' }}">&#127970; Centros de Formación</a>
                <a href="{{ route('area.create') }}" class="{{ request()->routeIs('area.*') ? 'active' : '' }}">&#9638; Áreas</a>
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
