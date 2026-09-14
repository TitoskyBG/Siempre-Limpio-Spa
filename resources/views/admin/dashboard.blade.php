@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h2>Bienvenido, {{ Auth::user()->name }}</h2>
    <p style="color: var(--color-text-soft);">
        Selecciona una sección del menú de la izquierda para editar el contenido de la página.
    </p>
@endsection
