@include('laporan.header')



<table class="table table-bordered">
    <thead class="table-info">
        <tr>
            <th>#</th>
            <th>Nama Suplier</th>
            <th>Alamat</th>
            <th>No Hp</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($suplier as $j)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $j->nm_suplier }}</td>
                <td>{{ $j->alamat }}</td>
                <td>{{ $j->no_hp }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
@include('laporan.footer')
