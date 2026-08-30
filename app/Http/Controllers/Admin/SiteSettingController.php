<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validaciones estrictas
        $request->validate([
            'hero_tag' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'hero_image_caption' => 'required|string|max:255',
            'hero_image_alt' => 'required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120|dimensions:max_width=2400,max_height=2400',
            'contact_title' => 'required|string|max:255',
            'contact_description' => 'required|string',
            'contact_phone' => 'required|string|max:255',
            'contact_instagram' => 'required|string|max:255',
            'contact_hours_weekday' => 'required|string|max:255',
            'contact_hours_saturday' => 'required|string|max:255',
            'contact_hours_sunday' => 'required|string|max:255',
        ]);

        $data = $request->except(['_token', 'hero_image']);

        // Carga segura de imagen
        if ($request->hasFile('hero_image')) {
            $oldImage = SiteSetting::where('key', 'hero_image_path')->first();
            $path = $request->file('hero_image')->store('site-content', 'public');
            
            // Elimina la imagen anterior solo si se sube una nueva
            if ($oldImage && $oldImage->value) {
                Storage::disk('public')->delete($oldImage->value);
            }
            
            SiteSetting::updateOrCreate(['key' => 'hero_image_path'], ['value' => $path]);
        }

        // Guardado de textos
        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Contenido actualizado correctamente.');
    }
}