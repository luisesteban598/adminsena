@extends('layouts.app')

@section('content')
<main class="management-page">
    <div class="management-header"><div><span class="management-kicker">Comunidad educativa</span><h1>Aprendices</h1><p>Consulta y administra la información de los aprendices registrados.</p></div><a href="{{ route('apprentice.create') }}" class="management-primary-action"><span>+</span> Nuevo aprendiz</a></div>
    <section class="management-card">
        <div class="management-toolbar"><div><strong>{{ $apprentices->count() }}</strong><span> {{ $apprentices->count() === 1 ? 'aprendiz registrado' : 'aprendices registrados' }}</span></div><label class="management-search"><span>⌕</span><input type="search" id="apprenticeSearch" placeholder="Buscar por nombre, correo o teléfono..." aria-label="Buscar aprendiz"></label></div>
        <div class="management-table-wrap"><table class="management-table"><thead><tr><th>Identificador</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th class="management-actions-heading">Acciones</th></tr></thead><tbody>
            @forelse ($apprentices as $apprentice)
            <tr class="filter-row" data-search="{{ strtolower($apprentice->name . ' ' . $apprentice->email . ' ' . $apprentice->cell_number) }}"><td><span class="record-id">#{{ str_pad($apprentice->id, 3, '0', STR_PAD_LEFT) }}</span></td><td><strong>{{ $apprentice->name }}</strong></td><td>{{ $apprentice->email }}</td><td>{{ $apprentice->cell_number }}</td><td><div class="management-actions"><a href="{{ route('apprentice.show', $apprentice) }}" class="table-action table-action-view">Ver</a><a href="{{ route('apprentice.edit', $apprentice) }}" class="table-action table-action-edit">Editar</a><form action="{{ route('apprentice.destroy', $apprentice) }}" method="POST">@csrf @method('DELETE')<button type="submit" class="table-action table-action-delete" onclick="return confirm('¿Deseas eliminar este aprendiz?')">Eliminar</button></form></div></td></tr>
            @empty <tr><td colspan="5" class="management-empty">Todavía no hay aprendices registrados.</td></tr> @endforelse
        </tbody></table></div><p class="management-no-results" hidden>No encontramos aprendices con ese criterio.</p>
    </section>
</main>
<script>
    // Busco aprendices por sus datos principales sin enviar consultas adicionales al servidor.
    document.getElementById('apprenticeSearch')?.addEventListener('input', (event) => { const term = event.target.value.trim().toLowerCase(); const rows = document.querySelectorAll('.filter-row'); let visible = 0; rows.forEach((row) => { const match = row.dataset.search.includes(term); row.hidden = !match; if (match) visible++; }); document.querySelector('.management-no-results').hidden = visible !== 0; });
</script>
@endsection
