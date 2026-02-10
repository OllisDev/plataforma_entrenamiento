<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentesBicicleta extends Model
{
    use HasFactory;
    protected $table = 'componentes_bicicleta';
    public $timestamps = false;
}
