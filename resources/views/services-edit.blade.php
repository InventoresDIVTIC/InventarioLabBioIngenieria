<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/modal-table.css">
    <script src="https://bioingenieria.inventores.org/js/select-edit.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <title>CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
@if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin', 'Prestador de servicio']))
<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg"
                style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                <h2 style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">Editar Servicio</h2>
                <div class="flex items-center justify-center mt-4 screen-indicator">
                    <!-- Indicador de pantallas -->
                    <template x-for="screen in 4" :key="screen">
                        <div x-bind:class="{ 'indicator active': pantalla === screen, 'indicator': pantalla !== screen }"></div>
                    </template>
                </div>
                <?php
                    $id = $_GET['id'];
                    $servicios = DB::table('servicios')
                        ->join('servicios_detalles', 'servicios.id', '=', 'servicios_detalles.id')
                        ->join('servicios_firmas', 'servicios.id', '=', 'servicios_firmas.id')
                        ->join('servicios_gastos', 'servicios.id', '=', 'servicios_gastos.id')
                        ->select('servicios.*', 'servicios_detalles.*', 'servicios_firmas.*', 'servicios_gastos.*')
                        ->where('servicios.id', '=', $id)
                        ->first();
                ?>
                <!-- Pantalla-->
                <p class="screen-title" x-text="'Pantalla ' + pantallaTitulo" style="color: #d1d5db;"></p>
                <form id="form-services-1" action="{{ route('services.edit', ['id' => $servicios->id]) }}" method="POST" class="space-y-6 w-full sm:w-96">
                    @csrf
                    @method('PATCH')
                    <!-- Pantalla 1: Datos Generales -->
                    <div x-data="{ pantalla }">
                        <div x-show="pantalla === 1">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="assigned_engineer" :value="__('Ingeniero asignado')" />
                                    <x-text-input id="assigned_engineer" name="assigned_engineer" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="assigned_engineer" value='<?php echo "{$servicios->assigned_engineer}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('assigned_engineer')" />
                                </div>
                                <div>
                                    <x-input-label for="status" :value="__('Estatus')" />
                                    <div>
                                        <select id="status" name="status"
                                            class="mt-1 block w-full bg-gray-800 text-white" required autofocus
                                            autocomplete="status">
                                            <option value="Por definir">Por definir</option>
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="En Progreso">En Progreso</option>
                                            <option value="En Espera de Información">En Espera de Información</option>
                                            <option value="Resuelto">Resuelto</option>
                                            <option value="Cerrado">Cerrado</option>
                                            <option value="Reabierto">Reabierto</option>
                                            <option value="Asignado">Asignado</option>
                                            <option value="Cancelado">Cancelado</option>
                                            <option value="Aprobado">Aprobado</option>
                                            <option value="En Revisión">En Revisión</option>
                                            <option value="Omitido">Omitido</option>
                                            <option value="Generado automaticamente" selected disabled>Generado automaticamente</option>
                                            <option value="Otro">Otro</option>
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
                                            <option value="Por definir">Por definir</option>
                                            <option value="Soporte Técnico">Soporte Técnico</option>
                                            <option value="Asistencia al Usuario">Asistencia al Usuario</option>
                                            <option value="Mantenimiento">Mantenimiento</option>
                                            <option value="Consultoría">Consultoría</option>
                                            <option value="Implementación">Implementación</option>
                                            <option value="Entrenamiento">Entrenamiento</option>
                                            <option value="Desarrollo de Software">Desarrollo de Software</option>
                                            <option value="Gestión de Incidente">Gestión de Incidente</option>
                                            <option value="Actualización de Sistema">Actualización de Sistema</option>
                                            <option value="Instalación">Instalación</option>
                                            <option value="Optimización">Optimización</option>
                                            <option value="Auditoría">Auditoría</option>
                                            <option value="Servicio al Cliente">Servicio al Cliente</option>
                                            <option value="Configuración">Configuración</option>
                                            <option value="Resolución de Problemas">Resolución de Problemas</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('services_type')" />
                                </div>
                                <div>
                                    <x-input-label for="model" :value="__('Modelo activo')" />
                                    <x-text-input id="model" name="model" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="model" value='<?php echo "{$servicios->active_model}"; ?>' readonly/>
                                    <x-input-error class="mt-2" :messages="$errors->get('active_model')" />
                                </div>
                                <div>
                                    <x-input-label for="active_sublocation" :value="__('Sub ubicacion')" />
                                    <x-text-input id="active_sublocation" name="active_sublocation" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="active_sublocation" value='<?php echo "{$servicios->active_sublocation}"; ?>' readonly/>
                                    <x-input-error class="mt-2" :messages="$errors->get('active_sublocation')" />
                                </div>
                                <div>
                                    <x-input-label for="service_type" :value="__('Descripcion breve del servicio')" />
                                    <x-text-input id="service_type" name="service_type" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="service_type" value='<?php echo "{$servicios->service_type}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('service_type')" />
                                </div>
                                <div>
                                    <x-input-label for="supplier_name" :value="__('Proveedor')" />
                                    <x-text-input id="supplier_id" name="supplier_id" type="hidden"
                                        class="mt-1 block w-full" required autofocus autocomplete="supplier_id" value='<?php echo "{$servicios->supplier_id}"; ?>'/>
                                    <x-text-input id="supplier_name" name="supplier_name" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="supplier_name" value='<?php echo "{$servicios->supplier_name}"; ?>'
                                        x-on:click.prevent="$dispatch('open-modal', 'show_table_prov')" readonly />
                                    @include('layouts.modal-proveedores-table')
                                    <x-input-error class="mt-2" :messages="$errors->get('supplier_id')" />
                                </div>
                                <div>
                                    <x-input-label for="type" :value="__('Activo')" />
                                    <x-text-input id="active_id" name="active_id" type="hidden"
                                        class="mt-1 block w-full" required autofocus autocomplete="active_id" value='<?php echo "{$servicios->active_id}"; ?>'/>
                                    <x-text-input id="type" name="type" type="text" class="mt-1 block w-full"
                                        required autofocus autocomplete="type" value='<?php echo "{$servicios->active_name}"; ?>'
                                        x-on:click.prevent="$dispatch('open-modal', 'show_table_activos_prov')"
                                        readonly />
                                    @include('layouts.modal-activos-prov-table')
                                    <x-input-error class="mt-2" :messages="$errors->get('active_id')" />
                                </div>
                                <div>
                                    <x-input-label for="foil" :value="__('Folio')" />
                                    <x-text-input id="foil" name="foil" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="foil" value='<?php echo "{$servicios->foil}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('foil')" />
                                </div>
                                <div>
                                    <x-input-label for="origin" :value="__('Origen')" />
                                    <x-text-input id="origin" name="origin" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="origin" value='<?php echo "{$servicios->origin}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('origin')" />
                                </div>
                                <div>
                                    <x-input-label for="reference" :value="__('Referencia')" />
                                    <x-text-input id="reference" name="reference" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="reference" value='<?php echo "{$servicios->reference}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('reference')" />
                                </div>
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="scheduled_date" :value="__('Fecha prevista')" />
                                        <input id="scheduled_date" name="scheduled_date" type="date" class="mt-1 w-full"
                                            required autofocus autocomplete="scheduled_date" value='<?php echo "{$servicios->scheduled_date}"; ?>' readonly/>
                                        <x-input-error class="mt-2" :messages="$errors->get('scheduled_date')" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                                    <div>
                                        <button type="button" id="btn-siguiente-1" x-show="pantalla < 4"
                                            @click="pantalla = 2"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Siguiente</button>
                                        <button type="submit" x-show="pantalla > 0"
                                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                        <!-- Pantalla 2: Datos de las Facturas -->
                        <div x-show="pantalla === 2">
                        <form id="form-services-2" action="{{ route('services.edit.detalles', ['id' => $servicios->id]) }}" method="POST" class="space-y-6 w-full sm:w-96">
                                @csrf
                                @method('PATCH')
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="assigned_enginier" :value="__('Ingeniero asignado del servicio')" />
                                    <x-text-input id="assigned_enginier" name="assigned_enginier" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="assigned_enginier" value='<?php echo "{$servicios->assigned_enginier}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('assigned_enginier')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="start_date" :value="__('Fecha de inicio')" />
                                    <input id="start_date" name="start_date" type="date" class="mt-1 w-full"
                                        required autofocus autocomplete="start_date" value='<?php echo "{$servicios->start_date}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="starting_hour" :value="__('Hora de inicio')" />
                                    <input id="starting_hour" name="starting_hour" type="time" class="mt-1 w-full" required
                                        autofocus autocomplete="starting_hour" value='<?php echo "{$servicios->starting_hour}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('starting_hour')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="end_date" :value="__('Fecha final')" />
                                    <input id="end_date" name="end_date" type="date" class="mt-1 w-full"
                                        required autofocus autocomplete="end_date" value='<?php echo "{$servicios->end_date}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="end_hour" :value="__('Hora de termino')" />
                                    <input id="end_hour" name="end_hour" type="time" class="mt-1 w-full" required
                                        autofocus autocomplete="end_hour" step="60" value='<?php echo "{$servicios->end_hour}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('end_hour')" />
                                </div>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    // Obtener los campos
                                    const startDateField = document.getElementById("start_date");
                                    const startHourField = document.getElementById("starting_hour");
                                    const endDateField = document.getElementById("end_date");
                                    const endHourField = document.getElementById("end_hour");

                                    // Función para activar/desactivar los campos end_date y end_hour
                                    function toggleEndFields() {
                                        if (startDateField.value && startHourField.value) {
                                            // Habilitar end_date y end_hour si hay start_date y starting_hour
                                            endDateField.disabled = false;
                                            endHourField.disabled = false;

                                            // Establecer la fecha mínima para end_date
                                            endDateField.min = startDateField.value;

                                            // Si end_date es el mismo que start_date, establecer min para end_hour
                                            if (endDateField.value === startDateField.value) {
                                                endHourField.min = startHourField.value;
                                            } else {
                                                endHourField.removeAttribute('min');
                                            }
                                        } else {
                                            // Si no hay start_date o starting_hour, deshabilitar los campos
                                            endDateField.disabled = true;
                                            endHourField.disabled = true;
                                        }
                                    }

                                    // Llamar la función al cargar la página para configurar el estado inicial
                                    toggleEndFields();

                                    // Agregar event listeners a los campos para verificar cambios
                                    startDateField.addEventListener("change", toggleEndFields);
                                    startHourField.addEventListener("change", toggleEndFields);

                                    // Validar la fecha de finalización y hora de finalización
                                    endDateField.addEventListener("change", function() {
                                        // Validar si la fecha de finalización es menor que la de inicio
                                        if (endDateField.value < startDateField.value) {
                                            endDateField.setCustomValidity("La fecha final no puede ser menor a la fecha de inicio.");
                                        } else {
                                            endDateField.setCustomValidity(""); // Limpiar el mensaje de error
                                        }

                                        // Si la fecha final es el mismo día que la de inicio, validamos la hora
                                        if (endDateField.value === startDateField.value) {
                                            // Validar si la hora de finalización es menor que la de inicio
                                            if (endHourField.value && endHourField.value < startHourField.value) {
                                                endHourField.setCustomValidity("La hora de finalización no puede ser menor que la hora de inicio.");
                                            } else {
                                                endHourField.setCustomValidity(""); // Limpiar el mensaje de error
                                            }
                                        } else {
                                            // Si la fecha final es posterior, no validar la hora
                                            endHourField.setCustomValidity(""); // Limpiar el mensaje de error
                                        }
                                    });

                                    // Validar la hora de finalización cuando cambia
                                    endHourField.addEventListener("change", function() {
                                        // Si las fechas son iguales, validar la hora de finalización
                                        if (endDateField.value === startDateField.value && endHourField.value < startHourField.value) {
                                            endHourField.setCustomValidity("La hora de finalización no puede ser menor que la hora de inicio.");
                                        } else {
                                            endHourField.setCustomValidity(""); // Limpiar el mensaje de error
                                        }
                                    });

                                    // Verificar que la hora final no sea anterior a la hora de inicio, considerando si es un día posterior
                                    endDateField.addEventListener("change", function() {
                                        const startDate = new Date(startDateField.value + "T" + startHourField.value + ":00");
                                        const endDate = new Date(endDateField.value + "T" + endHourField.value + ":00");

                                        // Si la fecha de end_date es mayor, no validamos la hora
                                        if (endDate > startDate) {
                                            endHourField.setCustomValidity(""); // Limpiar el mensaje de error
                                        } else {
                                            // Validar si la hora de end_hour es menor que start_hour en el mismo día
                                            if (endDateField.value === startDateField.value && endHourField.value < startHourField.value) {
                                                endHourField.setCustomValidity("La hora de finalización no puede ser menor que la hora de inicio.");
                                            } else {
                                                endHourField.setCustomValidity(""); // Limpiar el mensaje de error
                                            }
                                        }
                                    });
                                });
                            </script>

                            <div>
                                <x-input-label for="summary" :value="__('Resumen')" />
                                <x-text-input id="summary" name="summary" type="text" class="mt-1 w-full"
                                    required autofocus autocomplete="summary" value='<?php echo "{$servicios->summary}"; ?>'/>
                                <x-input-error class="mt-2" :messages="$errors->get('summary')" />
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Descripcion')" />
                                <x-text-input id="description" name="description" type="text" class="mt-1 w-full"
                                    required autofocus autocomplete="description" value='<?php echo "{$servicios->description}"; ?>'/>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            <div>
                                <x-input-label for="conclusions" :value="__('Conclusiones')" />
                                <x-text-input id="conclusions" name="conclusions" type="text" class="mt-1 w-full"
                                    required autofocus autocomplete="conclusions" value='<?php echo "{$servicios->conclusions}"; ?>'/>
                                <x-input-error class="mt-2" :messages="$errors->get('conclusions')" />
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="created_at" :value="__('Fecha de creación')" />
                                    <input id="created_at" name="created_at" type="date" class="mt-1 w-full"
                                        required autofocus autocomplete="created_at" value='<?php echo "{$servicios->created_at}"; ?>' readonly/>
                                    <x-input-error class="mt-2" :messages="$errors->get('created_at')" />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="updated_at" :value="__('Fecha de edicion')" />
                                    <input id="updated_at" name="updated_at" type="date" class="mt-1 w-full"
                                        required autofocus autocomplete="updated_at" value='<?php echo "{$servicios->updated_at}"; ?>' readonly/>
                                    <x-input-error class="mt-2" :messages="$errors->get('updated_at')" />
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                                <div>
                                    <button type="button" id="btn-anterior-2" x-show="pantalla > 1"
                                        @click="pantalla = 1"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anterior</button>
                                    <button type="button" id="btn-siguiente-2" x-show="pantalla < 4"
                                        @click="pantalla = 3"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Siguiente</button>
                                    <button type="submit" x-show="pantalla > 0"
                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>

                        <!-- Pantalla 3: Datos de registro y mantenimiento -->
                <div x-show="pantalla === 3">
                    <form id="form-services-3" action="{{ route('services.edit.firmas', ['id' => $servicios->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6 w-full sm:w-96">
                            @csrf
                            @method('PATCH')

                            <div>
                                <label for="service_head_signature" style="color: white;">Firma del jefe de servicio</label>
                                <input id="service_head_signature" name="service_head_signature" type="file" accept=".pdf" class="mt-1 w-full" onchange="previewService_head_signature()" />
                                <x-input-error class="mt-2" :messages="$errors->get('service_head_signature')" />

                                <!-- Para mostrar la vista previa del documento existente -->
                                <div id="service_head_signature-preview-container">
                                    <label for="service_head_signature">Vista previa del documento:</label>
                                    <br>
                                    @if($servicios->service_head_signature)
                                        <embed id="service_head_signature-document-preview" type="application/pdf" width="100%" height="300px" src="{{ asset($servicios->service_head_signature) }}" />
                                    @else
                                        <p>No hay firma existente.</p>
                                    @endif
                                </div>
                            </div>
                            <script>
                                function previewService_head_signature() {
                                    var input = document.getElementById('service_head_signature');
                                    var preview = document.getElementById('service_head_signature-document-preview');

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
                                <label for="service_enigieer_signature" style="color: white;">Firma del ingeniero asignado</label>
                                <input id="service_enigieer_signature" name="service_enigieer_signature" type="file" accept=".pdf" class="mt-1 w-full" onchange="previewService_enigieer_signature()" />
                                <x-input-error class="mt-2" :messages="$errors->get('service_enigieer_signature')" />

                                <!-- Para mostrar la vista previa del documento existente -->
                                <div id="service_enigieer_signature-preview-container">
                                    <label for="service_enigieer_signature">Vista previa del documento:</label>
                                    <br>
                                    @if($servicios->service_enigieer_signature)
                                        <embed id="service_enigieer_signature-document-preview" type="application/pdf" width="100%" height="300px" src="{{ asset($servicios->service_enigieer_signature) }}" />
                                    @else
                                        <p>No hay firma existente.</p>
                                    @endif
                                </div>
                            </div>
                            <script>
                                function previewService_enigieer_signature() {
                                    var input = document.getElementById('service_enigieer_signature');
                                    var preview = document.getElementById('service_enigieer_signature-document-preview');

                                    if (input.files && input.files.length > 0) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            preview.src = e.target.result;
                                        }

                                        reader.readAsDataURL(input.files[1]);
                                    } else {
                                        preview.src = ''; // Establecer preview.src en blanco
                                    }
                                }
                            </script>

                            <div>
                                <label for="last_user_signature" style="color: white;">Firma del usuario</label>
                                <input id="last_user_signature" name="last_user_signature" type="file" accept=".pdf" class="mt-1 w-full" onchange="previewLast_user_signature()" />
                                <x-input-error class="mt-2" :messages="$errors->get('last_user_signature')" />

                                <!-- Para mostrar la vista previa del documento existente -->
                                <div id="last_user_signature-preview-container">
                                    <label for="last_user_signature">Vista previa del documento:</label>
                                    <br>
                                    @if($servicios->last_user_signature)
                                        <embed id="last_user_signature-document-preview" type="application/pdf" width="100%" height="300px" src="{{ asset($servicios->last_user_signature) }}" />
                                    @else
                                        <p>No hay firma existente.</p>
                                    @endif
                                </div>
                            </div>
                            <script>
                                function previewLast_user_signature() {
                                    var input = document.getElementById('last_user_signature');
                                    var preview = document.getElementById('last_user_signature-document-preview');

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
                            <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                                <div>
                                   <button type="button" id="btn-anterior-3" x-show="pantalla > 1"
                                   @click="pantalla = 2"
                                   class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anterior</button>
                                   <button type="button" id="btn-siguiente-3" x-show="pantalla < 4"
                                   @click="pantalla = 4"
                                   class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Siguiente</button>
                                  <button type="submit" x-show="pantalla > 0"
                                  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                              </div>
                           </div>
                        </div>
                    </form>

                        <!-- Pantalla 4: Datos de eliminacion -->
                    <form id="form-services-4" action="{{ route('services.edit.gastos', ['id' => $servicios->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6 w-full sm:w-96">
                        @csrf
                        @method('PATCH')
                        <div x-show="pantalla === 4">
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="service_expense" :value="__('Gastos de servicios')" />
                                    <x-text-input id="service_expense" name="service_expense" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="service_expense" value='<?php echo "{$servicios->service_expense}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('service_expense')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="parts_expense" :value="__('Gastos de partes')" />
                                    <x-text-input id="parts_expense" name="parts_expense" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="parts_expense" value='<?php echo "{$servicios->parts_expense}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('parts_expense')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="total" :value="__('Total')" />
                                    <x-text-input id="total" name="total" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="total"
                                        :value="old('total', $servicios->parts_expense + $servicios->service_expense)" readonly />
                                    <x-input-error class="mt-2" :messages="$errors->get('total')" />
                                </div>
                            </div>

                            <div>
                                <label for="annex" style="color: white;">Anexo</label>
                                <input id="annex" name="annex" type="file" accept=".pdf" class="mt-1 w-full" onchange="previewAnnex()" />
                                <x-input-error class="mt-2" :messages="$errors->get('annex')" />

                                <!-- Para mostrar la vista previa del documento existente -->
                                <div id="annex-preview-container">
                                    <label for="annex">Vista previa del documento:</label>
                                    <br>
                                    @if($servicios->annex)
                                        <embed id="annex-document-preview" type="application/pdf" width="100%" height="300px" src="{{ asset($servicios->annex) }}" />
                                    @else
                                        <p>No hay anexo existente.</p>
                                    @endif
                                </div>
                            </div>
                            <script>
                                function previewAnnex() {
                                    var input = document.getElementById('annex');
                                    var preview = document.getElementById('annex-document-preview');

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



                            <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                                <div>
                                    <button type="button" id="btn-anterior-4" x-show="pantalla > 1"
                                        @click="pantalla = 3"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Anterior</button>
                                    <button type="submit" x-show="pantalla > 0"
                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </form>
            </div>
        </section>
    </x-app-layout>

    <script>
    <?php
    $properties = ["status", "services_type"];
    foreach ($properties as $property) {
        echo "selectData(\"{$servicios->{$property}}\", \"$property\");\n";
    }
    ?>
    </script>

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


        document.addEventListener('DOMContentLoaded', () => {
            // Activar el primer círculo al cargar el documento
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
@endif
@if(Auth::check() && Auth::user()->hasAnyRole(['Usuario']))
<div>
    <style>
        .welcome-container {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background: url("https://bioingenieria.inventores.org/img/ImagenBackground.jpg") no-repeat;
            background-position: center;
            background-size: cover;
        }
        .welcome-box {
            text-align: center;
            padding: 40px;
            width: 80rem;
            backdrop-filter: blur(15px);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 2s ease-in-out;
        }
        .welcome-title {
            color: white;
            font-size: 2.5rem;
            text-transform: uppercase;
            margin: 0;
            animation: slideIn 2s ease-in-out;
        }
        .welcome-message {
            color: #808080;
            font-size: 1.25rem;
            margin-top: 20px;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
    <section class="welcome-container">
        <div class="welcome-box">
            <h2 class="welcome-title">Parece que no tienes permisos para acceder a este sitio por favor contacta a un administrador</h2>
        </div>
    </section>
</div>
@endif
</html>
