@extends('template.master')
@section('content')
    <style>
        .modal-lg-max {
            max-width: 900px;
        }
    </style>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>
                                Data Barang
                                @foreach ($jenis as $j)
                                    <a href="{{ route('barang', ['id_jenis' => $j->id_jenis]) }}"
                                        class="btn {{ $id_jenis == $j->id_jenis ? 'btn-info' : 'btn-outline-info' }}  btn-md">{{ $j->jenis }}</a>
                                @endforeach
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
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($barang as $b)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $b->nm_barang }}</td>
                                            <td>{{ $b->jml_stok }}</td>
                                            <td>{{ $b->satuan }}</td>
                                            <td>{{ number_format($b->harga, 0) }}</td>
                                            <td>
                                                <a href="#" data-target="#edit{{ $b->id_barang }}" data-toggle="modal"
                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Apakah yain dihapus ?')"
                                                    href="{{ route('hapusBarang', ['id_barang' => $b->id_barang]) }}"
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
    <form action="{{ route('tambahBarang') }}" method="post">
        @csrf
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="id_jenis" value="{{ $id_jenis }}">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label for="">Nama Barang</label>
                                <input required type="text" name="nm_barang" class="form-control" autofocus>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Satuan</label>
                                <select required class="form-control" name="id_satuan" id="">
                                    <option value="">Satuan</option>
                                    @foreach ($satuan as $s)
                                        <option value="{{ $s->id_satuan }}">{{ $s->satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Stok Awal</label>
                                <input type="number" min="0" name="masuk" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="">Harga</label>
                                <input type="number" min="0" name="harga" class="form-control">
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

    @foreach ($barang as $b)
        <form action="{{ route('editBarang') }}" method="post">
            @csrf
            <div class="modal fade" id="edit{{ $b->id_barang }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit {{ $title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="id_barang" value="{{ $b->id_barang }}">
                        <div class="modal-body">
                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label for="">Nama Barang</label>
                                    <input type="text" value="{{ $b->nm_barang }}" name="nm_barang"
                                        class="form-control" autofocus>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Satuan</label>
                                    <select class="form-control" name="id_satuan" id="">
                                        <option value="">Satuan</option>
                                        @foreach ($satuan as $s)
                                            <option {{ $b->id_satuan == $s->id_satuan ? 'selected' : '' }}
                                                value="{{ $s->id_satuan }}">{{ $s->satuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Harga</label>
                                    <input type="number" value="{{ $b->harga }}" min="0" name="harga"
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
