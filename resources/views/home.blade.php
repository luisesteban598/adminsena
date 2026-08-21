@extends('layouts.public')

@section('title', 'Inicio — AdminSENA')

@section('content')

    <section class="landing-hero">
        <div class="hero-copy">
            <h2>Sobre nosotros</h2>
            <p>
                El SENA es una institución pública del orden nacional, con más de 65 años
                de experiencia en formación para el trabajo y el desarrollo humano.
            </p>
            <p>
                Nuestro propósito es formar ciudadanos competentes, innovadores y
                comprometidos con el desarrollo del país.
            </p>
            <a href="#contacto" class="btn btn-primary">Conoce más sobre el SENA</a>
        </div>

        <div class="carousel landing-carousel">
            <div class="carousel-track">
                <div class="carousel-slide has-image slide-1">
                    <div class="slide-caption">
                        <h3 style="font-size:1.1rem;">Centros de formación a nivel nacional</h3>
                    </div>
                </div>
                <div class="carousel-slide has-image slide-2">
                    <div class="slide-caption">
                        <h3 style="font-size:1.1rem;">Formación para el trabajo y el desarrollo humano</h3>
                    </div>
                </div>
                <div class="carousel-slide has-image slide-3">
                    <div class="slide-caption">
                        <h3 style="font-size:1.1rem;">Innovación y tecnología al servicio de los aprendices</h3>
                    </div>
                </div>
            </div>

            <button class="carousel-btn prev" aria-label="Anterior">&#10094;</button>
            <button class="carousel-btn next" aria-label="Siguiente">&#10095;</button>

            <div class="carousel-dots">
                <button class="active"></button>
                <button></button>
                <button></button>
            </div>
        </div>
    </section>

    <section id="contacto" class="section-block">
        <div class="card">
            <h2>Contacto</h2>
            <p style="color:#6b7280;">
                Para más información sobre trámites y servicios, comunícate con el centro de
                formación al que perteneces. Este panel es de uso interno administrativo.
            </p>
        </div>
    </section>

@endsection
