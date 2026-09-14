@extends('layouts.admin')

@section('title', 'Antes y Después')

@section('content')
    <h2>Antes y Después</h2>

    <div class="service-list">
        @foreach($items as $item)
            <div class="service-item">
                <div>
                    <strong>{{ $item->tab_name }}</strong>
                    <p style="margin: 0.2rem 0 0; color: var(--color-text-soft); font-size: 0.9rem;">{{ $item->title }}</p>
                </div>
                <a href="{{ route('admin.before-after.edit', $item->id) }}" class="btn-edit">Editar</a>
            </div>
        @endforeach
    </div>
@endsection
