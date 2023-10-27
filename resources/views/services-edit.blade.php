<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <script src="/ruta/hacia/signature-pad.js"></script>
    <link rel="stylesheet" href="/ruta/hacia/signature-pad.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/modal-table.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <title>DEV LAB DE BIOINGENIERIA</title>
</head>

<body>
    <x-app-layout>
        <section>
            <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg"
                style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                <h2
                    style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">
                    Editar Servicio</h2>
                <div class="flex items-center justify-center mt-4 screen-indicator">
                    <!-- Indicador de pantallas -->
                    <template x-for="screen in 2" :key="screen">
                        <div x-bind:class="{ 'indicator active': pantalla === screen, 'indicator': pantalla !== screen }">
                        </div>
                    </template>
                </div>
                <p class="screen-title" x-text="'Pantalla ' + pantallaTitulo" style="color: #d1d5db;"></p>
                <form id="form-inventario" class="space-y-6 w-full sm:w-96">
                    <!-- Pantalla 1: Datos Generales -->
                    <div>
                        <div x-show="pantalla === 1">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Nombre del servicio')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div>
                                    <x-input-label for="assigned_engineer" :value="__('Ingeniero asignado')" />
                                    <x-text-input id="assigned_engineer" name="assigned_engineer" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="assigned_engineer" />
                                    <x-input-error class="mt-2" :messages="$errors->get('assigned_engineer')" />
                                </div>
                                <div>
                                    <x-input-label for="status" :value="__('Estatus')" />
                                    <div>
                                        <select id="status" name="status"
                                            class="mt-1 block w-full bg-gray-800 text-white" required autofocus
                                            autocomplete="status">
                                            <option value="Estatus 1">Estatus 2</option>
                                        </select>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                </div>
                                <div>
                                    <x-input-label for="services_type" :value="__('Tipo de servicio')" />
                                    <div>
                                        <select id="services_type" name="services_type"
                                            class="mt-1 block w-full bg-gray-800 text-white" required autofocus
                                            autocomplete="services_type">
                                            <option value="Servicio 1">Servicio 1</option>
                                        </select>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('services_type')" />
                                </div>
                                <div>
                                    <x-input-label for="active_model" :value="__('Modelo activo')" />
                                    <x-text-input id="active_model" name="active_model" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="active_model" />
                                    <x-input-error class="mt-2" :messages="$errors->get('active_model')" />
                                </div>
                                <div>
                                    <x-input-label for="active_sublocation" :value="__('Sub Ubicación')" />
                                    <div>
                                        <select id="active_sublocation" name="active_sublocation"
                                            class="mt-1 block w-full bg-gray-800 text-white" required autofocus
                                            autocomplete="active_sublocation">
                                            <option value="Sub Ubicación 1">Sub Ubicación 1</option>
                                            <option value="Sub Ubicación 2">Sub Ubicación 2</option>
                                            <option value="Sub Ubicación 3">Sub Ubicación 3</option>
                                        </select>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('active_sublocation')" />
                                </div>
                                <div>
                                    <x-input-label for="service_type" :value="__('Tipo de servicio')" />
                                    <div>
                                        <select id="services_type" name="services_type"
                                            class="mt-1 block w-full bg-gray-800 text-white" required autofocus
                                            autocomplete="services_type">
                                            <option value="Servicio 1">Servicio 1</option>
                                        </select>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('services_type')" />
                                </div>

                                <div>
                                    <x-input-label for="supplier_name" :value="__('Proveedor')" />

                                    <x-text-input id="supplier_id" name="supplier_id" type="hidden"
                                        class="mt-1 block w-full" required autofocus autocomplete="supplier_id" />

                                    <x-text-input id="supplier_name" name="supplier_name" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="supplier_name"
                                        x-on:click.prevent="$dispatch('open-modal', 'show_table_prov')" readonly />
                                    @include('layouts.modal-proveedores-table')
                                    <x-input-error class="mt-2" :messages="$errors->get('supplier_name')" />
                                </div>
                                <div>
                                    <x-input-label for="type" :value="__('Activo')" />
                                    <x-text-input id="active_id" name="active_id" type="hidden"
                                        class="mt-1 block w-full" required autofocus autocomplete="active_id" />
                                    <x-text-input id="type" name="type" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="type"
                                        x-on:click.prevent="$dispatch('open-modal', 'show_table_activos_prov')" readonly />
                                    @include('layouts.modal-activos-prov-table')
                                    <x-input-error class="mt-2" :messages="$errors->get('active_id')" />
                                </div>
                                <div>
                                    <x-input-label for="foil" :value="__('Folio')" />
                                    <x-text-input id="foil" name="foil" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="foil" />
                                    <x-input-error class="mt-2" :messages="$errors->get('foil')" />
                                </div>
                                <div>
                                    <x-input-label for="origin" :value="__('Origen')" />
                                    <x-text-input id="origin" name="origin" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="origin" />
                                    <x-input-error class="mt-2" :messages="$errors->get('origin')" />
                                </div>
                                <div>
                                    <x-input-label for="reference" :value="__('Referencia')" />
                                    <x-text-input id="reference" name="reference" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="reference" />
                                    <x-input-error class="mt-2" :messages="$errors->get('reference')" />
                                </div>
                            </div>
                        </div>

                        <!-- Pantalla 2: Datos de las Facturas -->
                        <div x-show="pantalla === 2">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="assigned_enginier" :value="__('Ingeniero asignado del servicio')" />
                                    <x-text-input id="assigned_enginier" name="assigned_enginier" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="assigned_enginier" />
                                    <x-input-error class="mt-2" :messages="$errors->get('assigned_enginier')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="start_date" :value="__('Fecha de inicio')" />
                                    <input id="start_date" name="start_date" type="date" class="mt-1 w-full"
                                        required autofocus autocomplete="start_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="end_date" :value="__('Fecha final')" />
                                    <input id="end_date" name="end_date" type="date" class="mt-1 w-full"
                                        required autofocus autocomplete="end_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="hours" :value="__('Horas')" />
                                    <input id="hours" name="hours" type="time" class="mt-1 w-full" required
                                        autofocus autocomplete="hours" />
                                    <x-input-error class="mt-2" :messages="$errors->get('hours')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="minutes" :value="__('Minutos')" />
                                    <input id="minutes" name="minutes" type="time" class="mt-1 w-full" required
                                        autofocus autocomplete="minutes" step="60" />
                                    <x-input-error class="mt-2" :messages="$errors->get('minutes')" />
                                </div>
                            </div>
                            <div>
                                <x-input-label for="summary" :value="__('Resumen')" />
                                <x-text-input id="summary" name="summary" type="text" class="mt-1 w-full"
                                    required autofocus autocomplete="summary" />
                                <x-input-error class="mt-2" :messages="$errors->get('summary')" />
                            </div>
                        </div>

                        <!-- Pantalla 3: Datos de registro y mantenimiento -->
                        <div x-show="pantalla === 3">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="service_head_signature" :value="__('Firma del jefe de servicio')" />
                                    <canvas id="serviceHeadSignatureCanvas" class="mt-1 w-full"
                                        style="border: 1px solid #000;"></canvas>
                                    <input type="hidden" id="service_head_signature"
                                        name="service_head_signature" />
                                    <x-input-error class="mt-2" :messages="$errors->get('service_head_signature')" />

                                    <!-- Botón para limpiar la firma -->
                                    <button type="button" id="clearServiceHeadSignatureButton"
                                        class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Limpiar
                                        Firma</button>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="service_enigieer_signature" :value="__('Firma del ingeniero de servicio')" />
                                    <canvas id="serviceEngineerSignatureCanvas" class="mt-1 w-full"
                                        style="border: 1px solid #000;"></canvas>
                                    <input type="hidden" id="service_engineer_signature"
                                        name="service_engineer_signature" />
                                    <x-input-error class="mt-2" :messages="$errors->get('service_engineer_signature')" />

                                    <!-- Botón para limpiar la firma -->
                                    <button type="button" id="clearServiceEngineerSignatureButton"
                                        class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Limpiar
                                        Firma</button>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="last_user_signature" :value="__('Firma del último usuario')" />
                                    <canvas id="lastUserSignatureCanvas" class="mt-1 w-full"
                                        style="border: 1px solid #000;"></canvas>
                                    <input type="hidden" id="last_user_signature" name="last_user_signature" />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_user_signature')" />

                                    <!-- Botón para limpiar la firma -->
                                    <button type="button" id="clearLastUserSignatureButton"
                                        class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Limpiar
                                        Firma</button>
                                </div>
                            </div>

                            <script>
                                // Inicializa Signature Pad en los canvas
                                var serviceHeadCanvas = document.getElementById('serviceHeadSignatureCanvas');
                                var serviceHeadSignaturePad = new SignaturePad(serviceHeadCanvas, {
                                    backgroundColor: 'white',
                                    penColor: 'black'
                                });

                                var serviceEngineerCanvas = document.getElementById('serviceEngineerSignatureCanvas');
                                var serviceEngineerSignaturePad = new SignaturePad(serviceEngineerCanvas, {
                                    backgroundColor: 'white',
                                    penColor: 'black'
                                });

                                var lastUserCanvas = document.getElementById('lastUserSignatureCanvas');
                                var lastUserSignaturePad = new SignaturePad(lastUserCanvas, {
                                    backgroundColor: 'white',
                                    penColor: 'black'
                                });

                                // Almacenar las firmas en los campos ocultos al enviar el formulario
                                var serviceHeadSignatureInput = document.getElementById('service_head_signature');
                                var serviceEngineerSignatureInput = document.getElementById('service_engineer_signature');
                                var lastUserSignatureInput = document.getElementById('last_user_signature');
                                var form = document.querySelector('form');

                                // Botones para limpiar las firmas
                                var clearServiceHeadSignatureButton = document.getElementById('clearServiceHeadSignatureButton');
                                var clearServiceEngineerSignatureButton = document.getElementById('clearServiceEngineerSignatureButton');
                                var clearLastUserSignatureButton = document.getElementById('clearLastUserSignatureButton');

                                clearServiceHeadSignatureButton.addEventListener('click', function() {
                                    serviceHeadSignaturePad.clear();
                                    serviceHeadSignatureInput.value = '';
                                });

                                clearServiceEngineerSignatureButton.addEventListener('click', function() {
                                    serviceEngineerSignaturePad.clear();
                                    serviceEngineerSignatureInput.value = '';
                                });

                                clearLastUserSignatureButton.addEventListener('click', function() {
                                    lastUserSignaturePad.clear();
                                    lastUserSignatureInput.value = '';
                                });

                                form.addEventListener('submit', function(event) {
                                    if (serviceHeadSignaturePad.isEmpty() || serviceEngineerSignaturePad.isEmpty() || lastUserSignaturePad
                                        .isEmpty()) {
                                        alert('Por favor, firme en todos los campos antes de enviar el formulario.');
                                        event.preventDefault();
                                    } else {
                                        serviceHeadSignatureInput.value = serviceHeadSignaturePad.toDataURL();
                                        serviceEngineerSignatureInput.value = serviceEngineerSignaturePad.toDataURL();
                                        lastUserSignatureInput.value = lastUserSignaturePad.toDataURL();
                                    }
                                });
                            </script>
                        </div>

                        <!-- Pantalla 4: Datos de eliminacion -->
                        <div x-show="pantalla === 4">
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="service_expense" :value="__('Gastos de servicios')" />
                                    <x-text-input id="service_expense" name="service_expense" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="service_expense" />
                                    <x-input-error class="mt-2" :messages="$errors->get('service_expense')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="parts_expense" :value="__('Gastos de partes')" />
                                    <x-text-input id="parts_expense" name="parts_expense" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="parts_expense" />
                                    <x-input-error class="mt-2" :messages="$errors->get('parts_expense')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="total" :value="__('Total')" />
                                    <x-text-input id="total" name="total" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="total" />
                                    <x-input-error class="mt-2" :messages="$errors->get('total')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="annex" :value="__('Anexo')" />
                                    <x-text-input id="annex" name="annex" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="annex" />
                                    <x-input-error class="mt-2" :messages="$errors->get('annex')" />
                                </div>
                            </div>
                        </div>


                        <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                            <div>
                                <button type="button" id="btn-anterior" x-show="pantalla > 1"
                                    @click="pantalla -= 1"
                                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anterior</button>
                                <button type="button" id="btn-siguiente" x-show="pantalla < 4"
                                    @click="pantalla += 1"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Siguiente</button>
                                <button type="submit" x-show="pantalla > 0"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
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
            2: 'Tiempo de asignacion',
            3: 'Firmas',
            4: 'Gastos', // Puedes agregar más títulos aquí
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
    <script>
        $(document).ready(function() {
            var table = $('#activos').DataTable({
                responsive: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                }
            }).columns.adjust().responsive.recalc();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#proveedores').DataTable({
                responsive: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                }
            }).columns.adjust().responsive.recalc();
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://bioingenieria.inventores.org/js/services-creation.js"></script>
</body>

</html>
