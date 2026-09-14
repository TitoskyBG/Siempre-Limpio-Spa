@extends('layouts.auth')

@section('title', 'Restablecer contraseña')

@section('content')
    <h2>Crea una nueva contraseña</h2>
    <p class="auth-subtitle">Elige una contraseña segura para tu cuenta.</p>

    @if($errors->any())
        <div class="alert-error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="field">
            <label for="reset-email">Correo electrónico</label>
            <input type="email" id="reset-email" name="email" value="{{ old('email', $email) }}" required autofocus>
        </div>
        <div class="field">
            <label for="reset-password">Nueva contraseña</label>
            <input type="password" id="reset-password" name="password" required>
        </div>
        <div class="field">
            <label for="reset-password-confirm">Confirmar contraseña</label>
            <input type="password" id="reset-password-confirm" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn-submit">Guardar contraseña</button>
    </form>
@endsection
