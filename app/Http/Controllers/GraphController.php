<?php

namespace App\Http\Controllers;

use App\Models\Licencias;
use App\Models\Departamento;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function ShowGraph()
    {
        // Verificar si la solicitud espera una respuesta de gráfica
        if (request()->expectsJson()) {
            // Obtener los datos necesarios para la gráfica
            $departamentos = Departamento::pluck('nombre')->toArray();
            $licenciasPorDepartamento = Licencias::selectRaw('departamento_id, COUNT(*) as cantidad')
                ->groupBy('departamento_id')
                ->pluck('cantidad')->toArray();

            // Retornar los datos en formato JSON
            return response()->json([
                'departamentos' => $departamentos,
                'licencias_por_departamento' => $licenciasPorDepartamento,
            ]);
        }

        // Si la solicitud no espera una respuesta JSON, mostrar la vista panel.principal
        $departamentos = Departamento::pluck('nombre')->toArray();
        $licenciasPorDepartamento = Licencias::selectRaw('departamento_id, COUNT(*) as cantidad')
            ->groupBy('departamento_id')
            ->pluck('cantidad')->toArray();

        return view('panel.principal', compact('departamentos', 'licenciasPorDepartamento'));
    }
}
