<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Http\Requests\StoreartikelRequest;
use App\Http\Requests\UpdateartikelRequest;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $artikels = Artikel::query()
            ->when($search, function ($query, $search) {
                $query->orderByRaw(
                    "(
                    CASE 
                        WHEN title LIKE ? THEN 1
                        WHEN kategori LIKE ? THEN 2
                        ELSE 3
                    END
                ) ASC",
                    ["%{$search}%", "%{$search}%"]
                );
            })
            ->paginate(12);

        return view('admin_konten.daftar_artikel', [
            'title' => 'Daftar Artikel',
            'artikels' => $artikels,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_konten.tambah_artikel')->with('title', 'Tambah Artikel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png',
            'kategori' => 'required|string',
            'body' => 'required',
        ]);

        // Buat slug unik untuk title
        $slug = Str::slug($validatedData['title'], '-');
        $count = Artikel::where('slug', 'like', "{$slug}%")->count();
        $uniqueSlug = $count ? "{$slug}-" . ($count + 1) : $slug;

        // Proses upload gambar dengan nama unik
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '-' . $file->getClientOriginalName(); // Nama unik dengan timestamp
            $thumbnailPath = $file->storeAs('artikel_img', $imageName, 'public'); // Simpan di public storage
        }

        // $imagePath = $request->file('gambar')->storeAs(path: 'produk_img', $imageName);
        // $validated['gambar'] = basename($imagePath);

        // Simpan data artikel ke database
        Artikel::create([
            'title' => $validatedData['title'],
            'slug' => $uniqueSlug, // Slug unik
            'tumbnile' => basename($thumbnailPath), // Simpan hanya nama file
            'kategori' => $validatedData['kategori'],
            'body' => $validatedData['body'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin-artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('admin_konten.artikel', compact('artikel'))->with('title', 'Detail Artikel');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('admin_konten.ubah_artikel', compact('artikel'))->with('title', 'Ubah Artikel');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'kategori' => 'required|string',
            'body' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek apakah slug baru perlu di-generate jika tidak diinput
        $newSlug = Str::slug($validated['title'], '-');
        $count = Artikel::where('slug', 'like', "{$newSlug}%")
            ->where('id', '!=', $artikel->id)
            ->count();
        $validated['slug'] = $count ? "{$newSlug}-" . ($count + 1) : $newSlug;

        // Cek apakah ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->tumbnile && Storage::exists('artikel_img/' . $artikel->tumbnile)) {
                Storage::delete('artikel_img/' . $artikel->tumbnile);
            }

            // Simpan gambar baru
            $imageName = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $imagePath = $request->file('gambar')->storeAs('artikel_img', $imageName);
            $validated['tumbnile'] = basename($imagePath);  // Menggunakan kolom 'tumbnile'
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $validated['tumbnile'] = $artikel->tumbnile;
        }

        // Update data artikel di database
        $artikel->update([
            'title' => $validated['title'],
            'kategori' => $validated['kategori'],
            'body' => $validated['body'],
            'slug' => $validated['slug'],
            'tumbnile' => $validated['tumbnile'],  // Pastikan menggunakan 'tumbnile'
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin-artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(artikel $artikel)
    {
        //
    }
}
