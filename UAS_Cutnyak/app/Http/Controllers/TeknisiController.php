<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teknisi;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $tek = Teknisi::all();
        return view('teknisi.index',compact('nomor','tek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("teknisi.form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tek = new Teknisi;
        $tek->nm_tek = $request->nm_tek;
        $tek->no_tek = $request->no_tek;
        $tek->alamat_tek = $request->alamat_tek;
        $tek->save();

        return redirect('/teknisi/');
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
        $tek = Teknisi::find($id);
        return view('teknisi.edit',compact('tek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tek = Teknisi::find($id);
        $tek->nm_tek = $request->nm_tek;
        $tek->no_tek = $request->no_tek;
        $tek->alamat_tek = $request->alamat_tek;
        $tek->save();

        return redirect('/teknisi/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tek = Teknisi::find($id);
        $tek->delete();

        return redirect('/teknisi/');
    }
}
