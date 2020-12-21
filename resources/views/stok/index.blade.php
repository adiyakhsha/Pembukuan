@extends('layouts.app')

@section('title', 'Stok Barang')
@section('tool')
    <div class="col-2 clearfix">
        <a href="{{ route('stok.create') }}" class="btn btn-primary float-right">Catat Stok</a>
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
                <th>Tgl Stok</th>
                <th>Transaksi</th>
                <th>No Stok</th>
                <th>Deskripsi</th>
                <th>Mutasi</th>
                <th>Jumlah Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @php($total = ['jumlah' => 0])

            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->tgl_stok }}</td>
                    <td>{{ $d->transaksi }}</td>
                    <td>{{ $d->no_stok }}</td>
                    <td>{{ $d->deskripsi }}</td>
                    <td>{{ $d->mutasi }}</td>
                    <td>{{ $d->mutasi + $d->jumlah_stok }}</td>
                    <td>
                        <a href="{{ route('stok.edit', $d->id) }}" class="btn btn-outline-success d-inline-block">Edit</a>
                        <form action="{{ route('stok.destroy', $d->id) }}" class="d-inline-block" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="btn btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>

                <?php
                    $total['jumlah'] += $d->jumlah_stok + $d->mutasi;
                ?>

            @endforeach

        </tbody>

        <tfoot>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><h6>Total Barang Yang Tersedia</h6></td>
                <td><h6>{{ $total['jumlah'] }}</h6></td>
                <td></td>
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