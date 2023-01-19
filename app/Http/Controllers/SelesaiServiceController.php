<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\selesaiService;
use Illuminate\Http\Request;

class SelesaiServiceController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data Selesai Service',
            'service' => selesaiService::join('tb_barang', 'tb_selesai_service.id_barang', 'tb_barang.id_barang')->orderBy('tb_selesai_service.id_service', 'DESC')->get(),
            'barang' => Pemeliharaan::join('tb_barang', 'tb_pemeliharaan.id_barang', 'tb_barang.id_barang')->where('tb_pemeliharaan.status', 'BELUM SELESAI')->get(),
        ];
        return view('selesaiService.selesaiService', $data);
    }

    public function tambah(Request $r)
    {
        $cek = selesaiService::where([['id_barang', $r->id_barang], ['tgl', $r->tgl]])->first();
        if ($cek) {
            return redirect()->route('selesaiService')->with('error', 'Data Sudah Ada');
        } else {
            $data = [
                'tgl' => $r->tgl,
                'id_barang' => $r->id_barang,
                'biaya' => $r->biaya,
                'ket' => $r->ket,
            ];

            selesaiService::create($data);
            Pemeliharaan::where('id_barang', $r->id_barang)->update(['status' => 'SELESAI']);

            return redirect()->route('service')->with('sukses', 'Berhasil tambah service');
        }
    }

    public function edit(Request $r)
    {
        $data = [
            'tgl' => $r->tgl,
            'id_barang' => $r->id_barang,
            'biaya' => $r->jumlah,
            'ket' => $r->ket,
        ];

        selesaiService::where('id_service', $r->id_service)->update($data);
        Pemeliharaan::where('id_barang', $r->id_barang)->update(['status' => 'SELESAI']);
        Pemeliharaan::where('id_barang', $r->id_barang_sebelumnya)->update(['status' => 'BELUM SELESAI']);
        return redirect()->route('service')->with('sukses', 'Berhasil edit service');
    }

    public function hapus(Request $r)
    {
        Pemeliharaan::where('id_barang', $r->id_barang)->update(['status' => 'BELUM SELESAI']);
        selesaiService::where('id_service', $r->id_service)->delete();

        return redirect()->route('service')->with('error', 'Berhasil hapus service');
    }
}
