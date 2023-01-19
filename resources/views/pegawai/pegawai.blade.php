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
                                        <th>Nama Pegawai</th>
                                        <th>Posisi</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Aksi</th>
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
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning"
                                                    data-target="#edit{{ $j->id_pegawai }}" data-toggle="modal"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('hapusPegawai', ['id_pegawai' => $j->id_pegawai]) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah yakin dihapus ?')"><i
                                                        class="fa fa-trash"></i></a>
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
    <!-- Modal -->
    <form action="{{ route('tambahPegawai') }}" method="post">
        @csrf
        <div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label for="">Nama Pegawai</label>
                                <input type="text" name="nm_pegawai" class="form-control" autofocus>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Posisi</label>
                                <input type="text" name="posisi" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="">Tanggal Masuk</label>
                                <input type="date" name="tgl_masuk" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-8">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="">No Hp</label>
                                <input type="number" name="no_hp" class="form-control">
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

    {{-- modal edit --}}
    @foreach ($pegawai as $j)
        <form action="{{ route('editPegawai') }}" method="post">
            @csrf
            <div class="modal fade" id="edit{{ $j->id_pegawai }}" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit {{ $title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="id_pegawai" value="{{ $j->id_pegawai }}">
                        <div class="modal-body">
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label for="">Nama Pegawai</label>
                                    <input type="text" name="nm_pegawai" value="{{ $j->nm_pegawai }}"
                                        class="form-control" autofocus>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Posisi</label>
                                    <input type="text" name="posisi" class="form-control"
                                        value="{{ $j->posisi }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Tanggal Masuk</label>
                                    <input type="date" name="tgl_masuk" class="form-control"
                                        value="{{ $j->tgl_masuk }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-8">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ $j->alamat }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">No Hp</label>
                                    <input type="number" name="no_hp" class="form-control"
                                        value="{{ $j->no_hp }}">
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
    @endforeach

    {{-- -------------- --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#tableK').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
            });
        });
    </script>

    @if (Session::get('success'))
        <script>
            var pesan = "{{ Session::get('success') }}"
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000,
                icon: 'success',
                title: pesan
            });
        </script>
    @elseif(Session::get('error'))
        <script>
            var pesan = "{{ Session::get('error') }}"
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000,
                icon: 'error',
                title: pesan
            });
        </script>
    @endif
@endsection
