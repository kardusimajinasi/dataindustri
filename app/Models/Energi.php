<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energi extends Model
{
     protected $table = 'energi';
    protected $primaryKey = 'id_energi'; 
    protected $fillable = [
        'id_energi',
        'nama',
    ];
}
