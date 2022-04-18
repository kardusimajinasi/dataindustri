<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasaranOnline extends Model
{
     protected $table = 'pemasaran_online';
    protected $primaryKey = 'id_pemasaran'; 
    protected $fillable = [
        'id_pemasaran',
        'nama',
    ];
}
