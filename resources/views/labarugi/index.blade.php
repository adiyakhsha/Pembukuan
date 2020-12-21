@extends('layouts.app')

@section('title', 'Laba Rugi')


@section('content')
    @if (session()->has('status'))
        <div class="alert alert-primary">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    <div class="row">
        
    <div class="card col-4" style="width: 18rem;">
    <div class="card-body">
    <p class="card-text">Total Pendapatan : 
        Rp. {{ number_format(\App\Models\Transaksi::sum('masuk'), 2, ',', ',') }}
    </p>
    </div>
    </div>


    <div class="card col-4" style="width: 18rem;">
    <div class="card-body">
    <p class="card-text">Harga Pokok Penjualan : 
        Rp. {{ number_format(\App\Models\Transaksi::sum('keluar'), 2, ',', ',') }}
    </p>
    </div>
    </div>


    <div class="card col-4" style="width: 18rem;">
    <div class="card-body">
    <p class="card-text">Total Laba Kotor : 
        Rp. {{ number_format(\App\Models\Transaksi::sum('masuk') -  \App\Models\Transaksi::sum('keluar'), 2, ',', ',') }}
    </p>
    </div>
    </div>
    </div>



@endsection

@push('js')
    <script type="text/javascript">
        $("#table").DataTable();
    </script>
@endpush