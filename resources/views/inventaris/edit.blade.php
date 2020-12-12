@extends('layouts.app')

@section('title', 'Catat Inventaris')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('inventaris.store' , $id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" name="jenis_barang" id="jenis_barang" value="{{ $jenis_barang }}" class="form-control">
        </div>

        <div class="form-group">
                <label for="jumlah_inventaris">Jumlah Inventaris</label>
                <input type="text" id="jumlah_inventaris" name="jumlah_inventaris" value="{{ $jumlah_inventaris }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="tgl_beli">Tgl Beli</label>
            <input type="date" name="tgl_beli" id="tgl_beli" value="{{ $tgl_beli }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" name="kode" id="kode" value="{{ $kode }}" class="form-control">
        </div>

         <div class="form-group">
                <label for="ket_inventaris">Keterangan</label>
                <input type="text" id="ket_inventaris" name="ket_inventaris" value="{{ $ket_inventaris }}" class="form-control">
        </div>

        <div class="form-group clearfix">
            <button type="submit" class="btn btn-outline-primary float-right">Catat</button>
        </div>
    </form>
@endsection