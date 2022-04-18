<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertumbuhanPenjualan extends Model
{
     protected $table = 'pertumbuhan_penjualan';
    protected $primaryKey = 'id_pertumbuhan_penjualan'; 
    protected $fillable = [
        'id_pertumbuhan_penjualan',
        'nama',
    ];
}
