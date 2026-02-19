<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloqueEntrenamiento extends Model
{
    use HasFactory;
    protected $table = 'bloque_entrenamiento';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'duracion_estimada',
        'potencia_pct_min',
        'potencia_pct_max',
        'pulso_pct_max',
        'pulso_reserva_pct',
        'comentario'
    ];
}
