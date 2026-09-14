@extends('layouts.admin')

@section('title', 'Inicio')

@section('content')
    <h2>Inicio</h2>
    <p class="page-intro">
        Esto es lo primero que ven tus clientes al entrar a tu página web: el título, la
        descripción y la foto principal de la portada.
    </p>

    <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-card">
            <h3 class="section-title">Encabezado</h3>

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
        </div>

        <div class="form-card">
            <h3 class="section-title">Foto principal</h3>

            <div class="field">
                <label>Foto de portada</label>
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

        <div class="sticky-actions">
            <button type="submit">Guardar cambios</button>
        </div>
    </form>
@endsection
