<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data Pemeliharaan',
            'pemeliharaan' => Pemeliharaan::join('tb_barang', 'tb_pemeliharaan.id_barang', 'tb_barang.id_barang')->orderBy('tb_pemeliharaan.id_pemeliharaan', 'DESC')->get(),
            'barang' => Barang::all()
        ];
        return view('pemeliharaan.pemeliharaan', $data);
    }

    public function tambah(Request $r)
    {
        $cek = Pemeliharaan::where([['id_barang', $r->id_barang], ['tgl', $r->tgl]])->first();
        if($cek) {
            return redirect()->route('pemeliharaan')->with('error', 'Data Sudah Ada');
        } else {
            $data = [
                'tgl' => $r->tgl,
                'id_barang' => $r->id_barang,
                'jumlah' => $r->jumlah,
                'ket' => $r->ket,
                'status' => 'BELUM SELESAI',
            ];
    
            Pemeliharaan::create($data);
    
            return redirect()->route('pemeliharaan')->with('sukses', 'Berhasil tambah pemeliharaan');
        }
        
    }

    public function edit(Request $r)
    {
        $data = [
            'tgl' => $r->tgl,
            'id_barang' => $r->id_barang,
            'jumlah' => $r->jumlah,
            'ket' => $r->ket
        ];

        Pemeliharaan::where('id_pemeliharaan', $r->id_pemeliharaan)->update($data);

        return redirect()->route('pemeliharaan')->with('sukses', 'Berhasil edit pemeliharaan');
    }

    public function hapus(Request $r)
    {
        Pemeliharaan::where('id_pemeliharaan', $r->id_pemeliharaan)->delete();

        return redirect()->route('pemeliharaan')->with('error', 'Berhasil hapus pemeliharaan');
    }
}
