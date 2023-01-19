@extends('template.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>
                                Data Satuan
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
                                        <th>Nama Satuan</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($satuan as $j)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $j->satuan }}</td>
                                            <td>{{ $j->ket }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning"
                                                    data-target="#edit{{ $j->id_satuan }}" data-toggle="modal"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('hapusSatuan', ['id_satuan' => $j->id_satuan]) }}"
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
    <form action="{{ route('tambahSatuan') }}" method="post">
        @csrf
        <div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Satuan</label>
                                <input type="text" name="satuan" class="form-control" autofocus>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Keterangan</label>
                                <input type="text" name="ket" class="form-control">
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
    @foreach ($satuan as $j)
        <form action="{{ route('editSatuan') }}" method="post">
            @csrf
            <div class="modal fade" id="edit{{ $j->id_satuan }}" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit {{ $title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="id_satuan" value="{{ $j->id_satuan }}">
                        <div class="modal-body">
                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label for="">Satuan</label>
                                    <input type="text" name="satuan" value="{{ $j->satuan }}" class="form-control"
                                        autofocus>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Keterangan</label>
                                    <input type="text" name="ket" value="{{ $j->ket }}" class="form-control">
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
