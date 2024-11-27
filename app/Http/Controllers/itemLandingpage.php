<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class itemLandingpage extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $produks = Produk::query()
            ->when($search, function ($query, $search) {
                $query->orderByRaw(
                    "(
                    CASE 
                        WHEN nama LIKE ? THEN 1
                        WHEN harga LIKE ? THEN 2
                        WHEN ukuran LIKE ? THEN 3
                        ELSE 4 
                    END
                ) ASC",
                    ["%{$search}%", "%{$search}%", "%{$search}%"]
                );
            })
            ->paginate(12);

        return view('landingpage.daftar_item', [
            'title' => 'Daftar Produk',
            'produk' => $produks,
            'search' => $search,
        ]);
    }
}
