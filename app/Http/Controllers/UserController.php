<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data User',
            'user' => User::all(),
        ];
        return view('user.user', $data);
    }

    public function tambah(Request $r)
    {
        $data = [
            'nama' => $r->nama,
            'username' => $r->username,
            'password' => bcrypt($r->password),
        ];
        User::create($data);
        return redirect()->route('user')->with('sukses', 'Berhasil tambah User');
    }

    public function hapus(Request $r)
    {
        User::where('id', $r->id_user)->delete();
        return redirect()->route('user')->with('error', 'Berhasil hapus User');
    }
}
