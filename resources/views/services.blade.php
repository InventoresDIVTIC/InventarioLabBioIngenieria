<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SERVICIOS | DEV LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
    <meta name="keywords" content="">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/services.css">
</head>
@if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin']))
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div>
                <div>
                    <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto" style="margin-bottom: 1rem;">
                        <div id="recipientes" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            <table id="servicios" class="stripe hover" style="width:100%; padding-top: 1rem; padding-bottom: 1em; margin-bottom: 1rem;">
                                <h2 style="color: #808080; font-size: 2.5rem; text-align: center; text-transform: uppercase; padding-bottom: 10px;">Servicios</h2>
                                <thead>
                                    <tr>
                                        <th id="icon-menu-id" data-priority="1">
                                            <div class="orden">
                                                <div>NO. SERVICIO</div>
                                                <div id="icon-id" class="ordicon" title="Ordenar el ID de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-folio" data-priority="2">
                                            <div class="orden">
                                                <div>FOLIO</div>
                                                <div id="icon-folio" class="ordicon" title="Ordenar el Folio de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-cuenta" data-priority="3">
                                            <div class="orden">
                                                <div>CUENTA</div>
                                                <div id="icon-cuenta" class="ordicon" title="Ordenar la Cuenta de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-tiposervicio" data-priority="4">
                                            <div class="orden">
                                                <div>TIPO DE SERVICIO</div>
                                                <div id="icon-tiposervicio" class="ordicon" title="Ordenar el Tipo de Servicio de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-tipoactivo" data-priority="5">
                                            <div class="orden">
                                                <div>ACTIVO</div>
                                                <div id="icon-tipoactivo" class="ordicon" title="Ordenar el Tipo de Activo de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-ing-asig" data-priority="6">
                                            <div class="orden">
                                                <div>ING. ASIGNADO</div>
                                                <div id="icon-ing-asig" class="ordicon" title="Ordenar el Ingeniero Asignado de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-modelo" data-priority="7">
                                            <div class="orden">
                                                <div>MODELO</div>
                                                <div id="icon-modelo" class="ordicon" title="Ordenar el Modelo de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-sububicacion" data-priority="8">
                                            <div class="orden">
                                                <div>SUB UBICACION</div>
                                                <div id="icon-sububicacion" class="ordicon" title="Ordenar la Sub Ubicación de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-status" data-priority="9">
                                            <div class="orden">
                                                <div>ESTATUS</div>
                                                <div id="icon-status" class="ordicon" title="Ordenar el Estatus de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-fechaprogramada" data-priority="10">
                                            <div class="orden">
                                                <div>FECHA PROGRAMADA</div>
                                                <div id="icon-fechaprogramada" class="ordicon" title="Ordenar la Fecha Programada de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-fechaconclusion" data-priority="11">
                                            <div class="orden">
                                                <div>FECHA CONCLUSIÓN</div>
                                                <div id="icon-fechaconclusion" class="ordicon" title="Ordenar la Fecha de Conclusión de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Obtén los datos de la tabla "servicios" y "activos_servicios" de la base de datos
                                    $services = \App\Models\Servicios::all();

                                    foreach ($services as $services) { ?>
                                        <td> <div class="idservices"> <a href="{{ route('services-edit', ['id' => $services->id])}}"> <div title="Editar este Servicio" class="editicon"><svg style="float: left;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /> </svg>
                                        </div></a><div class="textid"><?php echo "{$services->id} </td>"; ?>
                                        </div></div>
                                        <?php
                                        echo "<td>{$services->foil}</td>";
                                        echo "<td>{$services->user_name}</td>";
                                        echo "<td>{$services->service_type}</td>";
                                        echo "<td>{$services->active_name}</td>";
                                        echo "<td>{$services->assigned_engineer}</td>";
                                        echo "<td>{$services->active_model}</td>";
                                        echo "<td>{$services->active_sublocation}</td>";
                                        echo "<td>{$services->status}</td>";
                                        echo "<td>{$services->scheduled_date}</td>";
                                        echo "<td>{$services->scheduled_end_date}</td>";
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
        <!-- Botón flotante para agregar servicios -->
        <a href="{{ route('services-creation') }}" class="floating-button">
            <h2>+</h2>
        </a>
    </div>

        <!-- Ventana flotante para mostrar el mensaje -->
        <div class="floating-message">
            Agregar servicios
        </div>
    </x-app-layout>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <!-- Archivo de idioma en español -->
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
    <script src="https://bioingenieria.inventores.org/js/services.js"></script>

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
        }
        .welcome-box {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 2s ease-in-out;
        }
        .welcome-title {
            color: #333333;
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
    <div class="welcome-container">
        <div class="welcome-box">
            <h2 class="welcome-title">Parece que no tienes permisos para acceder a este sitio por favor contacta a un administrador</h2>
        </div>
    </div>
</div>
@endif
</html>
