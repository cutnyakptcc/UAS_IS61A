<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $pel = Pelanggan::all();
        return view('pelanggan.index',compact('nomor','pel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pelanggan.form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pel = new Pelanggan;
        $pel->nm_p = $request->nm_p;
        $pel->no_p = $request->no_p;
        $pel->alamat = $request->alamat;
        $pel->save();

        return redirect('/pelanggan/');
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
        $pel = Pelanggan::find($id);
        return view('pelanggan.edit',compact('pel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pel = Pelanggan::find($id);
        $pel->nm_p = $request->nm_p;
        $pel->no_p = $request->no_p;
        $pel->alamat = $request->alamat;
        $pel->save();

        return redirect('/pelanggan/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pel = Pelanggan::find($id);
        $pel->delete();

        return redirect('/pelanggan/');
    }
}
