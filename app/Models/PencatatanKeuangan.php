<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencatatanKeuangan extends Model
{
    protected $table = 'jenis_pencatatan_keuangan';
    protected $primaryKey = 'id_pencatatan'; 
    protected $fillable = [
        'id_pencatatan',
        'nama',
    ];
}
