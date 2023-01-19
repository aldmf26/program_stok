@extends('template.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>
                                Data Pemleliharaan
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <a href="#" data-toggle="modal" data-target="#tambah"
                                class="btn btn-primary btn-sm float-right">Tambah Data</a>
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
                                        <th>Aksi</th>
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
                                            <td>
                                                <a href="#" data-target="#edit{{ $u->id_pemeliharaan }}"
                                                    data-toggle="modal" class="btn btn-sm btn-warning"><i
                                                        class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Apakah yakin ingin dihapus ?')"
                                                    href="{{ route('hapusPemeliharaan', ['id_pemeliharaan' => $u->id_pemeliharaan]) }}"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                            </td>
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

    {{-- modal tambah --}}
    <form action="{{ route('tambahPemeliharaan') }}" method="post">
        @csrf
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pemeliharaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-lg-3">
                                <label for="">Tanggal</label>
                                <input required autofocus type="date" name="tgl" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="">Barang</label>
                                <select name="id_barang" id="" class="form-control">
                                    <option value="">- Pilih Barang -</option>
                                    @foreach ($barang as $b)
                                        <option value="{{ $b->id_barang }}">{{ $b->nm_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Jumlah</label>
                                <input type="number" min="0" name="jumlah" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label for="">Keterangan</label>
                                <input type="text" name="ket" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @foreach ($pemeliharaan as $p)
        <form action="{{ route('editPemeliharaan') }}" method="post">
            @csrf
            <div class="modal fade" id="edit{{ $p->id_pemeliharaan }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Pemeliharaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row form-group">
                                <input type="hidden" name="id_pemeliharaan" value="{{ $p->id_pemeliharaan }}">
                                <div class="col-lg-3">
                                    <label for="">Tanggal</label>
                                    <input required autofocus type="date" value="{{ $p->tgl }}" name="tgl"
                                        class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Barang</label>
                                    <select name="id_barang" id="" class="form-control">
                                        <option value="">- Pilih Barang -</option>
                                        @foreach ($barang as $b)
                                            <option {{ $p->id_barang == $b->id_barang ? 'selected' : '' }}
                                                value="{{ $b->id_barang }}">{{ $b->nm_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Jumlah</label>
                                    <input value="{{ $p->jumlah }}" type="number" min="0" name="jumlah"
                                        class="form-control">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Keterangan</label>
                                    <input value="{{ $p->ket }}" type="text" name="ket"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endsection
