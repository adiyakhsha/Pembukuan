@extends('layouts.app')

@section('title', 'Kas Keluar')
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
                <th>Pot Pembelian</th>
            </tr>
        </thead>
        <tbody>

            @php($total =[ 'ref' =>0, 'serba' => 0, 'hutdag' => 0, 'pot' => 0, 'kas' => 0])

            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->tgl_pengeluaran }}</td>
                    <td>{{ $d->no_bukti_pengeluaran }}</td>
                    <td>{{ $d->no_cek }}</td>
                    <td>{{ $d->ket_pengeluaran }}</td>
                    <td> {{ $d->ref }}</td>
                    <td> Rp. {{ number_format($d->serba_serbi, 2, ',', ',') }}</td>
                    <td> Rp. {{ number_format($d->hutang_dagang, 2, ',', ',')  }}</td>
                    <td> Rp. {{ number_format($d->pot_pembelian, 2, ',', ',')  }}</td>
                    <td> Rp. {{ number_format($d->serba_serbi + $d->hutang_dagang - $d->pot_pembelian, 2, ',', ',')}}</td>
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
                    $total['serba'] += $d->serba_serbi;
                    $total['hutdag'] += $d->hutang_dagang;
                    $total['pot'] += $d->pot_pembelian;
                    $total['kas'] += $d->serba_serbi + $d->hutang_dagang - $d->pot_pembelian;

                ?>
            @endforeach

        </tbody>

        <tfoot>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><h6>Total</h6></td>
                <td><h6>Rp. {{ number_format($total['serba'], 2, ',', ',') }}</h6></td>
                <td><h6>Rp. {{ number_format($total['hutdag'], 2, ',', ',') }}</h6></td>
                <td><h6>Rp. {{ number_format($total['pot'], 2, ',', ',') }}</h6></td>
                <td><h6>Rp. {{ number_format($total['kas'], 2, ',', ',') }}</h6></td>
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