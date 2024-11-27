<?php

namespace App\Charts;

use App\Models\itemPesanan;
use App\Models\pesanan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProdukChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $tahun = date('Y');
        $bulan =  date('m');
        $dataBulan = [];
        $dataTotal = [];
        $dataPesanan = [];
        for ($i = 1; $i <= $bulan; $i++) {
            // $totalPenjualan = itemPesanan::whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->where('status', 'approve')->sum('jumlah');
            // $dataBulan[] = $i;
            // $dataTotal[] = $totalPenjualan;

            $totalPenjualan = ItemPesanan::whereHas('pesanan', function ($query) use ($tahun, $i) {
                $query->whereYear('created_at', $tahun)
                    ->whereMonth('created_at', $i)
                    ->where('status', 'Approve');
            })->sum('jumlah');

            $totalPesanan = ItemPesanan::whereHas('pesanan', function ($query) use ($tahun, $i) {
                $query->whereYear('created_at', $tahun)
                    ->whereMonth('created_at', $i)
                    ->where('status', 'Approve');
            })->count();

            $dataBulan[] = date('F', mktime(0, 0, 0, $i, 10));

            $dataTotal[] = $totalPenjualan;
            $dataPesanan[] = $totalPesanan;
        }
        // dd($dataTotal);

        return $this->chart->lineChart()
            ->setTitle('Produk Terjual')
            ->setSubtitle('Penjualan Bulanan')
            ->setHeight(300)
            ->addData('Produk Terjual', $dataTotal)
            ->addData('Total Pesanan', $dataPesanan) // contoh data penjualan
            // ->addData('Bulan', $dataBulan)
            ->setXAxis($dataBulan); // contoh label untuk sumbu x
    }
}
