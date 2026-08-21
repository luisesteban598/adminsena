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
                <!-- Slide 1: Centros de formación -->
                <div class="carousel-slide has-image slide-1" style="position: relative; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=1200&auto=format&fit=crop" 
                         alt="Centros de Formación SENA" 
                         style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                    <div class="slide-caption" style="position: relative; z-index: 2; background: rgba(0,0,0,0.5); padding: 10px; border-radius: 6px;">
                        <h3 style="font-size:1.1rem; color: #fff; margin: 0;">Centros de formación a nivel nacional</h3>
                    </div>
                </div>

                <!-- Slide 2: Formación para el trabajo -->
                <div class="carousel-slide has-image slide-2" style="position: relative; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200&auto=format&fit=crop" 
                         alt="Formación para el trabajo" 
                         style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                    <div class="slide-caption" style="position: relative; z-index: 2; background: rgba(0,0,0,0.5); padding: 10px; border-radius: 6px;">
                        <h3 style="font-size:1.1rem; color: #fff; margin: 0;">Formación para el trabajo y el desarrollo humano</h3>
                    </div>
                </div>

                <!-- Slide 3: Innovación y Tecnología -->
                <div class="carousel-slide has-image slide-3" style="position: relative; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=1200&auto=format&fit=crop" 
                         alt="Innovación y tecnología SENA" 
                         style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                    <div class="slide-caption" style="position: relative; z-index: 2; background: rgba(0,0,0,0.5); padding: 10px; border-radius: 6px;">
                        <h3 style="font-size:1.1rem; color: #fff; margin: 0;">Innovación y tecnología al servicio de los aprendices</h3>
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