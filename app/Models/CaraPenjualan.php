<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaraPenjualan extends Model
{
     protected $table = 'cara_penjualan';
    protected $primaryKey = 'id_cara_jual'; 
    protected $fillable = [
        'id_cara_jual',
        'nama',
    ];
}
