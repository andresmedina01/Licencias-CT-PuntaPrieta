<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\LicenciaRequest;
use App\Models\Licencias;
use App\Models\User;
use App\Models\Departamento;
use App\Models\JefeDeTurno;
use App\Models\Empleado;
use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

class LicenciasController extends Controller
{

    public function show()
    {
        try {
            $user = Auth::user();
            $jefeDeTurno = JefeDeTurno::where('rpe', $user->rpe)->first();

            // Verifica si $jefeDeTurno está definido
            if (!$jefeDeTurno) {
                // Maneja el caso en el que no se encuentra un jefe de turno
                return redirect()->back()->with('error', 'No se encontró el jefe de turno.');
            }

            $this->authorize('view', $jefeDeTurno);

            $departamentos = Departamento::all();
            $empleados = Empleado::all();
            $equipos = Equipo::all();

            return view('panel.licencias.index', compact('departamentos', 'empleados', 'equipos', 'jefeDeTurno'));
        } catch (AuthorizationException $e) {
            return redirect()->back()->with('error', 'No estás autorizado para emitir licencias.');
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->only([
            'tipo_licencia',
            'numero_licencia',
            'unidad',
            'departamento_id',
            'jefe_de_turno_id',
            'empleado_id',
            'equipo_id',
            'centro_gestor',
            'comentario_trabajo_realizar',
            'comentario_especifico',
            'energia_equipo',
            'maniobrar',
            'asegurar',
            'bloquear',
        ]);

        // Convertir los campos de tipo array en cadenas separadas por comas
        foreach (['maniobrar', 'asegurar', 'bloquear'] as $field) {
            if (isset($data[$field]) && is_array($data[$field])) {
                $data[$field] = implode(',', $data[$field]);
            }
        }

        $data['user_id'] = $user->id;

        Licencias::create($data);
        Log::info('Se ah emitido una nueva licencia con el RPE: ' . $request->rpe);

        return redirect()->route('licencias')->with('success', '¡La licencia se ha guardado correctamente!');
    }

    public function getEmpleados(Request $request)
    {
        $empleados = Empleado::where('departamentos_id', $request->departamento_id)->get();

        return response()->json($empleados);
    }


    public function getEquipos(Request $request)
    {
        if (empty($request->centro_gestor)) {
            $equipos = Equipo::where('unidad', $request->unidad)->get();
            return response()->json($equipos);
        }

        if (empty($request->unidad)) {
            $equipos = Equipo::where('centro_gestor', $request->centro_gestor)->get();
            return response()->json($equipos);
        }

        $equipos = Equipo::where('unidad', $request->unidad)->where('centro_gestor', $request->centro_gestor)->get();
        return response()->json($equipos);
    }


    public function index()
    {
        $licencias = Licencias::all();

        $licenciasNoLiberadas = $licencias->filter(function ($licencia) {
            return $licencia->status !== 'LIBERADO';
        });

        return view('panel.status.index', compact('licenciasNoLiberadas'));
    }


    public function liberarLicencia(string $id)
    {
        $licencia = Licencias::FindOrFail($id);
        return view('panel.status.liberar', ['licencia' => $licencia]);
    }

    public function showLicencia(string $id)
    {
        $licencia = Licencias::FindOrFail($id);
        return view('panel.status.print', ['licencia' => $licencia]);
    }

    public function showLicense(string $id)
    {
        $licencia = Licencias::FindOrFail($id);
        return view('panel.documentos.print', ['licencia' => $licencia]);
    }

    public function showLicences()
    {
        // Obtener todas las licencias
        $licencias = Licencias::all();

        return view('panel.documentos.index', compact('licencias'));
    }

    private function userIsJefeDeTurno()
    {
        $jefeDeTurno = JefeDeTurno::where('rpe', Auth::user()->rpe)->first();
        return $jefeDeTurno !== null;
    }

    public function update(Request $request, $id)
    {
        $licencia = Licencias::findOrFail($id);
        // Validación de permisos
        if (!$this->userIsJefeDeTurno()) {
            return redirect()->route('principal')->with('error', 'No tienes permiso para liberar esta licencia.');
        }

        $request->validate([
            'estado' => 'required|in:NO LIBERADO,LIBERADO',
        ]);

        $licencia->status = $request->estado;

        $licencia->usuario_que_libero_id = Auth::id();
        $jefeDeTurno = JefeDeTurno::where('rpe', Auth::user()->rpe)->first();
        $licencia->quien_libero = $jefeDeTurno->nombre;

        $licencia->save();

        return redirect()->route('status')->with('success', 'Licencia liberada correctamente');
    }
}
