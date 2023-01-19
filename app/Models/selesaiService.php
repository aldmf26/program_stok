<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class selesaiService extends Model
{
    use HasFactory;
    protected $table = 'tb_selesai_service';
    protected $fillable = [
        'tgl', 'id_barang', 'biaya', 'ket'
    ];
}
