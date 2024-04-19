<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>EDITAR LICENCIA</title>
    <link rel="stylesheet" href="{{ asset('assets/statsedit.css') }}" />
</head>

<body>
    <form action="{{ route('actualizar', ['id' => $licencia->id]) }} " method ="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="contenedor">
            <img src="{{ asset('assets/generacion III.jpeg') }}" alt="genereacion cfe" class="imagen">
        </div>
        <h3> Central Termoeléctrica Punta Prieta </h3>
        <h4> Km. 9.5 Carretera La Paz - Pichilingue </h4>
        <h4> La Paz, B.C.S. C.P. 23000 </h4>
        <h4> Tel: 612 123 7702 </h4>

        <h2> <label> INFORMACIÓN BASICA DE LA LICENCIA </label></h2>
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
        <br>
        <h2> <label> MEDIDAS ESPECIFICAS DE SEGURIDAD PARA LIBRAR EQUIPOS "CERO ENERGÍA" </label></h2>
        <p>ENERGÍA EN EL EQUIPO: <label> {{ $licencia->energia_equipo }} </label> </p>
        <p>MANIOBRAR: <label> {{ $licencia->maniobrar }} </label> </p>
        <p>ASEGURAR: <label> {{ $licencia->asegurar }} </label></p>
        <p>BLOQUEAR: <label> {{ $licencia->bloquear }} </label> </p>
        <br>
        <br>
        <br>
        <br>
        <h2> <label> CAMPOS A EDITAR </label></h2>
        <div class="col-md-6">
            <legend for="TrabajoRealizar" class="form-label">TRABAJO A REALIZAR <label> [1] </label></legend>
            <input type="text" maxlength="255" class="form-control" name="comentario_trabajo_realizar"
                placeholder="Escribir el trabajo a realizar" id="TrabajoRealizar"
                value="{{ $licencia->comentario_trabajo_realizar }}" oninput="validarInput(this)" required>
        </div>
        <br>
        <div class="col-md-6">
            <legend for="Instrucciones" class="form-label">INSTRUCCIONES ESPECIFICAS <label> [1] </label> </legend>
            <input type="text" maxlength="255" class="form-control"
                placeholder="Escribir detalladamente las instrucciones del trabajo a realizar"
                name="comentario_especifico" value="{{ $licencia->comentario_especifico }}" id=" Instrucciones"
                oninput= "validarInput(this)" required>
        </div>
        <div class="col-md-6">
            <legend for="TrabajoRealizar" class="form-label">TRABAJO A REALIZAR <label> [2] </label> </legend>
            <input type="text" maxlength="255" class="form-control" name="comentario_trabajo_realizar1"
                placeholder="Escribir el trabajo a realizar" value="{{ $licencia->comentario_trabajo_realizar1 }}"
                id="TrabajoRealizar" oninput="validarInput(this)" required>
        </div>
        <br>
        <div class="col-md-6">
            <legend for="Instrucciones" class="form-label">INSTRUCCIONES ESPECIFICAS <label> [2] </label> </legend>
            <input type="text" maxlength="255" class="form-control"
                placeholder="Escribir detalladamente las instrucciones del trabajo a realizar"
                name="comentario_especifico1" value="{{ $licencia->comentario_especifico1 }}" id=" Instrucciones"
                oninput= "validarInput(this)" required>
        </div>
        <div class="col-md-6">
            <legend for="TrabajoRealizar" class="form-label">TRABAJO A REALIZAR <label> [3] </label> </legend>
            <input type="text" maxlength="255" class="form-control" name="comentario_trabajo_realizar2"
                placeholder="Escribir el trabajo a realizar" value="{{ $licencia->comentario_trabajo_realizar2 }}"
                id="TrabajoRealizar" oninput="validarInput(this)" required>
        </div>
        <br>
        <div class="col-md-6">
            <legend for="Instrucciones" class="form-label">INSTRUCCIONES ESPECIFICAS <label> [3] </label> </legend>
            <input type="text" maxlength="255" class="form-control"
                placeholder="Escribir detalladamente las instrucciones del trabajo a realizar"
                name="comentario_especifico2" value="{{ $licencia->comentario_especifico2 }}" id=" Instrucciones"
                oninput= "validarInput(this)" required>
        </div>
        <div class="col-md-6">
            <legend for="TrabajoRealizar" class="form-label">TRABAJO A REALIZAR <label> [4] </label> </legend>
            <input type="text" maxlength="255" class="form-control" name="comentario_trabajo_realizar3"
                placeholder="Escribir el trabajo a realizar" value="{{ $licencia->comentario_trabajo_realizar3 }}"
                id="TrabajoRealizar" oninput="validarInput(this)" required>
        </div>
        <br>
        <div class="col-md-6">
            <legend for="Instrucciones" class="form-label">INSTRUCCIONES ESPECIFICAS <label> [4] </label> </legend>
            <input type="text" maxlength="255" class="form-control"
                placeholder="Escribir detalladamente las instrucciones del trabajo a realizar"
                name="comentario_especifico3" value="{{ $licencia->comentario_especifico3 }}" id=" Instrucciones"
                oninput= "validarInput(this)" required>
        </div>
        <div class="col-md-6">
            <legend for="TrabajoRealizar" class="form-label">TRABAJO A REALIZAR <label> [5] </label> </legend>
            <input type="text" maxlength="255" class="form-control" name="comentario_trabajo_realizar4"
                placeholder="Escribir el trabajo a realizar" value="{{ $licencia->comentario_trabajo_realizar4 }}"
                id="TrabajoRealizar" oninput="validarInput(this)" required>
        </div>
        <br>
        <div class="col-md-6">
            <legend for="Instrucciones" class="form-label">INSTRUCCIONES ESPECIFICAS <label> [5] <label> </legend>
            <input type="text" maxlength="255" class="form-control"
                placeholder="Escribir detalladamente las instrucciones del trabajo a realizar"
                name="comentario_especifico4" value="{{ $licencia->comentario_especifico4 }}" id=" Instrucciones"
                oninput= "validarInput(this)" required>
        </div>
        <div class="col-md-6">
            <legend for="TrabajoRealizar" class="form-label">TRABAJO A REALIZAR <label> [6] </label> </legend>
            <input type="text" maxlength="255" class="form-control" name="comentario_trabajo_realizar5"
                placeholder="Escribir el trabajo a realizar" value="{{ $licencia->comentario_trabajo_realizar5 }}"
                id="TrabajoRealizar" oninput="validarInput(this)" required>
        </div>
        <br>
        <div class="col-md-6">
            <legend for="Instrucciones" class="form-label">INSTRUCCIONES ESPECIFICAS <label> [6] </label> </legend>
            <input type="text" maxlength="255" class="form-control"
                placeholder="Escribir detalladamente las instrucciones del trabajo a realizar"
                name="comentario_especifico5" value="{{ $licencia->comentario_especifico5 }}" id=" Instrucciones"
                oninput= "validarInput(this)" required>
        </div>
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
                // Envía el formulario
                document.querySelector('form').submit();
            } else {
                // Si se cancela, no hacer nada
            }
        }
    </script>
</body>

</html>
