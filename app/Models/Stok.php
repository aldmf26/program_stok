<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'tb_stok';
    protected $fillable = [
        'id_barang', 'masuk', 'keluar', 'tgl', 'lokasi', 'status', 'id_jenis', 'admin'
    ];
}
