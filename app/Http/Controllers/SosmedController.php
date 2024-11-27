<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    public function index()
    {
        //
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        // Simpan data ke database
        Sosmed::create($validatedData);

        return redirect()->route('admin-tentang.index')->with('success', '');
    }
    public function destroy($id)
    {
        // dd(Sosmed::find($id));
        Sosmed::destroy($id);
        return redirect()->route('admin-tentang.index')->with('success', '');
    }
}
