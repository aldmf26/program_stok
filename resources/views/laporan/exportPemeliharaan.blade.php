@include('laporan.header')



<table class="table table-bordered">
    <thead class="table-info">
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Status</th>
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

            </tr>
        @endforeach
    </tbody>
</table>
@include('laporan.footer')
