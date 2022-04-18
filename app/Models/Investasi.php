<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investasi extends Model
{
    protected $table = 'nilai_investasi';
    protected $primaryKey = 'id_investasi'; 
    protected $fillable = [
        'id_investasi',
        'nama',
    ];
}
