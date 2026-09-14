@extends('layouts.admin')

@section('title', 'Editar Servicio Destacado')

@section('content')
    <p><a href="{{ route('admin.featured.index') }}" style="color: var(--color-primary-dark); font-weight: bold; text-decoration: none;">&larr; Volver a Servicios Destacados</a></p>
    <h2>{{ $featuredService->tag }}</h2>
    <p class="page-intro">
        Completa la información tal como se mostrará a tus clientes: una etiqueta corta, un título
        llamativo, la descripción, los pasos del proceso y las fotos del trabajo.
    </p>

    <form action="{{ route('admin.featured.update', $featuredService->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-card">
            <h3 class="section-title">Información general</h3>

            <div class="field">
                <label>Etiqueta destacada</label>
                <input type="text" name="tag" value="{{ old('tag', $featuredService->tag) }}" required>
                <p class="field-hint">Frase corta que aparece sobre el título. Ej: "Lavado de alfombras".</p>
            </div>
            <div class="field">
                <label>Título del servicio</label>
                <input type="text" name="title" value="{{ old('title', $featuredService->title) }}" required>
            </div>
            <div class="field">
                <label>Descripción</label>
                <textarea name="description" rows="4" required>{{ old('description', $featuredService->description) }}</textarea>
            </div>
        </div>

        <div class="form-card">
            <h3 class="section-title">Pasos del proceso <span class="step-count">deben ser exactamente 6</span></h3>
            <p class="field-hint" style="margin-top: -0.6rem; margin-bottom: 1.2rem;">Se muestran en tu página en este mismo orden.</p>

            @php $steps = $featuredService->steps; @endphp
            @for($i = 0; $i < 6; $i++)
                <div class="step-group">
                    <span class="step-badge">{{ $i + 1 }}</span>
                    <div class="field">
                        <input type="text" name="steps[]" value="{{ old('steps.'.$i, $steps[$i]->description ?? '') }}" required>
                    </div>
                </div>
            @endfor
        </div>

        <div class="form-card">
            <h3 class="section-title">Fotos del servicio</h3>
            <p class="field-hint" style="margin-top: -0.6rem; margin-bottom: 1.2rem;">
                La primera es la foto grande y principal. Las otras tres son miniaturas que el cliente puede
                seleccionar para verlas en grande.
            </p>

            @php
                $images = $featuredService->images->sortBy(fn($img) => $img->is_main ? 0 : 1)->values();
                $roleLabels = ['Foto principal (grande)', 'Miniatura 1', 'Miniatura 2', 'Miniatura 3'];
            @endphp

            @for($i = 0; $i < 4; $i++)
                <div class="img-group">
                    <span class="img-role">{{ $roleLabels[$i] }}</span>
                    <div class="field" style="margin-top: 0.5rem;">
                        <label>Subir nueva foto</label>
                        <input type="file" name="images[{{ $i }}]" accept=".jpg,.jpeg,.png,.webp">
                        <p class="field-hint">Opcional, solo si quieres reemplazarla. Máximo 5MB.</p>
                        @if(isset($images[$i]))
                            <img src="{{ filter_var($images[$i]->image_path, FILTER_VALIDATE_URL) || str_starts_with($images[$i]->image_path, 'assets/') ? asset($images[$i]->image_path) : asset('storage/' . $images[$i]->image_path) }}" class="img-preview">
                        @endif
                    </div>
                    <div class="field" style="margin-bottom: 0;">
                        <label>Descripción de la foto (para lectores de pantalla)</label>
                        <input type="text" name="alt_texts[{{ $i }}]" value="{{ old('alt_texts.'.$i, $images[$i]->alt_text ?? '') }}" required>
                    </div>
                </div>
            @endfor
        </div>

        <div class="sticky-actions">
            <button type="submit">Guardar cambios</button>
            <a href="{{ route('admin.featured.index') }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
@endsection
