<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app')

    @section('title')
        ESTADO
    @endsection

    @section('meta-description')
        ESTADO DE LICENCIAS meta description
    @endsection
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/status.css') }}" />
</head>

<body>
    @section('content')
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table id="procesos">
            <tr name="proceso">
                <th colspan="15" style="border: none; font-size: 1.2rem; padding-bottom: 1.2rem">
                    LICENCIAS EN ESTADO DE PROCESO</th>
            </tr>
            <tr style="background-color: #cccccc">
                <th>TIPO DE LICENCIA</th>
                <th>NUMERO DE LICENCIA </th>
                <th>QUIEN CONCEDIO</th>
                <th>DEPARTAMENTO</th>
                <th>SE CONCEDIO A</th>
                <th>EQUIPO</th>
                <th>TRABAJO QUE SE REALIZARA</th>
                <th>FECHA DE ELABORACIÓN</th>
                <th>ACCIONES</th>
            </tr>
            <tbody>
                @foreach ($licenciasNoLiberadas as $licencia)
                    <tr>
                        <td>{{ $licencia->tipo_licencia }}</td>
                        <td><label> {{ $licencia->numero_licencia }} </label></td>
                        <td>{{ $licencia->jefeDeTurno->nombre }}</td>
                        <td>{{ $licencia->departamento->nombre }}</td>
                        <td>{{ $licencia->empleado->nombre }}</td>
                        <td>{{ $licencia->equipo->denominacion }}</td>
                        <td>{{ $licencia->comentario_trabajo_realizar }}</td>
                        <td>{{ $licencia->created_at }}</td>
                        <td>
                            <a name="liberar" href="/status/liberar/{{ $licencia->id }}">LIBERAR</a>
                            <br>
                            <a name="printt" href="/status/print/{{ $licencia->id }}">IMPRIMIR</a>
                            <br>
                            <form action="/status/eliminar/{{ $licencia->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button name="eliminar"
                                    onclick="return eliminarAlumno('¿Estas seguro de deseas eliminar esta licencia?')">ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            function eliminarAlumno(value) {
                action = confirm(value) ? true : event.preventDefault()
            }
        </script>
    @endsection

</body>

</html>
