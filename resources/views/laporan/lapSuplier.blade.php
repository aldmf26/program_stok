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
                            <a href="{{ route('exportSuplier') }}" target="_blank"
                                class="btn btn-success btn-sm float-right"><i class="fa fa-print"></i> Export Pdf</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Suplier</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($suplier as $j)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $j->nm_suplier }}</td>
                                            <td>{{ $j->alamat }}</td>
                                            <td>{{ $j->no_hp }}</td>

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
