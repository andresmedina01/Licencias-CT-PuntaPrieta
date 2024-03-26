<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMPRIMIR LICENCIA</title>
    <link rel="stylesheet" href="{{ asset('assets/documentsprint.css') }}" />

</head>

<body>
    <div class="contenedor">
        <img src="{{ asset('assets/generacion III.jpeg') }}" alt="genereacion cfe" class="imagen">
    </div>
    <h3> Central Termoeléctrica Punta Prieta </h3>
    <h4> Km. 9.5 Carretera La Paz - Pichilingue </h4>
    <h4> La Paz, B.C.S. C.P. 23000 </h4>
    <h4> Tel: 612 123 7702 </h4>
    <h2> RESPALDO DEL LIBRO DE REGISTRO DE LICENCIAS DE LA C.T. PUNTA PRIETA</h2>
    <br>
    <h2> <label> REPORTE DE LICENCIA </label> </h2>
    <br>
    <p> TIPO DE LICENCIA: <label> {{ $licencia->tipo_licencia }} </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NÚMERO
        DE
        LICENCIA: <label> {{ $licencia->numero_licencia }} </label></p>
    <p> CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNIDAD:
        <label>
            {{ $licencia->unidad }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FECHA DE CONCESIÓN: <label>
            {{ $licencia->created_at }} </label>
    </p>
    <p> QUIÉN CONCEDIO: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
    <p> SE CONCEDIO A: <label> {{ $licencia->empleado->nombre }} </label> &nbsp;&nbsp;&nbsp;&nbsp; DEPARTAMENTO: <label>
            {{ $licencia->Departamento->nombre }} </label></p>
    <p> EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label> &nbsp;&nbsp;&nbsp;&nbsp; TRABAJO A REALIZAR:
        <label> {{ $licencia->comentario_trabajo_realizar }} </label>
    </p>
    <p> INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico }} </label></p>
    <br>
    <h2> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h2>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p> ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }}
        </label> </p>
    <p> MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
    <p> ASEGURAR: <label> {{ $licencia->asegurar }} </label> </p>
    <p> BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
    <br>
    <p> QUIÉN LIBERO: <label> {{ $licencia->quien_libero }} </label> &nbsp;&nbsp;&nbsp;&nbsp; FECHA DE LIBERACIÓN:
        <label> {{ $licencia->updated_at }} </label>
    </p>
</body>

<footer>
    &#169; 2024 CENTRAL TERMOELÉCTRICA PUNTA PRIETA
</footer>

</html>
