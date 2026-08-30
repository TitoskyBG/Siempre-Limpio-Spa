<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        // Extrae todas las configuraciones en un formato fácil de usar, ej: $settings['hero_title']
        $settings = SiteSetting::pluck('value', 'key');

        return view('public.home', compact('settings'));//dejamos public.home porque el home.blade.php esta dentro de la carpeta public
    }                                                   //...esta dentro de la carpeta public
}