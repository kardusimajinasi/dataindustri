<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesBahan extends Model
{
    protected $table = 'akses_bahan';
    protected $primaryKey = 'id_ketersediaan'; 
    protected $fillable = [
        'id_ketersediaan',
        'nama',
    ];
}
