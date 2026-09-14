@extends('layouts.admin')

@section('title', 'Inicio y Contacto')

@section('content')
    <h2>Editar Inicio (Hero) y Contacto</h2>

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
@endsection
