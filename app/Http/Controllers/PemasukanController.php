<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->pemasukans;

        return view('pemasukan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasukan.create');
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
            'ket_pemasukan' => 'required',
            'tgl_pemasukan' => 'required',
            'no_nota' => 'required',
            'total_pemasukan' => 'required',
            'jatuh_tempo' => '',
            'bayar' => '',
            'tgl_bayar' => '',
            'saldo_pemasukan' => 'required'
        ]);

        auth()->user()->pemasukans()->create($result);

        return redirect()->route('pemasukan.index')->withStatus('Berhasil Catat Pemasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(pemasukan $pemasukan)
    {
        //
    }

     public function edit(pemasukan $pemasukan)
    {
        return view('pemasukan.edit', $pemasukan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $result = $request->validate([
            'ket_pemasukan' => 'required',
            'tgl_pemasukan' => 'required',
            'no_nota' => 'required',
            'total_pemasukan' => 'required',
            'jatuh_tempo',
            'bayar',
            'tgl_bayar',
            'saldo_pemasukan' => 'required'
        ]);

        $pemasukan->fill($result);
        $pemasukan->save();

        return redirect()->route('pemasukan.index')->withStatus('Berhasil Edit Pemasukan');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return back()->withStatus('Berhasil Hapus Pemasukan');
    }
}
