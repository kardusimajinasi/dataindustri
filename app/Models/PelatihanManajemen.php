<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanManajemen extends Model
{
    protected $table = 'pelatihan_manajemen_mutu';
    protected $primaryKey = 'id_pelatihan'; 
    protected $fillable = [
        'id_pelatihan',
        'nama',
    ];
}
