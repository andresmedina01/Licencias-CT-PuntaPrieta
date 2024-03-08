<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipo_licencia'=> [ 'required', 'string', ],
            'numero_licencia'=> [ 'required', 'string', 'unique:licencias,numero_licencia' ],
            'unidad'=> [ 'required', 'integer' ],
            'jefe_de_turno_id'=> [ 'required', 'integer', 'exists:jefes_de_turno,id' ],
            'empleado_id'=> [ 'required', 'integer', 'exists:empleados,id' ],
            'departamento_id'=> [ 'required', 'integer', 'exists:departamentos,id' ],
            'equipo_id'=> [ 'required', 'integer', 'exists:equipos,id' ],
            'user_id'=> [ 'required', 'integer', 'exists:users,id' ],
            'comentario_trabajo_realizar'=> [ 'required', 'string', ],
            'comentario_especifico'=> [ 'required', 'string', ],
            'energia_equipo'=> [ 'required', 'array', ],
            'maniobrar'=> [ 'required', 'array', ],
            'asegurar'=> [ 'required', 'array', ],
            'bloquear'=> [ 'required', 'array', ]
        ];
    }
}
