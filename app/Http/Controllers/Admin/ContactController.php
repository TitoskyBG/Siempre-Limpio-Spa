<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.contact', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'contact_title' => 'required|string|max:255',
            'contact_description' => 'required|string',
            'contact_phone' => 'required|string|max:255',
            'contact_instagram' => 'required|string|max:255',
            'contact_hours_weekday' => 'required|string|max:255',
            'contact_hours_saturday' => 'required|string|max:255',
            'contact_hours_sunday' => 'required|string|max:255',
        ]);

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.contact.edit')->with('success', 'La información de contacto fue actualizada correctamente.');
    }
}
