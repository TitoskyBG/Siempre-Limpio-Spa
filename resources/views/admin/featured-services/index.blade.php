@extends('layouts.admin')

@section('title', 'Servicios Destacados')

@section('content')
    <h2>Servicios Destacados</h2>
    <p class="page-intro">
        Estos son los servicios que se explican en detalle en tu página, con fotos y pasos del proceso.
        Haz clic en uno para actualizar su contenido.
    </p>

    <div class="service-card-grid">
        @foreach($services as $service)
            @php
                $mainImg = $service->images->where('is_main', true)->first() ?? $service->images->first();
                $thumbSrc = $mainImg
                    ? (str_starts_with($mainImg->image_path, 'assets/') || filter_var($mainImg->image_path, FILTER_VALIDATE_URL)
                        ? asset($mainImg->image_path)
                        : asset('storage/' . $mainImg->image_path))
                    : null;
            @endphp
            <a href="{{ route('admin.featured.edit', $service->id) }}" class="service-card">
                @if($thumbSrc)
                    <img src="{{ $thumbSrc }}" alt="{{ $mainImg->alt_text }}" class="thumb">
                @else
                    <div class="thumb"></div>
                @endif
                <div class="card-body">
                    <span class="card-tag">{{ $service->tag }}</span>
                    <p class="card-title">{{ $service->title }}</p>
                </div>
                <div class="card-cta">Editar servicio</div>
            </a>
        @endforeach
    </div>
@endsection
