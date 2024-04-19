<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CERRAR</title>
    <link rel="stylesheet" href="{{ asset('assets/statsliberar.css') }}" />


</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="contenedor">
        <img src="{{ asset('assets/generacion III.jpeg') }}" alt="genereacion cfe" class="imagen">
    </div>
    <h3> Central Termoeléctrica Punta Prieta </h3>
    <h4> Km. 9.5 Carretera La Paz - Pichilingue </h4>
    <h4> La Paz, B.C.S. C.P. 23000 </h4>
    <h4> Tel: 612 123 7702 </h4>
    <h2> RESPALDO DEL LIBRO DE REGISTRO DE LICENCIAS DE LA C.T. PUNTA PRIETA</h2>
    <br>
    <h2> CERRAR LICENCIA </h2>
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
    <p> SE CONCEDIO A: <label> {{ $licencia->empleado->nombre }} </label> &nbsp;&nbsp;&nbsp;&nbsp; DEPARTAMENTO:
        <label>
            {{ $licencia->Departamento->nombre }} </label>
    </p>
    <p> EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label> &nbsp;&nbsp;&nbsp;&nbsp; TRABAJO A REALIZAR [1]:
        <label> {{ $licencia->comentario_trabajo_realizar }} </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        INSTRUCCIONES ESPECIFICAS [1]: <label> {{ $licencia->comentario_especifico }} </label>
    </p>
    <p> TRABAJO A REALIZAR [2]: <label> {{ $licencia->comentario_trabajo_realizar1 }}
        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        INSTRUCCIONES ESPECIFICAS [2]: <label> {{ $licencia->comentario_especifico1 }} </label>
    </p>
    <p> TRABAJO A REALIZAR [3]: <label> {{ $licencia->comentario_trabajo_realizar2 }}
        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        INSTRUCCIONES ESPECIFICAS [3]: <label> {{ $licencia->comentario_especifico2 }} </label>
    </p>
    <p> TRABAJO A REALIZAR [4]: <label> {{ $licencia->comentario_trabajo_realizar3 }}
        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        INSTRUCCIONES ESPECIFICAS [4]: <label> {{ $licencia->comentario_especifico3 }} </label>
    </p>
    <p> TRABAJO A REALIZAR [5]: <label> {{ $licencia->comentario_trabajo_realizar4 }}
        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        INSTRUCCIONES ESPECIFICAS [5]: <label> {{ $licencia->comentario_especifico4 }} </label>
    </p>
    <p> TRABAJO A REALIZAR [6]: <label> {{ $licencia->comentario_trabajo_realizar5 }}
        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        INSTRUCCIONES ESPECIFICAS [6]: <label> {{ $licencia->comentario_especifico5 }} </label>
    </p>
    <br>
    <h2> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h2>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p> ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }}
        </label> </p>
    <p> MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
    <p> ASEGURAR: <label> {{ $licencia->asegurar }} </label> </p>
    <p> BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
    <br>
    <br>
    <br>
    <form id="myStats" action="{{ route('status.update', $licencia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="estado" value="LIBERADO">
        <input type="hidden" name="usuario_id" value="{{ Auth::id() }}">
        <button type="button" class="btn btn-warning btn-sm" onclick="confirmSubmit()">CERRAR</button>
    </form>

</body>
<script>
    function confirmSubmit() {
        if (confirm("¿Estás seguro de que deseas CERRAR la licencia?")) {
            document.getElementById("myStats").submit();
        } else {

        }
    }
</script>

<footer>
    &#169; 2024 CENTRAL TERMOELÉCTRICA PUNTA PRIETA
</footer>

</html>
