@extends('layouts.admin')

@section('title', 'Contacto')

@section('content')
    <h2>Contacto</h2>
    <p class="page-intro">
        Esta es la última sección de tu página, donde tus clientes encuentran cómo comunicarse
        contigo: teléfono, Instagram y tu horario de atención.
    </p>

    <form action="{{ route('admin.contact.update') }}" method="POST">
        @csrf

        <div class="form-card">
            <h3 class="section-title">Datos de contacto</h3>

            <div class="field">
                <label>Título de la sección</label>
                <input type="text" name="contact_title" value="{{ old('contact_title', $settings['contact_title'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Descripción y zonas donde trabajas</label>
                <textarea name="contact_description" rows="3" required>{{ old('contact_description', $settings['contact_description'] ?? '') }}</textarea>
            </div>
            <div class="field">
                <label>Teléfono / WhatsApp</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required>
            </div>
            <div class="field">
                <label>Usuario de Instagram</label>
                <input type="text" name="contact_instagram" value="{{ old('contact_instagram', $settings['contact_instagram'] ?? '') }}" required>
                <p class="field-hint">Ej: @siemprelimpiospa</p>
            </div>
        </div>

        <div class="form-card">
            <h3 class="section-title">Horario de atención</h3>
            <p class="field-hint" style="margin-top: -0.6rem; margin-bottom: 1.2rem;">
                Así se muestra en tu página, día por día.
            </p>

            <div class="schedule-grid">
                <div class="schedule-row">
                    <span class="schedule-day">Lunes a Viernes</span>
                    <input type="text" name="contact_hours_weekday" value="{{ old('contact_hours_weekday', $settings['contact_hours_weekday'] ?? '') }}" required>
                </div>
                <div class="schedule-row">
                    <span class="schedule-day">Sábado</span>
                    <input type="text" name="contact_hours_saturday" value="{{ old('contact_hours_saturday', $settings['contact_hours_saturday'] ?? '') }}" required>
                </div>
                <div class="schedule-row">
                    <span class="schedule-day">Domingo</span>
                    <input type="text" name="contact_hours_sunday" value="{{ old('contact_hours_sunday', $settings['contact_hours_sunday'] ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="sticky-actions">
            <button type="submit">Guardar cambios</button>
        </div>
    </form>
@endsection
