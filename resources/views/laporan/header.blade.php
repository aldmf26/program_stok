@php
function tgl_indo($tanggal)
{
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
@endphp
<!doctype html>
<html lang="en">
<style>
    .bawah {
        text-align: right;
    }

    .p1 {
        margin-bottom: 0px;
        margin-right: 11px;
    }

    .p2 {
        margin-bottom: 1px;
        padding-top: 0px;
    }

    .p3 {
        margin-bottom: 0px;
        margin-right: 61px;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3">
                <img style="display: block;margin-left: auto;margin-right: auto;"
                    src="{{ asset('assets/img/logo.png') }}" width="100" alt="">
            </div>
            <div class="col-lg-6 text-center">
                <div class="mb-1">
                    <h5>CAPUCINO CINCAU ADUBE</h5><br>
                    <p style="text-transform: uppercase; font-size: 14px;">Jl. Sultan Adam No. 118
                        banjarmasin 70162
                        TELEPON 0896513423
                    </p>
                </div>
            </div>
        </div>
        <hr style="border:3px solid black">
        <h4 class="text-center" style="margin-bottom: 0px">{{ $title }}</h4>
        <br>
