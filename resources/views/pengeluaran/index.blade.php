@extends('layouts.app')

@section('title', 'Pengeluaran')
@section('tool')
    <div class="col-2 clearfix">
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary float-right">Catat Pengeluaran</a>
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
                <th rowspan="2">No.</th>
                <th rowspan="2">Tgl pengeluaran</th>
                <th rowspan="2">No Bukti Pengeluaran</th>
                <th rowspan="2">No Cek</th>
                <th rowspan="2">Keterangan pengeluaran</th>`
                <th colspan="2">Debet</th>
                <th colspan="2">Kredit</th>
                <th rowspan="2">Kas</th>
                <th rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th>Ref</th>
                <th>Serba Serbi</th>
                <th>Hutang Dagang</th>
                <th>Pot Ptmbelian</th>
            </tr>
        </thead>
        <tbody>

            @php($total =[ 'ref' =>0, 'serba' => 0, 'hutdag' => 0, 'pot' => 0, 'kas' => 0])

            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->tgl_pengeluaran }}</td>
                    <td>{{ $d->no_bukti_pengeluaran }}</td>
                    <td>{{ $d->no_cek }}</td>
                    <td>{{ $d->ket_pengeluaran }}</td>
                    <td>{{ $d->ref }}</td>
                    <td>{{ $d->serba_serbi }}</td>
                    <td>{{ $d->hutang_dagang }}</td>
                    <td>{{ $d->pot_pembelian }}</td>
                    <td>{{ $d->kas }}</td>
                    <td>
                        <a href="{{ route('pengeluaran.edit', $d->id) }}" class="btn btn-outline-success d-inline-block">Edit</a>
                        <form action="{{ route('pengeluaran.destroy', $d->id) }}" class="d-inline-block" method="POST" onsubmit="return confirm('Yakin ingin dihapus?')">
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="btn btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php
                    $total['ref'] += $d->ref;
                    $total['serba'] += $d->serba_serbi;
                    $total['hutdag'] += $d->hutang_dagang;
                    $total['pot'] += $d->pot_pembelian;
                    $total['kas'] += $d->kas;

                ?>
            @endforeach

            <tr>
                <td colspan="4"></td>
                <td>Total</td>
                <td>{{ $total['ref'] }}</td>
                <td>{{ $total['serba'] }}</td>
                <td>{{ $total['hutdag'] }}</td>
                <td>{{ $total['pot'] }}</td>
                <td>{{ $total['kas'] }}</td>
            </tr>

        </tbody>
    </table>
@endsection

@push('js')
    <script type="text/javascript">
        $("#table").DataTable();
    </script>
@endpush