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

            if (!$jefeDeTurno) {
                return redirect()->route('principal')->with('error', 'NO CUENTAS CON PERMISO PARA EMITIR LICENCIAS');
            }

            $this->authorize('view', $jefeDeTurno);

            $departamentos = Departamento::all();
            $empleados = Empleado::all();
            $equipos = Equipo::all();

            return view('panel.licencias.index', compact('departamentos', 'empleados', 'equipos', 'jefeDeTurno'));
        } catch (AuthorizationException $e) {
            return redirect()->route('principal')->with('error', 'NO ESTAS AUTORIZADO PARA EMITIR LICENCIAS');
        }
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'tipo_licencia' => 'required',
            'numero_licencia' => 'required',
            'unidad' => 'required',
            'departamento_id' => 'required',
            'empleado_id' => 'required',
            'equipo_id' => 'required',
            'centro_gestor' => 'required',
            'comentario_trabajo_realizar' => 'required',
            'comentario_especifico' => 'required',
            'energia_equipo' => 'required',
            'maniobrar' => 'required',
            'asegurar' => 'required',
            'bloquear' => 'required',
        ], [
            'tipo_licencia.required' => 'El campo LICENCIA A TRABAJAR es obligatorio.',
            'numero_licencia.required' => 'El campo NÚMERO DE LICENCIA es obligatorio.',
            'unidad' => 'El campo UNIDAD es obligatorio.',
            'departamento_id' => 'El campo DEPARTAMENTO es obligatorio.',
            'empleado_id' => 'El campo A QUIEN SE CONCEDE es obligatorio.',
            'equipo_id' => 'El campo EQUIPO es obligatorio.',
            'centro_gestor' => 'El campo CENTRO DE GESTOR es obligatorio.',
            'comentario_trabajo_realizar' => 'El campo TRABAJO A REALIZAR es obligatorio.',
            'comentario_especifico' => 'El campo INSTRUCCIONES es obligatorio.',
            'energia_equipo' => 'El campo ENERGÍA EN EL EQUIPO es obligatorio.',
            'maniobrar' => 'El campo MANIOBRAR es obligatorio.',
            'asegurar' => 'El campo ASEGURAR es obligatorio.',
            'bloquear' => 'El campo BLOQUEAR es obligatorio.',
        ]);

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

        foreach (['maniobrar', 'asegurar', 'bloquear'] as $field) {
            if (isset($data[$field]) && is_array($data[$field])) {
                $data[$field] = implode(', ', $data[$field]);
            }
        }

        $data['user_id'] = $user->id;

        Licencias::create($data);
        Log::info('Se ah emitido una nueva licencia con el RPE: ' . $request->rpe);

        return redirect()->route('licencias')->with('success', 'LICENCIA GENERADA CORRECTAMENTE');
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
        $licencias = Licencias::all();

        return view('panel.documentos.index', compact('licencias'));
    }

    private function userIsJefeDeTurno()
    {
        $jefeDeTurno = JefeDeTurno::where('rpe', Auth::user()->rpe)->first();
        return $jefeDeTurno !== null;
    }

    public function destroy(string $id)
    {
        try {
            if (!$this->userIsJefeDeTurno()) {
                throw new AuthorizationException();
            }

            $licencia = Licencias::findOrFail($id);
            $licencia->delete();

            return redirect()->route('status')->with('success', 'LICENCIA ELIMINADA CORRECTAMENTE');
        } catch (AuthorizationException $e) {
            return redirect()->route('principal')->with('error', 'NO CUENTAS CON PERMISOS PARA ELIMINAR LICENCIAS');
        } catch (\Exception $e) {
            return redirect()->route('principal')->with('error', 'SE PRODUJO UN ERROR AL ELIMINAR LA LICENCIA');
        }
    }

    public function update(Request $request, $id)
    {
        $licencia = Licencias::findOrFail($id);
        if (!$this->userIsJefeDeTurno()) {
            return redirect()->route('principal')->with('error', 'NO CUENTAS CON PERMISOS PARA LIBERAR LICENCIAS');
        }

        $request->validate([
            'estado' => 'required|in:NO LIBERADO,LIBERADO',
        ]);

        $licencia->status = $request->estado;

        $licencia->usuario_que_libero_id = Auth::id();
        $jefeDeTurno = JefeDeTurno::where('rpe', Auth::user()->rpe)->first();
        $licencia->quien_libero = $jefeDeTurno->nombre;

        $licencia->save();

        return redirect()->route('status')->with('success', 'LICENCIA LIBERADA CORRECTAMENTE');
    }
}
