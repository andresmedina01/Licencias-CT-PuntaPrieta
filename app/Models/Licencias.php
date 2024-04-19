<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licencias extends Model
{
    protected $fillable = [
        'tipo_licencia',
        'numero_licencia',
        'unidad',
        'jefe_de_turno_id',
        'empleado_id',
        'departamento_id',
        'equipo_id',
        'user_id',
        'centro_gestor',
        'comentario_trabajo_realizar',
        'comentario_especifico',
        'comentario_trabajo_realizar1',
        'comentario_especifico1',
        'comentario_trabajo_realizar2',
        'comentario_especifico2',
        'comentario_trabajo_realizar3',
        'comentario_especifico3',
        'comentario_trabajo_realizar4',
        'comentario_especifico4',
        'comentario_trabajo_realizar5',
        'comentario_especifico5',
        'energia_equipo',
        'maniobrar',
        'asegurar',
        'bloquear',
        'status' => 'NO LIBERADO',
    ];

    public function jefeDeTurno()
    {
        return $this->belongsTo(JefeDeTurno::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
