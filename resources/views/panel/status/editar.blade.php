<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>EDITAR LICENCIA</title>
</head>

<body>
    <form action="{{ route('actualizar', ['id' => $licencia->id]) }} " method ="POST">
        @csrf
        {{ method_field('PUT') }}
        <p> NÚMERO DE LICENCIA: <label> {{ $licencia->numero_licencia }} </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FECHA DE
            CONCESIÓN: <label>
                {{ $licencia->created_at }}</label> </p>
        <p>CENTRO DE GESTOR: <label> {{ $licencia->centro_gestor }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNIDAD:
            <label>
                {{ $licencia->unidad }}
            </label>
        </p>
        <p>QUIÉN CONCEDE: <label> {{ $licencia->JefeDeTurno->nombre }} </label></p>
        <p>SE CONCEDE A: <label> {{ $licencia->empleado->nombre }} </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DEPARTAMENTO:
            <label>
                {{ $licencia->Departamento->nombre }} </label>
        </p>
        <p>EQUIPO: <label> {{ $licencia->equipo->denominacion }} </label></p>
        <br>
        <label>TRABAJO A REALIZAR:</label>
        <input type="text" id="TrabajoRealizar" name="comentario_trabajo_realizar" placeholder="TRABAJO A REALIZAR"
            value="{{ $licencia->comentario_trabajo_realizar }}" oninput="validarInput(this)" required>
        <label>INSTRUCCIONES ESPECIFICAS</label>
        <input type="text" name="comentario_especifico" id=" Instrucciones" placeholder="INSTRUCCIONES ESPECIFICAS"
            value="{{ $licencia->comentario_especifico }}" oninput="validarInput(this)" required>
        <br>
        <br>
        <h4> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h4>
        <p>ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
        <p>MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
        <p>ASEGURAR: <label> {{ $licencia->asegurar }} </label></p>
        <p>BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
        <br>
        <input type="submit" onclick="confirmSubmit()" value="ACTUALIZAR">
    </form>
    @foreach ($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
    <script>
        function validarInput(input) {
            // Convertir la entrada a mayúsculas
            input.value = input.value.toUpperCase();

            // Expresión regular para permitir solo letras mayúsculas, números, punto, coma y espacio
            var regex = /^[A-Z0-9.,\s]+$/;

            // Verificar si la entrada coincide con la expresión regular
            if (!regex.test(input.value)) {
                // Si no coincide, eliminar los caracteres no válidos
                input.value = input.value.replace(/[^A-Z0-9.,\s]/g, '');
            }
        }

        function confirmSubmit() {
            if (confirm("¿Toda la información es correcta?")) {
                document.getElementById("myStats").submit();
            } else {

            }
        }
    </script>
</body>

</html>

<!-- Styles -->
<style>
    body {
        margin: auto;
        padding: 50px;
    }

    input[type=text],
    select,
    p {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        background-color: #f2f2f2;
        padding: 20px;
    }

    label {
        font-weight: 600;
    }
</style>
