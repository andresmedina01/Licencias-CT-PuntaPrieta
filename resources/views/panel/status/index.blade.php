@extends('layouts.app')

@section('title')
    STATUS
@endsection

@section('meta-description')
    ESTADO DE LICENCIAS meta description
@endsection

<link rel="stylesheet" href="{{ asset('assets/status.css') }}" />

@section('content')
    <H1>ESTADO DE LICENCIAS</H1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table name="procesos">
        <tr name="proceso">
            <td colspan="15" style="border: none; font-size: 1.2rem; padding-bottom: 1.2rem">
                LICENCIAS EN ESTADO DE PROCESO</td>
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
            <th>INSTRUCCIONES ESPECIFICAS</th>
            <th>MEDIDAS ESPECIFICAS DE SEGURIDAD</th>
            <th>ACCIONES</th>
        </tr>
        <tbody>
            @foreach ($licenciasNoLiberadas as $licencia)
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
                    <td>{{ $licencia->comentario_especifico }}</td>
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
                    <td>
                        <form action="{{ route('status.update', $licencia->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="estado" value="LIBERADO">
                            <input type="hidden" name="usuario_id" value="{{ Auth::id() }}">
                            <button type="submit" class="btn btn-warning btn-sm">LIBERAR</button>
                        </form>
                        <br>
                        <a name="printt" href="/status/print/{{ $licencia->id }}">IMPRIMIR</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/principal"> REGRESAR</a>
@endsection
