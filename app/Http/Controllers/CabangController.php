<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data Cabang',
            'cabang' => Cabang::orderBy('id_cabang', 'DESC')->get(),
        ];
        return view('cabang.cabang', $data);
    }

    public function tambah(Request $r)
    {
        $data = [
            'nm_cabang' => $r->nm_cabang,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'pengelola' => $r->pengelola,
        ];

        Cabang::create($data);

        return redirect()->route('cabang')->with('sukses', 'Berhasil tambah cabang');
    }

    public function edit(Request $r)
    {
        $data = [
            'nm_cabang' => $r->nm_cabang,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'pengelola' => $r->pengelola,
        ];

        Cabang::where('id_cabang', $r->id_cabang)->update($data);

        return redirect()->route('cabang')->with('sukses', 'Berhasil edit cabang');
    }

    public function hapus(Request $r)
    {
        Cabang::where('id_cabang', $r->id_cabang)->delete();

        return redirect()->route('cabang')->with('error', 'Berhasil hapus cabang');
    }
}
