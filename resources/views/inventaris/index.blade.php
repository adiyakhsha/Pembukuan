@extends('layouts.app')

@section('title', 'Inventaris')
@section('tool')
    <div class="col-2 clearfix">
        <a href="{{ route('inventaris.create') }}" class="btn btn-primary float-right">Catat Inventaris</a>
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
                <th>No.</th>
                <th>Jenis Barang</th>
                <th>Jumlah Inventaris</th>
                <th>Tgl Beli</th>
                <th>Kode</th>
                <th>Keterangan</th> 
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->jenis_barang }}</td>
                    <td>{{ $d->jumlah_inventaris }}</td>
                    <td>{{ $d->tgl_beli }}</td>
                    <td>{{ $d->kode }}</td>
                    <td>{{ $d->ket_inventaris }}</td>
                    <td>
                        <a href="{{ route('inventaris.edit', $d->id) }}" class="btn btn-outline-success d-inline-block">Edit</a>
                        <form action="{{ route('inventaris.destroy', $d->id) }}" class="d-inline-block" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="btn btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('js')
    <script type="text/javascript">
        $("#table").DataTable();
    </script>
@endpush