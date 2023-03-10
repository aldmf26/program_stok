<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'tb_cabang';
    protected $fillable = [
        'nm_cabang', 'alamat', 'no_hp'
    ];
}
