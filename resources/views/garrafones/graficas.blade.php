<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Garrafones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 600px;
            height: 500px;
            margin: auto;
        }

        body {
            background-color: #f8f9fa;
            animation: fadeIn 1s ease-in-out;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 40px;
            background: linear-gradient(135deg, #313235, #955aff, #ffc623, #da4c4c, #313235);
            background-size: 125%;
            animation: fanimado 15s infinite;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);


        }
    </style>
    <style>
        :root {
            --primary-color: rgb(221, 52, 89);
            --primary-dark: rgb(154, 76, 218);
            --secondary-color: #12100e;
            --male-color: #007bff;
            --female-color: rgb(165, 59, 69);
        }



        .btn:hover {
            transform: translateY(-2px);
        }

        h2 {
            color: var(--primary-color);
            margin: 2rem 0;
            font-weight: 600;
        }

        .gender-male {
            color: var(--male-color);
            font-weight: 500;
        }

        .gender-female {
            color: var(--female-color);
            font-weight: 500;
        }

        .gender-icon {
            margin-right: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .alert {
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            nav {
                text-align: center;
                padding: 0.5rem;
            }

            nav a {
                display: block;
                margin: 0.5rem auto;
                padding: 0.5rem 1rem;
            }

            .table-responsive {
                margin-bottom: 1rem;
            }
        }
    </style>

</head>

<body>
    <a href="{{ route('/consultar-apiGar')}}" class="btn btn-primary mb-4" title="Ver lista de repartidores">

        <i class="bi">Regresar a Garrafones</i>

    </a>

    <h1>Gráficas de Garrafones</h1>

    <div class="chart-container">
        <h2>Garrafones por Estado</h2>
        <canvas id="garrafonesEstadoChart"></canvas>
    </div>
    <br>
    <div class="chart-container">
        <h2>Garrafones por Marca</h2>
        <canvas id="garrafonesMarcaChart"></canvas>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const garrafones = @json($garrafones);

            // Función para contar ocurrencias por campo
            function contarPorCampo(data, campo) {
                const counts = {};
                data.forEach(item => {
                    const valor = item[campo];
                    counts[valor] = (counts[valor] || 0) + 1;
                });
                return counts;
            }

            // Contar por estado y por marca
            const countsEstado = contarPorCampo(garrafones, 'estado');
            const countsMarca = contarPorCampo(garrafones, 'marca');

            // Función para obtener etiquetas y valores ordenados
            function obtenerDatosOrdenados(counts) {
                const entries = Object.entries(counts).sort((a, b) => a[0].localeCompare(b[0]));
                return {
                    labels: entries.map(entry => entry[0]),
                    dataValues: entries.map(entry => entry[1])
                };
            }

            const datosEstado = obtenerDatosOrdenados(countsEstado);
            const datosMarca = obtenerDatosOrdenados(countsMarca);

            // Función para crear una gráfica
            function crearGrafica(idCanvas, etiquetas, valores, etiqueta) {
                const ctx = document.getElementById(idCanvas).getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: etiquetas,
                        datasets: [{
                            label: etiqueta,
                            data: valores,
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Crear las gráficas
            crearGrafica('garrafonesEstadoChart', datosEstado.labels, datosEstado.dataValues, 'Garrafones por Estado');
            crearGrafica('garrafonesMarcaChart', datosMarca.labels, datosMarca.dataValues, 'Garrafones por Marca');
        });
    </script>
</body>

</html>