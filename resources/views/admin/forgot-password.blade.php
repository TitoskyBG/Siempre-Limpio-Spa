@extends('layouts.auth')

@section('title', 'Recuperar contraseña')

@section('content')
    <h2>¿Olvidaste tu contraseña?</h2>
    <p class="auth-subtitle">Ingresa tu correo y te enviaremos un enlace para restablecerla.</p>

    @if($errors->any())
        <div class="alert-error">{{ $errors->first() }}</div>
    @endif

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="field">
            <label for="forgot-email">Correo electrónico</label>
            <input type="email" id="forgot-email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <button type="submit" class="btn-submit">Enviar enlace</button>
    </form>

    <div class="auth-links">
        <a href="{{ route('login') }}">Volver a iniciar sesión</a>
    </div>
@endsection
