<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrasiLegalitasStandardisasi extends Model
{
    protected $table = 'administrasi_legalitas_standardisasi';
    protected $primaryKey = 'id_administrasi'; 
    protected $fillable = [
        'id_administrasi',
        'nama',
    ];

}
