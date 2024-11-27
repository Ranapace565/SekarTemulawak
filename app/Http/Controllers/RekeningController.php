<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'atasnama' => 'required|string|max:255',
            'rekening' => 'required|max:255|unique:rekenings,rekening',
            'bank' => 'required|max:255',
        ]);

        // dd('sini');
        // Simpan data ke database
        Rekening::create($validatedData);

        return redirect()->route('admin-tentang.index')->with('success', '');
    }
    public function destroy($id)
    {
        // dd(Sosmed::find($id));
        Rekening::destroy($id);
        return redirect()->route('admin-tentang.index')->with('success', '');
    }
}
