<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bahan' => 'required',
            'manfaat' => 'required',
            'ukuran' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'status' => 'required|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan gambar
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/product_images'); // Menyimpan gambar di storage/app/public/product_images
                $images[] = str_replace('public/', '', $path); // Simpan hanya path relatifnya
            }
        }

        Product::create([
            'name' => $request->name,
            'bahan' => $request->bahan,
            'manfaat' => $request->manfaat,
            'ukuran' => $request->ukuran,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'status' => $request->status,
            'images' => $images,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }
}
