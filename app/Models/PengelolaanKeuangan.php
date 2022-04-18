<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengelolaanKeuangan extends Model
{
     protected $table = 'pengelolaan_keuangan';
    protected $primaryKey = 'id_pengelolaan'; 
    protected $fillable = [
        'id_pengelolaan',
        'nama',
    ];
}
