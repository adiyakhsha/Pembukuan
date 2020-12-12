<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->transaksis;

        return view('transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
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
            'tgl_transaksi' => 'required',
            'ket_transaksi' => 'required',
            'masuk' => 'required',
            'keluar' => 'required',
            'saldo_transaksi' => 'required'
        ]);

        auth()->user()->transaksis()->create($result);

        return redirect()->route('transaksi.index')->withStatus('Berhasil Catat Transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

     public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', $transaksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $result = $request->validate([
            'tgl_transaksi' => 'required',
            'ket_transaksi' => 'required',
            'masuk' => 'required',
            'keluar' => 'required',
            'saldo_transaksi' => 'required'
        ]);

        $transaksi->fill($result);
        $transaksi->save();

        return redirect()->route('transaksi.index')->withStatus('Berhasil Edit Transaksi');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return back()->withStatus('Berhasil Hapus Transaksi');
    }
}
