<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print</title>
    <style>
        body {
            margin-top: 20px;
            border: initial;
            margin-right: 20PX;
            padding: 50px;

        }

        div {
            float: left;
            font-size: small;
            color: rgb(0, 0, 0);
            text-align: center;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        p {
            width: 100%;
            margin: 8px 40px;
            color: rgb(0, 0, 0);
            font-size: small;
            text-align: left;
            padding: 12px 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        label {
            font-weight: 600;

        }
    </style>
</head>

<body>
    <h1> LIBRO DE REGISTRO DE LICENCIAS DE LA CENTRAL TERMOELÉCTRICA PUNTA PRIETA</h1>

    <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label> UNIDAD: <label> {{ $licencia->unidad }}
        </label></p>
    {{-- <p> FECHA DE CONCESIÓN: <label> {{ $licencia->}} <label> HORA: <label> {{ $licencia->}} </label></p>  --}}
    <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label></p>
    <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
    <p> DEPARTAMENTO SOLICITANTE: <label> {{ $licencia->Departamento->nombre }} </label></p>
    <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label></p>
    <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
    <p>TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar }} </label></p>
    <p>INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico }} </label>
    </p>
    <p>ENERGIA A UTILIZAR: <label> {{ $licencia->energia_equipo }} </label></p>
    <div class="row">
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
    </div>
    <p> QUIEN LIBERO: <label> {{ $licencia->quien_libero }} </label></p>
</body>

</html>
