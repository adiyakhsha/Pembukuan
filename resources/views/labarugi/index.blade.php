@extends('layouts.app')

@section('title', 'Laba Rugi')
@section('tool')
    <div class="col-2 clearfix">
        <a href="{{ route('labarugi.create') }}" class="btn btn-primary float-right">Catat Laba Rugi </a>
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
                <th>Pendapatan</th>
                <th>Harga Pokok</th>
                <th>Pembelian</th>
                <th>Total Harga Pokok</th>
                <th>Total Laba Kotor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->pendapatan }}</td>
                    <td>{{ $d->harga_pokok }}</td>
                    <td>{{ $d->pembelian }}</td>
                    <td>{{ $d->harga_pokok }}</td>
                    <td>{{ $d->pendapatan - $d->harga_pokok  }}</td>
                    <td>
                        <a href="{{ route('labarugi.edit', $d->id) }}" class="btn btn-outline-success d-inline-block">Edit</a>
                        <form action="{{ route('labarugi.destroy', $d->id) }}" class="d-inline-block" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
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