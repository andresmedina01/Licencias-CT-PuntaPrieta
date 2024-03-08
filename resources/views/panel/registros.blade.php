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
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            font-size: 1.3rem;
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
            <th>QUIEN LIBERO</th>
            <th>OBSERVACIONES</th>
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
                <td>CESAR VELTRAN BENECH</td>
                <td>SE USO QUIMICO DE LA MARCA "DESENGRASANTE1000" Y SE OBTUVO UNA LIMPIEZA MUCHO MEJOR</td>
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
