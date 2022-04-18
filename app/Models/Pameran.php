<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pameran extends Model
{
    protected $table = 'pameran';
    protected $primaryKey = 'id_pameran'; 
    protected $fillable = [
        'id_pameran',
        'nama',
    ];
}
