<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        return view("admin_team.tambah_team")->with('title', "Tambah Team");
    }
    public function create()
    {
        // Render halaman form tambah tim
        return view('admin_team.tambah-team', ['title' => 'Tambah Tim']);
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        // Simpan gambar dan generate nama unik
        $imageName = time() . '-' . $request->file('gambar')->getClientOriginalName();
        $imagePath = $request->file('gambar')->storeAs('team_img', $imageName, 'public');
        $validated['gambar'] = basename($imagePath);

        // Simpan data tim ke database
        Team::create($validated);

        // Redirect ke halaman daftar tim dengan pesan sukses

        return redirect()->route('admin-tentang.index')->with('success', 'Data tim berhasil ditambahkan!');
    }
    public function destroy($id)
    {
        // dd('sampai');
        // Temukan data tim berdasarkan ID
        $team = Team::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($team->gambar) {
            Storage::disk('public')->delete('team_img/' . $team->gambar);
        }

        // Hapus data tim dari database
        $team->delete();

        // Redirect ke halaman daftar tim dengan pesan sukses
        return redirect()->route('admin-tentang.index')->with('success', 'Data tim berhasil ditambahkan!');
    }
}
