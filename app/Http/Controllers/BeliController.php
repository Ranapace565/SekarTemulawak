<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeliController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data produk yang dipilih
        $produkTerpilih = $request->input('produk_id');
        $namaProduk = $request->input('nama_produk');
        $hargaProduk = $request->input('harga_produk');
        $jumlahProduk = '1';

        // Siapkan array produk terpilih
        $pesanan = [];
        if ($produkTerpilih) {
            // Pastikan data dengan key yang sesuai ada pada setiap array
            $pesanan[] = [
                'id' => $produkTerpilih,
                'nama' => $namaProduk,
                'harga' => $hargaProduk,
                'jumlah' => $jumlahProduk,
                'total' => $hargaProduk * $jumlahProduk,
            ];
        }

        // Kirim data ke view pemesanan
        return view('landingpage.pemesanan', compact('pesanan'))->with('title', 'Detail Produk');
    }
}
