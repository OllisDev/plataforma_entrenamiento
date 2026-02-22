<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{
    use HasFactory;
    protected $table = 'bicicleta';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'tipo',
        'comentario'
    ];
}
