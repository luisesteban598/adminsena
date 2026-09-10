@extends('layouts.app')

@section('content')
{{-- Presento la sección con contexto para que el usuario entienda qué administra. --}}
<main class="management-page">
    <div class="management-header">
        <div>
            <span class="management-kicker">Gestión académica</span>
            <h1>Áreas de formación</h1>
            <p>Administra las áreas que hacen parte de la oferta institucional.</p>
        </div>
        {{-- El botón principal queda visible para facilitar la creación de un registro. --}}
        <a href="{{ route('area.create') }}" class="management-primary-action">
            <span>+</span> Nueva área
        </a>
    </div>

    <section class="management-card">
        <div class="management-toolbar">
            <div>
                <strong>{{ $areas->count() }}</strong>
                <span> {{ $areas->count() === 1 ? 'área registrada' : 'áreas registradas' }}</span>
            </div>
            {{-- Filtro los registros en el navegador para encontrar un área rápidamente. --}}
            <label class="management-search">
                <span aria-hidden="true">⌕</span>
                <input type="search" id="areaSearch" placeholder="Buscar por nombre..." aria-label="Buscar área por nombre">
            </label>
        </div>

        <div class="management-table-wrap">
            <table class="management-table">
                <thead>
                    <tr>
                        <th scope="col">Identificador</th>
                        <th scope="col">Nombre del área</th>
                        <th scope="col" class="management-actions-heading">Acciones</th>
                    </tr>
                </thead>
                <tbody id="areaTableBody">
                    @forelse ($areas as $area)
                    <tr class="area-row" data-area-name="{{ strtolower($area->name) }}">
                        <td><span class="record-id">#{{ str_pad($area->id, 3, '0', STR_PAD_LEFT) }}</span></td>
                        <td><strong>{{ $area->name }}</strong></td>
                        <td>
                            <div class="management-actions">
                                {{-- Mantengo las acciones separadas para evitar confusiones al administrar. --}}
                                <a href="{{ route('area.show', $area) }}" class="table-action table-action-view">Ver</a>
                                <a href="{{ route('area.edit', $area) }}" class="table-action table-action-edit">Editar</a>
                                <form action="{{ route('area.destroy', $area) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="table-action table-action-delete" onclick="return confirm('¿Deseas eliminar esta área?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    {{-- Explico el estado vacío y mantengo disponible la acción principal. --}}
                    <tr>
                        <td colspan="3" class="management-empty">Todavía no hay áreas registradas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <p id="areaNoResults" class="management-no-results" hidden>No encontramos áreas con ese nombre.</p>
    </section>
</main>

<script>
    // Filtro las filas mientras escribo para que la consulta sea rápida y sencilla.
    const areaSearch = document.getElementById('areaSearch');
    const areaRows = Array.from(document.querySelectorAll('.area-row'));
    const areaNoResults = document.getElementById('areaNoResults');

    areaSearch?.addEventListener('input', (event) => {
        const searchTerm = event.target.value.trim().toLowerCase();
        let visibleRows = 0;

        areaRows.forEach((row) => {
            const matches = row.dataset.areaName.includes(searchTerm);
            row.hidden = !matches;
            if (matches) visibleRows++;
        });

        if (areaNoResults) areaNoResults.hidden = visibleRows !== 0;
    });
</script>
@endsection