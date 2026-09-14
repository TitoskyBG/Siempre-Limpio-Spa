<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel') - Siempre Limpio SPA</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <style>
        :root {
            --color-bg: #ffffff;
            --color-surface: #f4f9fd;
            --color-border: #d8e8f2;
            --color-text: #143447;
            --color-text-soft: #5f7484;
            --color-primary: #4dbbe9;
            --color-primary-dark: #2d96c5;
            --color-primary-deep: #1c6f97;
            --color-accent: #19c18d;
            --color-accent-dark: #119168;
        }
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; background: var(--color-surface); color: var(--color-text); }

        .admin-shell { display: flex; min-height: 100vh; }

        .admin-sidebar {
            width: 260px; flex-shrink: 0; background: var(--color-text); color: white;
            display: flex; flex-direction: column; padding: 1.5rem 0;
        }
        .admin-sidebar .brand {
            display: flex; align-items: center; padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.12); margin-bottom: 1rem;
        }
        .admin-sidebar .brand img { height: 40px; }
        .admin-nav { list-style: none; margin: 0; padding: 0; flex: 1; }
        .admin-nav a {
            display: block; padding: 0.9rem 1.5rem; color: rgba(255,255,255,0.75);
            text-decoration: none; font-size: 0.92rem; border-left: 3px solid transparent;
        }
        .admin-nav a:hover { background: rgba(255,255,255,0.06); color: white; }
        .admin-nav a.is-active {
            background: rgba(77,187,233,0.15); color: white;
            border-left-color: var(--color-primary); font-weight: bold;
        }
        .admin-sidebar .logout-form { padding: 1rem 1.5rem 0; margin-top: 1rem; border-top: 1px solid rgba(255,255,255,0.12); }
        .btn-logout {
            background: transparent; border: 1px solid rgba(255,255,255,0.3); color: white;
            padding: 0.6rem 1rem; border-radius: 8px; cursor: pointer; width: 100%; font-size: 0.85rem;
        }
        .btn-logout:hover { background: rgba(255,255,255,0.1); }

        .admin-content { flex: 1; min-width: 0; width: 100%; padding: clamp(1.25rem, 3.5vw, 2.5rem); max-width: 1100px; }
        .admin-content h2 { margin-top: 0; }
        .page-intro { color: var(--color-text-soft); font-size: 0.95rem; line-height: 1.55; margin: -0.6rem 0 1.8rem; max-width: 640px; }

        .alert-success { background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
        .error-list { background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
        .error-list ul { margin: 0; padding-left: 1.2rem; }

        .field { margin-bottom: 1.5rem; display: flex; flex-direction: column; }
        label { font-weight: bold; margin-bottom: 0.5rem; color: var(--color-text); }
        .field-hint { font-weight: normal; color: var(--color-text-soft); font-size: 0.82rem; margin: 0.4rem 0 0; line-height: 1.4; }
        input[type="text"], input[type="file"], textarea {
            padding: 0.8rem; border: 1px solid var(--color-border); border-radius: 8px; font-family: inherit; font-size: 1rem;
        }
        input:focus, textarea:focus { outline: none; border-color: var(--color-primary); box-shadow: 0 0 0 3px rgba(77,187,233,0.15); }

        .sticky-actions {
            position: sticky; bottom: 0; display: flex; align-items: center; gap: 1rem;
            background: linear-gradient(to top, var(--color-surface) 65%, transparent);
            padding: 1.3rem 0 0.6rem; margin-top: 0.5rem;
        }
        button[type="submit"] {
            background: var(--color-accent); color: white; border: none; padding: 1rem 2rem;
            border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 1rem;
            box-shadow: 0 6px 16px rgba(25,193,141,0.3);
        }
        button[type="submit"]:hover { background: var(--color-accent-dark); }
        .btn-cancel {
            color: var(--color-text-soft); text-decoration: none; font-weight: bold; font-size: 0.92rem;
            padding: 1rem 0.5rem;
        }
        .btn-cancel:hover { color: var(--color-text); }

        .form-card {
            background: white; border: 1px solid var(--color-border); border-radius: 14px;
            padding: 1.6rem; margin-bottom: 1.8rem;
        }
        .form-card > .section-title { margin-top: 0; }
        .section-title {
            margin-top: 2rem; padding-bottom: 0.5rem; color: var(--color-primary-deep);
            display: flex; align-items: center; gap: 0.6rem; font-size: 1.05rem;
        }
        .section-title .step-count {
            font-weight: normal; font-size: 0.78rem; color: var(--color-text-soft);
            background: var(--color-surface); padding: 0.2rem 0.6rem; border-radius: 999px;
        }

        .step-group { display: flex; align-items: flex-start; gap: 0.9rem; padding: 0.6rem 0; }
        .step-group .field { flex: 1; margin-bottom: 0; }
        .step-badge {
            flex-shrink: 0; width: 30px; height: 30px; border-radius: 50%; background: var(--color-primary);
            color: white; display: flex; align-items: center; justify-content: center;
            font-weight: bold; font-size: 0.85rem; margin-top: 0.35rem;
        }

        .img-group { background: var(--color-surface); padding: 1.1rem; border: 1px solid var(--color-border); border-radius: 10px; margin-bottom: 1rem; }
        .img-role {
            display: inline-block; background: white; color: var(--color-primary-deep); font-size: 0.75rem;
            font-weight: bold; padding: 0.25rem 0.7rem; border-radius: 999px; margin-bottom: 0.7rem; border: 1px solid var(--color-border);
        }
        .img-preview { max-width: 100%; width: 180px; margin-top: 0.6rem; border-radius: 8px; border: 1px solid var(--color-border); display: block; }
        .img-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .service-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .service-card-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem; }
        .service-card {
            background: white; border: 1px solid var(--color-border); border-radius: 14px; overflow: hidden;
            text-decoration: none; color: inherit; display: flex; flex-direction: column;
            transition: box-shadow 0.15s ease, transform 0.15s ease;
        }
        /* La grilla ya estira cada tarjeta a la altura de la fila (align-items: stretch por
           defecto en CSS Grid); al ser esta tarjeta un flex-column con .card-body en flex:1,
           el botón "Editar" queda siempre anclado abajo sin importar cuánto texto tenga cada una. */
        .service-card:hover { box-shadow: 0 12px 28px rgba(20,52,71,0.16); transform: translateY(-3px); }
        .service-card .thumb { width: 100%; aspect-ratio: 4 / 3; object-fit: cover; display: block; background: var(--color-surface); }
        .service-card .card-body { padding: 1.3rem 1.4rem; flex: 1; }
        .service-card .card-tag {
            color: var(--color-primary-deep); font-size: 0.76rem; font-weight: bold;
            text-transform: uppercase; letter-spacing: 0.04em;
        }
        .service-card .card-title { font-size: 1.05rem; margin: 0.45rem 0 0; color: var(--color-text); line-height: 1.4; }
        .service-card .card-cta {
            color: white; background: var(--color-primary); font-size: 0.9rem; font-weight: bold;
            padding: 0.85rem 0; text-align: center;
        }
        .service-card:hover .card-cta { background: var(--color-primary-dark); }

        @media (max-width: 780px) {
            .admin-shell { flex-direction: column; }
            .admin-sidebar { width: 100%; padding: 1rem 0; }
            .img-grid, .service-grid { grid-template-columns: 1fr; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <div class="brand">
                <img src="{{ asset('assets/img/logo/logo-nav.png') }}" alt="Siempre Limpio SPA">
            </div>

            <ul class="admin-nav">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                        Inicio del panel
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">
                        Inicio y Contacto
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orbit.edit') }}" class="{{ request()->routeIs('admin.orbit.*') ? 'is-active' : '' }}">
                        Servicios Principales
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.featured.index') }}" class="{{ request()->routeIs('admin.featured.*') ? 'is-active' : '' }}">
                        Servicios Destacados
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.before-after.index') }}" class="{{ request()->routeIs('admin.before-after.*') ? 'is-active' : '' }}">
                        Antes y Después
                    </a>
                </li>
            </ul>

            <form action="{{ route('admin.logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">Cerrar sesión</button>
            </form>
        </aside>

        <main class="admin-content">
            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="error-list">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
