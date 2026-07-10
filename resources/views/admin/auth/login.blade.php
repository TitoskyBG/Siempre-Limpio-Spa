<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso interno | Siempre Limpio SPA</title>
    <style>
        :root {
            --bg: #f4f9fd;
            --card: #ffffff;
            --text: #16384a;
            --muted: #607786;
            --primary: #4dbbe9;
            --primary-dark: #2d96c5;
            --border: #d7e7f1;
            --danger: #c0392b;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: linear-gradient(180deg, #f8fcff 0%, var(--bg) 100%);
            font-family: Arial, sans-serif;
            color: var(--text);
            padding: 1.5rem;
        }

        .login-card {
            width: min(100%, 420px);
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: 0 18px 40px rgba(22, 56, 74, 0.08);
        }

        .login-card h1 {
            margin: 0 0 0.6rem;
            font-size: 2rem;
        }

        .login-card p {
            margin: 0 0 1.5rem;
            color: var(--muted);
        }

        .field {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.45rem;
            font-weight: 700;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            min-height: 48px;
            padding: 0.85rem 1rem;
            border: 1px solid var(--border);
            border-radius: 14px;
            outline: none;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(77, 187, 233, 0.18);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            margin: 0.5rem 0 1.2rem;
            color: var(--muted);
        }

        .btn {
            width: 100%;
            min-height: 50px;
            border: none;
            border-radius: 999px;
            background: var(--primary);
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover {
            background: var(--primary-dark);
        }

        .error-text {
            color: var(--danger);
            font-size: 0.92rem;
            margin-top: 0.4rem;
        }

        .back-link {
            display: inline-block;
            margin-top: 1.2rem;
            color: var(--muted);
            text-decoration: none;
        }

        .back-link:hover {
            color: var(--primary-dark);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Acceso interno</h1>
        <p>Ingreso para administración y gestión de la empresa.</p>

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="field">
                <label for="email">Correo electrónico</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </div>

            <label class="remember">
                <input type="checkbox" name="remember">
                <span>Recordar sesión</span>
            </label>

            <button type="submit" class="btn">Ingresar</button>
        </form>

        <a href="{{ route('home') }}" class="back-link">Volver al sitio público</a>
    </div>
</body>
</html>