@extends('layouts.list')

@section('title', 'Validación de Hipótesis')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Validación de Hipótesis - Encuesta de Pólizas</h1>

    <!-- Análisis Estadístico -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Análisis Estadístico</div>
        <div class="card-body">
            <p><strong>Total de Registros:</strong> {{ $total_registros }}</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Modalidad</th>
                        <th>Cantidad</th>
                        <th>Porcentaje (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modalidad_counts as $modalidad => $cantidad)
                        <tr>
                            <td>{{ ucfirst($modalidad) }}</td>
                            <td>{{ $cantidad }}</td>
                            <td>{{ $modalidad_porcentaje[$modalidad] }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Gráfico de Modalidad -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">Gráfico de Modalidad</div>
        <div class="card-body">
            <canvas id="modalidadChart"></canvas>
        </div>
    </div>

    <!-- Hipótesis -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">Hipótesis Evaluadas</div>
        <div class="card-body">
            <p><strong>1.</strong> "Creemos que las empresas y personas naturales prefieren adquirir pólizas y seguros a través de una plataforma 100% virtual en lugar de hacerlo de forma presencial o manual, porque les permite agilizar el proceso y hacer seguimiento en tiempo real."</p>
            <p><strong>2.</strong> "Creemos que al menos el 70% de los clientes que actualmente adquirieron pólizas de manera presencial preferirían hacerlo de manera digital si tuvieran una opción confiable y sencilla."</p>
            <p><strong>3.</strong> "Creemos que más del 60% de las empresas que actualmente gestionan pólizas de forma manual o presencial preferirían hacerlo a través de nuestra plataforma digital."</p>
        </div>
    </div>

    <!-- Tabla de Contactos -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Modalidad</th>
                <th>Tipo de Usuario</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactos as $contacto)
                <tr>
                    <td>{{ $contacto->id }}</td>
                    <td>{{ ucfirst($contacto->modalidad) }}</td>
                    <td>{{ ucfirst($contacto->tipo_usuario) }}</td>
                    <td>{{ $contacto->nombre }}</td>
                    <td>{{ $contacto->email }}</td>
                    <td>{{ $contacto->created_at ? $contacto->created_at->format('d/m/Y H:i') : 'No disponible' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    var etiquetas = {!! json_encode(array_keys($modalidad_counts->toArray())) !!};
    var valores = {!! json_encode(array_values($modalidad_counts->toArray())) !!};
    var totalRegistros = valores.reduce((acc, val) => acc + val, 0);
    var valoresPorcentaje = valores.map(value => ((value / totalRegistros) * 100).toFixed(2) + "%");

    var ctx = document.getElementById('modalidadChart').getContext('2d');
    var modalidadChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: etiquetas,
            datasets: [{
                label: 'Cantidad de Registros',
                data: valores,
                backgroundColor: ['#007bff', '#28a745'],
                borderColor: ['#ffffff', '#ffffff'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                datalabels: {
                    color: 'white',
                    font: {
                        weight: 'bold',
                        size: 14
                    },
                    formatter: (value, context) => {
                        return valoresPorcentaje[context.dataIndex];
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    document.getElementById('modalidadChart').style.height = "300px";
    document.getElementById('modalidadChart').style.width = "300px";
</script>

@endsection
