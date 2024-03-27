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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/app.css') }}" />
</head>

<body>
    @section('content')
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <H1>RESPALDO DIGITAL DEL LIBRO DE LICENCIAS</H1>

        <h2> BIENVENIDO, {{ $user->name }} </h2>
        <br>
        <div id="row1" class="row">
            <div class="col-md-4">
                <canvas id="myBarChart" width="500" height="250"
                    style="display: block; box-sizing: border-box; height: 250px; width: 500px;"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="myBarChart2" width="500" height="250"
                    style="display: block; box-sizing: border-box; height: 250px; width: 500px;"></canvas>
            </div>
        </div>
        <br>
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
    @endsection
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctxBarra = document.getElementById('myBarChart');

            new Chart(ctxBarra, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($departamentos) !!},
                    datasets: [{
                        label: 'LICENCIAS GENERADAS',
                        data: {!! json_encode($licenciasPorDepartamento) !!},
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

            const ctxBarra2 = document.getElementById('myBarChart2');

            let dataCopy = JSON.parse(JSON.stringify({
                labels: {!! json_encode($jefesDeTurno) !!},
                datasets: [{
                    label: 'LICENCIAS GENERADAS',
                    data: {!! json_encode($licenciasPorJefeDeTurno) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(121, 233, 209, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgba(121, 233, 209)'
                    ],
                    borderWidth: 1
                }]
            }));

            new Chart(ctxBarra2, {
                type: 'bar',
                data: dataCopy,
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
