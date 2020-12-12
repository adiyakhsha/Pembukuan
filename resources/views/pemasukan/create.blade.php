@extends('layouts.app')

@section('title', 'Catat Pemasukan')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('pemasukan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="ket_pemasukan">Keterangan</label>
            <input type="text" name="ket_pemasukan" id="ket_pemasukan" class="form-control">
        </div>

        <div class="form-group">
                <label for="tgl_pemasukan">Tgl Pemasukan</label>
                <input type="date" id="tgl_pemasukan" name="tgl_pemasukan" class="form-control">
        </div>

        <div class="form-group">
            <label for="no_nota">No Nota</label>
            <input type="number" name="no_nota" id="no_nota" class="form-control">
        </div>

        <div class="form-group">
            <label for="total_pemasukan">Total Pemasukan</label>
            <input type="number" name="total_pemasukan" id="total_pemasukan" class="form-control">
        </div>

         <div class="form-group">
                <label for="jatuh_tempo">Jatuh Tempo</label>
                <input type="date" id="jatuh_tempo" name="jatuh_tempo" class="form-control">
        </div>

        <div class="form-group">
            <label for="bayar">Bayar</label>
            <input type="number" name="bayar" id="bayar" class="form-control">
        </div>

         <div class="form-group">
                <label for="tgl_bayar">Tgl Bayar</label>
                <input type="date" id="tgl_bayar" name="tgl_bayar" class="form-control">
        </div>

        <div class="form-group clearfix">
            <button type="submit" class="btn btn-outline-primary float-right">Catat</button>
        </div>
    </form>
@endsection