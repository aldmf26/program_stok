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
                            <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalExport">
                                <i class="fa fa-print"></i> Export Pdf
                            </button>

                            <!-- Modal Export -->
                            <div class="modal fade" id="modalExport" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('exportPegawai') }}" method="GET" target="_blank">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Filter Export Pegawai</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span>&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">

                                                <label>Pilih Jenis Export:</label>
                                                <select name="filter" id="filter-export" class="form-control">
                                                    <option value="all">Semua Data</option>
                                                    <option value="posisi">Per Posisi</option>
                                                </select>

                                                <div id="div-posisi" class="mt-3" style="display:none;">
                                                    <label>Pilih Posisi:</label>
                                                    <select name="posisi" class="form-control">
                                                        <option value="">-- Pilih Posisi --</option>
                                                        @foreach ($listPosisi as $p)
                                                            <option value="{{ $p->posisi }}">{{ $p->posisi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pegawai</th>
                                        <th>Posisi</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pegawai as $j)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $j->nm_pegawai }}</td>
                                            <td>{{ $j->posisi }}</td>
                                            <td>{{ $j->tgl_masuk }}</td>
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

@section('script')
    <script>
        document.getElementById('filter-export').addEventListener('change', function() {
            if (this.value === 'posisi') {
                document.getElementById('div-posisi').style.display = 'block';
            } else {
                document.getElementById('div-posisi').style.display = 'none';
            }
        });
    </script>
@endsection

{{-- -------------- --}}
@endsection
