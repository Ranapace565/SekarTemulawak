<?php



namespace App\Http\Controllers;

use App\Models\Produk;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
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
                        WHEN bahan LIKE ? THEN 3
                        ELSE 4 
                    END
                ) ASC",
                    ["%{$search}%", "%{$search}%", "%{$search}%"]
                );
            })
            ->paginate(12);

        return view('admin_produk.daftar_produk', [
            'title' => 'Daftar Produk',
            'produks' => $produks,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin_produk.tambah_produk', [
            'title' => 'Tambah Produk'
        ]);
    }

    public function store(StoreProdukRequest $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required',
            'slug' => 'nullable|unique:produks,slug', // Slug nullable untuk slug otomatis
            'bahan' => 'required',
            'manfaat' => 'required',
            'ukuran' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Buat slug otomatis jika slug tidak diberikan
        $slug = Str::slug($validated['nama'], '-');
        $count = Produk::where('slug', 'like', "{$slug}%")->count();
        $validated['slug'] = $count ? "{$slug}-" . ($count + 1) : $slug;

        // Simpan gambar dengan nama unik
        $imageName = time() . '-' . $request->file('gambar')->getClientOriginalName();
        $imagePath = $request->file('gambar')->storeAs('img', $imageName);
        $validated['gambar'] = basename($imagePath);

        // Simpan produk ke database
        Produk::create($validated);

        return redirect()->route('admin-produk.daftar-produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show($slug)
    {
        $produk = Produk::where('slug', $slug)->firstOrFail();
        return view('admin_produk.produk', compact('produk'))->with('title', 'Detail Produk');
    }

    public function edit($slug)
    {
        $produk = Produk::where('slug', $slug)->firstOrFail();
        // dd($produk);
        return view('admin_produk.ubah_produk', compact('produk'))->with('title', 'Ubah Produk');
    }


    public function update(Request $request, $slug)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required',
            'slug' => 'nullable|unique:produks,slug,' . $slug, // Slug nullable dan unik (kecuali produk ini)
            'bahan' => 'required',
            'manfaat' => 'required',
            'ukuran' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Cari produk berdasarkan ID
        // $produk = Produk::findOrFail( $slug);
        $produk = Produk::where('slug', $slug)->firstOrFail();

        // Cek apakah slug baru perlu di-generate jika tidak diinput
        if (empty($validated['slug'])) {
            $slug = Str::slug($validated['nama'], '-');
            $count = Produk::where('slug', 'like', "{$slug}%")->where('id', '!=', $slug)->count();
            $validated['slug'] = $count ? "{$slug}-" . ($count + 1) : $slug;
        }

        // Cek apakah ada input gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar && Storage::exists('produk_img/' . $produk->gambar)) {
                Storage::delete('produk_img/' . $produk->gambar);
            }

            // Simpan gambar baru
            $imageName = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $imagePath = $request->file('gambar')->storeAs('produk_img', $imageName);
            $validated['gambar'] = basename($imagePath);
        }

        // Update data produk di database
        $produk->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('admin-produk.index')->with('success', 'Produk berhasil diperbarui!');
    }



    public function delete($id)
    {
        $produk = Produk::where('id', $id)->firstOrFail();
        $produk->delete();
        if ($produk->gambar && Storage::exists('produk_img/' . $produk->gambar)) {
            Storage::delete('produk_img/' . $produk->gambar);
        }
        return redirect()->route('admin-produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->gambar && Storage::exists('img/' . $produk->gambar)) {
            Storage::delete('img/' . $produk->gambar);
        }

        $produk->delete();
        return redirect()->route('admin-produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function insert(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required',
            'slug' => 'nullable|unique:produks,slug', // Slug nullable untuk slug otomatis
            'bahan' => 'required',
            'manfaat' => 'required',
            'ukuran' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            // 'status' => 'boolean',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Log::info('Validated Data: ', $validated);
        if (empty($validated['slug'])) {
            $slug = Str::slug($validated['nama'], '-');
            $count = Produk::where('slug', 'like', "{$slug}%")->count();
            $validated['slug'] = $count ? "{$slug}-" . ($count + 1) : $slug;
        }

        $imageName = time() . '-' . $request->file('gambar')->getClientOriginalName();
        $imagePath = $request->file('gambar')->storeAs('produk_img', $imageName);
        $validated['gambar'] = basename($imagePath);

        // Simpan produk ke database
        Produk::create($validated);

        return redirect()->route('admin-produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function search(Request $request)
    {
        $search = $request->Input('search');

        $produks = Produk::where('nama', 'LIKE', '%{$search}%')->get();

        return view('admin_produk.daftar_produk', compact('produks', 'search'));
    }
}
