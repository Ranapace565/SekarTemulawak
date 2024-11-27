<?php

namespace App\Http\Controllers;

use App\Charts\PendapatanChart;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Produk;
use App\Models\artikel;
use App\Models\pesanan;
use App\Charts\ProdukChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminPesananController extends Controller
{
    public function index(Request $request,)
    {
        $filter = $request->get('duration', 'semua'); // Ambil input atau default ke 'semua'
        $query = Pesanan::query();

        // Filter berdasarkan nilai yang dipilih di dropdown
        switch ($filter) {
            case 'hari ini':
                $query->whereDate('created_at', now()->toDateString());
                break;
            case 'minggu ini':
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'bulan ini':
                $query->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);
                break;
            case '3 bulan terakhir':
                $query->whereBetween('created_at', [now()->subMonths(3), now()]);
                break;
            case 'tahun ini':
                $query->whereYear('created_at', now()->year);
                break;
            case 'semua':
            default:
                // Tidak ada filter, ambil semua data
                break;
        }

        // Urutkan pesanan berdasarkan tanggal terbaru
        $pesanan = $query->orderBy('created_at', 'desc')->paginate(12);

        // Kirim data ke view
        return view('admin_pesanan.daftar_pesanan', compact('pesanan'))
            ->with('title', 'Daftar Pesanan');
    }

    public function edit(Request $request, $id)
    {
        $pesanan = pesanan::with('itemPesanans')->findOrFail($id);
        // dd($pesanan->status);
        return view('admin_pesanan.pesanan', ['pesanan' => $pesanan, 'title' => 'Pembayaran']);
    }

    public function update(Request $request, $id)
    {

        $pesanan = Pesanan::findOrFail($id);
        // dd($pesanan);


        if ($request->filled('status')) {
            $pesanan->status = $request->status; // Mengubah status sesuai request
        }

        // Simpan perubahan lainnya jika ada (opsional)
        // $pesanan->save();

        if ($pesanan->bukti !== 'Dibayar') {
            // Jika sudah dibayar, update status pesanan menjadi 'Approve'
            $pesanan->status = 'Approve';
            $pesanan->save();

            return redirect()->route('admin-pesanan.edit', $pesanan->id)
                ->with('success', 'Pesanan berhasil diperbarui!');
        } else {
            // Jika belum dibayar, kirim respons error
            return redirect()->route('admin-pesanan.edit', $pesanan->id)
                ->with('error', 'Pesanan Belum Mengirim Bukti Pembayaran!');
        }

        // Redirect dengan pesan sukses
        // return redirect()->route('admin-pesanan.edit', $pesanan->id)
        //     ->with('success', 'Pesanan berhasil diperbarui!');
    }

    private function getJumlahProduk()
    {
        return Produk::count();
    }

    private function getJumlahArtikel()
    {
        return artikel::count();
    }

    private function getUserTerdaftar()
    {
        return User::count();
    }

    public function laporan(Request $request, ProdukChart $prochart, PendapatanChart $pendapatan)
    {
        $data = $prochart->build();
        $pendapatan = $pendapatan->build();
        // dd($data);
        $filter = $request->get('duration', 'semua'); // Ambil filter dari input

        // Tentukan periode waktu berdasarkan filter
        switch ($filter) {
            case 'hari ini':
                $start = Carbon::today();
                $end = Carbon::now();
                break;
            case 'minggu ini':
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek();
                break;
            case 'bulan ini':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                break;
            case 'tahun ini':
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfYear();
                break;
            default: // Semua data
                $start = null;
                $end = null;
                break;
        }

        // Query pesanan berdasarkan periode
        $query = Pesanan::query();
        if ($start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }

        // Jumlah pesanan dan total pembayaran
        $jumlahPesanan = $query->count();
        $totalPembayaran = $query->sum('totals');

        // Produk terjual dari items_pesanan
        $produkTerjual = DB::table('item_pesanans')
            ->join('pesanans', 'item_pesanans.pesanan_id', '=', 'pesanans.id')
            ->when($start && $end, function ($q) use ($start, $end) {
                $q->whereBetween('pesanans.created_at', [$start, $end]);
            })
            ->sum('item_pesanans.jumlah');

        // Panggil metode untuk mendapatkan jumlah produk dan artikel
        $jumlahProduk = $this->getJumlahProduk();
        $jumlahArtikel = $this->getJumlahArtikel();
        $userTerdaftar = $this->getUserTerdaftar();

        // Kembalikan data ke view
        return view('admin_home.dashboard', [
            'jumlahPesanan' => $jumlahPesanan,
            'totalPembayaran' => $totalPembayaran,
            'produkTerjual' => $produkTerjual,
            'filter' => $filter,
            'jumlahProduk' => $jumlahProduk,
            'jumlahArtikel' => $jumlahArtikel,
            'jumlahUser' => $userTerdaftar,
            'data' => $data,
            'pendapatan' => $pendapatan,
        ])->with('title', 'Laporan Pesanan');
    }
}
