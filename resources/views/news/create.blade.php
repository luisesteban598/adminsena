@extends('layouts.app')

@section('content')
<main class="management-page">
    <div class="management-header"><div><span class="management-kicker">Comunicación institucional</span><h1>Nueva noticia</h1><p>Comparte una novedad con la comunidad educativa.</p></div><a href="{{ route('news.index') }}" class="management-secondary-action">Volver a noticias</a></div>
    <section class="form-management-card">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('News.form')
        </form>
    </section>
</main>
@endsection
