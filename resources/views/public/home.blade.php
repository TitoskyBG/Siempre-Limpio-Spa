<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siempre Limpio SPA</title>
    <meta
        name="description"
        content="Servicios de aseo, limpieza, tapicería, lavado de autos y mantenciones para hogares, oficinas y espacios pequeños."
    >

    {{-- Estilos globales y específicos de la página de inicio --}}
    <link rel="stylesheet" href="{{ asset('assets/css/public/public-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/public/home.css') }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
</head>
<body>

{{-- ===================== HEADER / NAVEGACIÓN ===================== --}}
<header class="header">
    <div class="container nav">
        {{-- Logo principal --}}
        <a href="#inicio" class="logo" aria-label="Ir al inicio">
            <img
                src="{{ asset('assets/img/logo/logo-nav.png') }}"
                alt="Siempre Limpio SPA"
                class="logo-image"
                width="220"
                height="90"
                loading="eager"
            >
        </a>

        {{-- Botón hamburguesa para menú responsive --}}
        <button
            class="menu-toggle"
            type="button"
            aria-expanded="false"
            aria-controls="main-menu"
            aria-label="Abrir menú"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        {{-- Menú principal, en el mismo orden que las secciones de la página --}}
        <nav class="menu" id="main-menu">
            <a href="#inicio" class="nav-link is-current">Inicio</a>
            <a href="#equipos" class="nav-link">Equipos</a>
            <a href="#servicios" class="nav-link">Servicios</a>
            <a href="#destacados" class="nav-link">Destacados</a>
            <a href="#antes-despues" class="nav-link">Antes y después</a>
            <a href="#cotizar" class="nav-link nav-link-quote">Cotizar</a>
            <a href="#contacto" class="nav-link">Contacto</a>
        </nav>
    </div>
</header>

