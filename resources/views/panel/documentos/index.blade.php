<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.app')

    @section('title')
        REGISTRO DE LICENCIA
    @endsection

    @section('meta-description')
        LIBRO DE REGISTRO DE LICENCIAS INTERNAS DE CENTRALES GENERADORAS meta description
    @endsection
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/documents.css') }}" />
</head>

<body>

    @section('content')
        <table name="completadas">
            <tr name="completadas">
                <td colspan="15" style="border: none; font-size: 1.2rem; padding-bottom: 1.2rem">
                    LICENCIAS COMPLETADAS</td>
            </tr>
            <tr style="background-color: #cccccc">
                <th>TIPO DE LICENCIA</th>
                <th>NUMERO DE LICENCIA </th>
                <th>QUIEN CONCEDIO</th>
                <th>DEPARTAMENTO</th>
                <th>SE CONCEDIO A</th>
                <th>EQUIPO</th>
                <th>TRABAJO QUE SE REALIZO</th>
                <th>QUIEN LIBERO</th>
                <th>ACCIÓN</th>
            </tr>
            <tbody>
                @foreach ($licencias as $licencia)
                    @if ($licencia->status === 'LIBERADO')
                        <tr>
                            <td>{{ $licencia->tipo_licencia }}</td>
                            <td>{{ $licencia->numero_licencia }}</td>
                            <td>{{ $licencia->jefeDeTurno->nombre }}</td>
                            <td>{{ $licencia->departamento->nombre }}</td>
                            <td>{{ $licencia->empleado->nombre }}</td>
                            <td>{{ $licencia->equipo->denominacion }}</td>
                            <td>{{ $licencia->comentario_trabajo_realizar }}</td>
                            <td>{{ $licencia->quien_libero }}</td>
                            <td><a name="printt" href="/documentos/print/{{ $licencia->id }}">IMPRIMIR</a></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endsection

</body>

</html>
