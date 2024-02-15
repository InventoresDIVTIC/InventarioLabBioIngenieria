<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <script src="https://bioingenieria.inventores.org/js/select-edit.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <title>DEV LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>

<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg"
                style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                <h2
                    style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">
                    Editar Artículo de Inventario</h2>
                <div class="flex items-center justify-center mt-4 screen-indicator">
                    <!-- Indicador de pantallas -->
                    <template x-for="screen in 4" :key="screen">
                        <div
                            x-bind:class="{ 'indicator active': pantalla === screen, 'indicator': pantalla !== screen }" x-on:click="pantalla = screen">
                        </div>
                    </template>
                </div>
                <p class="screen-title" x-text="'Pantalla ' + pantallaTitulo" style="color: #d1d5db;"></p>
                <?php
                    $id = session()->get('id');
                    if($id==NULL){
                        $id = $_GET['id'];
                    }
                    $activo = DB::table('activos')
                        ->join('activos_finanzas', 'activos.id', '=', 'activos_finanzas.id')
                        ->join('activos_proveeduria', 'activos.id', '=', 'activos_proveeduria.id')
                        ->join('activos_servicios', 'activos.id', '=', 'activos_servicios.id')
                        ->select('activos.*', 'activos_finanzas.*', 'activos_proveeduria.*', 'activos_servicios.*')
                        ->where('activos.id', '=', $id)
                        ->first();
                ?>
                <!-- Pantalla 1: Datos Generales -->
                <div x-data="{ pantalla }">

                    <div x-show="pantalla === 1">
                        <form id="form-inventario" action="{{ route('actives.edit', ['id' => $activo->id]) }}"
                            method="POST" class="space-y-6 w-full sm:w-96">
                            @csrf
                            @method('PATCH')

                            <!-- Etiqueta QR -->
                            <div id="qr"class="flex items-center gap-4 mt-4" style="justify-content: center; background-color: white;">
                                <div class="grid grid-flow-col justify-stretch px-4 py-4">
                                    <div id="qrcode" class=""></div>
                                    <div class="grid grid-rows-5 justify-stretch pl-4">
                                        <div>
                                            <label>Nombre del artículo:</label>
                                            <label><?php echo "{$activo->type}";?></label>
                                        </div>
                                        <div>
                                            <label>Categoría:</label>
                                            <label><?php echo "{$activo->category}";?></label>
                                        </div>
                                        <div>
                                            <label>Marca:</label>
                                            <label><?php echo "{$activo->brand}";?></label>
                                        </div>
                                        <div>
                                            <label>Modelo:</label>
                                            <label><?php echo "{$activo->model}";?></label>
                                        </div>
                                        <div>
                                            <label>No. de serie:</label>
                                            <label><?php echo "{$activo->serial}";?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Generar Etiqueta QR -->
                            <button type="button" onclick="genQR()" class="hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Generar etiqueta QR</button>

                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <x-input-label for="type" :value="__('Nombre del artículo')" />
                                    <x-text-input id="type" name="type" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->type}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('type')" />
                                </div>

                                <div>
                                    <x-input-label for="description" :value="__('Descripción')" />
                                    <x-text-input id="description" name="description" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->description}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>

                                <div>
                                    <x-input-label for="category" :value="__('Categoría')" />
                                    <select id="category" name="category"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Equipo Médico">Equipo Médico</option>
                                        <option value="Equipo de medición / Simulacion">Equipo de medición / Simulacion
                                        </option>
                                        <option value="Equipo de imagenologia">Equipo de imagenologia</option>
                                        <option value="Equipo de laboratorio">Equipo de laboratorio</option>
                                        <option value="Equipo de esterilizacion">Equipo de esterilizacion</option>
                                        <option value="Mobiliario médico">Mobiliario médico</option>
                                        <option value="Equipo de traslado">Equipo de traslado</option>
                                        <option value="Equipo de computo / TI">Equipo de computo / TI</option>
                                        <option value="Equipo de rehabilitacion">Equipo de rehabilitacion</option>
                                        <option value="Equipo de minima invasión">Equipo de minima invasión</option>
                                        <option value="Equipo industrial">Equipo industrial</option>
                                        <option value="Refacciones / Accesorios">Refacciones / Accesorios</option>
                                        <option value="Material de proteccion">Material de proteccion</option>
                                        <option value="Herramienta">Herramienta</option>
                                        <option value="Instrumental medico">Instrumental medico</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('category')" />
                                </div>

                                <div>
                                    <x-input-label for="brand" :value="__('Marca')" />
                                    <x-text-input id="brand" name="brand" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->brand}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('brand')" />
                                </div>

                                <div>
                                    <x-input-label for="model" :value="__('Modelo')" />
                                    <x-text-input id="model" name="model" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->model}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('model')" />
                                </div>

                                <div>
                                    <x-input-label for="serial" :value="__('No. de serie')" />
                                    <x-text-input id="serial" name="serial" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->serial}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('serial')" />
                                </div>

                                <div>
                                    <x-input-label for="location" :value="__('Ubicación')" />
                                    <select id="location" name="location"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Ubicación 1">Ubicación 1</option>
                                        <option value="Ubicación 2">Ubicación 2</option>
                                        <option value="Ubicación 3">Ubicación 3</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('location')" />
                                </div>

                                <div>
                                    <x-input-label for="sublocation" :value="__('Sub ubicación')" />
                                    <select id="sublocation" name="sublocation"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Sub Ubicación 1">Sub Ubicación 1</option>
                                        <option value="Sub Ubicación 2">Sub Ubicación 2</option>
                                        <option value="Sub Ubicación 3">Sub Ubicación 3</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('sublocation')" />
                                </div>

                                <div>
                                    <x-input-label for="status" :value="__('Estado')" />
                                    <select id="status" name="status"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Funcional">Funcional</option>
                                        <option value="No funcional">No funcional</option>
                                        <option value="En mantenimiento">En mantenimiento</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="En revision">En revision</option>
                                        <option value="En stock">En stock</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                </div>
                                <div>
                                    <x-input-label for="hierarchy" :value="__('Jerarquia')" />
                                    <select id="hierarchy" name="hierarchy"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Principal">Principal</option>
                                        <option value="Secundario">Secundario</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('hierarchy')" />
                                </div>

                                <div>
                                    <x-input-label for="criticality" :value="__('Criticalidad')" />
                                    <select id="criticality" name="criticality"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Alta">Alta</option>
                                        <option value="Media">Media</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="risk" :value="__('Riesgo')" />
                                    <select id="risk" name="risk"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Posible muerte del paciente">Posible muerte del paciente</option>
                                        <option value="Posible lesion o muerte del paciente">Posible lesion o muerte del paciente</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('risk')" />
                                </div>

                                <div>
                                    <x-input-label for="ing_assigned" :value="__('Ingeniero asignado')" />
                                    <x-text-input id="ing_assigned" name="ing_assigned" type="text"
                                        class="mt-1 w-full"
                                        value='<?php echo "{$activo->ing_assigned}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('ing_assigned')" />
                                </div>

                                <div>
                                    <x-input-label for="last_editor" :value="__('Ultimo editor')" />
                                    <x-text-input id="last_editor" name="last_editor" type="text"
                                        class="mt-1 w-full"
                                        readonly="readonly" value='<?php echo "{$activo->last_editor}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_editor')" />
                                </div>

                                <div>
                                    <x-input-label for="software_ver" :value="__('Version de software')" />
                                    <x-text-input id="software_ver" name="software_ver" type="text"
                                        class="mt-1 w-full"
                                        value='<?php echo "{$activo->software_ver}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('software_ver')" />
                                </div>

                                <div>
                                    <x-input-label for="so" :value="__('Sistema operativo')" />
                                    <x-text-input id="so" name="so" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->so}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('so')" />
                                </div>

                                <div>
                                    <x-input-label for="firmware_ver" :value="__('Verción de firmware')" />
                                    <x-text-input id="firmware_ver" name="firmware_ver" type="text"
                                        class="mt-1 w-full"
                                        value='<?php echo "{$activo->firmware_ver}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('firmware_ver')" />
                                </div>

                                <div class="flex justify-center">
                                    <div class="max-w-full">
                                        <x-input-label for="comments" :value="__('Comentarios')" />
                                        <textarea id="comments" name="comments"
                                            class="mt-1 {{ $errors->has('comments') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide"
                                            rows="3"><?php echo "{$activo->comments}"; ?></textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('comments')" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                                <div>
                                    <button type="button" id="btn-siguiente-1" x-show="pantalla < 4" @click="pantalla = 2"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Siguiente</button>
                                <button type="submit" form="form-inventario"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Pantalla 2: Datos de Facturas -->
                    <div x-show="pantalla === 2">
                        <form id="form-inventario-2" action="{{ route('actives.finanzas', ['id' => $activo->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6 w-full sm:w-96">
                            @csrf
                            @method('PATCH')
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="bill_number" :value="__('Numero de la factura')" />
                                    <x-text-input id="bill_number" name="bill_number" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->bill_number}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('bill_number')" />
                                </div>

                                <div>
                                    <x-input-label for="acquisition_date" :value="__('Fecha de adquisicion')" />
                                    <input type="date" id="acquisition_date" name="acquisition_date"
                                        class="mt-1 block w-full"
                                        value='<?php echo "{$activo->acquisition_date}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('acquisition_date')" />
                                </div>

                                <div>
                                    <x-input-label for="installation_date" :value="__('Fecha de instalacion')" />
                                    <input type="date" id="installation_date" name="installation_date"
                                        class="mt-1 block w-full"
                                        value='<?php echo "{$activo->installation_date}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('installation_date')" />
                                </div>

                                <div>
                                    <x-input-label for="divisa" :value="__('Divisa')" />
                                    <select id="divisa" name="divisa"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="MX">MX</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('divisa')" />
                                </div>

                                <div>
                                    <x-input-label for="price" :value="__('Precio')" />
                                    <x-text-input id="price" name="price" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->price}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                                </div>

                                <div>
                                    <x-input-label for="warranty_start" :value="__('Inicio de la garantía')" />
                                    <input type="date" id="warranty_start" name="warranty_start"
                                        class="mt-1 block w-full"
                                        value='<?php echo "{$activo->warranty_start}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('warranty_start')" />
                                </div>

                                <div>
                                    <x-input-label for="warranty_end" :value="__('Fin de la garantía')" />
                                    <input type="date" id="warranty_end" name="warranty_end"
                                        class="mt-1 block w-full"
                                        value='<?php echo "{$activo->warranty_end}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('warranty_end')" />
                                </div>

                                <div>
                                    <label for="bill" style="color: white;">Factura</label>
                                    <input id="bill" name="bill" type="file" accept=".pdf" class="mt-1 w-full" onchange="previewBill()" />
                                    <x-input-error class="mt-2" :messages="$errors->get('bill')" />

                                    <!-- Para mostrar la vista previa del documento existente -->
                                    <div id="bill-preview-container">
                                        <label for="bill">Vista previa del documento:</label>
                                        <br>
                                        @if($activo->warranty_letter)
                                            <embed id="bill-document-preview" type="application/pdf" width="100%" height="300px" src="{{ asset($activo->bill) }}" />
                                        @else
                                            <p>No hay firma existente.</p>
                                        @endif
                                    </div>
                                </div>
                                <script>
                                    function previewBill() {
                                        var input = document.getElementById('bill');
                                        var preview = document.getElementById('bill-document-preview');

                                        if (input.files && input.files.length > 0) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                preview.src = e.target.result;
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            preview.src = ''; // Establecer preview.src en blanco
                                        }
                                    }
                                </script>

                                <div>
                                    <label for="warranty_letter" style="color: white;">Garantía</label>
                                    <input id="warranty_letter" name="warranty_letter" type="file" accept=".pdf" class="mt-1 w-full" onchange="previewWarranty_letter()" />
                                    <x-input-error class="mt-2" :messages="$errors->get('warranty_letter')" />

                                    <!-- Para mostrar la vista previa del documento existente -->
                                    <div id="warranty_letter-preview-container">
                                        <label for="warranty_letter">Vista previa del documento:</label>
                                        <br>
                                        @if($activo->warranty_letter)
                                            <embed id="warranty_letter-document-preview" type="application/pdf" width="100%" height="300px" src="{{ asset($activo->warranty_letter) }}" />
                                        @else
                                            <p>No hay firma existente.</p>
                                        @endif
                                    </div>
                                </div>
                                <script>
                                    function previewWarranty_letter() {
                                        var input = document.getElementById('warranty_letter');
                                        var preview = document.getElementById('warranty_letter-document-preview');

                                        if (input.files && input.files.length > 0) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                preview.src = e.target.result;
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            preview.src = ''; // Establecer preview.src en blanco
                                        }
                                    }
                                </script>

                                <div>
                                    <label for="health_registration" style="color: white;">Registro de sanidad</label>
                                    <input id="health_registration" name="health_registration" type="file" accept=".pdf" class="mt-1 w-full" onchange="previewHealth_registration()" />
                                    <x-input-error class="mt-2" :messages="$errors->get('health_registration')" />

                                    <!-- Para mostrar la vista previa del documento existente -->
                                    <div id="health_registration-preview-container">
                                        <label for="health_registration">Vista previa del documento:</label>
                                        <br>
                                        @if($activo->health_registration)
                                            <embed id="health_registration-document-preview" type="application/pdf" width="100%" height="300px" src="{{ asset($activo->health_registration) }}" />
                                        @else
                                            <p>No hay firma existente.</p>
                                        @endif
                                    </div>
                                </div>
                                <script>
                                    function previewHealth_registration() {
                                        var input = document.getElementById('health_registration');
                                        var preview = document.getElementById('health_registration-document-preview');

                                        if (input.files && input.files.length > 0) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                preview.src = e.target.result;
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            preview.src = ''; // Establecer preview.src en blanco
                                        }
                                    }
                                </script>

                                <div>
                                    <x-input-label for="import" :value="__('Importe')" />
                                    <x-text-input id="import" name="import" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->import}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('import')" />
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                                <div>
                                    <button type="button" id="btn-anterior-2" x-show="pantalla > 1" @click="pantalla = 1"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anterior</button>
                                    <button type="button" id="btn-siguiente-2" x-show="pantalla < 3" @click="pantalla = 3"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Siguiente</button>
                                    <button type="submit" form="form-inventario-2"
                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Pantalla 3: Datos de registro y mantenimiento -->
                    <div x-show="pantalla === 3">
                        <form id="form-inventario-3" action="{{ route('actives.proveeduria', ['id' => $activo->id]) }}"
                            method="POST" class="space-y-6 w-full sm:w-96">
                            @csrf
                            @method('PATCH')
                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <x-input-label for="belonging" :value="__('Pertenencia')" />
                                    <x-text-input id="belonging" name="belonging" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->belonging}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('belonging')" />
                                </div>

                                <div>
                                    <x-input-label for="owner" :value="__('Propietario')" />
                                    <x-text-input id="owner" name="owner" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->owner}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('owner')" />
                                </div>

                                <div>
                                    <x-input-label for="sold_by" :value="__('Vendido por')" />
                                    <x-text-input id="sold_by" name="sold_by" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->sold_by}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('sold_by')" />
                                </div>

                                <div>
                                    <x-input-label for="guarder_by" :value="__('Resguardado por')" />
                                    <x-text-input id="guarder_by" name="guarder_by" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$activo->guarder_by}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('guarder_by')" />
                                </div>

                                <div>
                                    <x-input-label for="frecuency_mprev" :value="__('Frecuencia de Mantenimiento Preventivo')" />
                                    <select id="frecuency_mprev" name="frecuency_mprev"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Anual">Anual</option>
                                        <option value="Semestral">Semestral</option>
                                        <option value="Trimestral">Trimestral</option>
                                        <option value="Mensual">Mensual</option>
                                        <option value="Semanal">Semanal</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('frecuency_mprev')" />
                                </div>

                                <div>
                                    <x-input-label for="service_provider" :value="__('Proveedor del servicio')" />
                                    <x-text-input id="service_provider" name="service_provider" type="text"
                                        class="mt-1 w-full"
                                        value='<?php echo "{$activo->service_provider}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('service_provider')" />
                                </div>

                                <div>
                                    <x-input-label for="last_mprev" :value="__('Inicio de la garantía')" />
                                    <input type="date" id="last_mprev" name="last_mprev"
                                        class="mt-1 block w-full"
                                        value='<?php echo "{$activo->last_mprev}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_mprev')" />
                                </div>

                                <div>
                                    <x-input-label for="next_mprev" :value="__('Inicio de la garantía')" />
                                    <input type="date" id="next_mprev" name="next_mprev"
                                        class="mt-1 block w-full"
                                        value='<?php echo "{$activo->next_mprev}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('next_mprev')" />
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                                <div>
                                    <button type="button" id="btn-anterior-3" x-show="pantalla > 1" @click="pantalla = 2"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anterior</button>
                                    <button type="button" id="btn-siguiente-3" x-show="pantalla < 4" @click="pantalla = 4"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Siguiente</button>
                                    <button type="submit" form="form-inventario-3"
                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Pantalla 4: Datos de eliminacion -->
                    <div x-show="pantalla === 4">
                        <form id="form-inventario-4" action="{{ route('actives.delete', ['id' => $activo->id]) }}"
                            method="POST" class="space-y-6 w-full sm:w-96">
                            @csrf
                            @method('PATCH')
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="leaving_date" :value="__('Fecha de baja')" />
                                    <input type="date" id="leaving_date" name="leaving_date"
                                        class="mt-1 block w-full" readonly="readonly"
                                        value='<?php echo "{$activo->leaving_date}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('leaving_date')" />
                                </div>

                                <div>
                                    <x-input-label for="leaving_comments" :value="__('Comentarios de la eliminacion')" />
                                    <x-text-input id="leaving_comments" name="leaving_comments" type="text"
                                        class="mt-1 w-full"
                                        value='<?php echo "{$activo->leaving_comments}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('leaving_comments')" />
                                </div>

                                <div class="flex justify-center">
                                    <div class="max-w-full">
                                        <x-input-label for="motive" :value="__('Descripción')" />
                                        <textarea id="motive" name="motive"
                                            class="mt-1 {{ $errors->has('motive') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide"
                                            required autocomplete="motive" rows="3"><?php echo "{$activo->motive}"; ?></textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('motive')" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                                <div>
                                    <button type="button" id="btn-anterior-4" x-show="pantalla > 1" @click="pantalla = 3"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anterior</button>
                                    <button type="submit" form="form-inventario-4"
                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </x-app-layout>

    <script>
        function genQR() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            source = document.getElementById("qr");

            specialElementHandlers = {
                '#bypassme': function (element, renderer) {
                    return true
                }
            };
            margins = {
                top: 80,
                bottom: 60,
                left: 40,
                width: 522
            };

            pdf.fromHTML(
                source,
                margins.left, // x coord
                margins.top, { // y coord
                    'width': margins.width,
                    'elementHandlers': specialElementHandlers
                },

                function (dispose) {
                    pdf.save("QR_ID_<?php echo "{$activo->id}"; ?>.pdf");
                }, margins
            );
        }
    </script>

    <script>
        var qrcode = new QRCode("qrcode",{
        text: "https://bioingenieria.inventores.org/inventory-edit?id=<?php echo "{$activo->id}"; ?>",
        colorDark : "#000000",
        colorLight : "#ffffff",
        //correctLevel : QRCode.CorrectLevel.H
        });
    </script>

    <script>
        <?php
        $properties = ['category', 'location', 'sublocation', 'status', 'hierarchy', 'criticality', 'risk', 'divisa', 'frecuency_mprev'];
        foreach ($properties as $property) {
            echo "selectData('{$activo->{$property}}', '$property');";
        }
        ?>
    </script>

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

       // Asignar el nombre de la pantalla actual
       const pantallaTitleElement = document.querySelector('.screen-title');
        // Asignar evento click a los botones Anterior y Siguiente del segundo formulario
        const btnSiguiente1 = document.querySelector('#btn-siguiente-1');
        // Asignar evento click a los botones Anterior y Siguiente del segundo formulario
        const btnAnterior2 = document.querySelector('#btn-anterior-2');
        const btnSiguiente2 = document.querySelector('#btn-siguiente-2');
        // Asignar evento click a los botones Anterior y Siguiente del tercer formulario
        const btnAnterior3 = document.querySelector('#btn-anterior-3');
        const btnSiguiente3 = document.querySelector('#btn-siguiente-3');
        // Asignar evento click a los botones Anterior y Siguiente del cuarto formulario
        const btnAnterior4 = document.querySelector('#btn-anterior-4');

            // Asignar evento click a los botones Anterior y Siguiente del primer formulario

            btnSiguiente1.addEventListener('click', () => {
                if (pantalla = 1) {
                    pantalla += 1;
                    updateIndicator();
                    pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
                    window.scrollTo(0, 0);
                }
            });


            btnAnterior2.addEventListener('click', () => {
                if (pantalla = 2) {
                    pantalla -= 1;
                    updateIndicator();
                    pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
                    window.scrollTo(0, 0);
                }
            });

            btnSiguiente2.addEventListener('click', () => {
                if (pantalla = 2) {
                    pantalla += 1;
                    updateIndicator();
                    pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
                    window.scrollTo(0, 0);
                }
            });

            btnAnterior3.addEventListener('click', () => {
                if (pantalla = 3) {
                    pantalla -= 1;
                    updateIndicator();
                    pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
                    window.scrollTo(0, 0);
                }
            });

            btnSiguiente3.addEventListener('click', () => {
                if (pantalla = 3) {
                    pantalla += 1;
                    updateIndicator();
                    pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
                    window.scrollTo(0, 0);
                }
            });

            btnAnterior4.addEventListener('click', () => {
                if (pantalla = 4) {
                    pantalla -= 1;
                    updateIndicator();
                    pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
                    window.scrollTo(0, 0);
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
