<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeIndustri extends Model
{
    protected $table = 'tipe_industri';
    protected $primaryKey = 'id_tipe_industri'; 
    protected $fillable = [
        'id_tipe_industri',
        'nama',
    ];
}
