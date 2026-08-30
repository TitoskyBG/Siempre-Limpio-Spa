<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Siempre Limpio SPA</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f9fd; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .field { margin-bottom: 1rem; display: flex; flex-direction: column; }
        input { padding: 0.8rem; border: 1px solid #ccc; border-radius: 8px; margin-top: 0.5rem; }
        button { background: #4dbbe9; color: white; border: none; padding: 1rem; border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%; }
        .error { color: red; font-size: 0.9rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Panel de Administración</h2>
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="field">
                <label>Correo electrónico</label>
                <input type="email" name="email" required>
            </div>
            <div class="field">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>