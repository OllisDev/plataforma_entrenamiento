<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionEntrenamiento extends Model
{
    use HasFactory;
    protected $table = 'sesion_entrenamiento';

    public $timestamps = false;
}
