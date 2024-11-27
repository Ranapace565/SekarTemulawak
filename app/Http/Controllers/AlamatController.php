<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Tempat' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        // Simpan data ke database
        Alamat::create($validatedData);

        return redirect()->route('admin-tentang.index')->with('success', '');
    }
    public function destroy($id)
    {
        // dd(Sosmed::find($id));
        Alamat::destroy($id);
        return redirect()->route('admin-tentang.index')->with('success', '');
    }
}
