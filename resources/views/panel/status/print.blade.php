<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print</title>
    <style>
        body {
            margin-top: 30px;
            border: initial;
            margin-right: 100PX;


        }

        div {
            float: left;
            font-size: small;
            color: rgb(0, 0, 0);
            text-align: center;
            margin: 8px;
            padding: 5px;
            margin-top: 1px;
        }

        p {
            width: 100%;
            margin: 8px 40px;
            color: rgb(0, 0, 0);
            font-size: small;
            text-align: left;
            padding: 8px;

        }

        label {
            font-weight: 600;

        }
    </style>
</head>

<body>
    <p> TIPO DE LICENCIA <label> {{ $licencia->tipo_licencia }} </label></p>
    <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label> UNIDAD:
        <label>
            {{ $licencia->unidad }}
        </label>
    </p>
    <p> FECHA DE CONCESIÓN: <label> {{ $licencia->created_at }}</label> </p>
    <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label></p>
    <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
    <p> DEPARTAMENTO SOLICITANTE: <label> {{ $licencia->Departamento->nombre }} </label></p>
    <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label></p>
    <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
    <p>TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar }} </label></p>
    <p>INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico }} </label>
    </p>
    <div class="col">
        <legend for="energia">ENERGIA EN EL EQUIPO</legend>
        <li>
            <label> {{ $licencia->energia_equipo }} </label>
        </li>
    </div>
    <div class="col">
        <legend for="maniobrar">MANIOBRAR</legend>
        <li>
            <label> {{ $licencia->maniobrar }} </label>
        </li>
    </div>
    <div class="col">
        <legend for="asegurar">ASEGURAR</legend>
        <li>
            <label> {{ $licencia->asegurar }} </label>
        </li>
    </div>
    <div class="col">
        <legend for="bloquear">BLOQUEAR</legend>
        <li>
            <label> {{ $licencia->bloquear }} </label>
        </li>
    </div>
</body>

</html>
