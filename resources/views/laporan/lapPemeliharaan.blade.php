@extends('template.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>
                                {{ $title }}
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('exportPemeliharaan') }}" target="_blank"
                                class="btn btn-success btn-sm float-right"><i class="fa fa-print"></i> Export Pdf</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pemeliharaan as $u)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $u->tgl }}</td>
                                        <td>{{ $u->nm_barang }}</td>
                                        <td>{{ $u->jumlah }}</td>
                                        @if ($u->status == 'SELESAI')
                                            <td><span class="btn btn-sm btn-success text-light">SELESAI</span></td>
                                        @else
                                            <td><span class="btn btn-sm btn-warning text-light"><em>BELUM
                                                        SELESAI</em></span></td>
                                        @endif
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- -------------- --}}
@endsection
