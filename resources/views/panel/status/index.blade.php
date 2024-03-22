<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app')

    @section('title')
        STATUS
    @endsection

    @section('meta-description')
        ESTADO DE LICENCIAS meta description
    @endsection
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/status.css') }}" />

</head>

<body>

    @section('content')
        <table name="procesos">
            <tr name="proceso">
                <td colspan="15" style="border: none; font-size: 1.2rem; padding-bottom: 1.2rem">
                    LICENCIAS EN ESTADO DE PROCESO</td>
            </tr>
            <tr style="background-color: #cccccc">
                <th>TIPO DE LICENCIA</th>
                <th>NUMERO DE LICENCIA </th>
                <th>QUIEN CONCEDIO</th>
                <th>DEPARTAMENTO</th>
                <th>SE CONCEDIO A</th>
                <th>EQUIPO</th>
                <th>TRABAJO QUE SE REALIZARA</th>
                <th>INSTRUCCIONES ESPECIFICAS</th>
                <th>ACCIONES</th>
            </tr>
            <tbody>
                @foreach ($licenciasNoLiberadas as $licencia)
                    <tr>
                        <td>{{ $licencia->tipo_licencia }}</td>
                        <td>{{ $licencia->numero_licencia }}</td>
                        <td>{{ $licencia->jefeDeTurno->nombre }}</td>
                        <td>{{ $licencia->departamento->nombre }}</td>
                        <td>{{ $licencia->empleado->nombre }}</td>
                        <td>{{ $licencia->equipo->denominacion }}</td>
                        <td>{{ $licencia->comentario_trabajo_realizar }}</td>
                        <td>{{ $licencia->comentario_especifico }}</td>

                        <td>
                            <br>
                            <a name="printt" href="/status/liberar/{{ $licencia->id }}">LIBERAR</a>
                            <br>
                            <a name="printt" href="/status/print/{{ $licencia->id }}">IMPRIMIR</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection

</body>

</html>
