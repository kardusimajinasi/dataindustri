<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukCacat extends Model
{
    protected $table = 'jumlah_produk_cacat';
    protected $primaryKey = 'id_produk_cacat'; 
    protected $fillable = [
        'id_produk_cacat',
        'nama',
    ];
}
