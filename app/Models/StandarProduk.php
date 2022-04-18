<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarProduk extends Model
{
    protected $table = 'standar_mutu_produk';
    protected $primaryKey = 'id_standar_mutu'; 
    protected $fillable = [
        'id_standar_mutu',
        'nama',
    ];
}
