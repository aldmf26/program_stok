<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => Pegawai::all(),
        ];
        return view('pegawai.pegawai', $data);
    }

    public function tambah(Request $r)
    {
        $data = [
            'nm_pegawai' => $r->nm_pegawai,
            'alamat' => $r->alamat,
            'posisi' => $r->posisi,
            'tgl_masuk' => $r->tgl_masuk,
            'no_hp' => $r->no_hp,
        ];

        Pegawai::create($data);

        return redirect()->route('pegawai')->with('sukses', 'Berhasil tambah pegawai');
    }

    public function edit(Request $r)
    {
        $data = [
            'nm_pegawai' => $r->nm_pegawai,
            'alamat' => $r->alamat,
            'posisi' => $r->posisi,
            'tgl_masuk' => $r->tgl_masuk,
            'no_hp' => $r->no_hp,
        ];

        Pegawai::where('id_pegawai', $r->id_pegawai)->update($data);

        return redirect()->route('pegawai')->with('sukses', 'Berhasil edit pegawai');
    }

    public function hapus(Request $r)
    {
        Pegawai::where('id_pegawai', $r->id_pegawai)->delete();

        return redirect()->route('pegawai')->with('error', 'Berhasil hapus pegawai');
    }
}
