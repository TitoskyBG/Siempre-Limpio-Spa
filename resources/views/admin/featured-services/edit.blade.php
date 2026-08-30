<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Servicio Destacado</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f9fd; margin: 0; padding: 2rem; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 2rem; }
        .field { margin-bottom: 1.5rem; display: flex; flex-direction: column; }
        label { font-weight: bold; margin-bottom: 0.5rem; color: #143447; }
        input[type="text"], input[type="file"], textarea { padding: 0.8rem; border: 1px solid #ccc; border-radius: 8px; }
        button { background: #19c18d; color: white; border: none; padding: 1rem 2rem; border-radius: 8px; cursor: pointer; font-weight: bold; }
        .btn-back { text-decoration: none; color: #4dbbe9; font-weight: bold; }
        .error-list { background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }
        .section-title { margin-top: 2rem; border-bottom: 2px solid #4dbbe9; padding-bottom: 0.5rem; color: #1c6f97; }
        .step-group, .img-group { background: #f9fcfe; padding: 1rem; border: 1px solid #d8e8f2; border-radius: 8px; margin-bottom: 1rem; }
        .img-preview { max-width: 100px; margin-top: 0.5rem; border-radius: 6px; border: 1px solid #ccc; display: block; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Editar Servicio: {{ $featuredService->tag }}</h2>
            <a href="{{ route('admin.featured.index') }}" class="btn-back">Volver a la lista</a>
        </div>

        @if($errors->any())
            <div class="error-list">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
            <p style="color: #5f7484; font-size: 0.9rem;">La primera imagen será la principal (grande). Las siguientes tres actuarán como miniaturas interactivas para tu script `featured-gallery.js`.</p>
            
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
    </div>
</body>
</html>