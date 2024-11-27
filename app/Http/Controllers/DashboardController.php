<?php

namespace App\Http\Controllers;

use App\Charts\ProdukChart;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Produk;
use App\Models\artikel;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
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
    private function getPesananKonfirm()
    {
        return pesanan::where('status', 'konfirmasi')->count();
    }

    // public function index(Request $request)
    // {
    //     $filter = $request->get('duration', 'semua');

    //     switch ($filter) {
    //         case 'hari ini':
    //             $start = Carbon::today();
    //             $end = Carbon::now();
    //             break;
    //         case 'minggu ini':
    //             $start = Carbon::now()->startOfWeek();
    //             $end = Carbon::now()->endOfWeek();
    //             break;
    //         case 'bulan ini':
    //             $start = Carbon::now()->startOfMonth();
    //             $end = Carbon::now()->endOfMonth();
    //             break;
    //         case 'tahun ini':
    //             $start = Carbon::now()->startOfYear();
    //             $end = Carbon::now()->endOfYear();
    //             break;
    //         default: // Semua data
    //             $start = null;
    //             $end = null;
    //             break;
    //     }

    //     // Query pesanan berdasarkan periode
    //     $query = pesanan::query();
    //     if ($start && $end) {
    //         $query->whereBetween('created_at', [$start, $end]);
    //     }

    //     // Jumlah pesanan dan total pembayaran
    //     $jumlahPesanan = $query->whereNotIn('status', ['Belum dibayar', 'Sudah dibayar'])->count();
    //     $totalPembayaran = $query->sum('totals');

    //     $totalPembayaran = $query->sum('totals');

    //     // Produk terjual dari items_pesanan
    //     $produkTerjual = DB::table('item_pesanans')
    //         ->join('pesanans', 'item_pesanans.pesanan_id', '=', 'pesanans.id')
    //         ->when($start && $end, function ($q) use ($start, $end) {
    //             $q->whereBetween('pesanans.created_at', [$start, $end]);
    //         })
    //         ->sum('item_pesanans.jumlah');

    //     // Panggil metode untuk mendapatkan jumlah produk dan artikel
    //     $jumlahProduk = $this->getJumlahProduk();
    //     $jumlahArtikel = $this->getJumlahArtikel();
    //     $userTerdaftar = $this->getUserTerdaftar();

    //     // Kembalikan data ke view
    //     return view('admin_home.dashboard', [
    //         'jumlahPesanan' => $jumlahPesanan,
    //         'totalPembayaran' => $totalPembayaran,
    //         'produkTerjual' => $produkTerjual,
    //         'filter' => $filter,
    //         'jumlahProduk' => $jumlahProduk,
    //         'jumlahArtikel' => $jumlahArtikel,
    //         'jumlahUser' => $userTerdaftar,
    //     ])->with('title', 'Laporan Pesanan');
    // }

    public function produkChart(ProdukChart $chart)
    {
        return view('admin_home.laporan_penjualan', ['chart' => $chart->build(), 'title' => 'tot']);
    }

    private function Chart(ProdukChart $chart)
    {
        return $chart->build();
    }


    public function index(Request $request, ProdukChart $prochart)
    {
        $data = $prochart->build();
        dd("ssss");
        $filter = $request->get('duration', 'semua');

        // Tentukan rentang waktu berdasarkan filter
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
        $query = pesanan::query();
        if ($start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }

        // Jumlah pesanan berdasarkan status selain 'Belum dibayar' dan 'Sudah dibayar'
        $jumlahPesanan = $query->whereNotIn('status', ['Belum dibayar', 'Sudah dibayar'])->count();

        // Total pembayaran hanya untuk status selain 'Belum dibayar' dan 'Sudah dibayar'
        $totalPembayaran = $query->whereNotIn('status', ['Belum dibayar', 'Sudah dibayar'])
            ->sum('totals');

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
        dd($data);

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
        ])->with('title', 'Laporan Pesanan');
    }
}
