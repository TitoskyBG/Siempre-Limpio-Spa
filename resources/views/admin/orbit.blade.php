@extends('layouts.admin')

@section('title', 'Servicios Principales')

@section('content')
    <h2>Editar Servicios Principales (Órbita)</h2>

    <form action="{{ route('admin.orbit.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h3 class="section-title">Centro de la Órbita</h3>
        <div class="field">
            <label>Descripción de la sección</label>
            <textarea name="orbit_description" rows="3" required>{{ old('orbit_description', $settings['orbit_description'] ?? 'Ofrecemos servicios de limpieza profesional ejecutados bajo los más altos estándares de calidad, asegurando un entorno impecable y la máxima satisfacción en cada trabajo.') }}</textarea>
        </div>
        <div class="field">
            <label>Imagen Central (Máx 5MB. Opcional)</label>
            <input type="file" name="orbit_image" accept=".jpg,.jpeg,.png,.webp">
            @if(isset($settings['orbit_image_path']))
                <img src="{{ asset('storage/' . $settings['orbit_image_path']) }}" class="img-preview">
            @endif
        </div>
        <div class="field">
            <label>Texto alternativo de la imagen (Alt)</label>
            <input type="text" name="orbit_image_alt" value="{{ old('orbit_image_alt', $settings['orbit_image_alt'] ?? 'Equipo de Siempre Limpio SPA realizando un servicio de limpieza') }}" required>
        </div>

        <h3 class="section-title">Los 6 Servicios Fijos</h3>
        <div class="service-grid">
            @foreach(['top-left' => 'Arriba Izquierda', 'top-right' => 'Arriba Derecha', 'middle-left' => 'Medio Izquierda', 'middle-right' => 'Medio Derecha', 'bottom-left' => 'Abajo Izquierda', 'bottom-right' => 'Abajo Derecha'] as $pos => $label)
                <div class="field">
                    <label>{{ $label }}</label>
                    <input type="text" name="services[{{ $pos }}]" value="{{ old('services.'.$pos, $services[$pos]->name ?? '') }}" required>
                </div>
            @endforeach
        </div>

        <button type="submit">Guardar Cambios</button>
    </form>
@endsection
