@extends('template.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>{{ $title }}</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="#" data-toggle="modal" data-target="#tambah"
                                class="btn btn-primary btn-sm float-right">Tambah Data</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- ubah id table sesuai yang diinisialisasi di script -->
                            <table class="table" id="tableK">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Cabang</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Pengelola</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($cabang as $j)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $j->nm_cabang }}</td>
                                            <td>{{ $j->alamat }}</td>
                                            <td>{{ $j->no_hp }}</td>
                                            <td>{{ $j->pengelola }}</td>
                                            <td>
                                                <!-- pastikan data-target sesuai id modal edit -->
                                                <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#edit{{ $j->id_cabang }}"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('hapusCabang', ['id_cabang' => $j->id_cabang]) }}"
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
    <form action="{{ route('tambahCabang') }}" method="post">
        @csrf
        <div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="tambahLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahLabel">Tambah {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-lg-3">
                                <label for="">Nama Cabang</label>
                                <input type="text" name="nm_cabang" class="form-control" autofocus>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label for="">No Hp</label>
                                <input type="text" name="no_hp" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label for="">Pengelola</label>
                                <input type="text" name="pengelola" class="form-control">
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
    @foreach ($cabang as $j)
        <form action="{{ route('editCabang') }}" method="post">
            @csrf
            <div class="modal fade" id="edit{{ $j->id_cabang }}" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="editLabel{{ $j->id_cabang }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLabel{{ $j->id_cabang }}">Edit {{ $title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <input type="hidden" name="id_cabang" value="{{ $j->id_cabang }}">

                        <div class="modal-body">
                            <div class="row form-group">
                                <div class="col-lg-3">
                                    <label for="">Nama Cabang</label>
                                    <input type="text" name="nm_cabang" value="{{ $j->nm_cabang }}" class="form-control"
                                        autofocus>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" value="{{ $j->alamat }}"
                                        class="form-control">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">No Hp</label>
                                    <input type="text" name="no_hp" value="{{ $j->no_hp }}"
                                        class="form-control">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Pengelola</label>
                                    <input type="text" name="pengelola" value="{{ $j->pengelola }}"
                                        class="form-control">
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // inisialisasi DataTable ke id yang benar (#tableK)
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
