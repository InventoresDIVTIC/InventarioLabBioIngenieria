<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="/ruta/hacia/signature-pad.js"></script>
    <link rel="stylesheet" href="/ruta/hacia/signature-pad.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <title>DEV LAB DE BIOINGENIERIA</title>
</head>
<body>
    <x-app-layout>
        <section>
        <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg" style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                    <h2 style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">Editar Ticket</h2>
                    <div class="flex items-center justify-center mt-4 screen-indicator">
                        <!-- Indicador de pantallas -->
                        <template x-for="screen in 0" :key="screen">
                            <div x-bind:class="{'indicator active': pantalla === screen, 'indicator': pantalla !== screen}"></div>
                        </template>
                    </div>
                    <p class="screen-title" x-text="'Pantalla ' + pantallaTitulo" style="color: #d1d5db;"></p>
                    <form id="form-inventario" class="space-y-6 w-full sm:w-96">
                    <!-- Pantalla 1: Datos Generales -->
                    <div x-data="{ pantalla }">
                        <!-- Pantalla : Datos del ticket -->
                        <div x-show="pantalla === 1">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="type" :value="__('Tipo')" />
                                    <x-text-input id="type" name="type" type="text" class="mt-1 w-full" required autocomplete="type" />
                                    <x-input-error class="mt-2" :messages="$errors->get('type')" />
                                </div>
                                <div>
                                    <x-input-label for="type_request" :value="__('Tipo de peticion')" />
                                    <x-text-input id="type_request" name="type_request" type="text" class="mt-1 w-full" required autocomplete="type_request" />
                                    <x-input-error class="mt-2" :messages="$errors->get('type_request')" />
                                </div>
                                <div>
                                    <x-input-label for="priority" :value="__('Prioridad')" />
                                    <div x-data="customSelect()">
                                    <select id="priority" name="priority" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="priority"  @change="selectOption($event)">
                                    <option value="Por definir">Por definir</option>
                                    <option value="Baja">Baja</option>
                                    <option value="Media">Media</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Urgente">Urgente</option>
                                    <option value="Crítica">Crítica</option>
                                </select>
                                    <input type="hidden" name="priority_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('priority')" />
                                </div>
                                <div>
                                    <x-input-label for="status" :value="__('Prioridad')" />
                                    <div x-data="customSelect()">
                                    <select id="status" name="status" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="status" @change="selectOption($event)">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Abierto">Abierto</option>
                                        <option value="En proceso">En proceso</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Resuelto">Resuelto</option>
                                        <option value="Cerrado">Cerrado</option>
                                    </select>
                                    <input type="hidden" name="status_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                </div>
                                <div>
                                    <x-input-label for="last_editor" :value="__('Ultimo editor')" />
                                    <x-text-input id="last_editor" name="last_editor" type="text" class="mt-1 w-full" required autocomplete="last_editor" />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_editor')" />
                                </div>
                                <div class="flex justify-center">
                                    <div class="max-w-full">
                                        <x-input-label for="solution" :value="__('Motivo')" />
                                        <textarea id="solution" name="solution" class="mt-1 {{ $errors->has('solution') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide" required autocomplete="solution" rows="3">{{ old('solution') }}</textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('solution')" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                            <div>
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
            if (pantalla < 1) {
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
