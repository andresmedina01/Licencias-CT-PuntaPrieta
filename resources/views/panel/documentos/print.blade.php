<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print</title>
    <style>
        body {
            margin-top: 0px;
            border: initial;
            margin-right: 25px;
            margin-right: 25px;

        }

        h2 {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: medium;
        }

        h3 {
            font-family: Arial, Helvetica, sans-serif;
            text-align: right;
            margin: auto;
            margin-top: 3px;
            font-size: small;

        }

        h4 {
            font-family: Arial, Helvetica, sans-serif;
            text-align: right;
            margin-top: 1px;
            margin-bottom: 1px;
            font-size: xx-small;

        }

        div {
            float: left;
            font-size: small;
            color: rgb(0, 0, 0);
            text-align: center;
            margin: 6px;
            padding: 8px;
        }

        p {
            width: 100%;
            margin: 0px 20px 0px;
            color: rgb(0, 0, 0);
            font-size: small;
            text-align: left;
            padding: 12px 20px;
        }

        label {
            font-weight: 600;

        }

        td,
        th {
            padding: 12px 15px;
            margin: auto;
            justify-content: center;
            border: 2px solid #000000c3;
            text-align: center;
            color: black;
        }

        footer {
            text-align: center;
        }



        .contenedor {
            position: relative;
            /* Establece la posición relativa para el contenedor */
            width: 180px;
            /* Ancho del contenedor */
            height: 30px;
        }

        .imagen {
            position: absolute;
            /* Establece la posición absoluta para la imagen */
            top: 0;
            /* Posiciona la imagen en la parte superior del contenedor */
            left: 0;
            /* Posiciona la imagen en la parte izquierda del contenedor */
            width: 230px;
            /* Ancho de la imagen */
            height: 50px;
            /* Altura de la imagen */
        }
    </style>
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

    <p> TIPO DE LICENCIA <label> {{ $licencia->tipo_licencia }} </label></p>
    <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label></p>
    <p> CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp; UNIDAD: <label>
            {{ $licencia->unidad }} </label></p>
    <p> FECHA DE CONCESIÓN: <label> {{ $licencia->created_at }} </label></p>
    <p> QUIÉN CONCEDIO: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
    <p> DEPARTAMENTO SOLICITANTE: <label> {{ $licencia->Departamento->nombre }} </label></p>
    <p> SE CONCEDIO A: <label> {{ $licencia->empleado->nombre }} </label></p>
    <p> EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
    <p> TRABAJO A REALIZAR: <label> {{ $licencia->comentario_trabajo_realizar }} </label></p>
    <p> INSTRUCCIONES ESPECIFICAS: <label> {{ $licencia->comentario_especifico }} </label></p>
    <p> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></p>
    <p> ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
    <p> MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
    <p> ASEGURAR: <label> {{ $licencia->asegurar }} </label> </p>
    <p> BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
    <p> FECHA DE LIBERACIÓN: <label> {{ $licencia->updated_at }} </label> </p>
    <p> QUIEN LIBERO: <label> {{ $licencia->quien_libero }} </label></p>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer>
    &#169; 2024 CENTRAL TERMOELÉCTRICA PUNTA PRIETA
</footer>

</html>
