<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inicio y Contacto</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f9fd; margin: 0; padding: 2rem; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 2rem; }
        .field { margin-bottom: 1.5rem; display: flex; flex-direction: column; }
        label { font-weight: bold; margin-bottom: 0.5rem; color: #143447; }
        input[type="text"], input[type="file"], textarea { padding: 0.8rem; border: 1px solid #ccc; border-radius: 8px; font-family: inherit; }
        button { background: #19c18d; color: white; border: none; padding: 1rem 2rem; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 1rem; }
        .btn-back { text-decoration: none; color: #4dbbe9; font-weight: bold; }
        .alert-success { background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
        .error-list { background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
        .section-title { margin-top: 2rem; border-bottom: 2px solid #4dbbe9; padding-bottom: 0.5rem; color: #1c6f97; }
        .img-preview { max-width: 300px; margin-top: 1rem; border-radius: 8px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Editar Inicio (Hero) y Contacto</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn-back">Volver al Dashboard</a>
        </div>

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

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="section-title">Sección: Inicio (Hero)</h3>
            
            <div class="field">
                <label>Etiqueta superior</label>
                <input type="text" name="hero_tag" value="{{ old('hero_tag', $settings['hero_tag'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Título principal</label>
                <input type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Descripción</label>
                <textarea name="hero_description" rows="4" required>{{ old('hero_description', $settings['hero_description'] ?? '') }}</textarea>
            </div>
            
            <div class="field">
                <label>Imagen Principal (Máx 5MB, 2400x2400px. Opcional)</label>
                <input type="file" name="hero_image" accept=".jpg,.jpeg,.png,.webp">
                @if(isset($settings['hero_image_path']))
                    <img src="{{ asset('storage/' . $settings['hero_image_path']) }}" class="img-preview" alt="Vista previa">
                @endif
            </div>

            <div class="field">
                <label>Texto breve bajo la imagen</label>
                <input type="text" name="hero_image_caption" value="{{ old('hero_image_caption', $settings['hero_image_caption'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Texto alternativo de la imagen (Alt)</label>
                <input type="text" name="hero_image_alt" value="{{ old('hero_image_alt', $settings['hero_image_alt'] ?? '') }}" required>
            </div>

            <h3 class="section-title">Sección: Contacto</h3>

            <div class="field">
                <label>Título</label>
                <input type="text" name="contact_title" value="{{ old('contact_title', $settings['contact_title'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Descripción y Zonas de cobertura</label>
                <textarea name="contact_description" rows="3" required>{{ old('contact_description', $settings['contact_description'] ?? '') }}</textarea>
            </div>
            <div class="field">
                <label>Teléfono / WhatsApp</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Instagram</label>
                <input type="text" name="contact_instagram" value="{{ old('contact_instagram', $settings['contact_instagram'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Horario Lunes a Viernes</label>
                <input type="text" name="contact_hours_weekday" value="{{ old('contact_hours_weekday', $settings['contact_hours_weekday'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Horario Sábado</label>
                <input type="text" name="contact_hours_saturday" value="{{ old('contact_hours_saturday', $settings['contact_hours_saturday'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Horario Domingo</label>
                <input type="text" name="contact_hours_sunday" value="{{ old('contact_hours_sunday', $settings['contact_hours_sunday'] ?? '') }}" required>
            </div>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>