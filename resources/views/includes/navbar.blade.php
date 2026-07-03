{{-- Barra de navegación principal del sistema --}}
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        {{-- Nombre del sistema que aparece a la izquierda --}}
        <a class="navbar-brand fw-bold text-uppercase tracking-wider" href="{{ url('/') }}">
            Admin SENA
        </a>

        {{-- Enlaces siempre visibles en el navbar (sin botón hamburguesa) --}}
        <div class="navbar-collapse" id="navbarNavAdmin">
            <ul class="navbar-nav ms-auto d-flex flex-row gap-3 align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.index') }}">Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/teacher/create">Crear Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('computer.index') }}">Computers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/computer/create">Crear Computer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('trainingCenter.index') }}">Training Centers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/course/create">Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/apprentice/create">Apprentices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/area/create">Area</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>