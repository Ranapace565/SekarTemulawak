<?php

namespace App\Http\Controllers;

use App\Models\Promosi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromosiController extends Controller
{
    public function index()
    {

        $Promosis = Promosi::all();
        // dd($Promosis);
        return view('admin_promosi.daftar_promosi', [
            'Promosi' => $Promosis,
            'title' => 'Daftar Promosi',
        ]);
    }

    public function  create()
    {
        return view('admin_promosi.tambah_promosi', [
            'title' => 'Tambah Gambar Promosi',
        ]);
    }

    // Menyimpan Promosi baru
    public function store(Request $request)
    {

        // Validasi input
        $validated = $request->validate([
            'alt' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg', // max 2MB
        ]);

        // Menyimpan gambar ke folder 'promosi_img'
        $imageName = time() . '-' . $request->file('gambar')->getClientOriginalName();
        $imagePath = $request->file('gambar')->storeAs('promosi_img', $imageName);
        $validated['gambar'] = basename($imagePath);

        // Simpan data Promosi ke database
        $Promosi = Promosi::create([
            'alt' => $validated['alt'],
            'gambar' => $validated['gambar'],
        ]);
        //


        return redirect()->route('admin-Promosi.index')->with('success', 'Promosi berhasil ditambahkan!');
    }

    // Menghapus Promosi beserta gambar
    public function destroy($id)
    {
        $Promosi = Promosi::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($Promosi->gambar) {
            Storage::delete('promosi_img/' . $Promosi->gambar);
        }

        // Hapus data Promosi dari database
        $Promosi->delete();

        return redirect()->route('admin-Promosi.index')->with('success', 'Promosi berhasil dihapus!');
    }
}
