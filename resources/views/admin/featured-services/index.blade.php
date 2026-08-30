<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Destacados</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f9fd; margin: 0; padding: 2rem; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 2rem; }
        .service-list { display: grid; gap: 1rem; }
        .service-item { display: flex; justify-content: space-between; align-items: center; padding: 1rem; background: #f9fcfe; border: 1px solid #d8e8f2; border-radius: 8px; }
        .btn-edit { background: #4dbbe9; color: white; padding: 0.6rem 1.2rem; border-radius: 6px; text-decoration: none; font-weight: bold; }
        .btn-back { text-decoration: none; color: #4dbbe9; font-weight: bold; }
        .alert-success { background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Servicios Destacados</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn-back">Volver al Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="service-list">
            @foreach($services as $service)
                <div class="service-item">
                    <div>
                        <strong>{{ $service->tag }}</strong>
                        <p style="margin: 0.2rem 0 0; color: #5f7484; font-size: 0.9rem;">{{ $service->title }}</p>
                    </div>
                    <a href="{{ route('admin.featured.edit', $service->id) }}" class="btn-edit">Editar</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>