<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Siempre Limpio SPA</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f9fd;
            color: #16384a;
        }

        .wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            background: white;
            border-radius: 20px;
            padding: 1.2rem 1.5rem;
            box-shadow: 0 10px 30px rgba(22, 56, 74, 0.08);
        }

        .logout-btn {
            border: none;
            background: #4dbbe9;
            color: white;
            padding: 0.8rem 1.2rem;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 700;
        }

        .panel {
            margin-top: 1.5rem;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(22, 56, 74, 0.08);
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="topbar">
            <div>
                <h1>Panel administrativo</h1>
                <p>Acceso protegido para gestión interna.</p>
            </div>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Cerrar sesión</button>
            </form>
        </div>

        <div class="panel">
            <p>Bienvenido al dashboard base de Siempre Limpio SPA.</p>
            <p>Aquí construiremos luego inventario, personal, clientes y servicios.</p>
        </div>
    </div>
</body>
</html>