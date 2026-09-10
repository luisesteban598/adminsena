@extends('layouts.app')

@section('content')
<main class="management-page">
    <div class="management-header"><div><span class="management-kicker">Comunicación institucional</span><h1>Editar noticia</h1><p>Actualiza la información antes de volver a publicarla.</p></div><a href="{{ route('news.index') }}" class="management-secondary-action">Volver a noticias</a></div>
    <section class="form-management-card">
        <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('News.form', ['news' => $news])
        </form>
    </section>
</main>
@endsection
