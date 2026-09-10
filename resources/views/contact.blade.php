@extends('layouts.public')

@section('title', 'Contacto — AdminSENA')

@section('content')
<main class="public-contact-page">
    <div class="public-page-heading"><span class="eyebrow eyebrow-alt">Estamos para ayudarte</span><h1>Contacto</h1><p>Encuentra los canales para comunicarte con tu centro de formación.</p></div>
    <section class="contact-info-grid">
        <article class="contact-info-card"><span class="contact-info-icon">U</span><h2>Ubicación</h2><p>Centro de formación SENA<br>Consulta la sede a la que perteneces.</p></article>
        <article class="contact-info-card"><span class="contact-info-icon">C</span><h2>Canales de atención</h2><p>Comunícate con el equipo administrativo de tu centro para resolver tus inquietudes.</p></article>
        <article class="contact-info-card"><span class="contact-info-icon">H</span><h2>Horario</h2><p>Lunes a viernes<br>Consulta el horario vigente en tu centro.</p></article>
    </section>
    <section class="contact-callout"><div><span class="eyebrow">Atención institucional</span><h2>¿Necesitas realizar un trámite?</h2><p>Inicia sesión en AdminSENA para consultar y gestionar la información institucional disponible.</p></div><a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a></section>
</main>
@endsection
