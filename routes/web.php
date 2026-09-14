<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordResetController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Rutas de invitado (sin sesión iniciada)
|--------------------------------------------------------------------------
*/

// Quitamos el name('admin.') de este grupo para que la ruta se llame exactamente 'login'
Route::middleware('guest')->prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');

    // Nombres sin prefijo 'admin.' porque Laravel los usa así por convención
    // (ej. la notificación de reseteo de contraseña arma la URL con route('password.reset', ...)).
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas (requieren login)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'update'])->name('settings.update');
    Route::get('/orbit', [App\Http\Controllers\Admin\PrincipalServiceController::class, 'edit'])->name('orbit.edit');
    Route::post('/orbit', [App\Http\Controllers\Admin\PrincipalServiceController::class, 'update'])->name('orbit.update');
    Route::get('/featured-services', [App\Http\Controllers\Admin\FeaturedServiceController::class, 'index'])->name('featured.index');
    Route::get('/featured-services/{featuredService}/edit', [App\Http\Controllers\Admin\FeaturedServiceController::class, 'edit'])->name('featured.edit');
    Route::put('/featured-services/{featuredService}', [App\Http\Controllers\Admin\FeaturedServiceController::class, 'update'])->name('featured.update');
    Route::get('/before-after', [App\Http\Controllers\Admin\BeforeAfterController::class, 'index'])->name('before-after.index');
    Route::get('/before-after/{beforeAfterItem}/edit', [App\Http\Controllers\Admin\BeforeAfterController::class, 'edit'])->name('before-after.edit');
    Route::put('/before-after/{beforeAfterItem}', [App\Http\Controllers\Admin\BeforeAfterController::class, 'update'])->name('before-after.update');
});