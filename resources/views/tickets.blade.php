<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TICKETS | DEV LAB DE BIOINGENIERIA</title>
    <meta name="keywords" content="">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/resources/css/tickets.css">
</head>

<x-app-layout>
    <section>
        <div>
            <div>
                <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto" style="margin-bottom: 1rem;">
                    <div id="recipientes" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                        <table id="tickets" class="stripe hover"
                            style="width:100%; padding-top: 1rem; padding-bottom: 1em; margin-bottom: 1rem;">
                            <h2
                                style="color: #808080; font-size: 2.5rem; text-align: center; text-transform: uppercase; padding-bottom: 10px;">
                                Tickets</h2>
                            <thead>
                                <tr>
                                    <th id="icon-menu-id" data-priority="1">
                                        <div class="orden">
                                            <div>ID</div>
                                            <div id="icon-id" class="ordicon" title="Ordenar el ID de manera descendente o ascendente">
                                                <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-id-user" data-priority="2">
                                        <div class="orden">
                                            <div>USUARIO</div>
                                            <div id="icon-id-user" class="ordicon" title="Ordenar el ID del usuario de manera descendente o ascendente">
                                                <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-id-active" data-priority="3">
                                        <div class="orden">
                                            <div>ACTIVO</div>
                                            <div id="icon-id-active" class="ordicon" title="Ordenar el ID del activo de manera descendente o ascendente">
                                                <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-request" data-priority="4">
                                        <div class="orden">
                                            <div>SOLICITUD</div>
                                            <div id="icon-request" class="ordicon" title="Ordenar la Solicitud de manera descendente o ascendente">
                                                <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-type-request" data-priority="5">
                                        <div class="orden">
                                            <div>TIPO DE SOLICITUD</div>
                                            <div id="icon-type-request" title="Ordenar el Tipo de solicitud de manera descendente o ascendente">
                                                <svg class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-priority" data-priority="6">
                                        <div class="orden">
                                            <div>PRIORIDAD</div>
                                            <div id="icon-priority" class="ordicon" title="Ordenar la Prioridad de manera descendente o ascendente">
                                                <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-created" data-priority="7">
                                        <div class="orden">
                                            <div>FECHA DE CREACION</div>
                                            <div id="icon-created" title="Ordenar la Fecha de creación de manera descendente o ascendente">
                                                <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-status" data-priority="8">
                                        <div class="orden">
                                            <div>ESTATUS</div>
                                            <div id="icon-status" class="ordicon" title="Ordenar el Estatus de manera descendente o ascendente">
                                                <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Obtén los datos de la tabla "tickets" de la base de datos
                                $tickets = \App\Models\Tickets::all();

                                foreach ($tickets as $tickets) { ?>
                                <td>
                                    <div class="idtickets">
                                        <a href="{{ route('tickets-edit') }}">
                                            <div title="Editar este Ticket" class="editicon">
                                                <svg style="float: left;" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="textid"><?php echo "{$tickets->id}"; ?>
                                        </div>
                                    </div>
                                </td>
                                <?php
                                    // Obtén el nombre del usuario desde la tabla "users"
                                    $usuario = \App\Models\User::where('id', $tickets->user_id)->orderBy('name', 'desc')->pluck('name')->first();
                                    echo "<td>{$usuario}</td>";
                                    echo "<td>{$tickets->type}</td>";
                                    echo "<td>{$tickets->request}</td>";
                                    echo "<td>{$tickets->type_request}</td>";
                                    echo "<td>{$tickets->priority}</td>";
                                    echo "<td>{$tickets->created_at}</td>";
                                    echo "<td>{$tickets->status}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div style="text-align: center;">
        <!-- Botón flotante para agregar tickets -->
        <a href="{{ route('tickets-creation') }}" class="floating-button">
            <h2>+</h2>
        </a>
    </div>

    <!-- Ventana flotante para mostrar el mensaje -->
    <div class="floating-message">
        Agregar tickets
    </div>
</x-app-layout>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<!-- Archivo de idioma en español -->
<script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
<script src="https://bioingenieria.inventores.org/resources/js/tickets.js"></script>

</body>
</html>

