<?php

namespace App\Http\Controllers;

use App\Models\Licencias;
use App\Models\Departamento;
use App\Models\JefeDeTurno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraphController extends Controller
{
    public function ShowGraph()
    {
        $user = Auth::user();
        $departamentos = Departamento::pluck('nombre')->toArray();
        $licenciasPorDepartamento = Licencias::selectRaw('departamento_id, COUNT(*) as cantidad')
            ->groupBy('departamento_id')
            ->pluck('cantidad')->toArray();

        $jefesDeTurno = JefeDeTurno::pluck('rpe')->toArray();
        $licenciasPorJefeDeTurno = Licencias::selectRaw('jefe_de_turno_id, COUNT(*) as cantidad')
            ->groupBy('jefe_de_turno_id')
            ->pluck('cantidad')->toArray();

        return view('panel.principal', compact('user', 'departamentos', 'licenciasPorDepartamento', 'jefesDeTurno', 'licenciasPorJefeDeTurno'));
    }
}
