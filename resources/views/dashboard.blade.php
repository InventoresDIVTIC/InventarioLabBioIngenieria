<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>DEV LAB DE BIOINGENIERIA</title>
</head>
<body>
    <x-app-layout>
        <section>
            <div class="container mx-auto py-4">
                <!-- Gráficas -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Gráfica 1 -->
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Gráfica 1</h2>
                        <canvas id="chart1"></canvas>
                    </div>

                    <!-- Gráfica 2 -->
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Gráfica 2</h2>
                        <canvas id="chart2"></canvas>
                    </div>

                    <!-- Gráfica 3 -->
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Gráfica 3</h2>
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </x-app-layout>
    <script>
        // Gráfica 1
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                // Configura los datos de la gráfica 1 aquí
            },
            options: {
                // Configura las opciones de la gráfica 1 aquí
            }
        });

        // Gráfica 2
        var ctx2 = document.getElementById('chart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                // Configura los datos de la gráfica 2 aquí
            },
            options: {
                // Configura las opciones de la gráfica 2 aquí
            }
        });

        // Gráfica 3
        var ctx3 = document.getElementById('chart3').getContext('2d');
        var chart3 = new Chart(ctx3, {
            type: 'pie',
            data: {
                // Configura los datos de la gráfica 3 aquí
            },
            options: {
                // Configura las opciones de la gráfica 3 aquí
            }
        });
    </script>
</body>
</html>
