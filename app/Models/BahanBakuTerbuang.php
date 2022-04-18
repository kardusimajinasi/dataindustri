<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakuTerbuang extends Model
{
    protected $table = 'jumlah_bahan_baku_terbuang';
    protected $primaryKey = 'id_bahan_terbuang'; 
    protected $fillable = [
        'id_bahan_terbuang',
        'nama',
    ];
}
