<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemilik extends Model
{
    protected $table = 'data_pemilik';
    protected $primaryKey = 'user_id'; 
    protected $guarded = [];
}
