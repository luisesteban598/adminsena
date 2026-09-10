@extends('layouts.public')

@section('title', $news->title . ' — AdminSENA')

@section('content')
<main class="public-news-page">
    <a href="{{ route('home') }}#noticias" class="public-news-back">← Volver al inicio</a>
    <article class="public-news-detail">
        @if ($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
        @endif
        <div class="public-news-detail-body">
            <span class="eyebrow eyebrow-alt">Actualidad institucional</span>
            <h1>{{ $news->title }}</h1>
            <time datetime="{{ $news->published_at?->toDateString() }}">{{ $news->published_at?->format('d/m/Y') }}</time>
            <p class="public-news-lead">{{ $news->summary }}</p>
            <div class="public-news-content">{!! nl2br(e($news->content)) !!}</div>
        </div>
    </article>
</main>
@endsection
