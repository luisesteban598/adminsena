@extends('layouts.public')

@section('title', 'Noticias — AdminSENA')

@section('content')
<main class="public-news-list-page">
    <div class="public-page-heading"><span class="eyebrow eyebrow-alt">Actualidad institucional</span><h1>Noticias</h1><p>Conoce las novedades, actividades y acontecimientos de nuestra comunidad educativa.</p></div>
    <div class="news-grid">
        @forelse ($news as $item)
        <article class="public-news-card">
            @if ($item->image)<img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">@else<div class="public-news-placeholder">SENA</div>@endif
            <div class="public-news-body"><span>{{ $item->published_at?->format('d/m/Y') }}</span><h3>{{ $item->title }}</h3><p>{{ $item->summary }}</p><a href="{{ route('news.public.show', $item) }}">Leer noticia <span aria-hidden="true">→</span></a></div>
        </article>
        @empty
        <div class="news-empty">Todavía no hay noticias publicadas.</div>
        @endforelse
    </div>
</main>
@endsection
