<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeikutsertaanBPJS extends Model
{
    protected $table = 'keikutsertaan_bpjs';
    protected $primaryKey = 'id_bpjs'; 
    protected $fillable = [
        'id_bpjs',
        'nama',
    ];
}
