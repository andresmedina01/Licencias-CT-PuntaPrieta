<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['name', 'empleado_id', 'departamento_id'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}