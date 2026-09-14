@extends('layouts.admin')

@section('title', 'Editar Servicio Destacado')

@section('content')
    <h2>Editar Servicio: {{ $featuredService->tag }}</h2>
    <p><a href="{{ route('admin.featured.index') }}" style="color: var(--color-primary-dark); font-weight: bold; text-decoration: none;">&larr; Volver a la lista</a></p>

    <form action="{{ route('admin.featured.update', $featuredService->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="field">
            <label>Etiqueta (Tag)</label>
            <input type="text" name="tag" value="{{ old('tag', $featuredService->tag) }}" required>
        </div>
        <div class="field">
            <label>Título</label>
            <input type="text" name="title" value="{{ old('title', $featuredService->title) }}" required>
        </div>
        <div class="field">
            <label>Descripción</label>
            <textarea name="description" rows="4" required>{{ old('description', $featuredService->description) }}</textarea>
        </div>

        <h3 class="section-title">Los 6 Pasos Exactos</h3>
        @php $steps = $featuredService->steps; @endphp
        @for($i = 0; $i < 6; $i++)
            <div class="step-group">
                <div class="field" style="margin-bottom: 0;">
                    <label>Paso {{ $i + 1 }}</label>
                    <input type="text" name="steps[]" value="{{ old('steps.'.$i, $steps[$i]->description ?? '') }}" required>
                </div>
            </div>
        @endfor

        <h3 class="section-title">Las 4 Imágenes de la Galería</h3>
        <p style="color: var(--color-text-soft); font-size: 0.9rem;">La primera imagen será la principal (grande). Las siguientes tres actuarán como miniaturas interactivas para tu script `featured-gallery.js`.</p>

        @php
            $images = $featuredService->images->sortBy(fn($img) => $img->is_main ? 0 : 1)->values();
        @endphp

        @for($i = 0; $i < 4; $i++)
            <div class="img-group">
                <strong>{{ $i === 0 ? 'Imagen Principal (Grande)' : 'Miniatura ' . $i }}</strong>
                <div class="field" style="margin-top: 0.5rem;">
                    <label>Subir nueva imagen (Opcional, máx 5MB)</label>
                    <input type="file" name="images[{{ $i }}]" accept=".jpg,.jpeg,.png,.webp">
                    @if(isset($images[$i]))
                        <img src="{{ filter_var($images[$i]->image_path, FILTER_VALIDATE_URL) || str_starts_with($images[$i]->image_path, 'assets/') ? asset($images[$i]->image_path) : asset('storage/' . $images[$i]->image_path) }}" class="img-preview">
                    @endif
                </div>
                <div class="field" style="margin-bottom: 0;">
                    <label>Texto alternativo (Alt)</label>
                    <input type="text" name="alt_texts[{{ $i }}]" value="{{ old('alt_texts.'.$i, $images[$i]->alt_text ?? '') }}" required>
                </div>
            </div>
        @endfor

        <button type="submit" style="margin-top: 1rem;">Guardar Cambios</button>
    </form>
@endsection
