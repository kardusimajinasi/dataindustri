<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuanAlat extends Model
{
    protected $table = 'bantuan_alat';
    protected $primaryKey = 'id_bantuan_alat'; 
    protected $fillable = [
        'id_bantuan_alat',
        'tahun',
        'bentuk',
        'dokumen',
    ];
}
