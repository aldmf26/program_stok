<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data Suplier',
            'suplier' => Suplier::all(),
        ];
        return view('suplier.suplier', $data);
    }

    public function tambah(Request $r)
    {
        $data = [
            'nm_suplier' => $r->nm_suplier,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
        ];

        Suplier::create($data);

        return redirect()->route('suplier')->with('sukses', 'Berhasil tambah suplier');
    }

    public function edit(Request $r)
    {
        $data = [
            'nm_suplier' => $r->nm_suplier,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
        ];

        Suplier::where('id_suplier', $r->id_suplier)->update($data);

        return redirect()->route('suplier')->with('sukses', 'Berhasil edit suplier');
    }

    public function hapus(Request $r)
    {
        Suplier::where('id_suplier', $r->id_suplier)->delete();

        return redirect()->route('suplier')->with('error', 'Berhasil hapus suplier');
    }
}
