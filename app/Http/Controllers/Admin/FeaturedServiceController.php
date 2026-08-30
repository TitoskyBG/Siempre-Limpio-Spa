<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedService;
use Illuminate\Support\Facades\Storage;

class FeaturedServiceController extends Controller
{
    public function index()
    {
        $services = FeaturedService::with(['steps', 'images'])->get();
        return view('admin.featured-services.index', compact('services'));
    }

    public function edit(FeaturedService $featuredService)
    {
        $featuredService->load(['steps', 'images']);
        return view('admin.featured-services.edit', compact('featuredService'));
    }

    public function update(Request $request, FeaturedService $featuredService)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'steps' => 'required|array|size:6',
            'steps.*' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120|dimensions:max_width=2400,max_height=2400',
            'alt_texts' => 'required|array|size:4',
            'alt_texts.*' => 'required|string|max:255',
        ]);

        // 1. Actualizar textos base
        $featuredService->update([
            'tag' => $request->tag,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // 2. Actualizar los 6 pasos exactamente
        $featuredService->steps()->delete();
        foreach ($request->steps as $stepText) {
            $featuredService->steps()->create(['description' => $stepText]);
        }

        // 3. Manejar imágenes (las 4 requeridas)
        $existingImages = $featuredService->images()->orderBy('is_main', 'desc')->orderBy('id', 'asc')->get();

        foreach ($request->alt_texts as $index => $altText) {
            $imgRecord = $existingImages[$index] ?? null;
            $isMain = ($index === 0); // La primera es la principal (grande)

            $imagePath = $imgRecord ? $imgRecord->image_path : null;

            // Si el usuario subió un archivo nuevo para esta posición
            if ($request->hasFile("images.{$index}")) {
                $file = $request->file("images.{$index}");
                $imagePath = $file->store('site-content', 'public');

                // Borrar archivo antiguo si existía
                if ($imgRecord && $imgRecord->image_path) {
                    Storage::disk('public')->delete($imgRecord->image_path);
                }
            }

            // Validar que no quede ninguna imagen vacía si es un registro nuevo
            if (!$imagePath) {
                return back()->withErrors(['images' => 'Cada una de las 4 imágenes es obligatoria.'])->withInput();
            }

            if ($imgRecord) {
                $imgRecord->update([
                    'image_path' => $imagePath,
                    'alt_text' => $altText,
                    'is_main' => $isMain,
                ]);
            } else {
                $featuredService->images()->create([
                    'image_path' => $imagePath,
                    'alt_text' => $altText,
                    'is_main' => $isMain,
                ]);
            }
        }

        return redirect()->route('admin.featured.index')->with('success', 'Servicio destacado actualizado correctamente.');
    }
}