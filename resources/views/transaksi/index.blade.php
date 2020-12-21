@extends('layouts.app')

@section('title', 'Kas Utama')

@section('content')
    @if (session()->has('status'))
        <div class="alert alert-primary">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                <th>Tgl transaksi</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>

            @php($jumlah= ['masuk' => 0, 'keluar' => 0, 'saldo' => 0])

            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->tgl_transaksi }}</td>
                    <td>Rp. {{ number_format($d->masuk, 2, ',', ',') }}</td>
                    <td>Rp. {{ number_format($d->keluar, 2, ',', ',') }}</td>
                    <td>Rp. {{ number_format($d->masuk -  $d->keluar, 2, ',', ',') }}</td>
                </tr>

                <?php
                    $jumlah['masuk'] += $d->masuk;
                    $jumlah['keluar'] += $d->keluar;
                    $jumlah['saldo'] += $d->masuk -  $d->keluar;
                ?>

            @endforeach

        </tbody>
        <tfoot>
            
            <tr>
                <td><h6>Jumlah</h6></td>
                <td><h6>Rp. {{ number_format($jumlah['masuk'], 2, ',', ',') }}</h6></td>
                <td><h6>Rp. {{ number_format($jumlah['keluar'], 2, ',', ',') }}</h6></td>
                <td><h6>Rp. {{ number_format($jumlah['saldo'], 2, ',', ',') }}</h6></td>
            </tr>

        </tfoot>
    </table>
@endsection

@push('js')
    <script type="text/javascript">
        $("#table").DataTable({
            order:[[1,'desc']]
        });
    </script>
@endpush