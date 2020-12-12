@extends('layouts.app')

@section('title', 'Catat Laba Rugi')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('labarugi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="pendapatan">Pendapatan</label>
            <input type="number" name="pendapatan" id="pendapatan" class="form-control">
        </div>

        <div class="form-group">
                <label for="harga_pokok">Harga Pokok</label>
                <input type="number" id="harga_pokok" name="harga_pokok" class="form-control">
        </div>

        <div class="form-group">
            <label for="pembelian">Pembelian</label>
            <input type="number" name="pembelian" id="pembelian" class="form-control">
        </div>

        <div class="form-group clearfix">
            <button type="submit" class="btn btn-outline-primary float-right">Catat</button>
        </div>
    </form>
@endsection