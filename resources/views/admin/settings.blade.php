@extends('layouts.admin')

@section('title', 'Inicio y Contacto')

@section('content')
    <h2>Inicio y Contacto</h2>
    <p class="page-intro">
        Aquí editas lo primero que ven tus clientes al entrar a tu página web (la portada)
        y los datos de contacto que aparecen al final del sitio.
    </p>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-card">
            <h3 class="section-title">Portada (Inicio)</h3>

            <div class="field">
                <label>Etiqueta destacada</label>
                <input type="text" name="hero_tag" value="{{ old('hero_tag', $settings['hero_tag'] ?? '') }}" required>
                <p class="field-hint">Frase corta que aparece arriba del título principal. Ej: "Servicios de limpieza y mantención".</p>
            </div>
            <div class="field">
                <label>Título principal</label>
                <input type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" required>
                <p class="field-hint">Lo primero y más grande que leen tus visitantes al entrar.</p>
            </div>
            <div class="field">
                <label>Descripción</label>
                <textarea name="hero_description" rows="4" required>{{ old('hero_description', $settings['hero_description'] ?? '') }}</textarea>
                <p class="field-hint">Un párrafo breve que explica qué hace tu empresa.</p>
            </div>

            <div class="field">
                <label>Foto principal de la portada</label>
                <input type="file" name="hero_image" accept=".jpg,.jpeg,.png,.webp">
                <p class="field-hint">Opcional. Formatos JPG, PNG o WEBP, máximo 5MB.</p>
                @if(isset($settings['hero_image_path']))
                    <img src="{{ asset('storage/' . $settings['hero_image_path']) }}" class="img-preview" alt="Vista previa">
                @endif
            </div>

            <div class="field">
                <label>Texto bajo la foto</label>
                <input type="text" name="hero_image_caption" value="{{ old('hero_image_caption', $settings['hero_image_caption'] ?? '') }}" required>
                <p class="field-hint">Frase corta que acompaña a la imagen principal.</p>
            </div>
            <div class="field">
                <label>Descripción de la foto (para lectores de pantalla)</label>
                <input type="text" name="hero_image_alt" value="{{ old('hero_image_alt', $settings['hero_image_alt'] ?? '') }}" required>
                <p class="field-hint">Describe la imagen en pocas palabras. Ayuda a personas con discapacidad visual y a que Google entienda tu página.</p>
            </div>
        </div>

        <div class="form-card">
            <h3 class="section-title">Contacto</h3>

            <div class="field">
                <label>Título de la sección</label>
                <input type="text" name="contact_title" value="{{ old('contact_title', $settings['contact_title'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Descripción y zonas donde trabajas</label>
                <textarea name="contact_description" rows="3" required>{{ old('contact_description', $settings['contact_description'] ?? '') }}</textarea>
            </div>
            <div class="field">
                <label>Teléfono / WhatsApp</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Usuario de Instagram</label>
                <input type="text" name="contact_instagram" value="{{ old('contact_instagram', $settings['contact_instagram'] ?? '') }}" required>
                <p class="field-hint">Ej: @siemprelimpiospa</p>
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
        </div>

        <div class="sticky-actions">
            <button type="submit">Guardar cambios</button>
        </div>
    </form>
@endsection
