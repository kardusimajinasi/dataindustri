<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaPemasaran extends Model
{
    protected $table = 'area_pemasaran';
    protected $primaryKey = 'id_area_pemasaran'; 
    protected $fillable = [
        'id_area_pemasaran',
        'nama',
    ];
}
