<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KBLI extends Model
{
     protected $table = 'kbli';
    protected $primaryKey = 'id_kbli'; 
    protected $fillable = [
        'id_kbli',
        'kode',
        'nama',
    ];
}
