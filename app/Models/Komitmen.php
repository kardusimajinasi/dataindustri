<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komitmen extends Model
{
    protected $table = 'komitmen';
    protected $primaryKey = 'id_komitmen'; 
    protected $fillable = [
        'id_komitmen',
        'nama',
    ];
}
