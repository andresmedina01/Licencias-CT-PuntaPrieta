<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JefeDeTurno extends Model
{
    protected $fillable = ['nombre', 'rpe', 'correo', 'departamento_id'];

    protected $table = 'jefes_de_turno';
    
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}