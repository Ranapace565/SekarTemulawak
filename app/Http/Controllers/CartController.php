<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $alll = Cart::when(auth()->user()->id);
        // dd($alll);
        $keranjang = Cart::where("user_id", auth()->user()->id)->get();

        // Membangun array untuk menyimpan produk dengan jumlah
        $produkDetail = $keranjang->map(function ($item) {
            return [
                'nama' => $item->produk->nama, // Ambil nama produk dari relasi
                'harga' => $item->produk->harga, // Ambil harga produk dari relasi
                'jumlah' => $item->jumlah,

                'produk_id' => $item->id, // Ambil jumlah dari cart

                'gambar' => $item->produk->gambar,
                // dd($item->produk->gambar)
            ];
        });

        // dd($produkDetail);

        return view('landingpage.keranjang', [
            'title' => 'Keranjang',
            'produk' => $produkDetail
        ]);
    }
    // auth()->user()->id

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk_id' => 'required|exists:produks,id', // Pastikan id_produk valid
        ]);
        // dd($request->all());

        // Ambil ID user yang sedang login
        $userId = auth()->user()->id;

        // Cek apakah produk sudah ada di keranjang
        $keranjangItem = Cart::where('user_id', $userId)
            ->where('produk_id', $request->produk_id)
            ->first();
        // 

        if ($keranjangItem) {
            // Jika produk sudah ada, tambahkan jumlahnya
            $keranjangItem->jumlah += 1; // Tambah jumlah
            $keranjangItem->save(); // Simpan perubahan
        } else {
            // Jika produk belum ada, buat data baru di keranjang
            Cart::create([
                // dd($userId),
                'user_id' => $userId,
                'produk_id' => $request->produk_id,
                'jumlah' => 1, // Set jumlah awal ke 1
            ]);
        }

        // Berikan respons atau redirect setelah menambahkan produk
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        // Validasi input
        dd("sampai sini");
        $request->validate([
            'produk_id' => 'required|exists:produks,id', // Pastikan id_produk valid
        ]);

        // dd($request->all());

        // Ambil ID user yang sedang login
        $userId = auth()->user()->id;

        // Cek apakah produk sudah ada di keranjang
        $keranjangItem = Cart::where('user_id', $userId)
            ->where('produk_id', $request->produk_id)
            ->first();


        if ($keranjangItem) {
            // Jika produk sudah ada, tambahkan jumlahnya
            $keranjangItem->jumlah -= 1; // Tambah jumlah
            $keranjangItem->save(); // Simpan perubahan
        } else {
            dd($userId);
            // Jika produk belum ada, buat data baru di keranjang
            Cart::create([
                'user_id' => $userId,
                'produk_id' => $request->produk_id,
                'jumlah' => 1, // Set jumlah awal ke 1
            ]);
        }

        // Berikan respons atau redirect setelah menambahkan produk
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($produk_id)
    {
        $deletedCount = Cart::where('produk_id', $produk_id)->delete();

        // Cek apakah ada item yang dihapus
        if ($deletedCount > 0) {
            return response()->json([
                'message' => 'Semua item berhasil dihapus dari keranjang.'
            ], 200);
        }

        // Jika tidak ada item ditemukan untuk dihapus
        return response()->json([
            'message' => 'Tidak ada item ditemukan di keranjang dengan produk_id tersebut.'
        ], 404);
        // return redirect()->back()->with('success', 'Keranjang berhasil dihapus');
    }
}
