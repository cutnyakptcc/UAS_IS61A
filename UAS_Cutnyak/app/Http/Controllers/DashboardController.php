<?php

namespace App\Http\Controllers;


use App\Models\Riwayat;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalTransaksi = Transaksi::count();
        $totalPelanggan = Pelanggan::count();
        $totalTeknisi = Teknisi::count();
        $totalPendapatan = Transaksi::sum('harga');

        // Ambil transaksi terbaru, misalnya 5 transaksi terakhir
        $recentTransaksi = Transaksi::orderBy('created_at', 'desc')->take(5)->get();

        // Data untuk grafik
        $transaksiLabels = Transaksi::selectRaw('DATE(created_at) as date')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('date');

        $transaksiData = Transaksi::selectRaw('DATE(created_at) as date, COUNT(*) as jumlah')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('jumlah');

        $pendapatanLabels = Transaksi::select('kategori')
            ->groupBy('kategori')
            ->pluck('kategori');

        $pendapatanData = Transaksi::selectRaw('kategori, SUM(harga) as total')
            ->groupBy('kategori')
            ->pluck('total');

        return view('dashboard', compact('totalTransaksi', 'totalPelanggan', 'totalTeknisi', 'totalPendapatan', 'recentTransaksi', 'transaksiLabels', 'transaksiData', 'pendapatanLabels', 'pendapatanData'));
    }
}
