@include('laporan.header')
        @if (count($stok) < 1)
            <br><br><br><br>
            <h3 class="text-danger text-center"><em>- DATA TIDAK ADA -</em></h3>
        @else
            {{-- <table>
                <tr>
                    <td>Jenis : {{ $jenis }}</td>
                </tr>
                <tr>
                    <td>Total Barang : {{ count($stok) }}</td>
                </tr>
                <tr>
                    @php
                        $ttl = 0;
                        foreach ($stok as $b) {
                            $ttl += $b->jml_stok;
                        }
                    @endphp
                    <td>Total Stok : {{ $ttl }}</td>
                </tr>
            </table><br> --}}
            <br>
            <table class="table table-striped">
                <thead class="table-info">
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        @if ($jenis == 'keluar')
                            <th>Lokasi</th>
                        @endif
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @include('laporan.footer')
