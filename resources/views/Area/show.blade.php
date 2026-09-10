@extends('layouts.app')

@section('content')
<main class="management-page">
    {{-- Presento la consulta como una ficha para diferenciarla claramente de la edición. --}}
    <div class="management-header">
        <div>
            <span class="management-kicker">Consulta de registro</span>
            <h1>{{ $area->name }}</h1>
            <p>Detalle del área de formación y sus relaciones actuales.</p>
        </div>
        <a href="{{ route('area.index') }}" class="management-secondary-action">Volver a áreas</a>
    </div>

    <section class="detail-card">
        <div class="detail-card-heading">
            <div class="detail-record-icon">{{ strtoupper(substr($area->name, 0, 1)) }}</div>
            <div>
                <span class="detail-label">Área registrada</span>
                <h2>{{ $area->name }}</h2>
            </div>
        </div>

        {{-- Resumo los datos principales para que la consulta sea rápida de entender. --}}
        <div class="detail-stats">
            <div class="detail-stat">
                <span>Identificador</span>
                <strong>#{{ str_pad($area->id, 3, '0', STR_PAD_LEFT) }}</strong>
            </div>
            <div class="detail-stat">
                <span>Cursos asociados</span>
                <strong>{{ $area->courses->count() }}</strong>
            </div>
            <div class="detail-stat">
                <span>Instructores asociados</span>
                <strong>{{ $area->teachers->count() }}</strong>
            </div>
            <div class="detail-stat">
                <span>Fecha de creación</span>
                <strong>{{ $area->created_at?->format('d/m/Y') ?? 'Sin fecha' }}</strong>
            </div>
        </div>

        {{-- Muestro los nombres relacionados porque son más útiles para el usuario que los IDs internos. --}}
        <div class="related-details">
            <section class="related-section">
                <div class="related-heading">
                    <div>
                        <span class="detail-label">Formación</span>
                        <h3>Cursos asociados</h3>
                    </div>
                    <span class="related-count">{{ $area->courses->count() }}</span>
                </div>

                @forelse ($area->courses as $course)
                <div class="related-item">
                    <span class="related-icon">C</span>
                    <div>
                        <strong>Curso {{ $course->course_number }}</strong>
                        <span>{{ $course->day ? \Carbon\Carbon::parse($course->day)->format('d/m/Y') : 'Sin fecha registrada' }}</span>
                    </div>
                </div>
                @empty
                <p class="related-empty">No hay cursos asociados a esta área.</p>
                @endforelse
            </section>

            <section class="related-section">
                <div class="related-heading">
                    <div>
                        <span class="detail-label">Equipo humano</span>
                        <h3>Instructores asociados</h3>
                    </div>
                    <span class="related-count">{{ $area->teachers->count() }}</span>
                </div>

                @forelse ($area->teachers as $teacher)
                <div class="related-item">
                    <span class="related-icon related-icon-orange">I</span>
                    <div>
                        <strong>{{ $teacher->name }}</strong>
                        <span>{{ $teacher->email }}</span>
                    </div>
                </div>
                @empty
                <p class="related-empty">No hay instructores asociados a esta área.</p>
                @endforelse
            </section>
        </div>

        <div class="detail-actions">
            <a href="{{ route('area.edit', $area) }}" class="management-primary-action">Editar área</a>
            <form action="{{ route('area.destroy', $area) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="table-action table-action-delete" onclick="return confirm('¿Deseas eliminar esta área?')">Eliminar área</button>
            </form>
        </div>
    </section>
</main>
@endsection
