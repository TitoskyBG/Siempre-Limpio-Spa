@extends('layouts.admin')

@section('title', 'Servicios Destacados')

@section('content')
    <h2>Servicios Destacados</h2>

    <div class="service-list">
        @foreach($services as $service)
            <div class="service-item">
                <div>
                    <strong>{{ $service->tag }}</strong>
                    <p style="margin: 0.2rem 0 0; color: var(--color-text-soft); font-size: 0.9rem;">{{ $service->title }}</p>
                </div>
                <a href="{{ route('admin.featured.edit', $service->id) }}" class="btn-edit">Editar</a>
            </div>
        @endforeach
    </div>
@endsection
