@extends('layouts.app')

@section('title', 'Catat Transaksi')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tgl_transaksi">Tgl transaksi</label>
            <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control">
        </div>

        <div class="form-group">
            <label for="ket_transaksi">Keterangan Transaksi</label>
            <input type="text" name="ket_transaksi" id="ket_transaksi" class="form-control">
        </div>

        <div class="form-group">
            <label for="masuk">Masuk</label>
            <input type="number" name="masuk" id="masuk" class="form-control">
        </div>

            <div class="form-group">
            <label for="keluar">Keluar</label>
            <input type="number" name="keluar" id="keluar" class="form-control">
        </div>

        <div class="form-group">
            <label for="saldo_transaksi">Saldo</label>
            <input type="number" name="saldo_transaksi" id="saldo_transaksi" class="form-control">
        </div>

        <div class="form-group clearfix">
            <button type="submit" class="btn btn-outline-primary float-right">Catat</button>
        </div>
    </form>
@endsection

