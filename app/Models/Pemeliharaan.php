<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;
    protected $table = 'tb_pemeliharaan';
    protected $fillable = [
        'tgl', 'id_barang', 'tgl_service', 'ket', 'jumlah', 'status'
    ];
}
