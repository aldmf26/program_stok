@extends('template.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>
                                {{ $title . ' ' . ucwords($jenis) }}
                            </h3>
                        </div>

                    </div>
                    <form action="{{ route('exportLapStok') }}" method="post">
                        @csrf
                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Dari</label>
                                <input type="date" name="tgl1" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label for="">Sampai</label>
                                <input type="date" name="tgl2" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="">Aksi</label><br>
                                <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Export
                                    Pdf</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- modal tambah --}}
@endsection
