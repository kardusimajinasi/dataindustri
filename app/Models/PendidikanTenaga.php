<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanTenaga extends Model
{
    protected $table = 'pendidikan_tenaga';
    protected $primaryKey = 'id_pendidikan'; 
    protected $fillable = [
        'id_pendidikan',
        'nama',
    ];
}
