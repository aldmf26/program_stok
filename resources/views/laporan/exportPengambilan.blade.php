@include('laporan.header')


@if (count($barang) < 1)
    <br><br><br><br>
    <h3 class="text-danger text-center"><em>- DATA TIDAK ADA -</em></h3>
@else
    <table>
        <tr>
            <td>Cabang : {{ $cabang }}</td>
        </tr>
        <tr>
            <td>Total Barang : {{ count($barang) }}</td>
        </tr>
        <tr>
            @php
                $ttl = 0;
                foreach ($barang as $b) {
                    $ttl += $b->keluar;
                }
            @endphp
            <td>Total Stok Keluar : {{ $ttl }}</td>
        </tr>
    </table><br>
    <table class="table table-striped">
        <thead class="table-info">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Qty</th>
                <th>Lokasi</th>

            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($barang as $j)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $j->tgl }}</td>
                    <td>{{ $j->nm_barang }}</td>
                    <td>{{ $j->satuan }}</td>
                    <td>{{ $j->keluar }}</td>
                    <td>{{ $j->lokasi }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@include('laporan.footer')
