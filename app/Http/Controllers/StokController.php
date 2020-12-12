<?php

namespace App\Http\Controllers;

use App\Models\stok;
use Illuminate\Http\Request;

class stokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->stoks;

        return view('stok.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stok.create');
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
            'tgl_stok' => 'required',
            'transaksi' => 'required',
            'no_stok' => 'required',
            'deskripsi' => '',
            'mutasi' => '',
            'jumlah_stok' => 'required'
        ]);

        auth()->user()->stoks()->create($result);

        return redirect()->route('stok.index')->withStatus('Berhasil Catat Stok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        //
    }

     public function edit(Stok $stok)
    {
        return view('stok.edit', $stok);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stok $stok)
    {
        $result = $request->validate([
            'tgl_stok' => 'required',
            'transaksi' => 'required',
            'no_stok' => 'required',
            'deskripsi' => '',
            'mutasi' => '',
            'jumlah_stok' => 'required'
        ]);

        $stok->fill($result);
        $stok->save();

        return redirect()->route('stok.index')->withStatus('Berhasil Edit stok');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stok $stok)
    {
        $stok->delete();

        return back()->withStatus('Berhasil Hapus stok');
    }
}
