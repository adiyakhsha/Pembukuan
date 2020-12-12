@extends('layouts.app')

@section('title', 'Pemasukan')
@section('tool')
    <div class="col-2 clearfix">
        <a href="{{ route('pemasukan.create') }}" class="btn btn-primary float-right">Catat Pemasukan</a>
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
                <th>Keterangan</th>
                <th>Tgl Pemasukan</th>
                <th>No Nota</th>
                <th>Total Pemasukan</th>
                <th>Jatuh Tempo</th>
                <th>Bayar</th>
                <th>Tgl Bayar</th>
                <th>Saldo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->ket_pemasukan }}</td>
                    <td>{{ $d->tgl_pemasukan }}</td>
                    <td>{{ $d->no_nota }}</td>
                    <td>{{ $d->total_pemasukan }}</td>
                    <td>{{ $d->jatuh_tempo }}</td>
                    <td>{{ $d->bayar }}</td>
                    <td>{{ $d->tgl_bayar }}</td>
                    <td>{{ $d->total_pemasukan - $d->bayar}}</td>
                    <td>
                        <a href="{{ route('pemasukan.edit', $d->id) }}" class="btn btn-outline-success d-inline-block">Edit</a>
                        <form action="{{ route('pemasukan.destroy', $d->id) }}" class="d-inline-block" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
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