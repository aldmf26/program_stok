@include('laporan.header')



<table class="table table-bordered">
    <thead class="table-info">
        <tr>
            <th>#</th>
            <th>Nama Pegawai</th>
            <th>Posisi</th>
            <th>Tanggal Masuk</th>
            <th>Alamat</th>
            <th>No Hp</th>
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

            </tr>
        @endforeach
    </tbody>
</table>
@include('laporan.footer')
