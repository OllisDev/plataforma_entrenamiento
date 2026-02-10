<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionBloque extends Model
{
    use HasFactory;
    protected $table = 'sesion_bloque';

    public $timestamps = false;
}
