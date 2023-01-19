<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Pegawai;
use App\Models\Pemeliharaan;
use App\Models\selesaiService;
use App\Models\Stok;
use App\Models\Suplier;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function lapPegawai(Request $r)
    {
        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => Pegawai::all(),
        ];
        return view('laporan.lapPegawai', $data);
    }

    public function exportPegawai(Request $r)
    {
        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => Pegawai::all(),
        ];
        return view('laporan.exportPegawai', $data);
    }

    public function lapPemeliharaan(Request $r)
    {
        $data = [
            'title' => 'Data Pemeliharaan',
            'pemeliharaan' => Pemeliharaan::join('tb_barang', 'tb_pemeliharaan.id_barang', 'tb_barang.id_barang')->orderBy('tb_pemeliharaan.id_pemeliharaan', 'DESC')->get(),
        ];
        return view('laporan.lapPemeliharaan', $data);
    }

    public function exportPemeliharaan(Request $r)
    {
        $data = [
            'title' => 'Data Pemeliharaan',
            'pemeliharaan' => Pemeliharaan::join('tb_barang', 'tb_pemeliharaan.id_barang', 'tb_barang.id_barang')->orderBy('tb_pemeliharaan.id_pemeliharaan', 'DESC')->get(),
        ];
        return view('laporan.exportPemeliharaan', $data);
    }

    public function lapSelesai(Request $r)
    {
        $data = [
            'title' => 'Data Selesai Service',
            'selesai' => Pemeliharaan::join('tb_barang', 'tb_pemeliharaan.id_barang', 'tb_barang.id_barang')->orderBy('tb_pemeliharaan.id_pemeliharaan', 'DESC')->get(),
        ];
        return view('laporan.lapSelesai', $data);
    }

    public function exportSelesai(Request $r)
    {

        $data = [
            'title' => 'Data Selesai Service',
            'selesai' => selesaiService::join('tb_barang', 'tb_selesai_service.id_barang', 'tb_barang.id_barang')->whereBetween('tb_selesai_service.tgl', [$r->tgl1, $r->tgl2])->orderBy('tb_selesai_service.id_service', 'DESC')->get(),
            'tgl1' => $r->tgl1,
            'tgl2' => $r->tgl2,
        ];
        return view('laporan.exportSelesai', $data);
    }

    public function lapPengambilan(Request $r)
    {
        $data = [
            'title' => 'Data Pengambilan Bahan',
            'cabang' => Cabang::all()
        ];
        return view('laporan.lapPengambilan', $data);
    }

    public function exportPengambilan(Request $r)
    {
        $cabang = $r->cabang;
        $barang = Stok::join('tb_barang', 'tb_stok.id_barang', 'tb_barang.id_barang')
            ->join('tb_satuan', 'tb_barang.id_satuan', 'tb_satuan.id_satuan')
            ->where([['tb_stok.status', 'KELUAR'], ['tb_stok.lokasi', $cabang]])
            ->orderBy('tb_stok.id_stok_barang', 'desc')->get();
        $data = [
            'title' => 'Data Pengambilan Bahan',
            'barang' => $barang,
            'cabang' => $cabang,
        ];
        return view('laporan.exportPengambilan', $data);
    }

    public function lapSuplier(Request $r)
    {
        $data = [
            'title' => 'Data Suplier',
            'suplier' => Suplier::all(),
        ];
        return view('laporan.lapSuplier', $data);
    }

    public function exportSuplier(Request $r)
    {
        $data = [
            'title' => 'Data Suplier',
            'suplier' => Suplier::all(),
        ];
        return view('laporan.exportSuplier', $data);
    }
}
