<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuanBahan extends Model
{
    protected $table = 'bantuan_bahan';
    protected $primaryKey = 'id_bantuan_bahan'; 
    protected $fillable = [
        'id_bantuan_bahan',
        'tahun',
        'bentuk',
        'dokumen',
    ];
}
