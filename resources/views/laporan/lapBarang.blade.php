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

                    </div>
                    <form action="{{ route('exportLapBarang') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Jenis</label>
                                <select required name="jenis" id="" class="form-control">
                                    <option value="">- Pilih Jenis -</option>
                                    @foreach ($jenis as $j)
                                        <option value="{{ $j->jenis }}">{{ $j->jenis }}</option>
                                    @endforeach
                                </select>
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
