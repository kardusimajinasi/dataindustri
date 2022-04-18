<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaDesainer extends Model
{
    protected $table = 'tenaga_desainer';
    protected $primaryKey = 'id_tenaga'; 
    protected $fillable = [
        'id_tenaga',
        'nama',
    ];
}
