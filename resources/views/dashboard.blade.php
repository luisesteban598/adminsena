@extends('layouts.dashboard')

@section('title', 'Dashboard — AdminSENA')
@section('page-title', 'Dashboard')

@section('content')

    <div class="dashboard-welcome">
        <div>
            <h2>Bienvenido, {{ auth()->user()->name }} &#128075;</h2>
            <p>Aquí puedes gestionar la información institucional del SENA.</p>
        </div>

        <div class="today-pill">
            &#128197; {{ now()->translatedFormat('d \d\e F \d\e Y') }}
        </div>
    </div>

    <!-- Contadores convertidos en enlaces interactivos -->
    <div class="stat-grid">
        <a href="{{ route('area.index') }}" class="stat-card">
            <div>
                <div class="stat-label">Áreas</div>
                <div class="stat-value">{{ $areaCount }}</div>
                <div class="stat-sub">Registradas</div>
            </div>
            <div class="stat-icon">&#9638;</div>
        </a>

        <a href="{{ route('trainingCenter.index') }}" class="stat-card">
            <div>
                <div class="stat-label">Centros</div>
                <div class="stat-value">{{ $trainingCenterCount }}</div>
                <div class="stat-sub">Sedes</div>
            </div>
            <div class="stat-icon">&#127970;</div>
        </a>

        <a href="{{ route('computer.index') }}" class="stat-card">
            <div>
                <div class="stat-label">Computadores</div>
                <div class="stat-value">{{ $computerCount }}</div>
                <div class="stat-sub">Disponibles</div>
            </div>
            <div class="stat-icon">&#128421;</div>
        </a>

        <a href="{{ route('teacher.index') }}" class="stat-card">
            <div>
                <div class="stat-label">Instructores</div>
                <div class="stat-value">{{ $teacherCount ?? 0 }}</div>
                <div class="stat-sub">Registrados</div>
            </div>
            <div class="stat-icon">&#128100;</div>
        </a>
    </div>

    <!-- Paneles de accesos rápidos -->
    <div class="dashboard-panels">
        <div class="panel">
            <h3>Accesos rápidos</h3>
            <div class="quick-access-grid">
                <a href="{{ route('area.index') }}" class="quick-access-item">
                    <span class="icon">&#9638;</span> Ver Áreas
                </a>
                <a href="{{ route('trainingCenter.index') }}" class="quick-access-item">
                    <span class="icon">&#127970;</span> Ver Centros
                </a>
                <a href="{{ route('computer.index') }}" class="quick-access-item">
                    <span class="icon">&#128421;</span> Ver Computadores
                </a>
                <a href="{{ route('teacher.index') }}" class="quick-access-item">
                    <span class="icon">&#128100;</span> Ver Instructores
                </a>
                <a href="{{ route('apprentice.index') }}" class="quick-access-item">
                    <span class="icon">&#128101;</span> Ver Aprendices
                </a>
                <a href="{{ route('course.index') }}" class="quick-access-item">
                    <span class="icon">&#128218;</span> Ver Cursos
                </a>
            </div>
        </div>

        <div class="panel">
            <h3>Actividad reciente</h3>
            <p class="empty-note">
                Aún no hay un registro de actividad configurado en el sistema.
            </p>
        </div>
    </div>

@endsection