<main>

    {{-- ===================== HERO / INICIO ===================== --}}
    <section class="hero section-tone-blue" id="inicio">
        <div class="container hero-grid">
            <div class="hero-content">
                <span class="tag">{{ $settings['hero_tag'] ?? 'Servicios de limpieza y mantención' }}</span>

                <h1>{{ $settings['hero_title'] ?? 'Soluciones limpias, ordenadas y confiables para tu espacio.' }}</h1>

                <p>
                    {{ $settings['hero_description'] ?? 'Siempre Limpio SPA entrega servicios de aseo, mantención y limpieza especializada para oficinas, espacios pequeños, vehículos, tapicerías y otras necesidades puntuales.' }}
                </p>

                <div class="hero-buttons">
                    <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="">
                        Solicitar cotización
                    </a>
                    <a href="#servicios" class="btn btn-secondary">
                        Ver servicios
                    </a>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-card">
                    <span class="hero-card-label">Siempre Limpio SPA</span>

                    <div class="hero-image">
                        <img
                            src="{{ isset($settings['hero_image_path']) ? asset('storage/' . $settings['hero_image_path']) : asset('assets/img/inicio/hero.webp') }}"
                            alt="{{ $settings['hero_image_alt'] ?? 'Equipo de Siempre Limpio SPA realizando un servicio de limpieza' }}"
                            width="900"
                            height="675"
                            loading="eager"
                        >
                    </div>

                    <p class="hero-image-caption">
                        {{ $settings['hero_image_caption'] ?? 'Trabajamos con dedicación para entregar espacios limpios, frescos y listos para disfrutar.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== EQUIPOS ===================== --}}
    <section class="section equipments section-tone-white" id="equipos">
        <div class="container">
            <div class="section-heading">
                <span class="tag">Equipos</span>
                <h2>Equipos y herramientas con las que trabajamos</h2>
                <p>
                    Contamos con el equipamiento técnico necesario para abordar 
                    cualquier nivel de exigencia, optimizando los tiempos de trabajo 
                    y asegurando la máxima limpieza.
                </p>
            </div>

            <div class="equipment-grid">
                <article class="equipment-card">
                    <div class="equipment-image">
                        <img
                            src="{{ asset('assets/img/herramientas/abrillantadora.png') }}"
                            alt="Abrillantadora industrial"
                            width="600"
                            height="600"
                            loading="lazy"
                        >
                    </div>
                    <h3>Abrillantadora</h3>
                    <p>Restauración y limpieza profunda para pisos duros y superficies de alto tráfico, 
                        devolviendo el brillo y la pulcritud original.
                    </p>
                </article>

                <article class="equipment-card">
                    <div class="equipment-image">
                        <img
                            src="{{ asset('assets/img/herramientas/carros-estrujador.png') }}"
                            alt="Carro estrujador profesional"
                            width="600"
                            height="600"
                            loading="lazy"
                        >
                    </div>
                    <h3>Carros estrujadores</h3>
                    <p>Optimizan los tiempos de lavado y garantizan la máxima higiene al separar 
                        el agua limpia de la sucia durante la limpieza de pisos.
                    </p>
                </article>

                <article class="equipment-card">
                    <div class="equipment-image">
                        <img
                            src="{{ asset('assets/img/herramientas/hidrolavadora.png') }}"
                            alt="Hidrolavadora profesional"
                            width="600"
                            height="600"
                            loading="lazy"
                        >
                    </div>
                    <h3>Hidrolavadoras</h3>
                    <p>Limpieza a alta presión ideal para remover suciedad incrustada en 
                        fachadas, accesos, estacionamientos y superficies exteriores.
                    </p>
                </article>

                <article class="equipment-card">
                    <div class="equipment-image">
                        <img
                            src="{{ asset('assets/img/herramientas/aspiradoras.png') }}"
                            alt="Aspiradora profesional"
                            width="600"
                            height="600"
                            loading="lazy"
                        >
                    </div>
                    <h3>Aspiradora Profesional</h3>
                    <p>Aspirado industrial de alta potencia para la eliminación eficaz de polvo, 
                        residuos secos y humedad en alfombras y textiles.
                    </p>
                </article>
            </div>
        </div>
    </section>

    {{-- ===================== SERVICIOS / ÓRBITA ===================== --}}
    <section class="section services-orbit section-tone-blue" id="servicios">
        <div class="container">
            <div class="section-heading">
                <span class="tag">Nuestros servicios</span>
                <h2>Servicios Principales que Ofrecemos</h2>
                <p>
                    {{ $settings['orbit_description'] ?? 'Ofrecemos servicios de limpieza profesional ejecutados bajo los más altos estándares de calidad, asegurando un entorno impecable y la máxima satisfacción en cada trabajo.' }}
                </p>
            </div>

            @php
                // Rescatamos los servicios desde la base de datos (inyectados desde un View Composer o directamente aquí si usáramos lógica incrustada, pero para evitar errores en otras páginas, los llamaremos directamente)
                $orbitServices = \App\Models\PrincipalService::all()->keyBy('position');
            @endphp

            <div class="orbit-layout">
                <a href="#cotizar" class="orbit-item js-cotizar-btn top-left" data-service="{{ $orbitServices['top-left']->name ?? 'Aseo de Casas' }}">
                    {{ $orbitServices['top-left']->name ?? 'Aseo de Casas' }}
                </a>
                <a href="#cotizar" class="orbit-item js-cotizar-btn top-right" data-service="{{ $orbitServices['top-right']->name ?? 'Aseo en Condominios' }}">
                    {{ $orbitServices['top-right']->name ?? 'Aseo en Condominios' }}
                </a>
                <a href="#cotizar" class="orbit-item js-cotizar-btn middle-left" data-service="{{ $orbitServices['middle-left']->name ?? 'Aseo en Oficinas' }}">
                    {{ $orbitServices['middle-left']->name ?? 'Aseo en Oficinas' }}
                </a>

                <div class="orbit-center">
                    <div class="orbit-image large">
                        <img
                            src="{{ isset($settings['orbit_image_path']) ? asset('storage/' . $settings['orbit_image_path']) : asset('assets/img/orbita/orbita-servicios.webp') }}"
                            alt="{{ $settings['orbit_image_alt'] ?? 'Equipo de Siempre Limpio SPA realizando un servicio de limpieza' }}"
                            width="650"
                            height="650"
                            loading="lazy"
                        >
                    </div>
                </div>

                <a href="#cotizar" class="orbit-item js-cotizar-btn middle-right" data-service="{{ $orbitServices['middle-right']->name ?? 'Lavado de Tapicería' }}">
                    {{ $orbitServices['middle-right']->name ?? 'Lavado de Tapicería' }}
                </a>
                <a href="#cotizar" class="orbit-item js-cotizar-btn bottom-left" data-service="{{ $orbitServices['bottom-left']->name ?? 'Aseo en Gimnasios' }}">
                    {{ $orbitServices['bottom-left']->name ?? 'Aseo en Gimnasios' }}
                </a>
                <a href="#cotizar" class="orbit-item js-cotizar-btn bottom-right" data-service="{{ $orbitServices['bottom-right']->name ?? 'Aseo en Recintos Educacionales' }}">
                    {{ $orbitServices['bottom-right']->name ?? 'Aseo en Recintos Educacionales' }}
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== SERVICIOS DESTACADOS ===================== --}}
    <section class="section featured-services section-tone-white" id="destacados">
        <div class="container">
            <div class="section-heading">
                <span class="tag">Servicios destacados</span>
                <h2>Servicios Explicados en Detalle</h2>
                <p>
                    Conoce algunos de nuestros servicios especializados y revisa imágenes
                    reales del proceso y resultado de cada trabajo.
                </p>
            </div>

            @php
                $dbFeaturedServices = \App\Models\FeaturedService::with(['steps', 'images'])->get();
            @endphp

            @foreach($dbFeaturedServices as $index => $fs)
                @php
                    // Alternar la clase reverse tal como lo hacía tu diseño original
                    $isReverse = ($index % 2 !== 0);
                    // Separar la imagen principal (is_main = true) de las miniaturas
                    $mainImg = $fs->images->where('is_main', true)->first() ?? $fs->images->first();
                    $thumbs = $fs->images->where('id', '!=', optional($mainImg)->id)->take(3);
                @endphp

                <article class="feature-block {{ $isReverse ? 'reverse' : '' }}">
                    <div class="feature-gallery">
                        <div class="gallery-main">
                            <img
                                src="{{ $mainImg && (str_starts_with($mainImg->image_path, 'assets/') || filter_var($mainImg->image_path, FILTER_VALIDATE_URL)) ? asset($mainImg->image_path) : asset('storage/' . optional($mainImg)->image_path) }}"
                                alt="{{ optional($mainImg)->alt_text ?? $fs->title }}"
                                width="900"
                                height="675"
                                loading="lazy"
                            >
                        </div>

                        <div class="gallery-thumbs" aria-label="Galería de {{ $fs->tag }}">
                            @foreach($thumbs as $thumb)
                                <button class="thumb gallery-thumb" type="button" aria-label="Ver imagen de miniatura">
                                    <img
                                        src="{{ str_starts_with($thumb->image_path, 'assets/') || filter_var($thumb->image_path, FILTER_VALIDATE_URL) ? asset($thumb->image_path) : asset('storage/' . $thumb->image_path) }}"
                                        alt="{{ $thumb->alt_text ?? $fs->title }}"
                                        width="300"
                                        height="300"
                                        loading="lazy"
                                    >
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="feature-content">
                        <span class="tag">{{ $fs->tag }}</span>
                        <h3>{{ $fs->title }}</h3>
                        <p>
                            {{ $fs->description }}
                        </p>

                        <ul class="feature-list">
                            @foreach($fs->steps as $step)
                                <li>{{ $step->description }}</li>
                            @endforeach
                        </ul>

                        <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="{{ $fs->tag }}">
                            Cotizar
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>


    {{-- ===================== ANTES Y DESPUÉS ===================== --}}
    <section class="section before-after section-tone-blue" id="antes-despues">
        <div class="container">
            <div class="section-heading">
                <span class="tag">Antes y después</span>
                <h2>Resultados reales de nuestros servicios</h2>
                <p>
                    Desliza sobre cada imagen para comparar el estado antes y después
                    de aplicar nuestro servicio de limpieza.
                </p>
            </div>

            @php
                $beforeAfterItems = \App\Models\BeforeAfterItem::with('steps')->get();
            @endphp

            {{-- Pestañas de comparación --}}
            <div class="ba-tabs" role="tablist" aria-label="Seleccionar servicio para comparar">
                @foreach($beforeAfterItems as $index => $baItem)
                    <button
                        class="ba-tab{{ $index === 0 ? ' is-active' : '' }}"
                        role="tab"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                        data-target="{{ $baItem->tab_target }}"
                        type="button"
                    >
                        {{ $baItem->tab_name }}
                    </button>
                @endforeach
            </div>

            <div class="ba-panels">

                @foreach($beforeAfterItems as $index => $baItem)
                    @php
                        // Nota: la clase "ba-image-before" siempre debe recibir image_before_path
                        // y "ba-image-after" siempre image_after_path. El slider (home.css) las
                        // usa como capas de recorte (clip-path), no como orden cronológico: por
                        // como está construido, image_before_path termina siendo la foto que se
                        // ve bajo la etiqueta "Después" y image_after_path la que se ve bajo
                        // "Antes". No inviertas este mapeo sin revisar home.css/before-after.js.
                        $resolveImg = fn ($path) => $path && (str_starts_with($path, 'assets/') || filter_var($path, FILTER_VALIDATE_URL))
                            ? asset($path)
                            : asset('storage/' . $path);
                    @endphp
                    <div class="ba-panel{{ $index === 0 ? ' is-active' : '' }}" id="{{ $baItem->tab_target }}" data-service="{{ $baItem->tab_target }}">
                        <div class="ba-slider-wrap">
                            <div class="ba-slider" data-before="Antes" data-after="Después">
                                <img
                                    class="ba-image ba-image-before"
                                    src="{{ $resolveImg($baItem->image_before_path) }}"
                                    alt="{{ $baItem->image_before_alt }}"
                                    width="800"
                                    height="600"
                                    loading="lazy"
                                >

                                <img
                                    class="ba-image ba-image-after"
                                    src="{{ $resolveImg($baItem->image_after_path) }}"
                                    alt="{{ $baItem->image_after_alt }}"
                                    width="800"
                                    height="600"
                                    loading="lazy"
                                >
                                <div class="ba-divider"></div>
                                <input
                                    type="range"
                                    class="ba-range"
                                    min="0"
                                    max="100"
                                    value="50"
                                    aria-label="Deslizar para comparar {{ strtolower($baItem->tab_name) }} antes y después"
                                >
                            </div>
                        </div>

                        <div class="ba-info">
                            <span class="tag">{{ $baItem->tag }}</span>
                            <h3>{{ $baItem->title }}</h3>
                            <p>
                                {{ $baItem->description }}
                            </p>

                            <ol class="ba-steps">
                                @foreach($baItem->steps as $step)
                                    <li>{{ $step->description }}</li>
                                @endforeach
                            </ol>
                            <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="{{ $baItem->tag }}">
                                Cotizar este servicio
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- ===================== COTIZAR ===================== --}}
    <section class="section quote-section" id="cotizar">
        <div class="container quote-grid">

            {{-- Columna izquierda: explicación y beneficios --}}
            <div class="quote-info">
                <span class="tag tag-inverse">Cotización</span>
                <h2>Cuéntanos qué necesitas y te respondemos rápido</h2>
                <p>
                    Completa el formulario con tus datos y el servicio que te interesa.
                    Si llegaste desde un botón "Cotizar" de otra sección, el campo de
                    servicio ya vendrá completado automáticamente.
                </p>

                <ul class="quote-benefits">
                    <li>Visita técnica gratuita antes de confirmar el trabajo.</li>
                    <li>Respuesta a la brevedad por correo o teléfono.</li>
                    <li>Cotización según el tamaño real de tu espacio o vehículo.</li>
                    <li>Sin compromiso hasta confirmar el servicio.</li>
                </ul>
            </div>

            {{-- Columna derecha: formulario de cotización --}}
            <div class="quote-card">
                <form class="quote-form" id="quote-form">
                    <div class="field">
                        <label for="cotizar-nombre">Nombre completo</label>
                        <input
                            type="text"
                            id="cotizar-nombre"
                            name="nombre"
                            placeholder="Ej: María Pérez"
                            required
                        >
                    </div>

                    <div class="field-row">
                        <div class="field">
                            <label for="cotizar-telefono">Teléfono</label>
                            <input
                                type="tel"
                                id="cotizar-telefono"
                                name="telefono"
                                placeholder="Ej: +56 9 1234 5678"
                                required
                            >
                        </div>

                        <div class="field">
                            <label for="cotizar-correo">Correo electrónico</label>
                            <input
                                type="email"
                                id="cotizar-correo"
                                name="correo"
                                placeholder="Ej: maria@correo.cl"
                                required
                            >
                        </div>
                    </div>

                    <div class="field">
                        <label for="cotizar-servicio">Servicio de interés</label>
                        <input
                            type="text"
                            id="cotizar-servicio"
                            name="servicio"
                            placeholder="Ej: Lavado de tapicería"
                        >
                    </div>

                    <div class="field">
                        <label for="cotizar-descripcion">Descripción</label>
                        <textarea
                            id="cotizar-descripcion"
                            name="descripcion"
                            rows="4"
                            placeholder="Ej: Necesito lavado de 2 alfombras, 1 sofa, disponibilidad en la tarde."
                        ></textarea>
                    </div>

                    <button type="submit" class="btn btn-quote-submit">
                        Enviar solicitud
                    </button>

                    <p class="quote-success" id="quote-success" hidden>
                        ¡Gracias! Tu solicitud fue registrada. Te contactaremos pronto.
                    </p>
                </form>
            </div>

        </div>
    </section>

    {{-- ===================== CONTACTO ===================== --}}
    <section class="section contact section-tone-white contact-tall" id="contacto">
        <div class="container section-grid">
            <div>
                <span class="tag">Contacto</span>
                <h2>{{ $settings['contact_title'] ?? 'Estamos listos para ayudarte' }}</h2>
                <p>
                    {{ $settings['contact_description'] ?? 'Atendemos en Talca, Maule, Curicó, San Rafael, Linares y San Clemente. Escríbenos por Instagram o completa el formulario de cotización.' }}
                </p>
            </div>

            <div class="contact-card">
                <h3>Datos de contacto</h3>
                <p>Teléfono / WhatsApp: {{ $settings['contact_phone'] ?? '+56 9 7712 2022' }}</p>
                <p>Instagram: {{ $settings['contact_instagram'] ?? '@siemprelimpiospa' }}</p>
                <p>Horario: {{ $settings['contact_hours_weekday'] ?? 'Lunes a viernes 09:00 - 21:00 hrs' }}</p>
                <p>{{ $settings['contact_hours_saturday'] ?? 'Sábado: 09:00 - 17:00 hrs' }}</p>
                <p>{{ $settings['contact_hours_sunday'] ?? 'Domingo: Cerrado' }}</p>
            </div>
        </div>
    </section>

</main>

{{-- ===================== FOOTER ===================== --}}
<footer class="footer">
    <div class="container footer-wrap">
        <div class="footer-brand">
            <p class="footer-title">Siempre Limpio SPA</p>
            <p class="footer-text">Servicios de aseo, limpieza y mantención.</p>
        </div>

        <div class="footer-side">
            <p class="footer-text">Landing pública base del proyecto.</p>
            <a href="/admin/login" class="admin-link">Acceso interno</a>
        </div>
    </div>
</footer>

{{-- Scripts externos específicos de la página --}}
<script src="{{ asset('assets/js/public/nav.js') }}"></script>
<script src="{{ asset('assets/js/public/before-after.js') }}"></script>
<script src="{{ asset('assets/js/public/quote-form.js') }}"></script>

<script src="{{ asset('assets/js/public/featured-gallery.js') }}"></script>

</body>
