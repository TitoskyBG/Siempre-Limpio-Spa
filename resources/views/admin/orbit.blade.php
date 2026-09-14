@extends('layouts.admin')

@section('title', 'Servicios Principales')

@section('content')
    <h2>Servicios Principales</h2>
    <p class="page-intro">
        Estos son los 6 servicios que giran alrededor del círculo central en tu página de inicio.
        Aquí cambias sus nombres, el texto del centro y la foto circular.
    </p>

    <form action="{{ route('admin.orbit.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-card">
            <h3 class="section-title">Centro del círculo</h3>

            <div class="field">
                <label>Descripción del centro</label>
                <textarea name="orbit_description" rows="3" required>{{ old('orbit_description', $settings['orbit_description'] ?? 'Ofrecemos servicios de limpieza profesional ejecutados bajo los más altos estándares de calidad, asegurando un entorno impecable y la máxima satisfacción en cada trabajo.') }}</textarea>
                <p class="field-hint">Texto que aparece en medio del círculo, rodeado por los 6 servicios.</p>
            </div>
            <div class="field">
                <label>Foto circular central</label>
                <input type="file" name="orbit_image" accept=".jpg,.jpeg,.png,.webp">
                <p class="field-hint">Opcional. Formatos JPG, PNG o WEBP, máximo 5MB.</p>
                @if(isset($settings['orbit_image_path']))
                    <img src="{{ asset('storage/' . $settings['orbit_image_path']) }}" class="img-preview">
                @endif
            </div>
            <div class="field">
                <label>Descripción de la foto (para lectores de pantalla)</label>
                <input type="text" name="orbit_image_alt" value="{{ old('orbit_image_alt', $settings['orbit_image_alt'] ?? 'Equipo de Siempre Limpio SPA realizando un servicio de limpieza') }}" required>
            </div>
        </div>

        <div class="form-card">
            <h3 class="section-title">Los 6 servicios del círculo</h3>
            <p class="field-hint" style="margin-top: -0.6rem; margin-bottom: 1.2rem;">
                Cada nombre aparece en la misma posición que ves aquí, alrededor del centro.
            </p>

            @php
                $positions = [
                    'top-left' => ['label' => 'Arriba Izquierda', 'area' => 'tl'],
                    'top-right' => ['label' => 'Arriba Derecha', 'area' => 'tr'],
                    'middle-left' => ['label' => 'Medio Izquierda', 'area' => 'ml'],
                    'middle-right' => ['label' => 'Medio Derecha', 'area' => 'mr'],
                    'bottom-left' => ['label' => 'Abajo Izquierda', 'area' => 'bl'],
                    'bottom-right' => ['label' => 'Abajo Derecha', 'area' => 'br'],
                ];
            @endphp

            <div class="orbit-map">
                @foreach($positions as $pos => $meta)
                    <div class="field" style="grid-area: {{ $meta['area'] }}; margin-bottom: 0;">
                        <label>{{ $meta['label'] }}</label>
                        <input type="text" name="services[{{ $pos }}]" value="{{ old('services.'.$pos, $services[$pos]->name ?? '') }}" required>
                    </div>
                @endforeach
                <div class="orbit-center">Centro</div>
            </div>
        </div>

        <div class="sticky-actions">
            <button type="submit">Guardar cambios</button>
        </div>
    </form>
@endsection
