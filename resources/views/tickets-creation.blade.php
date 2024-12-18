<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/dashboard.css">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/tickets.css">
    <title>CREAR TICKET | CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
@if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin', 'Prestador de servicio']))
<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div class="max-w-xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg"
                style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                <h2
                    style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">
                    Registro de Tickets
                </h2>
                <?php
                    if(session()->get('idTicket')!=NULL){
                        $id = session()->get('idTicket');
                        session()->flash('idTicket', $id);

                        $activo = DB::table('activos')
                        ->select('id','type')
                        ->where('activos.id', '=', $id)
                        ->first();
                    }

                ?>
                <form method="post" action="{{ route('guardarTicket') }}" class="space-y-6">
                    @csrf

                    <div title="Selecciona un Activo">
                        <x-input-label for="type" :value="__('Activo')" />
                        <x-text-input id="active_id" name="active_id" type="hidden" class="mt-1 block w-full" required
                        autofocus autocomplete="active_id"/>
                        <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="type" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'show_table')" readonly />
                        @include('layouts.modal-activos-table')
                        <x-input-error class="mt-2" :messages="$errors->get('active_id')" />
                    </div>

                    <div title="Describe la Solicitud a Realizar">
                        <x-input-label for="request" :value="__('Solicitud')" />
                        <x-text-input id="request" name="request" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="request" />
                        <x-input-error class="mt-2" :messages="$errors->get('request')" />
                    </div>

                    <div title="Selecciona el Tipo de Solicitud que se realizará">
                        <x-input-label for="type_request" :value="__('Tipo de solicitud')" />
                        <x-text-input id="type_request" name="type_request" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="type_request" />
                        <x-input-error class="mt-2" :messages="$errors->get('type_request')" />
                    </div>

                    <div title="Selecciona el Nivel de Prioridad del ticket">
                        <x-input-label for="priority" :value="__('Prioridad')" />
                        <select id="priority" name="priority" class="priority" required autofocus autocomplete="priority">
                            <option value="Por definir">Por definir</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                            <option value="Urgente">Urgente</option>
                            <option value="Crítica">Crítica</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('priority')" />
                    </div>

                    <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                        <div>
                            <x-primary-button>{{ __('guardar') }}</x-primary-button>
                        </div>

                        <div
                            style="color: #d1d5db; background-color: rgb(31 41 55 / var(--tw-bg-opacity)); padding: .44rem; border-radius: .375rem; border-color: #6b7180; border-width: 1px; font-weight: 600; font-size: .75rem; text-transform: uppercase;">
                            @if (Route::has('tickets'))
                                <a href="{{ route('tickets') }}">
                                    {{ __('Ir a Tickets') }}
                                </a>
                            @endif
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </x-app-layout>

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
        <?php
            if(session()->get('idTicket')!=NULL){
                echo "$('#active_id').val('$activo->id');\n";
                echo "$('#type').val('$activo->type');";
        }?>
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://bioingenieria.inventores.org/js/tickets-creation.js"></script>
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
