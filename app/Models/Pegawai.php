<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';
    protected $fillable = [
        'nm_pegawai', 'alamat', 'no_hp', 'posisi', 'tgl_masuk'
    ];
}
