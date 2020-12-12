<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->inventaris;

        return view('inventaris.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'jenis_barang' => 'required',
            'jumlah_inventaris' => 'required',
            'tgl_beli' => 'required',
            'kode' => 'required',
            'ket_inventaris' => 'required',
        ]);

        auth()->user()->inventaris()->create($result);

        return redirect()->route('inventaris.index')->withStatus('Berhasil Catat inventaris');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

     public function edit(Inventaris $inventaris)
    {
        return view('inventaris.edit', $inventaris);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        $result = $request->validate([
            'jenis_barang' => 'required',
            'jumlah_inventaris' => 'required',
            'tgl_beli' => 'required',
            'kode' => 'required',
            'ket_inventaris' => 'required',
        ]);

        $inventaris->fill($result);
        $inventaris->save();

        return redirect()->route('inventaris.index')->withStatus('Berhasil Edit inventaris');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventaris $inventaris)
    {
        $inventaris->delete();

        return back()->withStatus('Berhasil Hapus inventaris');
    }
}
