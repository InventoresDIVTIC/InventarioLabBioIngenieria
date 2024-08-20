<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVENTARIO | CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
    <meta name="keywords" content="">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div>
                <div>
                    <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto" style="margin-bottom: 1rem; margin-top: 4rem;">
                        <div id="recipientes" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            <table id="activos" class="stripe hover" style="width:100%; padding-top: 1rem; padding-bottom: 1em; margin-bottom: 1rem;">
                                <h2 style="color: #808080; font-size: 2.5rem; text-align: center; text-transform: uppercase; padding-bottom: 10px;">Activos</h2>
                                <thead>
                                    <tr>
                                        <th id="icon-menu-id" data-priority="1">
                                            <div class="orden">
                                                <div>
                                                    ID
                                                </div>
                                                <div id="icon-id" class="ordicon" title="Ordenar el ID de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-type" data-priority="2">
                                            <div class="orden">
                                                <div>
                                                    ACTIVO
                                                </div>
                                                <div id="icon-type" class="ordicon" title="Ordenar el Activo de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-category" data-priority="3">
                                            <div class="orden">
                                                <div>
                                                    CATEGORÍA
                                                </div>
                                                <div id="icon-category" class="ordicon" title="Ordenar la Categoría de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-brand" data-priority="4">
                                            <div class="orden">
                                                <div>
                                                    MARCA
                                                </div>
                                                <div id="icon-brand" class="ordicon" title="Ordenar la Marca de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-model" data-priority="5">
                                            <div class="orden">
                                                <div>
                                                    MODELO
                                                </div>
                                                <div id="icon-model" class="ordicon" title="Ordenar el Modelo de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-serial" data-priority="6">
                                            <div class="orden">
                                                <div>
                                                    NO. SERIE
                                                </div>
                                                <div id="icon-serial" class="ordicon" title="Ordenar el NO. de Serie de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-location" data-priority="7">
                                            <div class="orden">
                                                <div>
                                                    UBICACIÓN
                                                </div>
                                                <div id="icon-location" class="ordicon" title="Ordenar la Ubicación de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-sublocation" data-priority="8">
                                            <div class="orden">
                                                <div>
                                                    SUB UBICACIÓN
                                                </div>
                                                <div id="icon-sublocation" class="ordicon" title="Ordenar la Sub Ubicación de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-status" data-priority="9">
                                            <div class="orden">
                                                <div>
                                                    ESTADO
                                                </div>
                                                <div id="icon-status" class="ordicon" title="Ordenar el Estado de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-ultmprev" data-priority="10">
                                            <div class="orden">
                                                <div>
                                                    ÚLTIMO MPREV
                                                </div>
                                                <div id="icon-ultmprev" class="ordicon" title="Ordenar el Último Mprev de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Obtén los datos de la tabla "activos" y "activos_servicios" de la base de datos
                                    $activos = \App\Models\Activo::all();

                                    foreach ($activos as $activo) { ?>
                                        <td> <div class="idactivo"> <a href="{{ route('inventory.Datotemp', ['id' => $activo->id]) }}"> <div title="Editar este Activo" class="editicon"><svg style="float: left;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /> </svg>
                                        </div></a><div class="textid"><?php echo "{$activo->id} </td>"; ?>
                                        </div></div>
                                        <?php
                                        echo "<td>{$activo->type}</td>";
                                        echo "<td>{$activo->category}</td>";
                                        echo "<td>{$activo->brand}</td>";
                                        echo "<td>{$activo->model}</td>";
                                        echo "<td>{$activo->serial}</td>";
                                        echo "<td>{$activo->location}</td>";
                                        echo "<td>{$activo->sublocation}</td>";
                                        echo "<td>{$activo->status}</td>";

                                        // Obtén el último mprev del activo desde la tabla "activos_servicios"
                                        $ultimo_mprev = \App\Models\ActivoServicios::where('id', $activo->id)->orderBy('last_mprev', 'desc')->pluck('last_mprev')->first();
                                        echo "<td>{$ultimo_mprev}</td>";

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

    @if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin']))
        <div style="text-align: center;">
            <!-- Botón flotante para agregar activos -->
            <a href="{{ route('assets-creation') }}" class="floating-button">
                <h2>+</h2>
            </a>
        </div>

            <!-- Ventana flotante para mostrar el mensaje -->
            <div class="floating-message">
                Agregar activos
            </div>
    @endif
    </x-app-layout>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <!-- Archivo de idioma en español -->
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
    <script src="https://bioingenieria.inventores.org/js/inventory.js"></script>

</body>
</html>
