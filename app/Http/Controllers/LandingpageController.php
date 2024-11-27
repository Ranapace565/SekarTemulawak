<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Alamat;
use App\Models\Produk;
use App\Models\Sosmed;
use App\Models\artikel;
use App\Models\Landing;
use App\Models\Promosi;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        $produk = Produk::paginate(12);;
        $artikels = artikel::paginate(9);
        $sosmed = Sosmed::all();
        $teams = Team::all();
        $address = Alamat::all();
        $promosi = Promosi::all();
        $landing = Landing::all();

        return view('landingpage.landingpage', [
            'title' => 'Daftar Produk',
            'produk' => $produk,
            'artikels' => $artikels,
            'sosmed' => $sosmed,
            'teams' => $teams,
            'alamat' => $address,
            'promosi' => $promosi,
            'landing' => $landing,
        ]);
    }
    public function show($slug)
    {
        $produk = Produk::where('slug', $slug)->firstOrFail();
        return view('landingpage.produk', compact('produk'))->with('title', 'Detail Produk');
    }

    public function edit($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('landingpage.artikel', compact('artikel'))->with('title', 'Detail Artikel');
    }
}
