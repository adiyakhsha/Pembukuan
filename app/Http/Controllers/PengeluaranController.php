<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->pengeluarans;

        return view('pengeluaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.create');
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
            'tgl_pengeluaran' => 'required',
            'no_bukti_pengeluaran' => 'required',
            'no_cek' => 'required',
            'ket_pengeluaran' => 'required',
            'ref' => '',
            'serba_serbi' => '',
            'hutang_dagang' => '',
            'pot_pembelian' => '',
            'kas' => '' 
        ]);

        auth()->user()->pengeluarans()->create($result);

        return redirect()->route('pengeluaran.index')->withStatus('Berhasil Catat Pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

     public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', $pengeluaran);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $result = $request->validate([
            'tgl_pengeluaran' => 'required',
            'no_bukti_pengeluaran' => 'required',
            'no_cek' => 'required',
            'ket_pengeluaran' => 'required',
            'ref',
            'serba_serbi',
            'hutang_dagang',
            'pot_pembelian',
            'kas'
        ]);

        $pengeluaran->fill($result);
        $pengeluaran->save();

        return redirect()->route('pengeluaran.index')->withStatus('Berhasil Edit Pengeluaran');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return back()->withStatus('Berhasil Hapus Pengeluaran');
    }
}
