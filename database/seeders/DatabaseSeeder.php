<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\PrincipalService;
use App\Models\FeaturedService;
use App\Models\BeforeAfterItem;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Textos Generales (Etapa 1.1)
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

        // 2. Servicios de la Órbita (Etapa 1.1)
        PrincipalService::create(['position' => 'top-left', 'name' => 'Aseo de Casas']);
        PrincipalService::create(['position' => 'top-right', 'name' => 'Aseo en Condominios']);
        PrincipalService::create(['position' => 'middle-left', 'name' => 'Aseo en Oficinas']);
        PrincipalService::create(['position' => 'middle-right', 'name' => 'Lavado de Tapicería']);
        PrincipalService::create(['position' => 'bottom-left', 'name' => 'Aseo en Gimnasios']);
        PrincipalService::create(['position' => 'bottom-right', 'name' => 'Aseo en Recintos Educacionales']);

        // 3. Servicios Destacados (Etapa 1.2)
        $featuredServices = [
            [
                'tag' => 'Lavado de alfombras',
                'title' => 'Alfombras limpias, frescas y renovadas',
                'description' => 'Realizamos una limpieza profunda para recuperar la apariencia, higiene y frescura de tus alfombras. Evaluamos el material y nivel de suciedad para aplicar un tratamiento adecuado, cuidando las fibras y el color.',
                'steps' => [
                    'Revisión del tipo de alfombra y sus fibras.',
                    'Evaluación de manchas, olores y suciedad acumulada.',
                    'Aspirado previo para retirar polvo y residuos.',
                    'Aplicación de shampoo o producto especializado.',
                    'Lavado, cepillado y extracción de suciedad.',
                    'Secado controlado y revisión final del resultado.'
                ],
                'images' => [
                    ['path' => 'assets/img/servicios-destacados/lavado-alfombra/piso-limpio.webp', 'alt' => 'Lavado profesional de alfombra', 'is_main' => true],
                    ['path' => 'assets/img/servicios-destacados/lavado-alfombra/alfombra-2.jpg', 'alt' => 'Proceso de limpieza de alfombra', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/lavado-alfombra/piso-limpio.webp', 'alt' => 'Aplicación de producto para lavar alfombra', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/lavado-alfombra/alfombra-4.jpg', 'alt' => 'Alfombra limpia después del servicio', 'is_main' => false],
                ]
            ],
            [
                'tag' => 'Limpieza de tapiz de autos',
                'title' => 'Interior limpio, fresco y más cómodo para viajar',
                'description' => 'Recuperamos la limpieza del interior de tu vehículo mediante un tratamiento especializado para asientos, pisos, techo y otras superficies textiles. Trabajamos según el tipo de tapiz y las necesidades reales de cada auto.',
                'steps' => [
                    'Revisión general del estado del interior.',
                    'Aspirado profundo de asientos, piso y maletero.',
                    'Tratamiento de manchas y suciedad localizada.',
                    'Aplicación de shampoo adecuado para el tapiz.',
                    'Extracción de humedad, polvo y residuos.',
                    'Secado y revisión final de cada superficie.'
                ],
                'images' => [
                    ['path' => 'assets/img/servicios-destacados/tapiz-autos/tapiz-auto-limpio.webp', 'alt' => 'Limpieza profesional de tapiz de auto', 'is_main' => true],
                    ['path' => 'assets/img/servicios-destacados/tapiz-autos/tapiz-auto-sucio.webp', 'alt' => 'Limpieza de asientos de auto', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/tapiz-autos/tapiz-auto-2-limpio.webp', 'alt' => 'Extracción de suciedad en tapiz de vehículo', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/tapiz-autos/tapiz-auto-2-sucio.webp', 'alt' => 'Interior de auto limpio después del servicio', 'is_main' => false],
                ]
            ],
            [
                'tag' => 'Limpieza de sillones y sofás',
                'title' => 'Renueva tus sillones y sofás con una limpieza profunda',
                'description' => 'Eliminamos suciedad acumulada, manchas y olores en muebles tapizados de hogares, oficinas y salas de espera. Aplicamos un proceso cuidadoso según la tela, el uso del mueble y el estado de cada superficie.',
                'steps' => [
                    'Evaluación del material y estado del tapiz.',
                    'Aspirado profundo de cojines y superficies.',
                    'Tratamiento de manchas según el tipo de tela.',
                    'Aplicación de shampoo o producto especializado.',
                    'Extracción de suciedad y humedad acumulada.',
                    'Secado controlado y revisión del resultado.'
                ],
                'images' => [
                    ['path' => 'assets/img/servicios-destacados/sillones-sofas/sofa-celeste-antes.webp', 'alt' => 'Limpieza profesional de sillón', 'is_main' => true],
                    ['path' => 'assets/img/servicios-destacados/sillones-sofas/sofa-celeste-despues.webp', 'alt' => 'Aplicación de producto sobre sillón', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/sillones-sofas/sofa-rosado-limpio.webp', 'alt' => 'Proceso de limpieza de sofá', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/sillones-sofas/sofa-rosado-sucio.webp', 'alt' => 'Sofá limpio después del servicio', 'is_main' => false],
                ]
            ],
            [
                'tag' => 'Limpieza de Interiores y Exteriores',
                'title' => 'Soluciones completas de limpieza para cada rincón',
                'description' => 'Brindamos un servicio integral de aseo profundo para casas, oficinas y condominios. Abarcamos desde la higienización de interiores hasta el lavado de zonas exteriores como balcones, terrazas, muros y techumbres, adaptando nuestras técnicas para renovar y proteger cada rincón de tus instalaciones.',
                'steps' => [
                    'Inspección técnica y evaluación de superficies (interiores y exteriores).',
                    'Despeje y retiro inicial de residuos gruesos y polvo en seco.',
                    'Limpieza profunda de interiores: pisos, superficies de trabajo y áreas comunes.',
                    'Lavado especializado de exteriores: muros, balcones y cubiertas de techos.',
                    'Aplicación de insumos certificados y técnicas de desinfección.',
                    'Revisión final de calidad para garantizar un acabado impecable.'
                ],
                'images' => [
                    ['path' => 'assets/img/servicios-destacados/Interiores-Exteriores/casa.webp', 'alt' => 'Limpieza de casa', 'is_main' => true],
                    ['path' => 'assets/img/servicios-destacados/Interiores-Exteriores/cocina.webp', 'alt' => 'Limpieza de cocina', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/Interiores-Exteriores/exterior.webp', 'alt' => 'Lavado de exterior casa', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/Interiores-Exteriores/oficina.webp', 'alt' => 'Limpieza de oficina', 'is_main' => false],
                ]
            ],
            [
                'tag' => 'Limpieza de colchones',
                'title' => 'Un descanso más fresco, limpio e higiénico',
                'description' => 'Realizamos limpieza profunda de colchones para ayudar a eliminar polvo, manchas, olores y suciedad acumulada por el uso diario. El proceso se adapta al tipo de tela y condición de cada colchón.',
                'steps' => [
                    'Evaluación del estado general del colchón.',
                    'Aspirado profundo de la superficie.',
                    'Revisión de manchas, olores y zonas de uso.',
                    'Aplicación de shampoo o producto especializado.',
                    'Extracción de humedad y suciedad acumulada.',
                    'Secado controlado y revisión final.'
                ],
                'images' => [
                    ['path' => 'assets/img/servicios-destacados/colchones/cama-2-despues.webp', 'alt' => 'Lavado profesional de colchón', 'is_main' => true],
                    ['path' => 'assets/img/servicios-destacados/colchones/cama-2-antes.webp', 'alt' => 'Proceso de limpieza de colchón', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/colchones/colchon-1.jpg', 'alt' => 'Extracción de suciedad de colchón', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/colchones/colchon-2.jpg', 'alt' => 'Colchón limpio después del servicio', 'is_main' => false],
                ]
            ],
            [
                'tag' => 'Limpieza de pisos flotantes y cerámicas',
                'title' => 'Pisos cuidados, limpios y con mejor terminación',
                'description' => 'Realizamos limpieza, decapado y mantención profunda de pisos flotantes y cerámicas. Removemos capas viejas de cera, suciedad incrustada y residuos químicos para devolver el aspecto original y aplicar el tratamiento adecuado según el material.',
                'steps' => [
                    'Revisión del tipo y estado del piso.',
                    'Decapado controlado.',
                    'Retiro de polvo, residuos y suciedad suelta.',
                    'Tratamiento de manchas o zonas de mayor uso.',
                    'Aplicación de productos adecuados al material.',
                    'Fregado manual o mecánico según necesidad.',
                    'Secado y revisión final de la terminación.'
                ],
                'images' => [
                    ['path' => 'assets/img/servicios-destacados/pisos/piso-cafe-despues.webp', 'alt' => 'Limpieza profesional de pisos flotantes y cerámicas', 'is_main' => true],
                    ['path' => 'assets/img/servicios-destacados/pisos/piso-cafe-antes.webp', 'alt' => 'Limpieza de piso cerámico', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/pisos/pisos-flotante-limpio.webp', 'alt' => 'Lavado de piso flotante', 'is_main' => false],
                    ['path' => 'assets/img/servicios-destacados/pisos/piso-flotante-sucio.webp', 'alt' => 'Piso limpio después del servicio', 'is_main' => false],
                ]
            ]
        ];

        foreach ($featuredServices as $serviceData) {
            $service = FeaturedService::create([
                'tag' => $serviceData['tag'],
                'title' => $serviceData['title'],
                'description' => $serviceData['description'],
            ]);

            foreach ($serviceData['steps'] as $stepText) {
                $service->steps()->create(['description' => $stepText]);
            }

            foreach ($serviceData['images'] as $imageData) {
                $service->images()->create([
                    'image_path' => $imageData['path'],
                    'alt_text' => $imageData['alt'],
                    'is_main' => $imageData['is_main'],
                ]);
            }
        }

        // 4. Comparadores Antes y Después (Etapa 1.3)
        $beforeAfterItems = [
            [
                'tab_name' => 'Pisos', 'tab_target' => 'pisos', 'tag' => 'Lavado y encerado de pisos',
                'title' => 'Pisos limpios, protegidos y con mejor brillo',
                'description' => 'Recuperamos pisos con suciedad acumulada, manchas o pérdida de brillo. Adaptamos el tratamiento según el material y el estado de la superficie.',
                'image_before_path' => 'assets/img/antes-despues/piso-azul-despues.webp',
                'image_before_alt' => 'Piso después del servicio de limpieza',
                'image_after_path' => 'assets/img/antes-despues/piso-azul-antes.webp',
                'image_after_alt' => 'Piso antes del servicio de limpieza',
                'steps' => [
                    'Inspección del tipo y condición del piso.', 'Barrido y retiro de polvo o residuos.',
                    'Aplicación de detergente desengrasante.', 'Fregado manual o mecánico según necesidad.',
                    'Secado, revisión y aplicación de brillo si corresponde.'
                ]
            ],
            [
                'tab_name' => 'Cama', 'tab_target' => 'cama', 'tag' => 'Limpieza de camas',
                'title' => 'Una base de cama más limpia y fresca',
                'description' => 'Realizamos limpieza profunda de bases tapizadas para retirar polvo, suciedad, manchas y olores acumulados por el uso diario.',
                'image_before_path' => 'assets/img/antes-despues/cama-despues.webp',
                'image_before_alt' => 'Base de cama después de la limpieza',
                'image_after_path' => 'assets/img/antes-despues/cama-antes.webp',
                'image_after_alt' => 'Base de cama antes de la limpieza',
                'steps' => [
                    'Revisión del tapiz y zonas a tratar.', 'Aspirado profundo de toda la superficie.',
                    'Tratamiento de manchas o suciedad localizada.', 'Aplicación de producto adecuado para la tela.',
                    'Extracción de humedad y secado controlado.'
                ]
            ],
            [
                'tab_name' => 'Colchón', 'tab_target' => 'colchon', 'tag' => 'Limpieza de colchones',
                'title' => 'Un colchón más limpio para descansar mejor',
                'description' => 'Ayudamos a eliminar polvo, manchas, olores y suciedad acumulada para mejorar la higiene y frescura de tu espacio de descanso.',
                'image_before_path' => 'assets/img/antes-despues/colchon-despues.webp',
                'image_before_alt' => 'Colchón después de la limpieza',
                'image_after_path' => 'assets/img/antes-despues/colchon-antes.webp',
                'image_after_alt' => 'Colchón antes de la limpieza',
                'steps' => [
                    'Evaluación general del estado del colchón.', 'Aspirado profundo de la superficie.',
                    'Revisión de manchas y zonas de mayor uso.', 'Aplicación de shampoo o producto especializado.',
                    'Extracción de humedad y secado controlado.'
                ]
            ],
            [
                'tab_name' => 'Silla', 'tab_target' => 'silla', 'tag' => 'Limpieza de sillas',
                'title' => 'Sillas renovadas para tu hogar u oficina',
                'description' => 'Limpiamos sillas de comedor, oficina o espera para retirar polvo, manchas y suciedad acumulada en telas de uso frecuente.',
                'image_before_path' => 'assets/img/antes-despues/silla-azul-despues.webp',
                'image_before_alt' => 'Silla después de la limpieza',
                'image_after_path' => 'assets/img/antes-despues/silla-azul-antes.webp',
                'image_after_alt' => 'Silla antes de la limpieza',
                'steps' => [
                    'Evaluación del tapiz y tipo de material.', 'Aspirado profundo de la superficie.',
                    'Tratamiento de manchas según la tela.', 'Aplicación de producto de limpieza especializado.',
                    'Extracción, secado y revisión final.'
                ]
            ],
            [
                'tab_name' => 'Sofa', 'tab_target' => 'sofa', 'tag' => 'Limpieza de sofas',
                'title' => 'Sofás más limpios, frescos y agradables',
                'description' => 'Recuperamos muebles tapizados con manchas, olores o suciedad acumulada por el uso diario en hogares, oficinas y salas de espera.',
                'image_before_path' => 'assets/img/antes-despues/sofa-gris-despues.webp',
                'image_before_alt' => 'Sofá después de la limpieza',
                'image_after_path' => 'assets/img/antes-despues/sofa-gris-antes.webp',
                'image_after_alt' => 'Sofá antes de la limpieza',
                'steps' => [
                    'Evaluación del tipo de tela y estado del sofá.', 'Aspirado profundo de cojines y superficies.',
                    'Tratamiento de manchas o zonas específicas.', 'Aplicación de producto adecuado al tapiz.',
                    'Extracción de humedad, secado y revisión final.'
                ]
            ],
            [
                'tab_name' => 'Mueble', 'tab_target' => 'mueble', 'tag' => 'Limpieza de muebles',
                'title' => 'Muebles renovados y listos para disfrutar',
                'description' => 'Eliminamos suciedad profunda, grasa y polvo acumulado en clósets, repisas y muebles de cocina. Devuelve la higiene a tu hogar.',
                'image_before_path' => 'assets/img/antes-despues/muebles-despues.webp',
                'image_before_alt' => 'Mueble después de la limpieza',
                'image_after_path' => 'assets/img/antes-despues/mueble-antes.webp',
                'image_after_alt' => 'Mueble antes de la limpieza',
                'steps' => [
                    'Revisión del material y estado del mueble.', 'Retiro de suciedad suelta y residuos.',
                    'Tratamiento de manchas, grasa y pegamento.', 'Aplicación de productos seguros según el material.',
                    'Secado profundo y revisión final contigo.'
                ]
            ]
        ];

        foreach ($beforeAfterItems as $baData) {
            $item = BeforeAfterItem::create([
                'tab_name' => $baData['tab_name'], 'tab_target' => $baData['tab_target'],
                'tag' => $baData['tag'], 'title' => $baData['title'], 'description' => $baData['description'],
                'image_before_path' => $baData['image_before_path'], 'image_before_alt' => $baData['image_before_alt'],
                'image_after_path' => $baData['image_after_path'], 'image_after_alt' => $baData['image_after_alt'],
            ]);

            foreach ($baData['steps'] as $stepDesc) {
                $item->steps()->create(['description' => $stepDesc]);
            }
        }
    }
}