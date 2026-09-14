<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeforeAfterItem;
use Illuminate\Http\Request;
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
            'tag' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'steps' => 'required|array|size:5',
            'steps.*' => 'required|string|max:255',
            'photo_antes' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120|dimensions:max_width=2400,max_height=2400',
            'alt_antes' => 'required|string|max:255',
            'photo_despues' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120|dimensions:max_width=2400,max_height=2400',
            'alt_despues' => 'required|string|max:255',
        ]);

        $beforeAfterItem->tag = $request->tag;
        $beforeAfterItem->title = $request->title;
        $beforeAfterItem->description = $request->description;

        // El slider público (home.css/before-after.js) pinta "image_before_path" como la
        // capa base que queda visible a la derecha (etiqueta "Después") e "image_after_path"
        // como la capa recortada que queda visible a la izquierda (etiqueta "Antes"). Por eso
        // la foto "Antes" del formulario se guarda en image_after_path y viceversa: es
        // intencional, no lo inviertas sin revisar el CSS.
        if ($request->hasFile('photo_despues')) {
            $path = $request->file('photo_despues')->store('site-content', 'public');
            if ($beforeAfterItem->image_before_path && !str_starts_with($beforeAfterItem->image_before_path, 'assets/')) {
                Storage::disk('public')->delete($beforeAfterItem->image_before_path);
            }
            $beforeAfterItem->image_before_path = $path;
        }
        $beforeAfterItem->image_before_alt = $request->alt_despues;

        if ($request->hasFile('photo_antes')) {
            $path = $request->file('photo_antes')->store('site-content', 'public');
            if ($beforeAfterItem->image_after_path && !str_starts_with($beforeAfterItem->image_after_path, 'assets/')) {
                Storage::disk('public')->delete($beforeAfterItem->image_after_path);
            }
            $beforeAfterItem->image_after_path = $path;
        }
        $beforeAfterItem->image_after_alt = $request->alt_antes;

        $beforeAfterItem->save();

        $beforeAfterItem->steps()->delete();
        foreach ($request->steps as $stepText) {
            $beforeAfterItem->steps()->create(['description' => $stepText]);
        }

        return redirect()->route('admin.before-after.index')->with('success', 'Comparador actualizado correctamente.');
    }
}
