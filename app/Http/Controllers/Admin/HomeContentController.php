<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.home-content', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_tag' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'hero_image_caption' => 'required|string|max:255',
            'hero_image_alt' => 'required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120|dimensions:max_width=2400,max_height=2400',
        ]);

        $data = $request->only(['hero_tag', 'hero_title', 'hero_description', 'hero_image_caption', 'hero_image_alt']);

        if ($request->hasFile('hero_image')) {
            $oldImage = SiteSetting::where('key', 'hero_image_path')->first();
            $path = $request->file('hero_image')->store('site-content', 'public');

            if ($oldImage && $oldImage->value) {
                Storage::disk('public')->delete($oldImage->value);
            }

            SiteSetting::updateOrCreate(['key' => 'hero_image_path'], ['value' => $path]);
        }

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.home.edit')->with('success', 'La sección de Inicio fue actualizada correctamente.');
    }
}
