<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrekuensiKeterlambatan extends Model
{
     protected $table = 'frekuensi_keterlambatan';
    protected $primaryKey = 'id_keterlambatan'; 
    protected $fillable = [
        'id_keterlambatan',
        'nama',
    ];
}
