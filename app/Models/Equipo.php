<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['denominacion', 'centro_gestor', 'unidad'];
}
