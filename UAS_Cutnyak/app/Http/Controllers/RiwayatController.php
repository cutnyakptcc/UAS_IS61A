<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Teknisi;
use App\Models\Pelanggan;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $rit = Riwayat::all();
        return view('riwayat.index',compact('nomor','rit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pel = Pelanggan::all();
        $tek = Teknisi::all();
        return view('riwayat.form',compact('pel','tek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rit = new Riwayat();
        $rit->kd_rit = $request->kd_rit;
        $rit->nm_brg = $request->nm_brg;
        $rit->merk_brg = $request->merk_brg;
        $rit->jenis_brg = $request->jenis_brg;
        $rit->pelanggans_id = $request->pelanggan;
        $rit->teknisis_id = $request->teknisi;
        $rit->tgl_per = $request->tgl_per;
        $rit->tgl_sel = $request->tgl_sel;
        $rit->harga = $request->harga;
        $rit->jum= $request->jum;
        $rit->foto = $request->foto->getClientOriginalName();
        $rit->ket= $request->ket;
        $rit->save();

        $request->foto->move('foto',$request->foto->getClientOriginalName());

        return redirect('/riwayat/');
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
        $rit = Riwayat::find($id);
        $pel = Pelanggan::all();
        $tek = Teknisi::all();
        return view('riwayat.edit',compact('rit','pel','tek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rit = Riwayat::find($id);
        $rit->kd_rit = $request->kd_rit;
        $rit->nm_brg = $request->nm_brg;
        $rit->merk_brg = $request->merk_brg;
        $rit->jenis_brg = $request->jenis_brg;
        $rit->pelanggans_id = $request->pelanggan;
        $rit->teknisis_id = $request->teknisi;
        $rit->tgl_per = $request->tgl_per;
        $rit->tgl_sel = $request->tgl_sel;
        $rit->harga = $request->harga;
        $rit->jum= $request->jum;
        $rit->foto = $request->foto->getClientOriginalName();
        $rit->ket= $request->ket;
        $rit->save();

        $request->foto->move('foto',$request->foto->getClientOriginalName());

        return redirect('/riwayat/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rit = Riwayat::find($id);
        $rit->delete();

        return redirect('/riwayat/');
    }
}