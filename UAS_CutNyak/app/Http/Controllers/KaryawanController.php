<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $kar = Karyawan::all();
        return view('karyawan.index',compact('nomor','kar'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_kar' => 'required',
            'hp_kar' => 'required'
        ]);

        $kar = new Karyawan;
        $kar->nm_kar = $request->nm_kar;
        $kar->hp_kar = $request->hp_kar;
        $kar->save();

        return redirect('/karyawan/')->with('success', 'Data Karyawan berhasil disimpan');;
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
        $kar = Karyawan::find($id);
        if ($kar) {
            return view('karyawan.edit', compact('kar'));
        } else {
            return redirect('/karyawan/')->withErrors('Data tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nm_kar' => 'require',
            'hp_kar' => 'require'
         ]);

        $kar = Karyawan::find($id);
        if ($kar) {
            $kar->nm_kar = $request->nm_kar;
            $kar->hp_kar = $request->hp_kar;
            $kar->save();
            return redirect('/karyawan/')->with('success', 'Data Karyawan berhasil diupdate');
        } else {
            return redirect('/karyawan/')->withErrors('Data tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kar = Karyawan::find($id);
        if ($kar) {
            $kar->delete();
            return redirect('/karyawan/')->with('success', 'Data Karyawan berhasil dihapus');
        } else {
            return redirect('/karyawan/')->withErrors('Data tidak ditemukan');
        }
    }
}
