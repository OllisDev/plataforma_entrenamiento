<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloqueEntrenamiento extends Model
{
    use HasFactory;
    protected $table = 'bloque_entrenamiento';

    public $timestamps = false;
}
