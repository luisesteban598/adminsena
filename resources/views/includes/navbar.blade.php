{{-- Barra de navegación principal del sistema --}}
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        {{-- Nombre del sistema que redirige al Dashboard --}}
        <a class="navbar-brand fw-bold text-uppercase tracking-wider" href="{{ route('dashboard') }}">
            Admin SENA
        </a>

        {{-- Enlaces siempre visibles en el navbar (sin botón hamburguesa) --}}
        <div class="navbar-collapse" id="navbarNavAdmin">
            <ul class="navbar-nav ms-auto d-flex flex-row gap-3 align-items-center">
                {{-- Botón para regresar al Dashboard --}}
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm fw-semibold me-2" href="{{ route('dashboard') }}">
                        &#8592; Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.index') }}">Instructores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('computer.index') }}">Computadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('trainingCenter.index') }}">Centros de formación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('course.index') }}">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apprentice.index') }}">Aprendices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('area.index') }}">Áreas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>