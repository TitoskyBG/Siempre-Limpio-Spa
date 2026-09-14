@extends('layouts.admin')

@section('title', 'Editar Antes y Después')

@section('content')
    <h2>Editar: {{ $beforeAfterItem->tab_name }}</h2>
    <p><a href="{{ route('admin.before-after.index') }}" style="color: var(--color-primary-dark); font-weight: bold; text-decoration: none;">&larr; Volver a la lista</a></p>

    <form action="{{ route('admin.before-after.update', $beforeAfterItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="field">
            <label>Etiqueta (Tag)</label>
            <input type="text" name="tag" value="{{ old('tag', $beforeAfterItem->tag) }}" required>
        </div>
        <div class="field">
            <label>Título</label>
            <input type="text" name="title" value="{{ old('title', $beforeAfterItem->title) }}" required>
        </div>
        <div class="field">
            <label>Descripción</label>
            <textarea name="description" rows="4" required>{{ old('description', $beforeAfterItem->description) }}</textarea>
        </div>

        <h3 class="section-title">Los 5 Pasos Exactos</h3>
        @php $steps = $beforeAfterItem->steps; @endphp
        @for($i = 0; $i < 5; $i++)
            <div class="step-group">
                <div class="field" style="margin-bottom: 0;">
                    <label>Paso {{ $i + 1 }}</label>
                    <input type="text" name="steps[]" value="{{ old('steps.'.$i, $steps[$i]->description ?? '') }}" required>
                </div>
            </div>
        @endfor

        <h3 class="section-title">Fotos de Comparación</h3>
        <div class="img-grid">
            <div class="img-group">
                <strong>Foto Antes</strong>
                <div class="field" style="margin-top: 0.5rem;">
                    <label>Subir nueva imagen (Opcional, máx 5MB)</label>
                    <input type="file" name="photo_antes" accept=".jpg,.jpeg,.png,.webp">
                    @if($beforeAfterItem->image_after_path)
                        <img src="{{ str_starts_with($beforeAfterItem->image_after_path, 'assets/') || filter_var($beforeAfterItem->image_after_path, FILTER_VALIDATE_URL) ? asset($beforeAfterItem->image_after_path) : asset('storage/' . $beforeAfterItem->image_after_path) }}" class="img-preview">
                    @endif
                </div>
                <div class="field" style="margin-bottom: 0;">
                    <label>Texto alternativo (Alt)</label>
                    <input type="text" name="alt_antes" value="{{ old('alt_antes', $beforeAfterItem->image_after_alt) }}" required>
                </div>
            </div>

            <div class="img-group">
                <strong>Foto Después</strong>
                <div class="field" style="margin-top: 0.5rem;">
                    <label>Subir nueva imagen (Opcional, máx 5MB)</label>
                    <input type="file" name="photo_despues" accept=".jpg,.jpeg,.png,.webp">
                    @if($beforeAfterItem->image_before_path)
                        <img src="{{ str_starts_with($beforeAfterItem->image_before_path, 'assets/') || filter_var($beforeAfterItem->image_before_path, FILTER_VALIDATE_URL) ? asset($beforeAfterItem->image_before_path) : asset('storage/' . $beforeAfterItem->image_before_path) }}" class="img-preview">
                    @endif
                </div>
                <div class="field" style="margin-bottom: 0;">
                    <label>Texto alternativo (Alt)</label>
                    <input type="text" name="alt_despues" value="{{ old('alt_despues', $beforeAfterItem->image_before_alt) }}" required>
                </div>
            </div>
        </div>

        <button type="submit" style="margin-top: 1rem;">Guardar Cambios</button>
    </form>
@endsection
