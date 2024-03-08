<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'rpe', 'correo', 'puesto', 'departamento_id'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}