<p align="center">
  <img src="public/assets/img/logo/logo-nav.png" alt="Siempre Limpio SPA" width="260">
</p>

<h1 align="center">Siempre Limpio SPA</h1>

<p align="center">
  Sitio web y panel de administración para una pyme de aseo y limpieza, construido en <strong>Laravel 12</strong>.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-%5E8.2-777BB4?logo=php&logoColor=white" alt="PHP ^8.2">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/MySQL%2FMariaDB-compatible-4479A1?logo=mysql&logoColor=white" alt="MySQL/MariaDB">
</p>

---

## Sobre el proyecto

Siempre Limpio SPA ofrece servicios de aseo, mantención y limpieza especializada (hogares, oficinas, vehículos, tapicerías, etc.) en la región del Maule, Chile. Este repositorio contiene:

- **Sitio público**: landing page con portada, equipos y herramientas, servicios principales, servicios destacados, comparadores "antes y después", formulario de cotización y datos de contacto.
- **Panel de administración**: permite al dueño del negocio editar todo el contenido del sitio (textos, imágenes y servicios) sin tocar código, desde una interfaz pensada para alguien sin experiencia técnica.

Todo el contenido del sitio público (textos, imágenes, servicios destacados, comparadores antes/después) se administra desde la base de datos a través del panel — no hace falta editar archivos para actualizar la página.

## Funcionalidades

### Sitio público
- Portada (hero) con texto e imagen editables.
- Sección de equipos y herramientas de trabajo.
- "Servicios Principales" en disposición circular (órbita), con los 6 servicios y la imagen central editables.
- "Servicios Destacados": galería con foto principal, miniaturas, pasos del proceso y descripción, por servicio.
- "Antes y Después": comparador deslizante de imágenes por tipo de servicio, con pasos y descripción.
- Formulario de cotización con autocompletado del servicio según el botón "Cotizar" presionado.
- Sección de contacto con teléfono, Instagram y horario de atención.

### Panel de administración (`/admin`)
- Login con autenticación de sesión, protegido con middleware `auth`.
- Recuperación de contraseña por correo ("¿Olvidaste tu contraseña?") y cambio de contraseña desde el propio panel ("Mi cuenta").
- Dashboard con menú lateral fijo (colapsa a menú hamburguesa en pantallas chicas) con una sección por cada parte editable del sitio: Inicio, Servicios Principales, Servicios Destacados, Antes y Después, Contacto.
- Edición de textos e imágenes con vista previa, validación de formato/tamaño de archivos (máx. 5MB) y reemplazo seguro de imágenes anteriores.
- Diseño pensado para un usuario no técnico: explicaciones simples bajo cada campo, listados con miniaturas en vez de solo texto, y un mapa visual para los 6 servicios de la órbita.

## Stack técnico

- **Backend:** Laravel 12 (PHP ^8.2)
- **Base de datos:** MySQL / MariaDB (vía Eloquent ORM)
- **Frontend público:** HTML + CSS + JavaScript nativo (sin framework de frontend ni build de Vite)
- **Almacenamiento de imágenes:** disco `public` de Laravel (`storage:link`)
- **Autenticación:** sesiones de Laravel, con recuperación de contraseña vía `password_reset_tokens`

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL o MariaDB
- Node.js (opcional; el sitio público no depende de un build de assets)

## Instalación local

```bash
# 1. Clonar el repositorio
git clone https://github.com/TitoskyBG/Siempre-Limpio-Spa.git
cd Siempre-Limpio-Spa

# 2. Instalar dependencias
composer install

# 3. Configurar el entorno
cp .env.example .env
php artisan key:generate

# 4. Configurar la base de datos en .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD)

# 5. Ejecutar migraciones y poblar datos iniciales
php artisan migrate
php artisan db:seed

# 6. Enlazar el almacenamiento público (para imágenes subidas desde el panel)
php artisan storage:link

# 7. Levantar el servidor de desarrollo
php artisan serve
```

El sitio público queda disponible en `http://localhost:8000` y el panel de administración en `http://localhost:8000/admin/login`.

> **Nota de seguridad:** los usuarios administradores se crean en `database/seeders/UserSeeder.php`. Antes de desplegar a producción, cambia las contraseñas por defecto y revisa que no quede ninguna cuenta de desarrollo/prueba activa.

## Estructura relevante

```
app/Http/Controllers/Admin/   Controladores del panel (uno por sección editable)
app/Models/                   Modelos Eloquent (SiteSetting, FeaturedService, BeforeAfterItem, etc.)
database/migrations/          Esquema de base de datos
database/seeders/              Datos iniciales (usuarios, textos, servicios)
resources/views/admin/         Vistas del panel de administración
resources/views/public/        Vista de la landing page pública
resources/views/layouts/       Layouts compartidos (admin, auth)
public/assets/                 CSS, JS e imágenes estáticas del sitio público
routes/web.php                 Rutas públicas y del panel admin
```

## Estado del proyecto

- ✅ Panel de administración completo (Inicio, Servicios Principales, Servicios Destacados, Antes y Después, Contacto, Mi cuenta).
- ✅ Autenticación, recuperación y cambio de contraseña.
- ⏳ Envío real del formulario de cotización (pendiente de credenciales SMTP del correo corporativo).
- ⏳ Despliegue a producción (dominio y hosting).

## Licencia

Este proyecto es privado y fue desarrollado a medida para Siempre Limpio SPA.
