<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMPRIMIR LICENCIA</title>
    <link rel="stylesheet" href="{{ asset('assets/statsprint.css') }}" />

</head>

<body>
    <div class="container">
        <div class="item">
            <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label> </p>
            <p> FECHA DE CONCESIÓN: <label> {{ $licencia->created_at }}</label> </p>
            <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNIDAD:
                <label>
                    {{ $licencia->unidad }}
                </label>
            </p>
            <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
            <p> DEPARTAMENTO: <label> {{ $licencia->Departamento->nombre }} </label></p>
            <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label></p>
            <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
            <p>TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar }} </label></p>
            <p>INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico }} </label>
            </p>
            <br>
            <h4> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h4>
            <p>ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
            <p>MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
            <p>ASEGURAR: <label> {{ $licencia->asegurar }} </label></p>
            <p>BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
        </div>
        <div class="item">
            <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label> </p>
            <p> FECHA DE CONCESIÓN: <label> {{ $licencia->created_at }}</label> </p>
            <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNIDAD:
                <label>
                    {{ $licencia->unidad }}
                </label>
            </p>
            <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
            <p> DEPARTAMENTO: <label> {{ $licencia->Departamento->nombre }} </label></p>
            <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label></p>
            <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
            <p>TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar1 }} </label></p>
            <p>INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico1 }} </label>
            </p>
            <br>
            <h4> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h4>
            <p>ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
            <p>MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
            <p>ASEGURAR: <label> {{ $licencia->asegurar }} </label></p>
            <p>BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
        </div>
        <div class="item">
            <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label> </p>
            <p> FECHA DE CONCESIÓN: <label> {{ $licencia->created_at }}</label> </p>
            <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNIDAD:
                <label>
                    {{ $licencia->unidad }}
                </label>
            </p>
            <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
            <p> DEPARTAMENTO: <label> {{ $licencia->Departamento->nombre }} </label></p>
            <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label></p>
            <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
            <p>TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar2 }} </label></p>
            <p>INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico2 }} </label>
            </p>
            <br>
            <h4> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h4>
            <p>ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
            <p>MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
            <p>ASEGURAR: <label> {{ $licencia->asegurar }} </label></p>
            <p>BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
        </div>
        <div class="item">
            <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label> </p>
            <p> FECHA DE CONCESIÓN: <label> {{ $licencia->created_at }}</label> </p>
            <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNIDAD:
                <label>
                    {{ $licencia->unidad }}
                </label>
            </p>
            <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
            <p> DEPARTAMENTO: <label> {{ $licencia->Departamento->nombre }} </label></p>
            <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label></p>
            <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
            <p>TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar3 }} </label></p>
            <p>INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico3 }} </label>
            </p>
            <br>
            <h4> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h4>
            <p>ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
            <p>MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
            <p>ASEGURAR: <label> {{ $licencia->asegurar }} </label></p>
            <p>BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
        </div>
        <div class="item">
            <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label> </p>
            <p> FECHA DE CONCESIÓN: <label> {{ $licencia->created_at }}</label> </p>
            <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNIDAD:
                <label>
                    {{ $licencia->unidad }}
                </label>
            </p>
            <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
            <p> DEPARTAMENTO: <label> {{ $licencia->Departamento->nombre }} </label></p>
            <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label></p>
            <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
            <p>TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar4 }} </label></p>
            <p>INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico4 }} </label>
            </p>
            <br>
            <h4> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h4>
            <p>ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
            <p>MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
            <p>ASEGURAR: <label> {{ $licencia->asegurar }} </label></p>
            <p>BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
        </div>
        <div class="item">
            <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label> </p>
            <p> FECHA DE CONCESIÓN: <label> {{ $licencia->created_at }}</label> </p>
            <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNIDAD:
                <label>
                    {{ $licencia->unidad }}
                </label>
            </p>
            <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
            <p> DEPARTAMENTO: <label> {{ $licencia->Departamento->nombre }} </label></p>
            <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label></p>
            <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
            <p>TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar5 }} </label></p>
            <p>INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico5 }} </label>
            </p>
            <br>
            <h4> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h4>
            <p>ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
            <p>MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
            <p>ASEGURAR: <label> {{ $licencia->asegurar }} </label></p>
            <p>BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
        </div>
    </div>
</body>

</html>
