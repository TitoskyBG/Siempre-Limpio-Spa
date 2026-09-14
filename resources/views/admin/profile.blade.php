@extends('layouts.admin')

@section('title', 'Mi cuenta')

@section('content')
    <h2>Mi cuenta</h2>
    <p class="page-intro">
        Aquí puedes actualizar la contraseña con la que entras al panel de administración.
    </p>

    <div class="account-card">
        <div class="account-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <div>
            <p class="account-name">{{ Auth::user()->name }}</p>
            <p class="account-email">{{ Auth::user()->email }}</p>
        </div>
    </div>

    <div class="form-card password-card">
        <h3 class="section-title">Cambiar contraseña</h3>

        <form action="{{ route('admin.profile.password.update') }}" method="POST" id="password-form">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="current_password">Contraseña actual</label>
                <input type="password" id="current_password" name="current_password" class="js-password-field" required>
            </div>

            <hr class="field-divider">

            <div class="field">
                <label for="password">Nueva contraseña</label>
                <input type="password" id="password" name="password" class="js-password-field" minlength="8" required>
                <p class="field-hint">Mínimo 8 caracteres. Evita usar tu nombre o números seguidos.</p>
            </div>
            <div class="field">
                <label for="password_confirmation">Confirmar nueva contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="js-password-field" minlength="8" required>
            </div>

            <label class="show-password-toggle">
                <input type="checkbox" id="toggle-passwords">
                Mostrar contraseñas
            </label>

            <button type="submit">Guardar nueva contraseña</button>
        </form>

        <p class="security-tip">
            <strong>Consejo:</strong> no compartas tu contraseña con nadie ni la anotes en un lugar visible.
            Si crees que alguien más la conoce, cámbiala ahora mismo desde aquí.
        </p>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('toggle-passwords');
            const fields = document.querySelectorAll('.js-password-field');

            if (!toggle || fields.length === 0) {
                return;
            }

            toggle.addEventListener('change', () => {
                const type = toggle.checked ? 'text' : 'password';
                fields.forEach((field) => field.setAttribute('type', type));
            });
        });
    </script>
@endpush
