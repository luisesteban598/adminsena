@extends('layouts.app')

@section('content')
<main class="management-page">
    <div class="management-header"><div><span class="management-kicker">Oferta académica</span><h1>Cursos</h1><p>Administra los cursos y consulta su información de formación.</p></div><a href="{{ route('course.create') }}" class="management-primary-action"><span>+</span> Nuevo curso</a></div>
    <section class="management-card">
        <div class="management-toolbar"><div><strong>{{ $courses->count() }}</strong><span> {{ $courses->count() === 1 ? 'curso registrado' : 'cursos registrados' }}</span></div><label class="management-search"><span>⌕</span><input type="search" id="courseSearch" placeholder="Buscar por número..." aria-label="Buscar curso"></label></div>
        <div class="management-table-wrap"><table class="management-table"><thead><tr><th>Identificador</th><th>Número del curso</th><th>Fecha</th><th class="management-actions-heading">Acciones</th></tr></thead><tbody>
            @forelse ($courses as $course)
            <tr class="filter-row" data-search="{{ strtolower($course->course_number) }}"><td><span class="record-id">#{{ str_pad($course->id, 3, '0', STR_PAD_LEFT) }}</span></td><td><strong>Curso {{ $course->course_number }}</strong></td><td>{{ $course->day ? \Carbon\Carbon::parse($course->day)->format('d/m/Y') : 'Sin fecha' }}</td><td><div class="management-actions"><a href="{{ route('course.show', $course) }}" class="table-action table-action-view">Ver</a><a href="{{ route('course.edit', $course) }}" class="table-action table-action-edit">Editar</a><form action="{{ route('course.destroy', $course) }}" method="POST">@csrf @method('DELETE')<button type="submit" class="table-action table-action-delete" onclick="return confirm('¿Deseas eliminar este curso?')">Eliminar</button></form></div></td></tr>
            @empty <tr><td colspan="4" class="management-empty">Todavía no hay cursos registrados.</td></tr> @endforelse
        </tbody></table></div><p class="management-no-results" hidden>No encontramos cursos con ese número.</p>
    </section>
</main>
<script>
    // Busco cursos por su número para facilitar la consulta de la oferta.
    document.getElementById('courseSearch')?.addEventListener('input', (event) => { const term = event.target.value.trim().toLowerCase(); const rows = document.querySelectorAll('.filter-row'); let visible = 0; rows.forEach((row) => { const match = row.dataset.search.includes(term); row.hidden = !match; if (match) visible++; }); document.querySelector('.management-no-results').hidden = visible !== 0; });
</script>
@endsection
