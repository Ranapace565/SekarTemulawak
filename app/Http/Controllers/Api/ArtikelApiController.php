<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelApiController extends Controller
{
    // Mendapatkan semua artikel
    public function index()
    {
        $artikels = Artikel::select('title', 'slug', 'tumbnile', 'kategori', 'body', 'created_at')->paginate(10);
        return response()->json([
            'status' => 'success',
            'data' => $artikels
        ], 200);
    }

    // Mendapatkan detail artikel berdasarkan slug
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if (!$artikel) {
            return response()->json([
                'status' => 'error',
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $artikel
        ], 200);
    }

    // Menambahkan artikel
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategori' => 'required|string',
            'body' => 'required',
        ]);

        // Membuat slug unik
        $slug = Str::slug($validatedData['title'], '-');
        $count = Artikel::where('slug', 'like', "{$slug}%")->count();
        $uniqueSlug = $count ? "{$slug}-" . ($count + 1) : $slug;

        // Upload gambar jika ada
        $imageName = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('artikel_img', $imageName, 'public');
        }

        // Simpan artikel
        $artikel = Artikel::create([
            'title' => $validatedData['title'],
            'slug' => $uniqueSlug,
            'tumbnile' => $imageName,
            'kategori' => $validatedData['kategori'],
            'body' => $validatedData['body'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Artikel berhasil ditambahkan',
            'data' => $artikel
        ], 201);
    }

    // Mengupdate artikel
    public function update(Request $request, $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if (!$artikel) {
            return response()->json([
                'status' => 'error',
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'kategori' => 'required|string',
            'body' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Membuat slug baru jika title berubah
        $newSlug = Str::slug($validatedData['title'], '-');
        $count = Artikel::where('slug', 'like', "{$newSlug}%")
            ->where('id', '!=', $artikel->id)
            ->count();
        $uniqueSlug = $count ? "{$newSlug}-" . ($count + 1) : $newSlug;

        // Update gambar jika ada
        if ($request->hasFile('gambar')) {
            if ($artikel->tumbnile && Storage::exists('public/artikel_img/' . $artikel->tumbnile)) {
                Storage::delete('public/artikel_img/' . $artikel->tumbnile);
            }

            $file = $request->file('gambar');
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('artikel_img', $imageName, 'public');
            $validatedData['tumbnile'] = $imageName;
        } else {
            $validatedData['tumbnile'] = $artikel->tumbnile;
        }

        // Update data artikel
        $artikel->update([
            'title' => $validatedData['title'],
            'kategori' => $validatedData['kategori'],
            'body' => $validatedData['body'],
            'slug' => $uniqueSlug,
            'tumbnile' => $validatedData['tumbnile'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Artikel berhasil diperbarui',
            'data' => $artikel
        ], 200);
    }

    // Menghapus artikel
    public function destroy($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if (!$artikel) {
            return response()->json([
                'status' => 'error',
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        // Hapus gambar dari storage
        if ($artikel->tumbnile && Storage::exists('public/artikel_img/' . $artikel->tumbnile)) {
            Storage::delete('public/artikel_img/' . $artikel->tumbnile);
        }

        $artikel->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Artikel berhasil dihapus'
        ], 200);
    }
}
