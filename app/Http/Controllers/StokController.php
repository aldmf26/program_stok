<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cabang;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokController extends Controller
{
    public function index(Request $r)
    {
        if ($r->jenis == 'masuk') {
            $title = 'Data Stok Masuk';
        } else {
            $title = 'Data Stok Keluar';
        }
        $data = [
            'title' => $title,
            'jenis' => $r->jenis,
            'cabang' => Cabang::all(),
            'barang' => Barang::join('tb_satuan as a', 'tb_barang.id_satuan', 'a.id_satuan')->get(),
            'stok' => Stok::join('tb_barang', 'tb_stok.id_barang', 'tb_barang.id_barang')
                ->join('tb_satuan', 'tb_barang.id_satuan', 'tb_satuan.id_satuan')
                ->where('tb_stok.status', $r->jenis)
                ->orderBy('tb_stok.id_stok_barang', 'desc')->get()
        ];
        return view('stok.stok', $data);
    }

    public function tambah(Request $r)
    {

        $data = [
            'tgl' => $r->tgl,
            'id_barang' => $r->id_barang,
            'masuk' => $r->masuk,
            'keluar' => $r->keluar,
            'status' => $r->jenis == 'masuk' ? 'MASUK' : 'KELUAR',
            'id_jenis' => $r->id_jenis,
            'lokasi' => $r->jenis == 'masuk' ? '' : $r->lokasi,
            'admin' => Auth::user()->nama,
        ];

        Stok::create($data);
        return redirect()->route('stok', ['jenis' => $r->jenis])->with('sukses', 'Berhasil tambah stok ' . $r->jenis);
    }

    public function edit(Request $r)
    {
        if ($r->jenis == 'masuk') {
            Stok::where('id_stok_barang', $r->id_stok_barang)->update(['masuk' => $r->masuk]);
        } else {
            Stok::where('id_stok_barang', $r->id_stok_barang)->update(['keluar' => $r->keluar, 'lokasi' => $r->lokasi]);
        }
        return redirect()->route('stok', ['jenis' => $r->jenis])->with('sukses', 'Berhasil edit stok ' . $r->jenis);
    }

    public function hapus(Request $r)
    {
        Stok::where('id_stok_barang', $r->id_stok_barang)->delete();
        return redirect()->route('stok', ['jenis' => $r->jenis])->with('sukses', 'Berhasil hapus stok ' . $r->jenis);
    }

    public function lapStok(Request $r)
    {
        $data = [
            'title' => "Laporan Stok " . ucwords($r->jenis),
            'jenis' => $r->jenis,
        ];
        return view('laporan.lapStok', $data);
    }

    public function exportLapStok(Request $r)
    {
        $data = [
            'title' => "Laporan Stok " . ucwords($r->jenis),
            'tgl1' => $r->tgl1,
            'tgl2' => $r->tgl2,
            'jenis' => $r->jenis,
            'stok' => Stok::join('tb_barang', 'tb_stok.id_barang', 'tb_barang.id_barang')
                ->join('tb_satuan', 'tb_barang.id_satuan', 'tb_satuan.id_satuan')
                ->where('tb_stok.status', $r->jenis)->whereBetween('tb_stok.tgl', [$r->tgl1, $r->tgl2])
                ->orderBy('tb_stok.id_stok_barang', 'desc')->get()
        ];

        return view('laporan.exportStok', $data);
    }
}
