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

        .admin-content { flex: 1; padding: 2.5rem; max-width: 900px; }
        .admin-content h2 { margin-top: 0; }

        .alert-success { background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
        .error-list { background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
        .error-list ul { margin: 0; padding-left: 1.2rem; }

        .field { margin-bottom: 1.5rem; display: flex; flex-direction: column; }
        label { font-weight: bold; margin-bottom: 0.5rem; color: var(--color-text); }
        input[type="text"], input[type="file"], textarea {
            padding: 0.8rem; border: 1px solid var(--color-border); border-radius: 8px; font-family: inherit; font-size: 1rem;
        }
        input:focus, textarea:focus { outline: none; border-color: var(--color-primary); }
        button[type="submit"] {
            background: var(--color-accent); color: white; border: none; padding: 1rem 2rem;
            border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 1rem;
        }
        button[type="submit"]:hover { background: var(--color-accent-dark); }

        .section-title { margin-top: 2rem; border-bottom: 2px solid var(--color-primary); padding-bottom: 0.5rem; color: var(--color-primary-deep); }
        .step-group, .img-group { background: var(--color-surface); padding: 1rem; border: 1px solid var(--color-border); border-radius: 8px; margin-bottom: 1rem; }
        .img-preview { max-width: 150px; margin-top: 0.5rem; border-radius: 6px; border: 1px solid var(--color-border); display: block; }
        .img-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .service-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .service-list { display: grid; gap: 1rem; }
        .service-item {
            display: flex; justify-content: space-between; align-items: center; padding: 1rem;
            background: white; border: 1px solid var(--color-border); border-radius: 8px;
        }
        .btn-edit { background: var(--color-primary); color: white; padding: 0.6rem 1.2rem; border-radius: 6px; text-decoration: none; font-weight: bold; }
        .btn-edit:hover { background: var(--color-primary-dark); }

        @media (max-width: 780px) {
            .admin-shell { flex-direction: column; }
            .admin-sidebar { width: 100%; padding: 1rem 0; }
            .admin-content { padding: 1.5rem; max-width: 100%; }
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
