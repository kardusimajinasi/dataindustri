<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrekuensiKomplain extends Model
{
     protected $table = 'frekuensi_komplain';
    protected $primaryKey = 'id_komplain'; 
    protected $fillable = [
        'id_komplain',
        'nama',
    ];
}
