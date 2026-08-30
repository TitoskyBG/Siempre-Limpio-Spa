<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Siempre Limpio SPA</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f9fd; margin: 0; padding: 2rem; }
        .dashboard { max-width: 800px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 2rem; }
        .menu-list { list-style: none; padding: 0; }
        .menu-list li { margin-bottom: 1rem; }
        .menu-list a { display: block; padding: 1rem; background: #f9fcfe; border: 1px solid #d8e8f2; text-decoration: none; color: #143447; border-radius: 8px; font-weight: bold; }
        .menu-list a:hover { background: #edf6fc; }
        .btn-logout { background: transparent; border: none; color: red; cursor: pointer; text-decoration: underline; font-size: 1rem; }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <h2>Bienvenido, {{ Auth::user()->name }}</h2>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Cerrar sesión</button>
            </form>
        </div>
        
        <h3>Contenido del sitio</h3>
        <ul class="menu-list">
            <li><a href="#">Editar Inicio (Hero) y Contacto</a></li>
            <li><a href="#">Editar Servicios Principales (Órbita)</a></li>
            <li><a href="#">Editar Servicios Destacados</a></li>
            <li><a href="#">Editar Antes y Después</a></li>
        </ul>
    </div>
</body>
</html>