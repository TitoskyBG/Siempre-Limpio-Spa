<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BeforeAfterItem;
use Illuminate\Support\Facades\Storage;

class BeforeAfterController extends Controller
{
    public function index()
    {
        $items = BeforeAfterItem::with('steps')->get();
        return view('admin.before-after.index', compact('items'));
    }

    public function edit(BeforeAfterItem $beforeAfterItem)
    {
        $beforeAfterItem->load('steps');
        return view('admin.before-after.edit', compact('beforeAfterItem'));
    }

    public function update(Request $request, BeforeAfterItem $beforeAfterItem)
    {
        $request->validate([
            'tab_name' => 'required|string|max:50',
            'tag' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'steps' => 'required|array|size:5',
            'steps.*' => 'required|string|max:255',
            'image_before' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120|dimensions:max_width=2400,max_height=2400',
            'image_before_alt' => 'required|string|max:255',
            'image_after' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120|dimensions:max_width=2400,max_height=2400',
            'image_after_alt' => 'required|string|max:255',
        ]);

        // 1. Guardar textos base
        $beforeAfterItem->update([
            'tab_name' => $request->tab_name,
            'tag' => $request->tag,
            'title' => $request->title,
            'description' => $request->description,
            'image_before_alt' => $request->image_before_alt,
            'image_after_alt' => $request->image_after_alt,
        ]);

        // 2. Actualizar los 5 pasos
        $beforeAfterItem->steps()->delete();
        foreach ($request->steps as $stepText) {
            $beforeAfterItem->steps()->create(['description' => $stepText]);
        }

        // 3. Manejar Imagen de "Antes"
        if ($request->hasFile('image_before')) {
            if ($beforeAfterItem->image_before_path && !str_starts_with($beforeAfterItem->image_before_path, 'assets/')) {
                Storage::disk('public')->delete($beforeAfterItem->image_before_path);
            }
            $pathBefore = $request->file('image_before')->store('site-content', 'public');
            $beforeAfterItem->update(['image_before_path' => $pathBefore]);
        }

        // 4. Manejar Imagen de "Después"
        if ($request->hasFile('image_after')) {
            if ($beforeAfterItem->image_after_path && !str_starts_with($beforeAfterItem->image_after_path, 'assets/')) {
                Storage::disk('public')->delete($beforeAfterItem->image_after_path);
            }
            $pathAfter = $request->file('image_after')->store('site-content', 'public');
            $beforeAfterItem->update(['image_after_path' => $pathAfter]);
        }

        return redirect()->route('admin.before-after.index')->with('success', 'Comparador actualizado correctamente.');
    }
}