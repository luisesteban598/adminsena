@extends('layouts.app')

@section('content')
<main class="management-page">
    <div class="management-header">
        <div>
            <span class="management-kicker">Comunicación institucional</span>
            <h1>Noticias</h1>
            <p>Publica y administra las novedades del centro de formación.</p>
        </div>
        <a href="{{ route('news.create') }}" class="management-primary-action"><span>+</span> Nueva noticia</a>
    </div>

    <section class="management-card">
        <div class="management-toolbar">
            <div><strong>{{ $news->count() }}</strong><span> {{ $news->count() === 1 ? 'noticia registrada' : 'noticias registradas' }}</span></div>
            <label class="management-search"><span>⌕</span><input type="search" id="newsSearch" placeholder="Buscar noticia..." aria-label="Buscar noticia"></label>
        </div>
        <div class="management-table-wrap">
            <table class="management-table">
                <thead><tr><th>Noticia</th><th>Estado</th><th>Publicación</th><th class="management-actions-heading">Acciones</th></tr></thead>
                <tbody>
                    @forelse ($news as $item)
                    <tr class="filter-row" data-search="{{ strtolower($item->title . ' ' . $item->summary) }}">
                        <td><strong>{{ $item->title }}</strong><small class="news-summary-cell">{{ $item->summary }}</small></td>
                        <td><span class="news-status {{ $item->is_published ? 'news-status-published' : 'news-status-draft' }}">{{ $item->is_published ? 'Publicada' : 'Borrador' }}</span></td>
                        <td>{{ $item->published_at?->format('d/m/Y') ?? 'Sin publicar' }}</td>
                        <td><div class="management-actions"><a href="{{ route('news.show', $item) }}" class="table-action table-action-view">Ver</a><a href="{{ route('news.edit', $item) }}" class="table-action table-action-edit">Editar</a><form action="{{ route('news.destroy', $item) }}" method="POST">@csrf @method('DELETE')<button type="submit" class="table-action table-action-delete" onclick="return confirm('¿Deseas eliminar esta noticia?')">Eliminar</button></form></div></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="management-empty">Todavía no hay noticias registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <p class="management-no-results" hidden>No encontramos noticias con ese criterio.</p>
    </section>
</main>
<script>
    // Filtro las noticias por título o resumen para encontrarlas rápidamente.
    document.getElementById('newsSearch')?.addEventListener('input', (event) => { const term = event.target.value.trim().toLowerCase(); const rows = document.querySelectorAll('.filter-row'); let visible = 0; rows.forEach((row) => { const match = row.dataset.search.includes(term); row.hidden = !match; if (match) visible++; }); document.querySelector('.management-no-results').hidden = visible !== 0; });
</script>
@endsection
