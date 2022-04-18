<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustriKreatif extends Model
{
    protected $table = 'industri_kreatif';
    protected $primaryKey = 'id_industri_kreatif'; 
    protected $fillable = [
        'id_industri_kreatif',
        'nama',
    ];
}
