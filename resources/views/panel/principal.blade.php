@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>

    @section('title')
        PRINCIPAL
    @endsection

    @section('meta-description')
        PRINCIPAL meta description
    @endsection
    <link rel="stylesheet" href="{{ asset('assets/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
</head>

<body>
    @section('content')
        <H1>RESPALDO DIGITAL DEL LIBRO DE LICENCIAS</H1>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">VENCIDAS</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('status') }}">DETALLES</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">EN PROCESO</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('status') }}">DETALLES</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">COMPLETADAS</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('documentos') }}">DETALLES</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <canvas id="myChart"></canvas>
        </div>
    @endsection
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($departamentos) !!}, // Etiquetas (por ejemplo, nombres de departamentos)
                    datasets: [{
                        label: 'Datos de ejemplo', // Leyenda del conjunto de datos
                        data: data: {!! json_encode($licenciasPorDepartamento) !!}, // Datos (por ejemplo, cantidad de licencias)
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</body>

</html>



{{--
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <canvas id="miGraph"></canvas>

    <script>
        var ctx = document.getElementById('miGraph').getContext('2d');
        var datos = @json($licencias);

        var etiquetas = [];
        var valores = [];

        // Preparar datos para el gráfico
        datos.forEach(function(dato) {
            etiquetas.push(dato.etiqueta); // Ajusta "etiqueta" según tu modelo
            valores.push(dato.valor); // Ajusta "valor" según tu modelo
        });

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Datos',
                    data: valores,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
--}}
