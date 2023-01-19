@include('laporan.header')
@if (count($selesai) < 1)
    <br><br><br><br>
    <h3 class="text-danger text-center"><em>- DATA TIDAK ADA -</em></h3>
@else
    <br>
    <table class="table table-striped">
        <thead class="table-info">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Biaya</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($selesai as $u)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $u->tgl }}</td>
                    <td>{{ $u->nm_barang }}</td>
                    <td>{{ $u->biaya }}</td>
                    <td>{{ $u->ket }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@include('laporan.footer')
