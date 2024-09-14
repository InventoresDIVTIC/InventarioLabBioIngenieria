<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/modal-table.css">
    <script src="https://bioingenieria.inventores.org/js/select-edit.js"></script>
    <title>EDITAR TICKET | CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
@if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin']))
<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg"
                style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                <h2
                    style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">
                    Editar Ticket</h2>
                <p class="screen-title" style="color: #d1d5db;"></p>
                <?php
                $id = $_GET['id'];
                $ticket = DB::table('tickets')
                                ->select('tickets.*')
                                ->find($id);

                 ?>
                    <form id="form-inventario" action="{{ route('tickets.edit', ['id' => $ticket->id]) }}" method="POST" class="space-y-6 w-full sm:w-96">
                        @csrf
                        @method('PATCH')
                    <!-- Pantalla 1: Datos Generales -->
                    <div>
                        <div>
                            <div class="grid grid-cols-2 gap-6">
                                <div title="Cambiar Activo">
                                    <x-input-label for="type" :value="__('Nombre del activo')" />
                                    <x-text-input id="active_id" name="active_id" type="hidden" class="mt-1 block w-full" required
                                    autofocus autocomplete="active_id" />
                                    <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" required
                                        autofocus autocomplete="type" value='<?php echo "{$ticket->type}"; ?>'
                                        x-on:click.prevent="$dispatch('open-modal', 'show_table')" readonly />
                                    @include('layouts.modal-activos-table')
                                    <x-input-error class="mt-2" :messages="$errors->get('active_id')" />
                                </div>
                                <div title="Modifica la descripción de la solicitud">
                                    <x-input-label for="request" :value="__('Solicitud')" />
                                    <x-text-input id="request" name="request" type="text"
                                        class="mt-1 w-full" value='<?php echo "{$ticket->request}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('request')" />
                                </div>
                                <div title="Modifica el Tipo de Solicitud del ticket">
                                    <x-input-label for="type_request" :value="__('Tipo de Solicitud')" />
                                    <x-text-input id="type_request" name="type_request" type="text"
                                        class="mt-1 w-full" value='<?php echo "{$ticket->type_request}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('type_request')" />
                                </div>
                                <div title="Modifica el Nivel de Prioridad del Ticket">
                                    <x-input-label for="priority" :value="__('Prioridad')" />
                                    <select id="priority" name="priority"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Baja">Baja</option>
                                        <option value="Media">Media</option>
                                        <option value="Alta">Alta</option>
                                        <option value="Urgente">Urgente</option>
                                        <option value="Crítica">Crítica</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('priority')" />
                                </div>
                                <div title="Modifica el Estatus del Ticket">
                                    <x-input-label for="status" :value="__('Estatus')" />
                                    <select id="status" name="status"
                                        class="mt-1 block w-full bg-gray-800 text-white">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Abierto">Abierto</option>
                                        <option value="En proceso">En proceso</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Resuelto">Resuelto</option>
                                        <option value="Cerrado">Cerrado</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                </div>
                                <div title="Último usuario en Editar este Ticket">
                                    <x-input-label for="last_editor" :value="__('Último editor')" />
                                    <x-text-input id="last_editor" name="last_editor" type="text" class="mt-1 w-full" readonly="readonly"
                                        value='<?php echo "{$ticket->last_editor}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('last_editor')" />
                                </div>
                                <div class="flex justify-center" title="Agrega o modifica el Motivo del Ticket">
                                    <div class="max-w-full">
                                        <x-input-label for="solution" :value="__('Motivo')" />
                                        <textarea id="solution" name="solution"
                                            class="mt-1 {{ $errors->has('solution') ? 'border-red-500' : 'border-gray-400' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide"
                                            rows="3"><?php echo "{$ticket->solution}"; ?></textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('solution')" />
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="max-w-full">
                                        <x-input-label for="comments" :value="__('Comentarios')" />
                                        <textarea id="comments" name="comments"
                                            class="mt-1 {{ $errors->has('comments') ? 'border-red-500' : 'border-gray-400' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide"
                                            rows="3"><?php echo "{$ticket->comments}"; ?></textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('comments')" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                            <div>
                                <button type="submit"
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
        <?php
            $properties = ["priority", "status"];
            foreach ($properties as $property) {
                echo "selectData('{$ticket->{$property}}', '$property');";
            }
        ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://bioingenieria.inventores.org/js/tickets-creation.js"></script>
</body>
@endif
@if(Auth::check() && Auth::user()->hasAnyRole(['Usuario', 'Prestador de servicio']))
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
