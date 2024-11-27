<?php

namespace App\Charts;

use App\Models\pesanan;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PendapatanChart extends Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $tahun = date('Y');
        $bulanTerakhir = date('m'); // Mendapatkan bulan terakhir (bulan saat ini)
        $dataBulan = [];
        $dataTotal = [];

        for ($i = 1; $i <= $bulanTerakhir; $i++) {
            // Mendapatkan total pendapatan untuk setiap bulan
            $totalPenjualan = pesanan::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->where('status', 'Approve')
                ->sum('totals');

            // Menambahkan nama bulan dan total pendapatan ke array data
            $dataBulan[] = date('F', mktime(0, 0, 0, $i, 10));
            $dataTotal[] = $totalPenjualan;
        }

        return $this->chart->lineChart()
            ->setTitle('Pendapatan Bulanan')
            ->setSubtitle('Total Pendapatan Per Bulan Tahun ' . $tahun)
            ->setHeight(300)
            ->addData('Total Pendapatan', $dataTotal) // Data total pendapatan tiap bulan
            ->setXAxis($dataBulan); // Nama bulan sebagai sumbu X
    }
}
