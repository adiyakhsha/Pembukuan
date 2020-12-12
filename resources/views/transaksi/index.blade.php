@extends('layouts.app')

@section('title', 'Transaksi')
@section('tool')
    <div class="col-2 clearfix">
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary float-right">Catat transaksi</a>
    </div>
@endsection

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
                <th>Keterangan Transaksi</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Saldo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @php($jumlah= ['masuk' => 0, 'keluar' => 0, 'saldo' => 0])

            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->tgl_transaksi }}</td>
                    <td>{{ $d->ket_transaksi }}</td>
                    <td>{{ $d->masuk }}</td>
                    <td>{{ $d->keluar }}</td>
                    <td>{{ $d->saldo_transaksi }}</td>
                    <td>
                        <a href="{{ route('transaksi.edit', $d->id) }}" class="btn btn-outline-success d-inline-block">Edit</a>
                        <form action="{{ route('transaksi.destroy', $d->id) }}" class="d-inline-block" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="btn btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>

                <?php
                    $jumlah['masuk'] += $d->masuk;
                    $jumlah['keluar'] += $d->keluar;
                    $jumlah['saldo'] += $d->saldo_transaksi;
                ?>

            @endforeach

            <tr>
                <td></td>
                <td>Jumlah</td>
                <td>{{ $jumlah['masuk'] }}</td>
                <td>{{ $jumlah['keluar']  }}</td>
                <td>{{ $jumlah['saldo'] }}</td>
                <td></td>
            </tr>

        </tbody>
    </table>
@endsection

@push('js')
    <script type="text/javascript">
        $("#table").DataTable({
            order:[[1,'desc']]
        });
    </script>
@endpush