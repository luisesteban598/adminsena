@extends('layouts.public')

@section('title', 'Inicio — AdminSENA')

@section('content')

    <section class="landing-hero">
        <div class="hero-copy">
            <span class="eyebrow">Innovación para la formación</span>
            <h2>Gestiona la formación del SENA con claridad, orden y tecnología.</h2>
            <p>
                AdminSENA centraliza la información de áreas, centros de formación,
                instructores, cursos, aprendices y recursos tecnológicos para fortalecer
                la gestión institucional y apoyar la calidad educativa.
            </p>
            <div class="hero-actions">
                <a href="#contacto" class="btn btn-primary">Conoce más</a>
                <a href="{{ route('login') }}" class="btn btn-secondary">Ingresar</a>
            </div>

            <ul class="hero-points">
                <li>Información centralizada</li>
                <li>Seguimiento académico claro</li>
                <li>Gestión administrativa ágil</li>
            </ul>
        </div>

        <div class="carousel landing-carousel">
            <div class="carousel-track">
                <div class="carousel-slide has-image slide-1" style="position: relative; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=1200&auto=format&fit=crop"
                         alt="Centros de Formación SENA"
                         style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                    <div class="slide-caption">
                        <h3>Centros de formación a nivel nacional</h3>
                    </div>
                </div>

                <div class="carousel-slide has-image slide-2" style="position: relative; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200&auto=format&fit=crop"
                         alt="Formación para el trabajo"
                         style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                    <div class="slide-caption">
                        <h3>Formación para el trabajo y el desarrollo humano</h3>
                    </div>
                </div>

                <div class="carousel-slide has-image slide-3" style="position: relative; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=1200&auto=format&fit=crop"
                         alt="Innovación y tecnología SENA"
                         style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                    <div class="slide-caption">
                        <h3>Innovación y tecnología al servicio de los aprendices</h3>
                    </div>
                </div>
            </div>

            <button class="carousel-btn prev" aria-label="Anterior">&#10094;</button>
            <button class="carousel-btn next" aria-label="Siguiente">&#10095;</button>

            <div class="carousel-dots">
                <button class="active" aria-label="Ir al slide 1"></button>
                <button aria-label="Ir al slide 2"></button>
                <button aria-label="Ir al slide 3"></button>
            </div>
        </div>
    </section>

    <section class="stats-strip">
        <div class="stat-item">
            <strong>+65</strong>
            <span>Años de experiencia</span>
        </div>
        <div class="stat-item">
            <strong>100%</strong>
            <span>Gestión digital</span>
        </div>
        <div class="stat-item">
            <strong>6</strong>
            <span>Módulos clave</span>
        </div>
        <div class="stat-item">
            <strong>24/7</strong>
            <span>Acceso institucional</span>
        </div>
    </section>

    <section class="feature-section">
        <div class="section-heading">
            <span class="eyebrow eyebrow-alt">¿Qué incluye?</span>
            <h2>Herramientas para fortalecer la gestión del centro</h2>
        </div>

        <div class="feature-grid">
            <article class="feature-card">
                <div class="feature-icon">A</div>
                <h3>Áreas</h3>
                <p>Organiza y clasifica cada espacio académico y administrativo del centro.</p>
            </article>

            <article class="feature-card">
                <div class="feature-icon">C</div>
                <h3>Centros</h3>
                <p>Administra la información institucional de cada sede de formación.</p>
            </article>

            <article class="feature-card">
                <div class="feature-icon">I</div>
                <h3>Instructores</h3>
                <p>Registra la información profesional y pedagógica del talento humano.</p>
            </article>

            <article class="feature-card">
                <div class="feature-icon">P</div>
                <h3>Aprendices</h3>
                <p>Apoya el seguimiento del proceso formativo de cada estudiante.</p>
            </article>
        </div>
    </section>

    <section class="module-showcase">
        <div class="showcase-copy">
            <span class="eyebrow eyebrow-alt">Plataforma institucional</span>
            <h2>Una herramienta pensada para facilitar el trabajo de la formación.</h2>
            <p>
                Cada módulo está diseñado para mejorar la operación del SENA, reducir la dispersión
                de la información y apoyar decisiones más rápidas, organizadas y efectivas.
            </p>
            <a href="{{ route('login') }}" class="btn btn-primary">Acceder al sistema</a>
        </div>

        <div class="module-list">
            <div class="module-item">
                <span class="module-tag">01</span>
                <div>
                    <h3>Administración</h3>
                    <p>Control de áreas, cursos y centros de formación.</p>
                </div>
            </div>
            <div class="module-item">
                <span class="module-tag">02</span>
                <div>
                    <h3>Academia</h3>
                    <p>Gestión de instructores, aprendices y procesos formativos.</p>
                </div>
            </div>
            <div class="module-item">
                <span class="module-tag">03</span>
                <div>
                    <h3>Tecnología</h3>
                    <p>Monitoreo de equipos y recursos para la formación.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section">
        <div class="section-heading news-section-heading">
            <span class="eyebrow eyebrow-alt">Actualidad institucional</span>
            <h2>Últimas noticias</h2>
            <p>Conoce las novedades más recientes de nuestra comunidad educativa.</p>
        </div>
        <div class="news-grid">
            @forelse ($news as $item)
            <article class="public-news-card">
                @if ($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                @else
                <div class="public-news-placeholder">SENA</div>
                @endif
                <div class="public-news-body">
                    <span>{{ $item->published_at?->format('d/m/Y') }}</span>
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->summary }}</p>
                    <a href="{{ route('news.public.show', $item) }}">Leer noticia <span aria-hidden="true">→</span></a>
                </div>
            </article>
            @empty
            <div class="news-empty">Próximamente encontrarás aquí las noticias del centro de formación.</div>
            @endforelse
        </div>
        <div class="news-section-action"><a href="{{ route('news.public.index') }}" class="btn btn-secondary">Ver todas las noticias</a></div>
    </section>

    <section class="section-block">
        <div class="contact-panel card">
            <div>
                <span class="eyebrow eyebrow-alt">Contacto</span>
                <h2>¿Necesitas más información?</h2>
            </div>
            <p>
                Para más información sobre trámites, servicios o procesos institucionales,
                visita nuestra página de contacto institucional.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-primary">Ir a contacto</a>
        </div>
    </section>

@endsection