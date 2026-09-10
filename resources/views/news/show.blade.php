@extends('layouts.app')

@section('content')
<main class="management-page">
    <div class="management-header"><div><span class="management-kicker">Consulta de noticia</span><h1>{{ $news->title }}</h1><p>{{ $news->is_published ? 'Publicada en el home institucional.' : 'Guardada como borrador.' }}</p></div><a href="{{ route('news.index') }}" class="management-secondary-action">Volver a noticias</a></div>
    <article class="news-detail-card">
        @if ($news->image)<img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="news-detail-image">@endif
        <div class="news-detail-body"><span class="news-status {{ $news->is_published ? 'news-status-published' : 'news-status-draft' }}">{{ $news->is_published ? 'Publicada' : 'Borrador' }}</span><h2>{{ $news->title }}</h2><p class="news-detail-date">{{ $news->published_at?->format('d/m/Y H:i') ?? 'Sin fecha de publicación' }}</p><p class="news-detail-summary">{{ $news->summary }}</p><div class="news-detail-content">{!! nl2br(e($news->content)) !!}</div></div>
        <div class="detail-actions"><a href="{{ route('news.edit', $news) }}" class="management-primary-action">Editar noticia</a><form action="{{ route('news.destroy', $news) }}" method="POST">@csrf @method('DELETE')<button type="submit" class="table-action table-action-delete" onclick="return confirm('¿Deseas eliminar esta noticia?')">Eliminar noticia</button></form></div>
    </article>
</main>
@endsection
