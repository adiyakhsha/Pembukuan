@extends('layouts.app')

@section('title', 'Catat Pengeluaran')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('pengeluaran.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tgl_pengeluaran">Tgl pengeluaran</label>
            <input type="date" name="tgl_pengeluaran" id="tgl_pengeluaran" class="form-control">
        </div>

        <div class="form-group">
            <label for="no_bukti_pengeluaran">No Bukti Pengeluaran</label>
            <input type="number" name="no_bukti_pengeluaran" id="no_bukti_pengeluaran" class="form-control">
        </div>

        <div class="form-group">
            <label for="no_cek">No Cek</label>
            <input type="number" name="no_cek" id="no_cek" class="form-control">
        </div>

         <div class="form-group">
                <label for="ket_pengeluaran">Keterangan pengeluaran</label>
                <input type="text" id="ket_pengeluaran" name="ket_pengeluaran" class="form-control">
        </div>

        <div class="form-group">
            <label for="ref">Ref</label>
            <input type="number" name="ref" id="ref" class="form-control">
        </div>

         <div class="form-group">
                <label for="serba_serbi">Serba Serbi</label>
                <input type="number" id="serba_serbi" name="serba_serbi" class="form-control">
        </div>

        <div class="form-group">
            <label for="hutang_dagang">Hutang Dagang</label>
            <input type="number" name="hutang_dagang" id="hutang_dagang" class="form-control">
        </div>

        <div class="form-group">
            <label for="pot_pembelian">Pot Pembelian</label>
            <input type="number" name="pot_pembelian" id="pot_pembelian" class="form-control">
        </div>

        <div class="form-group">
            <label for="kas">Kas</label>
            <input type="number" name="kas" id="kas" class="form-control">
        </div>
            

        <div class="form-group clearfix">
            <button type="submit" class="btn btn-outline-primary float-right">Catat</button>
        </div>
    </form>
@endsection

