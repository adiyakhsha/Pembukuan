@extends('layouts.app')

@section('title', 'Edit Stok')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('stok.update' , $id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tgl_stok">Tgl Stok</label>
            <input type="date" name="tgl_stok" id="tgl_stok" value="{{ $tgl_stok }}" class="form-control">
        </div>

        <div class="form-group">
                <label for="transaksi">Transaksi</label>
                <input type="text" id="transaksi" name="transaksi" value="{{ $transaksi }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="no_stok">No Stok</label>
            <input type="number" name="no_stok" id="no_stok" value="{{ $no_stok }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" value="{{ $deskripsi }}" class="form-control">
        </div>

         <div class="form-group">
                <label for="mutasi">Mutasi</label>
                <input type="text" id="mutasi" name="mutasi" value="{{ $mutasi }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="jumlah_stok">Jumlah Stok</label>
            <input type="number" name="jumlah_stok" id="jumlah_stok" value="{{ $jumlah_stok }}" class="form-control">
        </div>

        <div class="form-group clearfix">
            <button type="submit" class="btn btn-outline-primary float-right">Edit</button>
        </div>
    </form>
@endsection