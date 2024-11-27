<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Models\itemPesanan;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        // Ambil data produk yang dipilih
        $produkTerpilih = $request->input('produk_id');
        $namaProduk = $request->input('nama_produk');
        $hargaProduk = $request->input('harga_produk');
        $jumlahProduk = $request->input('jumlah_produk');

        // dd($request->all());
        // Siapkan array produk terpilih
        $pesanan = [];
        // dd($pesanan);
        if ($produkTerpilih) {
            foreach ($produkTerpilih as $id) {
                // Pastikan data dengan key yang sesuai ada pada setiap array
                if (isset($namaProduk[$id], $hargaProduk[$id], $jumlahProduk[$id])) {
                    $pesanan[] = [
                        'id' => $id,
                        'nama' => $namaProduk[$id],
                        'harga' => $hargaProduk[$id],
                        'jumlah' => $jumlahProduk[$id],
                        'total' => $hargaProduk[$id] * $jumlahProduk[$id],
                    ];
                }
            }
        }

        // Kirim data ke view pemesanan
        return view('landingpage.pemesanan', compact('pesanan'))->with('title', 'Detail Produk');
    }
    public function store(Request $request)
    {
        // Validasi input

        if (empty($request->nama_produk) || empty($request->jumlah_produk) || empty($request->harga_produk)) {
            abort(404); // Arahkan ke halaman 404 jika tidak ada produk
        }
        $request->validate([
            'namaPenerima' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'telp' => 'required|string|min:12|max:20',
        ]);

        // Gabungkan alamat
        $alamat = 'Prov. ' . $request->provinsi . ', ' . 'Kota. ' . $request->kota . ', ' . 'Kec. ' . $request->kecamatan . ', ' . 'Detail Alamat : ' . $request->detail;

        $userId = auth()->user()->id;

        $pesanan = pesanan::create([
            'name' => $request->namaPenerima,
            'alamat' => $alamat,
            'telp' => $request->telp,
            'totals' => $request->totals,
            'status' => 'belum dibayar',
            'user_id' => $userId,
        ]);

        // Isi tabel item_pesanans
        // $leng = count($request->nama_produk);
        foreach ($request->nama_produk as $key => $nama) {
            itemPesanan::create([
                'pesanan_id' => $pesanan->id,
                'name' => $nama,
                'jumlah' => $request->jumlah_produk[$key],
                // dd($request->harga_produk[$key]),
                'harga' => $request->harga_produk[$key],
                'total' => $request->harga_total[$key],
                // dd('harga')
            ]);
        }
        // dd("berhasil tod");
        $pesanan = Pesanan::with('itemPesanans')->find($pesanan->id);

        return redirect()->route('pemesanan.edit', ['pemesanan' => $pesanan->id]);
    }

    public function edit(Request $request, $id)
    {
        $pesanan = pesanan::with('itemPesanans')->findOrFail($id);
        $rekening = Rekening::all();
        // dd($pesanan->status);
        return view('landingpage.pembayaran', ['pesanan' => $pesanan, 'title' => 'Pembayaran', 'rekening' => $rekening]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input termasuk gambar
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'nullable|string'
        ]);

        // Cari pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);


        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($pesanan->bukti && Storage::exists('pembayaran_img/' . $pesanan->bukti)) {
                Storage::delete('pembayaran_img/' . $pesanan->bukti);
            }

            // Simpan gambar baru
            $imageName = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $imagePath = $request->file('gambar')->storeAs('pembayaran_img', $imageName);
            $validated['gambar'] = basename($imagePath);

            // Simpan nama gambar ke kolom 'bukti'
            $pesanan->bukti = basename($imagePath);

            // Ubah status menjadi "sudah dibayar"
            $pesanan->status = 'sudah dibayar';
        }

        if ($request->filled('status')) {
            $pesanan->status = $request->status; // Mengubah status sesuai request
        }

        // Simpan perubahan lainnya jika ada (opsional)
        $pesanan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('pemesanan.edit', $pesanan->id)
            ->with('success', 'Pesanan berhasil diperbarui!');
    }
    public function show()
    {
        $pesanan = Pesanan::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get(); // Ambil semua pesanan user yang login

        // Jika pesanan tidak ditemukan, bisa berikan handling sesuai kebutuhan
        if ($pesanan->isEmpty()) {
            return view('landingpage.daftar_pesanan', [
                'pesanan' => 'Belum ada pesanan',
                'title' => 'Daftar Pesanan'
            ]);
        }

        return view('landingpage.daftar_pesanan', [
            'pesanan' => $pesanan,
            'title' => 'Daftar Pesanan'
        ]);
    }

    public function destroy($id)
    {
        // Ambil data pesanan berdasarkan ID
        // Ambil data pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);
        // dd($pesanan);
        // Hapus item pesanan terkait
        $pesanan->itemPesanans()->delete();

        // Periksa apakah ada gambar bukti pembayaran
        if ($pesanan->bukti && Storage::exists('pembayaran_img/' . $pesanan->bukti)) {
            // Hapus gambar dari storage
            Storage::delete('pembayaran_img/' . $pesanan->bukti);
        }

        // Hapus pesanan dari database
        $pesanan->delete();

        // Redirect atau kembalikan respons ke halaman daftar pesanan
        return view('landingpage.daftar_pesanan', [
            'pesanan' => Pesanan::all(),  // Ambil semua pesanan untuk ditampilkan
            'title' => 'Daftar Pesanan'
        ]);
    }
}
