@extends('layouts.app')

@section('content')
<main class="management-page">
    <div class="management-header"><div><span class="management-kicker">Equipo humano</span><h1>Instructores</h1><p>Administra los instructores que acompañan los procesos de formación.</p></div><a href="{{ route('teacher.create') }}" class="management-primary-action"><span>+</span> Nuevo instructor</a></div>
    <section class="management-card">
        <div class="management-toolbar"><div><strong>{{ $teachers->count() }}</strong><span> {{ $teachers->count() === 1 ? 'instructor registrado' : 'instructores registrados' }}</span></div><label class="management-search"><span>⌕</span><input type="search" id="teacherSearch" placeholder="Buscar por nombre o correo..." aria-label="Buscar instructor"></label></div>
        <div class="management-table-wrap"><table class="management-table"><thead><tr><th>Identificador</th><th>Nombre</th><th>Correo</th><th class="management-actions-heading">Acciones</th></tr></thead><tbody>
            @forelse ($teachers as $teacher)
            <tr class="filter-row" data-search="{{ strtolower($teacher->name . ' ' . $teacher->email) }}"><td><span class="record-id">#{{ str_pad($teacher->id, 3, '0', STR_PAD_LEFT) }}</span></td><td><strong>{{ $teacher->name }}</strong></td><td>{{ $teacher->email }}</td><td><div class="management-actions"><a href="{{ route('teacher.show', $teacher) }}" class="table-action table-action-view">Ver</a><a href="{{ route('teacher.edit', $teacher) }}" class="table-action table-action-edit">Editar</a><form action="{{ route('teacher.destroy', $teacher) }}" method="POST">@csrf @method('DELETE')<button type="submit" class="table-action table-action-delete" onclick="return confirm('¿Deseas eliminar este instructor?')">Eliminar</button></form></div></td></tr>
            @empty <tr><td colspan="4" class="management-empty">Todavía no hay instructores registrados.</td></tr> @endforelse
        </tbody></table></div><p class="management-no-results" hidden>No encontramos instructores con ese criterio.</p>
    </section>
</main>
<script>
    // Busco instructores por nombre o correo para facilitar la gestión del equipo humano.
    document.getElementById('teacherSearch')?.addEventListener('input', (event) => { const term = event.target.value.trim().toLowerCase(); const rows = document.querySelectorAll('.filter-row'); let visible = 0; rows.forEach((row) => { const match = row.dataset.search.includes(term); row.hidden = !match; if (match) visible++; }); document.querySelector('.management-no-results').hidden = visible !== 0; });
</script>
@endsection
