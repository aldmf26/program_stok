@include('laporan.header')


@if (count($barang) < 1)
    <br><br><br><br>
    <h3 class="text-danger text-center"><em>- DATA TIDAK ADA -</em></h3>
@else
    <table>
        <tr>
            <td>Jenis : {{ $jenis }}</td>
        </tr>
        <tr>
            <td>Total Barang : {{ count($barang) }}</td>
        </tr>
        <tr>
            @php
                $ttl = 0;
                foreach ($barang as $b) {
                    $ttl += $b->jml_stok;
                }
            @endphp
            <td>Total Stok : {{ $ttl }}</td>
        </tr>
    </table><br>
    <table class="table table-striped">
        <thead class="table-info">
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Harga</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@include('laporan.footer')
