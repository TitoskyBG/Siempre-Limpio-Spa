@extends('layouts.admin')

@section('title', 'Antes y Después')

@section('content')
    <h2>Antes y Después</h2>
    <p class="page-intro">
        Estas son las comparaciones que ven tus clientes en tu página. Haz clic en una para
        actualizar sus fotos, textos y pasos.
    </p>

    <div class="service-card-grid">
        @foreach($items as $item)
            @php
                $thumbSrc = $item->image_before_path
                    ? (str_starts_with($item->image_before_path, 'assets/') || filter_var($item->image_before_path, FILTER_VALIDATE_URL)
                        ? asset($item->image_before_path)
                        : asset('storage/' . $item->image_before_path))
                    : null;
            @endphp
            <a href="{{ route('admin.before-after.edit', $item->id) }}" class="service-card">
                @if($thumbSrc)
                    <img src="{{ $thumbSrc }}" alt="{{ $item->image_before_alt }}" class="thumb">
                @else
                    <div class="thumb"></div>
                @endif
                <div class="card-body">
                    <span class="card-tag">{{ $item->tab_name }}</span>
                    <p class="card-title">{{ $item->title }}</p>
                </div>
                <div class="card-cta">Editar comparación</div>
            </a>
        @endforeach
    </div>
@endsection
