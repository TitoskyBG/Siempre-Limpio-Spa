<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comparador</title>
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
        .img-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .img-group { background: #f9fcfe; padding: 1rem; border: 1px solid #d8e8f2; border-radius: 8px; }
        .img-preview { max-width: 100%; margin-top: 0.5rem; border-radius: 6px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Editar Comparador: {{ $beforeAfterItem->tab_name }}</h2>
            <a href="{{ route('admin.before-after.index') }}" class="btn-back">Volver a la lista</a>
        </div>

        @if($errors->any())
            <div class="error-list"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('admin.before-after.update', $beforeAfterItem->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Nombre en la pestaña (Ej: Pisos)</label>
                <input type="text" name="tab_name" value="{{ old('tab_name', $beforeAfterItem->tab_name) }}" required>
            </div>
            <div class="field">
                <label>Etiqueta superior (Tag)</label>
                <input type="text" name="tag" value="{{ old('tag', $beforeAfterItem->tag) }}" required>
            </div>
            <div class="field">
                <label>Título</label>
                <input type="text" name="title" value="{{ old('title', $beforeAfterItem->title) }}" required>
            </div>
            <div class="field">
                <label>Descripción</label>
                <textarea name="description" rows="3" required>{{ old('description', $beforeAfterItem->description) }}</textarea>
            </div>

            <h3 class="section-title">Los 5 Pasos Exactos</h3>
            @php $steps = $beforeAfterItem->steps; @endphp
            @for($i = 0; $i < 5; $i++)
                <div class="field">
                    <label>Paso {{ $i + 1 }}</label>
                    <input type="text" name="steps[]" value="{{ old('steps.'.$i, $steps[$i]->description ?? '') }}" required>
                </div>
            @endfor

            <h3 class="section-title">Imágenes Comparativas</h3>
            <div class="img-grid">
                <div class="img-group">
                    <strong>Imagen "ANTES"</strong>
                    <div class="field">
                        <label>Subir nueva (Opcional)</label>
                        <input type="file" name="image_before" accept=".jpg,.jpeg,.png,.webp">
                        <img src="{{ str_starts_with($beforeAfterItem->image_before_path, 'assets/') ? asset($beforeAfterItem->image_before_path) : asset('storage/' . $beforeAfterItem->image_before_path) }}" class="img-preview">
                    </div>
                    <div class="field">
                        <label>Alt text</label>
                        <input type="text" name="image_before_alt" value="{{ old('image_before_alt', $beforeAfterItem->image_before_alt) }}" required>
                    </div>
                </div>

                <div class="img-group">
                    <strong>Imagen "DESPUÉS" (Imagen de fondo)</strong>
                    <div class="field">
                        <label>Subir nueva (Opcional)</label>
                        <input type="file" name="image_after" accept=".jpg,.jpeg,.png,.webp">
                        <img src="{{ str_starts_with($beforeAfterItem->image_after_path, 'assets/') ? asset($beforeAfterItem->image_after_path) : asset('storage/' . $beforeAfterItem->image_after_path) }}" class="img-preview">
                    </div>
                    <div class="field">
                        <label>Alt text</label>
                        <input type="text" name="image_after_alt" value="{{ old('image_after_alt', $beforeAfterItem->image_after_alt) }}" required>
                    </div>
                </div>
            </div>

            <button type="submit" style="margin-top: 1.5rem;">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>