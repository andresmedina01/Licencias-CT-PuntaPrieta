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


// area de los controladores de licencias
class LicenciasController extends Controller
{
    public function show()
    {
        try {
            $user = Auth::user();
            $jefeDeTurno = JefeDeTurno::where('rpe', $user->rpe)->first();

            if (!$jefeDeTurno) {    //ocupas contar con el perfil de jefe de turno, sino mostrara la siguiente alerta
                return redirect()->route('principal')->with('error', 'NO CUENTAS CON PERMISO PARA EMITIR LICENCIAS');
            }
            // si cuentas con permiso mostrara el formulario para generar licencias
            $this->authorize('view', $jefeDeTurno);

            $departamentos = Departamento::all();
            $empleados = Empleado::all();
            $equipos = Equipo::all();

            return view('panel.licencias.index', compact('departamentos', 'empleados', 'equipos', 'jefeDeTurno'));
        } catch (AuthorizationException $e) {
            return redirect()->route('principal')->with('error', 'NO ESTAS AUTORIZADO PARA EMITIR LICENCIAS');
        }
    }
    // controlador para almacenar informacion en la DB
    // muestra que se solicitara y que almacenara del formulario
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
            'comentario_trabajo_realizar1' => 'required',
            'comentario_especifico1' => 'required',
            'comentario_trabajo_realizar2' => 'required',
            'comentario_especifico2' => 'required',
            'comentario_trabajo_realizar3' => 'required',
            'comentario_especifico3' => 'required',
            'comentario_trabajo_realizar4' => 'required',
            'comentario_especifico4' => 'required',
            'comentario_trabajo_realizar5' => 'required',
            'comentario_especifico5' => 'required',
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
            'comentario_trabajo_realizar' => 'El campo TRABAJO A REALIZAR [1] es obligatorio.',
            'comentario_especifico' => 'El campo INSTRUCCIONES [1] es obligatorio.',
            'comentario_trabajo_realizar1' => 'El campo TRABAJO A REALIZAR [2] es obligatorio.',
            'comentario_especifico1' => 'El campo INSTRUCCIONES [2] es obligatorio.',
            'comentario_trabajo_realizar2' => 'El campo TRABAJO A REALIZAR [3] es obligatorio.',
            'comentario_especifico2' => 'El campo INSTRUCCIONES [3] es obligatorio.',
            'comentario_trabajo_realizar3' => 'El campo TRABAJO A REALIZAR [4] es obligatorio.',
            'comentario_especifico3' => 'El campo INSTRUCCIONES [4] es obligatorio.',
            'comentario_trabajo_realizar4' => 'El campo TRABAJO A REALIZAR [5] es obligatorio.',
            'comentario_especifico4' => 'El campo INSTRUCCIONES [5] es obligatorio.',
            'comentario_trabajo_realizar5' => 'El campo TRABAJO A REALIZAR [6] es obligatorio.',
            'comentario_especifico5' => 'El campo INSTRUCCIONES [6] es obligatorio.',
            'energia_equipo' => 'El campo ENERGÍA EN EL EQUIPO es obligatorio.',
            'maniobrar' => 'El campo MANIOBRAR es obligatorio.',
            'asegurar' => 'El campo ASEGURAR es obligatorio.',
            'bloquear' => 'El campo BLOQUEAR es obligatorio.',
        ]); // se anexan validaciones, la cual si no se llena un campo no pueda emitir la licencia

        $data = $request->only([    // solo solicitara esta informacion para almacenarla en la DB
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
        ]);

        foreach (['maniobrar', 'asegurar', 'bloquear'] as $field) {
            if (isset($data[$field]) && is_array($data[$field])) {
                $data[$field] = implode(', ', $data[$field]);
            }
        }

        $data['user_id'] = $user->id;

        Licencias::create($data);
        Log::info('Se ah emitido una nueva licencia con el RPE: ' . $request->rpe);
        // cuando haya capturado toda la informacion mostrara el siguiente mensaje
        return redirect()->route('licencias')->with('success', 'LICENCIA GENERADA CORRECTAMENTE');
    }

    // funcion para activar las validaciones de la funcion de departamento y solicitante
    public function getEmpleados(Request $request)
    {
        $empleados = Empleado::where('departamentos_id', $request->departamento_id)->get();
        return response()->json($empleados);
    }

    // funcion para activar las validaciones de la funcion de unidad, centro de gestor y equipo
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

    // realiza el filtro de la licencias en procesos y las completadas
    // si esta en proceso las mostrara en el panel de estado
    public function index()
    {
        $licencias = Licencias::all();

        $licenciasNoLiberadas = $licencias->filter(function ($licencia) {
            return $licencia->status !== 'LIBERADO';
        });

        return view('panel.status.index', compact('licenciasNoLiberadas'));
    }


    //funcion para cerrar una licencia
    // una vez que se cierre la licencia la marcara como licencia completada
    public function cerrarLicencia(string $id)
    {
        $licencia = Licencias::FindOrFail($id);
        return view('panel.status.cerrar', ['licencia' => $licencia]);
    }
    // mostrara la licencia previamente generada en la vista de imprimir
    public function showLicencia(string $id)
    {
        $licencia = Licencias::FindOrFail($id);
        return view('panel.status.print', ['licencia' => $licencia]);
    }
    // mostrara informacion relevante de la licencia en la vista para imprimir
    public function showLicense(string $id)
    {
        $licencia = Licencias::FindOrFail($id);
        return view('panel.documentos.print', ['licencia' => $licencia]);
    }

    //mostrara la licencia que se han cerrado correctamente
    public function showLicences()
    {
        $licencias = Licencias::all();

        return view('panel.documentos.index', compact('licencias'));
    }

    // verificacion si el usuario es jefe de turno
    //si lo es, pdora eliminar licencia
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
        } catch (AuthorizationException $e) {   // mostrara el mensaje si es jefe de turno
            return redirect()->route('principal')->with('error', 'NO CUENTAS CON PERMISOS PARA ELIMINAR LICENCIAS');
        } catch (\Exception $e) {   //mostrara el mensaje si no es jefe de turno
            return redirect()->route('principal')->with('error', 'SE PRODUJO UN ERROR AL ELIMINAR LA LICENCIA');
        }
    }

    public function edit($id)
    {
        $licencia = Licencias::findOrFail($id); // Obtén la licencia por su ID
        return view('panel.status.editar', ['licencia' => $licencia]);
    }


    public function actualizar(Request $request, $id)
    {
        // Verificar si el usuario actual es un jefe de turno
        $user = Auth::user();
        $jefeDeTurno = JefeDeTurno::where('rpe', $user->rpe)->first();

        if (!$jefeDeTurno) {
            // Si el usuario actual no es un jefe de turno, redirigir con un mensaje de error
            return redirect()->route('principal')->with('error', 'NO CUENTAS CON PERMISOS PARA EDITAR LICENCIAS');
        }

        // Validar los datos de la solicitud


        // Cargar los datos existentes del modelo correspondiente
        $licencia = Licencias::findOrFail($id);

        // Actualizar los datos del modelo con los datos de la solicitud
        $licencia->comentario_trabajo_realizar = $request->input('comentario_trabajo_realizar');
        $licencia->comentario_especifico = $request->input('comentario_especifico');
        $licencia->comentario_trabajo_realizar1 = $request->input('comentario_trabajo_realizar1');
        $licencia->comentario_especifico1 = $request->input('comentario_especifico1');
        $licencia->comentario_trabajo_realizar2 = $request->input('comentario_trabajo_realizar2');
        $licencia->comentario_especifico2 = $request->input('comentario_especifico2');
        $licencia->comentario_trabajo_realizar3 = $request->input('comentario_trabajo_realizar3');
        $licencia->comentario_especifico3 = $request->input('comentario_especifico3');
        $licencia->comentario_trabajo_realizar4 = $request->input('comentario_trabajo_realizar4');
        $licencia->comentario_especifico4 = $request->input('comentario_especifico4');
        $licencia->comentario_trabajo_realizar5 = $request->input('comentario_trabajo_realizar5');
        $licencia->comentario_especifico5 = $request->input('comentario_especifico5');
        // Actualiza aquí los demás campos necesarios

        // Guardar los cambios en la base de datos
        $licencia->save();

        // Redireccionar a la página de detalles o cualquier otra página después de la actualización
        return redirect()->route('status', $licencia->id)->with('success', 'LICENCIA ACTUALIZADA CORRECTAMENTE');
    }



    // Si el usuario quiere cerrar una licencia, pero no esta dado de alta como jefe de turno
    public function update(Request $request, $id)
    {
        $licencia = Licencias::findOrFail($id);
        if (!$this->userIsJefeDeTurno()) {
            return redirect()->route('principal')->with('error', 'NO CUENTAS CON PERMISOS PARA CERRAR LICENCIAS');
        }   //mostrara el siguiente mensaje

        $request->validate([
            'estado' => 'required|in:NO LIBERADO,LIBERADO',
        ]);

        $licencia->status = $request->estado;
        //validaciones correspondientes
        $licencia->usuario_que_libero_id = Auth::id();
        $jefeDeTurno = JefeDeTurno::where('rpe', Auth::user()->rpe)->first();
        $licencia->quien_libero = $jefeDeTurno->nombre;

        $licencia->save();

        return redirect()->route('status')->with('success', 'LICENCIA CERRADA CORRECTAMENTE');
    }   // si el usuario es jefe de turno podra cerrar la licencia
    // mostrara el anterior mensaje
}
