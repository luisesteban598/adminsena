@extends('layouts.app')

@section('content')
<main class="management-page">
    <div class="management-header"><div><span class="management-kicker">Gestión institucional</span><h1>Centros de formación</h1><p>Administra las sedes y ubicaciones donde se desarrolla la formación.</p></div><a href="{{ route('trainingCenter.create') }}" class="management-primary-action"><span>+</span> Nuevo centro</a></div>
    <section class="management-card">
        <div class="management-toolbar"><div><strong>{{ $trainingCenters->count() }}</strong><span> {{ $trainingCenters->count() === 1 ? 'centro registrado' : 'centros registrados' }}</span></div><label class="management-search"><span>⌕</span><input type="search" id="trainingCenterSearch" placeholder="Buscar por nombre o ubicación..." aria-label="Buscar centro"></label></div>
        <div class="management-table-wrap"><table class="management-table"><thead><tr><th>Identificador</th><th>Nombre</th><th>Ubicación</th><th class="management-actions-heading">Acciones</th></tr></thead><tbody>
            @forelse ($trainingCenters as $trainingCenter)
            <tr class="filter-row" data-search="{{ strtolower($trainingCenter->name . ' ' . $trainingCenter->location) }}"><td><span class="record-id">#{{ str_pad($trainingCenter->id, 3, '0', STR_PAD_LEFT) }}</span></td><td><strong>{{ $trainingCenter->name }}</strong></td><td>{{ $trainingCenter->location }}</td><td><div class="management-actions"><a href="{{ route('trainingCenter.show', $trainingCenter) }}" class="table-action table-action-view">Ver</a><a href="{{ route('trainingCenter.edit', $trainingCenter) }}" class="table-action table-action-edit">Editar</a><form action="{{ route('trainingCenter.destroy', $trainingCenter) }}" method="POST">@csrf @method('DELETE')<button type="submit" class="table-action table-action-delete" onclick="return confirm('¿Deseas eliminar este centro?')">Eliminar</button></form></div></td></tr>
            @empty <tr><td colspan="4" class="management-empty">Todavía no hay centros registrados.</td></tr> @endforelse
        </tbody></table></div><p class="management-no-results" hidden>No encontramos centros con ese criterio.</p>
    </section>
</main>
<script>
    // Filtro la tabla por nombre o ubicación sin recargar la página.
    document.getElementById('trainingCenterSearch')?.addEventListener('input', (event) => { const term = event.target.value.trim().toLowerCase(); const rows = document.querySelectorAll('.filter-row'); let visible = 0; rows.forEach((row) => { const match = row.dataset.search.includes(term); row.hidden = !match; if (match) visible++; }); document.querySelector('.management-no-results').hidden = visible !== 0; });
</script>
@endsection
