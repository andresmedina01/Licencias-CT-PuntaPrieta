<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app')
    @section('title')
        TRAMITAR LICENCIA
    @endsection

    @section('meta-description')
        TRAMITE DE LICENCIA meta description
    @endsection

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    @section('content')
        <br>
        <fieldset>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form id="myForm" class="row g-3" method="POST" action="{{ route('licencias') }}">
                @csrf
                <div class="col-md-77">
                    <legend for="Unidad" class="form-label">LICENCIA A TRABAJAR</legend>
                    <select class="form-select" id="LicenciaTrabajar" name="tipo_licencia" required>
                        <option selected disabled value="">SELECCIONE...</option>
                        <option value="LICENCIA EN VIVO">LICENCIA EN VIVO</option>
                        <option value="LICENCIA EN MUERTO">LICENCIA EN MUERTO</option>
                        <option value="LICENCIA ESPECIAL">LICENCIA ESPECIAL</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <legend for="Numerolicencia" class="form-label">NÚMERO DE LICENCIA</legend>
                    <input placeholder="ejemplo: 01-24-123" type="tel" minlength="07" maxlength="11"
                        class="form-control" id="Numerolicencia" name="numero_licencia" required />
                </div>
                <div class="col-md-4">
                    <legend for="DepartamentoSolicitante" class="form-label">DEPARTAMENTO SOLICITANTE</legend>
                    <select class="form-select" id="DepartamentoSolicitante" name="departamento_id" required>
                        <option selected disabled value="">SELECCIONE...</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <legend for="Unidad" class="form-label">UNIDAD</legend>
                    <select class="form-select" id="Unidad" name="unidad" required>
                        <option selected disabled value="">SELECCIONE...</option>
                        <option value="U0">U0</option>
                        <option value="U1">U1</option>
                        <option value="U2">U2</option>
                        <option value="U3">U3</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <legend for="QuienConcede" class="form-label">QUIEN CONCEDE:</legend>
                    <input type="hidden" name="jefe_de_turno_id" value="{{ $jefeDeTurno->id }}">
                    <input class="form-select" type="text" id="QuienConcede" value="{{ $jefeDeTurno->nombre }}" readonly>
                </div>
                <div class="col-md-4">
                    <legend for="SeConcede" class="form-label">SE CONCEDE A:</legend>
                    <select class="form-select" id="SeConcede" name="empleado_id" required>
                        <option selected disabled value="">SELECCIONE...</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <legend for="centro_gestor" class="form-label">CENTRO DE GESTOR:</legend>
                    <select class="form-select" id="centro_gestor" name="centro_gestor" required>
                        <option selected disabled value="">SELECCIONE...</option>
                        <option value="GT41">GT41</option>
                        <option value="GR42">GR42</option>
                        <option value="GR44">GR44</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <legend for="Equipo" class="form-label">EQUIPO</legend>
                    <select class="form-select" id="Equipo" name="equipo_id" required>
                        <option selected disabled value="">SELECCIONE...</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->denominacion }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-md-6">
                    <legend for="TrabajoRealizar" class="form-label">TRABAJO A REALIZAR:</legend>
                    <input type="text" maxlength="255" class="form-control" name="comentario_trabajo_realizar"
                        placeholder="Escribir el trabajo a realizar" id="TrabajoRealizar"
                        oninput="this.value = this.value.toUpperCase()" required>
                </div>
                <br>
                <div class="col-md-80">
                    <legend for="Instrucciones" class="form-label">INSTRUCCIONES ESPECIFICAS:</legend>
                    <input type="text" maxlength="255" class="form-control"
                        placeholder="Escribir detalladamente las instrucciones del trabajo a realizar"
                        name="comentario_especifico" id=" Instrucciones" oninput="this.value = this.value.toUpperCase()"
                        required>
                </div>
                <div class="container">
                    <br>
                    <div class="col-md-80">
                        <legend for="EnergiaEquip" class="form label">ENERGÍA EN EL EQUIPO</legend>
                    </div>
                    <ul>
                        <li>
                            <input type="checkbox" id="checkbox01" name="energia_equipo" value="E L Eléctrica">
                            <label for="checkbox01">E L ELÉCTRICA</label>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" id="checkbox02" name="energia_equipo" value="ME Mecanica">
                            <label for="checkbox02">ME MECÁNICA</label>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" id="checkbox03" name="energia_equipo" value="C I Cinética">
                            <label for="checkbox03">C I CINÉTICA</label>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" id="checkbox04" name="energia_equipo" value="NE Neumática">
                            <label for="checkbox04">NE NEUMÁTICA</label>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" id="checkbox05" name="energia_equipo" value="C A Calorífica">
                            <label for="checkbox05">C A CALORÍFICA</label>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" id="checkbox06" name="energia_equipo" value="H I Hidráulica">
                            <label for="checkbox06">H I HIDRÁULICA</label>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" id="checkbox07" name="energia_equipo" value="QU Química">
                            <label for="checkbox07">QU QUÍMICA</label>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" id="checkbox08" name="energia_equipo" value="PO Potencial">
                            <label for="checkbox08">PO POTENCIAL</label>
                        </li>
                    </ul>
                    <script>
                        const checkboxes = document.querySelectorAll('.energia_equipo');

                        checkboxes.forEach(checkbox => {
                            checkbox.addEventListener('click', function() {
                                checkboxes.forEach(otherCheckbox => {
                                    if (otherCheckbox !== checkbox) {
                                        otherCheckbox.checked = false;
                                    }
                                });
                            });
                        });
                    </script>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <legend for="maniobrar">MANIOBRAR</legend>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox09" name="maniobrar[]" value="1. ABRIR">
                                    <label for="checkbox09">1. ABRIR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox10" name="maniobrar[]" value="2. CERRAR">
                                    <label for="checkbox10">2. CERRAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox11" name="maniobrar[]" value="3. INTERRUMPIR">
                                    <label for="checkbox11">3. INTERRUMPIR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox12" name="maniobrar[]" value="4. ENFRIAR">
                                    <label for="checkbox12">4. ENFRIAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox13" name="maniobrar[]" value="5. NEUTRALIZAR">
                                    <label for="checkbox13">5. NEUTRALIZAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox14" name="maniobrar[]" value="6. MANIPULAR">
                                    <label for="checkbox14">6. MANIPULAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <label for="Otros">OTROS:</label>
                                    <input type="text" id="Otros" oninput="this.value = this.value.toUpperCase()"
                                        name="maniobrar[]">
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <legend>ASEGURAR</legend>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox16" name="asegurar[]" value="7. ATERRIZAR">
                                    <label for="checkbox16">7. ATERRIZAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox17" name="asegurar[]" value="8. DESPRESURIZAR">
                                    <label for="checkbox17">8. DESPRESURIZAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox18" name="asegurar[]" value="9. DRENAR">
                                    <label for="checkbox18">9. DRENAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox19" name="asegurar[]" value="10. VENTEAR">
                                    <label for="checkbox19">10. VENTEAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox20" name="asegurar[]" value="11. PURGAR">
                                    <label for="checkbox20">11. PURGAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox21" name="asegurar[]" value="12. VENTILAR">
                                    <label for="checkbox21">12. VENTILAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox22" name="asegurar[]" value="13. AISLAR">
                                    <label>13. AISLAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox23" name="asegurar[]" value="MECÁNICAMENTE">
                                    <label for="checkbox23">-MECÁNICAMENTE</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox24" name="asegurar[]" value="ELÉCTRICAMENTE">
                                    <label for="checkbox24">-ELÉCTRICAMENTE</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox25" name="asegurar[]"
                                        value="14. EXTRAER INTERRUPTOR">
                                    <label for="checkbox25">14. EXTRAER INTERRUPTOR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox38" name="asegurar[]" value="15. DESCARGAR">
                                    <label for="checkbox38">15. DESCARGAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox39" name="asegurar[]"
                                        value="16. MEDIR CONDICIONES ATMOSFÉRICAS">
                                    <label for="checkbox39">16. MEDIR COND. ATMOSFÉRICAS</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <label for="Otros3">OTROS:</label>
                                    <input type="text" id="Otros3" oninput="this.value = this.value.toUpperCase()"
                                        name="asegurar[]">
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <legend for="bloquear">BLOQUEAR</legend>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox26" name="bloquear[]" value="17. MECÁNICAMENTE">
                                    <label>17. MECÁNICAMENTE</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox27" name="bloquear[]" value="-BRIDAS">
                                    <label for="checkbox27">-BRIDAS</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox28" name="bloquear[]" value="CANDADOS">
                                    <label for="checkbox28">-CANDADOS</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox29" name="bloquear[]" value="18. TARJETAS">
                                    <label for="checkbox29">18. TARJETAS</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox30" name="bloquear[]" value="19. ACORDONAR">
                                    <label for="checkbox30">19. ACORDONAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox31" name="bloquear[]" value="20. RETIRAR">
                                    <label for="checkbox31">20. RETIRAR</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox32" name="bloquear[]" value="21. PROTECCIONES">
                                    <label>21. PROTECCIONES</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox33" name="bloquear[]" value="MECÁNICAS">
                                    <label for="checkbox33">-MECÁNICAS</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox34" name="bloquear[]" value="ELÉCTRICAS">
                                    <label for="checkbox34">-ELÉCTRICAS</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox35" name="bloquear[]" value="DE CONTROL">
                                    <label for="checkbox35">-DE CONTROL</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox" id="checkbox36" name="bloquear[]" value="22. BLOQUEO REMOTO">
                                    <label for="checkbox36">22. BLOQUEO REMOTO</label>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <label for="Otros2">OTROS:</label>
                                    <input type="text" id="Otros2" oninput="this.value = this.value.toUpperCase()"
                                        name="bloquear[]">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <fieldset>
                    <div class="container-rigth">
                        <div class="col-md-4">
                            <input class="form-check-input" type="checkbox" value="01" id="CheckFormt">
                            <button class="btn btn-primary" type="button" onclick="confirmSubmit()">ENVIAR</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </fieldset>
    @endsection

    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function confirmSubmit() {
                if (confirm("¿Estás seguro de que deseas enviar el formulario?")) {
                    document.getElementById("myForm").submit();
                }
            }

            $(document).ready(function() {
                $('#Numerolicencia').on('keypress', function(e) {
                    var input = document.getElementById("Numerolicencia");

                    if ([2, 5].includes(input.value.length) && e.which != 8) {
                        input.value = input.value + "-";
                    }

                });

                $('#DepartamentoSolicitante').on('change', function() {
                    var idDepa = this.value;
                    $("#SeConcede").html('');

                    $.ajax({
                        url: '{{ route('getEmpleados') }}',
                        type: "get",
                        data: {
                            departamento_id: idDepa,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $("#SeConcede").html(
                                '<option selected disabled value="">SELECCIONE...</option>');
                            $.each(result, function(key, value) {
                                $("#SeConcede").append('<option value="' + value.id + '">' +
                                    value.nombre + '</option>');
                            });
                        }
                    });

                    $('#Unidad').on('change', function() {
                        var unidad = this.value;
                        var centro = $('#centro_gestor option:selected').val();

                        $.ajax({
                            url: '{{ route('getEquipos') }}',
                            type: "get",
                            data: {
                                centro_gestor: centro,
                                unidad: unidad,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(result) {
                                $("#Equipo").html(
                                    '<option selected disabled value="">SELECCIONE...</option>'
                                );
                                $.each(result, function(key, value) {
                                    $("#Equipo").append('<option value="' + value
                                        .id + '">' +
                                        value.denominacion + '</option>');
                                });
                            }
                        });
                    });
                    $('#centro_gestor').on('change', function() {
                        var centro = this.value;
                        var unidad = $('#Unidad option:selected').val();

                        $.ajax({
                            url: '{{ route('getEquipos') }}',
                            type: "get",
                            data: {
                                centro_gestor: centro,
                                unidad: unidad,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(result) {
                                $("#Equipo").html(
                                    '<option selected disabled value="">SELECCIONE...</option>'
                                );
                                $.each(result, function(key, value) {
                                    $("#Equipo").append('<option value="' + value
                                        .id + '">' +
                                        value.denominacion + '</option>');
                                });
                            }
                        });
                    });
                });
            });
        </script>
    @endpush

</body>


</html>
