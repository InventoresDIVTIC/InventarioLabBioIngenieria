<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <script src="/ruta/hacia/signature-pad.js"></script>
    <link rel="stylesheet" href="/ruta/hacia/signature-pad.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/resources/css/inventory.css">
    <title>DEV LAB DE BIOINGENIERIA</title>
</head>
<body>
    <x-app-layout>
        <section>
        <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg" style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                    <h2 style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">Editar Artículo de Inventario</h2>
                    <div class="flex items-center justify-center mt-4 screen-indicator">
                        <!-- Indicador de pantallas -->
                        <template x-for="screen in 2" :key="screen">
                            <div x-bind:class="{'indicator active': pantalla === screen, 'indicator': pantalla !== screen}"></div>
                        </template>
                    </div>
                    <p class="screen-title" x-text="'Pantalla ' + pantallaTitulo" style="color: #d1d5db;"></p>
                    <form id="form-inventario" class="space-y-6 w-full sm:w-96">
                    <!-- Pantalla 1: Datos Generales -->
                    <div x-data="{ pantalla }">
                        <div x-show="pantalla === 1">
                            <div class="grid grid-cols-3 gap-6">

                            </div>
                        </div>

                        <!-- Pantalla 2: Datos de Facturas -->
                        <div x-show="pantalla === 2">
                            <div class="grid grid-cols-2 gap-6">

                            </div>
                        </div>

                                                <!-- Pantalla 3: Datos de registro y mantenimiento -->
                         <div x-show="pantalla === 3">
                            <div class="grid grid-cols-3 gap-6">

                            </div>
                        </div>

                        <!-- Pantalla 4: Datos de eliminacion -->
                        <div x-show="pantalla === 4">
                            <div class="grid grid-cols-1 gap-6">

                            </div>
                        </div>


                        <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                            <div>
                                <button type="button" id="btn-anterior" x-show="pantalla > 1" @click="pantalla -= 1" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anterior</button>
                                <button type="button" id="btn-siguiente" x-show="pantalla < 4" @click="pantalla += 1" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Siguiente</button>
                                <button type="submit" x-show="pantalla > 0" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    </x-app-layout>
<script>
    let pantalla = 1;

    // Objeto para mapear los números de pantalla con sus títulos
    const titulosPantallas = {
        1: 'Datos Generales',
        2: 'Datos de Facturas',
        3: 'Datos de registro/mantenimiento',
        4: 'Datos de eliminacion', // Puedes agregar más títulos aquí
    };

    // Función para obtener el título de la pantalla actual
    function getPantallaTitulo() {
        return titulosPantallas[pantalla];
    }

    // Actualizar el indicador de pantalla
    function updateIndicator() {
        const indicatorDivs = document.querySelectorAll('.screen-indicator .indicator');
        indicatorDivs.forEach((div, index) => {
            if (pantalla === index + 1) {
                div.classList.add('active');
            } else {
                div.classList.remove('active');
            }
        });
    }

    // Función para activar el primer círculo al cargar el documento
    function activateFirstCircle() {
        const firstCircle = document.querySelector('.screen-indicator .indicator');
        if (firstCircle) {
            firstCircle.classList.add('active');
        }
    }

    // Asignar evento click a los botones Anterior y Siguiente
        // Asignar evento click a los botones Anterior y Siguiente
        const btnAnterior = document.querySelector('#btn-anterior');
        const btnSiguiente = document.querySelector('#btn-siguiente');
        const pantallaTitleElement = document.querySelector('.screen-title');

        btnAnterior.addEventListener('click', () => {
            if (pantalla > 1) {
                pantalla -= 1;
                updateIndicator();
                pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
            }
        });

        btnSiguiente.addEventListener('click', () => {
            if (pantalla < 4) {
                pantalla += 1;
                updateIndicator();
                pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
            }
        });

        // Activar el primer círculo al cargar el documento
        document.addEventListener('DOMContentLoaded', () => {
            activateFirstCircle();
            pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
        });


    // Variable reactiva para almacenar el título de la pantalla actual
    let pantallaTitulo = getPantallaTitulo();
</script>
</body>
</html>
