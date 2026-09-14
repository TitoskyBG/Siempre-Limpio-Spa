<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración') - Siempre Limpio SPA</title>
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
            --color-accent: #19c18d;
            --color-accent-dark: #119168;
        }
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(160deg, var(--color-surface), var(--color-bg));
            display: flex; justify-content: center; align-items: center;
            min-height: 100vh; margin: 0; padding: 1.5rem;
        }
        .auth-card {
            background: white; padding: 2.5rem; border-radius: 16px;
            box-shadow: 0 15px 35px rgba(20, 52, 71, 0.12); width: 100%; max-width: 420px;
        }
        .auth-logo { display: block; margin: 0 auto 1.5rem; height: 56px; }
        .auth-card h2 { color: var(--color-text); text-align: center; margin: 0 0 0.4rem; }
        .auth-subtitle { color: var(--color-text-soft); text-align: center; font-size: 0.9rem; margin: 0 0 1.8rem; }
        .field { margin-bottom: 1.2rem; display: flex; flex-direction: column; }
        label { font-weight: bold; margin-bottom: 0.5rem; color: var(--color-text); font-size: 0.9rem; }
        input[type="email"], input[type="password"], input[type="text"] {
            padding: 0.8rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;
        }
        input:focus { outline: none; border-color: var(--color-primary); }
        .btn-submit {
            background: var(--color-accent); color: white; border: none; padding: 1rem;
            border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%; font-size: 1rem;
        }
        .btn-submit:hover { background: var(--color-accent-dark); }
        .auth-links { text-align: center; margin-top: 1.2rem; font-size: 0.9rem; }
        .auth-links a { color: var(--color-primary-dark); text-decoration: none; font-weight: bold; }
        .auth-links a:hover { text-decoration: underline; }
        .alert-error { background: #f8d7da; color: #721c24; padding: 0.9rem; border-radius: 8px; margin-bottom: 1.2rem; font-size: 0.9rem; }
        .alert-success { background: #d4edda; color: #155724; padding: 0.9rem; border-radius: 8px; margin-bottom: 1.2rem; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="auth-card">
        <img src="{{ asset('assets/img/logo/logo-nav.png') }}" alt="Siempre Limpio SPA" class="auth-logo">
        @yield('content')
    </div>
</body>
</html>
