<?php

namespace App\Http\Controllers;

use App\Models\satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data Satuan',
            'satuan' => Satuan::all(),
        ];
        return view('satuan.satuan', $data);
    }

    public function tambah(Request $r)
    {
        $data = [
            'satuan' => $r->satuan,
            'ket' => $r->ket,
        ];

        Satuan::create($data);

        return redirect()->route('satuan')->with('sukses', 'Berhasil tambah satuan');
    }

    public function edit(Request $r)
    {
        $data = [
            'satuan' => $r->satuan,
            'ket' => $r->ket,
        ];

        Satuan::where('id_satuan', $r->id_satuan)->update($data);

        return redirect()->route('satuan')->with('sukses', 'Berhasil edit satuan');
    }

    public function hapus(Request $r)
    {
        Satuan::where('id_satuan', $r->id_satuan)->delete();

        return redirect()->route('satuan')->with('error', 'Berhasil hapus satuan');
    }
}
