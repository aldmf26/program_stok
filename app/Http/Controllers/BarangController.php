<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\satuan;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(Request $r)
    {
        $id_jenis = $r->id_jenis == '' ? 1 : $r->id_jenis;
        $data = [
            'title' => 'Data Barang',
            'jenis' => Jenis::all(),
            'satuan' => satuan::all(),
            'barang' => DB::select("SELECT a.*, b.*, d.jml_stok FROM `tb_barang` as a
            LEFT JOIN tb_satuan as b on a.id_satuan = b.id_satuan
            LEFT JOIN 
            (SELECT id_barang, SUM(masuk - keluar) as jml_stok FROM tb_stok as c GROUP BY id_barang) as d ON a.id_barang = d.id_barang
            WHERE a.id_jenis = '$id_jenis'"),
            'id_jenis' => $id_jenis,
        ];
        return view('barang.barang', $data);
    }

    public function tambah(Request $r)
    {
        $nm_barang = $r->nm_barang;
        $id_satuan = $r->id_satuan;
        $id_jenis = $r->id_jenis == '' ? 1 : $r->id_jenis;
        $harga = $r->harga;
        // dd($id_jenis);

        $data = [
            'nm_barang' => $nm_barang,
            'id_satuan' => $id_satuan,
            'id_jenis' => $id_jenis,
            'harga' => $harga,
        ];
        $id_barang = Barang::create($data);

        $data2 = [
            'id_barang' => $id_barang->id,
            'masuk' => $r->masuk,
            'tgl' => date('Y-m-d'),
            'keluar' => 0,
            'status' => 'AWAL',
            'id_jenis' => $id_jenis,
            'admin' => Auth::user()->nama,
        ];

        Stok::create($data2);

        return redirect()->route('barang')->with('sukses', 'Berhasil tambah Barang');
    }

    public function edit(Request $r)
    {
        $data = [
            'nm_barang' => $r->nm_barang,
            'id_satuan' => $r->id_satuan,
            'harga' => $r->harga,
        ];

        Barang::where('id_barang', $r->id_barang)->update($data);

        return redirect()->route('barang')->with('sukses', 'Berhasil edit barang');
    }

    public function hapus(Request $r)
    {
        Barang::where('id_barang', $r->id_barang)->delete();
        Stok::where('id_barang', $r->id_barang)->delete();

        return redirect()->route('barang')->with('error', 'Berhasil hapus barang');
    }

    public function lapBarang(Request $r)
    {
        $data = [
            'title' => 'Laporan Barang',
            'jenis' => Jenis::all()
        ];
        return view('laporan.lapbarang', $data);
    }

    public function exportLapBarang(Request $r)
    {
        $jenis = $r->jenis;
        $idJenis = Jenis::where('jenis', $jenis)->first();
        $barang = DB::select("SELECT a.*, b.*, d.jml_stok FROM `tb_barang` as a
        LEFT JOIN tb_satuan as b on a.id_satuan = b.id_satuan
        LEFT JOIN 
        (SELECT id_barang, SUM(masuk - keluar) as jml_stok FROM tb_stok as c GROUP BY id_barang) as d ON a.id_barang = d.id_barang
        WHERE a.id_jenis = '$idJenis->id_jenis'");

        $data = [
            'title' => 'Laporan ' . ucwords($jenis),
            'jenis' => $jenis,
            'barang' => $barang,
        ];

        return view('laporan.exportLapBarang', $data);
    }
}
