<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadanUsaha extends Model
{
    protected $table = 'badan_usaha';
    protected $primaryKey = 'id_badan_usaha'; 
    protected $fillable = [
        'id_badan_usaha',
        'nama',
    ];
}
