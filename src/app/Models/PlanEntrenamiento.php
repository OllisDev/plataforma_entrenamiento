<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanEntrenamiento extends Model
{
    use HasFactory;
    protected $table = 'plan_entrenamiento';

    public $timestamps = false;
}
