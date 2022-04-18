<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesinProduksi extends Model
{
    protected $table = 'mesin_peralatan_industri';
    protected $primaryKey = 'id_mesin'; 
    protected $fillable = [
        'id_mesin',
        'nama',
    ];
}
