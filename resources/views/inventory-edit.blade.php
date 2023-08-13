<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <script src="/ruta/hacia/signature-pad.js"></script>
    <link rel="stylesheet" href="/ruta/hacia/signature-pad.css">
    <link rel="stylesheet" href="http://localhost/labbio/resources/css/inventory.css">
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
                                <div>
                                    <x-input-label for="name" :value="__('Nombre del artículo')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 w-full" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div>
                                    <x-input-label for="description" :value="__('Descripción')" />
                                    <x-text-input id="description" name="description" type="text" class="mt-1 w-full" required autocomplete="description" />
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>
                                <div>
                                    <x-input-label for="category" :value="__('Categoría')" />
                                    <div x-data="customSelect()">
                                    <select id="category" name="category" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="category"  @change="selectOption($event)">
                                        <option value="Equipo Médico">Equipo Médico</option>
                                        <option value="Equipo de medición / Simulacion">Equipo de medición / Simulacion</option>
                                        <option value="Equipo de imagenologia">Equipo de imagenologia</option>
                                        <option value="Equipo de laboratorio">Equipo de laboratorio</option>
                                        <option value="Equipo de esterilizacion">Equipo de esterilizacion</option>
                                        <option value="Mobiliario médico">Mobiliario médico</option>
                                        <option value="Equipo de traslado">Equipo de traslado</option>
                                        <option value="Equipo de computo/TI">Equipo de computo/TI</option>
                                        <option value="Equipo de rehabilitacion">Equipo de rehabilitacion</option>
                                        <option value="Equipo de minima invasión">Equipo de minima invasión</option>
                                        <option value="Equipo industrial">Equipo industrial</option>
                                        <option value="Refacciones / Accesorios">Refacciones / Accesorios</option>
                                        <option value="Material de proteccion">Material de proteccion</option>
                                        <option value="Herramienta">Herramienta</option>
                                        <option value="Instrumental medico">Instrumental medico</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                        <input type="hidden" name="category_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('category')" />
                                </div>
                                <div>
                                    <x-input-label for="type" :value="__('Tipo')" />
                                    <x-text-input id="type" name="type" type="text" class="mt-1 w-full" required autofocus autocomplete="type" />
                                    <x-input-error class="mt-2" :messages="$errors->get('type')" />
                                </div>
                                <div>
                                    <x-input-label for="brand" :value="__('Marca')" />
                                    <x-text-input id="brand" name="brand" type="text" class="mt-1 w-full" required autocomplete="brand" />
                                    <x-input-error class="mt-2" :messages="$errors->get('brand')" />
                                </div>
                                <div>
                                    <x-input-label for="model" :value="__('Modelo')" />
                                    <x-text-input id="model" name="model" type="text" class="mt-1 w-full" required autocomplete="model" />
                                    <x-input-error class="mt-2" :messages="$errors->get('model')" />
                                </div>
                                <div>
                                    <x-input-label for="serial" :value="__('No. de serie')" />
                                    <x-text-input id="serial" name="serial" type="text" class="mt-1 w-full" required autofocus autocomplete="serial" />
                                    <x-input-error class="mt-2" :messages="$errors->get('serial')" />
                                </div>
                                <div>
                                    <x-input-label for="location" :value="__('Ubicación')" />
                                    <div x-data="customSelect()">
                                    <select id="location" name="location" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="location"  @change="selectOption($event)">
                                        <option value="Ubicación 1">Ubicación 1</option>
                                        <option value="Ubicación 2">Ubicación 2</option>
                                        <option value="Ubicación 3">Ubicación 3</option>
                                    </select>
                                    <input type="hidden" name="location_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('location')" />
                                </div>
                                <div>
                                    <x-input-label for="sublocation" :value="__('Ubicación')" />
                                    <div x-data="customSelect()">
                                    <select id="sublocation" name="sublocation" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="sublocation"  @change="selectOption($event)">
                                        <option value="Sub Ubicación 1">Sub Ubicación 1</option>
                                        <option value="Sub Ubicación 2">Sub Ubicación 2</option>
                                        <option value="Sub Ubicación 3">Sub Ubicación 3</option>
                                    </select>
                                    <input type="hidden" name="sublocation_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('sublocation')" />
                                </div>
                                <div>
                                    <x-input-label for="status" :value="__('Estado')" />
                                    <div x-data="customSelect()">
                                    <select id="status" name="status" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="status"  @change="selectOption($event)">
                                        <option value="Funcional">Funcional</option>
                                        <option value="No funcional">No funcional</option>
                                        <option value="En mantenimiento">En mantenimiento</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="En revision">En revision</option>
                                        <option value="En stock">En stock</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                    <input type="hidden" name="status_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                </div>
                                <div>
                                    <x-input-label for="hierarchy" :value="__('Jerarquia')" />
                                    <div x-data="customSelect()">
                                    <select id="hierarchy" name="hierarchy" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="hierarchy"  @change="selectOption($event)">
                                        <option value="Individual">Individual</option>
                                        <option value="Principal">Principal</option>
                                        <option value="Secundario">Secundario</option>
                                    </select>
                                    <input type="hidden" name="hierarchy_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('hierarchy')" />
                                </div>
                                <div>
                                    <x-input-label for="criticaly" :value="__('Criticalidad')" />
                                    <div x-data="customSelect()">
                                    <select id="criticaly" name="criticaly" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="criticaly"  @change="selectOption($event)">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Alta">Alta</option>
                                        <option value="Media">Media</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                    <input type="hidden" name="criticaly_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('criticaly')" />
                                </div>
                                <div>
                                    <x-input-label for="risk" :value="__('Riesgo')" />
                                    <div x-data="customSelect()">
                                    <select id="risk" name="risk" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="risk"  @change="selectOption($event)">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Posible muerte del paciente">Posible muerte del paciente</option>
                                        <option value="Posible lesion o muerte del paciente">Posible lesion o muerte del paciente</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                    <input type="hidden" name="risk_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('risk')" />
                                </div>
                                <div>
                                    <x-input-label for="ing_assigned" :value="__('Ingeniero asignado')" />
                                    <x-text-input id="hierarchy" name="hierarchy" type="text" class="mt-1 w-full" required autocomplete="hierarchy" />
                                    <x-input-error class="mt-2" :messages="$errors->get('hierarchy')" />
                                </div>
                                <div>
                                    <x-input-label for="lasteditor" :value="__('Ultimo editor')" />
                                    <x-text-input id="lasteditor" name="lasteditor" type="text" class="mt-1 w-full" required autofocus autocomplete="lasteditor" />
                                    <x-input-error class="mt-2" :messages="$errors->get('lasteditor')" />
                                </div>
                                <div>
                                    <x-input-label for="software_ver" :value="__('Version de software')" />
                                    <x-text-input id="software_ver" name="software_ver" type="text" class="mt-1 w-full" required autocomplete="software_ver" />
                                    <x-input-error class="mt-2" :messages="$errors->get('software_ver')" />
                                </div>
                                <div>
                                    <x-input-label for="so" :value="__('Sistema operativo')" />
                                    <x-text-input id="so" name="so" type="text" class="mt-1 w-full" required autocomplete="so" />
                                    <x-input-error class="mt-2" :messages="$errors->get('so')" />
                                </div>
                                <div>
                                    <x-input-label for="firmware_ver" :value="__('Verción de firmware')" />
                                    <x-text-input id="firmware_ver" name="firmware_ver" type="text" class="mt-1 w-full" required autofocus autocomplete="firmware_ver" />
                                    <x-input-error class="mt-2" :messages="$errors->get('firmware_ver')" />
                                </div>
                                <div class="flex justify-center">
                                    <div class="max-w-full">
                                        <x-input-label for="description" :value="__('Descripción')" />
                                        <textarea id="description" name="description" class="mt-1 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide" required autocomplete="description" rows="3">{{ old('description') }}</textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pantalla 2: Datos de Facturas -->
                        <div x-show="pantalla === 2">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="bill_number" :value="__('Numero de la factura')" />
                                    <x-text-input id="bill_number" name="bill_number" type="text" class="mt-1 w-full" required autocomplete="bill_number" />
                                    <x-input-error class="mt-2" :messages="$errors->get('bill_number')" />
                                </div>
                                <div>
                                    <x-input-label for="acquisition_date" :value="__('Fecha de adquisicion')" />
                                    <input type="date" id="acquisition_date" name="acquisition_date" class="mt-1 block w-full" required autofocus autocomplete="acquisition_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('acquisition_date')" />
                                </div>
                                <div>
                                    <x-input-label for="instalation_date" :value="__('Fecha de instalacion')" />
                                    <input type="date" id="instalation_date" name="instalation_date" class="mt-1 block w-full" required autofocus autocomplete="instalation_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('instalation_date')" />
                                </div>
                                <div>
                                    <x-input-label for="divisa" :value="__('Divisa')" />
                                    <div x-data="customSelect()">
                                    <select id="divisa" name="divisa" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="divisa"  @change="selectOption($event)">
                                        <option value="Por definir">Por definir</option>
                                        <option value="MX">MX</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                    </select>
                                    <input type="hidden" name="divisa_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('divisa')" />
                                </div>
                                <div>
                                    <x-input-label for="price" :value="__('Precio')" />
                                    <x-text-input id="price" name="price" type="text" class="mt-1 w-full" required autocomplete="price" />
                                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                                </div>
                                <div>
                                    <x-input-label for="warranty_start" :value="__('Inicio de la garantía')" />
                                    <input type="date" id="warranty_start" name="warranty_start" class="mt-1 block w-full" required autofocus autocomplete="warranty_start" />
                                    <x-input-error class="mt-2" :messages="$errors->get('warranty_start')" />
                                </div>
                                <div>
                                    <x-input-label for="warranty_end" :value="__('Fin de la garantía')" />
                                    <input type="date" id="warranty_end" name="warranty_end" class="mt-1 block w-full" required autofocus autocomplete="warranty_end" />
                                    <x-input-error class="mt-2" :messages="$errors->get('warranty_end')" />
                                </div>
                                <div>
                                    <label for="bill" style="color: white;">Factura</label>
                                    <input id="bill" name="bill" type="file" class="mt-1 w-full" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('bill')" />

                                    <!-- Para mostrar la vista previa de la factura -->
                                    <div id="bill-preview-container">
                                        <label for="bill">Vista previa del documento:</label>
                                        <br>
                                        <embed id="bill-document-preview" type="application/pdf" width="100%" height="300px" />
                                    </div>
                                </div>

                                <div>
                                    <label for="warranty_letter" style="color: white;">Carta de garantía</label>
                                    <input id="warranty_letter" name="warranty_letter" type="file" class="mt-1 w-full" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('warranty_letter')" />

                                    <!-- Para mostrar la vista previa de la carta de garantía -->
                                    <div id="warranty-letter-preview-container">
                                        <label for="warranty_letter">Vista previa de la carta de garantía:</label>
                                        <br>
                                        <embed id="warranty-letter-document-preview" type="application/pdf" width="100%" height="300px" />
                                    </div>
                                </div>

                                <div>
                                    <label for="health_registration" style="color: white;">Registro sanitario</label>
                                    <input id="health_registration" name="health_registration" type="file" class="mt-1 w-full" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('health_registration')" />

                                    <!-- Para mostrar la vista previa del registro sanitario -->
                                    <div id="health-registration-preview-container">
                                        <label for="health_registration">Vista previa del registro sanitario:</label>
                                        <br>
                                        <embed id="health-registration-document-preview" type="application/pdf" width="100%" height="300px" />
                                    </div>
                                </div>

                                <script>
                                    // Función para mostrar la vista previa del documento
                                    function showPreview(fileInputId, previewId) {
                                        const fileInput = document.getElementById(fileInputId);
                                        const preview = document.getElementById(previewId);

                                        // Limpiar la vista previa si no hay archivo seleccionado
                                        if (!fileInput.files || fileInput.files.length === 0) {
                                            preview.src = '';
                                            return;
                                        }

                                        const file = fileInput.files[0];
                                        const fileReader = new FileReader();

                                        // Cargar el archivo como URL para la vista previa
                                        fileReader.onload = function (e) {
                                            preview.src = e.target.result;
                                        };

                                        // Leer el archivo como una URL
                                        fileReader.readAsDataURL(file);
                                    }

                                    // Agregar eventos para mostrar las vistas previas cuando se seleccionan los archivos
                                    document.getElementById('bill').addEventListener('change', function () {
                                        showPreview('bill', 'bill-document-preview');
                                    });

                                    document.getElementById('warranty_letter').addEventListener('change', function () {
                                        showPreview('warranty_letter', 'warranty-letter-document-preview');
                                    });

                                    document.getElementById('health_registration').addEventListener('change', function () {
                                        showPreview('health_registration', 'health-registration-document-preview');
                                    });
                                </script>
                                <div>
                                    <x-input-label for="import" :value="__('Importe')" />
                                    <x-text-input id="import" name="import" type="text" class="mt-1 w-full" required autocomplete="import" />
                                    <x-input-error class="mt-2" :messages="$errors->get('import')" />
                                </div>
                            </div>
                        </div>

                                                <!-- Pantalla 3: Datos de registro y mantenimiento -->
                         <div x-show="pantalla === 3">
                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <x-input-label for="belonging" :value="__('Pertenencia')" />
                                    <x-text-input id="belonging" name="belonging" type="text" class="mt-1 w-full" required autocomplete="belonging" />
                                    <x-input-error class="mt-2" :messages="$errors->get('belonging')" />
                                </div>
                                <div>
                                    <x-input-label for="owner" :value="__('Propietario')" />
                                    <x-text-input id="owner" name="owner" type="text" class="mt-1 w-full" required autocomplete="owner" />
                                    <x-input-error class="mt-2" :messages="$errors->get('owner')" />
                                </div>
                                <div>
                                    <x-input-label for="sold_by" :value="__('Vendido por')" />
                                    <x-text-input id="sold_by" name="sold_by" type="text" class="mt-1 w-full" required autocomplete="sold_by" />
                                    <x-input-error class="mt-2" :messages="$errors->get('sold_by')" />
                                </div>
                                <div>
                                    <x-input-label for="guarder_by" :value="__('Resguardado por')" />
                                    <x-text-input id="guarder_by" name="guarder_by" type="text" class="mt-1 w-full" required autocomplete="guarder_by" />
                                    <x-input-error class="mt-2" :messages="$errors->get('guarder_by')" />
                                </div>
                                <div>
                                    <x-input-label for="frecuency_mprev" :value="__('Frecuencia de Mantenimiento Preventivo')" />
                                    <div x-data="customSelect()">
                                        <select id="frecuency_mprev" name="frecuency_mprev" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="frecuency_mprev" @change="selectOption($event)">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="anual">Anual</option>
                                            <option value="semestral">Semestral</option>
                                            <option value="trimestral">Trimestral</option>
                                            <option value="mensual">Mensual</option>
                                            <option value="semanal">Semanal</option>
                                        </select>
                                        <input type="hidden" name="frecuency_mprev_selected" x-bind:value="selectedValue">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('frecuency_mprev')" />
                                </div>
                                <div>
                                    <x-input-label for="last_mprev" :value="__('Ultimo mantenimiento preventivo')" />
                                    <x-text-input id="last_mprev" name="last_mprev" type="text" class="mt-1 w-full" required autocomplete="last_mprev" />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_mprev')" />
                                </div>
                                <div>
                                    <x-input-label for="next_mprev" :value="__('Ultimo mantenimiento preventivo')" />
                                    <x-text-input id="next_mprev" name="next_mprev" type="text" class="mt-1 w-full" required autocomplete="next_mprev" />
                                    <x-input-error class="mt-2" :messages="$errors->get('next_mprev')" />
                                </div>
                            </div>
                        </div>

                        <!-- Pantalla 4: Datos de eliminacion -->
                        <div x-show="pantalla === 4">
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="leaving_date" :value="__('Fecha de baja')" />
                                    <x-text-input id="leaving_date" name="leaving_date" type="text" class="mt-1 w-full" required autocomplete="leaving_date" />
                                    <x-input-error class="mt-2" :messages="$errors->get('leaving_date')" />
                                </div>
                                <div>
                                    <x-input-label for="leaving_comments" :value="__('Comentarios de la eliminacion')" />
                                    <x-text-input id="leaving_comments" name="leaving_comments" type="text" class="mt-1 w-full" required autocomplete="leaving_comments" />
                                    <x-input-error class="mt-2" :messages="$errors->get('leaving_comments')" />
                                </div>
                                <div class="flex justify-center">
                                    <div class="max-w-full">
                                        <x-input-label for="motive" :value="__('Descripción')" />
                                        <textarea id="motive" name="motive" class="mt-1 {{ $errors->has('motive') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide" required autocomplete="motive" rows="3">{{ old('motive') }}</textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('motive')" />
                                    </div>
                                </div>
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
