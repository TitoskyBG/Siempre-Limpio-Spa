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
                <span class="tag">Servicios de limpieza y mantención</span>
                <h1>Soluciones limpias, ordenadas y confiables para tu espacio.</h1>
                <p>
                    Siempre Limpio SPA entrega servicios de aseo, mantención y limpieza
                    especializada para oficinas, espacios pequeños, vehículos, tapicerías
                    y otras necesidades puntuales.
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
                    <span class="hero-card-label">Espacio para imagen principal</span>
                    <div class="placeholder-box hero-placeholder">Imagen o trabajo destacado</div>
                    <p>
                        Aquí luego puedes agregar una foto real del equipo, de una limpieza
                        en proceso o un antes y después.
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
                    Esta sección ayuda a transmitir profesionalismo, preparación y confianza
                    al mostrar con qué herramientas se realiza cada servicio.
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
                    <p>Para limpieza profunda de alfombras, tapices, interiores y superficies de alto uso.</p>
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
                    <p>Escurrir mopas y paños de forma rápida y limpiar pisos grandes y zonas pequeñas.</p>
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
                    <p>Muy útiles en exteriores, accesos, pisos y áreas con suciedad acumulada.</p>
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
                    <p>Útil para quitar manchas profundas de alfombras de distinto tamaño y grosor, entregando resultados de calidad.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- ===================== SERVICIOS / ÓRBITA ===================== --}}
    <section class="section services-orbit section-tone-blue" id="servicios">
        <div class="container">
            <div class="section-heading">
                <span class="tag">Nuestros servicios</span>
                <h2>Servicios principales que ofrecemos</h2>
                <p>
                    En escritorio esta sección muestra una imagen central con los servicios
                    distribuidos a los costados. En pantallas pequeñas se ordena
                    automáticamente en formato vertical.
                </p>
            </div>

            <div class="orbit-layout">
                <a href="#cotizar" class="orbit-item js-cotizar-btn top-left" data-service="Aseo de hogar">
                    Aseo de Hogar
                </a>
                <a href="#cotizar" class="orbit-item js-cotizar-btn top-right" data-service="Aseo en condominios">
                    Aseo en Condominios
                </a>
                <a href="#cotizar" class="orbit-item js-cotizar-btn middle-left" data-service="Aseo en oficinas">
                    Aseo en Oficinas
                </a>

                <div class="orbit-center">
                    <div class="orbit-image large">
                        <img
                            src="{{ asset('assets/img/orbita/Imagen-Referencia.jpg') }}"
                            alt="Equipo de Siempre Limpio SPA realizando un servicio de limpieza"
                            width="650"
                            height="650"
                            loading="lazy"
                        >
                    </div>
                </div>

                <a href="#cotizar" class="orbit-item js-cotizar-btn middle-right" data-service="Lavado de tapicería">
                    Lavado de Tapicería
                </a>
                <a href="#cotizar" class="orbit-item js-cotizar-btn bottom-left" data-service="Aseo en gimnasios">
                    Aseo en Gimnasios
                </a>
                <a href="#cotizar" class="orbit-item js-cotizar-btn bottom-right" data-service="Aseo en recintos educacionales">
                    Aseo en Recintos Educacionales
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== SERVICIOS DESTACADOS ===================== --}}
    <section class="section featured-services section-tone-white" id="destacados">
        <div class="container">
            <div class="section-heading left">
                <span class="tag">Servicios destacados</span>
                <h2>Servicios explicados en detalle</h2>
                <p>
                    Cada bloque puede mostrar fotos de trabajos realizados, una breve explicación
                    del proceso y una llamada directa a cotizar.
                </p>
            </div>

            {{-- Servicio destacado: Lavado de alfombras --}}
            <article class="feature-block">
                <div class="feature-gallery">
                    <div class="gallery-main">
                        <img
                            src="{{ asset('assets/img/servicios-destacados/foto-principal/alfombras.webp') }}"
                            alt="Lavado profundo de alfombras"
                            loading="lazy"
                        >
                    </div>
                    <div class="gallery-thumbs">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/alfombras-1.webp') }}" alt="Aspirado previo de alfombra" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/alfombras-2.webp') }}" alt="Aplicación de shampoo en alfombra" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/alfombras-3.webp') }}" alt="Resultado final de alfombra limpia" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="feature-content">
                    <span class="tag">Lavado de alfombras</span>
                    <h3>Alfombras libres de suciedad, ácaros y malos olores</h3>
                    <p>
                        Recuperamos el aspecto y la higiene de tus alfombras con un
                        proceso especializado que respeta el tipo de fibra.
                    </p>
                    <ul class="feature-list">
                        <li>Aspirado profundo previo al tratamiento.</li>
                        <li>Evaluación del tipo de fibra y nivel de suciedad.</li>
                        <li>Aplicación de shampoo especializado.</li>
                        <li>Extracción de humedad y secado controlado.</li>
                    </ul>
                    <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Lavado de alfombras">
                        Cotizar
                    </a>
                </div>
            </article>

            {{-- Servicio destacado: Limpieza de tapiz de autos --}}
            <article class="feature-block reverse">
                <div class="feature-gallery">
                    <div class="gallery-main">
                        <img
                            src="{{ asset('assets/img/servicios-destacados/foto-principal/tapiz-autos.webp') }}"
                            alt="Limpieza de tapiz de autos"
                            loading="lazy"
                        >
                    </div>
                    <div class="gallery-thumbs">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/tapiz-autos-1.webp') }}" alt="Revisión de tapiz de auto" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/tapiz-autos-2.webp') }}" alt="Aspirado de asientos de auto" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/tapiz-autos-3.webp') }}" alt="Asiento de auto limpio" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="feature-content">
                    <span class="tag">Limpieza de Tapiz de Autos</span>
                    <h3>Interior del vehículo limpio y sin manchas</h3>
                    <p>
                        Tratamiento especializado para asientos, techo y superficies
                        textiles del interior de tu auto.
                    </p>
                    <ul class="feature-list">
                        <li>Revisión del estado del tapiz.</li>
                        <li>Aspirado profundo de asientos y piso.</li>
                        <li>Aplicación de shampoo especializado.</li>
                        <li>Extracción de humedad y secado final.</li>
                    </ul>
                    <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de tapiz de autos">
                        Cotizar
                    </a>
                </div>
            </article>

            {{-- Servicio destacado: Sillones y sofás --}}
            <article class="feature-block">
                <div class="feature-gallery">
                    <div class="gallery-main">
                        <img
                            src="{{ asset('assets/img/servicios-destacados/foto-principal/sillones-sofas.webp') }}"
                            alt="Limpieza de sillones y sofás"
                            loading="lazy"
                        >
                    </div>
                    <div class="gallery-thumbs">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/sillones-sofas-1.webp') }}" alt="Aspirado de sofá" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/sillones-sofas-2.webp') }}" alt="Aplicación de shampoo en sofá" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/sillones-sofas-3.webp') }}" alt="Sofá limpio final" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="feature-content">
                    <span class="tag">Limpieza de Sillones y Sofás</span>
                    <h3>Sillones y sofás como nuevos</h3>
                    <p>
                        Ideal para living, oficinas y salas de espera con manchas o
                        suciedad acumulada por el uso diario.
                    </p>
                    <ul class="feature-list">
                        <li>Aspirado profundo de la superficie.</li>
                        <li>Evaluación del tipo de tela.</li>
                        <li>Aplicación de shampoo especializado.</li>
                        <li>Secado y revisión final.</li>
                    </ul>
                    <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de sillones y sofás">
                        Cotizar
                    </a>
                </div>
            </article>

            {{-- Servicio destacado: Sillas de comedor tapizadas --}}
            <article class="feature-block reverse">
                <div class="feature-gallery">
                    <div class="gallery-main">
                        <img
                            src="{{ asset('assets/img/servicios-destacados/foto-principal/sillas-comedor.webp') }}"
                            alt="Limpieza de sillas de comedor tapizadas"
                            loading="lazy"
                        >
                    </div>
                    <div class="gallery-thumbs">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/sillas-comedor-1.webp') }}" alt="Revisión de tela de silla" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/sillas-comedor-2.webp') }}" alt="Aplicación de producto en silla" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/sillas-comedor-3.webp') }}" alt="Silla de comedor limpia" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="feature-content">
                    <span class="tag">Limpieza de Sillas de Comedor Tapizadas</span>
                    <h3>Sillas tapizadas higienizadas y sin manchas</h3>
                    <p>
                        Tratamiento cuidadoso para telas de sillas de comedor, muy
                        expuestas a manchas de comida y uso frecuente.
                    </p>
                    <ul class="feature-list">
                        <li>Revisión del estado de la tela.</li>
                        <li>Aspirado y limpieza base.</li>
                        <li>Aplicación de producto específico según mancha.</li>
                        <li>Secado y control final.</li>
                    </ul>
                    <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de sillas de comedor tapizadas">
                        Cotizar
                    </a>
                </div>
            </article>

            {{-- Servicio destacado: Colchones --}}
            <article class="feature-block">
                <div class="feature-gallery">
                    <div class="gallery-main">
                        <img
                            src="{{ asset('assets/img/servicios-destacados/foto-principal/colchones.webp') }}"
                            alt="Limpieza de colchones"
                            loading="lazy"
                        >
                    </div>
                    <div class="gallery-thumbs">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/colchones-1.webp') }}" alt="Aspirado de colchón" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/colchones-2.webp') }}" alt="Aplicación de shampoo en colchón" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/colchones-3.webp') }}" alt="Colchón limpio final" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="feature-content">
                    <span class="tag">Limpieza de Colchones</span>
                    <h3>Colchones más limpios para un mejor descanso</h3>
                    <p>
                        Eliminamos ácaros, manchas y malos olores devolviendo frescura
                        e higiene a tu colchón.
                    </p>
                    <ul class="feature-list">
                        <li>Aspirado profundo de la superficie.</li>
                        <li>Evaluación del tipo de tela.</li>
                        <li>Aplicación de shampoo especializado.</li>
                        <li>Extracción de humedad y secado controlado.</li>
                    </ul>
                    <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de colchones">
                        Cotizar
                    </a>
                </div>
            </article>

            {{-- Servicio destacado: Limpieza de Pisos Flotantes y Cerámicas --}}
            <article class="feature-block reverse">
                <div class="feature-gallery">
                    <div class="gallery-main">
                        <img
                            src="{{ asset('assets/img/servicios-destacados/foto-principal/pisos.webp') }}"
                            alt="Limpieza de pisos flotantes y cerámicas"
                            loading="lazy"
                        >
                    </div>
                    <div class="gallery-thumbs">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/pisos-1.webp') }}" alt="Piso con suciedad antes del lavado" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/pisos-2.webp') }}" alt="Fregado de piso en proceso" loading="lazy">
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('assets/img/servicios-destacados/miniatura/pisos-3.webp') }}" alt="Piso limpio con brillo final" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="feature-content">
                    <span class="tag">Limpieza de Pisos Flotantes y Cerámicas</span>
                    <h3>Pisos limpios, brillantes y libres de suciedad acumulada</h3>
                    <p>
                        Tratamiento adecuado según el tipo de superficie, ideal para
                        pisos flotantes y cerámicas con uso frecuente.
                    </p>
                    <ul class="feature-list">
                        <li>Barrido y retiro de suciedad suelta.</li>
                        <li>Fregado mecánico o manual según superficie.</li>
                        <li>Aplicación de producto específico según el material.</li>
                        <li>Secado y control final.</li>
                    </ul>
                    <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de Pisos Flotantes y Cerámicas">
                        Cotizar
                    </a>
                </div>
            </article>
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

            {{-- Pestañas de comparación --}}
            <div class="ba-tabs" role="tablist" aria-label="Seleccionar servicio para comparar">
                <button class="ba-tab is-active" role="tab" aria-selected="true" data-target="pisos" type="button">
                    Pisos
                </button>
                <button class="ba-tab" role="tab" aria-selected="false" data-target="cama" type="button">
                    Cama
                </button>
                <button class="ba-tab" role="tab" aria-selected="false" data-target="colchon" type="button">
                    Colchón
                </button>
                <button class="ba-tab" role="tab" aria-selected="false" data-target="silla" type="button">
                    Silla
                </button>
                <button class="ba-tab" role="tab" aria-selected="false" data-target="sofa" type="button">
                    Sofa
                </button>
                <button class="ba-tab" role="tab" aria-selected="false" data-target="mueble" type="button">
                    Mueble
                </button>
            </div>

            <div class="ba-panels">

                {{-- Panel: Pisos --}}
                <div class="ba-panel is-active" id="pisos" data-service="pisos">
                    <div class="ba-slider-wrap">
                        <div class="ba-slider" data-before="Antes" data-after="Después">
                            <img
                                class="ba-image ba-image-before"
                                src="{{ asset('assets/img/antes-despues/piso-azul-despues.webp') }}"
                                alt="Piso antes del servicio de limpieza"
                                width="800"
                                height="600"
                                loading="lazy"
                            >
                            <img
                                class="ba-image ba-image-after"
                                src="{{ asset('assets/img/antes-despues/piso-azul-antes.webp') }}"
                                alt="Piso después del servicio de limpieza"
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
                                aria-label="Deslizar para comparar piso antes y después"
                            >
                        </div>
                    </div>

                    <div class="ba-info">
                        <span class="tag">Lavado y encerado de pisos</span>
                        <h3>Recuperación total de superficies</h3>
                        <p>
                            Ideal para pisos con suciedad acumulada, manchas o pérdida de brillo
                            en oficinas y espacios pequeños.
                        </p>
                        <ol class="ba-steps">
                            <li>Barrido y retiro de suciedad suelta.</li>
                            <li>Aplicación de detergente desengrasante.</li>
                            <li>Fregado mecánico o manual según superficie.</li>
                            <li>Enjuague y secado completo.</li>
                            <li>Aplicación de sellador o cera de brillo.</li>
                        </ol>
                        <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Lavado y encerado de pisos">
                            Cotizar este servicio
                        </a>
                    </div>
                </div>

                {{-- Panel: Cama --}}
                <div class="ba-panel" id="cama" data-service="cama">
                    <div class="ba-slider-wrap">
                        <div class="ba-slider" data-before="Antes" data-after="Después">
                            <img
                                class="ba-image ba-image-before"
                                src="{{ asset('assets/img/antes-despues/cama-despues.webp') }}"
                                alt="Cama antes de la limpieza"
                                width="800"
                                height="600"
                                loading="lazy"
                            >
                            <img
                                class="ba-image ba-image-after"
                                src="{{ asset('assets/img/antes-despues/cama-antes.webp') }}"
                                alt="Cama después de la limpieza"
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
                                aria-label="Deslizar para comparar cama antes y después"
                            >
                        </div>
                    </div>

                    <div class="ba-info">
                        <span class="tag">Limpieza de camas</span>
                        <h3>Bases cama e implementos más higiénicos</h3>
                        <p>
                            Eliminamos polvo, ácaros y manchas devolviendo frescura a la
                            base de tu cama.
                        </p>
                        <ol class="ba-steps">
                            <li>Aspirado profundo de la superficie.</li>
                            <li>Evaluación del tipo de tela.</li>
                            <li>Aplicación de shampoo especializado.</li>
                            <li>Extracción de humedad y suciedad.</li>
                            <li>Secado y revisión final.</li>
                        </ol>
                        <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de camas">
                            Cotizar este servicio
                        </a>
                    </div>
                </div>

                {{-- Panel: Colchón --}}
                <div class="ba-panel" id="colchon" data-service="colchon">
                    <div class="ba-slider-wrap">
                        <div class="ba-slider" data-before="Antes" data-after="Después">
                            <img
                                class="ba-image ba-image-before"
                                src="{{ asset('assets/img/antes-despues/colchon-despues.webp') }}"
                                alt="Colchón antes de la limpieza"
                                width="800"
                                height="600"
                                loading="lazy"
                            >
                            <img
                                class="ba-image ba-image-after"
                                src="{{ asset('assets/img/antes-despues/colchon-antes.webp') }}"
                                alt="Colchón después de la limpieza"
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
                                aria-label="Deslizar para comparar colchón antes y después"
                            >
                        </div>
                    </div>

                    <div class="ba-info">
                        <span class="tag">Limpieza de colchones</span>
                        <h3>Duerme limpio, duerme mejor</h3>
                        <p>
                            Eliminamos ácaros, manchas y malos olores para un descanso
                            más saludable.
                        </p>
                        <ol class="ba-steps">
                            <li>Aspirado profundo de la superficie.</li>
                            <li>Evaluación del tipo de tela.</li>
                            <li>Aplicación de shampoo especializado.</li>
                            <li>Extracción de humedad y suciedad.</li>
                            <li>Secado y revisión final.</li>
                        </ol>
                        <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de colchones">
                            Cotizar este servicio
                        </a>
                    </div>
                </div>

                {{-- Panel: Silla --}}
                <div class="ba-panel" id="silla" data-service="silla">
                    <div class="ba-slider-wrap">
                        <div class="ba-slider" data-before="Antes" data-after="Después">
                            <img
                                class="ba-image ba-image-before"
                                src="{{ asset('assets/img/antes-despues/silla-azul-despues.webp') }}"
                                alt="Silla antes de la limpieza"
                                width="800"
                                height="600"
                                loading="lazy"
                            >
                            <img
                                class="ba-image ba-image-after"
                                src="{{ asset('assets/img/antes-despues/silla-azul-antes.webp') }}"
                                alt="Silla después de la limpieza"
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
                                aria-label="Deslizar para comparar silla antes y después"
                            >
                        </div>
                    </div>

                    <div class="ba-info">
                        <span class="tag">Limpieza de sillas</span>
                        <h3>Sillas de oficina y comedor renovadas</h3>
                        <p>
                            Tratamiento especializado para telas, cuero y superficies
                            de uso diario.
                        </p>
                        <ol class="ba-steps">
                            <li>Aspirado profundo de la superficie.</li>
                            <li>Evaluación del tipo de tela.</li>
                            <li>Aplicación de shampoo especializado.</li>
                            <li>Extracción de humedad y suciedad.</li>
                            <li>Secado y revisión final.</li>
                        </ol>
                        <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de sillas">
                            Cotizar este servicio
                        </a>
                    </div>
                </div>

                {{-- Panel: Sofa --}}
                <div class="ba-panel" id="sofa" data-service="sofa">
                    <div class="ba-slider-wrap">
                        <div class="ba-slider" data-before="Antes" data-after="Después">
                            <img
                                class="ba-image ba-image-before"
                                src="{{ asset('assets/img/antes-despues/sofa-gris-despues.webp') }}"
                                alt="Sofa antes de la limpieza"
                                width="800"
                                height="600"
                                loading="lazy"
                            >
                            <img
                                class="ba-image ba-image-after"
                                src="{{ asset('assets/img/antes-despues/sofa-gris-antes.webp') }}"
                                alt="Sofa después de la limpieza"
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
                                aria-label="Deslizar para comparar Sofa antes y después"
                            >
                        </div>
                    </div>

                    <div class="ba-info">
                        <span class="tag">Limpieza de sofas</span>
                        <h3>Sofas como nuevos</h3>
                        <p>
                            Ideal para sofas de living, oficina o espera con manchas
                            o suciedad acumulada.
                        </p>
                        <ol class="ba-steps">
                            <li>Aspirado profundo de la superficie.</li>
                            <li>Evaluación del tipo de tela.</li>
                            <li>Aplicación de shampoo especializado.</li>
                            <li>Extracción de humedad y suciedad.</li>
                            <li>Secado y revisión final.</li>
                        </ol>
                        <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de sofas">
                            Cotizar este servicio
                        </a>
                    </div>
                </div>

                {{-- Panel: Mueble --}}
                <div class="ba-panel" id="mueble" data-service="mueble">
                    <div class="ba-slider-wrap">
                        <div class="ba-slider" data-before="Antes" data-after="Después">
                            <img
                                class="ba-image ba-image-before"
                                src="{{ asset('assets/img/antes-despues/muebles-despues.webp') }}"
                                alt="Mueble antes de la limpieza"
                                width="800"
                                height="600"
                                loading="lazy"
                            >
                            <img
                                class="ba-image ba-image-after"
                                src="{{ asset('assets/img/antes-despues/mueble-antes.webp') }}"
                                alt="Mueble después de la limpieza"
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
                                aria-label="Deslizar para comparar mueble antes y después"
                            >
                        </div>
                    </div>

                    <div class="ba-info">
                        <span class="tag">Limpieza de muebles</span>
                        <h3>Muebles tapizados renovados</h3>
                        <p>
                            Tratamiento adecuado según el tipo de material del mueble,
                            devolviendo su aspecto original.
                        </p>
                        <ol class="ba-steps">
                            <li>Aspirado profundo de la superficie.</li>
                            <li>Evaluación del tipo de tela.</li>
                            <li>Aplicación de shampoo especializado.</li>
                            <li>Extracción de humedad y suciedad.</li>
                            <li>Secado y revisión final.</li>
                        </ol>
                        <a href="#cotizar" class="btn btn-primary js-cotizar-btn" data-service="Limpieza de muebles">
                            Cotizar este servicio
                        </a>
                    </div>
                </div>

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
                            placeholder="Ej: Necesito lavado de 3 sofas de oficina, disponibilidad en la tarde."
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
                <h2>Estamos listos para ayudarte</h2>
                <p>
                    Atendemos en Talca, Maule, Curicó, San Rafael, Linares y San Clemente.
                    Escríbenos por Instagram o completa el formulario de cotización.
                </p>
            </div>

            <div class="contact-card">
                <h3>Datos de contacto</h3>
                <p>Teléfono / WhatsApp: +56 9 7712 2022</p>
                <p>Instagram: @siemprelimpiospa</p>
                <p>Horario: Lunes a viernes 09:00 - 21:00 hrs</p>
                <p>Sábado: 09:00 - 17:00 hrs</p>
                <p>Domingo: Cerrado</p>
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

</body>
</html>