<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesModal extends Model
{
    protected $table = 'id_akses_modal';
    protected $primaryKey = 'id_akses_modal'; 
    protected $fillable = [
        'id_akses_modal',
        'nama',
    ];
}
