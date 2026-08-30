<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrincipalService;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

class PrincipalServiceController extends Controller
{
    public function edit()
    {
        // Traemos los 6 servicios ordenados por su posición
        $services = PrincipalService::all()->keyBy('position');
        // Traemos las configuraciones (para la descripción e imagen del centro)
        $settings = SiteSetting::pluck('value', 'key');
        
        return view('admin.orbit', compact('services', 'settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'orbit_description' => 'required|string',
            'orbit_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120|dimensions:max_width=2400,max_height=2400',
            'orbit_image_alt' => 'required|string|max:255',
            'services' => 'required|array|size:6',
            'services.*' => 'required|string|max:255',
        ]);

        // 1. Guardar textos generales de la sección
        SiteSetting::updateOrCreate(['key' => 'orbit_description'], ['value' => $request->orbit_description]);
        SiteSetting::updateOrCreate(['key' => 'orbit_image_alt'], ['value' => $request->orbit_image_alt]);

        // 2. Carga segura de imagen central
        if ($request->hasFile('orbit_image')) {
            $oldImage = SiteSetting::where('key', 'orbit_image_path')->first();
            $path = $request->file('orbit_image')->store('site-content', 'public');
            
            if ($oldImage && $oldImage->value) {
                Storage::disk('public')->delete($oldImage->value);
            }
            SiteSetting::updateOrCreate(['key' => 'orbit_image_path'], ['value' => $path]);
        }

        // 3. Actualizar los nombres de los 6 servicios fijos
        foreach ($request->services as $position => $name) {
            PrincipalService::where('position', $position)->update(['name' => $name]);
        }

        return redirect()->route('admin.orbit.edit')->with('success', 'Servicios principales actualizados correctamente.');
    }
}