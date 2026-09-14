@extends('layouts.auth')

@section('title', 'Iniciar sesión')

@section('content')
    <h2>Panel de Administración</h2>
    <p class="auth-subtitle">Ingresa con tu correo corporativo</p>

    @if($errors->any())
        <div class="alert-error">{{ $errors->first() }}</div>
    @endif

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <div class="field">
            <label for="login-email">Correo electrónico</label>
            <input type="email" id="login-email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="field">
            <label for="login-password">Contraseña</label>
            <input type="password" id="login-password" name="password" required>
        </div>
        <button type="submit" class="btn-submit">Ingresar</button>
    </form>

    <div class="auth-links">
        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
    </div>
@endsection
