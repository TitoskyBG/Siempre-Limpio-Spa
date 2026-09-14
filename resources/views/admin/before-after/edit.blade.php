@extends('layouts.admin')

@section('title', 'Editar Antes y Después')

@section('content')
    <p><a href="{{ route('admin.before-after.index') }}" style="color: var(--color-primary-dark); font-weight: bold; text-decoration: none;">&larr; Volver a Antes y Después</a></p>
    <h2>{{ $beforeAfterItem->tab_name }}</h2>
    <p class="page-intro">
        Sube la foto de cómo se veía antes del servicio y cómo quedó después. Se muestran en un
        control deslizante para que tus clientes comparen el resultado.
    </p>

    <form action="{{ route('admin.before-after.update', $beforeAfterItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-card">
            <h3 class="section-title">Información general</h3>

            <div class="field">
                <label>Etiqueta destacada</label>
                <input type="text" name="tag" value="{{ old('tag', $beforeAfterItem->tag) }}" required>
                <p class="field-hint">Frase corta que aparece sobre el título. Ej: "Lavado y encerado de pisos".</p>
            </div>
            <div class="field">
                <label>Título</label>
                <input type="text" name="title" value="{{ old('title', $beforeAfterItem->title) }}" required>
            </div>
            <div class="field">
                <label>Descripción</label>
                <textarea name="description" rows="4" required>{{ old('description', $beforeAfterItem->description) }}</textarea>
            </div>
        </div>

        <div class="form-card">
            <h3 class="section-title">Pasos del proceso <span class="step-count">deben ser exactamente 5</span></h3>
            <p class="field-hint" style="margin-top: -0.6rem; margin-bottom: 1.2rem;">Se muestran en tu página en este mismo orden.</p>

            @php $steps = $beforeAfterItem->steps; @endphp
            @for($i = 0; $i < 5; $i++)
                <div class="step-group">
                    <span class="step-badge">{{ $i + 1 }}</span>
                    <div class="field">
                        <input type="text" name="steps[]" value="{{ old('steps.'.$i, $steps[$i]->description ?? '') }}" required>
                    </div>
                </div>
            @endfor
        </div>

        <div class="form-card">
            <h3 class="section-title">Fotos de comparación</h3>
            <div class="img-grid">
                <div class="img-group">
                    <span class="img-role">Foto "Antes"</span>
                    <p class="field-hint" style="margin-top: 0.5rem;">Cómo se veía antes de tu servicio.</p>
                    <div class="field" style="margin-top: 0.5rem;">
                        <label>Subir nueva foto</label>
                        <input type="file" name="photo_antes" accept=".jpg,.jpeg,.png,.webp">
                        <p class="field-hint">Opcional, solo si quieres reemplazarla. Máximo 5MB.</p>
                        @if($beforeAfterItem->image_after_path)
                            <img src="{{ str_starts_with($beforeAfterItem->image_after_path, 'assets/') || filter_var($beforeAfterItem->image_after_path, FILTER_VALIDATE_URL) ? asset($beforeAfterItem->image_after_path) : asset('storage/' . $beforeAfterItem->image_after_path) }}" class="img-preview">
                        @endif
                    </div>
                    <div class="field" style="margin-bottom: 0;">
                        <label>Descripción de la foto (para lectores de pantalla)</label>
                        <input type="text" name="alt_antes" value="{{ old('alt_antes', $beforeAfterItem->image_after_alt) }}" required>
                    </div>
                </div>

                <div class="img-group">
                    <span class="img-role">Foto "Después"</span>
                    <p class="field-hint" style="margin-top: 0.5rem;">Cómo quedó después de tu servicio: la que más impresiona a tus clientes.</p>
                    <div class="field" style="margin-top: 0.5rem;">
                        <label>Subir nueva foto</label>
                        <input type="file" name="photo_despues" accept=".jpg,.jpeg,.png,.webp">
                        <p class="field-hint">Opcional, solo si quieres reemplazarla. Máximo 5MB.</p>
                        @if($beforeAfterItem->image_before_path)
                            <img src="{{ str_starts_with($beforeAfterItem->image_before_path, 'assets/') || filter_var($beforeAfterItem->image_before_path, FILTER_VALIDATE_URL) ? asset($beforeAfterItem->image_before_path) : asset('storage/' . $beforeAfterItem->image_before_path) }}" class="img-preview">
                        @endif
                    </div>
                    <div class="field" style="margin-bottom: 0;">
                        <label>Descripción de la foto (para lectores de pantalla)</label>
                        <input type="text" name="alt_despues" value="{{ old('alt_despues', $beforeAfterItem->image_before_alt) }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="sticky-actions">
            <button type="submit">Guardar cambios</button>
            <a href="{{ route('admin.before-after.index') }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
@endsection
