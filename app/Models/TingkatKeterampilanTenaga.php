<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatKeterampilanTenaga extends Model
{
    protected $table = 'tingkat_keterampilan_tenaga';
    protected $primaryKey = 'id_keterampilan'; 
    protected $fillable = [
        'id_keterampilan',
        'nama',
    ];
}
