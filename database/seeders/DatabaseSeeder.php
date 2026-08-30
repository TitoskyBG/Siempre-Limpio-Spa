<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\PrincipalService;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::create(['key' => 'hero_tag', 'value' => 'Servicios de limpieza y mantención']);
        SiteSetting::create(['key' => 'hero_title', 'value' => 'Soluciones limpias, ordenadas y confiables para tu espacio.']);
        SiteSetting::create(['key' => 'hero_description', 'value' => 'Siempre Limpio SPA entrega servicios de aseo, mantención y limpieza especializada para oficinas, espacios pequeños, vehículos, tapicerías y otras necesidades puntuales.']);
        SiteSetting::create(['key' => 'hero_image_caption', 'value' => 'Trabajamos con dedicación para entregar espacios limpios, frescos y listos para disfrutar.']);
        SiteSetting::create(['key' => 'hero_image_alt', 'value' => 'Equipo de Siempre Limpio SPA realizando un servicio de limpieza']);
        
        SiteSetting::create(['key' => 'contact_title', 'value' => 'Estamos listos para ayudarte']);
        SiteSetting::create(['key' => 'contact_description', 'value' => 'Atendemos en Talca, Maule, Curicó, San Rafael, Linares y San Clemente. Escríbenos por Instagram o completa el formulario de cotización.']);
        SiteSetting::create(['key' => 'contact_phone', 'value' => '+56 9 7712 2022']);
        SiteSetting::create(['key' => 'contact_instagram', 'value' => '@siemprelimpiospa']);
        SiteSetting::create(['key' => 'contact_hours_weekday', 'value' => 'Lunes a viernes 09:00 - 21:00 hrs']);
        SiteSetting::create(['key' => 'contact_hours_saturday', 'value' => 'Sábado: 09:00 - 17:00 hrs']);
        SiteSetting::create(['key' => 'contact_hours_sunday', 'value' => 'Domingo: Cerrado']);

        PrincipalService::create(['position' => 'top-left', 'name' => 'Aseo de Casas']);
        PrincipalService::create(['position' => 'top-right', 'name' => 'Aseo en Condominios']);
        PrincipalService::create(['position' => 'middle-left', 'name' => 'Aseo en Oficinas']);
        PrincipalService::create(['position' => 'middle-right', 'name' => 'Lavado de Tapicería']);
        PrincipalService::create(['position' => 'bottom-left', 'name' => 'Aseo en Gimnasios']);
        PrincipalService::create(['position' => 'bottom-right', 'name' => 'Aseo en Recintos Educacionales']);
    }
}