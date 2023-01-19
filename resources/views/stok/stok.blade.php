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
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Qty</th>
                                        @if ($jenis == 'keluar')
                                            <th>Lokasi</th>
                                        @endif
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($stok as $j)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $j->tgl }}</td>
                                            <td>{{ $j->nm_barang }}</td>
                                            <td>{{ $j->satuan }}</td>
                                            <td>{{ $jenis == 'masuk' ? $j->masuk : $j->keluar }}</td>
                                            @if ($jenis == 'keluar')
                                                <td>{{ $j->lokasi }}</td>
                                            @endif
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning"
                                                    data-target="#edit{{ $j->id_stok_barang }}" data-toggle="modal"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('hapusStok', ['id_stok_barang' => $j->id_stok_barang, 'jenis' => $jenis]) }}"
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
    <form action="{{ route('tambahStok') }}" method="post">
        @csrf
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-{{ $jenis == 'masuk' ? 'md' : 'lg' }}" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="jenis" value="{{ $jenis }}">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-lg-{{ $jenis == 'masuk' ? '4' : '3' }}">
                                <label for="">Tanggal</label>
                                <input type="date" required name="tgl" class="form-control" autofocus>
                            </div>
                            <div class="col-lg-{{ $jenis == 'masuk' ? '5' : '4' }}">
                                <label for="">Nama Barang</label>
                                <select name="id_barang" class="form-control" id="">
                                    <option value="">- Pilih Barang -</option>
                                    @foreach ($barang as $b)
                                        {{-- <input type="hidden" name="id_jenis" value="{{ $b->id_jenis }}"> --}}
                                        <option value="{{ $b->id_barang }}">{{ $b->nm_barang }} ({{ $b->satuan }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-{{ $jenis == 'masuk' ? '3' : '2' }}">
                                <label for="">Qty {{ $jenis == 'masuk' ? 'Masuk' : 'Keluar' }}</label>
                                @if ($jenis == 'masuk')
                                    <input type="number" class="form-control" min="0" name="masuk" value="">
                                    <input type="hidden" min="0" name="keluar" value="0">
                                @else
                                    <input type="number" class="form-control" min="0" name="keluar" value="">
                                    <input type="hidden" min="0" name="masuk" value="0">
                                @endif
                            </div>
                            @if ($jenis == 'keluar')
                                <div class="col-lg-3">
                                    <label for="">Cabang</label>
                                    <select class="form-control" name="lokasi" id="">
                                        <option value="">Pilih Cabang</option>
                                        @foreach ($cabang as $c)
                                            <option value="{{ $c->nm_cabang }}">{{ $c->nm_cabang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
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
    @foreach ($stok as $j)
        <form action="{{ route('editStok') }}" method="post">
            @csrf
            <div class="modal fade" id="edit{{ $j->id_stok_barang }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-{{ $jenis == 'masuk' ? 'sm' : 'md' }}" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit {{ $title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="id_stok_barang" value="{{ $j->id_stok_barang }}">
                        <input type="hidden" name="jenis" value="{{ $jenis }}">
                        <div class="modal-body">
                            <div class="row form-group">
                                <div class="col-lg-{{ $jenis == 'masuk' ? '12' : '6' }}">
                                    <label for="">Qty {{ $jenis == 'masuk' ? 'Masuk' : 'Keluar' }}</label>
                                    @if ($jenis == 'masuk')
                                        <input type="number" class="form-control" min="0" name="masuk"
                                            value="{{ $j->masuk }}">
                                        <input type="hidden" min="0" name="keluar" value="0">
                                    @else
                                        <input type="number" class="form-control" min="0" name="keluar"
                                            value="{{ $j->keluar }}">
                                        <input type="hidden" min="0" name="masuk" value="0">
                                    @endif
                                </div>
                                @if ($jenis == 'keluar')
                                    <div class="col-lg-6">
                                        <label for="">Lokasi</label>
                                        <select class="form-control" name="lokasi" id="">
                                            <option value="">Pilih Lokasi</option>
                                            <option {{ $j->lokasi == 'Alpa' ? 'selected' : '' }} value="Alpa">Alpa
                                            </option>
                                            <option {{ $j->lokasi == 'Stand Adiyaksa' ? 'selected' : '' }}
                                                value="Stand Adiyaksa">Stand Adiyaksa</option>
                                        </select>
                                    </div>
                                @endif
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
