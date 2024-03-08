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
    <table name="procesos">
        <tr name="proceso">
            <td colspan="15" style="border: none; font-size: 1.2rem; padding-bottom: 1.2rem">
                LICENCIAS EN ESTADO DE PROCESO</td>
        </tr>
        <tr style="background-color: #cccccc">
            <th>TIPO DE LICENCIA</th>
            <th>NUMERO DE LICENCIA </th>
            <th>CENTRO DE GESTOR </th>
            <th> UNIDAD </th>
            <th>DEPARTAMENTO</th>
            <th>QUIEN CONCEDIO</th>
            <th>SE CONCEDIO A</th>
            <th>EQUIPO</th>
            <th>TRABAJO QUE SE REALIZO</th>
            <th>ENERGIA EN EL EQUIPO</th>
            <th>MANIOBRAR</th>
            <th>ASEGURAR</th>
            <th>BLOQUEAR</th>
            <th>DETALLES</th>
        </tr>
        <tbody>
            <tr>
                <td>LICENCIA EN VIVO</td>
                <td>02-24-235</td>
                <td>GT41</td>
                <td>U2</td>
                <td>AMBIENTAL</td>
                <td>JESUS MANUEL GAMBOA LEYVA</td>
                <td>ECATERINA JUARÉZ TREVIÑO</td>
                <td>CALDERA</td>
                <td>LIMPIEZA DEL EXTERIOR DE CALDERA</td>
                <td>ELECTRICA</td>
                <td>MANIPULAR</td>
                <td>DRENAR</td>
                <td>ACORDONAR</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <button id="printbtn">Print</button>
    <script>
        const printbtn = document.getElementById("printbtn");
        printbtn.addEventListener("click", () => {
            printbtn.disabled = true;
            window.print();
            setTimeout(() => {
                printbtn.disabled = false;
            }, 1000);
        });
    </script>
    <a href="/principal"> REGRESAR</a>
@endsection
