<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data Jenis',
            'jenis' => Jenis::all(),
        ];
        return view('jenis.jenis', $data);
    }

    public function tambah(Request $r)
    {
        $data = [
            'jenis' => $r->jenis,
            'ket' => $r->ket,
        ];

        Jenis::create($data);

        return redirect()->route('jenis')->with('sukses', 'Berhasil tambah jenis');
    }

    public function edit(Request $r)
    {
        $data = [
            'jenis' => $r->jenis,
            'ket' => $r->ket,
        ];

        Jenis::where('id_jenis', $r->id_jenis)->update($data);

        return redirect()->route('jenis')->with('sukses', 'Berhasil edit jenis');
    }

    public function hapus(Request $r)
    {
        Jenis::where('id_jenis', $r->id_jenis)->delete();

        return redirect()->route('jenis')->with('error', 'Berhasil hapus jenis');
    }
}
