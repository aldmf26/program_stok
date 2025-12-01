@extends('template.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>
                                Data Jenis
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
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Posisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($user as $u)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $u->nama }}</td>
                                            <td>{{ $u->username }}</td>
                                            <td>{{ $u->username == 'admin' ? 'Admin' : 'Cabang' }}</td>
                                            <td><a onclick="return confirm('Apakah yakin ingin dihapus ?')"
                                                    href="{{ route('hapusUser', ['id_user' => $u->id]) }}"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a></td>
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
    <form action="{{ route('tambahUser') }}" method="post">
        @csrf
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah User}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Nama</label>
                                <input required autofocus type="text" name="nama" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Username</label>
                                <input required type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label for="">Password</label>
                                <input required type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
