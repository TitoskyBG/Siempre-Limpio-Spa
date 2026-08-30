<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Órbita</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f9fd; margin: 0; padding: 2rem; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 2rem; }
        .field { margin-bottom: 1.5rem; display: flex; flex-direction: column; }
        label { font-weight: bold; margin-bottom: 0.5rem; color: #143447; }
        input[type="text"], input[type="file"], textarea { padding: 0.8rem; border: 1px solid #ccc; border-radius: 8px; }
        button { background: #19c18d; color: white; border: none; padding: 1rem 2rem; border-radius: 8px; cursor: pointer; font-weight: bold; }
        .btn-back { text-decoration: none; color: #4dbbe9; font-weight: bold; }
        .alert-success { background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
        .section-title { margin-top: 2rem; border-bottom: 2px solid #4dbbe9; padding-bottom: 0.5rem; color: #1c6f97; }
        .service-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .img-preview { max-width: 150px; margin-top: 1rem; border-radius: 8px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Editar Servicios Principales (Órbita)</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn-back">Volver al Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.orbit.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <h3 class="section-title">Centro de la Órbita</h3>
            <div class="field">
                <label>Descripción de la sección</label>
                <textarea name="orbit_description" rows="3" required>{{ old('orbit_description', $settings['orbit_description'] ?? 'Ofrecemos servicios de limpieza profesional ejecutados bajo los más altos estándares de calidad, asegurando un entorno impecable y la máxima satisfacción en cada trabajo.') }}</textarea>
            </div>
            <div class="field">
                <label>Imagen Central (Máx 5MB. Opcional)</label>
                <input type="file" name="orbit_image" accept=".jpg,.jpeg,.png,.webp">
                @if(isset($settings['orbit_image_path']))
                    <img src="{{ asset('storage/' . $settings['orbit_image_path']) }}" class="img-preview">
                @endif
            </div>
            <div class="field">
                <label>Texto alternativo de la imagen (Alt)</label>
                <input type="text" name="orbit_image_alt" value="{{ old('orbit_image_alt', $settings['orbit_image_alt'] ?? 'Equipo de Siempre Limpio SPA realizando un servicio de limpieza') }}" required>
            </div>

            <h3 class="section-title">Los 6 Servicios Fijos</h3>
            <div class="service-grid">
                @foreach(['top-left' => 'Arriba Izquierda', 'top-right' => 'Arriba Derecha', 'middle-left' => 'Medio Izquierda', 'middle-right' => 'Medio Derecha', 'bottom-left' => 'Abajo Izquierda', 'bottom-right' => 'Abajo Derecha'] as $pos => $label)
                    <div class="field">
                        <label>{{ $label }}</label>
                        <input type="text" name="services[{{ $pos }}]" value="{{ old('services.'.$pos, $services[$pos]->name ?? '') }}" required>
                    </div>
                @endforeach
            </div>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>