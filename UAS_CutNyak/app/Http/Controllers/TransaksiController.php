<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $tra = Transaksi::all();
        return view('transaksi.index',compact('nomor','tra'));
    }

    /**
    * Display the dashboard.
     */
    public function dashboard()
    {
        // Ambil data dari model
        $totalTransaksi = Transaksi::count();
        $totalPelanggan = Pelanggan::count();
        $totalTeknisi = Teknisi::count();
        $totalPendapatan = Transaksi::sum('jumlah');

        // Data untuk grafik
        $transaksiPerBulan = Transaksi::selectRaw('MONTH(created_at) as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->get()
            ->pluck('jumlah', 'bulan')
            ->toArray();

        $transaksiLabels = array_keys($transaksiPerBulan);
        $transaksiData = array_values($transaksiPerBulan);


        // Kirim data ke view
        return view('dashboard', compact(
            'totalTransaksi',
            'totalPelanggan',
            'totalTeknisi',
            'totalPendapatan',
            'transaksiLabels',
            'transaksiData',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rit = Riwayat::all();
        return view('transaksi.form',compact('rit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tra = new Transaksi();
        $tra->nofak = $request->nofak;
        $tra->riwayats_id = $request->riwayat;
        $tra->bukti_pem = $request->bukti_pem->getClientOriginalName();
        $tra->save();

        $request->bukti_pem->move('bukti_pembayaran',$request->bukti_pem->getClientOriginalName());

        return redirect('/transaksi/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

