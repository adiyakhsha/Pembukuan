<?php

namespace App\Http\Controllers;

use App\Models\labarugi;
use Illuminate\Http\Request;

class LabarugiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->labarugis;

        return view('labarugi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labarugi.create');
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
            'pendapatan' => 'required',
            'harga_pokok' => 'required',
            'pembelian' => 'required',
            'total_harga_barang' => ''
        ]);

        auth()->user()->labarugis()->create($result);

        return redirect()->route('labarugi.index')->withStatus('Berhasil Catat labarugi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\labarugi  $labarugi
     * @return \Illuminate\Http\Response
     */
    public function show(Labarugi $labarugi)
    {
        //
    }

     public function edit(Labarugi $labarugi)
    {
        return view('labarugi.edit', $labarugi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\labarugi  $labarugi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Labarugi $labarugi)
    {
        $result = $request->validate([
            'pendapatan' => 'required',
            'harga_pokok' => 'required',
            'pembelian' => 'required',
            'total_harga_barang' => ''
        ]);

        $labarugi->fill($result);
        $labarugi->save();

        return redirect()->route('labarugi.index')->withStatus('Berhasil Edit labarugi');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\labarugi  $labarugi
     * @return \Illuminate\Http\Response
     */
    public function destroy(labarugi $labarugi)
    {
        $labarugi->delete();

        return back()->withStatus('Berhasil Hapus labarugi');
    }
}
