<?php

namespace App\Http\Controllers;

use App\Models\Licencias;
use App\Models\Departamento;
use App\Models\JefeDeTurno;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function ShowGraph()
    {
        // Obtener los datos para las gráficas de departamentos
        $departamentos = Departamento::pluck('nombre')->toArray();
        $licenciasPorDepartamento = Licencias::selectRaw('departamento_id, COUNT(*) as cantidad')
            ->groupBy('departamento_id')
            ->pluck('cantidad')->toArray();

        // Obtener los datos para las gráficas de jefes de turno
        $jefesDeTurno = JefeDeTurno::pluck('rpe')->toArray();
        $licenciasPorJefeDeTurno = Licencias::selectRaw('jefe_de_turno_id, COUNT(*) as cantidad')
            ->groupBy('jefe_de_turno_id')
            ->pluck('cantidad')->toArray();

        // Devolver la vista con todos los datos
        return view('panel.principal', compact('departamentos', 'licenciasPorDepartamento', 'jefesDeTurno', 'licenciasPorJefeDeTurno'));
    }
}
