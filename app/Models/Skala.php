<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skala extends Model
{
    protected $table = 'skala_industri';
    protected $primaryKey = 'id_skala'; 
    protected $fillable = [
        'id_skala',
        'nama',
    ];
}
