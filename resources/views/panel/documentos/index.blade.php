@extends('layouts.app')

@section('title')
    REGISTRO DE LICENCIA
@endsection

@section('meta-description')
    LIBRO DE REGISTRO DE LICENCIAS INTERNAS DE CENTRALES GENERADORAS meta description
@endsection
@section('content')
    <style>
        tr[name="completadas"] {
            color: black;
            text-align: center;
            background-color: #57f851b1;
            width: 100%;
        }

        table[name="completadas"] {
            border-collapse: collapse;
            margin: auto;
            font-size: 0.75em;
            font-family: sans-serif;
            min-width: 450px;
            color: black;
            background-color: #ffffff;
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

        button {
            display: block;
            margin: auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            font-size: .6rem;
            cursor: pointer;
        }

        a[name="printt"] {
            display: block;
            margin: auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            font-size: .6rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <h1>REGISTRO DE LICENCIAS</h1>
    <table name="completadas">
        <tr name="completadas">
            <td colspan="15" style="border: none; font-size: 1.2rem; padding-bottom: 1.2rem">
                LICENCIAS COMPLETADAS</td>
        </tr>
        <tr style="background-color: #cccccc">
            <th>ID</th>
            <th>TIPO DE LICENCIA</th>
            <th>NUMERO DE LICENCIA </th>
            <th>CENTRO DE GESTOR </th>
            <th> UNIDAD </th>
            <th>DEPARTAMENTO</th>
            <th>QUIEN CONCEDIO</th>
            <th>SE CONCEDIO A</th>
            <th>EQUIPO</th>
            <th>TRABAJO QUE SE REALIZO</th>
            <th>MEDIDAS ESPECIFICAS DE SEGURIDAD</th>
            <th>INSTRUCCIONES</th>
            <th>QUIEN LIBERO</th>
            <th>ACCIONES</th>
        </tr>
        <tbody>
            @foreach ($licencias as $licencia)
                @if ($licencia->status === 'LIBERADO')
                    <tr>
                        <td>{{ $licencia->id }}</td>
                        <td>{{ $licencia->tipo_licencia }}</td>
                        <td>{{ $licencia->numero_licencia }}</td>
                        <td>{{ $licencia->centro_gestor }}</td>
                        <td>{{ $licencia->unidad }}</td>
                        <td>{{ $licencia->departamento->nombre }}</td>
                        <td>{{ $licencia->jefeDeTurno->nombre }}</td>
                        <td>{{ $licencia->empleado->nombre }}</td>
                        <td>{{ $licencia->equipo->denominacion }}</td>
                        <td>{{ $licencia->comentario_trabajo_realizar }}</td>
                        <td>
                            <div class="col">
                                <ul>
                                    <legend for="energia_equipo">ENERGIA EN EL EQUIPO</legend>
                                    <li>
                                        <label> {{ $licencia->energia_equipo }} </label>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <div class="col">
                                <ul>
                                    <legend for="maniobrar">MANIOBRAR</legend>
                                    <li>
                                        <label> {{ $licencia->maniobrar }} </label>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <div class="col">
                                <ul>
                                    <legend for="asegurar">ASEGURAR</legend>
                                    <li>
                                        <label> {{ $licencia->asegurar }} </label>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <div class="col">
                                <ul>
                                    <legend for="bloquear">BLOQUEAR</legend>
                                    <li>
                                        <label> {{ $licencia->bloquear }} </label>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>{{ $licencia->comentario_especifico }}</td>
                        <td>{{ $licencia->quien_libero }}</td>
                        <td><a name="printt" href="/documentos/print/{{ $licencia->id }}">IMPRIMIR</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>


    <a href="/principal"> REGRESAR</a>
@endsection
